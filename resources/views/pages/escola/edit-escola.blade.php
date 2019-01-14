@extends('layouts.admin')







@section('admin.main')


   	<div class="admin-page">
   		
		

		<div class="container">

			<br>
			<br>
			
            <h1 class="dashboard__candidatura"> Editar </h1> 
			<span class="spacing">·</span>
			<h1 class="dashboard__titulo"> {{ $escola->nome }} </h1>
			@include('inc.flash-message')
			<div class="dashboard__wrapper">

				<form class="grid-x grid-padding-x login__form-wrapper" method="POST" action="{{ route('escola.edit',  ['id' => $escola->id]) }}">
            	@method('PUT')
			    @csrf
				




					<div class="escola__director cell medium-12 large-12"> 
						<label for="name" class="col-md-4 col-form-label text-md-right"><b> {{ __('Nome') }} </b></label>

		                <div class="col-md-6">
		                    <input id="nome" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }} " name="nome" value="{{ old('name') }}{{ $escola->nome }}" autofocus>

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
		                    <input id="director" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="director" value="{{ old('director') }}{{ $escola->director }}" autofocus>

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
		                    <input id="endereco" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="endereco" value="{{ old('endereco') }}{{ $escola->endereco }}" autofocus>

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
		                    <input id="telefone" type="text" class="form-control{{ $errors->has('telefone') ? ' is-invalid' : '' }}" name="telefone" value="{{ old('telefone') }}{{ $escola->telefone }}" autofocus>

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
		                    <input id="email" type="email" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}{{ $escola->email }}" autofocus>

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
		                    <input id="escola_vaga" type="number" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="escola_vaga" value="{{ old('escola_vaga') }}{{ $escola->num_vaga }}" autofocus>

		                    @if ($errors->has('escola_vaga'))
		                        <span class="invalid-feedback" role="alert">
		                            <strong>{{ $errors->first('escola_vaga') }}</strong>
		                        </span>
		                    @endif
		                </div>
					</div>





					<div class="escola__vagas cell medium-12 large-12">
						<p class="dashboard__candidatura-descricao"> <b>Secção de Relacionamento de Classe, Turnos e o Número de Vagas</b> ** </p>
					</div>

					<div class="cell medium-6 large-6"> 

						<a class="button primary--indigo" href="{{ route('admin.dashboard') }}">
	                        {{ __('Editar Escolas ') }}
		                </a>


<br>	
<br>	
					</div>



				<div class="cell medium-12 large-12">
	                <div class="col-md-6 offset-md-4">
	                    <button type="submit" class="button primary--green" value="submit">
	                        {{ __('Actualizar') }}
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