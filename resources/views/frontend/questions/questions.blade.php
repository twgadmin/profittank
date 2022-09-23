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
         <form action="{{ url('profit-calulcations') }}" method="POST" role="form">
            <ul class="businessForm">
             @csrf
             @method('POST')
             @if(!empty($questions) AND !empty($options)) 
              @foreach ($questions as $key => $q)
               <!-- GET Questions by category -->
                 <li class="page" id="step-{!! $key +1 !!}">
                   <div class="stepBox stepThree hding-2">
                      <h2>{!! $q->question !!}</h2>
                      <input type="hidden" name="question_id" value="{!! $q->id!!}">

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
                          <input type="hidden" name="option_id"   value="{!! $option->id!!}">
                 
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
                       
                        <input type="hidden" name="option_id"   value="{!! $option->id!!}">

                        <div class="checkBox">
                           <label for="{!! $option->id !!}">
                              <input type="radio" class="validate_radio" name="radio_{!! $option->question_id !!}[]" id="{!! $option->id !!}" value="{!! $option->option_text !!}" tabindex="0">
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
                      
                       <input type="hidden" name="option_id"   value="{!! $option->id!!}">

                                 <option value="{!! $option->option_text !!}"> {!! $option->option_text !!} </option>
                           @endif
                          @endforeach
                      
                              </select>
                         </div>
                        @elseif($q->type == 4)  

                        @foreach($options as $option)
                        @if($option->question_id == $q->id)
                         <input type="hidden" name="option_id"   value="{!! $option->id!!}">
                      
                         <div class="checkBoxWraper">
                         <div class="checkBox">
                           <label for="{!! $option->id !!}">
                              <input type="radio" class="validate_radio" name="radio_{!! $option->question_id !!}[]" id="{!! $option->id !!}" value="{!! $option->option_text !!}" tabindex="0">
                              <span>{!! $option->option_text !!}</span>
                           </label>
                        </div>
                       </div>

                        @endif
                        @endforeach
                     

                        @endif
                        @endif
                     </div>
                     <div class="field btns">
                        <button type="button" onclick="location.href='#step-{!! $key  !!}'" class="slick-prev slick-arrow">Back</button>
                        <button type="submit" name="submit" data-step-id='{!! $key +2 !!}' onclick="location.href='#step-{!! $key +2 !!}'" class="next{!! $key +2 !!} slick-next slick-arrow isvalid">Next</button>
                        <input type="submit"  value="submit"  name="name"/>
                     </div>
                  </li>
                  @endforeach
                  @endif
            

               </ul>
             </from>
           
         </div>
      </section>
      
      
   </body>
</html>

