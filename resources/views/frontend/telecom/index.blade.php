@extends('frontend.layouts.website.master')
@section('page-title', 'Telecom')
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
                                    <label for="">{!! getChannelQuestions('Company_Name') !!}</label>
                                    <input type="text" name="Company_Name" oninput="this.className = ''">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab">
                        <div class="row justify-content-center">
                            <div class="col-md-5">
                                <div class="fld-input">
                                    <label for="">{!! getChannelQuestions('Contact_Name') !!}</label>
                                    <input type="text" name="Contact_Name" oninput="this.className = ''">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab">
                        <div class="row justify-content-center">
                            <div class="col-md-5">
                                <div class="fld-input">
                                    <label for="">{!! getChannelQuestions('Title') !!} </label>
                                    <input type="text" name="Title" oninput="this.className = ''">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab">
                        <div class="row justify-content-center">
                            <div class="col-md-5">
                                <div class="fld-input">
                                    <label for="">{!! getChannelQuestions('Email') !!}</label>
                                    <input type="email" name="Email" oninput="this.className = ''">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab">
                        <div class="row justify-content-center">
                            <div class="col-md-5">
                                <div class="fld-input">
                                    <label for="">{!! getChannelQuestions('Phone') !!}</label>
                                    <input type="number" name="Phone" oninput="this.className = ''">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab">
                        <div class="row justify-content-center">
                            <div class="col-md-5">
                                <div class="fld-input">
                                    <label for="">{!! getChannelQuestions('Company_Website') !!}</label>
                                    <input type="text" name="Company_Website" oninput="this.className = ''">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab">
                        <div class="row justify-content-center">
                            <div class="col-md-5">
                                <div class="fld-input">
                                    <label for="">{!! getChannelQuestions('Physical_Address') !!}</label>
                                    <input type="text" name="Physical_Address" oninput="this.className = ''">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab">
                        <div class="row justify-content-center">
                            <div class="col-md-5">
                                <div class="fld-input">
                                    <label for="">{!! getChannelQuestions('Number_of_Seats/Users') !!}</label>
                                    <input type="number" name="Number_of_Seats/Users" oninput="this.className = ''">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab">
                        <div class="row justify-content-center">
                            <div class="col-md-5">
                                <div class="fld-input">
                                    <label for="">{!! getChannelQuestions('Number_of_Employees') !!} </label>
                                    <input type="number" name="Number_of_Employees" oninput="this.className = ''">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab">
                        <div class="row justify-content-center">
                            <div class="col-md-5">
                                <div class="fld-input">
                                    <label for="">{!! getChannelQuestions('Do_you_know_what_model_phones_you_use') !!}</label>
                                    <input type="text" name="Do_you_know_what_model_phones_you_use" oninput="this.className = ''">
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

</script>

@endsection

@endsection <!-- // page content end here -->