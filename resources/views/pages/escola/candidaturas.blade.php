@extends('layouts.main')







@section('main')


    <div class="escola-page candidatura__wrapper">
		
		
		<div class="dashboard--candidatura">
			<div class="container">			
				<h1 class="dashboard__candidatura"> Lista de Candidatos	 </h1> 
				<span class="spacing">·</span>
				<h1 class="dashboard__titulo"> {{ $escola->nome }} </h1>
				<span class="estado-vagas">
					<img src="{{ asset('vendor/zondicons/checkmark-outline--green.svg') }}" alt="Disponível">
				</span>

				<p> <b>Director:</b> {{ $escola->director }}</p>
				<p> <b>Telefone:</b> {{ $escola->telefone }}</p>
				<p> <b>Endereço:</b> {{ $escola->endereco }}</p>
			</div>

		</div>
		
		@include('inc.flash-message')

		<div class="">
			<div class="dashboard container">
				
				@if ($candidaturas->count() > 0)
	        
	      
	    		<table class="hover">
	              <thead>
	                <tr>
	                  <th width="90">#</th>
	                  <th width="300">Candidato</th>
	                  <th width="300">Endereço</th>
	                  <th width="300">Classe & Turno</th>
	                  <th width="100">Documento</th>
	                  <th width="120"></th>
	                  <th width="120"></th>
	                </tr>
	              </thead>
	                  <tbody>

	                    @forelse ($candidaturas as $candidatura)
	                    
	                      <tr>
	    

	                          <td> {{ $candidatura->candidatura_id }} </td>

	                          <td> {{ $candidatura->candidato_nome }} </td>  

	                          <td> {{ $candidatura->candidato_endereco }} </td>                
	                        
	                          <td> {{ $candidatura->classe_nome }} - {{ $candidatura->turno }}</td>
	                        
	                          <td> <a href="{{ asset('storage') }}/{{ $candidatura->documento_url }}" class="tabela__link"> Documento </a> </td>
	                        
	                
	                          <td> <center> <a class="button primary--green" href="{{ route('candidatura.aceitar', ['id' => $candidatura->candidatura_id]) }}"> Aceitar </a> </center> </td>

	                          <td> <center> <a class="button primary--red" href="{{ route('candidatura.recusar', ['id' => $candidatura->candidatura_id]) }}"> Recusar </a> </center> </td>
	                          
	                      </tr>

	                      @empty

	                          <tr>
	                            <td> </td>
	                            <td> </td>
	                            <td> <center> <b> Não foram encontradas nenhuma candidatura. <b> </center>  </td>
	                            <td> </td>
	                            <td> </td>
	                            <td> </td>
	                            <td> </td>
	                          </tr>

	                    @endforelse
	                    
	                  </tbody>
		        </table>
		      @else 
		        
		        <br>
		        <center> <b> Não foram encontradas nenhuma candidatura. <b> </center>  

		      @endif

			</div>
		</div>






	</div>



@endsection
















@section('script')

 
@endsection