<?php


namespace App\Http\Records;


class CompanyRecord
{
    public ?string $name;
    public ?string $code;
    public ?int $businessSectorId;
    public ?string $businessSector;
    public ?string $country;
    public ?string $state;
    public ?string $city;
    public ?string $website;
    public ?int $score;
    public array $tags = [];
}
