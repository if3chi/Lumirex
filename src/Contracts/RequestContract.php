<?php

declare(strict_types=1);

namespace If3chi\Lumirex\Contracts;

use JustSteveKing\UriBuilder\Uri;

interface RequestContract
{
    public function headers(array $headers = []): array;
    public function payload(array $payload = []): array;
    public function parameters(array $parameters = []): array;
    public function method(): string;
    public function uri(): Uri;
    public function requiesAuth(): bool;
    public function authStrategy(): ?string;
    public function authCredentials(): ?array;
    public function retry(): int;
    public function retryTiming(): float;
    public function timeout(): float;
    public function path(?string $path = null): ?string;
    public function fragment(): ?string;
}
