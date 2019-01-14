@extends('layouts.admin')







@section('admin.main')


   	<div class="admin-page">
   		
		

		<div class="container">

			<br>
			<br>
			
            <h1 class="dashboard__titulo"> Registar Escola </h1>
			@include('inc.flash-message')
			<div class="dashboard__wrapper">

				<form class="grid-x grid-padding-x login__form-wrapper" method="POST" action="{{ route('admin.registar-escolas-store') }}">
            	@csrf
				




					<div class="escola__director cell medium-12 large-12"> 
						<label for="name" class="col-md-4 col-form-label text-md-right"><b> {{ __('Nome') }} </b></label>

		                <div class="col-md-6">
		                    <input id="nome" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="nome" value="{{ old('name') }}" autofocus>

		                    @if ($errors->has('nome'))
		                        <span class="invalid-feedback" role="alert">
		                            <strong>{{ $errors->first('nome') }}</strong>
		                        </span>
		                    @endif
		                </div>
					</div>


					<div class="escola__director cell medium-12 large-12"> 
						<label for="name" class="col-md-4 col-form-label text-md-right"><b> {{ __('Director') }} </b></label>

		                <div class="col-md-6">
		                    <input id="director" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="director" value="{{ old('director') }}" autofocus>

		                    @if ($errors->has('director'))
		                        <span class="invalid-feedback" role="alert">
		                            <strong>{{ $errors->first('director') }}</strong>
		                        </span>
		                    @endif
		                </div>
					</div>


					<div class="escola__director cell medium-12 large-12"> 
						<label for="endereco" class="col-md-4 col-form-label text-md-right"><b> {{ __('Endereço') }} </b></label>

		                <div class="col-md-6">
		                    <input id="endereco" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="endereco" value="{{ old('endereco') }}" autofocus>

		                    @if ($errors->has('endereco'))
		                        <span class="invalid-feedback" role="alert">
		                            <strong>{{ $errors->first('endereco') }}</strong>
		                        </span>
		                    @endif
		                </div>
					</div>




					<div class="escola__telefone cell medium-6 large-6"> 

						<label for="name" class="col-md-4 col-form-label text-md-right"><b> {{ __('Telefone') }} </b></label>

		                <div class="col-md-6">
		                    <input id="telefone" type="text" class="form-control{{ $errors->has('telefone') ? ' is-invalid' : '' }}" name="telefone" value="{{ old('telefone') }}" autofocus>

		                    @if ($errors->has('telefone'))
		                        <span class="invalid-feedback" role="alert">
		                            <strong>{{ $errors->first('telefone') }}</strong>
		                        </span>
		                    @endif
		                </div>

					</div>






					<div class="escola__email cell medium-6 large-6">
						
						<label for="name" class="col-md-4 col-form-label text-md-right"><b> {{ __('E-mail') }} </b></label>

		                <div class="col-md-6">
		                    <input id="email" type="email" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" autofocus>

		                    @if ($errors->has('email'))
		                        <span class="invalid-feedback" role="alert">
		                            <strong>{{ $errors->first('email') }}</strong>
		                        </span>
		                    @endif
		                </div>

					</div>






					
					<div class="escola__vagas cell medium-12 large-12"> 
						<label for="name" class="col-md-4 col-form-label text-md-right"><b> {{ __('Número de Total de Vagas') }} <b>*</b> </b></label>

		                <div class="col-md-6">
		                    <input id="escola_vaga" type="number" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="escola_vaga" value="{{ old('escola_vaga') }}" autofocus>

		                    @if ($errors->has('escola_vaga'))
		                        <span class="invalid-feedback" role="alert">
		                            <strong>{{ $errors->first('escola_vaga') }}</strong>
		                        </span>
		                    @endif
		                </div>
					</div>





					<div class="escola__vagas cell medium-12 large-12">
						<p class="dashboard__candidatura-descricao"> <b>Secção de Relacionamento de Classe, Turnos e o Número de Vagas</b> ** </p>
						<p class="dashboard__candidatura-descricao">Escolher a classe e o turno, bem como o número de vagas.</p>
						<p class="dashboard__candidatura-descricao"> <b>O número de vagas da classe não pode exceder o número total de vagas disponíveis na escola</b> ** </p>
					</div>

					<div class="cell medium-6 large-6"> 

						<label for="classe-turno" class="col-md-4 col-form-label text-md-right"><b> {{ __('Número de Total de Vagas') }} </b></label>

		                <div class="col-md-6">
		                    <select class="medium-6 large-6" name="classe-turno" id="classe-turno">
							@foreach ($classes->unique('nome') as $classe)
							 	@continue($classe->nome != $classe->nome)
									<optgroup label="{{ $classe->nome }}">

											@foreach ($classes as $classe2)
												@continue($classe2->nome != $classe->nome)

													<option value="{{ $classe2->id }}"> 
														 {{ $classe2->turno}}
													</option>
												
											@endforeach 

									</optgroup>>

							@endforeach 
						</select>
		                </div>
					</div>




					<div class="cell medium-6 large-6"> 
						<label for="name" class="col-md-4 col-form-label text-md-right"><b> {{ __('Número de Vagas') }} </b></label>

		                <div class="col-md-6">
		                    <input id="classe_vaga" type="number" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="classe_vaga" value="{{ old('classe_vaga') }}" autofocus>

		                    @if ($errors->has('classe_vaga'))
		                        <span class="invalid-feedback" role="alert">
		                            <strong>{{ $errors->first('classe_vaga') }}</strong>
		                        </span>
		                    @endif
		                </div>
					</div>
					
					{{-- <div class="escola__vagas medium-12 large-12">
						<div class="grid-x">
							<div class="cell medium-6 large-6">
								<span class="numero_vagas">
									<b>Número Total de Vagas: </b> 

								</span>

								<span class="estado-vagas">
									<img src="" alt="Disponível">
								</span>
								
							</div>
							<div class="cell medium-6 large-6">
								@guest
									<p class="dashboard__candidatura-descricao"> Para candidatar-se, é necessário fazer o login ou cadastro.** </p>	
									<a class="button primary--red" href=""> Cadastrar-se </a>
								@endguest

								@can('isCandidato')
									<a class="button primary--green" href=""> Candidatar-se </a>
								@endcan
							</div>
						</div>

					</div> --}}	








				<div class="cell medium-12 large-12">
	                <div class="col-md-6 offset-md-4">
	                    <button type="submit" class="button primary--green" value="submit">
	                        {{ __('Registar') }}
	                    </button>

	                    <a class="button primary--red" href="{{ route('admin.dashboard') }}">
	                        {{ __('Cancelar ') }}
		                </a>
	                    
	                </div>

	            </div>

				</form>	

			</div>
		</div>



   	</div>



@endsection
















@section('script')

 
@endsection