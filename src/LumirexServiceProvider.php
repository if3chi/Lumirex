<?php

namespace If3chi\Lumirex;

use If3chi\Lumirex\Commands\LumirexCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

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
