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
                'id' => 1,
                'section_number' => 1101,
                'grade_level' => 11
            ],

            [
                'id' => 2,
                'section_number' => 1102,
                'grade_level' => 11
            ],

            [
                'id' => 3,
                'section_number' => 1103,
                'grade_level' => 11
            ],

            [
                'id' => 4,
                'section_number' => 1104,
                'grade_level' => 11
            ],

            [
                'id' => 5,
                'section_number' => 1105,
                'grade_level' => 11
            ],

            [
                'id' => 6,
                'section_number' => 1106,
                'grade_level' => 11
            ],

            [
                'id' => 7,
                'section_number' => 1107,
                'grade_level' => 11
            ],

            [
                'id' => 8,
                'section_number' => 1108,
                'grade_level' => 11
            ],

            [
                'id' => 9,
                'section_number' => 1109,
                'grade_level' => 11
            ],

            [
                'id' => 10,
                'section_number' => 1110,
                'grade_level' => 11
            ],

            [
                'id' => 11,
                'section_number' => 1111,
                'grade_level' => 11
            ],

            [
                'id' => 12,
                'section_number' => 1201,
                'grade_level' => 12
            ],

            [
                'id' => 13,
                'section_number' => 1202,
                'grade_level' => 12
            ],

            [
                'id' => 14,
                'section_number' => 1203,
                'grade_level' => 12
            ],
            
            [
                'id' => 15,
                'section_number' => 1204,
                'grade_level' => 12
            ],
            
            [
                'id' => 16,
                'section_number' => 1205,
                'grade_level' => 12
            ],

            [
                'id' => 17,
                'section_number' => 1206,
                'grade_level' => 12
            ],
        ]);
    }
}
