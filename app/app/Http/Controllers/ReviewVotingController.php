<?php

namespace App\Http\Controllers;

use Throwable;
use Illuminate\Support\Facades\Response;

use App\Utils\Logger;
use App\Exceptions\ExceptionFormatter;

use App\Domain\Models\Review;
use App\Domain\Repositories\ReviewRepository;

class ReviewVotingController extends ApplicationController
{
    private ReviewRepository $reviewRepository;

    public function __construct(ReviewRepository $reviewRepository)
    {
        $this->reviewRepository = $reviewRepository;
        parent::__construct();
    }

    public function votePositive(int $reviewId)
    {
        try {
            /** @var Review $review */
            $review = $this->reviewRepository->getById($reviewId);
            $review->increasePositiveVotes();
            return Response::json([], 200);
        } catch (Throwable $ex) {
            Logger::error('review.votePositive', ['ex' => ExceptionFormatter::format($ex)]);
            return Response::json([], 500);
        }
    }

    public function voteNegative(int $reviewId)
    {
        try {
            /** @var Review $review */
            $review = $this->reviewRepository->getById($reviewId);
            $review->increaseNegativeVotes();
            return Response::json([], 200);
        } catch (Throwable $ex) {
            Logger::error('review.votePositive', ['ex' => ExceptionFormatter::format($ex)]);
            return Response::json([], 500);
        }
    }
}
