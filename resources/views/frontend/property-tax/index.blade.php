@extends('frontend.layouts.website.master')
@section('page-title', 'Property Tax')
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
                        <div class="row justify-content-center mb-4">
                            <div class="col-md-5">
                                <div class="fld-input">
                                    <label for="">{!! getChannelQuestions('Do_you_have_a_current_property_tax_provider') !!}</label>
                                    <div class="row fld-radio justify-content-center">
                                        <div class="col-md-4">
                                            <label for="yes1">
                                                <input type="radio" name="Do_you_have_a_current_property_tax_provider" id="yes1" value="yes" oninput="this.className = ''">
                                                <span>Yes</span>
                                            </label>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="no1">
                                                <input type="radio" name="Do_you_have_a_current_property_tax_provider" id="no1" value="no" oninput="this.className = ''">
                                                <span>No</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-5">
                                <div class="fld-input">
                                    <label for="">{!! getChannelQuestions('If_yes_above_with_whom_do_you_work') !!}</label>
                                    <div class="row fld-radio justify-content-center">
                                        <div class="col-md-4">
                                            <label for="yes2">
                                                <input type="checkbox" name="If_yes_above_with_whom_do_you_work" id="yes2" value="yes" oninput="this.className = ''">
                                                <span>Yes</span>
                                            </label>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="no2">
                                                <input type="checkbox" name="If_yes_above_with_whom_do_you_work" id="no2" value="no" oninput="this.className = ''">
                                                <span>No</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab">
                        <div class="row justify-content-center">
                            <div class="col-md-5">
                                <div class="fld-input">
                                    <label for="">{!! getChannelQuestions('Has_the_property_been_appealed_over_the_last_3_years') !!}</label>
                                    <div class="row fld-radio  justify-content-center">
                                        <div class="col-md-4">
                                            <label for="yes3">
                                                <input type="radio" name="Has_the_property_been_appealed_over_the_last_3_years" id="yes3" value="yes" oninput="this.className = ''">
                                                <span>Yes</span>
                                            </label>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="no3">
                                                <input type="radio" name="Has_the_property_been_appealed_over_the_last_3_years" id="no3" value="no" oninput="this.className = ''">
                                                <span>No</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab">
                        <div class="row justify-content-center">
                            <div class="col-md-5">
                                <div class="fld-upload">
                                    <label for="upload0">
                                        <input type="file" name="Signs_Agreement" id="upload0" oninput="this.className = ''">
                                        <span>
                                            <figure><img src="{!! asset('assets/frontend/website/assets/images/icons/upload.svg') !!}" alt="" class="w-25"></figure>
                                            <h6>{!! getChannelQuestions('Signs_Agreement') !!}</h6>
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
                                        <input type="file" name="Signs_Letter_Of_Authority" id="upload01" oninput="this.className = ''">
                                        <span>
                                            <figure><img src="{!! asset('assets/frontend/website/assets/images/icons/upload.svg') !!}" alt="" class="w-25"></figure>
                                            <h6>{!! getChannelQuestions('Signs_Letter_Of_Authority') !!}</h6>
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
                                        <input type="file" name="Upload_Real_Estate_Operating_Statement" id="upload02" oninput="this.className = ''">
                                        <span>
                                            <figure><img src="{!! asset('assets/frontend/website/assets/images/icons/upload.svg') !!}" alt="" class="w-25"></figure>
                                            <h6>{!! getChannelQuestions('Upload_Real_Estate_Operating_Statement') !!}</h6>
                                            <p id="uploadeText2"></p>
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
                                    <label for="upload03">
                                        <input type="file" name="Upload_Rent_Rolls(if_property_is_leased)" id="upload03" oninput="this.className = ''">
                                        <span>
                                            <figure><img src="{!! asset('assets/frontend/website/assets/images/icons/upload.svg') !!}" alt="" class="w-25"></figure>
                                            <h6>{!! getChannelQuestions('Upload_Rent_Rolls(if_property_is_leased)') !!}</h6>
                                            <p id="uploadeText3"></p>
                                        </span>
                                    </label>
                                </div>
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
                $("#nextBtn").attr("onclick", "FileTypevalidateEP('upload03')");
        } else {
            document.getElementById("nextBtn").setAttribute("onclick", "nextPrev(1)");
            document.getElementById("nextBtn").innerHTML = "Next";
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

    function FileTypevalidateEP(filetype) {
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
            showTab(6);
        } else {
            formSubmit();
        }
    }

</script>

@endsection

@endsection <!-- // page content end here -->