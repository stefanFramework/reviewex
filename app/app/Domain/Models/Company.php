<?php


namespace App\Domain\Models;

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

    public function getCompanyStatusIdAttribute(): CompanyStatus
    {
        $statusId = $this->company_status_id;
        return CompanyStatus::createFromId($statusId);
    }

    public function setCompanyStatusIdAttribute(CompanyStatus $companyStatus): void
    {
        $this->company_status_id = $companyStatus->getId();
    }

    public function markAsPublished(User $user)
    {
        $this->company_status = CompanyStatus::published();
        $this->reviewer()->associate($user);
        $this->save();
    }
}
