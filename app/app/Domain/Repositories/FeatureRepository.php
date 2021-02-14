<?php


namespace App\Domain\Repositories;

use App\Domain\Models\Feature;

class FeatureRepository extends BaseRepository
{
    protected string $model = Feature::class;

    protected array $validFilters = [];
}
