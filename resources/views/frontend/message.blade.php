@extends('frontend.layouts.website.master')
@section('page-title', 'Dashboard')

@section('style') 
<!-- CSS - STYLING -->
@endsection

<!-- page content  -->
@section('content')
<section class="messageSec">
   <div class="container">
       <div class="row">
           <div class="col-md-3">
               <div class="message-user">
                   <div class="message-user-head">
                       <h3>Channel Partners</h3>
                       <div class="fld-user-search">
                           <input type="text" name="" id="inputUserSrch" placeholder="Search">
                           <button type="submit"><img src="{!! asset('assets/frontend/website/assets/images/icons/search.svg') !!}"></button>
                       </div>
                   </div>
                   <div class="message-user-list">
                       <ul>
                        @if (isset($usersWithLastMesage) && count($usersWithLastMesage) > 0)
                            @foreach ($usersWithLastMesage as $userkey => $userMessage)
                                <li data-targetit="box-user1" class="{!! (isset($userDetails) && !empty($userDetails) && $userDetails->id == $userMessage->checking) ? 'current':'' !!}">
                                    <div class="user-box" onclick="window.location.href = '{!! route('messages', [base64_encode($userMessage->checking), Str::slug($userMessage->username)]) !!}'">
                                        <figure>
                                            <img src="{!! asset('assets/frontend/website/assets/images/profile.jpg') !!}" alt="">    
                                        </figure>

                                       <h6>{!! $userMessage->username !!}
                                            <span>
                                                {!! getUserType($userMessage->usertype) !!}
                                            </span>
                                        </h6>
                                    </div>
                               </li>
                            @endforeach
                        @endif
                       </ul>
                   </div>
               </div>
           </div>
           <div class="col-md-9">
                <div class="box-user1 showfirst">
                @if ((isset($userDetails) && !empty($userDetails)))
                   <div class="message-content">
                       <div class="message-content-head">
                           <div class="user-box">
                               <figure>
                                   <img src="{!! asset('assets/frontend/website/assets/images/profile.jpg') !!}" alt="">    
                               </figure>
                               <h6>
                                    {!! $userDetails->first_name . ' ' . $userDetails->last_name !!}
                                    <span>
                                        {!! getUserType($userDetails->user_type) !!}
                                    </span>
                                </h6>
                           </div>
                       </div>
                       <!-- <div class="message-call-box">
                            <ul>
                                <li>Send Message</li>
                                <li>Schedule a Meeting/Call</li>
                                <li>Record Meeting</li>
                            </ul>
                       </div> -->
                       <div class="message-call-box">
                           <time>{!! date('l, F d, Y') !!}</time>
                       </div>
                       <div class="message-contetn-mid" id="messageList">
                           <ul id="msgChats">
                                @foreach ($userChat as $key => $message)
                                <li>
                                    <div class="user-box justify-content-between">
                                        <div class="d-flex align-items-center">    
                                            <figure>
                                                <img src="{!! asset('assets/frontend/website/assets/images/profile.jpg') !!}" alt="">  
                                            </figure>
                                            <h6>
                                                {!! $message->from_fullname !!}
                                                <span>
                                                    {!! getUserType($message->from_user_type) !!}
                                                </span>
                                            </h6>
                                        </div>

                                        <time>{!! $message->latestCreatedAtFromat !!}</time>
                                    </div>

                                    <div class="user-message-box">
                                        <p>{!! $message->message !!}</p>
                                         @if ($message->media != '' && file_exists(uploadsDir('messages') . $message->media))
                                        <br>
                                        <p><a href="{!! asset(uploadsDir('messages') . $message->media) !!}" download>Attachment ({!! $message->media_size !!} MB)</a></p>
                                        @endif
                                    </div>
                                </li>
                                @endforeach
                           </ul>
                       </div>

                    <form name="messageSubmitForm" id="messageSubmitForm" enctype="multipart/form-data">
                      @csrf
                      @method('POST')
                       <div class="message-footer">
                           <div class="message-footer-element">
                               <div class="attchment-fld">
                                   <label>
                                       <input type="file" id="attachment" name="messageAttachment">
                                       <span><img src="{!! asset('assets/frontend/website/assets/images/icons/attch.svg') !!}" alt=""></span>
                                   </label>
                               </div>
                               <div class="fld-mesg">
                                   <input type="text" name="message" id="message" placeholder="Type your message...">
                               </div>
                               <div class="fld-btn" id="SubmitMessageButtonId">
                                   <button type='submit'  id='submitMessageButton'>Send</button>
                               </div>
                           </div>
                       </div>
                    </form>
                   </div>
                    @endif
                </div>
           </div>
       </div>
   </div>
