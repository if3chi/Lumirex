<?php

declare(strict_types=1);

namespace If3chi\Lumirex;

use If3chi\Lumirex\Concerns\HasFake;
use Illuminate\Http\Client\Response;
use If3chi\Lumirex\Contracts\RequestContract;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

class Lumirex
{
    use HasFake;

    public function __construct(public RequestContract $request)
    {
    }

    public static function request(RequestContract $request): self
    {
        return new self(request: $request);
    }

    public function send(): Response
    {
        $request = $this->buildRequest();

        $response = $request->send(
            method: $this->request->method(),
            url: $this->request->uri()->toString(),
            options: $this->request->payload()
        );

        if ($response->failed()) {
            return $response->toException();
        }

        return $response;
    }

    public function with(array $payload = [], array $headers = [], ?string $path = null): self
    {
        if (! empty($payload)) {
            $this->request->payload($payload);
        }

        if (! empty($headers)) {
            $this->request->headers($headers);
        }

        if (! is_null($path)) {
            $this->request->path($path);
        }

        return $this;
    }

    public function buildRequest(): PendingRequest
    {
        $client = Http::withHeaders(
            headers: $this->request->headers()
        )->retry(
            times: (int) $this->request->retry(),
            sleepMilliseconds: (int) $this->request->retryTiming()
        )->timeout(
            seconds: (int) $this->request->timeout()
        );

        if ($this->request->requiesAuth()) {
            [$token, $type] = $this->request->authCredentials();
            if ($this->request->authStrategy() === 'token') {
                $client->withToken(
                    token: $token,
                    type: $type ?? 'Bearer'
                );
            }
        }

        if ($this->request->requiesAuth()) {
            [$username, $password] = $this->request->authCredentials();
            if ($this->request->authStrategy() === 'basic') {
                $client->withBasicAuth(
                    username: $username,
                    password: $password
                );
            }
        }

        if ($this->request->requiesAuth()) {
            [$username, $password] = $this->request->authCredentials();
            if ($this->request->authStrategy() === 'digest') {
                $client->withDigestAuth(
                    username: $username,
                    password: $password
                );
            }
        }

        return $client;
    }
}
