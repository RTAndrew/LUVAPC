@extends('layouts.admin')







@section('admin.main')

	<div class="listar-page">
		

		<div class="lista container">
			
			<h1 class="lista__header"> Lista de funcionarios </h1>

			
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
						@foreach ($funcionarios as $funcionario)
			                <tr>

			                  	<td> <center> {{ $funcionario->id }}  </center> </td>
			                  	<td> {{ $funcionario->nome }} </td>
			                  	<td> {{ $funcionario->bi_numero }} </td>
			                  
			                  	<td> {{ $funcionario->sexo }} </td>
			                  
			                  	<td> {{ getDiffYears($funcionario->data_nascimento) }} anos </td>
			                  	<td> {{ $funcionario->telefone }} </td>
			                  	<td> {{ $funcionario->created_at }} </td>
			                  
				                  	
			                </tr>
						@endforeach
		              </tbody>
		    </table>


		</div>




	</div>

    



@endsection
















@section('script')

 
@endsection