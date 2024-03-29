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

use App\Utils\Logger;
use App\Utils\ErrorForView;
use App\Http\Records\CompanyRecord;
use App\Exceptions\ExceptionFormatter;

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

        return View::make('application.company.registration', [
            'countries' => $countries,
            'businessSectors' => $businessSectors
        ]);
    }

    public function register(Request $request)
    {
        try {
            $inputData = $request->all();
            $this->validateData($inputData);

            $companyRecord = new CompanyRecord();
            $companyRecord->name = $inputData['name'];
            $companyRecord->country = $inputData['countries'];
            $companyRecord->state = $inputData['states'];
            $companyRecord->businessSectorId = $inputData['business_sector'];
            $companyRecord->city = $inputData['city'];
            $companyRecord->website = $inputData['website'];

            $company = $this->registrationService->register($companyRecord);

            return Redirect::route('companies.success', ['name' => $company->name, 'code' => $company->code]);
        } catch (ValidationException $vex) {
            return Redirect::back()
                ->withInput()
                ->withErrors($vex->errors());
        } catch (Throwable $ex) {
            Logger::error('company_registration_error', ['error' => ExceptionFormatter::format($ex)]);
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

        return View::make('application.company.success', [
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
            'g-recaptcha-response' => 'recaptcha',
        ];

        $messages = [
            'name.required' => Lang::get('application.errors.required'),
            'business_sector.required' => Lang::get('application.errors.required'),
            'countries.required' => Lang::get('application.errors.required'),
            'states.required' => Lang::get('application.errors.required'),
            'city.required' => Lang::get('application.errors.required'),
            'website.required' => Lang::get('application.errors.required'),
            'website.url' => Lang::get('application.errors.url'),
            'g-recaptcha-response.recaptcha' => Lang::get('application.errors.recaptcha'),
        ];

        $validator = Validator::make($data, $rules, $messages);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }
    }
}
