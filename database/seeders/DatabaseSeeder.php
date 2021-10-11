<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Deseja Limpar o BD e começar tudo de novo?
        if ($this->command->confirm('Você quer fazer limpar os dados do BD?')) {
            $this->command->call('migrate:refresh');
            $this->command->warn("Dados apagados, iniciando com BD Limpo!");
        }

		//disable foreign key check for this connection before running seeders
		// DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // A ordem aqui é importante
        // Não é necessário importar as Classes
        $this->call(UserSeeder::class);
        $this->command->info(' == CRIADO USERS ==');

        $this->call(MarcaSeeder::class);
        $this->command->info(' == CRIADO MARCAS ==');

        $this->call(ModeloSeeder::class);
        $this->command->info(' == CRIADO MODELOS ==');

        // \App\Models\User::factory(10)->create();
        // \App\Models\Carros::factory(10)->create();
        // $this->call(CarroSeeder::class);

		// supposed to only apply to a single connection and reset it's self
		// but I like to explicitly undo what I've done for clarity
		// DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
