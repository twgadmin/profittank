<footer>
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-3">
                <div class="widget">
                    @if (auth()->check() && auth()->user()->user_type == 1)
                    <a href="{!! route('index') !!}" class="logo">
                        @elseif (auth()->check() && auth()->user()->user_type == 2)
                        <a href="{!! route('channel-dashboard') !!}" class="logo">
                            @elseif (auth()->check() && auth()->user()->user_type == 3)
                            <a href="{!! route('distributor') !!}" class="logo">
                                @else
                                <a href="javascript:;" class="logo">
                                    @endif
                                    <?php /* <img src="{!! asset('assets/frontend/website/assets/images/logo.png') !!}" alt="">*/ ?>
                                </a>
                                <p>ProfiTank is a registered trademark of Revenue Engine LLC. Terms and conditions,
                                    features,
                                    support, pricing, and service options subject to change without notice.</p>
                                <a href="#" class="btn-theme">Share ProfiTank</a>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <div class="widget">
                    <h4>Quik Links</h4>
                    <ul>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="#">Portfolio</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Terms and Conditions</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <div class="widget">
                    <h4>Quik Links</h4>
                    <ul>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="#">Portfolio</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#" class="general-questions">Support</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <div class="widget">
                    <h4>Quik Links</h4>
                    <ul>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="#">Portfolio</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Terms and Conditions</a></li>
                    </ul>
                </div>
            </div>

        </div>

    </div>
</footer>

<div class="copyright">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <p>© 2021 Revenue Engine, LLC.. All rights reserved</p>
            </div>
            <div class="col-md-6 text-right">
                <ul>
                    <li><a href="#">Legal</a></li>
                    <li><a href="#">Privacy</a></li>
                    <li><a href="#">Security</a></li>
                    <li><a href="#">About cookies</a></li>
                    <li><a href="#">Manage cookies</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>


<div class="fixed-icon">
    <ul>
        <li><a href="#"><img src="{!! asset('assets/frontend/website/assets/images/icons/dollar.png') !!}" alt=""></a>

            <ul>
                <li><a href="#">Before Starting</a></li>
                <li><a href="{!! route('profit-generator') !!}">Take a Test Drive</a></li>
                <li><a href="{!! route('profit-generator') !!}">Start Profit Generator</a></li>
            </ul>

        </li>
        <li><a href="javascript:;"><img src="{!! asset('assets/frontend/website/assets/images/icons/shake.png') !!}"
                    alt=""></a>
        </li>
        <li><a href="{!! route('messages') !!}"><img
                    src="{!! asset('assets/frontend/website/assets/images/icons/thread.png') !!}" alt=""></a></li>
        <li><a href="javascript:;" class="general-questions"><img
                    src="{!! asset('assets/frontend/website/assets/images/icons/fq.png') !!}" alt=""></a></li>
        <li><a href="javascript:;"><img src="{!! asset('assets/frontend/website/assets/images/icons/connect.png') !!}"
                    alt=""></a>
        </li>
    </ul>
</div>


