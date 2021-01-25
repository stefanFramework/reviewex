<?php


namespace App\Domain\Repositories;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;

abstract class BaseRepository
{
    protected const DEFAULT_SORT_BY = 'id';

    protected const DEFAULT_SORT_SENSE = 'ASC';

    protected const DEFAULT_LIMIT = 50;

    protected array $defaultFields = ['*'];

    protected string $model;

    protected array $validFilters = [];


    public function getById(
        int $id,
        array $fields = [],
        array $with = [],
        array $filters = []
    ): ?Model
    {
        $model = $this->model;
        $query = $model::select($this->renderFields($fields))
            ->with($with)
            ->where('id', $id);
        $this->applyFilters($query, $filters);
        return $query->first();
    }

    public function getFirst(
        array $fields = [],
        array $with = [],
        array $filters = [],
        ?string $sortBy = null,
        ?string $sortSense = null
    ): ?Model
    {
        return $this->all(
            $fields,
            $with,
            $filters,
            $sortBy,
            $sortSense,
        )->first();
    }

    public function getAll(
        array $fields = [],
        array $with = [],
        array $filters = [],
        ?string $sortBy = null,
        ?string $sortSense = null
    ): Collection
    {
        return $this->all(
            $fields,
            $with,
            $filters,
            $sortBy,
            $sortSense,
        )->get();
    }

    public function getAllPaginated(
        array $fields = [],
        array $with = [],
        array $filters = [],
        ?string $sortBy = null,
        ?string $sortSense = null,
        int $limit = self::DEFAULT_LIMIT
    ): Paginator
    {
        $query = $this->all(
            $fields,
            $with,
            $filters,
            $sortBy,
            $sortSense,
        );

        return $this->paginate($query, $limit);
    }

    private function all(
        array $fields = [],
        array $with = [],
        array $filters = [],
        ?string $sortBy = null,
        ?string $sortSense = null
    ): Builder
    {
        $model = $this->model;
        $query = $model::select($this->renderFields($fields))
            ->with($with);

        $this->applyFilters($query, $filters);

        $this->appendOrderBy(
            $query,
            $sortBy ?: self::DEFAULT_SORT_BY,
            $sortSense ?: self::DEFAULT_SORT_SENSE
        );

        return $query;
    }

    private function renderFields(array $fields): array
    {
        return $fields ?: $this->defaultFields;
    }

    private function applyFilters(Builder $query, array $filters): void
    {
        foreach ($filters as $filterKey => $filterValue) {
            if (isset($this->validFilters[$filterKey])) {
                $methodName = $this->validFilters[$filterKey];
                $this->$methodName($query, $filterValue);
            }
        }
    }

    private function appendOrderBy(Builder $query, string $orderField, string $orderSense = 'ASC'): self
    {
        $query->orderBy($orderField, $orderSense);
        return $this;
    }

    private function paginate(Builder $query, int $limit): Paginator
    {
        return $query->paginate($limit);
    }
}
