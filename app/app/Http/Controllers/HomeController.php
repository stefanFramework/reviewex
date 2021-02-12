<?php


namespace App\Http\Controllers;

use Throwable;

use App\Utils\Logger;
use App\Http\Records\ReviewRecord;
use App\Exceptions\ExceptionFormatter;

use App\Domain\Models\Review;
use App\Domain\Models\Company;
use App\Domain\Repositories\CompanyRepository;
use App\Domain\Repositories\ReviewRepository;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Response;
use Illuminate\Database\Eloquent\Collection;

class HomeController extends ApplicationController
{
    private ReviewRepository $reviewRepository;
    private CompanyRepository $companyRespository;

    public function __construct(
        CompanyRepository $companyRepository,
        ReviewRepository $reviewRepository
    )
    {
        parent::__construct();
        $this->companyRespository = $companyRepository;
        $this->reviewRepository = $reviewRepository;
    }

    public function index()
    {
        $latestReviews = $this->reviewRepository->getLatest(
            [],
            'score',
            'desc',
            5
        );

        return View::make('application.home', [
            'reviews' => $this->getReviewRecords($latestReviews)
        ]);
    }

    public function search(Request $request)
    {
        try {
            $inputData = $request->all();
            $companies = $this->companyRespository->getByTextName($inputData['term']);
            $result = $this->generateResult($companies);
            return Response::json($result, 200);
        } catch (Throwable $ex) {
            Logger::error('search', ['ex' => ExceptionFormatter::format($ex)]);
            return Response::json([], 500);
        }
    }

    private function generateResult(Collection $companies)
    {
        return $companies->map(function (Company $company) {
            return [
                'code' => $company->code,
                'label' => $company->name,
                'value' => $company->name
            ];
        })->toArray();
    }


    private function getReviewRecords(Collection $reviews): array
    {
        return $reviews->reduce(function ($carry, Review $review) {
            $record = new ReviewRecord();
            $record->title = $review->title;
            $record->text = $review->text;
            $record->score = (int) $review->score;
            $record->company = $review->company->name;
            $record->city = $review->company->city;
            $record->businessSector = $review->company->businessSector->name;
            $record->state = $review->company->state->name;
            $carry[] = $record;
            return $carry;
        }, []);

    }
}
