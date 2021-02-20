<?php

namespace App\Http\Controllers;

use Throwable;
use Illuminate\Support\Facades\Response;

use App\Utils\Logger;
use App\Exceptions\ExceptionFormatter;

use App\Domain\Models\Review;
use App\Domain\Repositories\ReviewRepository;

class ReviewReactionController extends ApplicationController
{
    private ReviewRepository $reviewRepository;

    public function __construct(ReviewRepository $reviewRepository)
    {
        $this->reviewRepository = $reviewRepository;
        parent::__construct();
    }

    public function likeReview(int $reviewId)
    {
        try {
            /** @var Review $review */
            $review = $this->reviewRepository->getById($reviewId);
            $review->markAsLiked();
            return Response::json([], 200);
        } catch (Throwable $ex) {
            Logger::error('review.votePositive', ['ex' => ExceptionFormatter::format($ex)]);
            return Response::json([], 500);
        }
    }

    public function unlikeReview(int $reviewId)
    {
        try {
            /** @var Review $review */
            $review = $this->reviewRepository->getById($reviewId);
            $review->removeLike();
            return Response::json([], 200);
        } catch (Throwable $ex) {
            Logger::error('review.votePositive', ['ex' => ExceptionFormatter::format($ex)]);
            return Response::json([], 500);
        }
    }


    public function dislikeReview(int $reviewId)
    {
        try {
            /** @var Review $review */
            $review = $this->reviewRepository->getById($reviewId);
            $review->markAsDisliked();
            return Response::json([], 200);
        } catch (Throwable $ex) {
            Logger::error('review.votePositive', ['ex' => ExceptionFormatter::format($ex)]);
            return Response::json([], 500);
        }
    }

    public function undislikeReview(int $reviewId)
    {
        try {
            /** @var Review $review */
            $review = $this->reviewRepository->getById($reviewId);
            $review->removeDislike();
            return Response::json([], 200);
        } catch (Throwable $ex) {
            Logger::error('review.votePositive', ['ex' => ExceptionFormatter::format($ex)]);
            return Response::json([], 500);
        }
    }
}
