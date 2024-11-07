<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RacketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('rackets')->insert(['title'=> 'Astro 66', 'company' => 'Yonex', 'year' => 1975, 'level' => 'Beginner']);
        DB::table('rackets')->insert(['title'=> 'Sonic 55','company' => 'Li-ning', 'year' => 2010, 'level' => 'Amateur']);
        DB::table('rackets')->insert(['title'=> 'Xtream flex','company' => 'Victor', 'year' => 1989, 'level' => 'Professional'],);
    }
}
