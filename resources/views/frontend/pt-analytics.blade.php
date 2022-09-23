@extends('frontend.layouts.website.master')
@section('page-title', 'Dashboard')

@section('style') 
<!-- CSS - STYLING -->
@endsection

<!-- page content  -->
@section('content')

<section class="analytics-dashboard">
    <div class="container">
        <h1 class="ad-main-title">Profitank Revenue / User Analytics</h1>

        <div class="ad-top-boxes ad-section-spacer">
            <div class="row">
                <div class="col-12 col-md-4 col-xl-2 text-center mb-4 mb-xl-0">
                    <div class="adtb-wrap">
                        <h6 class="ad-title-head">License</h6>
                        <p>0</p>
                    </div>
                </div>
                <div class="col-12 col-md-4 col-xl-2 text-center mb-4 mb-xl-0">
                    <div class="adtb-wrap">
                        <h6 class="ad-title-head">Users</h6>
                        <p>0</p>
                    </div>
                </div>
                <div class="col-12 col-md-4 col-xl-2 text-center mb-4 mb-xl-0">
                    <div class="adtb-wrap">
                        <h6 class="ad-title-head">Total Revenue</h6>
                        <p>$000,000</p>
                    </div>
                </div>
                <div class="col-12 col-md-4 col-xl-2 text-center mb-4 mb-md-0">
                    <div class="adtb-wrap">
                        <h6 class="ad-title-head">Revenue/License</h6>
                        <p>$000,000</p>
                    </div>
                </div>
                <div class="col-12 col-md-4 col-xl-2 text-center mb-4 mb-md-0">
                    <div class="adtb-wrap">
                        <h6 class="ad-title-head">Revenue / Dist.</h6>
                        <p>$000,000</p>
                    </div>
                </div>
                <div class="col-12 col-md-4 col-xl-2 text-center">
                    <div class="adtb-wrap">
                        <h6 class="ad-title-head">Profitank Revenue</h6>
                        <p>$000,000</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="ad-section-two ad-section-spacer">
            <div class="row">
                <div class="col-12 col-lg-4 mb-4 mb-lg-0">
                    <div class="map-chart-wrap text-center adtb-wrap">
                        <h6 class="ad-title-head">Total distributors by type</h6>
                        <div id="total-distributors-by-type"></div>
                    </div>
                </div>
                <div class="col-12 col-lg-4 mb-4 mb-lg-0">
                    <div class="map-chart-wrap text-center adtb-wrap">
                        <h6 class="ad-title-head">SINGLE BUSINESS USERS BY REGISTRATION TYPE</h6>
                        <div id="sbu-by-reg-type"></div>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="map-chart-wrap text-center adtb-wrap">
                        <h6 class="ad-title-head">REVENUE BY DISTRUBUTOR TYPE / MONTH</h6>
                        <div id="rbd-type-month"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="ad-map-charts ad-section-spacer">
            <div class="row">
                <div class="col-12 col-lg-4 mb-4 mb-lg-0">
                    <div class="map-chart-wrap text-center adtb-wrap">
                        <h6 class="ad-title-head">&nbsp;</h6>
                        <div id="map-chart"></div>
                    </div>
                </div>
                <div class="col-12 col-lg-4 mb-4 mb-lg-0">
                    <div class="map-chart-wrap text-center adtb-wrap">
                        <h6 class="ad-title-head">DISTRIBUTORS /REVENUE BY STATE</h6>
                        <div id="map-chart-2"></div>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="map-chart-wrap text-center adtb-wrap">
                        <h6 class="ad-title-head">LICENCES SOLD  BY STATE / LICENCE REVENUE</h6>
                        <div id="map-chart-3"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="ad-sec-three">
            <div class="row">
                <div class="col-12 col-lg-4 mb-4 mb-lg-0">
                    <div class="adtb-wrap text-center adst-wrap">
                        <h6 class="ad-title-head">Revenue By Channel</h6>
                        <div id="revenue-by-channel"></div>
                    </div>
                </div>
                <div class="col-12 col-lg-8">
                    <div class="adtb-wrap text-center adst-wrap">
                        <h6 class="ad-title-head">REVENUE SHARE - CLIENT ACCEPTED / CHANNEL PARTNER PAID</h6>
                        <div class="revenue-table">
                            <table class="table ptad-rt-table">
                                <thead class="">
                                    <tr>
                                        <th class="text-left">Channel Partner Name</th>
                                        <th>Client Accepted</th>
                                        <th>Revenue Share</th>
                                        <th>Paid</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @for ($i = 0; $i < 15; $i++)
                                    <tr>
                                        <td class="text-left">Channel Name</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                    </tr>
                                    @endfor
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('js')

