<?php


namespace App\Domain\Repositories;

use App\Domain\Models\Company;
use App\Domain\Models\CompanyStatus;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\Paginator;

class CompanyRepository extends BaseRepository
{
    protected string $model = Company::class;

    protected array $validFilters = [
        'code' => 'appendFilterByCode',
        'name' => 'appendFilterByName',
        'company_status_id' => 'appendFilterByCompanyStatusId'
    ];

    public function getForListing(
        array $filters = [],
        string $sortBy = '',
        string $sortSense = '',
        int $limit = self::DEFAULT_LIMIT
    ): Paginator
    {
        $fields = [];
        $with = [];

        return $this->getAllPaginated(
            $fields,
            $with,
            $filters,
            $sortBy,
            $sortSense,
            $limit
        );
    }

    public function getByCode(
        string $code,
        array $filters = [],
        array $fields = [],
        array $with = []
    ): ?Model
    {
        $filters['code'] = $code;

        return $this->getFirst(
            $fields,
            $with,
            $filters
        );
    }

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

    public function getAllPending(
        $fields = [],
        $with=[],
        $filters = []
    ): Collection
    {
        $filters['company_status_id'] = CompanyStatus::pending()->getId();

        return $this->getAll(
            $fields,
            $with,
            $filters
        );
    }

    protected function appendFilterByCode(Builder $query, string $code)
    {
        $query->filterByCode($code);
    }

    protected function appendFilterByName(Builder $query, string $name)
    {
        $query->filterByName($name);
    }

    protected function appendFilterByCompanyStatusId(Builder $query, string $statusId)
    {
        $query->filterByCompanyStatusId($statusId);
    }
}
