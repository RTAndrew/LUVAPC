<?php

use Illuminate\Database\Seeder;

class EscolasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        

    	DB::table('escolas')->insert([
            'nome' => 'Escola 3024',
            'director' => 'Sebastião Caxito Moisés',
            'telefone' => '222 996 546',
            'email' => '3024@escola.gov.ao',
            'endereco' => 'Ingombotas, Bairro Azul',
            'num_vaga' => 150
        ]);        

    	DB::table('escolas')->insert([
            'nome' => 'Escola 2021',
            'director' => 'Tinia Mbuaga Mfusuku',
            'telefone' => '966859239',
            'email' => '2021@escola.gov.ao',
            'endereco' => 'Ingombotas, Mutamba',
            'num_vaga' => 160
        ]);       

        DB::table('escolas')->insert([
            'nome' => 'Escola 5661',
            'director' => 'Judith Margoso Cunha',
            'telefone' => '222 457 623',
            'email' => '5661@escola.gov.ao',
            'endereco' => 'Cacuaco, Bairro do Kikolo',
            'num_vaga' => 40
        ]);       

        DB::table('escolas')->insert([
            'nome' => 'Escola 2023',
            'director' => 'Makiesse Juventude Mpemba',
            'telefone' => '222 459 993',
            'email' => '2023@escola.gov.ao',
            'endereco' => 'Cacuaco, Bairro do Panguila',
            'num_vaga' => 85
        ]);    

        DB::table('escolas')->insert([
            'nome' => 'Escola 3031',
            'director' => 'Makuta Luís Inácio',
            'telefone' => '222 482 225',
            'email' => '3031@escola.gov.ao',
            'endereco' => 'Cazenga, Bairro da Mabor',
            'num_vaga' => 180
        ]); 

        DB::table('escolas')->insert([
            'nome' => 'Escola 3011',
            'director' => 'Ferreira Simão',
            'telefone' => '222 482 335',
            'email' => '3011@escola.gov.ao',
            'endereco' => 'Icolo e Bengo, Comuna do calomboca',
            'num_vaga' => 66
        ]);

        DB::table('escolas')->insert([
            'nome' => 'Escola 3015',
            'director' => 'Moisés Rebelo do Nascimento',
            'telefone' => '222 882 335',
            'email' => '3015@escola.gov.ao',
            'endereco' => 'Kilamba Kiaxi, Cassequel do Buraco',
            'num_vaga' => 163
        ]);

        DB::table('escolas')->insert([
            'nome' => 'Escola 4029',
            'director' => 'Fernanda Maria',
            'telefone' => '222 882 115',
            'email' => '4029@escola.gov.ao',
            'endereco' => 'Maianga, Bairro do Cassenda',
            'num_vaga' => 192
        ]);

        DB::table('escolas')->insert([
            'nome' => 'Escola 4026',
            'director' => 'Rodriges Maximiliano',
            'telefone' => '222 882 115',
            'email' => '4026@escola.gov.ao',
            'endereco' => 'Samba, Bairro do Katinton',
            'num_vaga' => 60
        ]);

    	DB::table('escolas')->insert([
            'nome' => 'Escola 4036',
            'director' => 'Dolores Ribeiro Chipango',
            'telefone' => '222 882 115',
            'email' => '4036@escola.gov.ao',
            'endereco' => 'Viana, Vila de Viana',
            'num_vaga' => 90
        ]);


    }
}
