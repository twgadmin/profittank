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
                                    <label for="">{!! getChannelQuestions('what_type_of_building_do_you_have') !!}</label>
                                    <input type="text" name="what_type_of_building_do_you_have" oninput="this.className = ''">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab">
                        <div class="row justify-content-center">
                            <div class="col-md-5">
                                <div class="fld-input">
                                    <label for="">{!! getChannelQuestions('list_the_building_address') !!}</label>
                                    <input type="text" name="list_the_building_address" oninput="this.className = ''">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab">
                        <div class="row justify-content-center">
                            <div class="col-md-5">
                                <div class="fld-input">
                                    <label for="">{!! getChannelQuestions('acquisition_or_new_construction') !!}</label>
                                    <div class="row fld-radio justify-content-center">
                                        <div class="col-md-5">
                                            <label for="yes1">
                                                <input type="radio" name="acquisition_or_new_construction" id="yes1" value="acquisition" oninput="this.className = ''">
                                                <span>Acquisition</span>
                                            </label>
                                        </div>
                                        <div class="col-md-5">
                                            <label for="no1">
                                                <input type="radio" name="acquisition_or_new_construction" id="no1" value="new_construction" oninput="this.className = ''">
                                                <span>New Construction</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="acquisition" >
                        <div class="tab">
                            <div class="row justify-content-center">
                                <div class="col-md-5">
                                    <div class="fld-input">
                                        <label for="">{!! getChannelQuestions('purchase_price') !!}</label>
                                        <input type="number" min="0" id="purchase_price" name="purchase_price" oninput="this.className = ''">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab">
                            <div class="row justify-content-center">
                                <div class="col-md-5">
                                    <div class="fld-input">
                                        <label for="">{!! getChannelQuestions('date_of_purchase') !!}</label>
                                        <input type="date" name="date_of_purchase" id="date_of_purchase" oninput="this.className = ''">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab">
                            <div class="row justify-content-center">
                                <div class="col-md-5">
                                    <div class="fld-input">
                                        <label for="">{!! getChannelQuestions('1030_exchange') !!}</label>
                                        <div class="row fld-radio justify-content-center">
                                            <div class="col-md-5">
                                                <label for="yes2">
                                                    <input type="radio" name="1030_exchange" id="yes2" value="yes" oninput="this.className = ''">
                                                    <span>Yes</span>
                                                </label>
                                            </div>
                                            <div class="col-md-5">
                                                <label for="no2">
                                                    <input type="radio" name="1030_exchange" id="no2" value="no" oninput="this.className = ''">
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
                                        <label for="">{!! getChannelQuestions('any_plans_to_renovate_or_modify_a_significant_portion_of_the_building') !!}</label>
                                        <div class="row fld-radio justify-content-center">
                                            <div class="col-md-5">
                                                <label for="yes3">
                                                    <input type="radio" name="any_plans_to_renovate_or_modify_a_significant_portion_of_the_building" id="yes3" value="yes" oninput="this.className = ''">
                                                    <span>Yes</span>
                                                </label>
                                            </div>
                                            <div class="col-md-5">
                                                <label for="no3">
                                                    <input type="radio" name="any_plans_to_renovate_or_modify_a_significant_portion_of_the_building" id="no3" value="no" oninput="this.className = ''">
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
                                        <label for="">{!! getChannelQuestions('will_you_be_uploading_a_detailed_depreciation_schedule') !!}<small>(We can still provide an estimate without one, but with a depreciation schedule improves our accuracy).</small></label>
                                        <div class="row fld-radio justify-content-center">
                                            <div class="col-md-5">
                                                <label for="yes4">
                                                    <input type="radio" name="will_you_be_uploading_a_detailed_depreciation_schedule" id="yes4" value="yes" oninput="this.className = ''">
                                                    <span>Yes</span>
                                                </label>
                                            </div>
                                            <div class="col-md-5">
                                                <label for="no4">
                                                    <input type="radio" name="will_you_be_uploading_a_detailed_depreciation_schedule" id="no4" value="no" oninput="this.className = ''">
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
                                            <input type="file" name="Signs_Agreement1" id="upload0" oninput="this.className = ''">
                                            <span>
                                                <figure><img src="{!! asset('assets/frontend/website/assets/images/icons/upload.svg') !!}" alt="" class="w-25"></figure>
                                                <h6>{!! getChannelQuestions('Signs_Agreement1') !!}</h6>
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
                                            <input type="file" name="Rent_Rolls" id="upload01" oninput="this.className = ''">
                                            <span>
                                                <figure><img src="{!! asset('assets/frontend/website/assets/images/icons/upload.svg') !!}" alt="" class="w-25"></figure>
                                                <h6>{!! getChannelQuestions('Rent_Rolls') !!}</h6>
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
                                            <input type="file" name="Appraisals" id="upload02" oninput="this.className = ''">
                                            <span>
                                                <figure><img src="{!! asset('assets/frontend/website/assets/images/icons/upload.svg') !!}" alt="" class="w-25"></figure>
                                                <h6>{!! getChannelQuestions('Appraisals') !!}</h6>
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
                                            <input type="file" name="Depreciation_Schedule" id="upload03" oninput="this.className = ''">
                                            <span>
                                                <figure><img src="{!! asset('assets/frontend/website/assets/images/icons/upload.svg') !!}" alt="" class="w-25"></figure>
                                                <h6>{!! getChannelQuestions('Depreciation_Schedule') !!}</h6>
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
                                            <input type="file" name="Purchase_Agreement" id="upload04" oninput="this.className = ''">
                                            <span>
                                                <figure><img src="{!! asset('assets/frontend/website/assets/images/icons/upload.svg') !!}" alt="" class="w-25"></figure>
                                                <h6>{!! getChannelQuestions('Purchase_Agreement') !!}</h6>
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
                                            <input type="file" name="Engineering_Plans1" id="upload05" oninput="this.className = ''">
                                            <span>
                                                <figure><img src="{!! asset('assets/frontend/website/assets/images/icons/upload.svg') !!}" alt="" class="w-25"></figure>
                                                <h6>{!! getChannelQuestions('Engineering_Plans1') !!}</h6>
                                                <p id="uploadeText5"></p>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="new_construction">
                        <div class="tab">
                            <div class="row justify-content-center">
                                <div class="col-md-5">
                                    <div class="fld-input">
                                        <label for="">{!! getChannelQuestions('total_construction_cost') !!}</label>
                                        <input type="number" min="0" id="total_construction_cost" name="total_construction_cost" oninput="this.className = ''">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab">
                            <div class="row justify-content-center">
                                <div class="col-md-5">
                                    <div class="fld-input">
                                        <label for="">{!! getChannelQuestions('placed_in_service_date') !!}</label>
                                        <input type="date" id="placed_in_service_date" name="placed_in_service_date" oninput="this.className = ''">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab">
                            <div class="row justify-content-center">
                                <div class="col-md-5">
                                    <div class="fld-upload">
                                        <label for="upload06">
                                            <input type="file" name="Signs_Agreement" id="upload06" oninput="this.className = ''">
                                            <span>
                                                <figure><img src="{!! asset('assets/frontend/website/assets/images/icons/upload.svg') !!}" alt="" class="w-25"></figure>
                                                <h6>{!! getChannelQuestions('Signs_Agreement') !!}</h6>
                                                <p id="uploadeText6"></p>
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
                                        <label for="upload07">
                                            <input type="file" name="Construction_Cost_Ledger" id="upload07" oninput="this.className = ''">
                                            <span>
                                                <figure><img src="{!! asset('assets/frontend/website/assets/images/icons/upload.svg') !!}" alt="" class="w-25"></figure>
                                                <h6>{!! getChannelQuestions('Construction_Cost_Ledger') !!}</h6> 
                                                    <small>(Note to User:  This is a clear and final ledger that reconciles to that number. Provide copies of all construction invoices including final contractor payment applications, change orders, and any other cost documentation which tie-to line items seen on the ledger requested above.)</small> 
                                                <p id="uploadeText7"></p>
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
                                        <label for="upload08">
                                            <input type="file" name="Engineering_Plans" id="upload08" oninput="this.className = ''">
                                            <span>
                                                <figure><img src="{!! asset('assets/frontend/website/assets/images/icons/upload.svg') !!}" alt="" class="w-25"></figure>
                                                <h6>{!! getChannelQuestions('Engineering_Plans') !!}</h6>
                                                <p id="uploadeText8"></p>
                                            </span>
                                        </label>
                                    </div>
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
            $("#nextBtn").attr("onclick", "FileTypevalidateEP2('upload08')");
        } else {
            if(currentTab == 13){
                document.getElementById("nextBtn").innerHTML = "Submit";
                $("#nextBtn").attr("onclick", "FileTypevalidateEP('upload05')");
            } else {
                document.getElementById("nextBtn").setAttribute("onclick", "nextPrev(1)");
                document.getElementById("nextBtn").innerHTML = "Next";
            }
        }

        if (currentTab == 9) {
            FileTypevalidate('upload0');
        }

        if (currentTab == 10) {
            FileTypevalidate('upload01');
        }

         if (currentTab == 11) {
            FileTypevalidate('upload02');
        }

         if (currentTab == 12) {
            FileTypevalidate('upload03');
        }

         if (currentTab == 13) {
            FileTypevalidate('upload04');
        }

         if (currentTab == 17) {
            FileTypevalidate('upload06');
        }

        if (currentTab == 18) {
            FileTypevalidate('upload07');
        }

        //... and run a function that will display the correct step indicator:
        fixStepIndicator(n)
    }

    function nextPrev(n) {

        if(n < 1 && currentTab == 14){
            var x = document.getElementsByClassName("tab");
            x[currentTab].style.display = "none";
            currentTab = 3;
            currentTab = currentTab + n;
            showTab(currentTab);
        }

        if(n > 0 && currentTab ==2){
            var i= $('input[name="acquisition_or_new_construction"]:checked').val();
            if (i=="acquisition") { // equal to a selection option
                var x = document.getElementsByClassName("tab");
                x[currentTab].style.display = "none";
                currentTab = currentTab + n;
                if (currentTab >= x.length) {
                    return true;
                }
                $('#acquisition').show();  
                $('#new_construction').hide(); // hide the first one
                showTab(currentTab);
            }
            else if (i=="new_construction") {
                var x = document.getElementsByClassName("tab");
                x[currentTab].style.display = "none";
                currentTab = 13;
                currentTab = currentTab + n;
                if (currentTab >= x.length) {
                    return true;
                }
                $('#new_construction ').show(); // show the other one
                $('#acquisition ').hide(); // hide the first one
                showTab(currentTab);
            }
        }

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
        var i= $('input[name="acquisition_or_new_construction"]:checked').val();

        if (i=="acquisition") { 
            $("#total_construction_cost").remove();
            $("#placed_in_service_date").remove();
            $(".Construction_Cost_Ledger").remove();
            $(".Engineering_Plans1").remove();
            $(".Signs_Agreement1").remove();
        }
        else if (i=="new_construction") {
            $("#purchase_price").remove();
            $("#date_of_purchase").remove();
            $(".1030_exchange").remove();
            $(".any_plans_to_renovate_or_modify_a_significant_portion_of_the_building").remove();
            $(".will_you_be_uploading_a_detailed_depreciation_schedule").remove();
            $(".Rent_Rolls").remove();
            $(".Appraisals").remove();
            $(".Depreciation_Schedule").remove();
            $(".Purchase_Agreement").remove();
            $(".Engineering_Plans").remove();
            $(".Signs_Agreement").remove();
        }

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
    function FileTypevalidateEP(filetype) {
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
            showTab(13);
        } else {
            formSubmit();
        }
    }

    function FileTypevalidateEP2(filetype) {
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
            showTab(18);
        } else {
            formSubmit();
        }
    }

</script>

@endsection

@endsection <!-- // page content end here -->