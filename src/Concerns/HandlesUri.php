<?php

declare(strict_types=1);

namespace If3chi\Lumirex\Concerns;

use JustSteveKing\UriBuilder\Uri;

trait HandlesUri
{
    public function uri(): Uri
    {
        $uri = Uri::fromString($this->baseUri);

        if (!empty($paths = $this->path())) {
            $uri->addPath($paths);
        }

        if (!empty($fragments = $this->fragment())) {
            $uri->addFragment($fragments);
        }

        if (!empty($parameters = $this->parameters())) {
            foreach ($parameters as $key => $value) {
                $uri->addQueryParam($key, $value, true);
            }
        }

        return $uri;
    }

    public function path(?string $path = null): ?string
    {
        return $path ?? $this->path;
    }

    public function parameters(array $parameters = []): array
    {
        return $parameters + [];
    }

    public function fragment(): ?string
    {
        return null;
    }
}
