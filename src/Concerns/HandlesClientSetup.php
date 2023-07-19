<?php

declare(strict_types=1);

namespace If3chi\Lumirex\Concerns;

use Carbon\CarbonInterval;

trait HandlesClientSetup
{
    public function retry(): int
    {
        return 3;
    }

    public function retryTiming(): float
    {
        return CarbonInterval::millisecond(300)
            ->totalMilliseconds;
    }

    public function timeout(): float
    {
        return CarbonInterval::seconds(10)->totalSeconds;
    }
}
