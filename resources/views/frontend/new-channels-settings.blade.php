@extends('frontend.layouts.website.master')
@section('page-title', 'Channel settings')
@section('style')
<!-- CSS - STYLING -->
@endsection

<!-- page content  -->
@section('content')
<section class="subSec hding-3 pad-50">
        <div class="container">
            <h1>Channel Configration</h1>
            <p class="m-text">Turn channels ON/OFF for specific clinets or turn channels ON/OFF for all clients. To turn
                channels off for specific clients, click the plus sign and type in clients name, then click ON/OFF</p>
        </div>
        <div class="channle-row">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="channel-box">
                            <div class="checkbox">
                                <input type="checkbox" id="toggleCheckbox_0" />
                                <label for="toggleCheckbox_0"></label>
                            </div>
                            <div class="channle-name">Channel Name</div>
                            <a href="#" onClick="alert('test')">+</a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="channel-box">
                            <div class="checkbox">
                                <input type="checkbox" id="toggleCheckbox_1" />
                                <label for="toggleCheckbox_1"></label>
                            </div>
                            <div class="channle-name">Channel Name</div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="channel-box">
                            <div class="checkbox">
                                <input type="checkbox" id="toggleCheckbox_2" />
                                <label for="toggleCheckbox_2"></label>
                            </div>
                            <div class="channle-name">Channel Name</div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="channel-box">
                            <div class="checkbox">
                                <input type="checkbox" id="toggleCheckbox_3" />
                                <label for="toggleCheckbox_3"></label>
                            </div>
                            <div class="channle-name">Channel Name</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="channle-row">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="channel-box">
                            <div class="checkbox">
                                <input type="checkbox" id="toggleCheckbox_4" />
                                <label for="toggleCheckbox_0"></label>
                            </div>
                            <div class="channle-name">Channel Name</div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="channel-box">
                            <div class="checkbox">
                                <input type="checkbox" id="toggleCheckbox_5" />
                                <label for="toggleCheckbox_1"></label>
                            </div>
                            <div class="channle-name">Channel Name</div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="channel-box">
                            <div class="checkbox">
                                <input type="checkbox" id="toggleCheckbox_6" />
                                <label for="toggleCheckbox_2"></label>
                            </div>
                            <div class="channle-name">Channel Name</div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="channel-box">
                            <div class="checkbox">
                                <input type="checkbox" id="toggleCheckbox_7" />
                                <label for="toggleCheckbox_3"></label>
                            </div>
                            <div class="channle-name">Channel Name</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="channle-row">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="channel-box">
                            <div class="checkbox">
                                <input type="checkbox" id="toggleCheckbox_4" />
                                <label for="toggleCheckbox_0"></label>
                            </div>
                            <div class="channle-name">Channel Name</div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="channel-box">
                            <div class="checkbox">
                                <input type="checkbox" id="toggleCheckbox_5" />
                                <label for="toggleCheckbox_1"></label>
                            </div>
                            <div class="channle-name">Channel Name</div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="channel-box">
                            <div class="checkbox">
                                <input type="checkbox" id="toggleCheckbox_6" />
                                <label for="toggleCheckbox_2"></label>
                            </div>
                            <div class="channle-name">Channel Name</div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="channel-box">
                            <div class="checkbox">
                                <input type="checkbox" id="toggleCheckbox_7" />
                                <label for="toggleCheckbox_3"></label>
                            </div>
                            <div class="channle-name">Channel Name</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="channle-row">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="channel-box">
                            <div class="checkbox">
                                <input type="checkbox" id="toggleCheckbox_4" />
                                <label for="toggleCheckbox_0"></label>
                            </div>
                            <div class="channle-name">Channel Name</div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="channel-box">
                            <div class="checkbox">
                                <input type="checkbox" id="toggleCheckbox_5" />
                                <label for="toggleCheckbox_1"></label>
                            </div>
                            <div class="channle-name">Channel Name</div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="channel-box">
                            <div class="checkbox">
                                <input type="checkbox" id="toggleCheckbox_6" />
                                <label for="toggleCheckbox_2"></label>
                            </div>
                            <div class="channle-name">Channel Name</div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="channel-box">
                            <div class="checkbox">
                                <input type="checkbox" id="toggleCheckbox_7" />
                                <label for="toggleCheckbox_3"></label>
                            </div>
                            <div class="channle-name">Channel Name</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="channle-row">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="channel-box">
                            <div class="checkbox">
                                <input type="checkbox" id="toggleCheckbox_4" />
                                <label for="toggleCheckbox_0"></label>
                            </div>
                            <div class="channle-name">Channel Name</div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="channel-box">
                            <div class="checkbox">
                                <input type="checkbox" id="toggleCheckbox_5" />
                                <label for="toggleCheckbox_1"></label>
                            </div>
                            <div class="channle-name">Channel Name</div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="channel-box">
                            <div class="checkbox">
                                <input type="checkbox" id="toggleCheckbox_6" />
                                <label for="toggleCheckbox_2"></label>
                            </div>
                            <div class="channle-name">Channel Name</div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="channel-box">
                            <div class="checkbox">
                                <input type="checkbox" id="toggleCheckbox_7" />
                                <label for="toggleCheckbox_3"></label>
                            </div>
                            <div class="channle-name">Channel Name</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="channle-row">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="channel-box">
                            <div class="checkbox">
                                <input type="checkbox" id="toggleCheckbox_4" />
                                <label for="toggleCheckbox_0"></label>
                            </div>
                            <div class="channle-name">Channel Name</div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="channel-box">
                            <div class="checkbox">
                                <input type="checkbox" id="toggleCheckbox_5" />
                                <label for="toggleCheckbox_1"></label>
                            </div>
                            <div class="channle-name">Channel Name</div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="channel-box">
                            <div class="checkbox">
                                <input type="checkbox" id="toggleCheckbox_6" />
                                <label for="toggleCheckbox_2"></label>
                            </div>
                            <div class="channle-name">Channel Name</div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="channel-box">
                            <div class="checkbox">
                                <input type="checkbox" id="toggleCheckbox_7" />
                                <label for="toggleCheckbox_3"></label>
                            </div>
                            <div class="channle-name">Channel Name</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="col-12 text-right">
                <button id="closePoup" class="btn-nostyle">Cancel</button>
                <button class="btn-outline">Save</button>
            </div>
        </div>
