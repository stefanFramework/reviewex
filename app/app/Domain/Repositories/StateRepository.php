<?php


namespace App\Domain\Repositories;


use App\Domain\Models\State;

class StateRepository extends BaseRepository
{
    protected string $model = State::class;

    protected array $validFilters = [];
}
