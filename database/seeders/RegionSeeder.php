<?php

namespace Database\Seeders;

use App\Models\Region;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = [
            ['name' => 'Arica y Parinacota', 'short' => 'AP'],
            ['name' => 'Tarapacá', 'short' => 'TA'],
            ['name' => 'Antofagasta', 'short' => 'AN'],
            ['name' => 'Atacama', 'short' => 'AT'],
            ['name' => 'Coquimbo', 'short' => 'CO'],
            ['name' => 'Valparaiso', 'short' => 'VA'],
            ['name' => 'Metropolitana de Santiago', 'short' => 'RM'],
            ['name' => 'Libertador General Bernardo O\'Higgins', 'short' => 'OH'],
            ['name' => 'Maule', 'short' => 'MA'],
            ['name' => 'Ñuble', 'short' => 'NB'],
            ['name' => 'Biobío', 'short' => 'BI'],
            ['name' => 'La Araucanía', 'short' => 'IAR'],
            ['name' => 'Los Ríos', 'short' => 'LR'],
            ['name' => 'Los Lagos', 'short' => 'LL'],
            ['name' => 'Aysén del General Carlos Ibáñez del Campo', 'short' => 'AI'],
            ['name' => 'Magallanes y de la Antártica Chilena', 'short' => 'MG']
        ];
        Region::insert($data);
    }
}
