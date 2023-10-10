<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BairroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('bairros')->insert([
            [
                'cidade_id' => '1',
                'bairro' => 'Bom Fim'
            ],
            [
                'cidade_id' => '1',
                'bairro' => 'Auxiliadora'
            ],
            [
                'cidade_id' => '1',
                'bairro' => 'Floresta'
            ],
            [
                'cidade_id' => '2',
                'bairro' => 'Itai'
            ],
            [
                'cidade_id' => '2',
                'bairro' => 'Medianeira'
            ],
            [
                'cidade_id' => '3',
                'bairro' => 'Cambuí'
            ],
            [
                'cidade_id' => '3',
                'bairro' => 'Barão Geraldo'
            ],
            [
                'cidade_id' => '4',
                'bairro' => 'Jardim Nazareth'
            ],
            [
                'cidade_id' => '4',
                'bairro' => 'Vila Bianchi'
            ],
            [
                'cidade_id' => '5',
                'bairro' => 'Lagoa da Conceição'
            ],
            [
                'cidade_id' => '5',
                'bairro' => 'Jurerê Internacional'
            ],
            [
                'cidade_id' => '6',
                'bairro' => 'Centro'
            ],
            [
                'cidade_id' => '6',
                'bairro' => 'Barra Velha'
            ],
        ]);
    }
}
