@extends('layouts.admin')







@section('admin.main')


   	<div class="admin-page">
   		
		

			
            <div class="stats">
				<div class="container grid-x grid-margin-x grid-margin-y grid-margin-x">

					
	                <div class="cell small-12 medium-6 large-4">
	                    <div class="dashboard-nav-card" id="estudante">
	                           <img class="dashboard-nav-card-icon fa" src="{{ asset('vendor/zondicons/user-group--white.svg') }}" alt="">
	                          <h3 class="dashboard-nav-card-title">Candidatos: <span>{{ $numeroTotalCandidatos }}</span></h3>
	                    </div>
	                  </div>
	                
	                <div class="cell small-12 medium-6 large-4">

	                        <div class="dashboard-nav-card" id="disciplina">
	                          <img class="dashboard-nav-card-icon fa" src="{{ asset('vendor/zondicons/user--white.svg') }}" alt="">
	                          <h3 class="dashboard-nav-card-title">Candidaturas: <span>{{ $numeroTotalInscritos }}</span> </h3> 
	                        </div>

	                </div>
	                
	                <div class="cell small-12 medium-6 large-4">

	                        <div class="dashboard-nav-card" id="sala">
	                          <img class="dashboard-nav-card-icon fa" src="{{ asset('vendor/zondicons/education--white.svg') }}" alt="">
	                          <h3 class="dashboard-nav-card-title">Escolas Actuais: <span>{{ $numeroTotalEscolas }}</span></h3>
	                        </div>
	                </div>

	            </div>
	        </div>




   	</div>



@endsection
















@section('script')

 
@endsection