</section>
@endsection

@section('js')
<script type="text/javascript">

$(document).ready(function() {

$("#messageList").animate({ scrollTop: $('#messageList').prop("scrollHeight")}, 1000);

$('#messageSubmitForm').on('submit',(function(e) {
    e.preventDefault();
        formData = new FormData();
        var file_data = $('#attachment').prop('files')[0];
        formData.append('message', $('#message').val());
        formData.append('to', {!! (isset($userDetails->id)  && !empty($userDetails->id)) ?  $userDetails->id : '' !!});
        formData.append('file', file_data);
        formData.append('_token', $('input[name=_token]').val());
        formData.append('_method', $('input[name=_method]').val());

    $.ajax({
        url: "{!! route('sendMessage') !!}",
        type: "POST",
        data: formData,
        dataType: "json",
            processData: false,
            contentType: false,
        beforeSend: function() {  
            document.getElementById("SubmitMessageButtonId").innerHTML = "<button type='button' id='submitMessageButtonDisabled'><span><img width='40%' src='{!! asset('assets/frontend/website/assets/images/icons/loader.gif') !!}'></span></button>";
        },
        success: function (response) {
            var content ="";
                content +="<li><div class='user-box justify-content-between'><div class='d-flex align-items-center'><figure><img src=\"{!! asset('assets/frontend/website/assets/images/profile.jpg') !!}\"></figure><h6>";

                @if ((auth()->check() && auth()->user()->id) ? auth()->user()->id : 0)
                    content += "{!! auth()->user()->first_name!!}   {!! auth()->user()->last_name !!}<span>";
                @endif

                @if ( (auth()->user()->user_type) == 1)
                    content +="Business Partner";
                @elseif( (auth()->user()->user_type)  == 2)
                    content +="Channel Partner";
                @elseif(  (auth()->user()->user_type)  == 3)
                    content +="Distributor";
                @endif

                content +="</span></h6></div><time>Just Now </time></div><div class='user-message-box'>";
                if(response.data.message != null){
                content +="<p>"+response.data.message+"</p>";
                } 
                if(response.data.media != ""){
                    content +="<br><p><a href='{!! asset(uploadsDir('messages')) !!}/"+response.data.media+"' download>Attachment ("+ response.data.size +" MB)</a></p> </div> </li>";                       
                } 
                $("#msgChats").append(content);
                $('#message').val("");
                $('#attachment').val("");
                document.getElementById("SubmitMessageButtonId").innerHTML = "<button type='submit'  id='submitMessageButton'>Send</button>";
            }
        });
}));

    function usersMessages(){
        $.ajax({
            url: "{!! route('user-messages-ajax', [(isset($userDetails->id)  && !empty($userDetails->id)) ?  $userDetails->id : '', Str::slug((isset($userDetails->first_name)  && !empty($userDetails->first_name)) ?  $userDetails->first_name : '', (isset($userDetails->last_name)  && !empty($userDetails->last_name)) ?  $userDetails->last_name : '')]) !!}",
            type: "GET",
            data: {},
            dataType: "json",
            success: function (response) {
                var content = "";
                $.each(response.data, function (index, item) {
                    content += "<li><div class='user-box justify-content-between'><div class='d-flex align-items-center'><figure><img src='{!! asset('assets/frontend/website/assets/images/profile.jpg') !!}'></figure><h6>" + item.from_fullname + "<span>";
                    if (item.from_user_type == '1') {
                        content += "Business Partner";
                    } else if (item.from_user_type == '2') {
                        content += "Channel Partner";
                    } else if (item.from_user_type == '3') {
                        content += "Distributor";
                    }

                    content += "</span></h6></div><time>" + item.latestCreatedAtFromat + "</time></div><div class='user-message-box'>";

                    if (item.message != null) {
                        content += "<p>" + item.message + "</p>";
                    }

                    if (item.media != null) {
                        content += "<br><p><a href='{!! asset(uploadsDir('messages')) !!}/" + item.media + "' download>Attachment (" + item.media_size + " MB)</a></p> </div></li>";
                    }
                });

                $("#msgChats").html(content);
            }
        });  
    }
    setInterval(usersMessages, 5000);
}); 

</script>
@endsection