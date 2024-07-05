<?php

declare(strict_types=1);

namespace App\Domain\User;
use App\Infrastructure\Database\Models\UserModel;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface Users
{
    public function list(): LengthAwarePaginator;
    public function get(int $id): User;
    public function create(User $user): User;
    public function update(UserModel $user, array $params): User;
    public function delete(int $id): bool|null;

}
