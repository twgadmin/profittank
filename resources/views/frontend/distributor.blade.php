@extends('frontend.layouts.website.master')
@section('page-title', 'Dashboard')

@section('style') 
<!-- CSS - STYLING -->
@endsection

<!-- page content  -->
@section('content')
<section class="welcomeSec hding-2 section-spacer">
	<div class="container">
		<div class="row">
			<div class="col-12 col-xl-5 mb-4 mb-xl-0">
				<div class="">
					<!--<a data-fancybox href="https://www.youtube.com/watch?v=XIMLoLxmTDw&ab_channel=CandRfun" class="play-btn mb-2"><span><img src="{!! asset('assets/frontend/website/assets/images/icons/caret-right.svg') !!}" alt=""></span> Dashboard Overview</a>-->
					<h2 class="mb-2">Welcome, Company Name</h2>
               <div class="video-box mb-4">
						<a data-fancybox href="https://www.youtube.com/watch?v=XIMLoLxmTDw&ab_channel=CandRfun">
                     <img src="{!! asset('assets/frontend/website/assets/images/video-cover-new.png') !!}" alt="">
							<figure>
								<img src="{!! asset('assets/frontend/website/assets/images/icons/play.svg') !!}" alt="">   
							</figure>
						</a>
					</div>

					<!--<div>-->
					<!--   <h2>Welcome, My CPA Firm</h2>-->
					<!--   <p>A Distributor is a firm, organization, or individual with multiple clients, members a firm, organization, or individual</p>   -->
					<!--</div>-->
				</div>
			</div>

			<div class="col-12 col-xl-7">
            <h2 class="mb-2">Client Analytics </h2>
				<div class="analyticsBox mb-4">
					<div class="analyticHead">
						<div class="row">
							<div class="col-12 col-lg-6 text-center text-lg-left">
								<h6>CLIENT ANALYTICS</h6>
							</div>
							<div class="col-12 col-lg-6 text-center text-lg-right">
								<h6>Total Earnings: $0,000</h6>
							</div>
						</div>
					</div>
					<div class="analyticMid">
						<ul>
							<li>Active Users</li>
							<li>Estimated Profit Increase $000</li>
							<li>Actual Profit Increase $000</li>
						</ul>
					</div>
					
					<div class="analyticContent">
                  <div class="row m-0">
                     <div class="col-md-6">
                        <ul class="resultSrcbox">
                           <li><span>Estimate</span></li>   
                           <li>
                              <form>
                                 <div class="fld-srch">
                                 <input type="text" name="" placeholder="Search Profit Channel">
                                 </div>
                              </form>
                           </li>   
                        </ul>

                        <ul class="resultList">
                           @foreach ($channels as $key => $channel)
                              @if($key <= 6)
                                 <li>{!! $channel->name !!} <small>$0000</small></li>
                              @endif
                           @endforeach
                        </ul>
                     </div>
                     
                     <div class="col-md-6">
                        <ul class="resultSrcbox">
                           <li><span>Actual</span></li>   
                           <li>
                              <form>
                                 <div class="fld-srch">
                                 <input type="text" name="" placeholder="Search Profit Channel">
                                 </div>
                              </form>
                           </li>   
                        </ul>

                        <ul class="resultList">
                           @foreach ($channels as $key => $channel)
                              @if($key > 6)
                                 <li>{!! $channel->name !!} <small>$0000</small></li>
                              @endif
                           @endforeach
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
		</div>

      <div class="row">
         <div class="col-12 col-xl-5 mb-4 mb-xl-0">
            <div class="video-ftr">
               <h4>This is an Alert<span>There is an update to your account</span></h4>
            </div>
         </div>
         <div class="col-12 col-xl-7">
            <div class="channelChartBox">
               <h5><span>Channel Comparisons</span></h5>
               <div id="channelChart"></div>
            </div>
         </div>
      </div>
	</div>
</section>

