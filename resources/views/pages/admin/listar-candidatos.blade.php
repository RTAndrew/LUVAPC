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
		              <th width="250">Num. B.I</th>
		              <th width="150">Sexo</th>
		              <th width="110">Idade</th>
		              <th width="200">Telefone</th>
		              <th width="200">Data de Cadastro</th>
		            </tr>
		          </thead>
		              <tbody>
						@foreach ($candidatos as $candidato)
			                <tr>

			                  	<td> <center> {{ $candidato->id }}  </center> </td>
			                  	<td> <a href="{{ route('candidato', ['id' => $candidato->id]) }}" class="tabela__link">{{ $candidato->nome }}</a> </td>
			                  	<td> {{ $candidato->bi_numero }} </td>
			                  
			                  	<td> {{ $candidato->sexo }} </td>
			                  
			                  	<td> {{ getDiffYears($candidato->data_nascimento) }} anos </td>
			                  	<td> {{ $candidato->telefone }} </td>
			                  	<td> {{ $candidato->created_at }} </td>
			                  
				                  	
			                </tr>
						@endforeach
		              </tbody>
		    </table>


		</div>




	</div>

    



@endsection
















@section('script')

 
@endsection