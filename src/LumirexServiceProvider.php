<?php

declare(strict_types=1);

namespace If3chi\Lumirex;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LumirexServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package->name('lumirex');
    }
}
