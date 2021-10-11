<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
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
        $user = new User();
        $user->name = 'Palin';
        $user->email = 'palin@mail.com';
        $user->password = bcrypt('changeme');
        $user->save();

        //2) o método create (atenção para o atributo fillable da classe)
        user::create([
            'name' => 'admin',
            'email' => 'admin@mail.com',
            'password' => bcrypt('changeme'),
        ]);


    }
}
