@extends('frontend.layouts.website.master')
@section('page-title', 'Activate Channel')
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
                <form id="activateForm" class="w-100" method="POST"  action="{!! route('activate-channel-submit') !!}"  enctype="multipart/form-data">
                    
             @csrf
             @method('POST')
                    <div class="tab">
                        <div class="row justify-content-center">
                            <div class="col-md-5">
                                <div class="fld-input">
                                    <label for="">What Type of merchant processing software(s) do you use?</label>
                                    <input type="text" name="merchant" oninput="this.className = ''">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab">
                        <div class="row justify-content-center">
                            <div class="col-md-5">
                                <div class="fld-input">
                                    <label for="">Are you under contract?</label>
                                    <div class="row fld-radio">
                                        <div class="col-md-4">
                                            <label for="yes">
                                                <input type="radio" name="radio" id="yes" value="1" oninput="this.className = ''">
                                                <span>Yes</span>
                                            </label>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="no">
                                                <input type="radio" name="radio" id="no" value="2" oninput="this.className = ''">
                                                <span>No</span>
                                            </label>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="unknown">
                                                <input type="radio" name="radio" value="3"  id="unknown" oninput="this.className = ''">
                                                <span>Unknown</span>
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
                                    <label for="">When does your contract end?</label>
                                    <input type="date" name="contract" oninput="this.className = ''">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab">
                        <div class="row justify-content-center">
                            <div class="col-md-5">
                                <div class="fld-upload">
                                    <label for="upload">
                                        <input type="file" name="document" id="upload" oninput="this.className = ''">
                                        <span>
                                            <figure><img src="{!! asset('assets/frontend/website/assets/images/icons/upload.svg') !!}" alt="" class="w-25"></figure>
                                            <h6>Upload Documents</h6>
                                            <p id="uploadeText"></p>
                                        </span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab">
                        <div class="fld-meeting">
                            <div class="schedulBtn">
                                <button type="button" class="merchantService" data-dismiss="alert" aria-hidden="true">SCHEDULE YOUR MEETING</button>
                                <p>Schedule a meeting with your profit channel expert</p>
                            </div>
                            
                            <div class="merchantServiceBox">
                                <div class="merchantHead">
                                    <h2>MARCHANT SERVICE</h2>
                                </div>
                                <div class="marchantMid">
                                    <div class="row m-0">
                                        <div class="col-md-6 p-0">
                                            <div class="calanderBox">
                                                <h3><span></span> Schedule a meeting with your<br/> Marchant Service Expert</h3>
                                                <div id="datetimepicker"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 p-0">
                                            <div class="calenderContent">
                                                <h3>How long do you need?</h3>
                                                
                                                <div class="btn-grp">
                                                    <label for="min15">
                                                        <input type="radio" name="radio" id="min15" value="">
                                                        <span>15 mins</span>
                                                    </label>
                                                    <label for="min30">
                                                        <input type="radio" name="radio" id="min30" value="">
                                                        <span>30 mins</span>
                                                    </label>
                                                    <label for="hour1">
                                                        <input type="radio" name="radio" id="hour1" value="">
                                                        <span>1 hour</span>
                                                    </label>
                                                </div>
                        
                                                <div class="space"><br/><br/></div>
                        
                                                <h3>What time works best?</h3>
                                                <select name="" id="">
                                                    <option value="UTC - 05:00 Eastern Time">UTC - 05:00 Eastern Time</option>
                                                </select>
                        
                                                <div class="space"><br/><br/></div>
                        
                                                <div class="calendarTime">
                                                    <label>
                                                        <input type="checkbox" name="" value="">
                                                        <span>3:45 pm</span>
                                                    </label>
                                                    <label>
                                                        <input type="checkbox" name="" value="">
                                                        <span>4:00 pm</span>
                                                    </label>
                                                    <label>
                                                        <input type="checkbox" name="" value="">
                                                        <span>4:15 pm</span>
                                                    </label>
                                                    <label>
                                                        <input type="checkbox" name="" value="">
                                                        <span>4:30 pm</span>
                                                    </label>
                                                    <label>
                                                        <input type="checkbox" name="" value="">
                                                        <span>4:45 pm</span>
                                                    </label>
                                                </div>
                                                
                                            </div>
                                        </div>
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
            document.getElementById("nextBtn").setAttribute("onclick", "submits()");

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

            alert("hey");
            // ... the form gets submitted:
            document.getElementById("activateForm").submit();
            return true;
            
        }
        // Otherwise, display the correct tab:
        showTab(currentTab);
        }

        function  submits() {
            var form = document.getElementById('activateForm');
            var hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'channel_id');
            hiddenInput.setAttribute('id', 'channel_id');
            hiddenInput.setAttribute('value', {!! (isset(request()->channel_id) && request()->channel_id > 0) ? request()->channel_id:0 !!});
            form.appendChild(hiddenInput);
            form.submit();
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