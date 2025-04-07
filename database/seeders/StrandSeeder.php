<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('strands')->insert([
            [
                'strand' => 'ICT'
            ],

            [
                'strand' => 'ABM'
            ],

            [
                'strand' => 'STEM'
            ],

            [
                'strand' => 'HUMMS'
            ],
        ]);
    }
}
