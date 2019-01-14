<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('users')->insert([
            'email' => 'MaryMWatkins@dayrep.com',
            'password' =>  Hash::make( 'rodax' ),
            'perfil' => 'funcionario',
        ]);

        DB::table('users')->insert([
            'email' => 'TerryASalcido@teleworm.us',
            'password' =>  Hash::make( 'rodax' ),
            'perfil' => 'admin',
        ]);








        DB::table('users')->insert([
            'email' => 'brexit@uk.uk',
            'password' =>  Hash::make( 'rodax' ),
            'perfil' => 'candidato',
        ]);

        DB::table('users')->insert([
            'email' => 'gracapaxe@rhyta.com',
            'password' =>  Hash::make( 'rodax' ),
            'perfil' => 'candidato',
        ]);
        
        DB::table('users')->insert([
            'email' => 'janetnsimba@armyspy.com',
            'password' =>  Hash::make( 'rodax' ),
            'perfil' => 'candidato',
        ]);


        DB::table('users')->insert([
            'email' => 'leilamorais@gmail.com',
            'password' =>  Hash::make( 'rodax' ),
            'perfil' => 'candidato',
        ]);


        DB::table('users')->insert([
            'email' => 'adalulu@gmail.com',
            'password' =>  Hash::make( 'rodax' ),
            'perfil' => 'candidato',
        ]);

        DB::table('users')->insert([
            'email' => 'moraispedroso@gmail.com',
            'password' =>  Hash::make( 'rodax' ),
            'perfil' => 'candidato',
        ]);

        DB::table('users')->insert([
            'email' => 'jafari@gmail.com',
            'password' =>  Hash::make( 'rodax' ),
            'perfil' => 'candidato',
        ]);











    }
}
