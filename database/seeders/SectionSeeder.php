<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sections')->insert([
            [
                'section_number' => 1101,
                'grade_level' => 11
            ],

            [
                'section_number' => 1102,
                'grade_level' => 11
            ],

            [
                'section_number' => 1103,
                'grade_level' => 11
            ],

            [
                'section_number' => 1104,
                'grade_level' => 11
            ],

            [
                'section_number' => 1105,
                'grade_level' => 11
            ],

            [
                'section_number' => 1106,
                'grade_level' => 11
            ],

            [
                'section_number' => 1107,
                'grade_level' => 11
            ],

            [
                'section_number' => 1108,
                'grade_level' => 11
            ],

            [
                'section_number' => 1109,
                'grade_level' => 11
            ],

            [
                'section_number' => 1110,
                'grade_level' => 11
            ],

            [
                'section_number' => 1111,
                'grade_level' => 11
            ],

            [
                'section_number' => 1201,
                'grade_level' => 12
            ],

            [
                'section_number' => 1202,
                'grade_level' => 12
            ],

            [
                'section_number' => 1203,
                'grade_level' => 12
            ],
            
            [
                'section_number' => 1204,
                'grade_level' => 12
            ],
            
            [
                'section_number' => 1205,
                'grade_level' => 12
            ],

            [
                'section_number' => 1206,
                'grade_level' => 12
            ],
        ]);
    }
}