<div style="display: none;" id="AddClientEmail">
    <div class="clientListBox">
        <div class="clientListHead">
            <h3>Create Your Client List</h3>
        </div>
        <div class="clientListMid para-sm">
            <h4>How would you like to creat this audience?</h4>
            <div class="space"><br /></div>
            <p>Reach clients who have an existing relationship with your business, whether they are existing
                clients/customer or companies/individuals who have interacted with your business on other platforms such
                as linkedin or other social networks and platforms.</p>
            <div class="space"><br /></div>
            <p>NOTE: All client data will be encryped according to FFIEC and GLBA standards required for banks and
                financial institutions.</p>

            <div class="customerFile">
                <div class="row m-0">
                    <div class="col-md-2">
                        <img src="{!! asset('assets/frontend/website/assets/images/icons/card.svg') !!}" alt="">
                    </div>
                    <div class="col-md-10 mb-5">

                        <h5>Customer File</h5>

                        <label for="chk1">
                            <input type="radio" name="chk1" id="chk1">
                            Upload CSV or Excel file.
                        </label>

                        <label for="chk2">
                            <input type="radio" name="chk1" id="chk2">
                            Enter email address manually.
                        </label>
                    </div>
                </div>
            </div>
            <div class="cutomerBtn mt-4">
                <a href="#" class="btn-theme">Continue</a>
            </div>
            <div class="emailAddressTable">
                <h6>Your contacts must have an email address</h6>

                <ul>
                    <li>Enter Conteact Details</li>
                </ul>

                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col"><label>Company</label></th>
                            <th scope="col"><label>First Name</label></th>
                            <th scope="col"><label>Last Name</label></th>
                            <th scope="col"><label>Email Address</label></th>
                            <th scope="col"><label>Select</label></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="text" name=""></td>
                            <td><input type="text" name=""></td>
                            <td><input type="text" name=""></td>
                            <td><input type="email" name=""></td>
                            <td><input type="submit" name="" value="Send Invite"></td>
                        </tr>
                        <tr>
                            <td><input type="text" name=""></td>
                            <td><input type="text" name=""></td>
                            <td><input type="text" name=""></td>
                            <td><input type="email" name=""></td>
                            <td><input type="submit" name="" value="Send Invite"></td>
                        </tr>
                        <tr>
                            <td><input type="text" name=""></td>
                            <td><input type="text" name=""></td>
                            <td><input type="text" name=""></td>
                            <td><input type="email" name=""></td>
                            <td><input type="submit" name="" value="Send Invite"></td>
                        </tr>
                        <tr>
                            <td><input type="text" name=""></td>
                            <td><input type="text" name=""></td>
                            <td><input type="text" name=""></td>
                            <td><input type="email" name=""></td>
                            <td><input type="submit" name="" value="Send Invite"></td>
                        </tr>
                    </tbody>
                </table>



            </div>
        </div>
    </div>
</div>


<div style="display: none;" id="InviteClient">
    <div class="clientListBox">
        <div class="clientListHead text-center">
            <h3>Create Your Client List</h3>
        </div>
        <div class="customerFile">
            <div class="row m-0">
                <div class="col-md-12 mb-5">

                    <h5>Choose how you want to invite clients:</h5>

                    <label for="chk3" class="mb-3">
                        <input type="radio" name="chk1" id="chk3">
                        Invite all clients
                    </label>

                    <label for="chk4" class="mb-0">
                        <input type="radio" name="chk1" id="chk4">
                        Search client list and click add client by clicking the plus sign.
                    </label>
                </div>

                <div class="col-md-12">
                    <form id="configform">
                        <div class="fld-search">
                            <button type="button"><img
                                    src="{!! asset('assets/frontend/website/assets/images/icons/search.svg') !!}"
                                    alt=""></button>
                            <input type="text" name="" id="srchClient">
                            <button type="button" id="configreset"><img
                                    src="{!! asset('assets/frontend/website/assets/images/icons/close.svg') !!}"
                                    alt=""></button>
                        </div>


                        <ul class="clientList">
                            <li>
                                <div class="user-profile">
                                    <div class="user-box">
                                        <figure>
                                            <img src="{!! asset('assets/frontend/website/assets/images/profile.jpg') !!}"
                                                alt="">
                                        </figure>

                                        <h6>Channel Name 1<span>Channel Partner</span></h6>
                                    </div>

                                    <div class="user-plus">
                                        <button type="button"><img
                                                src="{!! asset('assets/frontend/website/assets/images/icons/plus-solid.svg') !!}"
                                                alt=""></button>
                                    </div>
                                </div>
                            </li>

                            <li>
                                <div class="user-profile">
                                    <div class="user-box">
                                        <figure>
                                            <img src="{!! asset('assets/frontend/website/assets/images/profile.jpg') !!}"
                                                alt="">
                                        </figure>

                                        <h6>Channel Name 2<span>Channel Partner</span></h6>
                                    </div>

                                    <div class="user-plus">
                                        <button type="button"><img
                                                src="{!! asset('assets/frontend/website/assets/images/icons/plus-solid.svg') !!}"
                                                alt=""></button>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="user-profile">
                                    <div class="user-box">
                                        <figure>
                                            <img src="{!! asset('assets/frontend/website/assets/images/profile.jpg') !!}"
                                                alt="">
                                        </figure>

                                        <h6>Channel Name 3<span>Channel Partner</span></h6>
                                    </div>

                                    <div class="user-plus">
                                        <button type="button"><img
                                                src="{!! asset('assets/frontend/website/assets/images/icons/plus-solid.svg') !!}"
                                                alt=""></button>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="user-profile">
                                    <div class="user-box">
                                        <figure>
                                            <img src="{!! asset('assets/frontend/website/assets/images/profile.jpg') !!}"
                                                alt="">
                                        </figure>

                                        <h6>Channel Name 4<span>Channel Partner</span></h6>
                                    </div>

                                    <div class="user-plus">
                                        <button type="button"><img
                                                src="{!! asset('assets/frontend/website/assets/images/icons/plus-solid.svg') !!}"
                                                alt=""></button>
                                    </div>
                                </div>
                            </li>

                            <li>
                                <div class="user-profile">
                                    <div class="user-box">
                                        <figure>
                                            <img src="{!! asset('assets/frontend/website/assets/images/profile.jpg') !!}"
                                                alt="">
                                        </figure>

                                        <h6>Channel Name 5<span>Channel Partner</span></h6>
                                    </div>

                                    <div class="user-plus">
                                        <button type="button"><img
                                                src="{!! asset('assets/frontend/website/assets/images/icons/plus-solid.svg') !!}"
                                                alt=""></button>
                                    </div>
                                </div>
                            </li>
                        </ul>

                        <div class="cutomerBtn mt-4">
                            <button type="submit" class="btn-theme">Send Invite</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>

    </div>
