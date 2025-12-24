<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CausaVentaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $causas = [
            'ABSCESO',
            'ANESTRICA',
            'APLOMO',
            'ARTRITIS',
            'BAJO DESARROLLO',
            'BAJO PESO',
            'CELO ATIPICO',
            'FENOTIPO',
            'HERNIA',
            'LINEA MAMAREA',
            'NEOPLASIA ABDOMINAL',
            'PODALES',
            'SANGRADO VAGINAL',
            'SIFOSIS',
            'SPA',
            'VENTA EXTERNA',
            'VULVA INFANTIL',
            'DEFORMIDAD',
            'TENDONITIS',
            'PRB. TEJIDO B.M.A',
            'PRB. ARTICULAR M.P',
            'CASTRADO',
            'GENETICA',
        ];

        $data = [];
        foreach ($causas as $causa) {
            $data[] = [
                'nombre' => $causa,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('causas_venta')->insert($data);
    }
}
