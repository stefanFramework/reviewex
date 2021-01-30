<?php


namespace App\Domain\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;

class Review extends Model
{
    use SoftDeletes;

    protected $table = 'reviews';

    protected $dates = ['deleted_at'];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function reviewer()
    {
        return $this->belongsTo(User::class, 'reviewed_by', 'id');
    }

    public function features()
    {
        return $this->belongsToMany(
            Feature::class,
            'review_has_features',
            'review_id',
            'feature_id'
        );
    }

    public function getReviewStatusIdAttribute(): ReviewStatus
    {
        $statusId = $this->review_status_id;
        return ReviewStatus::createFromId($statusId);
    }

    public function setReviewStatusIdAttribute(ReviewStatus $reviewStatus)
    {
        $this->attributes['review_status_id'] = $reviewStatus->getId();
    }

    public function markAsPublished(User $user): void
    {
        $this->review_status_id = ReviewStatus::published();
        $this->reviewer()->associate($user);
        $this->save();
    }

    public function discard(User $user): void
    {
        $this->reviewer()->associate($user);
        $this->delete();
        $this->save();
    }

    public function scopeFilterByCompanyId(Builder $query, int $companyId): Builder
    {
        return $query->where('reviews.company_id', $companyId);
    }

    public function scopeFilterByReviewStatusId(Builder $query, string $reviewStatusId): Builder
    {
        return $query->where('reviews.review_status_id', $reviewStatusId);
    }

}
