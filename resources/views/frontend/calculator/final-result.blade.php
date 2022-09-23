@extends('frontend.layouts.app')

<!-- page content  -->
@section('content')
<div id="revenue_main_wrapper">
    <div class="final">
        @php $health_insurance = $result['health_insurance']; @endphp
        <section>
            <div class="fortytwo final-result {!!isset(auth()->user()->hide_dashboard) && auth()->user()->hide_dashboard == 0 ? '' : 'wo-footer' !!}">
                <div class="results-header">
                    <div class="companyname">
                        <h3>Company Name</h3>
                        <p>Profitablity & Operating Efficiency Score </p>
                    </div>
                    <div class="profitt">
                        <div class="INCREASE">
                            <p>ESTIMATED</p>
                            <h5>NET PROFIT INCREASE</h5>
                            <h1>{!!html_entity_decode(round_price_format_for_count($result['net_profit']))!!}</h1>
                        </div>
                        <div class="INCREASE">
                            <p>ESTIMATED</p>
                            <h5>SALES EQUIVALENT</h5>
                            <h1>{!!html_entity_decode(round_price_format_for_count($result['revenue_equivalent']))!!}</h1>
                        </div>
                        <div class="INCREASE">
                            <p>ESTIMATED</p>
                            <h5>OLD PROFIT MARGIN</h5>
                            <h1>{!!html_entity_decode(round_price_format_with_percent($result['net_profit_margin']))!!}</h1>
                        </div>
                        <div class="INCREASE">
                            <p>ESTIMATED</p>
                            <h5>NEW PROFIT MARGIN</h5>
                            <h1>{!!html_entity_decode(round_price_format_with_percent($result['new_net_profit_margin']))!!}</h1>
                        </div>
                        <div class="INCREASE">
                            <p>ESTIMATED</p>
                            <h5>LIFETIME VALUE</h5>
                            <h1>{!!html_entity_decode(round_price_format_for_count($result['life_time_value']))!!}</h1>
                        </div>
                    </div>
                </div>
                <div class="all-regaelt">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-7 col-sm-12 ftebel">
                                <h3 class="est_lbl text-start">ESTIMATED NET PROFIT INCREASE PER SECTOR</h3>
                                <table class="table table-sm net_profit_table" style="margin-top: 15px;">
                                    <tbody>
                                        <tr class="backcolr">
                                            <td colspan="2">
                                                <p>HIRING TAX CREDITS (WOTC)</p>
                                            </td>
                                            <td class="right-side">
                                                <h2><?php echo round_price_format_for_count( $result['wotc'] ); ?></h2>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <p>EMPLOYEE RETENTION TAX CREDITS (ERTC)</p>
                                            </td>
                                            <td class="right-side">
                                                <h2><?php echo round_price_format_for_count( $result['ertc'] ); ?></h2>
                                            </td>
                                        </tr>
                                        <tr class="backcolr">
                                            <td colspan="2">
                                                <p>R&D TAX CREDITS</p>
                                            </td>
                                            <td class="right-side">
                                                <h2><?php echo round_price_format_for_count( $result['r_d_taxt_credit'] ); ?>
                                                </h2>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <p>Commercial Property</p>
                                            </td>
                                            <td class="right-side">
                                                <h2><?php echo round_price_format_for_count( $result['commercial_property'] ); ?>
                                                </h2>
                                            </td>
                                        </tr>
                                        <tr class="backcolr">
                                            <td colspan="2">
                                                <p>Property Tax</p>
                                            </td>
                                            <td class="right-side">
                                                <h2><?php echo round_price_format_for_count( $result['property_tax'] ); ?>
                                                </h2>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td colspan="2">
                                                <p>Workers Compensation recovery</p>
                                            </td>
                                            <td class="right-side">
                                                <h2><?php echo round_price_format_for_count( $result['worker_comp'] ); ?>
                                                </h2>
                                            </td>
                                        </tr>

                                        <tr class="backcolr">
                                            <td colspan="2">
                                                <p>Health Insurance</p>
                                            </td>
                                            <td class="right-side dropend">
                                                <span class="dropdown-toggle" id="health-insurance-dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <h2><?php echo round_price_format_for_count( $health_insurance[0] ); ?></h2>
                                                </span>

                                                <ul class="dropdown-menu" aria-labelledby="health-insurance-dropdown">
                                                    <li class="dropdown-item">
                                                        <?php echo round_price_format_for_count( $health_insurance[1] ); ?>
                                                        <span>Yr. 2</span>
                                                    </li>
                                                    <li class="dropdown-item">
                                                        <?php echo round_price_format_for_count( $health_insurance[2] ); ?>
                                                        <span>Yr. 3</span>
                                                    </li>
                                                    <li class="dropdown-item">
                                                        <?php echo round_price_format_for_count( $health_insurance[3] ); ?>
                                                        <span>Yr. 4</span>
                                                    </li>
                                                    <li class="dropdown-item">
                                                        <?php echo round_price_format_for_count( $health_insurance[4] ); ?>
                                                        <span>Yr. 5</span>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td colspan="2">
                                                <p>Professional Employer Organization (PEO)</p>
                                            </td>
                                            <td class="right-side">
                                                <h2><?php echo round_price_format_for_count( $result['peo'] ); ?></h2>
                                            </td>
                                        </tr>

                                        <tr class="backcolr">
                                            <td colspan="2">
                                                <p>Process Automation</p>
                                            </td>
                                            <td class="right-side">
                                                <h2><?php echo round_price_format_for_count( $result['process_automation'] ); ?>
                                                </h2>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td colspan="2">
                                                <p>Business Telephones</p>
                                            </td>
                                            <td class="right-side">
                                                <h2><?php echo round_price_format_for_count( $result['business_telephone'] ); ?>
                                                </h2>
                                            </td>
                                        </tr>

                                        <tr class="backcolr">
                                            <td colspan="2">
                                                <p>Electronic Payments</p>
                                            </td>
                                            <td class="right-side">
                                                <h2><?php echo round_price_format_for_count( $result['electronic_payment'] ); ?>
                                                </h2>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td colspan="2">
                                                <p>Shipping - Small Parcel</p>
                                            </td>
                                            <td class="right-side">
                                                <h2><?php echo round_price_format_for_count( $result['shipping_result'] ); ?>
                                                </h2>
                                            </td>
                                        </tr>

                                        <tr class="backcolr">
                                            <td colspan="2">
                                                <p>Solid Waste & Recyling</p>
                                            </td>
                                            <td class="right-side">
                                                <h2><?php echo round_price_format_for_count( $result['solid_waste'] ); ?>
                                                </h2>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td colspan="2">
                                                <p>Medical Waste Disposal</p>
                                            </td>
                                            <td class="right-side">
                                                <h2><?php echo round_price_format_for_count( $result['medical_waste'] ); ?>
                                                </h2>
                                            </td>
                                        </tr>

                                        <tr class="backcolr">
                                            <td colspan="2">
                                                <p>UTILITIES</p>
                                            </td>
                                            <td class="right-side">
                                                <h2><?php echo round_price_format_for_count( $result['getUtility'] ); ?>
                                                </h2>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>


                            </div>
                            <div class="col-md-5 col-12-sm retabal">
                                <div class="chart-wrap" id="retabal-chart-cash-tax">
                                    <canvas id="cash_tax"></canvas>
                                    <div class="chart_title cash_tax">by TYPE</div>
                                </div>
                                <div class="chart-wrap" id="retabal-chart-years">
                                    <canvas id="years"></canvas>
                                    <div class="chart_title years">by TIME</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @if(isset(auth()->user()->hide_dashboard) && auth()->user()->hide_dashboard == 0)
                <div class="container">
                    <div class="kastborder">
                        @if(auth()->user()->expiry_date && auth()->user()->expiry_date != '' && auth()->user()->expiry_date > date("Y-m-d H:i:s"))
                            <a href="{!! route('welcome') !!}">More Details <span class="icon-more">&#9658;</span></a>
                        @else
                            <a href="{!! route('subscriptions') !!}">More Details</a>
                        @endif
                    </div>
                    @endif
                </div>
            </div>
        </section>
    </div>
