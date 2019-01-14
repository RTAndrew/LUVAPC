<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Session;

use App\Escola;
use App\Escola_Classe;
use App\User;
use App\Candidatura;
use App\Classe;

class EscolaController extends Controller
{
    



	public function index() {

        return view('pages.escola.escola');

	}






	public function escolaId($id) {

		$escola = Escola::where('id', $id)->firstOrFail();

		// Verificar se o usuario esta LOGADO
		if (Auth::check()) {

			if (Auth::user()->perfil == 'candidato') {
				// Pegar os dados do USUARIO com o CANDIDATO
				$user = User::find(Auth::user()->id)->candidato;

			    $candidaturaFind = Candidatura::where('candidato_id', $user->id)->get();
				$num_candidaturas = false; //Inicializar a variavel com FALSE
			    
			    // Fazer o numero de contagem de candidaturas
			    if ($candidaturaFind->count() >= 3) {
			    	$num_candidaturas = true;
			    	Session::flash('warning', 'Atingiu o limite máximo de candidaturas');
			    }
				

				return view('pages.escola.escola')
				->with('escola', $escola)
				->with('num_candidaturas', $num_candidaturas);
				
			}

		}

		return view('pages.escola.escola')
		->with('escola', $escola);


		// return $escola->classes;

	}


	public function editShow($id) {

		$escola = Escola::find($id);

		return view('pages.escola.edit-escola')
		->with('escola', $escola);
	}


			public function edit(Request $request, $id) {
	
				$escola = Escola::find($id);

				// Validar o REQUEST
				$this->validate($request, [
		            'nome' => 'required|min:10|max:60',
		            'email' => 'email',
		            'director' => 'required|min:10|max:60',
		            'telefone' => 'required|min:9|max:16',
		            'endereco' => 'required|min:5|max:60',
		            'escola_vaga' => 'required|',
		        ]);

					$escola->nome = $request->get('nome');
					$escola->email = $request->get('email');
					$escola->director = $request->get('director');
					$escola->endereco = $request->get('endereco');
					$escola->num_vaga = $request->get('escola_vaga');
					$escola->telefone = $request->get('telefone');
					

		        if($escola->save()) {
		        	Session::flash('success', 'Operação efectuada com sucesso!');
		        	return back();
		        }
			}


	public function listaCandidatos($id) {

		$escola = Escola::where('id', $id)->firstOrFail();

		$candidaturas = DB::table('candidaturas')
            ->join('candidatos', 'candidatos.id', '=', 'candidaturas.candidato_id')
            ->join('escola_classe', 'candidaturas.escola_classe_id', '=', 'escola_classe.id')
            ->join('escolas', 'escola_classe.escola_id', '=', 'escolas.id')
            ->join('classes', 'escola_classe.classe_id', '=', 'classes.id')
            ->where('escolas.id', $id)
            ->select('candidatos.nome as candidato_nome', 'candidatos.endereco as candidato_endereco','candidaturas.id as candidatura_id', 'candidaturas.documento_url',  'candidaturas.estado as candidatura_estado', 'candidaturas.created_at','escolas.nome as escola_nome', 'escolas.id as escola_id','classes.nome as classe_nome', 'classes.turno')
            ->get();

        return view('pages.escola.candidaturas')
        ->with('escola', $escola)
		->with('candidaturas', $candidaturas);
	}


}
