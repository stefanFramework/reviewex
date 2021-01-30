<?php


namespace App\Domain\Repositories;


use App\Domain\Models\BusinessSector;


class BusinessSectorRepository extends BaseRepository
{
    protected string $model = BusinessSector::class;

    protected array $validFilters = [];
}
