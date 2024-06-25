<?php

declare(strict_types=1);

namespace App\Domain\User;

interface Users
{
    public function list(): User;
    public function get(int $id): User;

    public function create(User $user): User;
}
