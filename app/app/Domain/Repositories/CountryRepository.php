<?php


namespace App\Domain\Repositories;


use App\Domain\Models\Country;

class CountryRepository extends BaseRepository
{
    protected string $model = Country::class;

    protected array $validFilters = [];

}
