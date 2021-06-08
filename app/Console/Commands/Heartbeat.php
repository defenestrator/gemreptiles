<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class Heartbeat extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'heartbeat';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Checkology heartbeat.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        if (config('app.env') == "production" || config('app.env') == "development") {
            $this->comment('The gemreptiles.com application is running smoothly!');
            Log::info("'The gemreptiles.com application is running smoothly!'");
        } else {
            $this->comment('This command only executes on production');
            // But not really, it runs on development too
        }
        return 0;
    }
}