<section class="siteSec hding-3 section-spacer">
   <div class="container">
      <div class="row">
         <div class="col-lg-11 mx-auto">
            <h3><span>MANAGE CLIENT SETTINGS</span></h3>
            <div class="row my-5">
               <div class="col-lg-4 mb-4 mb-lg-0">
                  <div class="qa-box client-box">
                     <div class="align-self-end">
                        <figure>
                           <img src="{!! asset('assets/frontend/website/assets/images/icons/1.jpg') !!}" alt="">   
                        </figure>
                        <h4>GENERATOR SETTINGS</h4>
                        <p>Set channel availbility</p>
                     </div>
                     <a href="{!! route('new-channels-settings') !!}" class="btn-theme">Generator Settings</a>
                  </div>
               </div>
               <div class="col-lg-4 mb-4 mb-lg-0">
                  <div class="qa-box client-box">
                     <div class="align-self-end">
                        <figure>
                           <img src="{!! asset('assets/frontend/website/assets/images/icons/2.jpg') !!}" alt="">   
                        </figure>
                        <h4>ADD CLIENT EMAILS</h4>
                        <p>Add/Import client email address</p>
                     </div>
                     <a href="#" class="btn-theme" data-fancybox data-src="#AddClientEmail">Add Client Email</a>
                  </div>
               </div>
               <div class="col-lg-4">
                  <div class="qa-box client-box">
                     <div class="align-self-end">
                        <figure>
                           <img src="{!! asset('assets/frontend/website/assets/images/icons/3.jpg') !!}" alt="">   
                        </figure>
                        <h4>INVITE CLIENTS</h4>
                        <p>Invite clients with on click</p>
                     </div>
                     <a href="#" class="btn-theme" data-fancybox data-src="#InviteClient">Invite Client</a>
                  </div>
               </div>
            </div>   
         </div>
      </div>
   </div>
</section>

<section class="siteSec manageSec hding-3 section-spacer">
   <div class="container">
      <div class="row">
         <div class="col-lg-11 mx-auto">
            <h3><span>MANAGE SITE SETTINGS</span></h3>
            <div class="row my-5">
               <div class="col-lg-4 mb-4 mb-lg-0">
                  <div class="qa-box  client-box">
                     <div class="align-self-end">
                        <figure>
                           <img src="{!! asset('assets/frontend/website/assets/images/icons/1.jpg') !!}" alt="">   
                        </figure>
                        <h4>GENERAL QUESTIONS</h4>
                        <p>Search or ask a general question</p>
                     </div>
                     <a href="#" class="btn-theme">Get Started</a>
                  </div>
               </div>
               <div class="col-lg-4 mb-4 mb-lg-0">
                  <div class="qa-box client-box">
                     <div class="align-self-end">
                        <figure>
                           <img src="{!! asset('assets/frontend/website/assets/images/icons/2.jpg') !!}" alt="">   
                        </figure>
                        <h4>TECHNICAL SUPPORT</h4>
                        <p>Have a technical question? We can help.</p>
                     </div>
                     <a href="#" class="btn-theme">Get Started</a>
                  </div>
               </div>
               <div class="col-lg-4">
                  <div class="qa-box client-box">
                     <div class="align-self-end">
                        <figure>
                           <img src="{!! asset('assets/frontend/website/assets/images/icons/3.jpg') !!}" alt="">   
                        </figure>
                        <h4>HAVE SUGGESTIONS?</h4>
                        <p>We believe in constant, never-ending improvement. We’d love to hear your suggestions.</p>
                     </div>
                     <a href="#" class="btn-theme">Get Started</a>
                  </div>
               </div>
            </div>   
         </div>
      </div>
   </div>
</section>
@include('frontend.layouts.website.includes.faq')
@endsection

@section('js')
<script src="https://code.highcharts.com/highcharts.js"></script>
   <style> g.highcharts-legend.highcharts-no-tooltip {display: none;}</style>
   <script>
      Highcharts.chart('channelChart', {
         chart: {
            type: 'column',
            height: 200,
         },
         credits: {
            enabled: false
         },
         title: {
            text: ''
         },
         subtitle: {
            text: ''
         },
         xAxis: {
            categories: [
               'Jan',
               'Feb',
               'Mar',
               'Apr',
               'May',
               'Jun',
               'Jul',
               'Aug',
               'Sep',
               'Oct',
               'Nov',
               'Dec'
            ],
            crosshair: false
         },
         yAxis: {
            min: 0,
            title: {
               text: ''
            }
         },
         plotOptions: {
            column: {
               pointPadding: 0.2,
               borderWidth: 0
            }
         },
         series: [{
            name: '',
            data: [42.4, 33.2, 34.5, 39.7, 52.6, 75.5, 57.4, 60.4, 47.6, 39.1, 46.8, 51.1]
         }],
      });
      
      function resizeVideo() {
         if(window.innerWidth > 1200) {
            var src = document.querySelector('.analyticsBox');
            var tgt = document.querySelector('.video-box');
            var srcHeight = src.clientHeight;
            tgt.style.height = `${srcHeight}px`;
         }
      }
      window.addEventListener('load', resizeVideo);
      window.addEventListener('resize', resizeVideo);
   </script>
@endsection