</section>
<div id="channelPopup" class="theme-popup">
    <div class="popup-top">Commercial Property</div>
    <div class="innner-content">
        <div class="my-3 searchfld">
            <span class="thm-icons search-icon"></span>
            <input type="text" class="search-input" placeholder="Search here" />
            <span class="thm-icons cross-icon"></span>
        </div>
        <div class="d-flex company-record mt-1">
            <div class="col-9 p-0 m-0">
                <div class="d-flex">
                     <!-- Logo Example  -->
                    <div class="clogo mr-1">
                        <img src="{!! asset('assets/frontend/website/assets/images/dummy-logo.png') !!}" alt="">
                    </div>
                     <!-- Logo Example  -->
                    <div class="ml-1">
                        <!-- Example company name  -->
                        <h3>Example Company Name Uk</h3>
                        <p>Account Representative</p>
                         <!-- Example company name  -->
                    </div>
                </div>
            </div>
            <div class="col-3 p-0 m-0">
                <div class="checkbox-popup pt-2 text-right">
                    <input type="checkbox" id="companySwtich_0" />
                    <label for="companySwtich_0"></label>
                </div>
            </div>
        </div>
        <div class="d-flex company-record mt-1">
            <div class="col-9 p-0 m-0">
                <div class="d-flex">
                     <!-- Logo Example  -->
                    <div class="clogo mr-1">
                        
                    </div>
                     <!-- Logo Example  -->
                    <div class="ml-1">
                        <!-- Example company name  -->
                        <h3>Company Name</h3>
                        <p>Account Representative</p>
                         <!-- Example company name  -->
                    </div>
                </div>
            </div>
            <div class="col-3 p-0 m-0">
                <div class="checkbox-popup pt-2 text-right">
                    <input type="checkbox" id="companySwtich_0" />
                    <label for="companySwtich_0"></label>
                </div>
            </div>
        </div>
        <div class="d-flex company-record mt-1">
            <div class="col-9 p-0 m-0">
                <div class="d-flex">
                     <!-- Logo Example  -->
                    <div class="clogo mr-1">
                        <img src="{!! asset('assets/frontend/website/assets/images/dummy-logo.png') !!}" alt="">
                    </div>
                     <!-- Logo Example  -->
                    <div class="ml-1">
                        <!-- Example company name  -->
                        <h3>Example Company Name Uk</h3>
                        <p>Account Representative</p>
                         <!-- Example company name  -->
                    </div>
                </div>
            </div>
            <div class="col-3 p-0 m-0">
                <div class="checkbox-popup pt-2 text-right">
                    <input type="checkbox" id="companySwtich_0" />
                    <label for="companySwtich_0"></label>
                </div>
            </div>
        </div>
        <div class="d-flex company-record mt-1">
            <div class="col-9 p-0 m-0">
                <div class="d-flex">
                     <!-- Logo Example  -->
                    <div class="clogo mr-1">
                        
                    </div>
                     <!-- Logo Example  -->
                    <div class="ml-1">
                        <!-- Example company name  -->
                        <h3>Company Name</h3>
                        <p>Account Representative</p>
                         <!-- Example company name  -->
                    </div>
                </div>
            </div>
            <div class="col-3 p-0 m-0">
                <div class="checkbox-popup pt-2 text-right">
                    <input type="checkbox" id="companySwtich_0" />
                    <label for="companySwtich_0"></label>
                </div>
            </div>
        </div>
        <div class="text-right py-3">
            <button id="closePoup" class="btn-nostyle">Cancel</button>
            <button class="btn-outline">Save</button>
        </div>
    </div>

</div>
@endsection

@section('js')
<!-- <script src="{{ asset('https://js.stripe.com/v3/') }}"></script> -->
<script>
$("#channelPopup .close-icon, #channelPopup #closePoup").click(function() {
    $("#channelPopup").hide();
})
$(".checkbox input").each(function() {
    $(this).change(function() {
        if ($(this).prop('checked')) {
            $("#channelPopup").show();
        }
    })
});
</script>
@endsection