@extends('frontend.layouts.website.master')
@section('page-title', 'Dashboard')

@section('style') 
<!-- CSS - STYLING -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style>
        .form-control {
            border: 0.5px solid #000 !important;
        }
    </style>
@endsection

<!-- page content  -->
@section('content')
<section class="subSec hding-3 pad-50">
   <div class="container">
    @include('frontend/partials/errors')
    <div class="panel panel-default">
        <div class="panel-heading">Subscribe Plan</div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="row text-center">
                        <div class="col-md-6 col-lg-6 col-xs-6">
                            <p><label>Plan Name: </label> {!! $plan->plan_name !!}</p>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xs-6">
                            <p><label>Plan Additional License: </label> ${!! $plan->additional_price !!}</p>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xs-6">
                            <p><label>Plan Validity: </label> Month</p>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xs-6">
                            <p><label>Plan Price: </label> ${!! $plan->monthly_price !!}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div id="card-details-form">
                <form id="subscribe-plan" method="POST" role="form" action="{!! route('subscribe', $plan->id) !!}">
                        @csrf
                        @method('POST')
                    <div class="row text-center ">
                        <div class="col-md-6 col-lg-6 col-xs-6 offset-md-3">
                            <label class="alert alert-info col-md-12 col-lg-12 col-xs-12">
                                <p>Pay with card:</p>
                            </label><br>
                            @if(isset(auth()->user()->stripe_card_id) && auth()->user()->stripe_card_id !='')
                                <input type="radio" id="card-select" onclick="chooseCardOption(1);"  name="cardselect" value="1" {!! (isset(auth()->user()->stripe_card_id) && auth()->user()->stripe_card_id !='') ? 'checked' : '' !!}>
                                <label for="card-select">Use Existing Card </label>

                                <input type="radio" id="card-select2" onclick="chooseCardOption(2);"  name="cardselect" value="2" {!! (!isset(auth()->user()->stripe_card_id) || auth()->user()->stripe_card_id =='') ? 'checked' : '' !!}>
                                <label for="card-select2">Add New Card </label>
                            @else
                                <input type="hidden" id="card-select2"  name="cardselect">
                            @endif

                            <div id="element">
                                <!-- A Stripe Element will be inserted here. -->
                            </div>

                            <!-- Used to display Element errors. -->
                            <div id="errors" role="alert"></div>

                            <div style="margin-top:15px;"><b>Amount to be charged:</b> $<span>{!! $plan->monthly_price !!}</span>

                            </div>
                        </div>
                        <div class="col-md-12">
                            <hr>
                            <button type="button" class="btn btn-info">Cancel</button>
                            <button type="submit" class="btn btn-success">Subscribe</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection

@section('js')

<script src="{{ asset('https://js.stripe.com/v3/') }}"></script>
<script type="text/javascript">
    function addStripeElements() {
        var stripe = Stripe('{{ config('app.stripe_publishable_key') }}');
        var elements = stripe.elements();

        // Custom styling can be passed to options when creating an Element.
        var style = {
            base: {
              // Add your base input styles here. For example:
              fontSize: '16px',
              color: '#32325d',
            },
        };

        // Create an instance of the card Element.
        var card = elements.create('card', {style: style});
        // Add an instance of the card Element into the `element` <div>.
        card.mount('#element');

        // Create a token or display an error when the form is submitted.
        var form = document.getElementById('subscribe-plan');
        form.addEventListener('submit', function(event) {
            event.preventDefault();
            stripe.createToken(card).then(function(result) {
              if (result.error) {
                // Inform the customer that there was an error.
                var errorElement = document.getElementById('errors');
                $('#errors').attr("class", "alert alert-danger");   
                errorElement.textContent = result.error.message;
              } else {
                // Send the token to your server.
                stripeTokenHandler(result.token);
              }
            });
        });
    }

    function chooseCardOption(option) {
        // code.. (1. Existing, 2. Add-New)
        if(option == 1){
            // if radio == 1, then remove elements from  > id="element"
            $("#element").html('');
        }else if(option == 2){
            // if radio == 2, then add call addStripeElements()
            addStripeElements();
        }
    }

    $(document).ready(function() {
        @if (!isset(auth()->user()->stripe_card_id) && auth()->user()->stripe_card_id == '')
            addStripeElements();
            document.getElementById("card-select2").value = 2;
        @endif 
    });

function stripeTokenHandler(token) {
    $('[name=stripeToken]').remove(); // in case user has clicked back button, so this would not allow to duplicate
    $('[name=stripeCard]').remove(); // in case user has clicked back button, so this would not allow to duplicate

    // Insert the token ID & card ID into the form so it gets submitted to the server
    var form = document.getElementById('subscribe-plan');

    var hiddenInput = document.createElement('input');
    hiddenInput.setAttribute('type', 'hidden');
    hiddenInput.setAttribute('name', 'stripeToken');
    hiddenInput.setAttribute('value', token.id);
    form.appendChild(hiddenInput);

    var hiddenInput = document.createElement('input');
    hiddenInput.setAttribute('type', 'hidden');
    hiddenInput.setAttribute('name', 'stripeCard');
    hiddenInput.setAttribute('value', token.card.id);
    form.appendChild(hiddenInput);

    // Submit the form
    form.submit();
}
function addcard(){
    $('#card-details-form').show();
    $('#card-btn').hide();
}
</script>
@endsection