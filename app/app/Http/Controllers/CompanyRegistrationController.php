<?php


namespace App\Http\Controllers;

use Exception;
use Throwable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Illuminate\Validation\ValidationException;

use App\Exceptions\ExceptionFormatter;
use App\Http\Entities\CompanyInformationRecord;
use App\Utils\ErrorForView;
use App\Utils\Logger;

use App\Domain\Repositories\BusinessSectorRepository;
use App\Domain\Repositories\CountryRepository;
use App\Domain\Services\CompanyRegistrationService;

class CompanyRegistrationController extends ApplicationController
{
    private CountryRepository $countryRepository;

    private BusinessSectorRepository $businessSectorRepository;

    private CompanyRegistrationService $registrationService;

    public function __construct(
        CountryRepository $countryRepository,
        BusinessSectorRepository $businessRepository,
        CompanyRegistrationService $registrationService
    )
    {
        $this->registrationService = $registrationService;
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

    public function register(Request $request)
    {
        try {
            $inputData = $request->all();
            $this->validateData($inputData);

            $companyInformation = new CompanyInformationRecord();
            $companyInformation->name = $inputData['name'];
            $companyInformation->country = $inputData['countries'];
            $companyInformation->state = $inputData['states'];
            $companyInformation->businessSector = $inputData['business_sector'];
            $companyInformation->city = $inputData['city'];
            $companyInformation->website = $inputData['website'];

            $company = $this->registrationService->register($companyInformation);

            return Redirect::route('companies.success', ['name' => $company->name, 'code' => $company->code]);
        } catch (ValidationException $vex) {
            return Redirect::back()
                ->withInput()
                ->withErrors($vex->errors());
        } catch (Throwable $ex) {
            Logger::error('login_error', ['error' => ExceptionFormatter::format($ex)]);
            return Redirect::back()
                ->withInput()
                ->withErrors([
                    'registration_error' => ErrorForView::mapErrorFromCode($ex->getCode())
                ]);
        }
    }

    public function confirmationView(Request $request)
    {
        $companyName = $request->get('name');
        $companyCode = $request->get('code');

        if (empty($companyName) || empty($companyCode)) {
            throw new Exception('Invalid parameters');
        }

        return View::make('company_registration_success', [
            'companyName' => $companyName,
            'companyCode' => $companyCode
        ]);
    }

    private function validateData(array $data)
    {
        $rules = [
            'name' => 'required',
            'business_sector' => 'required',
            'countries' => 'required',
            'states' => 'required',
            'city' => 'required',
            'website' => 'required|url',
        ];

        $messages = [
            'name.required' => Lang::get('application.errors.required'),
            'business_sector.required' => Lang::get('application.errors.required'),
            'countries.required' => Lang::get('application.errors.required'),
            'states.required' => Lang::get('application.errors.required'),
            'city.required' => Lang::get('application.errors.required'),
            'website.required' => Lang::get('application.errors.required'),
            'website.url' => Lang::get('application.errors.url'),
        ];

        $validator = Validator::make($data, $rules, $messages);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }
    }
}
