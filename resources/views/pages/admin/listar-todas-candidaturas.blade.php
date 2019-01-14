@extends('layouts.admin')







@section('admin.main')

	<div class="listar-page">
		

		<div class="lista container">
			
			<h1 class="lista__header"> Lista de Todas as Candidaturas </h1>

			
			 @if ($candidaturas->count() > 0)
        
      
    		<table class="hover">
              <thead>
                <tr>
                  <th width="90">#</th>
                  <th width="300">Candidato</th>
                  <th width="230">Escola</th>
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

                          <td> <a href="{{ route('candidato', ['id' => $candidatura->candidato_id]) }}" class="tabela__link">{{ $candidatura->candidato_nome }}</a> </td>             
                          
                          <td> 
                            <a href="{{ route('escola.lista-candidatos', ['id' => $candidatura->escola_id]) }}" class="tabela__link">
                            {{ $candidatura->escola_nome }}
                            </a> 
                          </td>
                        
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

    



@endsection
















@section('script')

 
@endsection