<?php


namespace App\Domain\Models;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use SoftDeletes;

    protected $table = 'companies';

    protected $dates = ['deleted_at'];

    public function businessSector()
    {
        return $this->belongsTo(BusinessSector::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function reviewer()
    {
        return $this->belongsTo(User::class, 'reviewed_by', 'id');
    }

    public function getSummarizedTags(): Collection
    {
        $result = new Collection();
        $this->reviews->each(function (Review $review) use ($result) {
            $review->features->each(function (Feature $feature) use ($result) {
                if (!$result->contains('id', $feature->id)) {
                    $result->add($feature);
                }
            });
        });

        return $result;
    }

    public function updateScoring(): void {
        $updatedScore = ceil($this->reviews->avg('score'));
        $this->score = $updatedScore;
        $this->save();
    }

    public function getCompanyStatusIdAttribute(): CompanyStatus
    {
        $statusId = $this->company_status_id;
        return CompanyStatus::createFromId($statusId);
    }

    public function setCompanyStatusIdAttribute(CompanyStatus $companyStatus): void
    {
        $this->attributes['company_status_id'] = $companyStatus->getId();
    }

    public function markAsPublished(User $user): void
    {
        $this->company_status_id = CompanyStatus::published();
        $this->reviewer()->associate($user);
        $this->save();
    }

    public function discard(User $user): void
    {
        $this->reviewer()->associate($user);
        $this->delete();
        $this->save();
    }

    public function scopeFilterByCode(Builder $query, string $code): Builder
    {
        return $query->where('companies.code', '=',  $code);
    }

    public function scopeFilterByName(Builder $query, string $name): Builder
    {
        return $query->where('companies.name', 'like', '%' . $name . '%');
    }

    public function scopeFilterByCompanyStatusId(Builder $query, string $statusId): Builder
    {
        return $query->where('companies.company_status_id', '=',  $statusId);
    }
}
