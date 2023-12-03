<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NumbersTableSeeder extends Seeder
{
    public function run()
    {
        for ($i = 1; $i <= 75; $i++) {
            DB::table('numbers')->insert([
                'number' => $i,
                'selected' => false,
            ]);
        }
    }
}

