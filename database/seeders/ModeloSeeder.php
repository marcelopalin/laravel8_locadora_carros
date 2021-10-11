<?php

namespace Database\Seeders;

use App\Models\Modelo;
use App\Models\Marca;
use Illuminate\Database\Seeder;

class ModeloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Três Maneiras de Inserirmos

        $marca = Marca::find(1);
        if ($marca){
            //1) instanciando o objeto
            $modelo = new Modelo();
            $modelo->marca_id = $marca->id;
            $modelo->imagem = 'ford_ka_1_0.png';
            $modelo->nome = 'Ford Ka 1.0';
            $modelo->numero_portas = 2;
            $modelo->lugares = 5;
            $modelo->air_bag = 1;
            $modelo->abs = 1;
            $modelo->save();
        }

        $marca = Marca::find(2);
        if ($marca){
            $modelo = new Modelo();
            $modelo->marca_id = $marca->id;
            $modelo->imagem = 'volkswagen_gol_1_0.png';
            $modelo->nome = 'Gol 1.0';
            $modelo->numero_portas = 4;
            $modelo->lugares = 5;
            $modelo->air_bag = 0;
            $modelo->abs = 0;
            $modelo->save();
        }



    }
}
