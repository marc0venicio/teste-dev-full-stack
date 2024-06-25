<?php

declare(strict_types=1);

namespace App\Application\User\Load;

use App\Application\Query;

class IndexUserQuery implements Query
{
    public function __construct(
        public readonly array $data,
    ) {
    }
}
