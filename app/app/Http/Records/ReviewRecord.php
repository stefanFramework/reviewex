<?php


namespace App\Http\Records;


class ReviewRecord
{
    public ?int $id;
    public ?string $title;
    public ?string $text;
    public ?int $score;
    public ?string $date;
    public ?string $company;
    public ?string $companyCode;
    public ?string $businessSector;
    public ?string $city;
    public ?string $state;
    public int $likes = 0;
    public int $dislikes = 0;
    public array $tags = [];
}
