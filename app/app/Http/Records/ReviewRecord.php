<?php


namespace App\Http\Records;


use Carbon\Carbon;

class ReviewRecord
{
    public ?int $id;
    public ?string $title;
    public ?string $text;
    public ?int $score;
    public ?Carbon $date;
    public ?string $company;
    public ?string $companyCode;
    public ?string $businessSector;
    public ?string $city;
    public ?string $state;
    public int $socialScore = 0;
    public int $likes = 0;
    public int $dislikes = 0;
    public array $tags = [];
}
