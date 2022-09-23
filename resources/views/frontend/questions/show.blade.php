<!DOCTYPE html>
<html lang="en">
   <head>
      <?php /* @include('frontend.layouts.compatibility') */ ?>
      <meta name="description" content="">
      <title>Business Form</title>
      <?php /* @include('frontend.layouts.style') */ ?>
   </head>
   <body>
      <form action="{{ url('profit-calulcations') }}" method="POST" id="form">
         @csrf
         @method('POST') 
         <input type="hidden" name="progressId">
         <div class="container">
         <div id="calculator-slider" class="carousel slide" data-ride="carousel" data-interval="false" data-wrap="false">
               <?php /* @include('frontend.layouts.featureList') */ ?>
               <ul class="caluculator-steps carousel-inner">
                  @if(!empty($questions) AND !empty($options)) 
                   @foreach ($questions as $key => $question)
                    <li  
                     data-type-id="{!! $question->is_multiple !!}"
                     data-question-id="{!! $question->id !!}"  
                     data-progress-id="{!! $key + 1 !!}"
                     class="page carousel-item {{ $key + 1 == '1' ? 'active' : '' }}" 
                     id="step-{!! $key +1 !!}">
                      
                      <!-- progress  -->
                      <input type="hidden" name="total_steps"  value="{!! $progress !!}">
                      <!-- qestion id --> 
                      <input type="hidden" name="questionId">
                      <input type="hidden" name="dataType">
                      
                      
                      <div class="stepBox hding-2">
                            <h2>{!! $question->question !!}</h2>
                              @if($question->is_multiple == 0)
                                 <div class="error-msg" style="display: none;">
                                    <span>Please enter a whole number between 100 and 99,999,999.</span>
                                 </div>
                                 @if($question->question == 'Estimate your total annual business revenue.')
                                 <div class="fld-input">
                                    <input type="text" id="revenue" name="question[{!! $question->id !!}][option]"
                                     class="price" placeholder="{!! $question->placeholder !!}" />
                                 </div>
                                 @elseif($question->question == 'Estimate your total annual business expenses.')
                                 <div class="fld-input">
                                    <input type="text" id="expenses" name="question[{!! $question->id !!}][option]"
                                     class="price" placeholder="{!! $question->placeholder !!}" />
                                 </div>
                                 @else
                                  <div class="fld-input">
                                    <input type="text" name="question[{!! $question->id !!}][option]"
                                     class="price" placeholder="{!! $question->placeholder !!}" />
                                 </div>
                                 @endif
                              @else
                                 @if($question->type == 1)   
                                    <div class="error-msg" style="display: none;">
                                       <span>Please enter a whole number between 100 and 99,999,999.</span>
                                    </div>
                                    <div class="fld-input-wraper row">
                                       @foreach($options as $option)
                                          @if($option->question_id == $question->id)
                                             <div class="fld-input col-12 col-md-6 mb-4">
                                                <input type="text" 
                                                 name="question[{!! $question->id !!}][option][{!! $option->id !!}]"
                                                 class="price" placeholder="{!! $option->option_text !!}" />
                                             </div>
                                          @endif
                                       @endforeach
                                    </div>
                                 @elseif($question->type == 2)  
                                    <div class="error-msg" style="display: none;">
                                       <span>Please enter a whole number between 100 and 99,999,999.</span>
                                    </div>
                                    <div class="row">
                                       @foreach($options as $option)
                                          @if($option->question_id == $question->id)
                                             <div class="checkBox col">
                                                <label for="radio{!! $option->id !!}">
                                                   <input type="radio"  name="question[{!! $question->id !!}][option][0]" id="radio{!! $option->id !!}"
                                                   value="{!! $option->id !!}">
                                                   <span>{!! $option->option_text !!}</span>
                                                </label>
                                             </div>
                                          @endif
                                       @endforeach
                                    </div>
                                 @elseif($question->type == 3)  
                                    <div class="fld-select fld-input">
                                       <select name="question[{!! $question->id !!}][option][0]">
                                          <option selected="">Choose your schedule</option>
                                          @foreach($options as $option)
                                             @if($option->question_id == $question->id)
                                                <option value="{!! $option->id !!}">
                                                {!! $option->option_text !!} </option>
                                             @endif
                                          @endforeach
                                       </select>
                                    </div>
                                 @elseif($question->type == 4)  
                                    <div class="checkBoxWraper row">
                                       @foreach($options as $option)
                                          @if($option->question_id == $question->id)
                                             <div class="checkBox col-6 col-md-4">
                                                <label>
                                                   <input type="checkbox" 
                                                   name="question[{!! $question->id !!}][option][{!! $option->id !!}]" 
                                                   class="slide_2" value="{!! $option->id !!}">
                                                   <span>{!! $option->option_text !!}</span>
                                                </label>
                                             </div>
                                          @endif
                                       @endforeach
                                    </div>
                                  
                                 @endif
                              @endif
                           </div>
                        </li>
                     @endforeach
                  @endif
                  <li class="page submition carousel-item"  id="step-{!! $submition !!}">
                   <div class="stepBox stepSix step43 hding-3">
                     <h3>You have completed your assessment.</h3>
                      <div class="space"><br/></div>
                       <h3>Calculating results . . .</h3>
                        <ul class="dotLoader">
                           <li></li>
                           <li></li>
                           <li></li>
                           <li></li>
                           <li></li>
                        </ul>
                        <div class="sliderRangeBox rangeContent">
                          <div class="space"><br/><br/></div>
                           <h6>GREEN CIRCLES APPEAR IMMEDIATELY ALONG WITH THE FIRST LINE OF TEXT:<br/>
                           The first line should animate in as if were being typed. As the second line (calculating results...)
                           begins to appear, the first line should fade. The second line should enter as being typed and then
                           blink two or three times. In short, second line appears and first line disappears. In addition, there
                           should be a animated bar showing that it’s seeking information.</h6>
                        </div>
                     </div>
                   </li>
               </ul>
            </div>
            <footer class="form-footer">
               <button type="button" id="back-button">Back</button>
               <div class="sliderRangeBox">
                  <!-- rangeSlider -->
                     <?php /* @include('frontend.layouts.rangeSlider') */ ?>
                  <!-- rangeSlider -->
               </div> 
               <button type="button" name="submit" id="next-button">Next</button>
               <button type="submit" id="submit-button" style="display: none;">Next</button>
         
            </footer>
         </div>
      </form>
      <!-- scripts-->
        <?php /* @include('frontend.layouts.scripts') */ ?>
      <!-- scripts -->
       <script>
          $('#back-button').click(function(){
            $('#calculator-slider').carousel('prev');
         })
         
           $(window).keydown(function(e){
        if(e.keyCode == 13) {
          e.preventDefault();
          return false;
        }
    });

         $('#next-button').click(function(){

            var currentSlide = $(".carousel-item.active");
            var errorField = $('.error-msg');
            var dataprogressId = $(currentSlide).attr('data-progress-id');
            var dataquestionId = $(currentSlide).attr('data-question-id');
            var datatypeId = $(currentSlide).attr('data-type-id');

           // console.log(dataquestionId);
           // console.log(datatypeId);

            $('input[name="progressId"]').val(dataprogressId);
            $('input[name="questionId"]').val(dataquestionId);
            $('input[name="dataType"]').val(datatypeId);


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
                  }
               }
               else {
                  return 
               }
            })
            
         })
      
         const _token =    $('input[name="_token"]').val();
         const _method =   $('input[name="_method"]').val();
         $.ajaxSetup({
           headers: {
               'X-CSRF-TOKEN': _token
             }
          });
      // Set progressbar
       $('#calculator-slider').on('slide.bs.carousel', function () {
         $.ajax({
           url:"{!! URL::to('/ajaxGetprogress') !!}",
           method:"POST",
           data: $('form').serialize(),
        // dataType: 'json',
           success:function(response){
                // set range //
            $('input[name="sliderRange"]').val(response);
            $('#range-progress').text(response+'%');
            if(response == "100"){
               $("#next-button").hide();
               $("#submit-button").show();
             }else{
                $("#next-button").show();
               $("#submit-button").hide();
             }

            }
         });
      });

      var header = document.querySelector('header');
          window.addEventListener('load', ()=>{
            header.style.visibility = 'visible';
            header.style.opacity = '1';
          })
      document.addEventListener("keyup", function(event) {
      if (event.keyCode === 13) {
               //   document.getElementById("myFormID").submit();
                   return false;
       }
     });

  $('#calculator-slider').on('slide.bs.carousel', function () {
  //  OLD PROFIT MARGIN (%)
  var  trevenue  = 0;
  var  texpenses = 0;
  var revenue = $('#revenue').val();
  var expenses = $('#expenses').val();
  if(revenue !== '' ){
     trevenue  = parseFloat(revenue.replace(/\$|,/g, ''));
  }
  if(expenses !== '' ){
    texpenses = parseFloat(expenses.replace(/\$|,/g, ''));
  }

  var OLDPROFIT = ((trevenue - texpenses) / trevenue) * 100;

  $('#OLDPROFIT').text(OLDPROFIT+'%');    
  $('#NEWPROFIT').text(OLDPROFIT+'%');    
  });

  document.addEventListener('keyup', function(e){
    if(e.keyCode == 13){
        e.preventDefault();
    }
  })

        </script>
      
   </body>
</html>