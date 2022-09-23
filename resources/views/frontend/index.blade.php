@extends('frontend.layouts.website.master')
@section('page-title', 'Dashboard')

@section('style') 
<!-- CSS - STYLING -->
@endsection

<!-- page content  -->
@section('content')

@if (isset($dashboardData) && !empty($dashboardData))

@php

$getHealthValueArray = getEmployerHealthValueArray($dashboardData->re_insurance_plan_type, $dashboardData->re_monthly_insurance_premium, $dashboardData->re_insurance_over_1M);

@endphp
@endif
<div class="su-dashboard">
   <section class="welcomeSec hding-2 section-spacer">
      <div class="container">
         <div class="row">   
            <div class="col-lg-6 mb-3 mb-lg-0">
               <h2 class="mb-3 main-title">Welcome, {!! (auth()->check() && auth()->user()->company_name) ? auth()->user()->company_name:"" !!}</h2>

               <div class="video-box mb-3">
                  <a data-fancybox href="https://www.youtube.com/watch?v=XIMLoLxmTDw&ab_channel=CandRfun">
                     <img src="{!! asset('assets/frontend/website/assets/images/video-cover-new.png') !!}" alt="">
                     <figure>
                        <img src="{!! asset('assets/frontend/website/assets/images/icons/play.svg') !!}" alt="">   
                     </figure>
                  </a>
               </div>

               <div class="video-ftr">
                  <h4>This is an Alert<span>There is an update to your account</span></h4>
               </div>
            </div>

            <div class="col-lg-6">
               <a href="#" class="btn-theme mb-3" id="showSubFrm">Invite your CPA </a>
               <?php /* <iframe class="frame" src="{!! route('single-user-dashboard') !!}" scrolling="no" frameborder="0">
                  Your browser doesn't support iframes
               </iframe>
               */ ?>

               @include('frontend.dashboard')
            </div>

         </div>
      </div>
   </section>

   <section class="profitSec hding-3 section-spacer my-5">
      <div class="container">
         <div class="row">
            <div class="col-12 col-lg-10 mx-auto">
               @include('frontend/partials/errors')
               <h3><span>PROFIT CHANNELS</span></h3>
               <div class="row justify-content-end my-3">
                  <div class="col-md-4">
                     <select id="selectgear" placeholder="Search By">
                        <option value="Search By Cash">Search By Cash</option>   
                        <option value="Search By Credit">Search By Credit</option>   
                        <option value="Search By Highest Estimated Savings">Search By Highest Estimated Savings</option>   
                        <option value="Search By Channel Name">Search By Channel Name</option>   
                        <option value="Search By Shortest Turnaround Time">Search By Shortest Turnaround Time</option>   
                        <option value="Search By Shortest User Time">Search By Shortest User Time</option>   
                     </select>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-6">
                     <div class="profit-channels-data">
                        <ul class="dataAccordion">
                           @foreach ($channels as $key => $channel)
                              @if($key <= 6)
                                 <li>
                                    <h5><p>{!! $channel->name !!}</p> <span>estimate saving (
                                       @if ($channel->identifier == 'cost-segregation-questions')
                                          {!! round_price_format_for_count(getCommercialPropertyTax($dashboardData->re_property_type, $dashboardData->re_total_property_cost)) !!}
                                       @elseif ($channel->identifier == 'employee-retention')
                                          {!! round_price_format_for_count(getERTCBenefitCalculationValue($dashboardData->re_total_employees)) !!}
                                       @elseif ($channel->identifier == 'peo')
                                          {!! round_price_format(getPEO($dashboardData->re_current_employees) ) !!}
                                       @elseif ($channel->identifier == 'medical-waste')
                                          {!! round_price_format($dashboardData->re_medical_waste_benefit) !!}
                                       @elseif ($channel->identifier == 'merchant-processing')
                                          {!! round_price_format(getElecronicPaymentProcessing($dashboardData->re_electronic_payment)) !!}
                                       @elseif ($channel->identifier == 'health-care')
                                          ${!! $getHealthValueArray[0] !!}
                                       @elseif ($channel->identifier == 'property-tax')
                                          {!! round_price_format_for_count(getPropertyTaxCalculationValue($dashboardData->re_recent_property_tax))  !!}
                                       @endif
                                    )</span> <small>review channel</small></h5>
                                    <div class="expandable">
                                       <div class="row">
                                          <div class="col-md-7">
                                             <div class="dataContent">
                                                <h6>Saving Program Brief</h6>
                                                <p>{!! $channel->description !!}</p>
                                                   <ul>
                                                      <li>Savings Structure</li>   
                                                      <li>User Completion Time: {!! $channel->user_completion_time !!} minutes</li>   
                                                      <li>Estimated Turnaround Time: {!! $channel->estimate_turnaround_time !!} Business Days</li>   
                                                   </ul>
                                                      @if (auth()->check() && in_array(auth()->user()->id, explode(',', $channel->channel_users)))
                                                            <a href="javascript:;"  class="btn-theme">Activated</a>
                                                      @else
                                                            <a href="{!! route('activate_channel', [$channel->id, Str::slug($channel->name)]) !!}"  class="btn-theme">Activate</a>
                                                      @endif

                                                <!-- activate channel popup button validation -->

                                                   <!--  @if (auth()->check() && !in_array(auth()->user()->id, explode(',', $channel->channel_users)))
                                                      <a href="javascript:;" id="activateChannel_{!! $channel->id !!}" onclick="activateChannel({!! $channel->id !!})" class="btn-theme">Activate Channel</a>
                                                   @else
                                                      <a href="javascript:;" id="activateChannel_{!! $channel->id !!}" class="btn-theme">Activated</a> 
                                                   @endif -->
                                             </div>
                                          </div>
                                          <div class="col-md-5">
                                          <ul class="dataBredcum">
                                             <li><a href="{!! route('messages', [base64_encode($channel->channel_partner_id), Str::slug($channel->channel_partner_first_name . ' ' . $channel->channel_partner_last_name)]) !!}">Contact Partner</a></li>   
                                             <li><a href="#">Schedule a Meeting</a></li>   
                                          </ul>
                                          <div class="video-box">
                                             <a data-fancybox href="{!! $channel->video_url !!}">
                                                <img src="{!! asset(uploadsDir('channels') . $channel->video_cover) !!}" alt="">
                                                <figure>
                                                   <img src="{!! asset('assets/frontend/website/assets/images/icons/play.svg') !!}" alt="">   
                                                </figure>
                                             </a>
                                          </div>
                                          </div>
                                       </div>
                                    </div>
                                 </li>
                              @endif
                           @endforeach
                        </ul>
                     </div>
                  </div>

                  <div class="col-md-6">
                     <div class="profit-channels-data">
                        <ul class="dataAccordion">
                           @foreach ($channels as $key => $channelSecond)
                              @if($key > 6)
                                 <li>
                                    <h5><p>{!! $channelSecond->name !!}</p> <span>estimate saving (
                                       @if ($channelSecond->identifier == 'r-and-d-credits')
                                          {!! round_price_format_for_count(getRDTaxCreditCalculationValue($dashboardData->re_wages, $dashboardData->re_supplies, $dashboardData->re_contracts, $dashboardData->re_cloud_computing)) !!}
                                       @elseif ($channelSecond->identifier == 'robotic-processing')
                                          {!! round_price_format(getProcessAutomationOptimisation($dashboardData->re_total_hours_spent, $dashboardData->re_emp_avg_wage)) !!}
                                       @elseif ($channelSecond->identifier == 'shipping')
                                          {!! round_price_format(getShippingValue($dashboardData->re_last_review_fedex, $dashboardData->re_shipping_50000, $dashboardData->re_fedex_dhl, $dashboardData->re_domestic_delivery, $dashboardData->re_resedential_delivery)) !!}
                                       @elseif ($channelSecond->identifier == 'solid-waste')
                                          {!! round_price_format($dashboardData->re_solid_waste_benefit) !!}
                                       @elseif ($channelSecond->identifier == 'telecom')
                                          {!! round_price_format(getBusinessTelephones($dashboardData->re_line_type, $dashboardData->re_phone_expenses, $dashboardData->re_dedicated_lines)) !!}
                                       @elseif ($channelSecond->identifier == 'utilities')
                                          {!! round_price_format($dashboardData->re_utility_value)  !!}
                                       @elseif ($channelSecond->identifier == 'workers-comp')
                                          {!! round_price_format_for_count(getWorkersCompCalculationValue($dashboardData->re_annual_workers_premium)) !!}
                                       @elseif ($channelSecond->identifier == 'wotc')
                                          ${!! number_format($dashboardData->re_wotc) !!}
                                       @endif
                                    )</span> <small>review channel</small></h5>
                                    <div class="expandable">
                                       <div class="row">
                                          <div class="col-md-7">
                                             <div class="dataContent">
                                                <h6>Saving Program Brief</h6>
                                                <p>{!! $channelSecond->description !!}</p>
                                                   <ul>
                                                      <li>Savings Structure</li>   
                                                      <li>User Completion Time: {!! $channelSecond->user_completion_time !!} minutes</li>   
                                                      <li>Estimated Turnaround Time: {!! $channelSecond->estimate_turnaround_time !!} Business Days</li>   
                                                   </ul>
                                                   @if (auth()->check() && !in_array(auth()->user()->id, explode(',', $channelSecond->channel_users)))
                                                     <a href="{!! route('activate_channel', [$channelSecond->id, Str::slug($channelSecond->name)]) !!}"  class="btn-theme">Activate</a>
                                                   @else
                                                      <a href="javascript:;" id="activateChannel_{!! $channelSecond->id !!}" class="btn-theme">Activated</a> 
                                                   @endif
                                             </div>
                                          </div>
                                          <div class="col-md-5">
                                          <ul class="dataBredcum">
                                             <li><a href="{!! route('messages', [base64_encode($channelSecond->channel_partner_id), Str::slug($channelSecond->channel_partner_first_name . ' ' . $channelSecond->channel_partner_last_name)]) !!}">Contact Partner</a></li>   
                                             <li><a href="#">Schedule a Meeting</a></li>   
                                          </ul>
                                          <div class="video-box">
                                             <a  data-fancybox href="{!! $channelSecond->video_url !!}">
                                                <img src="{!! asset(uploadsDir('channels') . $channelSecond->video_cover) !!}" alt="">
                                                <figure>
                                                   <img src="{!! asset('assets/frontend/website/assets/images/icons/play.svg') !!}" alt="">   
                                                </figure>
                                             </a>
                                          </div>
                                          </div>
                                       </div>
                                    </div>
                                 </li>
                              @endif
                           @endforeach
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
</div>

@include('frontend.layouts.website.includes.faq')

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

    function resizeVideo() {
         if(window.innerWidth > 1200) {
            var src = document.querySelector('.dashboardSec')
            var tgt = document.querySelector('.video-box');
            var srcHeight = src.clientHeight;
            tgt.style.height = `${srcHeight}px`;
         }
      }
      window.addEventListener('load', resizeVideo);
      window.addEventListener('resize', resizeVideo);
</script>
@endsection