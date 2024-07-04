<?php

declare(strict_types=1);

namespace App\Application\Common\Contracts;

use App\Services\Common\Exceptions\ErrorException;
use App\Services\Common\Exceptions\TransporterException;
use App\Services\Common\Exceptions\UnserializableResponse;
use App\Services\Common\ValueObjects\Transporter\Payload;
use App\Services\Common\ValueObjects\Transporter\Response;
use Psr\Http\Message\ResponseInterface;


interface TransporterContract
{
    /**
     * Sends a request to a server.
     *
     * @return Response<array<array-key, mixed>|string>
     *
     * @throws ErrorException|UnserializableResponse|TransporterException
     */
    public function requestObject(Payload $payload): Response;

    /**
     * Sends a content request to a server.
     *
     * @throws ErrorException|TransporterException
     */
    public function requestContent(Payload $payload): string;

    /**
     * Sends a stream request to a server.
     **
     * @throws ErrorException
     */
    public function requestStream(Payload $payload): ResponseInterface;
}
