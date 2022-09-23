<!DOCTYPE html>
   <html lang="en">
   <head>
      <meta name="description" content="">
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" />
      <!-- page title -->
      <title>@yield('page-title')</title>
     
      <!-- css style sheets -->
      <link rel="stylesheet" href="{!! asset('assets/frontend/calculator/css/layout.css') !!}">
      <link rel="stylesheet" href="{!! asset ('assets/frontend/calculator/css/style.css') !!}">
      <link rel="stylesheet" href="{!! asset ('assets/frontend/calculator/css/custom.css') !!}">

        <!-- style -->
         @yield('style')
        <!-- style -->
       
   </head>
   <body>
    <div id="calculator-wrap">
      <div class="container">
         <!-- Main Content -->
            @yield('page')
         <!-- Main Content -->

      </div>
   </div>
   <!-- Template JS File -->
   <script src="{!! asset('assets/frontend/calculator/js/jquery.js') !!}"></script>
   <script src="{!! asset('assets/frontend/calculator/js/custom.js') !!}"></script>
  
  <!-- javascripts -->
   @yield('js')
  <!-- javascripts -->
 
   </body>
</html>