<?php


namespace App\Http\Controllers;


use Exception;
use Throwable;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

use App\Utils\Logger;
use App\Utils\ErrorForView;
use App\Http\Records\ReviewRecord;
use App\Http\Records\Factories\CompanyRecordFactory;
use App\Exceptions\ExceptionFormatter;

use App\Domain\Models\Company;
use App\Domain\Repositories\CompanyRepository;
use App\Domain\Repositories\FeatureRepository;
use App\Domain\Services\ReviewRegistrationService;

class ReviewRegistrationController extends ApplicationController
{
    private CompanyRepository  $companyRepository;
    private FeatureRepository $featureRepository;

    private ReviewRegistrationService $registrationService;

    public function __construct(
        CompanyRepository $companyRepository,
        FeatureRepository $featureRepository,
        ReviewRegistrationService $registrationService
    )
    {
        $this->companyRepository = $companyRepository;
        $this->featureRepository = $featureRepository;
        $this->registrationService = $registrationService;
        parent::__construct();
    }

    public function view(string $companyCode)
    {
        /** @var Company $company */
        $company = $this->companyRepository->getPublishedByCode($companyCode);

        if (empty($company)) {
            $ex = new Exception('Invalid Company: ' . $companyCode);
            Logger::error('review.view', ['ex' => ExceptionFormatter::format($ex)]);
            throw $ex;
        }

        $features = $this->featureRepository->getAll();

        return View::make('application.review.registration', [
            'company' => CompanyRecordFactory::fromModel($company),
            'tags' => $features
        ]);
    }

    public function create(Request $request, string $companyCode)
    {
        try {
            $inputData = $request->all();
            $this->validateData($inputData);

            $reviewRecord = new ReviewRecord();
            $reviewRecord->title = $inputData['title'];
            $reviewRecord->text = $inputData['text'];
            $reviewRecord->score = $inputData['score'];
            $reviewRecord->tags = array_key_exists('tags', $inputData) ? $inputData['tags'] : [];
            $reviewRecord->companyCode = $companyCode;
            $this->registrationService->register($reviewRecord);

            return Redirect::route('reviews.success', [
                'code' => $companyCode
            ]);

        } catch (ValidationException $vex) {
            return Redirect::back()
                ->withInput()
                ->withErrors($vex->errors());
        } catch (Throwable $ex) {
            Logger::error('review_registration_error', [
                'error' => ExceptionFormatter::format($ex)
            ]);
            return Redirect::back()
                ->withInput()
                ->withErrors([
                    'review_registration_error' => ErrorForView::mapErrorFromCode($ex->getCode())
                ]);
        }
    }

    public function confirmationView(string $companyCode)
    {
        $company = $this->companyRepository->getPublishedByCode($companyCode);

        if (empty($company)) {
            throw new Exception('Invalid parameters');
        }

        return View::make('application.review.success', [
            'companyCode' => $companyCode,
            'companyName' => $company->name
        ]);
    }

    private function validateData(array $data)
    {
        $rules = [
            'title' => 'required',
            'text' => 'required',
            'g-recaptcha-response' => 'recaptcha',
        ];

        $messages = [
            'title.required' => Lang::get('application.errors.required'),
            'text.required' => Lang::get('application.errors.required'),
            'g-recaptcha-response.recaptcha' => Lang::get('application.errors.recaptcha'),
        ];

        $validator = Validator::make($data, $rules, $messages);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }
    }
}
