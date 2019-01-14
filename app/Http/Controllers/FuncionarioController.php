<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Session;

use App\Candidato;
use App\Escola;
use App\Escola_Classe;
use App\User;
use App\Classe;
use App\Funcionario;
use App\Candidatura;

class FuncionarioController extends Controller
{
    



	public function index() {
	// Session::flash('success', 'Página que tentou aceder encontra-se indisponível');


		$numeroTotalCandidatos = Candidato::count();
		$numeroTotalEscolas = Escola::count();
		$numeroTotalInscritos = Candidatura::count();

        return view('pages.admin.index')
        ->with('numeroTotalCandidatos', $numeroTotalCandidatos)
        ->with('numeroTotalInscritos', $numeroTotalInscritos)
        ->with('numeroTotalEscolas', $numeroTotalEscolas);

	}


	public function listarCandidatos() {

		$candidatos = Candidato::all();

		return view('pages.admin.listar-candidatos')
		->with('candidatos', $candidatos);
		
	}


	public function listarFuncionarios() {
		$funcionarios = Funcionario::all();

		return view('pages.admin.listar-funcionarios')
		->with('funcionarios', $funcionarios);
	}


			public function listarInscritos() {
				
				$inscricao = DB::table('inscricao')
	            ->join('candidaturas', 'candidaturas.id', '=', 'inscricao.candidatura_id')
	            ->join('candidatos', 'candidatos.id', '=', 'candidaturas.candidato_id')
	            ->join('escola_classe', 'escola_classe.id', '=', 'candidaturas.escola_classe_id')
	            ->join('escolas', 'escolas.id', '=', 'escola_classe.escola_id')
	            ->join('classes', 'classes.id', '=', 'escola_classe.classe_id')
	            ->select(
	            	'candidatos.nome as candidato_nome',
	            	'candidatos.id as candidato_id',
	            	'candidatos.sexo as candidato_sexo',
	            	'candidatos.data_nascimento as candidato_data_nascimento',
	            	'escolas.nome as escola_nome',
	            	'escolas.id as escola_id',
	            	'classes.nome as classe_nome',
	            	'classes.turno as classe_turno',
	            	'inscricao.created_at',
	            	'inscricao.id'
	            	)
	            ->get();

	            // return $inscricao;

				return view('pages.admin.listar-inscritos')
				->with('inscricao', $inscricao);
			}




		public function registarFuncionariosCreate() {
			return view('pages.admin.registar-funcionarios');
		}








			public function registarFuncionariosStore(Request $request) {

				// Validar o REQUEST
				$this->validate($request, [
		            'nome' => 'required|min:10|max:60',
		            'bi_numero' => 'required|min:9|max:14',
		            'data_nascimento' => 'required|date',
		            'telefone' => 'required|min:9|max:16',
		            'email' => 'required|email',
		        ]);




		        $user = new User([
	                'email' => $request->get('email'),
	                'perfil' => 'funcionario',
	                'password' => Hash::make('rodax'),
	            ]);

		        // Salvar a INSTANCIA
		        // Caso a INSTANCIA for executada
		        // Caso a instancia for executada
		        if($user->save()) {
		        	// Fazer a busca o USER salvo
		            $userFind = User::where('email', $request->get('email'))->firstOrFail();

		            // Armazenar o REQUEST
			        $funcionario = new Funcionario([
			            'nome' => $request->get('nome'),
			            'email' =>  $request->get('email'),
			            'sexo' =>  $request->get('sexo'),
			            'telefone' =>  $request->get('telefone'),
			            'bi_numero' =>  $request->get('bi_numero'),
			            'data_nascimento' =>  $request->get('data_nascimento'),
			            'user_id' =>  $userFind->id,
			        ]);

		            if($funcionario->save()){
		                // Fazer a autenticacao DIRECTA do usuario pelo ID
		                Session::flash('success', 'Operação efectuada com sucesso!');
		                return view('pages.admin.registar-funcionarios');
		            }
		        }
				return view('pages.admin.registar-funcionarios');
			}





















	public function listarEscolas() {

		$escolas = Escola::all();

		return view('pages.admin.listar-escolas')
		->with('escolas', $escolas);
		
	}




	public function registarEscolasCreate() {


		$classes = Classe::all();
		// $escola_classe = Escola_Classe::where('escola_id', $escola->id)->get();
		// return $classe;
		// return $escola_classe;
        return view('pages.admin.registar-escolas')
        ->with('classes', $classes);
		
	}


			public function registarEscolasStore(Request $request) {

				$classes = Classe::all();

				// Validar o REQUEST
				$this->validate($request, [
		            'nome' => 'required|min:10|max:60',
		            'email' => 'email',
		            'director' => 'required|min:10|max:60',
		            'telefone' => 'required|min:9|max:16',
		            'escola_vaga' => 'required|',
		            'classe_vaga' => 'required',
		            'endereco' => 'required|min:5|max:60',
		        ]);



				// Armazenar o REQUEST
		        $escola = new Escola([
		            'nome' => $request->get('nome'),
		            'email' =>  $request->get('email'),
		            'director' =>  $request->get('director'),
		            'telefone' =>  $request->get('telefone'),
		            'num_vaga' =>  $request->get('escola_vaga'),
		            'endereco' =>  $request->get('endereco'),
		        ]);


		        // Salvar a INSTANCIA
		        // Caso a INSTANCIA for executada
		        if($escola->save()) {
		            $escolaFind = Escola::where('email', $request->get('email'))->firstOrFail();

		            $escola_classe = new Escola_Classe([
		                'num_vaga' => $request->get('classe_vaga'),
		                'escola_id' => $escolaFind->id,
		                'classe_id' => $request->get('classe-turno'),
		            ]);



		            if($escola_classe->save()){
		                Session::flash('success', 'Operação efectuada com sucesso!');
		                return view('pages.admin.registar-escolas')
						->with('classes', $classes);
		            }
		        }

				
			}





	public function listarTodasCandidaturas() {

		$candidaturas = DB::table('candidaturas')
            ->join('candidatos', 'candidatos.id', '=', 'candidaturas.candidato_id')
            ->join('escola_classe', 'candidaturas.escola_classe_id', '=', 'escola_classe.id')
            ->join('escolas', 'escola_classe.escola_id', '=', 'escolas.id')
            ->join('classes', 'escola_classe.classe_id', '=', 'classes.id')
            ->where('candidaturas.estado', 'pendente')
            ->select('candidatos.nome as candidato_nome', 'candidatos.id as candidato_id','candidaturas.id as candidatura_id', 'candidaturas.estado as candidatura_estado','candidaturas.documento_url', 'candidaturas.created_at','escolas.nome as escola_nome', 'escolas.id as escola_id','classes.nome as classe_nome', 'classes.turno')
            ->get();

		return view('pages.admin.listar-todas-candidaturas')
		->with('candidaturas', $candidaturas);
	}


}
