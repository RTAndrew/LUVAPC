@extends('layouts.main')







@section('main')


    <div class="escola-page">
		
		
		<div class="dashboard--candidatura">
			<div class="container">			
				<h1 class="dashboard__candidatura"> Candidatura </h1> 
				<span class="spacing">·</span>
				<h1 class="dashboard__titulo"> {{ $escola->nome }} </h1>
				<span class="estado-vagas">
					<img src="{{ asset('vendor/zondicons/checkmark-outline--green.svg') }}" alt="Disponível">
				</span>
			</div>

		</div>
		
		@include('inc.flash-message')


		<div class="dashboard container">
			
			<h1 class="dashboard__titulo"> Escolha a classe que deseja candidatar-se </h1>
			<p class="dashboard__candidatura-descricao"> Leia com atenção, e envie o documento correcto de acordo. ** </p>
			<p class="dashboard__candidatura-descricao--normal"> - Alunos da <b>7ª Classe</b> devem enviar o certificado da 6ª classe</p>
			<p class="dashboard__candidatura-descricao--normal"> - Alunos da <b>8ª Classe</b> devem enviar o certificado da 7ª classe</p>
			<p class="dashboard__candidatura-descricao--normal"> - Alunos da <b>9ª Classe</b> devem enviar o certificado da 8ª classe</p>

			<div class="dashboard__wrapper  grid-x">
				
				<form enctype="multipart/form-data" method="POST" class="medium-12 large-12" action="{{ route('escola.candidaturaStore', ['idEscola' => $escola->id]) }}">
					@csrf
					
					<div class="grid-x">
						<label for="classe-turno" class="col-md-4 col-form-label text-md-right"><b> Faça a escolha da classe e turno em que deseja candidatar-se </b></label>
						<select class="cell medium-12 large-12" name="classe-turno" id="">
							@foreach ($escola->classes->unique('nome') as $classe)
									<optgroup label="{{ $classe->nome }}">
										
										
											@foreach ($escola->classes as $classe2)

												@if ($classe2->nome == $classe->nome)
													
													@foreach ($escola_classe as $x)
														
															<option value="{{ $classe2->id }}"> 
																{{ $classe2->turno }} ---- {{ $classe2->pivot->num_vaga }} vagas
															</option>
															
														@break
													@endforeach

												@endif
											@endforeach 
										
											
									</optgroup>

							@endforeach 
						</select>

		
		<br>

			            <div class="escola__vagas cell medium-12 large-12">
			                <label for="file" class="col-md-4 col-form-label text-md-right"><b> Upload do documento </b></label>
			            </div>


			            <div class="cell medium-12 large-12">

			                <div class="col-md-6">
			                    <input required accept="image/jpeg" id="file" type="file" class="form-control{{ $errors->has('file') ? ' is-invalid' : '' }}" name="file" value="{{ old('file') }}" >

			                    @if ($errors->has('file'))
			                        <span class="invalid-feedback" role="alert">
			                            <strong>{{ $errors->first('file') }}</strong>
			                        </span>
			                    @endif
			                </div>
			            </div>

					</div>

				<button class="button primary--green" type="submit" value="submit"> Candidatar-se </button>
				
				</form>	
				

			</div>

		</div>
		






	</div>



@endsection
















@section('script')

 
@endsection