<?php

use Illuminate\Database\Seeder;

class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('produtos')->insert(['nome' => 'Camiseta', 'categoria_id' => 1]);
        DB::table('produtos')->insert(['nome' => 'Blusa', 'categoria_id' => 1]);
        DB::table('produtos')->insert(['nome' => 'Computador', 'categoria_id' => 2]);
        DB::table('produtos')->insert(['nome' => 'Notebook', 'categoria_id' => 2]);
        DB::table('produtos')->insert(['nome' => 'Jequiti', 'categoria_id' => 3]);
        DB::table('produtos')->insert(['nome' => 'Natura', 'categoria_id' => 3]);
        DB::table('produtos')->insert(['nome' => 'Casa', 'categoria_id' => 4]);
        DB::table('produtos')->insert(['nome' => 'Apartamento', 'categoria_id' => 4]);
        DB::table('produtos')->insert(['nome' => 'Maça', 'categoria_id' => 5]);
        DB::table('produtos')->insert(['nome' => 'Banana', 'categoria_id' => 5]);
        DB::table('produtos')->insert(['nome' => 'Nike', 'categoria_id' => 6]);
        DB::table('produtos')->insert(['nome' => 'Adidas', 'categoria_id' => 6]);
    }
}
