@extends('layouts.main')







@section('main')


	<div class="candidato-page">
		
		<div class="candidato container">
      
			@include('inc.flash-message')

			<div class="candidato__nome">
				{{ $candidato->nome }}	
			</div>

      <div class="candidato__bi">
        <span>B.I: </span> {{ $candidato->bi_numero }}
      </div>
      
      <div class="candidato__bi">
        <span>Endereco: </span> {{ $candidato->endereco }}
      </div>

			<div class="candidato__bi">
				<span>Idade: </span> {{ getDiffYears($candidato->data_nascimento) }} anos
			</div>


      <div class="candidato__bi">
        <span>B.I: </span> {{ $candidato->bi_numero }}
      </div>


      <div class="candidato__bi">
        <span>B.I Documento: </span><a href="{{ asset('storage') }}/{{ $candidato->bi_url}}" class="tabela__link">link</a> 
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
                  <th width="120"></th>
                  <th width="20"></th>
                  <th width="20"></th>
                </tr>
              </thead>
                  <tbody>

                    @foreach ($candidaturas as $candidatura)
                    
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
                          


                          @if ($candidatura->candidatura_estado == 'pendente')
                            <td> <center> <a class="button primary--green" href="{{ route('candidatura.aceitar', ['id' => $candidatura->candidatura_id]) }}"> Aceitar </a> </center> </td>

                            <td> <center> <a class="button primary--red" href="{{ route('candidatura.recusar', ['id' => $candidatura->candidatura_id]) }}"> Recusar </a> </center> </td>
                          @elseif($candidatura->candidatura_estado == 'Aceite')
                            <td></td>
                            <td> </td>
                          @else
                            <td></td>
                            <td></td>
                          @endif
                          

                      </tr>


                    @endforeach
                    
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