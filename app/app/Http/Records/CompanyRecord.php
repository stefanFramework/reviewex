<?php


namespace App\Http\Records;


class CompanyRecord
{
    public ?string $name;
    public ?string $businessSector;
    public ?string $state;
    public ?string $city;
    public ?string $website;
    public ?int $score;
    public array $tags = [];
    public array $reviews = [];
}
