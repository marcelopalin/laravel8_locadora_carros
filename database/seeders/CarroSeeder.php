<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Carro;

class CarroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //instanciando o objeto
        $carro = new Carro();
        $carro->placa = 'FTV1000';
        $carro->disponivel = true;
        $carro->km = 30000;
        $carro->save();

        //o método create (atenção para o atributo fillable da classe)
        Carro::create([
            'placa' => 'FTV2000',
            'disponivel' => false,
            'km' => 152344,
        ]);

        //insert
        DB::table('carros')->insert([
            'placa' => 'FTV3000',
            'disponivel' => true,
            'km' => 120555,
        ]);
    }
}
