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

        DB::table('school_years')->insert([
            [
                'year_start' => 2016,
                'year_end' => 2017,
                'school_year' => '2016 - 2017'
            ],

            [
                'year_start' => 2017,
                'year_end' => 2018,
                'school_year' => '2017 - 2018'
            ],

            [
                'year_start' => 2018,
                'year_end' => 2019,
                'school_year' => '2018 - 2019'
            ],

            [
                'year_start' => 2020,
                'year_end' => 2021,
                'school_year' => '2020 - 2021'
            ],

            [
                'year_start' => 2021,
                'year_end' => 2022,
                'school_year' => '2021 - 2022'
            ],

            [
                'year_start' => 2023,
                'year_end' => 2024,
                'school_year' => '2023 - 2024'
            ],

            [
                'year_start' => 2024,
                'year_end' => 2025,
                'school_year' => '2024 - 2025'
            ]
        ]);
    }
}
