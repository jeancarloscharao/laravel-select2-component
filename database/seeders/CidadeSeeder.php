<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CidadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cidades')->insert([
            [
                'estado_id' => '1',
                'cidade' => 'Porto Alegre'
            ],
            [
                'estado_id' => '1',
                'cidade' => 'Eldorado do Sul'
            ],
            [
                'estado_id' => '2',
                'cidade' => 'Campinas'
            ],
            [
                'estado_id' => '2',
                'cidade' => 'Mogi Mirim'
            ],
            [
                'estado_id' => '3',
                'cidade' => 'Florianopolis'
            ],
            [
                'estado_id' => '3',
                'cidade' => 'Passo de Torres'
            ],
        ]);
    }
}
