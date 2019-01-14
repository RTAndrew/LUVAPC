@extends('layouts.main')







@section('main')


	<div class="candidato-page">
		
		<div class="candidato container">
      
			@include('inc.flash-message')

			<div class="candidato__nome">
				{{ $user->candidato->nome }}	
			</div>
      
      <div class="candidato__bi">
        <span>Endereco: </span> {{ $user->candidato->endereco }}
      </div>

      <div class="candidato__bi">
        <span>Idade: </span> {{ getDiffYears($user->candidato->data_nascimento) }} anos
      </div>


      <div class="candidato__bi">
        <span>B.I: </span> {{ $user->candidato->bi_numero }}
      </div>


			<div class="candidato__bi">
				<span>B.I Documento: </span><a href="{{ asset('storage') }}/{{ $user->candidato->bi_url}}" class="tabela__link">link</a> 
			</div>










  		<div class="candidatura__estado-candidatura"> Estado de Candidaturas </div>
      
      @if ($candidaturas->count() > 0)
        
      
    		<table class="hover">
              <thead>
                <tr>
                  <th width="100">#</th>
                  <th width="260">Escola</th>
                  <th width="300">Classe & Turno</th>
                  <th width="250">Ano</th>
                  <th width="100">Documento</th>
                  <th width="200"></th>
                  <th width="200"></th>
                </tr>
              </thead>
                  <tbody>

                    @forelse ($candidaturas as $candidatura)
                    
                      <tr>


                          <td> {{ $candidatura->candidatura_id }} </td>
                
                          
                          <td> 
                            <a href="{{ route('escola.escola', ['id' => $candidatura->escola_id]) }}" class="tabela__link">
                            {{ $candidatura->escola_nome }}
                            </a> 
                          </td>
                        
                          <td> {{ $candidatura->classe_nome }} - {{ $candidatura->turno }}</td>
                        
                          <td> {{ $candidatura->created_at }} </td>
                          <td> <a href="{{ asset('storage') }}/{{ $candidatura->documento_url }}" class="tabela__link"> Documento </a> </td>
                          
                          @if ($candidatura->candidatura_estado == 'pendente')
                            <td> <center> <img class="loading-svg" src="{{ asset('svg/loading.svg') }}" alt="estado"> </center> </td>
                          @elseif($candidatura->candidatura_estado == 'Recusado')
                            <td> <center> <img class="" src="{{ asset('vendor/zondicons/close-outline--red.svg') }}" alt="estado"> </center> </td>
                          @elseif($candidatura->candidatura_estado == 'Duplicado')
                            <td> <center> <img class="" src="{{ asset('vendor/zondicons/exclamation-outline--orange.svg') }}" alt="estado"> </center> </td>
                          @else
                            <td> <center> <img class="" src="{{ asset('vendor/zondicons/checkmark-outline--green.svg') }}" alt="estado"> </center> </td>
                          @endif
                
                          <td> <center> <a class="button primary--red" href="{{ route('candidato.deleteCandidatura', ['id' => $candidatura->candidatura_id]) }}"> Cancelar </a> </center> </td>
                          
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