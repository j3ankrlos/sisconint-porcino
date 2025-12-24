<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeccionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Datos originales: GRANJA, NAVE, SECCION
        $data = [
            ['EST', 'G1', 'A'], ['EST', 'G1', 'B'], ['EST', 'G1', 'C'], ['EST', 'G1', 'D'], ['EST', 'G1', 'E'], ['EST', 'G1', 'F'],
            ['EST', 'G2', 'A'], ['EST', 'G2', 'B'], ['EST', 'G2', 'C'], ['EST', 'G2', 'D'], ['EST', 'G2', 'E'], ['EST', 'G2', 'F'],
            ['EST', 'G3', 'A'], ['EST', 'G3', 'B'], ['EST', 'G3', 'C'], ['EST', 'G3', 'D'], ['EST', 'G3', 'E'], ['EST', 'G3', 'F'],
            ['EST', 'G4', 'A'], ['EST', 'G4', 'B'], ['EST', 'G4', 'C'], ['EST', 'G4', 'D'], ['EST', 'G4', 'E'], ['EST', 'G4', 'F'],
            ['EST', 'G5', 'A'], ['EST', 'G5', 'B'], ['EST', 'G5', 'C'], ['EST', 'G5', 'D'], ['EST', 'G5', 'E'], ['EST', 'G5', 'F'],
            ['EXP', 'G6', 'A'], ['EXP', 'G6', 'B'], ['EXP', 'G6', 'C'], ['EXP', 'G6', 'D'], ['EXP', 'G6', 'E'], ['EXP', 'G6', 'F'],
            ['EXP', 'G7', 'A'], ['EXP', 'G7', 'B'], ['EXP', 'G7', 'C'], ['EXP', 'G7', 'D'], ['EXP', 'G7', 'E'], ['EXP', 'G7', 'F'],
            ['EXP', 'G8', 'A'], ['EXP', 'G8', 'B'], ['EXP', 'G8', 'C'], ['EXP', 'G8', 'D'], ['EXP', 'G8', 'E'], ['EXP', 'G8', 'F'],
            ['EXP', 'G9', 'A'], ['EXP', 'G9', 'B'], ['EXP', 'G9', 'C'], ['EXP', 'G9', 'D'], ['EXP', 'G9', 'E'], ['EXP', 'G9', 'F'],
            ['EST', 'LA', 'C'],
            ['EST', 'LB', 'C'],
            ['EXP', 'LE', 'C'],
            ['EST', 'MP1', 'A'], ['EST', 'MP1', 'B'], ['EST', 'MP1', 'C'], ['EST', 'MP1', 'D'],
            ['EXP', 'MP2', 'A'], ['EXP', 'MP2', 'B'], ['EXP', 'MP2', 'C'], ['EXP', 'MP2', 'D'],
            ['EST', 'PUB1', 'C'],
            ['EXP', 'PUB2', 'C'],
            ['EXP', 'PUB2-D', 'C'],
            ['EXP', 'PUB3', 'C'],
            ['EXP', 'RECRIA', '1A'], ['EXP', 'RECRIA', '1B'], ['EXP', 'RECRIA', '2A'], ['EXP', 'RECRIA', '2B'],
            ['EXP', 'RECRIA', '3A'], ['EXP', 'RECRIA', '3B'], ['EXP', 'RECRIA', '4A'], ['EXP', 'RECRIA', '4B'],
            ['EST', 'M1', 'S03'], ['EST', 'M1', 'S04'], ['EST', 'M1', 'S05'], ['EST', 'M1', 'S01'], ['EST', 'M1', 'S02'],
            ['EST', 'M1', 'S06'], ['EST', 'M1', 'S07'], ['EST', 'M1', 'S08'],
            ['EST', 'M2', 'S09'], ['EST', 'M2', 'S10'], ['EST', 'M2', 'S11'], ['EST', 'M2', 'S12'], ['EST', 'M2', 'S13'],
            ['EST', 'M2', 'S14'], ['EST', 'M2', 'S15'], ['EST', 'M2', 'S16'], ['EST', 'M2', 'S17'],
            ['EST', 'M3', 'S18'], ['EST', 'M3', 'S19'], ['EST', 'M3', 'S20'], ['EST', 'M3', 'S21'], ['EST', 'M3', 'S22'],
            ['EST', 'M3', 'S23'], ['EST', 'M3', 'S24'],
            ['EXP', 'M4', 'S25'], ['EXP', 'M4', 'S26'], ['EXP', 'M4', 'S27'], ['EXP', 'M4', 'S28'], ['EXP', 'M4', 'S29'],
            ['EXP', 'M4', 'S30'], ['EXP', 'M4', 'S31'], ['EXP', 'M4', 'S32'], ['EXP', 'M4', 'S33'],
            ['EXP', 'M5', 'S34'], ['EXP', 'M5', 'S35'], ['EXP', 'M5', 'S36'], ['EXP', 'M5', 'S37'], ['EXP', 'M5', 'S38'],
            ['EXP', 'M5', 'S39'], ['EXP', 'M5', 'S40'], ['EXP', 'M5', 'S41'],
        ];

        $secciones = [];
        
        foreach ($data as $row) {
            $granjaId = DB::table('granjas')->where('codigo', $row[0])->value('id');
            $naveId = DB::table('naves')
                ->where('granja_id', $granjaId)
                ->where('codigo', $row[1])
                ->value('id');
            
            if ($naveId) {
                $secciones[] = [
                    'nave_id' => $naveId,
                    'codigo' => $row[2],
                    'nombre' => 'Sección ' . $row[2],
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        DB::table('secciones')->insert($secciones);
    }
}
