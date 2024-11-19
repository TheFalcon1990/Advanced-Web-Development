<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FilmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('films')->insert(['title' => 'Jaws', 'year' => 1975, 'duration' => 124]);
        DB::table('films')->insert(['title' => 'Winter\'s Bone', 'year' => 2010, 'duration' => 100]);
        DB::table('films')->insert(['title' => 'Do The Right Thing', 'year' => 1989, 'duration' => 120]);
    }
}
