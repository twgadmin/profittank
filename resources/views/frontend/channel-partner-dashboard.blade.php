@extends('frontend.layouts.website.master')
@section('page-title', 'Channel Partner Dashboard')

@section('style') 
<!-- CSS - STYLING -->
@endsection

<!-- page content  -->
@section('content')
    <section class="welcomeSec hding-2 section-spacer">
        <div class="container">
    @include('frontend/partials/errors')
            <div class="row justify-content-center">
                <div class="col-lg-5 mb-3 mb-lg-0">
                    <h2 class="mb-3">Welcome to ProfitTank, Watch to proceed</h2>
                    <!--<a data-fancybox href="https://www.youtube.com/watch?v=XIMLoLxmTDw&ab_channel=CandRfun" class="play-btn"><span><img src="{!! asset('assets/frontend/website/assets/images/icons/caret-right.svg') !!}" alt=""></span> Dashboard Overview</a>-->
                    <div class="video-box channel-video-box mb-3">
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

                <div class="col-lg-7 mb-3 mb-lg-0">
                    <h2 class="mb-3">Customer Revenue Analytics </h2>
                    <div class="charts-area">
                        <div class="revenuBoxWrap">
                            <ul>
                                <li>
                                    <div class="revenueBox">
                                        <div class="revenueContent">
                                            <h5>{!! (isset($channelClients->client_details) && $channelClients->client_details != '') ? count($channelClients->client_details):0 !!} <span>Client Total</span></h5>
                                        </div>
                                        <div class="revenueImg">
                                            <figure>
                                                <img src="{!! asset('assets/frontend/website/assets/images/icons/dashboard/1.png') !!}" alt="">    
                                            </figure>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="revenueBox">
                                        <div class="revenueContent">
                                            <h5>${!! (isset($revenue->estimates_savings) && $revenue->estimates_savings != '') ? $revenue->estimates_savings : 0 !!}  <span>Estimated Savings</span></h5>
                                        </div>
                                        <div class="revenueImg">
                                            <figure>
                                                <img src="{!! asset('assets/frontend/website/assets/images/icons/dashboard/2.png') !!}" alt="">    
                                            </figure>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="revenueBox">
                                        <div class="revenueContent">
                                            <h5>$0,000 <span>Actual Savings</span></h5>
                                        </div>
                                        <div class="revenueImg">
                                            <figure>
                                                <img src="{!! asset('assets/frontend/website/assets/images/icons/dashboard/3.png') !!}" alt="">    
                                            </figure>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="revenueBox">
                                        <div class="revenueContent">
                                            <h5>$0,000 <span>Partner Revenue</span></h5>
                                        </div>
                                        <div class="revenueImg">
                                            <figure>
                                                <img src="{!! asset('assets/frontend/website/assets/images/icons/dashboard/4.png') !!}" alt="">    
                                            </figure>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="revenueBox">
                                        <div class="revenueContent">
                                            <h5>$0,000 <span>Average ATA</span></h5>
                                        </div>
                                        <div class="revenueImg">
                                            <figure>
                                                <img src="{!! asset('assets/frontend/website/assets/images/icons/dashboard/5.png') !!}" alt="">    
                                            </figure>
                                        </div>
                                    </div>
                                </li>    
                            </ul>
                        </div>
                        <div class="cpd-charts border p-2">
                            <div class="row no-gutters">
                                <div class="col-md-6">
                                    <div class="bg-gray h-100">
                                        <div class="mapChart p-1">
                                            <div id="map-chart"></div>
                                        </div>
                                        
                                        <ul class="mapChartList">
                                            <li>Top 3 states (revenue) </li>    
                                            <li>Top 3 states (clients) </li>    
                                        </ul>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="bg-gray h-100">
                                        <div class="estimateChart p-1">
                                            <div class="row no-gutters"> 
                                                <div class="col-6">
                                                    <div id="revenue"></div>
                                                    <p>REVENUE</p>
                                                </div>
                                                <div class="col-6">
                                                    <div id="percent"></div>
                                                    <p>PERCENT</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="monthChart p-1">
                                            <div id="month-chart"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="tableSec section-spacer">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                <div class="row">
                    <div class="col-md-6">
                        <h2><img src="{!! asset('assets/frontend/website/assets/images/icons/caretSolid.svg') !!}" style="width: 12px;"/> <span>Customer Data</span></h2>
                    </div>
                    <div class="col-md-6 text-right">
                        <h2><img src="{!! asset('assets/frontend/website/assets/images/icons/caretSolid.svg') !!}" style="width: 12px;"/> <span>Print Customer Report</span></h2>
                    </div>
                </div>
                <table class="table">
                <thead>
                    <tr>
                        <th scope="col"><h6><span>Start</span> <span>Complete</span> </h6></th>
                        <th scope="col">Client Name</th>
                        <th scope="col">Form Questions</th>
                        <th scope="col">Agreements</th>
                        <th scope="col">Documents</th>
                        <th scope="col">Est. Savings</th>
                        <th scope="col">Actual Savings</th>
                        <th scope="col">Completed (Days)</th>
                    </tr>
                </thead>
                <tbody>
                    @if (isset($channelClients->client_details) && !empty($channelClients->client_details))
                        @foreach ($channelClients->client_details as $key => $client)
                            <tr>
                                <th><h6><span>12/10/21</span><span>01/10/22</span></h6></th>
                                <td>{!! $client->first_name . ' ' . $client->last_name !!}</td>
                                <td> <a href="{!! route('download-customer-channel-question').'/'.$client->id !!}">Download</a> </td>
                                <td> <a href="{!! route('download-customer-channel-documents').'/'.$client->id !!}">Download</a> </td>
                                <td> pending </td>
                                <td>
                                @foreach ($userRevenue as $key => $value)
                                    @if ($client->id == $key) 
                                        ${!! $value['re_revenue_equivalent'] !!}
                                    @endif
                                @endforeach
                                </td>
                                <td> $-- </td>
                                <td> Completed (12) </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <th colspan="8" class="text-center">No any client.</th>
                        </tr>
                    @endif
                </tbody>
                </table>
                </div>
            </div>
        </div>
    </section>

