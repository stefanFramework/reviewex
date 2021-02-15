<?php


namespace App\Http\Controllers;

use App\Http\Records\Factories\CompanyRecordFactory;
use Exception;
use Throwable;

use Illuminate\Support\Facades\View;
use Illuminate\Database\Eloquent\Collection;

use App\Utils\Logger;
use App\Http\Records\ReviewRecord;
use App\Http\Records\CompanyRecord;
use App\Exceptions\ExceptionFormatter;

use App\Domain\Models\Feature;
use App\Domain\Models\Review;
use App\Domain\Models\Company;
use App\Domain\Models\CompanyStatus;
use App\Domain\Repositories\ReviewRepository;
use App\Domain\Repositories\CompanyRepository;

class CompanyInformationController extends ApplicationController
{
    private CompanyRepository $companyRepository;

    private ReviewRepository  $reviewRepository;

    public function __construct(
        CompanyRepository $companyRepository,
        ReviewRepository $reviewRepository
    )
    {
        $this->reviewRepository = $reviewRepository;
        $this->companyRepository = $companyRepository;
        parent::__construct();
    }

    public function view(string $code)
    {
        try {
            /** @var Company $company */
            $company = $this->companyRepository->getByCode(
                $code,
                ['company_status_id' => CompanyStatus::published()->getId()]
            );

            if (empty($company)) {
                throw new Exception('Invalid Company: ' . $code);
            }

            $reviews = $this->reviewRepository->getLatest(
                'created_at',
                'desc',
                10 ,
                ['company_id' => $company->id]
            );

            return View::make('application.company.information', [
                'company' => $this->getCompanyRecord($company),
                'reviews' => $this->getReviewsRecord($reviews)
            ]);

        } catch (Throwable $ex) {
            Logger::error('company.view', ['ex' => ExceptionFormatter::format($ex)]);
            abort(500);
        }

    }

    private function getCompanyRecord(Company $company): CompanyRecord
    {
        return CompanyRecordFactory::fromModel($company, $this->getTags($company));
    }

    private function getTags(Company $company): array
    {
        $tags = $company->getSummarizedTags();
        return $tags->reduce(function ($carry, Feature $tag) {
            $carry[] = $tag->name;
            return $carry;
        }, []);
    }

    private function getReviewsRecord(Collection $reviews): array
    {
        return $reviews->reduce(function (array $carry, Review $review) {
            $record = new ReviewRecord();
            $record->title = $review->title;
            $record->text = $review->text;
            $record->score = $review->score;
            $record->date = $review->created_at->format('M, Y');

            $carry[]= $record;
            return $carry;
        }, []);
    }
}
