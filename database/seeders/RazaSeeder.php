<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RazaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $razas = [
            ['nombre' => 'DUROC-T', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'DUROC', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'F1', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'F2', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'LANDRACE', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'LAND-T', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'YORKSHIRE', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'YORK-T', 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('razas')->insert($razas);
    }
}
