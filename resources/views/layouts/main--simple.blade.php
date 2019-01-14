<!doctype html>
<html class="no-js" lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> @yield('titulo-pagina')  {{ config('app.name', 'Nachy San')}}</title>
    <link rel="stylesheet" href=" {{ asset('vendor/foundation/css/foundation.css') }}">
    <link rel="stylesheet" href=" {{ asset('vendor/foundation/css/app.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
  </head>
  <body>
        







        

    

        {{-- MAIN CONTENT --}}
        <div id="main" class="main">
            {{-- PUSHBAR JS --}}
            @include('inc.navigation.side-navigation')
            {{-- RECEBER O MAIN --}}
                @yield('main')
        </div>


    






    <!-- RECEBER OS SCRIPTS NECESSARIOS DE CADA PAGINA -->

    <script>
        @yield('script')
    </script>




     
{{-- PUSHBAR JS --}}
    <script src="{{ asset('vendor/pushbar/pushbar.js') }}"></script>
    
    <script type="text/javascript">
      var pushbar = new Pushbar({
            blur:false,
            overlay:true,
          });
    </script>

    <script src="{{ asset('vendor/foundation/js/vendor/jquery.js') }}"></script>
    <script src="{{ asset('vendor/foundation/js/vendor/what-input.js') }}"></script>
    <script src="{{ asset('vendor/foundation/js/vendor/foundation.js') }}"></script>
    <script src="{{ asset('vendor/foundation/js/app.js') }}"></script>
  </body>
</html>

