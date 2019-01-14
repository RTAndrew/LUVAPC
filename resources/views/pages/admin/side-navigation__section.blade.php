








			<div class="side-nav__section">

				<h3 class="side-nav__titulo"> Candidatos </h3>
				
				<ul class="vertical menu accordion-menu" data-accordion-menu>
				  <li><a href="{{ route('admin.listar-candidatos') }}"> Listar Candidatos </a></li>
				  <li><a href="{{ route('admin.listar-inscritos') }}"> Listar Inscritos</a></li>
				  <li><a href="{{ route('admin.listar-todas-candidaturas') }}"> Listar Todas Candidaturas </a></li>
				</ul>
												
			</div>



			<div class="side-nav__section">

				<h3 class="side-nav__titulo"> Escola </h3>
				
				<ul class="vertical menu accordion-menu" data-accordion-menu>
				  <li><a href="{{ route('admin.listar-escolas') }}"> Listar Escolas </a></li>
				  <li><a href="{{ route('admin.registar-escolas-show') }}"> Registar Escolas </a></li>
				</ul>
												
			</div>


			@can('isAdmin')
				<div class="side-nav__section">

					<h3 class="side-nav__titulo"> Funcionario </h3>
					
					<ul class="vertical menu accordion-menu" data-accordion-menu>
					  <li><a href="{{ route('admin.listar-funcionarios') }}"> Listar Funcionários </a></li>
					  <li><a href="{{ route('admin.registar-funcionarios-show') }}"> Registar Funcionários </a></li>
					</ul>
													
				</div>
			@endcan



