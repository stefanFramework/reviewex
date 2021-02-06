<?php


namespace App\Domain\Services;

use App\Http\Entities\CompanyInformationRecord;
use App\Utils\ClientIdentifier;

use App\Domain\Models\Company;
use App\Domain\Models\CompanyStatus;
use App\Domain\Repositories\StateRepository;
use App\Domain\Repositories\CompanyRepository;
use App\Domain\Repositories\BusinessSectorRepository;
use App\Domain\Exceptions\CompanyAlreadyExistsException;

class CompanyRegistrationService
{
    private StateRepository $stateRepository;

    private CompanyRepository $companyRepository;

    private BusinessSectorRepository $businessSectorRepository;

    public function __construct(
        StateRepository $stateRepository,
        CompanyRepository $companyRepository,
        BusinessSectorRepository $businessRepository
    )
    {
        $this->stateRepository = $stateRepository;
        $this->companyRepository = $companyRepository;
        $this->businessSectorRepository = $businessRepository;
    }

    public function register(CompanyInformationRecord $companyInformation): Company
    {
        $this->assertCompanyIsUnique($companyInformation);

        $businessSector = $this->businessSectorRepository->getById($companyInformation->businessSector);
        $state = $this->stateRepository->getById($companyInformation->state);

        $company = new Company();
        $company->code = ClientIdentifier::fromName($companyInformation->name);
        $company->name = $companyInformation->name;
        $company->city = $companyInformation->city;
        $company->website_url = $companyInformation->website;
        $company->company_status_id = CompanyStatus::pending();

        $company->state()->associate($state);
        $company->businessSector()->associate($businessSector);
        $company->save();

        return $company;
    }

    private function assertCompanyIsUnique(CompanyInformationRecord $companyInformation): void
    {
        $code = ClientIdentifier::fromName($companyInformation->name);
        $company = $this->companyRepository->getByCode($code);

        if (!empty($company)) {
            throw new CompanyAlreadyExistsException('Code: ' . $code);
        }
    }

}
