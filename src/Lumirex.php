<?php

declare(strict_types=1);

namespace If3chi\Lumirex;

use If3chi\Lumirex\Concerns\HasFake;
use If3chi\Lumirex\Contracts\RequestContract;

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
}
