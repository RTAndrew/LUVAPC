<div class="container">




	<div class="grid-x align-center">
		<div class="top-bar">
	        <div class="top-bar-left">
	          <li class="logo menu-text"> <a href="{{ route('landing-page') }}"> <img class="site-logo" src="{{ asset('img/logo.svg') }}" alt="CEF" height = "50" width = "50"> </a> </li>
	          {{-- <li class="menu-text"><h1> Lista Única de Alunos </h1></li> --}}
	        </div>
	        <div class="top-bar-right">
	          <ul class="menu">
	            <li><a href="{{ route('landing-page') }}"> Início </a></li>
	            <li><a href="{{ route('procurar') }}"> Procurar </a></li>

	            @guest
	            	<li> <a class="button primary--green" href="{{ route('login') }}"> Login </a>  </li>
	            @endguest

	          	
	            
	            @auth

	            	@can('isCandidato')
		            	<li> <a class="button primary--blue" href="{{ route('candidato.dashboard') }}"> Conta </a>  </li>
	            	@elsecan('isFuncionario')
	            		<li> <a class="button primary--blue" href="{{ route('admin.dashboard') }}"> Dashboard </a>  </li>
	            	@elsecan('isAdmin')
	            		<li> <a class="button primary--blue" href="{{ route('admin.dashboard') }}"> Dashboard </a>  </li>
	            	@endcan
		            
		            	
	            	<li> <a class="button primary--red" href="{{ route('logout') }}"> Logout </a>  </li>
		            
				@endauth

	          </ul>
	        </div> 
      </div>
	</div>










</div>
