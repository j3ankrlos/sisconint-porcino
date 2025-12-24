<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NaveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Obtener IDs de granjas
        $estId = DB::table('granjas')->where('codigo', 'EST')->value('id');
        $expId = DB::table('granjas')->where('codigo', 'EXP')->value('id');

        $naves = [
            // Naves de EST
            ['granja_id' => $estId, 'codigo' => 'G1', 'nombre' => 'Nave G1'],
            ['granja_id' => $estId, 'codigo' => 'G2', 'nombre' => 'Nave G2'],
            ['granja_id' => $estId, 'codigo' => 'G3', 'nombre' => 'Nave G3'],
            ['granja_id' => $estId, 'codigo' => 'G4', 'nombre' => 'Nave G4'],
            ['granja_id' => $estId, 'codigo' => 'G5', 'nombre' => 'Nave G5'],
            ['granja_id' => $estId, 'codigo' => 'LA', 'nombre' => 'Nave LA'],
            ['granja_id' => $estId, 'codigo' => 'LB', 'nombre' => 'Nave LB'],
            ['granja_id' => $estId, 'codigo' => 'MP1', 'nombre' => 'Nave MP1'],
            ['granja_id' => $estId, 'codigo' => 'PUB1', 'nombre' => 'Nave PUB1'],
            ['granja_id' => $estId, 'codigo' => 'M1', 'nombre' => 'Nave M1'],
            ['granja_id' => $estId, 'codigo' => 'M2', 'nombre' => 'Nave M2'],
            ['granja_id' => $estId, 'codigo' => 'M3', 'nombre' => 'Nave M3'],
            
            // Naves de EXP
            ['granja_id' => $expId, 'codigo' => 'G6', 'nombre' => 'Nave G6'],
            ['granja_id' => $expId, 'codigo' => 'G7', 'nombre' => 'Nave G7'],
            ['granja_id' => $expId, 'codigo' => 'G8', 'nombre' => 'Nave G8'],
            ['granja_id' => $expId, 'codigo' => 'G9', 'nombre' => 'Nave G9'],
            ['granja_id' => $expId, 'codigo' => 'LE', 'nombre' => 'Nave LE'],
            ['granja_id' => $expId, 'codigo' => 'MP2', 'nombre' => 'Nave MP2'],
            ['granja_id' => $expId, 'codigo' => 'PUB2', 'nombre' => 'Nave PUB2'],
            ['granja_id' => $expId, 'codigo' => 'PUB2-D', 'nombre' => 'Nave PUB2-D'],
            ['granja_id' => $expId, 'codigo' => 'PUB3', 'nombre' => 'Nave PUB3'],
            ['granja_id' => $expId, 'codigo' => 'RECRIA', 'nombre' => 'Nave RECRIA'],
            ['granja_id' => $expId, 'codigo' => 'M4', 'nombre' => 'Nave M4'],
            ['granja_id' => $expId, 'codigo' => 'M5', 'nombre' => 'Nave M5'],
        ];

        foreach ($naves as &$nave) {
            $nave['created_at'] = now();
            $nave['updated_at'] = now();
        }

        DB::table('naves')->insert($naves);
    }
}
