<?php

namespace Krucas\LaravelUserEmailVerification\Console;

use Illuminate\Console\Command;

class ClearVerificationTokensCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'verification:clear-tokens {name? : The name of the verification broker}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Flush expired verification tokens';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function fire()
    {
        $this->laravel['auth.verification']->broker($this->argument('name'))->getRepository()->deleteExpired();
        $this->info('Expired verification tokens cleared!');
    }
}
