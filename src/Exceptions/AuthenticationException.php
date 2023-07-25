<?php

declare(strict_types=1);

namespace If3chi\Lumirex\Exceptions;

use Exception;

final class AuthenticationException extends Exception
{
    public static function inauthentic(string $msg = 'Invalid Auth Strategy', int $code = 422)
    {
        return new self(message: $msg, code: $code);
    }
}
