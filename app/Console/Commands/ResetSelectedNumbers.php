<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ResetSelectedNumbers extends Command
{
    protected $signature = 'reset:selected-numbers';

    protected $description = 'Reset the selected flag for all numbers';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        DB::table('numbers')->update(['selected' => false]);

        $this->info('Selected flag for all numbers has been reset.');
    }
}
