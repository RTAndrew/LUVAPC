<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Escola;
// use App\Nota;
// use App\Projecto_txt;

class PagesController extends Controller
{
    



	public function index() {

        return view('pages.landing');

	}

	public function procurar() {

		$escolas = Escola::with('classes')->orderBy('nome', 'asc')->get();
		
		 return view('pages.procurar')
		 ->with('escolas', $escolas);
		// return $escolas;
	}

	public function logout() {
		Auth::logout();
		return redirect()->route('landing-page');
	}
}
