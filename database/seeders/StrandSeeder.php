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
        // DB::table('users')->insert([
        //     'name' => 'Admin',
        //     'email' => 'shs_admin@email.com',
        //     'password' => bcrypt('password'),  // bcrypt the password
        // ]);

        DB::table('strands')->insert([
            [
                'id' => 1,
                'strand' => 'ICT'
            ],

            [
                'id' => 2,
                'strand' => 'ABM'
            ],

            [
                'id' => 3,
                'strand' => 'STEM'
            ],

            [
                'id' => 4,
                'strand' => 'HUMMS'
            ],

            [
                'id' => 5,
                'strand' => 'GAS'
            ],

            [
                'id' => 6,
                'strand' => 'HE'
            ],
        ]);

        DB::table('school_years')->insert([
            [
                'id' => 1,
                'year_start' => 2016,
                'year_end' => 2017,
                'school_year' => '2016 - 2017'
            ],

            [
                'id' => 2,
                'year_start' => 2017,
                'year_end' => 2018,
                'school_year' => '2017 - 2018'
            ],

            [
                'id' => 3,
                'year_start' => 2018,
                'year_end' => 2019,
                'school_year' => '2018 - 2019'
            ],

            [
                'id' => 4,
                'year_start' => 2020,
                'year_end' => 2021,
                'school_year' => '2020 - 2021'
            ],

            [
                'id' => 5,
                'year_start' => 2021,
                'year_end' => 2022,
                'school_year' => '2021 - 2022'
            ],

            [
                'id' => 6,
                'year_start' => 2023,
                'year_end' => 2024,
                'school_year' => '2023 - 2024'
            ],

            [
                'id' => 7,
                'year_start' => 2024,
                'year_end' => 2025,
                'school_year' => '2024 - 2025'
            ]
        ]);

        // DB::table('sections')->insert([
        //     'section_number' => 1205,
        //     'grade_level' => 12
        // ]);
    }
}
