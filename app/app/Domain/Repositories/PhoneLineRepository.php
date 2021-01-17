<?php

namespace App\Domain\Repositories;

use App\Domain\Models\PhoneLine;
use App\Domain\Repositories\RepositoryInterfaces\IPhoneLineRepository;

class PhoneLineRepository implements IPhoneLineRepository
{
    private PhoneLine $phoneLine;

    public function __construct(PhoneLine $phoneLine)
    {
        $this->phoneLine = $phoneLine;
    }

    public function findById(int $id)
    {
        return $this->phoneLine->where('id', $id)->first();
    }

    public function findAll(int $limit = 50)
    {
        return $this->phoneLine->paginate($limit);
    }

    public function findByNumber($number)
    {
        return $this->phoneLine->where('number', $number)->first();
    }
}