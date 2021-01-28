<?php


namespace App\Domain\Repositories;


use App\Domain\Models\Review;
use App\Domain\Models\ReviewStatus;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class ReviewRepository extends BaseRepository
{
    protected string $model = Review::class;

    protected array $validFilters = [
        'company_id' => 'appendFilterByCompanyId',
        'review_status_id' => 'appendFilterByReviewStatusId'
    ];


    public function getByCompanyId(
        int $companyId,
        array $fields = [],
        array $with = [],
        array $filters = [],
        string $sortBy = 'created_at',
        string $sortSense = 'DESC'
    ): Collection
    {
        $filters['company_id'] = $companyId;
        $filters['review_status_id'] = ReviewStatus::published()->getId();

        return $this->getAll(
            $fields,
            $with,
            $filters,
            $sortBy,
            $sortSense
        );
    }

    public function getAllPending(
        $fields = [],
        $with=[],
        $filters = []
    ): Collection
    {
        $filters['review_status_id'] = ReviewStatus::pending()->getId();

        return $this->getAll(
            $fields,
            $with,
            $filters
        );
    }

    protected function appendFilterByCompanyId(Builder $query, int $companyId): self
    {
        $query->filterByCompanyId($companyId);
        return $this;
    }

    protected function appendFilterByReviewStatusId(Builder $query, string $reviewStatusId): self
    {
        $query->filterByReviewStatusId($reviewStatusId);
        return $this;
    }

}
