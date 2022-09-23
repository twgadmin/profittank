@extends('frontend.layouts.website.master')
@section('page-title', 'Dashboard')

@section('style') 
<!-- CSS - STYLING -->
@endsection

<!-- page content  -->
@section('content')
<section class="subSec hding-3 pad-50">
   <div class="container">
       <div class="subHead">
           <h3><span>Choose the right plan for you.</span></h3>
       </div>

 
       <div class="row">
            @foreach ($subscriptions as $key => $subscription)
           <div class="col-md-4 mb-5">
               <div class="pkgBox">
                   <div class="pkgHead">
                       <h4><p>{!! $subscription->plan_name !!}</p><span><sup>$</sup>{!! $subscription->monthly_price_whole !!}<sub>{!! $subscription->monthly_price_decimal !!}</sub> <small>PER MONTH</small></span></h4>
                       
                       <p>(${!! $subscription->additional_price !!} for each additional license)</p>
                   </div>

                   <div class="pkgMid">
                        <h6>{!! $subscription['short_description'][0] !!}</h6>
                        <p style="width: 100%; display: block; max-height: 135px; overflow: auto;">
                            @foreach ($subscription['short_description'] as $index => $description)
                                @if ($index > 0)
                                    {!! $description !!}
                                @endif
                            @endforeach
                        </p>
                        {!! $subscription->detail_description !!}
                   </div>

                   <div class="pkgEnd">
                       <a href="{!! route('subscribe-plan', $subscription->id) !!}" class="btn-theme">Choose Plan </a>
                       <div class="mt-10">
                            @if ($subscription->id == $data->plan_id && $data->expiry_date > date("Y-m-d H:i:s"))
                                <small>{{ __('Plan Expires on :date', ['date' => date('M d, Y', strtotime($data->expiry_date))]) }}</small>

                            @elseif ($subscription->id == $data->plan_id && strtotime($data->expiry_date) > 0)
                                <small style="color: red;">{{ __('Plan Expired on :date', ['date' => date('M d, Y', strtotime($data->expiry_date))]) }}</small>
                            @endif
                        </div>
                   </div>
               </div>
           </div>
           @endforeach
       </div>

       <div class="subFooter para-sm text-center">
           <p>All our plans are monthly subsciptions and will renew automatically. You may cancel up / downgrade at any time</p>
       </div>
   </div>
</section>
@endsection

@section('js')
<script src="{{ asset('https://js.stripe.com/v3/') }}"></script>
@endsection