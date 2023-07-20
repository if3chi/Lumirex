<?php

declare(strict_types=1);

namespace If3chi\Lumirex\Concerns;

trait HandlesAuthentication
{
    public function requiesAuth(): bool
    {
        return false;
    }

    public function authStrategy(): ?string
    {
        return null;
    }

    public function authCredentials(): null|array
    {
        return null;
    }
}
