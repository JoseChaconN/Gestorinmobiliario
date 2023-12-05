<?php

namespace Database\Seeders;

use App\Models\Bank;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data =[
            ['id' => 1, 'type' => 'Bancos', 'sbif_code' => '001', 'register_code' => NULL, 'name' => 'BANCO DE CHILE'],
            ['id' => 2, 'type' => 'Bancos', 'sbif_code' => '009', 'register_code' => NULL, 'name' => 'BANCO INTERNACIONAL'],
            ['id' => 3, 'type' => 'Bancos', 'sbif_code' => '014', 'register_code' => NULL, 'name' => 'SCOTIABANK CHILE'],
            ['id' => 4, 'type' => 'Bancos', 'sbif_code' => '016', 'register_code' => NULL, 'name' => 'BANCO DE CREDITO E INVERSIONES'],
            ['id' => 5, 'type' => 'Bancos', 'sbif_code' => '027', 'register_code' => NULL, 'name' => 'CORPBANCA'],
            ['id' => 6, 'type' => 'Bancos', 'sbif_code' => '028', 'register_code' => NULL, 'name' => 'BANCO BICE'],
            ['id' => 7, 'type' => 'Bancos', 'sbif_code' => '031', 'register_code' => NULL, 'name' => 'HSBC BANK (CHILE)'],
            ['id' => 8, 'type' => 'Bancos', 'sbif_code' => '037', 'register_code' => NULL, 'name' => 'BANCO SANTANDER-CHILE'],
            ['id' => 9, 'type' => 'Bancos', 'sbif_code' => '039', 'register_code' => NULL, 'name' => 'BANCO ITAÚ CHILE'],
            ['id' => 10, 'type' => 'Bancos', 'sbif_code' => '049', 'register_code' => NULL, 'name' => 'BANCO SECURITY'],
            ['id' => 11, 'type' => 'Bancos', 'sbif_code' => '051', 'register_code' => NULL, 'name' => 'BANCO FALABELLA'],
            ['id' => 12, 'type' => 'Bancos', 'sbif_code' => '052', 'register_code' => NULL, 'name' => 'DEUTSCHE BANK (CHILE)'],
            ['id' => 13, 'type' => 'Bancos', 'sbif_code' => '053', 'register_code' => NULL, 'name' => 'BANCO RIPLEY'],
            ['id' => 14, 'type' => 'Bancos', 'sbif_code' => '054', 'register_code' => NULL, 'name' => 'RABOBANK CHILE (ex HNS BANCO)'],
            ['id' => 15, 'type' => 'Bancos', 'sbif_code' => '055', 'register_code' => NULL, 'name' => 'BANCO CONSORCIO (ex BANCO MONEX)'],
            ['id' => 16, 'type' => 'Bancos', 'sbif_code' => '056', 'register_code' => NULL, 'name' => 'BANCO PENTA'],
            ['id' => 17, 'type' => 'Bancos', 'sbif_code' => '057', 'register_code' => NULL, 'name' => 'BANCO PARIS'],
            ['id' => 18, 'type' => 'Bancos', 'sbif_code' => '504', 'register_code' => NULL, 'name' => 'BANCO BILBAO VIZCAYA ARGENTARIA, CHILE (BBVA)'],
            ['id' => 19, 'type' => 'Bancos', 'sbif_code' => '059', 'register_code' => NULL, 'name' => 'BANCO BTG PACTUAL CHILE'],
            ['id' => 20, 'type' => 'Bancos', 'sbif_code' => '017', 'register_code' => NULL, 'name' => 'BANCO DO BRASIL S.A.'],
            ['id' => 21, 'type' => 'Bancos', 'sbif_code' => '041', 'register_code' => NULL, 'name' => 'JP MORGAN CHASE BANK, N. A.'],
            ['id' => 22, 'type' => 'Bancos', 'sbif_code' => '043', 'register_code' => NULL, 'name' => 'BANCO DE LA NACION ARGENTINA'],
            ['id' => 23, 'type' => 'Bancos', 'sbif_code' => '045', 'register_code' => NULL, 'name' => 'THE BANK OF TOKYO-MITSUBISHI UFJ, LTD'],
            ['id' => 24, 'type' => 'Bancos', 'sbif_code' => '930', 'register_code' => NULL, 'name' => 'BCI - SUCURSAL MIAMI'],
            ['id' => 25, 'type' => 'Bancos', 'sbif_code' => '931', 'register_code' => NULL, 'name' => 'BANCO DEL ESTADO DE CHILE - SUCURSAL NUEVA YORK'],
            ['id' => 26, 'type' => 'Bancos', 'sbif_code' => '932', 'register_code' => NULL, 'name' => 'CORPBANCA - SUCURSAL NUEVA YORK'],
            ['id' => 27, 'type' => 'Bancos', 'sbif_code' => '012', 'register_code' => NULL, 'name' => 'BANCO DEL ESTADO DE CHILE'],
        ];
        Bank::insert($data);
    }
}
