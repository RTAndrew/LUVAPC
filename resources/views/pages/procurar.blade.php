@extends('layouts.main')







@section('main')


	<div class="procurar-page">
		
				{{-- MAIN CONTENT  --}}
		{{-- PUSH BAR --}}
		<div class="pushbar_main_content">
			


			@section('side-navigation')

				@include('inc.navigation.side-navigation')
				@include('inc.navigation.side-navigation__section')


			@endsection
		

































		{{-- TEXT_CONTAINER_PAGE --}}
		<div class="nav-categoria">
	
			<div class="container">
				
				@include('inc.navigation.nav-categoria')			
			
			</div>

		</div>



		<div class="container">




			<div class="grid-card grid-x grid-margin-x grid-margin-y">
					

				@foreach ($escolas as $escola)
					<a href="{{ route('escola.escola', ['id' => $escola->id]) }}" class="cell medium-6 large-4 grid-card__block">
					
						<div class="card__nome"> {{ $escola->nome }}
							<span class="card__disponibilidade"> 
							<img src="{{ asset('vendor/zondicons/checkmark-outline--green.svg') }}" alt=""> </span> 
						</div>
						<span class="card__endereco"> {{ $escola->endereco }} </span>
						<div class="card-vaga"> <b>{{ $escola->num_vaga }}</b> </div>

							{{-- @if ($escola->classes > 0) --}}
								@foreach ($escola->classes->unique('nome') as $classe)
									{{-- <div class="card__classe"> --}}
										<span class="classe">  {{ $classe->nome }} </span>
										<b class="card__slash">/</b>
										{{-- <span class="turno"> {{ $classe->turno }},</span> --}}
									{{-- </div> --}}
								@endforeach
							{{-- @endif --}}
								
					</a>
				@endforeach
				
				{{-- <a class="cell medium-4 large-4 grid-card__block">
				
					<div class="card__nome"> Escola 3024 <span class="card__disponibilidade"> <img src="{{ asset('vendor/zondicons/close-outline--red.svg') }}" alt=""> </span> </div>
					<div class="card-vaga"> <b>9</b> Total de Vagas  </div>
					<div class="card__classe">
						<span class="classe"> 7ª </span>
						-
						<span class="turno"> Manhã, Tarde, Noite </span>
					</div>
					<div class="card__classe">
						<span class="classe"> 7ª </span>
						-
						<span class="turno"> Manhã, Tarde, Noite </span>
					</div>
					<div class="card__classe">
						<span class="classe"> 9ª </span>
						-
						<span class="turno"> Tarde, Noite </span>
					</div>
						
					
				</a>

				<a href="{{ route('escola') }}" class="cell medium-4 large-4 grid-card__block grid-card__block--sort">
				
					<div class="card__nome"> Escola 3024 <span class="card__disponibilidade"> <img src="{{ asset('vendor/zondicons/close-outline--red.svg') }}" alt=""> </span> </div>
					<div class="card-vaga"> <b>9</b> Total de Vagas  </div>
					<div class="card__classe">
						<span class="classe"> 7ª </span>
						
						<span class="turno">
						- 
							Manhã 
							<span class="vaga-disponivel align-right"> <b> 9 </b> vagas </span> 
						</span>
						<span class="turno"> 
							-
							Tarde 
							<span class="vaga-disponivel align-right"> <b> 9 </b> vagas </span> 
						</span>
	
					</div>
						
					
				</a> --}}

			</div>

			






		</div>


	</div>







	</div>
	
	



@endsection
















@section('script')

 
@endsection