@include('frontend.layouts.website.includes.faq')
@endsection

@section('js')

<!-- Scripts file here -->

<script src="https://code.highcharts.com/maps/highmaps.js"></script>
<script src="https://code.highcharts.com/maps/modules/data.js"></script>
<script src="https://code.highcharts.com/maps/modules/offline-exporting.js"></script>
<script src="https://code.highcharts.com/mapdata/countries/us/us-all.js"></script>

<script>
    function resizeVideo() {
        if(window.innerWidth > 1200) {
            var src = document.querySelector('.charts-area')
            var tgt = document.querySelector('.video-box');
            var srcHeight = src.clientHeight;
            tgt.style.height = `${srcHeight}px`;
        }
    }
    window.addEventListener('load', resizeVideo);
    window.addEventListener('resize', resizeVideo);

    Highcharts.getJSON('https://cdn.jsdelivr.net/gh/highcharts/highcharts@v7.0.0/samples/data/us-population-density.json', function(data) {
        // Make codes uppercase to match the map data
        data.forEach(function(p) {
            p.code = p.code.toUpperCase();
        });
        // Instantiate the map
        Highcharts.mapChart('map-chart', {
            chart: {
                map: 'countries/us/us-all',
                borderWidth: 0,
                backgroundColor: 'transparent',
            },
            credits: {
                enabled: false
            },
            title: {
                text: 'REVENUE / CLIENT PER STATE',
                align: 'left',
            },

            legend: {
                layout: 'vertical',
                borderWidth: 0,
                backgroundColor: 'rgba(255,255,255,0.85)',
                floating: true,
                align: 'right',
                verticalAlign: 'bottom',
                y: 0,
                x: 45,
                symbolRadius: 0,
                symbolHeight: 15,
                itemMarginTop: 0,
                itemStyle: {
                    color: '#000',
                    fontSize: '10px',
                }
            },

            mapNavigation: {
                enabled: false
            },
            colorAxis: {
                dataClasses: [
                    {
                        from: 100,
                        to: 0,
                        color: '#c6e3f9',
                        name: '(45,435 to 34,324)',

                    },
                    {
                        from: 10,
                        to: 15,
                        color: '#b1c8e1',
                        name: '(45,435 to 34,324)'
                    },
                    {
                        from: 10,
                        to: 15,
                        color: '#83add8',
                        name: '(45,435 to 34,324)'
                    },
                    {
                        from: 10,
                        to: 15,
                        color: '#4885c4',
                        name: '(45,435 to 34,324)'
                    },
                    {
                        from: 10,
                        to: 15,
                        color: '#346ba3',
                        name: '(45,435 to 34,324)'
                    },
                    {
                        from: 10,
                        to: 15,
                        color: '#264d78',
                        name: '(45,435 to 34,324)'
                    },
                    {
                        from: 5,
                        to: 9,
                        color: '#162840',
                        name: '(45,435 to 34,324)'
                    }
                ]
            },

            series: [{
                animation: {
                    duration: 1000
                },
                data: data,
                joinBy: ['postal-code', 'code'],
                dataLabels: {
                    enabled: true,
                    color: '#FFFFFF',
                    format: '{point.code}'
                },
                name: 'Population density',
                tooltip: {
                    pointFormat: '{point.code}: {point.value}/km²'
                }
            }]
        });
    });   

    Highcharts.chart('revenue', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie',
            height: 210,
            backgroundColor: 'transparent',
        },
        title: {
            text: '',
        },
        credits: {
            enabled: false
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        accessibility: {
            point: {
                valueSuffix: '%'
            }
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: false
                },
                showInLegend: true,
                shadow: {
                    color: 'grey',
                    width: 2,
                    offsetX: 0.1,
                    offsetY: 0.1,
                    opacity: 2
                },
                center: ["50%", "50%"]
            }
        },
        series: [{
            name: 'Brands',
            colorByPoint: true,
            data: [{
                name: 'Actual',
                y: 25,
                color: '#90b742',
            }, {
                name: 'Estimated',
                y: 75,
                color: '#2e6da6',
            }]
        }]
    });  
    
    // percent the chart

    Highcharts.chart('percent', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie',
            height: 210,
            backgroundColor: 'transparent',
        },
        title: {
            text: '',
        },
        credits: {
            enabled: false
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        accessibility: {
            point: {
                valueSuffix: '%'
            }
        },
        
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: false
                },
                showInLegend: true,
                shadow: {
                    color: 'grey',
                    width: 2,
                    offsetX: 0.1,
                    offsetY: 0.1,
                    opacity: 2
                },
                center: ["50%", "50%"],
            },
        },
        series: [{
            name: 'Brands',
            colorByPoint: true,
            data: [{
                name: 'Actual',
                y: 25,
                color: '#90b742',
            }, {
                name: 'Estimated',
                y: 75,
                color: '#2e6da6',
            }]
        }]
    });

    Highcharts.chart('month-chart', {
        chart: {
            type: 'column',
            height: 200,
            backgroundColor: 'transparent',
        },
         title: {
            text: 'Monthly Average Rainfall',
            align: 'left',
        },
        credits: {
            enabled: false
        },
        xAxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        },
        legend: {
            enabled: false,
        },
        series: [{
            data: [29.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]
        }]
    });
</script>
@endsection