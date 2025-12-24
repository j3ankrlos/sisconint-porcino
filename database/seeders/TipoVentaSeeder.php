<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoVentaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tiposVenta = [
            ['nombre' => 'COLA', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'DESCARTE', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'PRIMERA', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'SAMAN', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'EXTERNO', 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('tipos_venta')->insert($tiposVenta);
    }
}
