<?php

namespace App\Domain\Repositories\RepositoryInterfaces;

interface IPhoneLineRepository
{
    public function findById(int $id);
    public function findAll(int $limit = 50);
    public function findByNumber(string $number);
}