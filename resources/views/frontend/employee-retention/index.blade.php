@extends('frontend.layouts.website.master')
@section('page-title', 'Cost Segregation Questions')
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
                                    <label for="">{!! getChannelQuestions('How_many_full_time_employees_did_you_have_in_2019') !!}</label>
                                    <input min="0" type="number" name="How_many_full_time_employees_did_you_have_in_2019" oninput="this.className = ''">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab">
                        <div class="row justify-content-center">
                            <div class="col-md-5">
                                <div class="fld-input">
                                    <label for="">{!! getChannelQuestions('Do_you_have_any_related_management_agreements') !!}</label>
                                    <select name="Do_you_have_any_related_management_agreements" id="">
                                        <option value="yes">Yes</option>
                                        <option value="no">No</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    $years =  range(2019, date("Y"));
                    ?> 
                    <div class="tab">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="fld-input">
                                    <label for="">{!! getChannelQuestions('q1') !!} 
                                    Please confirm your gross receipt amounts by Quarter, from 2019 to current</label>
                                </div>
                            </div>
                            <div class="row col-md-12 justify-content-center">
                            @foreach ($years as $key => $year)
                                <div class="fld-radio col-md-3 mb-2">
                                    <label for="{!! $year !!}/Q1">
                                        <input type="radio" name="q1" id="{!! $year !!}/Q1" value="{!! $year !!}/Q1" oninput="this.className = ''" >
                                        <span>{!! $year !!} / Q1</span>
                                    </label>
                                    <label for="{!! $year !!}/Q2">
                                        <input type="radio" name="q2" id="{!! $year !!}/Q2" value="{!! $year !!}/Q2" oninput="this.className = ''" >
                                        <span>{!! $year !!} / Q2</span>
                                    </label>
                                    <label for="{!! $year !!}/Q3">
                                        <input type="radio" name="q3" value="{!! $year !!}/Q3"  id="{!! $year !!}/Q3" oninput="this.className = ''" >
                                        <span>{!! $year !!} / Q3</span>
                                    </label>
                                    <label for="{!! $year !!}/Q4">
                                        <input type="radio" name="q4" value="{!! $year !!}/Q4"  id="{!! $year !!}/Q4" oninput="this.className = ''" >
                                        <span>{!! $year !!} / Q4</span>
                                    </label>
                                </div>
                            @endforeach
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
                                        <input type="file" name="User_Docs" id="upload01" oninput="this.className = ''">
                                        <span>
                                            <figure><img src="{!! asset('assets/frontend/website/assets/images/icons/upload.svg') !!}" alt="" class="w-25"></figure>
                                            <h6>{!! getChannelQuestions('User_Docs') !!}</h6>
                                            <p id="uploadeText1"></p>
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
            // document.getElementById("nextBtn").setAttribute("onclick", "formSubmit()");
            $("#nextBtn").attr("onclick", "FileTypevalidateLast('upload01')");
        } else {
            document.getElementById("nextBtn").setAttribute("onclick", "nextPrev(1)");
            document.getElementById("nextBtn").innerHTML = "Next";
        }

        if (currentTab == 4) {
            FileTypevalidate('upload0');
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
A
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

    function FileTypevalidateLast(filetype) {
        var fileInput = document.getElementById(filetype);
        var filePath = fileInput.value;
        // Allowing file type
        var allowedExtensions = /(\.csv|\.doc|\.docx|\.pdf|\.xlsx|\.xls|\.txt)$/i;
          
        if (!allowedExtensions.exec(filePath)) {
            swal({
                title: "Invalid file type",
                text: "File typea you selected is not allowed.",
                type: "warning"
                });
            showTab(4);
        } else {
            formSubmit();
        }
    }
    function FileTypevalidate(filetype) {
        var fileInput = document.getElementById(filetype);
        var filePath = fileInput.value;
        // Allowing file type
        var allowedExtensions = /(\.csv|\.doc|\.docx|\.pdf|\.txt)$/i;
          
        if (!allowedExtensions.exec(filePath)) {
             swal({
                title: "Invalid file type",
                text: "File types you selected is not allowed.",
                type: "warning"
                });
            nextPrev(-1);
        }
    } 
</script>

@endsection

@endsection <!-- // page content end here -->