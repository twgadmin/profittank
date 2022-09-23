<!DOCTYPE html>
   <html lang="en">
   <head>
      <?php /* @include('frontend.layouts.compatibility') */ ?>
         <meta name="description" content="">
         <title>Business Form</title>
         <?php /* @include('frontend.layouts.style') */ ?>
         <style type="text/css">
            .carousel-item-next, .carousel-item-prev, .carousel-item.active {
                display: inherit;
            }
/*            .stepBox {
    max-width: 100%;
    width: 100%;
}*/
         </style>
   </head>
   <body>
      
      <div id="calculator-slider" style=" margin: auto;text-align: -webkit-center;">
      <form action="{{ url('profit-generator-category') }}" method="GET" role="form" id="category-form">
         <div class="container">
            <?php /* @include('frontend.layouts.featureList') */ ?>
            <ul class="businessForm home-page">
               <!-- Category section  -->
               <li class="page" id="step-1">
                  <div class="stepBox stepOne">
                     <h1>While results may vary, the following estimations are controlled by Federal and State statutes, regulations, and industry data. Without compromise, the security of your data is protected by robust security encryption & privacy protocols.</h1>
                     <div class="space"><br/><br/></div>
                     <a href="#" class="btn-theme m-auto d-block">SECURITY LOGO</a>
                  </div>
               </li>
               
               <li class="page carousel-item active" id="step-2">
                  <div class="stepBox stepTwo hding-2">
                     <h2>Describe Your Business <span>Click all that apply</span></h2>
                     <div class="error-msg" style="display: none;"><span>select at least one.</span></div>
                        <!-- Categories iblock -->
                        <div class="row checkboxes-wrap">
                        @if(!empty($categories)) 
                           @foreach ($categories as $key => $c)
                              @if( $c->status == '1')
                                 <div class="col-12 col-md-6 checkBox mb-3">
                                    <label>
                                       <input type="checkbox" id="categories{!! $c->id !!}" name="categories[]" class="slide_2" value="{!! $c->id !!}">
                                       <span>{!! $c->category_name !!}</span>
                                       <i>
                                          <img src="{!! asset('assets/frontend/calculator/images/icons/checkbox/') !!}/{!! $c->category_icon !!}" />
                                       </i>
                                    </label>
                                 </div>
                              @endif
                           @endforeach
                        @endif
                     </div>
                  </div>
               </li>
            </ul>

            <footer class="form-footer">
               <button type="button" id="back-button">Back</button>

               <div class="sliderRangeBox">
               <!-- rangeSlider -->
                  <?php /* @include('frontend.layouts.rangeSlider') */ ?>
               <!-- rangeSlider -->
               </div>

               <button type="button" id="next-button">Next</button>
               <button type="submit" id="submit-button" style="display: none;">Next</button>
            </footer>
         </div>
      </form>
      </div>
      <!-- scripts-->
      <?php /* @include('frontend.layouts.scripts') */ ?>
   </body>
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
</html>