@extends('layouts.admin')







@section('admin.main')

	<div class="listar-page">
		

		<div class="lista container">
			
			<h1 class="lista__header"> Lista de Candidatos </h1>

			
			<table class="tabela hover">
		          <thead>
		            <tr>
		              <th width="60"></th>
		              <th width="350">Nome</th>
		              <th width="80">Sexo</th>
		              <th width="110">Idade</th>
		              <th width="250">Escola</th>
		              <th width="200">Classe & Turno </th>
		              <th width="200">Ano</th>
		            </tr>
		          </thead>
		              <tbody>
						@foreach ($inscricao as $inscricao)
			                <tr>

			                  	<td> <center> {{ $inscricao->id }}  </center> </td>
			                  	<td> <a href="{{ route('candidato', ['id' => $inscricao->candidato_id]) }}" class="tabela__link">{{ $inscricao->candidato_nome }}</a> </td>
			                  	<td> 
			                  		
			                  		@if ($inscricao->candidato_sexo == 'Masculino')
			                  			M
			                  		@else
			                  			F
			                  		@endif

			                  	</td>
			                  
			                  	<td> {{ getDiffYears($inscricao->candidato_data_nascimento) }} anos </td>
			                  	
			                  	<td> <a href="{{ route('escola.escola', ['id' => $inscricao->escola_id]) }}" class="tabela__link">{{ $inscricao->escola_nome }}</a> </td>
			                  
			                  	<td> {{ $inscricao->classe_nome }} - {{ $inscricao->classe_turno }} </td>
			                  	<td> {{ $inscricao->created_at }} </td>
			                  
				                  	
			                </tr>
						@endforeach
		              </tbody>
		    </table>


		</div>




	</div>

    



@endsection
















@section('script')

 
@endsection