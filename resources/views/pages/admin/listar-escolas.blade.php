@extends('layouts.admin')







@section('admin.main')

	<div class="listar-page">
		

		<div class="lista container">
			
			<h1 class="lista__header"> Lista de Escolas </h1>

			
			<table class="tabela hover">
		          <thead>
		            <tr>
		              <th width="60"></th>
		              <th width="300">Nome</th>
		              <th width="350">Director</th>
		              <th width="200">Telefone</th>
		              <th width="150">Email</th>
		              <th width="140">Num. Vagas</th>
		              <th width="100"></th>
		            </tr>
		          </thead>
		              <tbody>
						@foreach ($escolas as $escola)
			                <tr>

			                  	<td> <center> {{ $escola->id }}  </center> </td>
			                  	<td> <a href="{{ route('escola.escola', ['id' => $escola->id]) }}" class="tabela__link">{{ $escola->nome }}</a> </td>
			                  	<td> {{ $escola->director }} </td>
			                  	<td> {{ $escola->telefone }} </td>
			                  	<td> {{ $escola->email }} </td>
			                  	<td> <center> {{ $escola->num_vaga }} </center>	 </td>	
			                  	<td> <center> <img src="{{ asset('vendor/zondicons/checkmark-outline--green.svg') }}" alt="estado"> </center> </td>
			                  
				                  	
			                </tr>
						@endforeach
		              </tbody>
		    </table>


		</div>




	</div>

    



@endsection
















@section('script')

 
@endsection