<?php

declare(strict_types=1);

namespace If3chi\Lumirex\Concerns;

use If3chi\Lumirex\Lumirex;
use Illuminate\Http\Client\Response;

trait ForwardsRequests
{
    public static function __callStatic($name, $params): Response
    {
        return Lumirex::request(new static)
            ->$name(...$params)->send();
    }
}
