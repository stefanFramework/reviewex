<?php

namespace App\Http\Front\ViewModels;

use Carbon\Carbon;

class PhoneLineMessageViewModel
{
    public int $id;
    public string $from;
    public string $message;
    public Carbon $date;
}