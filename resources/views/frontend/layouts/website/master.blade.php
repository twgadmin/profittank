<!DOCTYPE html>
   <html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" />
      <!-- page title -->
      <title>@yield('page-title')</title>
     
      <!-- css style sheets -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
      <link rel="stylesheet" href="{!! asset('assets/frontend/website/assets/css/layout.css') !!}">
      <link rel="stylesheet" href="{!! asset('assets/frontend/website/assets/css/style.css') !!}">
      <link rel="stylesheet" href="{!! asset('assets/frontend/website/assets/css/sweet-alert.css') !!}">
      <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
      <link rel="icon" href="favicon.ico" type="image/x-icon">
      <!-- style -->
      @yield('style')
      <!-- style -->
       
   </head>

    <?php
    $action = explode('@', Route::getCurrentRoute()->getActionName());
    ?>

   <body class="{!! isset($action[1]) ? $action[1] : '' !!}">
    <form style="display: none;" action="{!! route('logout') !!}" id="logout-form" method="POST">
        @CSRF
        @method('POST')
    </form>
    <!-- headar -->
        @include('frontend.layouts.website.includes.header')
    <!-- header -->

    <!-- Main Content -->
        @yield('content')
    <!-- Main Content -->

    <!-- footer -->
        @include('frontend.layouts.website.includes.footer')
    <!-- footer -->
   <script>
      function logout() {
        document.getElementById('logout-form').submit();
      }
   </script>
   <!-- Template JS File -->
   <script src="{!! asset('assets/frontend/website/assets/js/jquery.js') !!}"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
   <script src="{!! asset('assets/frontend/website/assets/js/custom.js') !!}"></script>
   <script src="{!! asset('assets/frontend/website/assets/js/sweet-alert.min.js') !!}"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
   <script>
       $(".general-questions").click(function(){
            if($(".help-popup").hasClass("slide-down")){
                    $(".help-popup").removeClass("slide-down").addClass("slide-up");
            }else{
                    $(".help-popup").removeClass("slide-up").addClass("slide-down");
            }
        })

    // $(".general-questions").click(function(){
    //     $(".help-popup").show();
    // });
    moment.locale('en', {
        week: { dow: 1 } // Monday is the first day of the week
    });

    $('#datetimepicker').datetimepicker({
        inline: true,
        sideBySide: true,
        format: 'DD-MM-YY',
        stepping: 30,
    });    
   </script>
   <!-- javascripts -->
   @yield('js')
   <!-- javascripts -->
   </body>
</html>