<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = [
            ['name' => 'Aguas Andinas', 'type' => 1],
            ['name' => 'Aguas Araucania', 'type' => 1],
            ['name' => 'Aguas Chanar', 'type' => 1],
            ['name' => 'Aguas Cordillera', 'type' => 1],
            ['name' => 'Aguas De Antofagasta', 'type' => 1],
            ['name' => 'Aguas Decima', 'type' => 1],
            ['name' => 'Aguas Del Valle', 'type' => 1],
            ['name' => 'Aguas Magallanes', 'type' => 1],
            ['name' => 'Aguas Manquehue', 'type' => 1],
            ['name' => 'Aguas Patagonia De Aysen', 'type' => 1],
            ['name' => 'Aguas Pirque S.A.', 'type' => 1],
            ['name' => 'Aguas San Isidro', 'type' => 1],
            ['name' => 'Aguas San Pedro', 'type' => 1],
            ['name' => 'Aprmarquesa', 'type' => 1],
            ['name' => 'As Poniente', 'type' => 1],
            ['name' => 'Brisaguas', 'type' => 1],
            ['name' => 'Coapec', 'type' => 1],
            ['name' => 'Coopagua', 'type' => 1],
            ['name' => 'Cossbo', 'type' => 1],
            ['name' => 'Eap Cruceral', 'type' => 1],
            ['name' => 'Emapal S.A.', 'type' => 1],
            ['name' => 'Essal', 'type' => 1],
            ['name' => 'Essbio', 'type' => 1],
            ['name' => 'Esval', 'type' => 1],
            ['name' => 'Nuevosur', 'type' => 1],
            ['name' => 'Sembcorp (Ex Aguas Chacabuco]', 'type' => 1],
            ['name' => 'Sembcorp (Ex Aguas Santiago]', 'type' => 1],
            ['name' => 'Sembcorp (Ex Aguas Servicomunal]', 'type' => 1],
            ['name' => 'Casa Blanca', 'type' => 2],
            ['name' => 'Cec Cooperativa Electrica Curico', 'type' => 2],
            ['name' => 'Cge S.A.', 'type' => 2],
            ['name' => 'Chilquinta', 'type' => 2],
            ['name' => 'Codiner', 'type' => 2],
            ['name' => 'Coelcha', 'type' => 2],
            ['name' => 'Coopelan', 'type' => 2],
            ['name' => 'Edelaysen', 'type' => 2],
            ['name' => 'Edelmag', 'type' => 2],
            ['name' => 'Eepa', 'type' => 2],
            ['name' => 'Enel Distribucion', 'type' => 2],
            ['name' => 'Enor Chile', 'type' => 2],
            ['name' => 'Frontel', 'type' => 2],
            ['name' => 'Litoral', 'type' => 2],
            ['name' => 'Luz Andes', 'type' => 2],
            ['name' => 'Luz Linares', 'type' => 2],
            ['name' => 'Luz Osorno', 'type' => 2],
            ['name' => 'Luz Parral', 'type' => 2],
            ['name' => 'Saesa', 'type' => 2],
            ['name' => 'Abastible Boletas', 'type' => 3],
            ['name' => 'Abastible Facturas', 'type' => 3],
            ['name' => 'Abastible N Cliente Granel', 'type' => 3],
            ['name' => 'Abastible N Cliente Medidor', 'type' => 3],
            ['name' => 'Abastible N Documento', 'type' => 3],
            ['name' => 'Abastible Rut', 'type' => 3],
            ['name' => 'Gas Sur S.A.', 'type' => 3],
            ['name' => 'Gasco Glp S.A.', 'type' => 3],
            ['name' => 'Gasco Magallanes', 'type' => 3],
            ['name' => 'Gasvalpo', 'type' => 3],
            ['name' => 'Lipigas Granel Envasado', 'type' => 3],
            ['name' => 'Lipigas Medidor', 'type' => 3],
            ['name' => 'Metrogas', 'type' => 3],
            ['name' => 'Uligas', 'type' => 3],
            ['name' => 'Gastos Comunes', 'type' => 4],
            ['name' => 'Electrica De Colina', 'type' => 2],
            ['name' => 'Agua Smapa', 'type' => 1],
            ['name' => 'Comunidad Feliz', 'type' => 4],
            ['name' => 'Tu Comunidad Online', 'type' => 4],
            ['name' => 'Edipro', 'type' => 4],
            ['name' => 'Edifito', 'type' => 4],
            ['name' => 'Conserje Virtual', 'type' => 4],
            ['name' => 'Nueva Atacama', 'type' => 1],
            ['name' => 'Solicitar Por Correo A Administracion', 'type' => 4],
            ['name' => 'Kastor', 'type' => 4],
            ['name' => 'No Aplica', 'type' => NULL],
            ['name' => 'Procity', 'type' => 4]
        ];
        Service::insert($data);

    }
}
