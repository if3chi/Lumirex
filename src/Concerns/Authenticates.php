<?php

declare(strict_types=1);

namespace If3chi\Lumirex\Concerns;

use Illuminate\Http\Client\PendingRequest;
use If3chi\Lumirex\Contracts\RequestContract;
use If3chi\Lumirex\Exceptions\AuthenticationException;

trait Authenticates
{
    public function authenticate(RequestContract $request, PendingRequest $client): PendingRequest
    {
        [$tokenOrUsername, $typeOrPasswd] = $request->authCredentials();

        return match ($request->authStrategy()) {
            'basic' => $client->withBasicAuth(
                username: $tokenOrUsername,
                password: $typeOrPasswd
            ),
            'digest' => $client->withDigestAuth(
                username: $tokenOrUsername,
                password: $typeOrPasswd
            ),
            'token' => $client->withToken(
                token: $tokenOrUsername,
                type: $typeOrPasswd ?? 'Bearer'
            ),
            default => throw AuthenticationException::inauthentic()
        };
    }
}
