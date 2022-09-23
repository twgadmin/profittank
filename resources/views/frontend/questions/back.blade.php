<!DOCTYPE html>
<html lang="en">
   <head>
      <?php /* @include('frontend.layouts.compatibility') */ ?>
      <meta name="description" content="">
      <title>Business Form</title>
      <?php /* @include('frontend.layouts.style') */ ?>
   </head>
   <body>
  <!-- Chooose Business Type -->
   <section class="mainSec">
    <!-- container div  -->
     <div class="container">
         <!-- Query form starts  -->
            <form action="{{ url('ajaxGetCategories') }}" method="POST" role="form">
             @csrf
             @method('POST')
             <ul class="businessForm">
                 <!-- form steps 1  -->
                  <li class="page" id="step-1">
                        <div class="stepBox stepOne">
                           <h1>While results may vary, the following estimations are controlled by Federal and State statutes, regulations, and industry data. Without compromise, the security of your data is protected by robust security encryption & privacy protocols.</h1>
                           <div class="space"><br/><br/></div>
                           <a href="#" class="btn-theme m-auto d-block">SECURITY LOGO</a>
                           <div class="sliderRangeBox">
                              <?php /* @include('frontend.layouts.rangeSlider') */ ?>
                           </div> 
                        </div>
                        <div class="field btns">
                           <button type="button" class="slick-prev slick-arrow">Back</button>
                           <button type="button" onclick="location.href='#step-2'" class="slick-next slick-arrow">Next</button>
                        </div>
                  </li>
                  <!-- form steps 1 end  -->
                  <!-- form steps 2  -->
                  <li class="page" id="step-2">
                   <div class="stepBox stepTwo hding-2">
                     <?php /* @include('frontend.layouts.featureList') */ ?>
                      <h2>Describe Your Business <span>Click all that apply</span></h2>
                         <div class="error-msg" style="display: none;"><span>select at least one.</span></div>
                          <div class="checkBoxWraper">
                            <div class="checkBox">
                                 <label>
                                    <input type="checkbox"  id="business_1" name="business_1"  class="slide_2" value="1">
                                    <span>We hire employees</span>
                                    <i><img src="{!! asset('assets/frontend/calculator/images/icons/checkbox/1.png') !!}" /></i>
                                 </label>
                              </div>

                              <!-- <div class="checkBox">
                                 <label>
                                    <input type="checkbox"  id="checkbox" class="slide_2" value="">
                                    <span>We pay workers comp, insurance</span>
                                    <i><img src="{!! asset('assets/frontend/calculator/images/icons/checkbox/2.png') !!}" /></i>
                                 </label>
                              </div>

                              <div class="checkBox">
                                 <label>
                                    <input type="checkbox"  id="checkbox" class="slide_2" value="">
                                    <span>We offer health benefits</span>
                                    <i><img src="{!! asset('assets/frontend/calculator/images/icons/checkbox/3.png') !!}" /></i>
                                 </label>
                              </div>

                              <div class="checkBox">
                                 <label>
                                    <input type="checkbox"  id="checkbox" class="slide_2" value="">
                                    <span>We own commercial property</span>
                                    <i><img src="{!! asset('assets/frontend/calculator/images/icons/checkbox/4.png') !!}" /></i>
                                 </label>
                              </div>

                              <div class="checkBox">
                                 <label>
                                    <input type="checkbox"  id="checkbox" class="slide_2" value="">
                                    <span>We process payroll</span>
                                    <i><img src="{!! asset('assets/frontend/calculator/images/icons/checkbox/5.png') !!}" /></i>
                                 </label>
                              </div>

                              <div class="checkBox">
                                 <label>
                                    <input type="checkbox"  id="checkbox" class="slide_2" value="">
                                    <span>We pay for solid waste removal</span>
                                    <i><img src="{!! asset('assets/frontend/calculator/images/icons/checkbox/6.png') !!}" /></i>
                                 </label>
                              </div>

                              <div class="checkBox">
                                 <label>
                                    <input type="checkbox"  id="checkbox" class="slide_2" value="">
                                    <span>We pay for telephone services</span>
                                    <i><img src="{!! asset('assets/frontend/calculator/images/icons/checkbox/7.png') !!}" /></i>
                                 </label>
                              </div>

                              <div class="checkBox">
                                 <label>
                                    <input type="checkbox"  id="checkbox" class="slide_2" value="">
                                    <span>We  improve our processes</span>
                                    <i><img src="{!! asset('assets/frontend/calculator/images/icons/checkbox/8.png') !!}" /></i>
                                 </label>
                              </div>

                              <div class="checkBox">
                                 <label>
                                    <input type="checkbox"  id="checkbox" class="slide_2" value="">
                                    <span>We accept credit cards</span>
                                    <i><img src="{!! asset('assets/frontend/calculator/images/icons/checkbox/9.png') !!}" /></i>
                                 </label>
                              </div>

                              <div class="checkBox">
                                 <label>
                                    <input type="checkbox"  id="checkbox" class="slide_2" value="">
                                    <span>We pay for mediclal waste removal</span>
                                    <i><img src="{!! asset('assets/frontend/calculator/images/icons/checkbox/10.png') !!}" /></i>
                                 </label>
                              </div>

                              <div class="checkBox">
                                 <label>
                                    <input type="checkbox"  id="checkbox" class="slide_2" value="">
                                    <span>We ship small parcels</span>
                                    <i><img src="{!! asset('assets/frontend/calculator/images/icons/checkbox/11.png') !!}" /></i>
                                 </label>
                              </div>

                              <div class="checkBox">
                                 <label>
                                    <input type="checkbox"  id="checkbox" class="slide_2" value="">
                                    <span>We pay for utilities</span>
                                    <i><img src="{!! asset('assets/frontend/calculator/images/icons/checkbox/12.png') !!}" /></i>
                                 </label>
                              </div> -->

                           </div>

                           <div class="sliderRangeBox">
                            <?php /* @include('frontend.layouts.rangeSlider') */ ?>
                           </div>
                        </div>

                        <div class="field btns">
                           <button type="button" onclick="location.href='#step-1'" class="slick-prev slick-arrow">Back</button>
                           <button type="button" onclick="location.href='#step-3'" class="next2 slick-next slick-arrow">Next</button>
                        </div>
                  </li>
                 <!-- form steps 2 end  -->
                 <!-- form steps 3  -->

            
                 <!-- form steps 3 end  -->

               </ul>
            </form>
             <!--  Query form end  -->
         </div>
        <!-- container div  -->
       </section>
      <!-- Choose Business type -->

      <!-- scripts-->
        <?php /* @include('frontend.layouts.scripts') */ ?>
        <script>
         const _token =   $('input[name="_token"]').val();
         const _method =   $('input[name="_method"]').val();
         const business_1 = $('input[name="business_1"]').val();
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': _token
          }
        });
     // $(".btn-submit").on('click',function(e){  
      //$('.checkBox').click(function(e) {
      //   $("#business_1").is(this.checked);
         
      $('#business_1').click(function() {
        // e.preventDefault();
         $.ajax({
           url:'{{URL::to('/ajaxGetCategories')}}',
           data: { '_token': _token,'_method':_method,'business_1':business_1 },
           dataType: 'json',
           success:function(response){
            var personObject = JSON.parse(JSON.stringify(response.data)); //parse json string into JS object
                console.log(response.status);
                let txt = "";
                var count =2;
            
                  for (let x in personObject) {
                   //  txt += personObject[x] + " ";
                     count++;
                     var step = count;
                     step++;   
                     
                     var button_step = "'#step-"+step+"'";
                     var button = '<button type="button" onclick="location.href='+button_step+'" class="next4 slick-next slick-arrow">Next</button></div>';
           
                     console.log(personObject[x]['questions']);
                     var html = "";
                     html += '<li  class="page" id="step-'+count+'">';
                     html += '<div class="stepBox stepThree hding-2">';
                     html += ' <!-- featureList -->';
                     html += '<ul class="featureList"><li><p>Profit Increase <span>0%</span></p></li><li><p>sales equivalment <span>$0,000</span></p></li><li><p>Old Profit Margin<span>0%</span></p></li><li><p>New Profit Margin <span>0%</span></p></li><li><p>Lifetime value<span>$0,000</span></p></li></ul>';
                     html += ' <!-- featureList -->';
                     html += "<h2>"+personObject[x]['questions']+"</h2>";
                     html += '<div class="space"><br/><br/></div><div class="error-msg" style="display: none;"><span>Please enter a whole number betWeen 100 and 99,999,999.</span></div>';
                     html += '<div class="fld-input"><input type="text" name="cn" class="price annualRev" placeholder="$ annual revenue"/></div>';
                     html += '<div class="sliderRangeBox"> ';
                     html += '<!-- rangeSlider --> '; 
                     html += '<!-- rangeSlider --></div></div>';   
                     html += '<div class="field btns"><button type="button" onclick="location.href="#step-2"" class="slick-prev slick-arrow ">Back</button>';
                     html += button;
                     html += '</li>';   
                     $('.businessForm').append(html); 
               }
            }
         });
      });
          
          

           
 
        </script>
      <!-- scripts-->
      
   </body>
</html>

