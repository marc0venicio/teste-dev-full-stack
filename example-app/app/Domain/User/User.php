<?php

declare(strict_types=1);

namespace App\Domain\User;

use DateTimeImmutable;

class User
{
    public function __construct(
        public readonly ?int $id,
        public readonly string $name,
        public readonly string $email,
        public readonly string $cpf,
        public readonly ?string $password,
        public readonly ?DateTimeImmutable $createdAt,
    ) {
    }

    public static function create(?int $id, string $name, string $email, string $cpf, $password): self //todo tipar o campo cpf
    {
        return new self(
            id: $id,
            name: $name,
            email: $email,
            cpf: $cpf,
            password: $password,
            createdAt: new DateTimeImmutable('2023-09-09 00:15:00'),
        );
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'cpf' => $this->cpf,
            'password' => $this->password,
        ];
    }

    public static function fromArray(
        array $data
    ): self {
        return new self(
            id: $data['id'],
            name: $data['name'],
            email: $data['email'],
            cpf: $data['cpf'],
            password: null,
            createdAt:null,
        );
    }
}
