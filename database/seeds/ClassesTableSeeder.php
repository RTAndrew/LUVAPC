<?php

use Illuminate\Database\Seeder;

class ClassesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
    	DB::table('classes')->insert([
            'nome' => '7ª Classe',
            'turno' => 'Manhã',
        ]);
        
    	DB::table('classes')->insert([
            'nome' => '7ª Classe',
            'turno' => 'Tarde',
        ]);
        
    	DB::table('classes')->insert([
            'nome' => '7ª Classe',
            'turno' => 'Noite',
        ]);






        
    	DB::table('classes')->insert([
            'nome' => '8ª Classe',
            'turno' => 'Manhã',
        ]);
        
    	DB::table('classes')->insert([
            'nome' => '8ª Classe',
            'turno' => 'Tarde',
        ]);
        
    	DB::table('classes')->insert([
            'nome' => '8ª Classe',
            'turno' => 'Noite',
        ]);






        
    	DB::table('classes')->insert([
            'nome' => '9ª Classe',
            'turno' => 'Manhã',
        ]);
        
    	DB::table('classes')->insert([
            'nome' => '9ª Classe',
            'turno' => 'Tarde',
        ]);
        
    	DB::table('classes')->insert([
            'nome' => '9ª Classe',
            'turno' => 'Noite',
        ]);









    }
}
