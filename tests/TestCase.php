<?php

declare(strict_types=1);

namespace If3chi\Lumirex\Tests;

use If3chi\Lumirex\LumirexServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app)
    {
        return [
            LumirexServiceProvider::class,
        ];
    }
}
