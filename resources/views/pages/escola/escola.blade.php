@extends('layouts.main')







@section('main')

	<div class="escola-page container">
		
		@include('inc.flash-message')
		<div class="dashboard">
			
			<h1 class="dashboard__titulo"> {{ $escola->nome }} </h1>

			<div class="dashboard__wrapper grid-x">
				
				<div class="escola__director cell small-12 medium-12 large-12"> <b>Director:</b> {{ $escola->director }} </div>

				<div class="escola__telefone cell small-12 medium-6 large-6"> <b>Telemóvel: </b>{{ $escola->telefone }} </div>
				<div class="escola__email cell large-12 medium-6 large-6"> <b>E-Mail: </b> {{ $escola->email }} </div>
				
				<div class="escola__vagas cell small-12 medium-12 large-12">
					<div class="grid-x">
						<div class="cell small-12 medium-6 large-6">
							<span class="numero_vagas">
								<b>Número Total de Vagas: </b> {{ $escola->num_vaga }}

							</span>

							<span class="estado-vagas">
								<img src="{{ asset('vendor/zondicons/checkmark-outline--green.svg') }}" alt="Disponível">
							</span>
							
						</div>
						<div class="cell small-12 medium-6 large-6">
							@guest
								<p class="dashboard__candidatura-descricao"> Para candidatar-se, é necessário fazer o login ou cadastro.** </p>	
								<a class="button primary--red" href="{{ route('login') }}"> Cadastrar-se </a>
							@endguest

							@can('isCandidato')

								@if ($num_candidaturas)
									<p class="dashboard__candidatura-descricao"> Cancele primeiro outras candidaturas.** </p>	
								@else
								<a class="button primary--green" href="{{ route('escola.candidaturaShow', ['id' => $escola->id]) }}"> Candidatar-se </a>
								
								@endif
							@endcan

							{{-- @can('isFuncionario')
								<a class="button primary--orange" href="{{ route('escola.edit', ['id' => $escola->id]) }}"> Editar Informações</a>
							@endcan --}}

							@can('isAdmin')
								<a class="button primary--orange" href="{{ route('escola.edit', ['id' => $escola->id]) }}"> Editar Informações </a>
							@endcan

							@can('isAdmin')
								<a class="button primary--indigo" href="{{ route('escola.lista-candidatos', ['id' => $escola->id]) }}"> Ver Candidaturas </a>
							@endcan

							@can('isFuncionario')
								<a class="button primary--orange" href="{{ route('escola.edit', ['id' => $escola->id]) }}"> Editar Informações </a>
							@endcan

							@can('isFuncionario')
								<a class="button primary--indigo" href="{{ route('escola.lista-candidatos', ['id' => $escola->id]) }}"> Ver Candidaturas </a>
							@endcan
						</div>
					</div>

				</div>		

			</div>

		</div>
		
		
		<div class="dashboard">
			
			<h1 class="dashboard__titulo"> Classes, Turnos e Vagas </h1>

			<div class="dashboard__wrapper grid-x grid-padding-x">
			
				@foreach ($escola->classes->unique('nome') as $classe)
				 	@continue($classe->nome != $classe->nome)
						<div class="cell small-12 medium-4 large-4">
							
							<div class="escola__classe"> {{ $classe->nome }} </div>
							<div class="escola__turno">
							
								@foreach ($escola->classes as $classe2)
									@continue($classe2->nome != $classe->nome)
									<div class="turno">
										{{ $classe2->turno }} - ({{ $classe2->pivot->num_vaga }})
									</div>
								@endforeach 
							
							</div>	

						</div>

				@endforeach 
			

			</div>

		</div>






	</div>

    



@endsection
















@section('script')

 
@endsection