</div>


<!-- help popup -->
<div class="help-popup slide-down ">
    <div class="header">
         <span class="close-btn"></span> 
        <h2 class="text-center">Get Answers... Get Help...</h2>
        <div class="search-wraper mx-auto">
            <div class="search-bar">
                <img class="search-icon" width="30"
                    src="{!! asset('assets/frontend/website/assets/images/icons/hlp-support-icon.png') !!}" />
                <input type="text" class="search-input" placeholder="Type your ''general questions'' here." />
            </div>
        </div>
    </div>
    <div class="hlp-body">
        <div class="support-links">
            <hr class="my-0" />
            <div class="content-links">
                <ul class="question-links">
                    <li><a href="#">Question will be here</a></li>
                    <li><a href="#">Question will be here</a></li>
                    <li><a href="#">Question will be here</a></li>
                </ul>
            </div>
            <ul class="hlp-links">
                <li>
                    <div class="d-flex">
                        <i class="hlp-icon d-inline-block"></i>
                        <div class="hlp-text">
                            <a href="#">
                                <h3>Ask for help</h3>
                                <p>Need help without searching, contact us.</p>
                            </a>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="d-flex">
                        <i class="tech-icon d-inline-block"></i>
                        <div class="hlp-text">
                            <a href="#">
                                <h3>Technical question?</h3>
                                <p>Changed your mind, have a technical question instead?</p>
                            </a>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="d-flex">
                        <i class="feedback-icon d-inline-block"></i>
                        <div class="hlp-text">
                            <a href="#">
                                <h3>Give us feedback</h3>
                                <p>Your experience is number one! Tell us how we can improve.</p>
                            </a>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="d-flex">
                        <i class="demo-icon d-inline-block"></i>
                        <div class="hlp-text">
                            <a href="#">
                                <h3>Request demo</h3>
                                <p>Have a question about our platform, our product expert can help.</p>
                            </a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div class="footer text-center">
        Powered by <span class="blue-text">ProfitTank</span>
    </div>
</div>
<!-- help popup -->
<div class="overlay">
<span class="close-icon"><span class="inner">X</span></span>
<span class="cradit-text">powered by profittank</span>
</div>
<div class="theme-popup" id="subscriptionFrm">

<div class="inner-content">
   
    <div class="text-center mt-5">
        <h3 class="text-uppercase text-center text-heading mt-2">Get your subscription for free</h3>
        <p class="sub-text">Invite your CPA - After they register your subscription is free.</h6>
    </div>
    <div class="my-5 w-50 mx-auto">
        <button class="text-uppercase btn-send-mail">Send email</button>
        <button class="text-uppercase btn-invite">text invite</button>
    </div>
   
</div>
</div>