<?php


namespace App\Http\Controllers\Backoffice;

use App\Domain\Repositories\CompanyRepository;
use App\Domain\Repositories\ReviewRepository;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    private CompanyRepository $companyRepository;

    private ReviewRepository $reviewRepository;

    public function __construct(
        CompanyRepository $companyRepository,
        ReviewRepository $reviewRepository
    )
    {
        $this->companyRepository = $companyRepository;
        $this->reviewRepository = $reviewRepository;
    }

    public function index()
    {
        $companies = $this->companyRepository->getAllPending();
        $reviews = $this->reviewRepository->getAllPending();

        $params = [
            'companiesPending' => $companies->count(),
            'reviewsPending' => $reviews->count()
        ];

        return View::make('backoffice.home', $params);
    }
}
