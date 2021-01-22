<?php


namespace App\Domain\Models;

use Exception;

class CompanyStatus
{
    const PUBLISHED = 'published';
    const PENDING = 'pending';

    private $id;

    private function __construct(string $id)
    {
        $this->id = $id;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public static function pending(): CompanyStatus
    {
        return new self(self::PENDING);
    }

    public static function published(): CompanyStatus
    {
        return new self(self::PUBLISHED);
    }

    public static function createFromId(string $id): CompanyStatus
    {
        if ($id == self::PUBLISHED) {
            return self::published();
        }

        if ($id == self::PENDING) {
            return self::pending();
        }

        throw new Exception('Invalid status id');
    }
}