</div>

@endsection

@section('js')
<script>
    function chartSizer() {
        if(window.innerWidth >= 1440) {
            var chartHeight = (document.querySelector('.all-regaelt').clientHeight) / 2.5;
            document.querySelectorAll('.chart-wrap').forEach(e => {
                e.style.height = chartHeight+'px';
            });
        }
        else if(window.innerWidth >= 1920) {
            var chartHeight = (document.querySelector('.all-regaelt').clientHeight - 150) / 2.5;
            document.querySelectorAll('.chart-wrap').forEach(e => {
                e.style.height = chartHeight+'px';
            });
        }
        else {
            var chartHeight = (document.querySelector('.all-regaelt').clientHeight - 200) / 2;
            document.querySelectorAll('.chart-wrap').forEach(e => {
                e.style.height = chartHeight+'px';
            });
        }
    }
    window.addEventListener('load', chartSizer);
    window.addEventListener('resize', chartSizer);
    $(document).ready(function() {
        Array.prototype.shuffle = function() {
            var i = this.length,
                j, temp;
            if (i == 0) return this;
            while (--i) {
                j = Math.floor(Math.random() * (i + 1));
                temp = this[i];
                this[i] = this[j];
                this[j] = temp;
            }
            return this;
        }

        function nFormatter(num, digits = 0) {
            const lookup = [{
                    value: 1,
                    symbol: ""
                },
                {
                    value: 1e3,
                    symbol: "k"
                },
                {
                    value: 1e6,
                    symbol: "M"
                },
                {
                    value: 1e9,
                    symbol: "G"
                },
                {
                    value: 1e12,
                    symbol: "T"
                },
                {
                    value: 1e15,
                    symbol: "P"
                },
                {
                    value: 1e18,
                    symbol: "E"
                }
            ];
            const rx = /\.0+$|(\.[0-9]*[1-9])0+$/;
            var item = lookup.slice().reverse().find(function(item) {
                return num >= item.value;
            });
            return item ? (num / item.value).toFixed(digits).replace(rx, "$1") + item.symbol : "0";
        }

        function getRandomInt(min, max) {
            min = Math.ceil(min);
            max = Math.floor(max);
            return Math.floor(Math.random() * (max - min) + min); //The maximum is exclusive and the minimum is inclusive
        }

        $.fn.extend({
            count: function(
                options
            ) {
                const defaultOptions = {
                    duration: 1000,
                    easing: 'swing',
                    delay: 0
                }
                options = {
                    ...defaultOptions,
                    ...options
                }
                return this.each(function() {
                    $(this)
                        .prop('Counter', 0)
                        .delay(options.delay)
                        .animate({
                            Counter: $(this).text().replace(/,/g, '')
                        }, {
                            duration: options.duration,
                            easing: options.easing,
                            step: function(now) {
                                $(this).text(new Intl.NumberFormat('en-US').format(Math.ceil(now)));
                            },
                            complete: function() {
                                var $this = $(this);
                                setTimeout(function() {
                                    //$this.removeClass("blinking");
                                }, 500)
                            }
                        });
                });
            },
        });

        var cash_tax, years;
        Chart.register(ChartDataLabels);

        function fnCashChart() {
            $(".chart_title.cash_tax").fadeIn();
            const cashBenefit = <?php echo $result['cash_benefit']; ?>;
            const taxCredit = <?php echo $result['tax_credit_benefit']; ?>;
            var dataList = [cashBenefit, taxCredit];
            var dataColor = ['#5dbd1d', '#185991'];
            var dataLabel = ["Cash Benefit", "Tax Credit"];
            window.cash_tax = new Chart(document.getElementById("cash_tax"), {
                type: 'pie',
                plugins: [ChartDataLabels],
                options: {
                    maintainAspectRatio: false,
                    responsive: true,
                    plugins: {
                        tooltip: {
                            enabled: false
                        },
                        legend: {
                            position: 'right',
                            labels: {
                                boxWidth: 12,
                                boxHeight: 12,
                            },
                        },
                        datalabels: {
                            display: true,
                            align: 'center',
                            font: {
                                size: "16"
                            },
                            formatter: function(value, context) {
                                const totalData = dataList.reduce((accumulator, curr) => accumulator + curr);
                                const percentVal = Math.round((100 * value) / totalData);
                                return percentVal > 0 ? percentVal + '%' : "";
                            },
                            color: [
                                "#ffffff",
                                "#ffffff",
                            ],
                        },
                    },

                },
                data: {
                    labels: dataLabel,
                    datasets: [{
                        data: dataList,
                        backgroundColor: dataColor,
                    }]
                }
            });
        }

        // const legendMarginRight = {
        //     afterInit(chart, args, options) {
        //         console.log(chart.legend.fit);
        //         const fitValue = chart.legend.fit;
        //         chart.legend.fit = function fit() {
        //             fitValue.bind(chart.legend)();
        //             let width = this.width += 100
        //             return width;
        //         }
        //     }
        // }

        function fnYearChart() {
            $(".chart_title.years").fadeIn();
            var data = [<?php echo $result['year_1']; ?>, <?php echo $result['year_2']; ?>, <?php echo $result['year_3']; ?>];
            window.years = new Chart(document.getElementById("years"), {
                type: 'pie',
                plugins: [ChartDataLabels],
                options: {
                    maintainAspectRatio: false,
                    responsive: true,
                    plugins: {
                        tooltip: {
                            enabled: false
                        },
                        legend: {
                            position: 'right',
                            labels: {
                                boxWidth: 12,
                                boxHeight: 12,
                            },
                        },
                        datalabels: {
                            display: true,
                            align: 'center',
                            formatter: function(value, context) {
                                return "$" + nFormatter(value);
                            },
                            font: {
                                size: "16"
                            },
                            color: [
                                "#ffffff",
                                "#ffffff",
                                "#ffffff",
                            ]
                        },
                    },
                },
                data: {
                    labels: ["Year 1", "Year 2", "Year 3"],
                    datasets: [{
                        data,
                        backgroundColor: ['#5dbd1d', '#185991', '#42a2d4'],
                    }]
                }
            });
        }

        function startAnimation() {
            var boxSequence = [0, 2, 4, 1, 3];
            var trSequence = [...Array($('.net_profit_table  tbody tr').length).keys()].shuffle();
            var countNumberElement = 0;
            var countNumberTR = 0;
            var countTimeEach = 250;
            var countTimeProfitTableEach = 250;
            var showTimeProfitTableEach = 400;
            var countBlinkTime = 1500;
            $(".chart_title.cash_tax").hide();
            $(".chart_title.years").hide();
            $('.profitt .INCREASE, .profitt .count, .net_profit_table tr').attr("style", "");
            $('.all-regaelt h2').css({
                "opacity": 0
            });
            $('.profitt .count').css({
                "opacity": 0
            });

            function startCount(item = 0, delay = 0) {
                $('.profitt .INCREASE:eq(' + item + ') .count')
                    .delay(delay)
                    .animate({
                        opacity: 1
                    }, "fast")
                    .count({
                        duration: countTimeEach
                    })
                    .queue(function(next) {
                        $(this).addClass("blinking");
                        next();
                    })
                    .delay(countBlinkTime)
                    .queue(function(next) {
                        $(this).removeClass("blinking");
                        countNumberElement++;
                        if (countNumberElement < boxSequence.length) {
                            startCount(boxSequence[countNumberElement], 0);
                        } else {
                            populateProfitTable(trSequence[0]);
                        }
                        next();
                    });
            }

            function populateProfitTable(item = 0) {
                $('.net_profit_table tbody tr:eq(' + item + ') h2')
                    .queue(function(next) {
                        $(this).find(".count").count({
                            duration: countTimeProfitTableEach
                        });
                        next();
                    })
                    .animate({
                        opacity: 1
                    }, showTimeProfitTableEach)
                    .queue(function(next) {
                        countNumberTR++;
                        if (countNumberTR < trSequence.length) {
                            populateProfitTable(trSequence[countNumberTR]);
                        } else {

                        }
                        next();
                    });
            }

            var dl = 1000;
            setTimeout(fnCashChart, dl);
            dl += 1000;
            setTimeout(fnYearChart, dl);
            startCount(0, 500);
        }

        function restartAnimation() {
            window.cash_tax.destroy();
            window.years.destroy();
            startAnimation();
        }

        $(".before-result-title-1").animate({
            width: "100%",
            opacity: "1"
        });

        $(".shape-circle-list").animate({
            opacity: "1"
        });


        $(".before-result").hide();
        $(".absoluteed row").hide();
        $(".final").show();
        startAnimation();
    });
</script>
@endsection