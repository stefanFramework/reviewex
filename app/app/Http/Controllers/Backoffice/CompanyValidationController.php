<?php


namespace App\Http\Controllers\Backoffice;

use Throwable;
use Exception;

use App\Utils\Logger;
use App\Exceptions\ExceptionFormatter;
use App\Http\Controllers\Controller;
use App\Http\Services\Backoffice\AuthenticationService;

use App\Domain\Models\User;
use App\Domain\Models\Company;
use App\Domain\Models\CompanyStatus;
use App\Domain\Repositories\UserRepository;
use App\Domain\Repositories\CompanyRepository;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;

class CompanyValidationController extends Controller
{
    private AuthenticationService $authService;

    private UserRepository $userRepository;

    private CompanyRepository $companyRepository;

    public function __construct(
        UserRepository $userRepository,
        CompanyRepository $companyRepository,
        AuthenticationService $authService
    )
    {
        $this->authService = $authService;
        $this->userRepository = $userRepository;
        $this->companyRepository = $companyRepository;
        Logger::setDefaultPrefix('backoffice');
    }

    public function index()
    {
        $filters = [
            'company_status_id' => CompanyStatus::pending()->getId()
        ];

        $sortBy = 'created_at';
        $sortSense = 'DESC';

        $paginatedListing = $this->companyRepository->getForListing(
            $filters,
            $sortBy,
            $sortSense
        );

        return View::make('backoffice.company_list', [
            'listing' => $paginatedListing
        ]);
    }

    public function view(int $id)
    {
        try {
            $company = $this->companyRepository->getById($id);

            if (empty($company)) {
                throw new Exception('Invalid Company');
            }

            return View::make('backoffice.company_form', [
               'company' => $company
            ]);

        } catch (Throwable $ex) {
            Logger::error('company.view', ['error' => ExceptionFormatter::format($ex)]);
            return Redirect::back();
        }
    }

    public function update(int $id)
    {
        try {
            /** @var Company $company */
            $company = $this->companyRepository->getById($id);

            if (empty($company)) {
                throw new Exception('Invalid Company');
            }

            /** @var User $user */
            $authUser = $this->authService->getAuthenticatedUser();
            $user = $this->userRepository->getActiveUserById($authUser->id);

            $company->markAsPublished($user);

        } catch (Throwable $ex) {
            Logger::error('company.update', ['error' => ExceptionFormatter::format($ex)]);
        } finally {
            return Redirect::route('backoffice.companies');
        }
    }

    public function dismiss(int $id)
    {
        try {
            /** @var Company $company */
            $company = $this->companyRepository->getById($id);

            if (empty($company)) {
                throw new Exception('Invalid Company');
            }

            /** @var User $user */
            $authUser = $this->authService->getAuthenticatedUser();
            $user = $this->userRepository->getActiveUserById($authUser->id);

            $company->discard($user);

        } catch (Throwable $ex) {
            Logger::error('company.dismiss', ['error' => ExceptionFormatter::format($ex)]);
        } finally {
            return Redirect::route('backoffice.companies');
        }
    }
}
