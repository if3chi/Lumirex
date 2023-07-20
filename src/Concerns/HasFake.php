<?php

declare(strict_types=1);

namespace If3chi\Lumirex\Concerns;

use Illuminate\Support\Facades\Http;

trait HasFake
{
    public static function fake(array|callable $callback = null): void
    {
        Http::fake($callback);
    }
}
