<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdutosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('produtos')->insert(
            [
            'nome' => 'Programo Todo Dia',
            'id_categoria' => '5',
            'preco' => 21.2,
            'quantidade' =>99

            ]
                                      );
    }
}
