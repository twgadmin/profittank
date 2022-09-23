@extends('frontend.layouts.website.master')
@section('page-title', 'Dashboard')

@section('style') 
<!-- CSS - STYLING -->
<style>

</style>
@endsection

<!-- page content  -->
@section('content')
<section class="subSec hding-3 pad-50">
   <div class="container">
       <div class="subHead">
           <h2 class="text-center">Choose the right plan for you.</h2>
       </div>
        <div class="tabs-wrapper">
            <div class="text-center">
                <div class="tabs d-inline-block mx-auto text-center">
                    @foreach ($subscriptions as $key => $subscription)
                    <a href="javascript:void(0)" class="flex-fill tabs-btn {!! ($key == 0) ? 'active' : '' !!}" data-id="plansTab-{!! $subscription->id !!}">{!! $subscription->plan_name !!}</a>
                    @endforeach
                </div>
            </div>
            <div>
                @foreach ($subscriptions as $key => $subscription)
                    <div class="tab-content {!! ($key == 0) ? ' activeTab' : '' !!}" id="plansTab-{!! $subscription->id !!}">
                        <div class="row">
                            <div class="col-lg-8 col-xl-8 col-md-12 col-sm-12 col-12 mx-auto">
                                <div class="content-wrap text-center mt-70">
                                    <h2>{!! $subscription->plan_name !!}</h2>
                                    <div class="text-heading text-uppercase font-weight-bold text-center">{!! $subscription->sub_heading !!}</div>
                                    <p class="text-left d-inline-block ml-3 fz-24">{!! $subscription->description !!} </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-8 col-lg-10 col-md-10 col-sm-12 mx-auto">
                                <div class="content-wrap text-center mt-30">
                                    <h2>{!! $subscription['short_description'][0] !!}</h2>
                                    <p class="fz-24">
                                        @foreach ($subscription['short_description'] as $index => $sub_description)
                                            @if ($index > 0)
                                                {!! $sub_description !!}
                                            @endif
                                        @endforeach</p>
                                    <div class="border-seprator"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-8 col-xl-8 col-md-12 col-sm-12 col-12 mx-auto">
                                <div>
                                    <div class="check-boxs">
                                        <ul class="checkboxlist">
                                            {!! $subscription->detail_description !!}
                                            <!-- <li>single user license</li>
                                            <li>access to <span class="font-weight-bold font-italic">Profit Generator</span> - a proprietary <br/> business strategy tool</li>
                                            <li>20 efficiency programs to stimulate growth,<br/> increase cash flow & improve profit margins.</li>
                                            <li>secure access to industry experts </li>
                                            <li>help desk support</li> -->
                                        </ul>
                                    </div>
                                </div>
                                <div class="mt-70">
                                    <div class="subscription-text mx-auto">
                                        <span class="offer-image-25"></span>
                                        <div><span>$</span><span class="price-text">{!! $subscription->monthly_price_whole !!}</span><span class="sup">{!! $subscription->monthly_price_decimal !!}</span>
                                            <div class="description">month / billed annually
                                            </div>
                                                @if ($subscription->id == $data->plan_id && $data->expiry_date > date("Y-m-d H:i:s"))
                                                    <a class="sub-rounded-btn" href="javascript:void(0)">Subscribed</a>
                                                @else
                                                    <a class="sub-rounded-btn" href="{!! route('subscribe-plan', $subscription->id) !!}">Subscribe</a>
                                                @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
   </div>
</section>


@endsection

@section('js')
<script src="{{ asset('https://js.stripe.com/v3/') }}"></script>
<script>

    $(".tabs a").click(function(){
        var activeTab = $(this).attr('data-id');
        $(".tab-content").removeClass("activeTab");
        $(".tabs a").removeClass("active");
        $(this).addClass("active");
        $("#"+activeTab).addClass("activeTab");
    })
</script>
@endsection