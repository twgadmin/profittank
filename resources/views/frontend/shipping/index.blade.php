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
                    <div class="tab" >
                        <div class="row justify-content-center div" id="div">
                            <div class="col-md-8">
                                <div class="fld-input">
                                    <label for="">Please provide your online shipping credentials or create a separate one for Audintel. <br>
                                    <small>We will use this to download your shipment history and build a recommended pricing structure for your review with the carrier and based on your current rates, volumes, shipments, and all other data provided in your carrier portal</small></label>
                                </div>
                            </div>
                            <div class="clone col-md-10 row justify-content-center" id="clone">
                                <div class="col-md-4">
                                    <div class="fld-input">
                                        <label for="">{!! getChannelQuestions('Carrier') !!} </label>
                                        <select name="Carrier[]" id="">
                                            <option value="FedEx">FedEx</option>
                                            <option value="UPS">UPS</option>
                                            <option value="DHL">DHL</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="fld-input">
                                        <label for="">{!! getChannelQuestions('User_Name') !!}</label>
                                        <input type="text" name="User_Name[]" oninput="this.className = ''">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="fld-input">
                                        <label for="">{!! getChannelQuestions('Password') !!} </label>
                                        <input type="password" name="Password[]" oninput="this.className = ''">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 row" style="float:right; margin-top:10px">
                            <div class="fld-input">
                                <button style=" display: none;" type="button" name="cross_btn" id="cross_btn" >
                                    <img src="{!! asset('assets/frontend/website/assets/images/icons/cross.png') !!}" alt="" width="30px"> 
                                </button>
                            </div>
                            <div class="fld-input">
                                <button style="line-height: unset;padding: 0px;" type="button" name="clone_btn" id="clone_btn" class="btn btn-primary">
                                    <img src="{!! asset('assets/frontend/website/assets/images/icons/plus.png') !!}" alt="" width="30px"> 
                                </button>
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
                                        <input type="file" name="Upload_Parcel_Carrier_Contracts[]" id="upload01" oninput="this.className = ''" multiple>
                                        <span>
                                            <figure><img src="{!! asset('assets/frontend/website/assets/images/icons/upload.svg') !!}" alt="" class="w-25"></figure>
                                            <h6>{!! getChannelQuestions('Upload_Parcel_Carrier_Contracts') !!}</h6>
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
            $("#nextBtn").attr("onclick", "FileTypevalidatelast('upload01')");
        } else {
            document.getElementById("nextBtn").setAttribute("onclick", "nextPrev(1)");
            document.getElementById("nextBtn").innerHTML = "Next";
        }

        if (currentTab == 2) {
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
        // if you have reached the end of the form..

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

    function FileTypevalidatelast(filetype) {
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

    function FileTypevalidate(filetype) {
        var fileInput = document.getElementById(filetype);
        var filePath = fileInput.value;
        // Allowing file type
        var allowedExtensions = /(\.csv|\.doc|\.docx|\.pdf|\.xlsx|\.xls|\.txt)$/i;          
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