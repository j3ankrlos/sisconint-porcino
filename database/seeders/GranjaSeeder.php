<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GranjaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $granjas = [
            [
                'codigo' => 'EST',
                'nombre' => 'Establecida',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'codigo' => 'EXP',
                'nombre' => 'Expansión',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('granjas')->insert($granjas);
    }
}
