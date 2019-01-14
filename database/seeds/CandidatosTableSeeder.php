<?php

use Illuminate\Database\Seeder;

class CandidatosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('candidatos')->insert([
            'nome' => 'Hermenegildo Margoso Fernandes',
            'sexo' => 'Masculino',
            'data_nascimento' => '1991-11-20',
            'bi_numero' => '000052DL9911',
            'bi_url' => '',
            'telefone' => '941666730',
            'email' => 'brexit@uk.uk',
            'endereco' => 'Samba, Morro da Luz',
            'user_id' => 3,
        ]);

        DB::table('candidatos')->insert([
            'nome' => 'Graça Paxe Filomento',
            'sexo' => 'Femenino',
            'data_nascimento' => '1981-12-25',
            'bi_numero' => '14520LA012458',
            'bi_url' => '',
            'telefone' => '998452443',
            'endereco' => 'Ingombotas, Miramar',
            'email' => 'gracapaxe@rhyta.com',
            'user_id' => 4,
        ]);

        DB::table('candidatos')->insert([
            'nome' => 'Janet Nsimba Luau',
            'sexo' => 'Femenino',
            'data_nascimento' => '2005-03-18',
            'bi_numero' => '004528UE012458',
            'bi_url' => '',
            'telefone' => '945856963',
            'endereco' => 'Vila-Alice, Rua da Suave',
            'email' => 'janetnsimba@armyspy.com',
            'user_id' => 5,
        ]);

        DB::table('candidatos')->insert([
            'nome' => 'Leila da Silva Vasconcelos Morais',
            'sexo' => 'Femenino',
            'data_nascimento' => '2002-06-11',
            'bi_numero' => '300308LA611772',
            'bi_url' => '',
            'telefone' => '944578222',
            'endereco' => 'Samba, Antigo Controlo',
            'email' => 'leilamorais@gmail.com',
            'user_id' => 6,
        ]);

        DB::table('candidatos')->insert([
            'nome' => 'Ada Lulu Bahati',
            'sexo' => 'Femenino',
            'data_nascimento' => '2005-04-30',
            'bi_numero' => '000311LA67472',
            'bi_url' => '',
            'telefone' => '921645589',
            'endereco' => 'Maianga, Cassequel do Buraco',
            'email' => 'adalulu@gmail.com',
            'user_id' => 7,
        ]);

        DB::table('candidatos')->insert([
            'nome' => 'Morais Pedroso Barros',
            'sexo' => 'Masculino',
            'data_nascimento' => '2002-01-23',
            'bi_numero' => '500508LA611772',
            'bi_url' => '',
            'endereco' => 'Ingombotas, Praia do Bispo',
            'telefone' => '933001001',
            'email' => 'moraispedroso@gmail.com',
            'user_id' => 8,
        ]);

        DB::table('candidatos')->insert([
            'nome' => 'Jafari Kwame Luvumbu',
            'sexo' => 'Masculino',
            'data_nascimento' => '2004-09-28',
            'bi_numero' => '090520ML006458',
            'bi_url' => '',
            'telefone' => '944578222',
            'endereco' => 'Maianga, Prenda',
            'email' => 'jafari@gmail.com',
            'user_id' => 9,
        ]);
    }
}


