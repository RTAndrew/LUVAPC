
@extends('layouts.main--simple')







@section('main')
    <div class="login">
        
    
        <div class="grid-x">
            
            
            <div class="cell medium-5 large-7">

                
                <div class="login__background">
                    
                    <div class="login__overlay">
                        <div class="login__inner">
                            <img class="login__logo" src="{{ asset('img/logo--white.svg') }}" alt="Logo Website">
                        </div>
                    </div>


                </div>
                

            </div>






            <div class="cell medium-7 large-5">

                <div class="login__form-wrapper">
                    @include('inc.flash-message')
                    
                    {{ $form }}

                </div>


            </div>

        </div>
    </div>

   



@endsection
















@section('script')

 
@endsection




