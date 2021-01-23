<?php


namespace App\Domain\Repositories;


use App\Domain\Models\Company;
use App\Domain\Models\CompanyStatus;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class CompanyRepository extends BaseRepository
{
    protected string $model = Company::class;

    protected array $validFilters = [
        'name' => 'appendFilterByName'
    ];

    public function getByTextName(
        string $textName,
        array $fields = [],
        array $with = [],
        array $filters = []
    ): Collection
    {
        $filters['name'] = $textName;
        $filters['company_status_id'] = CompanyStatus::published()->getId();

        return $this->getAll(
            $fields,
            $with,
            $filters
        );
    }

    protected function appendFilterByName(Builder $query, string $name)
    {
        $query->filterByName($name);
    }
}
