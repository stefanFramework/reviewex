<?php

namespace App\Http\Front\ViewModels;

class PhoneLineViewModel
{
    public int $id;
    public string $number;
    public array $messages;
    public string $country;
    public bool $available;
}