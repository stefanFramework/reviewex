<?php


namespace App\Http\Controllers\Backoffice;

use App\Domain\Repositories\CompanyRepository;
use App\Domain\Repositories\ReviewRepository;

use App\Http\Controllers\Controller;
use App\Http\Services\Backoffice\AuthenticationService;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    private AuthenticationService $authService;

    private CompanyRepository $companyRepository;

    private ReviewRepository $reviewRepository;

    public function __construct(
        CompanyRepository $companyRepository,
        ReviewRepository $reviewRepository,
        AuthenticationService $authService
    )
    {
        $this->authService = $authService;
        $this->companyRepository = $companyRepository;
        $this->reviewRepository = $reviewRepository;
    }

    public function index()
    {
        $companies = $this->companyRepository->getAllPending();

        $reviews = $this->reviewRepository->getAllPending();

        $authUser = $this->authService->getAuthenticatedUser();

        $params = [
            'companiesPending' => $companies->count(),
            'reviewsPending' => $reviews->count(),
            'userName' => strtoupper($authUser->userName),
            'currentEnvironment' => strtoupper(Config::get('app.env'))
        ];

        return View::make('backoffice.home', $params);
    }
}
