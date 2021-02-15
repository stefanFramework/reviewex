<?php

namespace App\Domain\Services;

use App\Http\Records\ReviewRecord;
use App\Domain\Models\Review;
use App\Domain\Models\ReviewStatus;
use App\Domain\Repositories\CompanyRepository;
use App\Domain\Exceptions\InvalidCompanyException;

class ReviewRegistrationService
{
    private CompanyRepository $companyRepository;

    public function __construct(CompanyRepository $companyRepository)
    {
        $this->companyRepository = $companyRepository;
    }

    public function register(ReviewRecord $reviewRecord): Review
    {
        $this->assertCompanyExists($reviewRecord);

        $company = $this->companyRepository->getByCode($reviewRecord->companyCode);

        $review = new Review();
        $review->title = $reviewRecord->title;
        $review->text = $reviewRecord->text;
        $review->score = $reviewRecord->score;
        $review->review_status_id = ReviewStatus::pending();
        $review->company()->associate($company);
        $review->save();

        if (!empty($reviewRecord->tags)) {
            $review->features()->attach($reviewRecord->tags);
            $review->save();
        }

        return $review;
    }

    private function assertCompanyExists(ReviewRecord $reviewRecord)
    {
        $company = $this->companyRepository->getByCode($reviewRecord->companyCode);

        if (empty($company)) {
            throw new InvalidCompanyException('Code: ' . $reviewRecord->companyCode);
        }
    }
}
