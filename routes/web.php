<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Auth::routes();


// Fazer um OVERWRITE dos routes AUTH
 // Authentication Routes...
        $this->get('/login', 'Auth\LoginController@showLoginForm')->name('showlogin');
        $this->post('/login', 'Auth\LoginController@login')->name('login');
        $this->post('logout', 'Auth\LoginController@logout')->name('logout');

        
            $this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('showregister');
            $this->get('cadastrar', 'Auth\RegisterController@showRegistrationForm')->name('showregister');
            $this->post('register', 'Auth\RegisterController@register')->name('register');
        

        // Password Reset Routes...
        $this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
        $this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
        $this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
        $this->post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');











// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', 'PagesController@logout')->name('logout');


	// Routes para paginas
	Route::get('/', 'PagesController@index')->name('landing-page');
	Route::get('/home', 'PagesController@index')->name('home');
	// Routes para Procurar
		Route::get('/procurar', 'PagesController@procurar')->name('procurar');
	








// Routes apenas pelo Administrador, Funcionario e Candidato
Route::name('admin.')->prefix('funcionario')->middleware(['funcionario'])->group(function () {
		
		// Dashboard do funcionario
		Route::get('/', 'FuncionarioController@index')->name('dashboard');
		Route::get('/listar-candidatos', 'FuncionarioController@listarCandidatos')->name('listar-candidatos');
		Route::get('/listar-inscritos', 'FuncionarioController@listarInscritos')->name('listar-inscritos');
		
			
		Route::get('/listar-escolas', 'FuncionarioController@listarEscolas')->name('listar-escolas');
			Route::get('/registar-escolas', 'FuncionarioController@registarEscolasCreate')->name('registar-escolas-show');
			Route::post('/registar-escolas', 'FuncionarioController@registarEscolasStore')->name('registar-escolas-store');
		

		Route::get('/listar-funcionarios', 'FuncionarioController@listarFuncionarios')->name('listar-funcionarios')->middleware('admin');
			Route::get('/registar-funcionarios', 'FuncionarioController@registarFuncionariosCreate')->name('registar-funcionarios-show')->middleware('admin');
			Route::post('/registar-funcionarios', 'FuncionarioController@registarFuncionariosStore')->name('registar-funcionarios-store')->middleware('admin');

		Route::get('/listar-todas-candidaturas', 'FuncionarioController@listarTodasCandidaturas')->name('listar-todas-candidaturas');
});










// Routes apenas pelo Candidato
	Route::post('/cadastrar', 'CandidatoController@store')->name('create');
	Route::get('/candidato/{id}', 'CandidatoController@showId')->name('candidato')->middleware('funcionario');
	Route::get('/candidatura/{id}/aceitar', 'CandidaturaController@aceitar')->name('candidatura.aceitar')->middleware('funcionario');
	Route::get('/candidatura/{id}/recusar', 'CandidaturaController@recusar')->name('candidatura.recusar')->middleware('funcionario');

Route::name('candidato.')->middleware(['candidato'])->group(function () {
	Route::get('/candidato', 'CandidatoController@index')->name('dashboard');
	Route::get('/candidatura/{id}/delete', 'CandidaturaController@delete')->name('deleteCandidatura');
});










// Routes apenas para as ESCOLAS
Route::name('escola.')->group(function () {
		// Routes para Escola
		Route::get('/escola', 'EscolaController@index')->name('escola');
		Route::get('/escola/{id}', 'EscolaController@escolaId')->name('escola');

		Route::get('/escola/{id}/editar', 'EscolaController@editShow')->name('edit')->middleware('funcionario');
			Route::put('/escola/{id}/editar', 'EscolaController@edit')->name('edit')->middleware('funcionario');
		
		Route::get('/escola/{id}/editar/classe', 'EscolaController@edit')->name('edit-classe')->middleware('funcionario');

		Route::get('/escola/{id}/candidatura', 'CandidaturaController@adicionarShow')->name('candidaturaShow')->middleware('can:isCandidato');
			Route::post('/escola/{idEscola}/candidatura', 'CandidaturaController@store')->name('candidaturaStore')->middleware('can:isCandidato');

		Route::get('/escola/{id}/candidaturas', 'EscolaController@listaCandidatos')->name('lista-candidatos')->middleware('funcionario');
});