<script src="https://code.highcharts.com/maps/highmaps.js"></script>
<script src="https://code.highcharts.com/maps/modules/data.js"></script>
<script src="https://code.highcharts.com/maps/modules/offline-exporting.js"></script>
<script src="https://code.highcharts.com/mapdata/countries/us/us-all.js"></script>

<script>

    Highcharts.chart('total-distributors-by-type', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie',
            height: 300,
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
                        enabled: true,
                        format: '{point.name}',
                        style: {
                            fontSize: 9,
                            fontWeight: 'normal'
                        }
                    },
                    showInLegend: false,
                    shadow: {
                        color: 'grey',
                        width: 2,
                        offsetX: 0.1,
                        offsetY: 0.1,
                        opacity: 2
                    },
                },
            },
        series: [{
            name: 'Brands',
            colorByPoint: true,
            data: [
                {
                    name: 'CPAs <br/> 000 / 00',
                    y: 8.3333,
                    color: '#6fbfff',
                },
                {
                    name: 'BUS.CONSULTANTS <br/> 000 / 00',
                    y: 8.3333,
                    color: '#6fbfff',
                },
                {
                    name: 'TYPE <br/> 000 / 00',
                    y: 8.3333,
                    color: '#6fbfff',
                },
                {
                    name: 'TYPE <br/> 000 / 00',
                    y: 8.3333,
                    color: '#6fbfff',
                },
                {
                    name: 'TYPE <br/> 000 / 00',
                    y: 8.3333,
                    color: '#6fbfff',
                },
                {
                    name: 'TYPE <br/> 000 / 00',
                    y: 8.3333,
                    color: '#6fbfff',
                },
                {
                    name: 'TYPE <br/> 000 / 00',
                    y: 8.3333,
                    color: '#6fbfff',
                },
                {
                    name: 'TYPE <br/> 000 / 00',
                    y: 8.3333,
                    color: '#6fbfff',
                },
                {
                    name: 'TYPE <br/> 000 / 00',
                    y: 8.3333,
                    color: '#6fbfff',
                },
                {
                    name: 'EQUITY FIRMS <br/> 000 / 00',
                    y: 8.3333,
                    color: '#6fbfff',
                },
                
                {
                    name: 'CHAMBERS <br/> 000 / 00',
                    y: 8.3333,
                    color: '#6fbfff',
                },
                {
                    name: 'ASSOCIATIONS <br/> 000 / 00',
                    y: 8.3333,
                    color: '#6fbfff',
                },
            ]
        }]
    });

    Highcharts.chart('sbu-by-reg-type', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie',
            height: 300,
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
                        enabled: true,
                        format: '{point.name}',
                        style: {
                            fontSize: 9,
                            fontWeight: 'normal'
                        }
                    },
                    showInLegend: false,
                    shadow: {
                        color: 'grey',
                        width: 2,
                        offsetX: 0.1,
                        offsetY: 0.1,
                        opacity: 2
                    },
                },
            },
        series: [{
            name: 'Brands',
            colorByPoint: true,
            data: [{
                name: 'DISTRIBUTOR INVITE <br/> 000 / 00',
                y: 33,
                color: '#6fbfff',
            },
            {
                name: 'DIRECT REGISTRATION <br> 000 / 00',
                y: 50,
                color: '#6fbfff',
            },
            {
                name: 'REFERRAL <br> 000 / 00%',
                y: 17,
                color: '#6fbfff',
            }]
        }]
    });

    Highcharts.chart('rbd-type-month', {
        chart: {
            type: 'column',
            height: 300,
        },
        title: {
            text: null,
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
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: null,
            labels: {
                formatter: function () {
                    return '$' + this.axis.defaultLabelFormatter.call(this);
                }
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        legend: {
            enabled: false,
        },
        credits: {
            enabled: false
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [
            {
                color: "#005991",
                name: 'TYPE A',
                data: [10000, 24000, 30000, 29000, 46000, 70000]

            },
            {
                color: "#6fbfff",
                name: 'TYPE B',
                data: [10000, 24000, 30000, 29000, 46000, 70000]
            }
        ]
    });
                

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
                text: null,
            },

            legend: {
                enabled: false,
            },

            mapNavigation: {
                enabled: false
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
       
        Highcharts.mapChart('map-chart-2', {
            chart: {
                map: 'countries/us/us-all',
                borderWidth: 0,
                backgroundColor: 'transparent',
            },
            credits: {
                enabled: false
            },
            title: {
                text: null,
            },

            legend: {
                enabled: false,
            },

            mapNavigation: {
                enabled: false
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
        
        Highcharts.mapChart('map-chart-3', {
            chart: {
                map: 'countries/us/us-all',
                borderWidth: 0,
                backgroundColor: 'transparent',
            },
            credits: {
                enabled: false
            },
            title: {
                text: null,
            },

            legend: {
                enabled: false,
            },

            mapNavigation: {
                enabled: false
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

    $(function () {
        var colors = ['#005991','#005991','#005991','#005991','#005991','#005991','#005991'];
        var names = ['Channel Name','Channel Name','Channel Name','Channel Name','Channel Name','Channel Name','Channel Name'];
        $('#revenue-by-channel').highcharts({
            chart: {
                type: 'bar',
            },
            legend: {
                enabled: false,
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle',
                labelFormatter: function() {
                    return this.name + " - <span class='total'>"+this.y+"</span>"
                }
            },
            title: {
                text: null
            },
            xAxis: {
                categories: ['Channel Name','Channel Name','Channel Name','Channel Name','Channel Name','Channel Name','Channel Name'],
                allowDecimals: false
            },
            yAxis: {
                categories: ['$5K', '$10K', '$25K', '$50K', '$100K', '$250K', '$500K', '$1M'],
                allowDecimals: false
            },
            credits: {
                enabled: false
            },
            plotOptions: {
                series: {
                    events: {
                        legendItemClick: function (x) {
                            var i = this.index  - 1;
                            var series = this.chart.series[0];
                            var point = series.points[i];   
                            if(point.oldY == undefined)
                            point.oldY = point.y;
                            point.update({y: point.y != null ? null : point.oldY});
                        }
                    }
                }
            },
            legend: {
                enabled: false,
                labelFormatter: function(){
                    return names[this.index-1];
                }
            },
            series: [
                {
                    pointWidth:10,
                    color: colors[0],
                    showInLegend:false,
                    data: [
                        {y: 5, name: 'Channel Name', color: colors[0]},
                        {y: 7, name: 'Channel Name', color: colors[0]},
                        {y: 3, name: 'Channel Name', color: colors[0]},
                        {y: 6, name: 'Channel Name', color: colors[0]},
                        {y: 2, name: 'Channel Name', color: colors[0]},
                        {y: 5, name: 'Channel Name', color: colors[0]},
                        {y: 2, name: 'Channel Name', color: colors[0]},
                    ]
                },
                {color: '#005991'},
                {color: '#005991'},
                {color: '#005991'},
                {color: '#005991'},
                {color: '#005991'},
                {color: '#005991'},
                {color: '#005991'},
            ],

        });

    });
</script>
@endsection