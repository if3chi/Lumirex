<?php

namespace If3chi\Lumirex;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use If3chi\Lumirex\Commands\LumirexCommand;

class LumirexServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('lumirex')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_lumirex_table')
            ->hasCommand(LumirexCommand::class);
    }
}
