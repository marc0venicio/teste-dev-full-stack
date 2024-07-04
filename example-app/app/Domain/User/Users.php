<?php

declare(strict_types=1);

namespace App\Domain\User;
use App\Application\User\Responses\UserListResponse;
use App\Infrastructure\Database\Models\UserModel;

interface Users
{
    public function list(): UserListResponse;
    public function get(int $id): User;
    public function create(User $user): User;
    public function update(UserModel $user): UserModel;
    public function delete(int $id): User;

}
