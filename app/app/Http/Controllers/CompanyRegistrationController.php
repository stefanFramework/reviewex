<?php


namespace App\Http\Controllers;

use App\Domain\Repositories\BusinessSectorRepository;
use App\Domain\Repositories\CountryRepository;
use Illuminate\Support\Facades\View;

class CompanyRegistrationController extends ApplicationController
{
    private CountryRepository $countryRepository;

    private BusinessSectorRepository $businessSectorRepository;

    public function __construct(
        CountryRepository $countryRepository,
        BusinessSectorRepository $businessRepository
    )
    {
        $this->countryRepository = $countryRepository;
        $this->businessSectorRepository = $businessRepository;
        parent::__construct();
    }

    public function view()
    {
        $countries = $this->countryRepository->getAll();
        $businessSectors = $this->businessSectorRepository->getAll();

        return View::make('company_registration', [
            'countries' => $countries,
            'businessSectors' => $businessSectors
        ]);
    }

    public function register()
    {

    }
}
