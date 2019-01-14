{{-- ASIDE NAVIGATION --}}
			{{-- PUSHBAR JS --}}
		    <div data-pushbar-id="side-nav" class="pushbar from_left side-nav">
		    		
					<center> 
						<div class="side-nav__header">
							
						<center> <img class="site-logo site-logo--side-nav" src=" {{ asset('img/logo.svg') }} "> </center>

						{{-- <img data-pushbar-close class="icon icon-x" src=" {{ asset('vendor/zondicons/close.svg') }} " alt="x-icon"> --}}
						
						</div>
					</center>
			
				
					@yield('side-navigation')


			</div>