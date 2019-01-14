<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Session;

use App\Escola;
use App\Escola_Classe;
use App\Candidatura;
use App\User;
use App\Inscricao;

class CandidaturaController extends Controller
{
    


	// O parametro tem como entrada o ID da escola
	public function adicionarShow($id) {

		$escola = Escola::where('id', $id)->with('classes')->firstOrFail();
		$escola_classe = Escola::all();
		$escola_classe = Escola_Classe::all();



				// Checkar o numero de candidaturas do CANDIDATO
				$user = User::find(Auth::user()->id)->candidato;
				$candidaturaFind = Candidatura::where('candidato_id', $user->id)->get();
				$num_candidaturas = false; //Inicializar a variavel com FALSE
			    
			    // Fazer o numero de contagem de candidaturas
			    if ($candidaturaFind->count() >= 3) {
			    	$num_candidaturas = true;
			    	Session::flash('warning', 'Atingiu o limite máximo de candidaturas');
			    		return view('pages.escola.escola')
				->with('escola', $escola)
				->with('num_candidaturas', $num_candidaturas);
			    }

        return view('pages.escola.candidatura')
        ->with('escola', $escola)
        ->with('escola_classe', $escola_classe);

	}

	











	public function store(Request $request, $idEscola) {
		$user = User::find(Auth::user()->id)->candidato;
		$id = $user->id;
		// return $id;

		// Validar o REQUEST
		$this->validate($request, [
            'file' => 'required|file|image|mimes:jpeg,png|max:2048',
        ]);

 		$escola_classe = Escola_Classe::where('escola_id', $idEscola)->where('classe_id', $request->get('classe-turno'))->firstOrFail();

		$r = 'rodax';
		// return $escola_classe->id;
	 	// Validar pra ver se tem um mesmo registo
		$candidaturaFind = Candidatura::where('candidato_id', $id)->where('escola_classe_id',  $escola_classe->id)->get();

		// return $candidaturaFind;
			if ($candidaturaFind->count() > 0) {
				Session::flash('warning', 'Já se encontra candidatado nesta escola, na mesma classe e no mesmo turno');
				return back();
			} 

		// Armazenar a imagem 
				// cache the file
			    $file = $request->file('file');

			    // generate a new filename. getClientOriginalExtension() for the file extension
			    // $filename = $id . ' - candidatura - ' . time() . '.' . $file->getClientOriginalExtension();
			    $filename = 'candidatura/' . $id . '-' . time() . '.' . $file->getClientOriginalExtension();

			    // save to storage/app/photos as the new $filename
			    $path = $file->storeAs('public/', $filename);

			    // dd($path);

		// Salvar instancia
		$candidatura = new Candidatura([
            'documento_url' => $filename,
            'candidato_id' => $id,
            'escola_classe_id' => $escola_classe->id,
        ]);
		
		if ($candidatura->save()){

			Session::flash('success', 'Operação efectuada com sucesso!');
	        return redirect()->action('CandidatoController@index');
		}


		// Caso chegar até aqui, nenhuma condição funcionou
		Session::flash('warning', 'Aconteceu um erro. Tente mais tarde!');
		return back();
	}











	public function delete($id) {
		


		$candidatura = Candidatura::find($id);
		$candidato_id = $candidatura->candidato_id;
		$documento = $candidatura->documento_url;

		$inscricao = Inscricao::where('candidatura_id', $id)->get();

		// Caso o estado da candidaturar for ACEITE
		// Trocar todas as candidaturas para PENDENTE 
		if ($candidatura->estado == 'Aceite') {
			
			Candidatura::where('candidato_id', $candidato_id)
				->where('estado', 'Duplicado')
	        	->update(['estado' => 'pendente']);


	        	$escola_classe = Escola_Classe::where('id', $candidatura->escola_classe_id)->get();
				$escola = Escola::where('id', $escola_classe->escola_id)->get();

		}


				// Caso haver um inscricao, eliminar...
				if($inscricao->count() >= 1){
					
					Inscricao::where('candidatura_id', $id)->delete();

				}

			
		$deleteRow = Candidatura::where('id', $id)->delete();

		if($deleteRow){
			Storage::delete('public/' . $documento);
			// if($escola_classe->count() > 0) {

			// 	$escola_classe->decrement('num_vaga_ocupado');
				
			// 	if ($escola->count() > 0) {
			// 		$escola->decrement('num_vaga_ocupado');
			// 	}
			// }


			Session::flash('success', 'Operação efectuada com sucesso!');
			return redirect()->action('CandidatoController@index');
		}
		Session::flash('warning', 'Occorreu um erro ao processar o seu pedido!');

		// return back();
		return redirect()->action('CandidatoController@index');
	}












	public function aceitar($id) {

		$funcionario = User::find(Auth::user()->id)->funcionario;

		$aceitar = Candidatura::find($id);

		$escola_classe = Escola_Classe::where('id', $aceitar->escola_classe_id)->firstOrFail();
		$escola = Escola::where('id', $escola_classe->escola_id)->firstOrFail();
		
		$candidato_id = $aceitar->candidato_id;
			


	    $isInscrito = Candidatura::where('candidato_id', $candidato_id)->where('estado', 'Aceite')->get();
// return $isInscrito->count();
	    // Saber se já existe outras inscricoes
	    if ($isInscrito->count() >= 1) {
			Session::flash('warning', 'O candidato já possui uma inscrição válida.');
			return back();
	    }

	    // Saber se já candidatura ja foi ACEITE
	    if ($aceitar->estado == 'Aceite') {
			Session::flash('warning', 'Impossivel inscrever um aluno que já se encontra inscrito.');
			return back();
	    }

			Candidatura::where('candidato_id', $candidato_id)
				->where('estado', 'pendente')
		        ->update(['estado' => 'Duplicado']);
	    


			$aceitar->estado = 'Aceite';

			if($aceitar->save()) {
				$concatenacao = 'A' . date('Y') . 'M' . date('M') . 'D' . date('d') . ' - C' . $aceitar->id . ' - c' . $aceitar->candidato_id;
				
				// Salvar instancia
				$inscricao = new Inscricao([
		            'candidatura_id' => $aceitar->id,
		            'funcionario_id' => $funcionario->id,
		            'codigo' => $concatenacao,
		        ]);



				if ($inscricao->save()) {

					// $escola_classe->increment('num_vaga_ocupado');
					// $escola->increment('num_vaga_ocupado');
					
					Session::flash('success', 'Operação efectuada com sucesso!');
				}

			} else {
				Session::flash('warning', 'Aconteceu um erro. Tente mais tarde!');
			}
	   

		return back();
	}










	public function recusar($id) {
		$aceitar = Candidatura::find($id);

		$aceitar->estado = 'Recusado';

		if($aceitar->save()) {
			Session::flash('success', 'Operação efectuada com sucesso!');
		} else {
			Session::flash('warning', 'Aconteceu um erro. Tente mais tarde!');
		}

		return back();
	}









}
