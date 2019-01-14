@extends('layouts.main')







@section('main')


	<section class="landing-page">
		




	<section class="hero">
		<div class="container">
			
			<div class="grid-x">
					
				<div class="cell medium-8 hero__left">
					<h1>Ensino para todos.</h1>
					<p> Faça voçê a escolha! </p>

					<div class="grid-x hero__buttons">
						<a class="button primary" href="{{ route('procurar') }}"> Procurar Vagas </a>
						<a class="button button--simple" href="{{ route('showlogin') }}"> Login </a>
					</div>
				</div>

				<div class="cell medium-4 hero__right">
					<img src="{{ asset('img/undraw/exams.svg') }}" alt="Mãe e Filho">
				</div>

			</div>
			
		</div>
	</section>


	<section>
		
		<div class="container como-funciona">
			
			<center>
				
				<h1 class="intro"> Como Funciona </h1>

			</center>

			<div class="grid-x como-funciona__block">
				
				<div class="cell medium-4 como-funciona__inner-blocks">
					<center> 
						<img src="{{ asset('img/undraw/document_search.svg') }}" alt="Fazer a Procura">
						<h1>Procurar</h1>
					</center>
					<p>Procure por escolas com vagas disponíveis e de seguida faça vá para a opção de candidatura.</p>
				</div>
				
				
				<div class="cell medium-4 como-funciona__inner-blocks">
					<center> 
						<img src="{{ asset('img/undraw/files.svg') }}" alt="Fazer a Procura">
						<h1>Candidatar-se</h1>
					</center>
					<p> Ao candidatar-se, o usuário terá de inserir os dados pessoais e fazer o upload do B.I e a certificação.</p>
				</div>
				
				
				<div class="cell medium-4 como-funciona__inner-blocks">
					<center> 
						<img src="{{ asset('img/undraw/success.svg') }}" alt="Fazer a Procura">
						<h1>Aguardar</h1>
					</center>
					<p> Caso a candidatura ser bem sucessida, o usuário ainda dispõe de mais duas candidaturas. Para verificar o estado delas basta aceder à página de login. </p>
				</div>
				
				


			</div>

		</div>


	</section>




	</section>
	



@endsection
















@section('script')

 
@endsection