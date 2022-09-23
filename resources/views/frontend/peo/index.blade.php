@extends('frontend.layouts.website.master')
@section('page-title', 'PEO')
<!-- page content  -->
@section('content')
<div id="render">
    <section class="activateForm pad-50">
        <div class="container">
            <ul class="activateSteps">
                <li class="step"><span>Form Questions</span></li>
                <li class="step"><span>Upload Documents</span></li>
            </ul>
            <div class="ActivateStepForm">
                <form id="activateForm" class="w-100" method="POST"  action="{!! route('activate-channel-submit') !!}" enctype="multipart/form-data"> 
                 @csrf
                 @method('POST')
                    <div class="tab">
                        <div class="row justify-content-center">
                            <div class="col-md-5">
                                <div class="fld-input">
                                    <label for="">{!! getChannelQuestions('Which_PEO_do_you_currently_partner_with') !!}</label>
                                    <input type="text" name="Which_PEO_do_you_currently_partner_with" oninput="this.className = ''">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab">
                        <div class="row justify-content-center">
                            <div class="col-md-5">
                                <div class="fld-input">
                                    <label for="">{!! getChannelQuestions('When_is_your_medical_renewal') !!}</label>
                                    <input type="date" name="When_is_your_medical_renewal" oninput="this.className = ''">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab">
                        <div class="row justify-content-center">
                            <div class="col-md-5">
                                <div class="fld-upload">
                                    <label for="upload0">
                                        <input type="file" name="Upload_Payroll_Summary_Report" id="upload0" oninput="this.className = ''">
                                        <span>
                                            <figure><img src="{!! asset('assets/frontend/website/assets/images/icons/upload.svg') !!}" alt="" class="w-25"></figure>
                                            <h6>{!! getChannelQuestions('Upload_Payroll_Summary_Report') !!}</h6>
                                            <p id="uploadeText0"></p>
                                        </span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab">
                        <div class="row justify-content-center">
                            <div class="col-md-5">
                                <div class="fld-upload">
                                    <label for="upload01">
                                        <input type="file" name="Upload_Workers_Comp_Loss_Runs(3_years)" id="upload01" oninput="this.className = ''">
                                        <span>
                                            <figure><img src="{!! asset('assets/frontend/website/assets/images/icons/upload.svg') !!}" alt="" class="w-25"></figure>
                                            <h6>{!! getChannelQuestions('Upload_Workers_Comp_Loss_Runs(3_years)') !!}</h6>
                                            <p id="uploadeText1"></p>
                                        </span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab">
                        <div class="row justify-content-center">
                            <div class="col-md-5">
                                <div class="fld-upload">
                                    <label for="upload02">
                                        <input type="file" name="Upload_Workers_Comp_Declaration_Page" id="upload02" oninput="this.className = ''">
                                        <span>
                                            <figure><img src="{!! asset('assets/frontend/website/assets/images/icons/upload.svg') !!}" alt="" class="w-25"></figure>
                                            <h6>{!! getChannelQuestions('Upload_Workers_Comp_Declaration_Page') !!} </h6>
                                            <p id="uploadeText2"></p>
                                        </span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab" >
                        <div class="row justify-content-center div" id="div">
                            <div class="clone col-md-10 row justify-content-center" id="clone">
                                <div class="col-md-5">
                                    <div class="fld-input">
                                        <label for="">{!! getChannelQuestions('Business_Name') !!}</label>
                                        <input type="text" name="Business_Name[]" oninput="this.className = ''">
                                    </div>
                                </div>

                                <div class="col-md-5">
                                    <div class="fld-input">
                                        <label for="">{!! getChannelQuestions('Business_EIN_No') !!}</label>
                                        <input type="number" name="Business_EIN_No[]" oninput="this.className = ''">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 row" style="float:right;">
                            <div class="fld-input">
                                <button style="line-height: unset;padding: 0px;" type="button" name="clone_btn" id="clone_btn" class="btn btn-primary">
                                    <img src="{!! asset('assets/frontend/website/assets/images/icons/plus.png') !!}" alt="" style="height: 30px; width: 30px;"> 
                                </button>
                            </div>
                            <div class="fld-input">
                                <button style=" display: none;line-height: unset;padding: 0px;" type="button" name="cross_btn" id="cross_btn"  class="btn btn-default">
                                    <img src="{!! asset('assets/frontend/website/assets/images/icons/cross.png') !!}" alt="" style="height: 33px; width: 33px;"> 
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="fldBtn">
                        <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                        <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
