<?php

namespace If3chi\Lumirex\Commands;

use Illuminate\Console\Command;

class LumirexCommand extends Command
{
    public $signature = 'lumirex';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
