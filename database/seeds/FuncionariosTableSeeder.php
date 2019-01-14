<?php

use Illuminate\Database\Seeder;

class FuncionariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('funcionarios')->insert([
            'nome' => 'Mary M. Watkins',
            'sexo' => 'Femenino',
            'data_nascimento' => '05-08-1967',
            'bi_numero' => '5511113LA361',
            'telefone' => '929751123',
            'email' => 'MaryMWatkins@dayrep.com',
            'user_id' => 1
        ]);

        DB::table('funcionarios')->insert([
            'nome' => 'Terry A. Salcido',
            'sexo' => 'Masculino',
            'data_nascimento' => '05-08-2018',
            'bi_numero' => '5138541CC294',
            'telefone' => '988745624',
            'email' => 'TerryASalcido@teleworm.us',
            'user_id' => 2
        ]);
    }
}
