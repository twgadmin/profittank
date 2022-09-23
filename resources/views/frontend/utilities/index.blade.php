@extends('frontend.layouts.website.master')
@section('page-title', 'Utilities')
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
                                    <label for="">{!! getChannelQuestions('Who_do_you_purchase_your_energy_from') !!}<small>(NOTE:  this may not be the same as your utility company who actually delivers your energy and equipment)? </small></label>
                                    <input type="text" name="Who_do_you_purchase_your_energy_from" oninput="this.className = ''">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab">
                        <div class="row justify-content-center">
                            <div class="col-md-5">
                                <div class="fld-input">
                                    <label for="">{!! getChannelQuestions('How_do_you_primarily_use_energy') !!} </label>
                                    <select name="How_do_you_primarily_use_energy" id="">
                                        <option value="Heating">Heating</option>
                                        <option value="Cooling">Cooling</option>
                                        <option value="Both">Both</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab">
                        <div class="row justify-content-center">
                            <div class="col-md-5">
                                <div class="fld-upload">
                                    <label for="upload0">
                                        <input type="file" name="Upload_Utility_bills(2_months)" id="upload0" oninput="this.className = ''">
                                        <span>
                                            <figure><img src="{!! asset('assets/frontend/website/assets/images/icons/upload.svg') !!}" alt="" class="w-25"></figure>
                                            <h6>{!! getChannelQuestions('Upload_Utility_bills(2_months)') !!}</h6>
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
                                        <input type="file" name="Upload_Provider/Supplier_Contract_Agreement" id="upload01" oninput="this.className = ''">
                                        <span>
                                            <figure><img src="{!! asset('assets/frontend/website/assets/images/icons/upload.svg') !!}" alt="" class="w-25"></figure>
                                            <h6>{!! getChannelQuestions('Upload_Provider/Supplier_Contract_Agreement') !!}</h6>
                                            <p id="uploadeText01"></p>
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
            $("#nextBtn").attr("onclick", "FileTypevalidateEP('upload01')");
        } else {
            document.getElementById("nextBtn").setAttribute("onclick", "nextPrev(1)");
            document.getElementById("nextBtn").innerHTML = "Next";
        }
        if (currentTab == 3) {
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