@section('js')
<script>        
    $(document).ready(function(){
        $('#clone_btn').click(function(){
            $("#div").append($("#clone").clone().find("input").val("").end());
            $(document).find('#cross_btn').last().show();
        });

        $('#cross_btn').click(function(){
            $("#div #clone").last().remove();

            if($("#div #clone").length == 1){
              $(document).find('#cross_btn').hide();
            }
        });
    });

    var currentTab = 0; // Current tab is set to be the first tab (0)
    showTab(currentTab); // Display the current tab

    function showTab(n) {
        // This function will display the specified tab of the form...
        var x = document.getElementsByClassName("tab");
        x[n].style.display = "block";
        //... and fix the Previous/Next buttons:

        if (n == 0) {
            document.getElementById("prevBtn").style.display = "none";
        } else {
            document.getElementById("prevBtn").style.display = "inline-block";
        }

        if (n == (x.length - 1)) {
            document.getElementById("nextBtn").innerHTML = "Submit";
            document.getElementById("nextBtn").setAttribute("onclick", "formSubmit()");
        } else {
            document.getElementById("nextBtn").setAttribute("onclick", "nextPrev(1)");
            document.getElementById("nextBtn").innerHTML = "Next";
        }
        //... and run a function that will display the correct step indicator:
        fixStepIndicator(n)
    }

    function nextPrev(n) {
        // This function will figure out which tab to display
        var x = document.getElementsByClassName("tab");
        // Exit the function if any field in the current tab is invalid:

        if (n == 1 && !validateForm()) return false;
        // Hide the current tab:
        x[currentTab].style.display = "none";
        // Increase or decrease the current tab by 1:
        currentTab = currentTab + n;
        // if you have reached the end of the form...

        if (currentTab >= x.length) {
            // ... the form gets submitted:
            // document.getElementById("activateForm").submit();
            return true;
        }

        if (currentTab == 3) {
            FileTypevalidate('upload0');
        }

         if (currentTab == 4) {
            FileTypevalidate('upload01');
        }

         if (currentTab == 5) {
            FileTypevalidate('upload02');
        }

        // Otherwise, display the correct tab:
        showTab(currentTab);
    }

    function formSubmit() {
        var form = document.getElementById('activateForm');
        var hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'channel_id');
        hiddenInput.setAttribute('id', 'channel_id');
        hiddenInput.setAttribute('value', {!! (isset(request()->channel_id) && request()->channel_id > 0) ? request()->channel_id:0 !!});
        form.appendChild(hiddenInput);
        document.getElementById("activateForm").submit();
    }

    function validateForm() {
        // This function deals with validation of the form fields
        var x, y, i, valid = true;
        x = document.getElementsByClassName("tab");
        y = x[currentTab].getElementsByTagName("input");
        // A loop that checks every input field in the current tab:

        for (i = 0; i < y.length; i++) {
            // If a field is empty...

            if (y[i].value == "") {
            // add an "invalid" class to the field:
            y[i].className += " invalid";
            // and set the current valid status to false
            valid = false;
            }
        }
        return valid; // return the valid status
    }

    function FileTypevalidate(filetype) {
        var fileInput = document.getElementById(filetype);
        var filePath = fileInput.value;
        // Allowing file type
        var allowedExtensions = /(\.csv|\.doc|\.docx|\.pdf|\.xlsx|\.xls|\.txt)$/i;
          
        if (!allowedExtensions.exec(filePath)) {
             swal({
                title: "Invalid file type",
                text: "File type you selected is not allowed.",
                type: "warning"
                });
            nextPrev(-1);
        }
    } 

</script>

@endsection

@endsection <!-- // page content end here -->