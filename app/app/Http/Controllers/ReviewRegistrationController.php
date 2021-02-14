<?php


namespace App\Http\Controllers;


use App\Domain\Repositories\CompanyRepository;
use App\Domain\Repositories\FeatureRepository;
use App\Exceptions\ExceptionFormatter;
use App\Utils\Logger;
use Illuminate\Support\Facades\View;
use Mockery\Exception;

class ReviewRegistrationController extends ApplicationController
{
    private CompanyRepository  $companyRepository;
    private FeatureRepository $featureRepository;

    public function __construct(
        CompanyRepository $companyRepository,
        FeatureRepository $featureRepository
    )
    {
        $this->companyRepository = $companyRepository;
        $this->featureRepository = $featureRepository;
        parent::__construct();
    }

    public function view(string $companyCode)
    {
        $company = $this->companyRepository->getByCode($companyCode);

        if (empty($company)) {
            $ex = new Exception('Invalid Company: ' . $companyCode);
            Logger::error('review.view', ['ex' => ExceptionFormatter::format($ex)]);
            throw $ex;
        }

        $features = $this->featureRepository->getAll();

        return View::make('application.review.registration', [
            'tags' => $features
        ]);
    }

    public function create()
    {

    }
}
