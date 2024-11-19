<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CertificateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('certificates')->insert(['name' => 'U', 'description' => 'Suitable for all', 'filename' => "u.png"]);
        DB::table('certificates')->insert(['name' => 'PG', 'description' => 'Parental guidance', 'filename' => "pg.png"]);
        DB::table('certificates')->insert(['name' => '12a', 'description' => 'Suitable for twelve years and over', 'filename' => "12a.png"]);
        DB::table('certificates')->insert(['name' => '15', 'description' => 'Suitable for only for fifteen years and over', 'filename' => "15.png"]);
        DB::table('certificates')->insert(['name' => '18', 'description' => 'Suitable for only for eighteen years and over', 'filename' => "18.png"]);
    }
}
