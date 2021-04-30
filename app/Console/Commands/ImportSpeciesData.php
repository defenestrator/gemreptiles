<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;


class ImportSpeciesData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'gsr:import-species';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import Species Data';

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
        return 'ding dong';

    }
}
