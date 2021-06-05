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
    protected $description = 'Tick tock the application is not dead I guess.';

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
        $this->comment('Tick tock the application is not dead I guess.');
        Log::info("Heartbeat uhhh...beated?");
        return 0;
    }
}
