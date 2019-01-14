<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Session;

use App\Candidato;
use App\User;
use App\Escola_Classe;
use App\Candidatura;
use App\Escolas;
// use App\Projecto_txt;

class CandidatoController extends Controller
{
    



    public function index() {
        
        // $escola_classe = Escola_Classe::all();
        // $candidatura = Candidatura::with('escola_classe')->with('escolas')->get();

        $user = User::find(Auth::user()->id)->candidato;
        // return $user->candidato->id;    

        $candidaturas = DB::table('candidaturas')
            ->join('escola_classe', 'candidaturas.escola_classe_id', '=', 'escola_classe.id')
            ->join('escolas', 'escola_classe.escola_id', '=', 'escolas.id')
            ->join('classes', 'escola_classe.classe_id', '=', 'classes.id')
            ->where('candidato_id', $user->id)
            ->select('candidaturas.id as candidatura_id', 'candidaturas.documento_url', 'candidaturas.estado as candidatura_estado','candidaturas.created_at','escolas.nome as escola_nome', 'escolas.id as escola_id','classes.nome as classe_nome', 'classes.turno')
            ->get();
        // return $candidaturas;
        
        return view('pages.candidato.index')
        ->with('candidaturas', $candidaturas)
        ->with('user', $user);
        



        // return $user;
    }

	public function showId($id) {
		
        // $escola_classe = Escola_Classe::all();
        // $candidatura = Candidatura::with('escola_classe')->with('escolas')->get();

        $candidato = Candidato::find($id);
        // return $user->candidato->id;    

        $candidaturas = DB::table('candidaturas')
            ->join('escola_classe', 'candidaturas.escola_classe_id', '=', 'escola_classe.id')
            ->join('escolas', 'escola_classe.escola_id', '=', 'escolas.id')
            ->join('classes', 'escola_classe.classe_id', '=', 'classes.id')
            ->where('candidato_id', $candidato->id)
            ->select('candidaturas.id as candidatura_id', 'candidaturas.documento_url', 'candidaturas.estado as candidatura_estado','candidaturas.created_at','escolas.nome as escola_nome', 'escolas.id as escola_id','classes.nome as classe_nome', 'classes.turno')
            ->get();
        // return $candidaturas;
        
        return view('pages.candidato.perfil')
        ->with('candidaturas', $candidaturas)
        ->with('candidato', $candidato);
        



        // return $user;
	}








	public function candidatura() {

        return view('pages.escola.candidatura');

	}



    public function store(Request $request) {

     

        $this->validate($request, [
            'nome' => 'required|min:10|max:60',
            'email' => 'email',
            'endereco' => 'required',
            'data_nascimento' => 'required|date',
            'bi_numero' => 'required|min:9|max:14',
            'telefone' => 'required|min:9|max:16',
            'password' => 'min:6|required|confirmed',
            'file' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);



        $user = new User([
            'email' => $request->get('email'),
            'password' =>  Hash::make( $request->get('password') ),
        ]);

        

        // Saber se existe um usuario
        $userFind = User::where('email', $request->get('email'))->get();
        
        if($userFind->count() > 0) {
            Session::flash('warning', 'Há um usuário duplicado. ');
            return back();
        }

        // Saber se existe um Candidato com o mesmo EMAIL
        $candidatoFind = Candidato::where('email', $request->get('email'))->get();
        
        if($candidatoFind->count() > 0) {
            Session::flash('warning', 'Há um usuário duplicado. ');
            return back();
        } else {
            // Saber se existe um Candidato com o mesmo BI
            $candidatoFind = Candidato::where('bi_numero', $request->get('bi_numero'))->get();
        
            if($candidatoFind->count() > 0) {
                Session::flash('warning', 'Há um candidato duplicado.');
                return back();
            } else {
            // Saber se existe um Candidato com o mesmo NOME
                $candidatoFind = Candidato::where('nome', $request->get('nome'))->get();
        
                if($candidatoFind->count() > 0) {
                    Session::flash('warning', 'Há um candidato duplicado.');
                    return back();
                }  
            }
        }

                        // Armazenar a imagem 
                            // cache the file
                            $file = $request->file('file');

                            // generate a new filename. getClientOriginalExtension() for the file extension
                            // $filename = $id . ' - candidatura - ' . time() . '.' . $file->getClientOriginalExtension();
                            $filename = 'bi/' . time() . '.' . $file->getClientOriginalExtension();

                            // save to storage/app/photos as the new $filename
                            $path = $file->storeAs('public', $filename);
                            // $path = $request->file('file')->store('public/bi');



        // Caso a instancia for executada
        if($user->save()) {
            $userFind = User::where('email', $request->get('email'))->firstOrFail();


            $candidato = new Candidato([
                'nome' => $request->get('nome'),
                'sexo' => $request->get('sexo'),
                'data_nascimento' => $request->get('data_nascimento'),
                'bi_numero' => $request->get('bi_numero'),
                'telefone' => $request->get('telefone'),
                'email' => $request->get('email'),
                'user_id' => $userFind->id,
                'bi_url' => $filename,
                'endereco' => $request->get('endereco'),
            ]);

            if($candidato->save()){

                Auth::loginUsingId($userFind->id);
                return view('pages.landing-page');
            }
        }

        return $userFind;
    }


}
