<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(FuncionariosTableSeeder::class);
        $this->call(CandidatosTableSeeder::class);
        $this->call(EscolasTableSeeder::class);
        $this->call(ClassesTableSeeder::class);
        $this->call(EscolaClasseTableSeeder::class);
        // $this->call(CandidaturaTableSeeder::class);
    }
}
