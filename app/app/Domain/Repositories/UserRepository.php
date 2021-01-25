<?php


namespace App\Domain\Repositories;


use App\Domain\Models\CompanyStatus;
use App\Domain\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;


class UserRepository extends BaseRepository
{
    protected string $model = User::class;

    protected array $validFilters = [
        'email' => 'appendFilterByEmail'
    ];

    public function getByEmail(
        string $email,
        array $fields = [],
        array $with = [],
        array $filters = []
    ): ?Model
    {
        $filters['email'] = $email;
        $filters['is_active'] = true;

        return $this->getFirst(
            $fields,
            $with,
            $filters
        );
    }

    protected function appendFilterByEmail(Builder $query, string $email)
    {
        $query->filterByEmail($email);
    }
}
