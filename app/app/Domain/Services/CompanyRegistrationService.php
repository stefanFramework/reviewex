<?php


namespace App\Domain\Services;

use App\Http\Entities\CompanyInformationRecord;
use App\Http\Records\CompanyRecord;
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

    public function register(CompanyRecord $companyRecord): Company
    {
        $this->assertCompanyIsUnique($companyRecord);

        $businessSector = $this->businessSectorRepository->getById($companyRecord->businessSectorId);
        $state = $this->stateRepository->getById($companyRecord->state);

        $company = new Company();
        $company->code = ClientIdentifier::fromName($companyRecord->name);
        $company->name = $companyRecord->name;
        $company->city = $companyRecord->city;
        $company->website_url = $companyRecord->website;
        $company->company_status_id = CompanyStatus::pending();

        $company->state()->associate($state);
        $company->businessSector()->associate($businessSector);
        $company->save();

        return $company;
    }

    private function assertCompanyIsUnique(CompanyRecord $companyRecord): void
    {
        $code = ClientIdentifier::fromName($companyRecord->name);
        $company = $this->companyRepository->getByCode($code);

        if (!empty($company)) {
            throw new CompanyAlreadyExistsException('Code: ' . $code);
        }
    }

}
