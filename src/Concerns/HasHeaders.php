<?php

declare(strict_types=1);

namespace If3chi\Lumirex\Concerns;

trait HasHeaders
{
    public function headers(array $headers = []): array
    {
        return $headers + ['Accept' => 'application/json'];
    }
}
