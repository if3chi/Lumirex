<?php

declare(strict_types=1);

namespace If3chi\Lumirex\Facades;

use Illuminate\Support\Facades\Facade;
use If3chi\Lumirex\Lumirex as BaseLumirex;

/**
 * @see \If3chi\Lumirex\Lumirex
 */
class Lumirex extends Facade
{
    protected static function getFacadeAccessor()
    {
        return BaseLumirex::class;
    }
}
