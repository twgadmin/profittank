<!DOCTYPE html>
<html lang="en">
   <head>
      <?php /* @include('frontend.layouts.compatibility') */ ?>
      <meta name="description" content="">
      <title>Business Form</title>
      <?php /* @include('frontend.layouts.style') */ ?>
   </head>
   <body>

      <section class="mainSec">
       <div class="container">
         <from action="{{ url('profit-generator') }}" method="GET" role="form">
            <ul class="businessForm">
             @if(!empty($questions) AND !empty($options)) 
              @foreach ($questions as $key => $q)
               <!-- GET Questions by category -->
                 <li class="page" id="step-{!! $key +1 !!}">
                   <div class="stepBox stepThree hding-2">
                     <!-- featureList -->
                     <?php /* @include('frontend.layouts.featureList') */ ?>
                     <!-- featureList -->
                      <h2>{!! $q->question !!}</h2>
                        <div class="space">
                         <br />
                         <br />
                        </div>
                        @if($q->is_multiple == 0)
                        <div class="error-msg" style="display: none;">
                           <span>Please enter a whole number between 100 and 99,999,999.</span>
                        </div>
                        <div class="fld-input">
                          <input type="text" name="cn_{!! $key +1 !!}" class="price validat_input{!! $key +1 !!}" placeholder="{!! $q->placeholder !!}" />
                        </div>
                        @else

                        @if($q->type == 1)   
                        <div class="error-msg" style="display: none;">
                           <span>Please enter a whole number between 100 and 99,999,999.</span>
                        </div>
                         
                        <div class="fld-input-wraper">
                         @foreach($options as $option)
                         @if($option->question_id == $q->id)
                         <div class="fld-input">
                           <input type="text" name="cn_{!! $key +1 !!}" class="price validat_input{!! $key +1 !!}" placeholder="{!! $option->option_text !!}" />
                         </div>
                         
                        @endif
                        @endforeach
                        </div>
                   
                        @elseif($q->type == 2)  
                        <div class="error-msg" style="display: none;">
                           <span>Please enter a whole number between 100 and 99,999,999.</span>
                        </div>
                         

                        @foreach($options as $count => $option)
                        @if($option->question_id == $q->id)
                       
                        <div class="checkBox">
                           <label for="{!! $option->id !!}">
                              <input type="radio" class="validate_radio" name="radio_{!! $option->question_id !!}" id="{!! $option->id !!}" value="{!! $option->option_text !!}" tabindex="0">
                              <span>{!! $option->option_text !!}</span>
                           </label>
                        </div>
                      
                        @endif
                        @endforeach

                        @elseif($q->type == 3)  
                         <div class="fld-select fld-input">
                              <select tabindex="0">
                                 <option selected="">Choose your schedule</option>
                          @foreach($options as $option)
                          @if($option->question_id == $q->id)
                      
                                 <option value="{!! $option->option_text !!}"> {!! $option->option_text !!} </option>
                           @endif
                          @endforeach
                      
                              </select>
                         </div>
                        @elseif($q->type == 4)  
                        @foreach($options as $option)
                        @if($option->question_id == $q->id)

                         <div class="checkBoxWraper">
                         <div class="checkBox">
                           <label for="{!! $option->id !!}">
                              <input type="radio" class="validate_radio" name="radio_{!! $option->question_id !!}" id="{!! $option->id !!}" value="{!! $option->option_text !!}" tabindex="0">
                              <span>{!! $option->option_text !!}</span>
                           </label>
                        </div>
                       </div>

                        @endif
                        @endforeach
                     

                        @endif
                        @endif
                        <div class="sliderRangeBox">
                         <!-- rangeSlider -->
                         <?php /* @include('frontend.layouts.rangeSlider') */ ?>
                         <!-- rangeSlider -->
                        </div> 
                     </div>
                     <div class="field btns">
                        <button type="button" onclick="location.href='#step-{!! $key  !!}'" class="slick-prev slick-arrow">Back</button>
                        <button type="buttton" onclick="location.href='#step-{!! $key +2 !!}'" class="next{!! $key +2 !!} slick-next slick-arrow">Next</button>
                     </div>
                  </li>
                  <script type="text/javascript">
                     $(document).ready(function() {
                        var minLength = 4;
                        var maxLength = 10;
                       $('.next{!! $key +2 !!}').click(function() {
                             var value = $(".validat_input{!! $key +1 !!}").val();
                             if (value.length < minLength){
                                 $(".error-msg").addClass("d-block")
                                 location.href='#step-{!! $key +1 !!}';
                             }

                             else if ($('.validat_input{!! $key +1 !!}').val() == "" )  {
                                 $(".error-msg").addClass("d-block")
                                 location.href='#step-{!! $key +1 !!}';
                                 $('.validat_input{!! $key +1 !!}').focus(function() {
                                     $('.error-msg').removeClass('d-block');
                                 });
                             }
                             else{
                                 $(".error-msg").removeClass("d-block")
                             }
                         });
                       //  // end text validation
                      });
                     </script>
                     <script type="text/javascript">
                       $(document).ready(function() {
                           $('.next{!! $key +2 !!}').click(function() {
                             if ($('.validate_radio:checked').length == 0) {
                                 $(".error-msg").addClass("d-block")
                                 location.href='#step-8';
                                 $('.validate_radio').change(function() {
                                     if($(this).is(':checked')) {
                                         $('.error-msg').removeClass('d-block');
                                     } 
                                 });
                             }
                             else{
                                 $(".error-msg").removeClass("d-block")
                             }


                         });

                       });
                    </script> 

                    
                  @endforeach
                  @endif
                
                  <!-- GET Questions by category -->
               </ul>
            </from>
         </div>
      </section>
      <!-- scripts-->
        <?php /* @include('frontend.layouts.scripts') */ ?>
      <!-- scripts  -->
   </body>
</html>

