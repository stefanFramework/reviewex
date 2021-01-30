<?php


namespace App\Http\Controllers\Backoffice;

use Throwable;
use Exception;

use App\Utils\Logger;
use App\Http\Controllers\Controller;
use App\Exceptions\ExceptionFormatter;
use App\Http\Services\Backoffice\AuthenticationService;

use App\Domain\Models\User;
use App\Domain\Models\Review;
use App\Domain\Models\ReviewStatus;
use App\Domain\Repositories\ReviewRepository;
use App\Domain\Repositories\UserRepository;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

class ReviewValidationController extends Controller
{
    private AuthenticationService $authService;

    private UserRepository $userRepository;

    private ReviewRepository $reviewRepository;

    public function __construct(
        UserRepository $userRepository,
        ReviewRepository $reviewRepository,
        AuthenticationService $authService
    )
    {
        $this->authService = $authService;
        $this->userRepository = $userRepository;
        $this->reviewRepository = $reviewRepository;
        Logger::setDefaultPrefix('backoffice');
    }

    public function index()
    {
        $filters = [
            'review_status_id' => ReviewStatus::pending()->getId()
        ];

        $sortBy = 'created_at';
        $sortSense = 'DESC';

        $paginatedListing = $this->reviewRepository->getForListing(
            $filters,
            $sortBy,
            $sortSense
        );

        return View::make('backoffice.review_list', [
            'listing' => $paginatedListing
        ]);
    }

    public function update(int $id)
    {
        try {
            /** @var Review $company */
            $review = $this->reviewRepository->getById($id);

            if (empty($review)) {
                throw new Exception('Invalid Company');
            }

            /** @var User $user */
            $authUser = $this->authService->getAuthenticatedUser();
            $user = $this->userRepository->getActiveUserById($authUser->id);

            $review->markAsPublished($user);

        } catch (Throwable $ex) {
            Logger::error('review.update', ['error' => ExceptionFormatter::format($ex)]);
        } finally {
            return Redirect::route('backoffice.reviews');
        }
    }

    public function dismiss(int $id)
    {
        try {
            /** @var Review $company */
            $review = $this->reviewRepository->getById($id);

            if (empty($review)) {
                throw new Exception('Invalid Company');
            }

            /** @var User $user */
            $authUser = $this->authService->getAuthenticatedUser();
            $user = $this->userRepository->getActiveUserById($authUser->id);

            $review->discard($user);

        } catch (Throwable $ex) {
            Logger::error('review.dismiss', ['error' => ExceptionFormatter::format($ex)]);
        } finally {
            return Redirect::route('backoffice.reviews');
        }
    }
}
