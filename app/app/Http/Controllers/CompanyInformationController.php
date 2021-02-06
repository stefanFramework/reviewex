<?php


namespace App\Http\Controllers;

use App\Domain\Models\CompanyStatus;
use Exception;
use Illuminate\Support\Facades\View;
use Throwable;

use App\Utils\Logger;
use App\Exceptions\ExceptionFormatter;
use App\Domain\Repositories\CompanyRepository;

class CompanyInformationController extends ApplicationController
{
    private CompanyRepository $companyRepository;

    public function __construct(CompanyRepository $companyRepository)
    {
        $this->companyRepository = $companyRepository;
        parent::__construct();
    }

    public function view(string $code)
    {
        try {
            $company = $this->companyRepository->getByCode(
                $code,
                ['company_status_id' => CompanyStatus::published()->getId()]
            );

            if (empty($company)) {
                throw new Exception('Invalid Company: ' . $code);
            }

            return View::make('company_information', [
                'company' => $company
            ]);

        } catch (Throwable $ex) {
            Logger::error('company.view', ['ex' => ExceptionFormatter::format($ex)]);
            abort(500);
        }

    }
}
