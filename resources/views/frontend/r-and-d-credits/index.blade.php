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
                        <div class="row justify-content-center">
                            <div class="col-md-5">
                                <div class="fld-input">
                                    <label for="">{!! getChannelQuestions('Briefly_describe_what_type_of_activities_are_your_company_is_involved_in') !!}</label>
                                    <input type="text" name="Briefly_describe_what_type_of_activities_are_your_company_is_involved_in" oninput="this.className = ''">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab">
                        <div class="row justify-content-center">
                            <div class="col-md-5">
                                <div class="fld-input">
                                    <label for="">{!! getChannelQuestions('How_long_have_you_been_in_business') !!}</label>
                                    <select name="How_long_have_you_been_in_business" id="">
                                        <option value="Less than 3 years">Less than 3 years</option>
                                        <option value="3-5 years">3-5 years</option>
                                        <option value="6-10 years">6-10 years</option>
                                        <option value="11-15 years">11-15 years</option>
                                        <option value="16-20 years">16-20 years</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab">
                        <div class="row justify-content-center">
                            <div class="col-md-5">
                                <div class="fld-input">
                                    <label for="">{!! getChannelQuestions('What_would_you_estimate_is_your_revenue_for_the_current_year') !!}</label>
                                    <input type="text" name="What_would_you_estimate_is_your_revenue_for_the_current_year" oninput="this.className = ''">
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
                                        <input type="file" name="Signs_NDA" id="upload01" oninput="this.className = ''">
                                        <span>
                                            <figure><img src="{!! asset('assets/frontend/website/assets/images/icons/upload.svg') !!}" alt="" class="w-25"></figure>
                                            <h6>{!! getChannelQuestions('Signs_NDA') !!}</h6>
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
                                        <input type="file" name="Upload_Recent_Tax_Returns" id="upload02" oninput="this.className = ''">
                                        <span>
                                            <figure><img src="{!! asset('assets/frontend/website/assets/images/icons/upload.svg') !!}" alt="" class="w-25"></figure>
                                            <h6>{!! getChannelQuestions('Upload_Recent_Tax_Returns') !!}</h6>
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
                                        <input type="file" name="Upload_Employee_Wage_Information" id="upload03" oninput="this.className = ''">
                                        <span>
                                            <figure><img src="{!! asset('assets/frontend/website/assets/images/icons/upload.svg') !!}" alt="" class="w-25"></figure>
                                            <h6>{!! getChannelQuestions('Upload_Employee_Wage_Information') !!}</h6>
                                            <p id="uploadeText3"></p>
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
                                    <label for="upload04">
                                        <input type="file" name="Upload_Trial_Balance" id="upload04" oninput="this.className = ''">
                                        <span>
                                            <figure><img src="{!! asset('assets/frontend/website/assets/images/icons/upload.svg') !!}" alt="" class="w-25"></figure>
                                            <h6>{!! getChannelQuestions('Upload_Trial_Balance') !!}</h6>
                                            <p id="uploadeText4"></p>
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
                                    <label for="upload05">
                                        <input type="file" name="Upload_Organizational_Chart" id="upload05" oninput="this.className = ''">
                                        <span>
                                            <figure><img src="{!! asset('assets/frontend/website/assets/images/icons/upload.svg') !!}" alt="" class="w-25"></figure>
                                            <h6>{!! getChannelQuestions('Upload_Organizational_Chart') !!}</h6>
                                            <p id="uploadeText5"></p>
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
                                    <label for="upload06">
                                        <input type="file" name="Upload_Sample_Contracts" id="upload06" oninput="this.className = ''">
                                        <span>
                                            <figure><img src="{!! asset('assets/frontend/website/assets/images/icons/upload.svg') !!}" alt="" class="w-25"></figure>
                                            <h6>{!! getChannelQuestions('Upload_Sample_Contracts') !!}</h6>
                                            <p id="uploadeText6"></p>
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
            $("#nextBtn").attr("onclick", "FileTypevalidateEP('upload06')");
        } else {
            document.getElementById("nextBtn").setAttribute("onclick", "nextPrev(1)");
            document.getElementById("nextBtn").innerHTML = "Next";
        }

        if (currentTab == 4) {
            FileTypevalidate('upload0');
        }

         if (currentTab == 5) {
            FileTypevalidate('upload01');
        }

         if (currentTab == 6) {
            FileTypevalidate('upload02');
        }

         if (currentTab == 7) {
            FileTypevalidate('upload03');
        }

         if (currentTab == 8) {
            FileTypevalidate('upload04');
        }

         if (currentTab == 9) {
            FileTypevalidate('upload05');
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
            showTab(12);
        } else {
            formSubmit();
        }
    }

</script>

@endsection

@endsection <!-- // page content end here -->