<?php

declare(strict_types=1);

namespace App\Application\User\Responses;

use App\Application\Common\Contracts\ResponseContract;
use App\Application\Common\Responses\Concerns\ArrayAccessible;
use App\Domain\User\User;

/**
 * @implements ResponseContract<array{id: string, object: string, created_at: int, name: ?string, description: ?string, model: string, instructions: ?string, tools: array<int, array{type: string}|array{type: string}|array{type: string, function: array{description: string, name: string, parameters: array<string, mixed>}}>, file_ids: array<int, string>, metadata: array<string, string>}>
 */
final class UserListResponse implements ResponseContract
{
    /**
     * @use ArrayAccessible<array{object: string, data: array<int, array{id: string, object: string, created_at: int, name: ?string, description: ?string, model: string, instructions: ?string, tools: array<int, array{type: string}|array{type: string}|array{type: string, function: array{description: string, name: string, parameters: array<string, mixed>}}>, file_ids: array<int, string>, metadata: array<string, string>}>, first_id: ?string, last_id: ?string, has_more: bool}>
     */
    use ArrayAccessible;

    /**
     * @param  array<int, User>  $data
     */
    private function __construct(
        public readonly array $data,
    ) {
    }

    /**
     * Acts as static factory, and returns a new Response instance.
     *
     * @param  array{object: string, data: array<int, array{id: string, object: string, created_at: int, name: ?string, description: ?string, model: string, instructions: ?string, tools: array<int, array{type: 'code_interpreter'}|array{type: 'retrieval'}|array{type: 'function', function: array{description: string, name: string, parameters: array<string, mixed>}}>, file_ids: array<int, string>, metadata: array<string, string>}>, first_id: ?string, last_id: ?string, has_more: bool}  $attributes
     */
    public static function from(array $attributes): self
    {
        $data = array_map(fn (array $result): User => User::fromArray(
            $result,
        ), $attributes);

        return new self(
            $data,
        );
    }

    /**
     * {@inheritDoc}
     */
    public function toArray(): array
    {
        return [
            'data' => array_map(
                static fn (User $response): array => $response->toArray(),
                $this->data,
            ),
        ];
    }
}
