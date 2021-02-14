<?php


namespace App\Http\Controllers;


use App\Domain\Repositories\FeatureRepository;
use Illuminate\Support\Facades\View;

class ReviewRegistrationController extends ApplicationController
{
    private FeatureRepository $featureRepository;

    public function __construct(FeatureRepository $featureRepository)
    {
        $this->featureRepository = $featureRepository;
        parent::__construct();
    }

    public function view(string $companyCode)
    {
        $features = $this->featureRepository->getAll();

        return View::make('review_registration', [
            'features' => $features
        ]);
    }

    public function create()
    {

    }
}
