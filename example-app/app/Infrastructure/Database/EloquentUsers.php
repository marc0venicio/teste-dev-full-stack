<?php

declare(strict_types=1);

namespace App\Infrastructure\Database;

use App\Domain\User\User;
use App\Domain\User\UserNotFound;
use App\Domain\User\Users;
use App\Infrastructure\Database\Models\UserModel;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class EloquentUsers implements Users
{
    public function __construct(
        private readonly UserModel $model
    ) {
    }

    public function list(): User
    {
        try {
            $user = $this->model->get();
        } catch (ModelNotFoundException) {
            // throw new UserNotFound();
        }

        return User::fromArray($user->toArray());
    }

    /**
     * @throws UserNotFound
     */
    public function get(int $id): User
    {
        try {
            $user = $this->model->findOrFail($id);
        } catch (ModelNotFoundException) {
            throw new UserNotFound($id);
        }

        return User::fromArray($user->toArray());
    }

    public function create(User $user): User
    {
        $user = $this->model->create($user->toArray());
        return User::fromArray($user->toArray());
    }
}
