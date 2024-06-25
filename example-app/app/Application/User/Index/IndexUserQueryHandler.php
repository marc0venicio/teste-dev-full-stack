<?php

declare(strict_types=1);

namespace App\Application\User\Load;

use App\Application\Query;
use App\Application\QueryHandler;
use App\Domain\User\User;
use App\Domain\User\Users;

class IndexUserQueryHandler implements QueryHandler
{
    public function __construct(
        private readonly Users $users
    ) {
    }

    /**
     * @param IndexUserQuery $command
     */
    public function handle(Query $command): User
    {
        return $this->users->list();
    }
}
