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
    <div id="calculator-wrap" class="py-4">
      <div class="container">
         <!-- headar -->
            @include('frontend.layouts.header') 
         <!-- header -->

         <!-- Main Content -->
            @yield('page')
         <!-- Main Content -->

         <!-- footer -->
            @include('frontend.layouts.footer') 
         <!-- footer -->
      </div>
   </div>
   <!-- Template JS File -->
   <script src="{!! asset('assets/frontend/calculator/js/jquery.js') !!}"></script>
   <script src="{!! asset('assets/frontend/calculator/js/custom.js') !!}"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
  
   <script>
       $('#submit-button').click(function(){
            var currentSlide = $(".carousel-item.active");
            var errorField = $('.error-msg');

            $(currentSlide.find('input')).each(function(){
               if($(this).prop('type') == 'text') {
                  if($(this).val().replace(/\$/, '').length < 3) {
                     currentSlide.find(errorField).show();
                  }
                  else {
                     currentSlide.find(errorField).hide();
                     $('#calculator-slider').carousel('next');
                  }
               }
               else if($(this).prop('type') == 'radio') {
                  var radioNames = currentSlide.find('input[type="radio"]').prop('name');
                  if ($(`input[name="${radioNames}"]:checked`).length == 0) {
                     currentSlide.find(errorField).show();
                  }
                  else {
                     currentSlide.find(errorField).hide();
                     $('#calculator-slider').carousel('next');
                  }
               }
               else if($(this).prop('type') == 'checkbox') {
                  if ($('input[type="checkbox"]:checked').length == 0) {
                     currentSlide.find(errorField).show();
                  }
                  else {
                     currentSlide.find(errorField).hide();
                     $('#calculator-slider').carousel('next');
                     $('#category-form"').submit();
                  }
               }
               else {
               
                  return 
               }
            })
            return false;
         })  
   </script>
   <script>
      var header = document.querySelector('header');
      var backBtn = document.querySelector('#back-button');
      var nextBtn = document.querySelector('#next-button');
      var submitBtn = document.querySelector('#submit-button');
      var stepOne = document.querySelector('#step-1');
      var stepTwo = document.querySelector('#step-2');
      var form = document.querySelector('#category-form');

      nextBtn.addEventListener('click', (e)=>{
         e.preventDefault();
         stepOne.style.transform = 'translateX(-100%)';
         stepTwo.style.transform = 'translateX(-100%)';
         submitBtn.style.display = 'block';
         nextBtn.style.display = 'none';
         header.style.visibility = 'visible';
         header.style.opacity = '1';
      })
      backBtn.addEventListener('click', (e)=>{
         e.preventDefault();
         stepOne.style.transform = 'translateX(0%)';
         stepTwo.style.transform = 'translateX(0%)';
         nextBtn.style.display = 'block';
         submitBtn.style.display = 'none';
         header.style.visibility = 'hidden';
         header.style.opacity = '0';
      })

      
    </script>
  <!-- javascripts -->
   @yield('js')
  <!-- javascripts -->
 
   </body>
</html>