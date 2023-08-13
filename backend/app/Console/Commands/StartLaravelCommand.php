<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class StartLaravelCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'laravel:start';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'The laravel command to start the development';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Artisan::call('key:generate');
        Artisan::call('l5-swagger:generate');
        Artisan::call('optimize:clear');
    }
}
