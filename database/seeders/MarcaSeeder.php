<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Marca;
use DB;

class MarcaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Três Maneiras de Inserirmos

        //1) instanciando o objeto
        $marca = new Marca();
        $marca->nome = 'FORD';
        $marca->imagem = 'ford.png';
        $marca->save();

        //2) o método create (atenção para o atributo fillable da classe)
        Marca::create([
            'nome' => 'BMW',
            'imagem' => 'bmw.png',
        ]);

        //insert
        DB::table('marcas')->insert([
            'nome' => 'FIAT',
            'imagem' => 'fiat.png',
        ]);
    }
}
