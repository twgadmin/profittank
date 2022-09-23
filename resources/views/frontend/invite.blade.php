@extends('frontend.layouts.website.master')
@section('page-title', 'Invite')

@section('style') 
<!-- CSS - STYLING -->
@endsection

<!-- page content  -->
@section('content')

    <section class="inviteSec hding-2">
        <div class="container">
            <div class="inviteHead">
                <h2>invite others build their business</h2>
                <p>When you invite others, you help them strengthen their business by allowing them to simulate growth, increase their cash flow and improve their profit margins.</p>
            </div>
                    
            <div class="row m-0 w-100">
                <div class="col-md-4">
                    <div class="fld-input">
                        <label for="">Invite by email</label>
                        <input type="text" name="" value="" placeholder="">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="fld-input">
                        <label for="">Invite by text</label>
                        <input type="text" name="" value="" placeholder="">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="fld-input">
                        <label for="">theprofitank.com/invited</label>
                        <input type="text" name="" value="" placeholder="">
                    </div>

                    <div class="fld-btn">
                        <input type="submit" name="" value="Submit">
                    </div>
                </div>
            </div>
            
        </div>
    </section>

@endsection

@section('js')
<script>
   <?php
   /* function activateChannel(channel_id) {
        swal({
            title: "Are you sure?",
            text: "You want to activate this channel.",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: '#DD6B55',
            confirmButtonText: 'Yes',
            closeOnConfirm: false,
                //closeOnCancel: false
            }, function(){
                $.ajax({
                    url: "{!! route('active-channel-ajax') !!}",
                    type: "POST",
                    data: {"_token": "{{ csrf_token() }}", 'channel_id' : channel_id},
                    success: function (response) {
                        if (response.error == '1') {
                            swal("Error!", response.message , "error");
                        }
                        if (response.error == '0') {
                            $("#activateChannel_" + channel_id).text("Activated");
                            $("#activateChannel_" + channel_id).attr("onclick", "");
                            swal("Success!", "Channel has been activated successfully.", "success");
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        swal("Error!", "Something went wrong, please try again later!" , "error");
                    }
                });
            });
    } */ ?>
</script>
@endsection