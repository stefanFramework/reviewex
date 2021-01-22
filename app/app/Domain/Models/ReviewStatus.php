<?php


namespace App\Domain\Models;


use Exception;

class ReviewStatus
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

    public static function pending(): ReviewStatus
    {
        return new self(self::PENDING);
    }

    public static function published(): ReviewStatus
    {
        return new self(self::PUBLISHED);
    }

    public static function createFromId(string $id): ReviewStatus
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
