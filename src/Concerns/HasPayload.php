<?php

declare(strict_types=1);

namespace If3chi\Lumirex\Concerns;

trait HasPayload
{
    public function payload(array $payload = []): array
    {
        return ['body' => $payload + []];
    }
}
