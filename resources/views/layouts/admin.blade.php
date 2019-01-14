@extends('layouts.main')







@section('main')


   	<div class="admin-page">
   		
		<div class="pushbar_main_content">
			


			@section('side-navigation')

				@include('inc.navigation.side-navigation')
				@include('pages.admin.side-navigation__section')


			@endsection
		

			{{-- TEXT_CONTAINER_PAGE --}}
			<div class="nav-categoria">
		
				<div class="container">
					
					@include('inc.navigation.nav-categoria--simple')			
				
				</div>

			</div>



			
            @yield('admin.main')

		</div>


   	</div>



@endsection
















@section('script')

 
@endsection