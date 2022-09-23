<style>
    g.highcharts-legend.highcharts-no-tooltip {
        transform: translate(120px, 50px);
    }
</style>
@if (isset($dashboardData) && !empty($dashboardData))

@php

$getHealthValueArray = getEmployerHealthValueArray($dashboardData->re_insurance_plan_type, $dashboardData->re_monthly_insurance_premium, $dashboardData->re_insurance_over_1M);

$netProfit = getNetProfitIncrease(array(
    'ertc_benefit'                       => getERTCBenefitCalculationValue($dashboardData->re_total_employees),

    'rdTaxCredit'                        => getRDTaxCreditCalculationValue($dashboardData->re_wages, $dashboardData->re_supplies, $dashboardData->re_contracts,  $dashboardData->cloud_computing),

    'wotc'                               => getWOTCreditCalculationValue($dashboardData->re_people_hired_annually),

    'workers_Comp'                       => getWorkersCompCalculationValue($dashboardData->re_annual_workers_premium),

    'property_tax'                       => getPropertyTaxCalculationValue($dashboardData->re_recent_property_tax),

    'professional_employer_organisation' => getPEO($dashboardData->re_current_employees),

    'process_automation'                 => getProcessAutomationOptimisation($dashboardData->re_total_hours_spent, $dashboardData->re_emp_avg_wage),

    'electronic_payment'                 => getElecronicPaymentProcessing($dashboardData->re_electronic_payment),

    'solid_waste'                        => getSolidWasteValue($dashboardData->re_solid_waste_expense),

    'medical_waste'                      => getMedicalWasteValue($dashboardData->re_medical_waste_expense),

    'property_tax_benefit'               => getCommercialPropertyTax($dashboardData->re_property_type, $dashboardData->re_total_property_cost),

    'health_insurance_benefit'           => $getHealthValueArray[0],

    'business_phone_benefit'             => getBusinessTelephones($dashboardData->re_line_type, $dashboardData->re_phone_expenses, $dashboardData->re_dedicated_lines),

    'shipping_result'                    => getShippingValue($dashboardData->re_last_review_fedex, $dashboardData->re_shipping_50000, $dashboardData->re_fedex_dhl, $dashboardData->re_domestic_delivery, $dashboardData->re_resedential_delivery),

    'getUtility'                         => getUtility($dashboardData->re_natural_gas, $dashboardData->re_electricity)
));

$getCurrentNetProfitMargin = getCurrentNetProfitMargin($dashboardData->re_annual_revenue, $dashboardData->re_annual_expenses);

$getLifeTimeValue = getLifeTimeValue(
    $netProfit,
    $getHealthValueArray,
    getERTCBenefitCalculationValue($dashboardData->re_total_employees),
    getPropertyTaxCalculationValue($dashboardData->re_recent_property_tax),
    getWorkersCompCalculationValue($dashboardData->re_annual_workers_premium),
    getRDTaxCreditCalculationValue($dashboardData->re_wages, $dashboardData->re_supplies, $dashboardData->re_contracts, $dashboardData->re_cloud_computing),
    getCommercialPropertyTax($dashboardData->re_property_type, $dashboardData->re_total_property_cost),
    getShippingValue($dashboardData->re_last_review_fedex, $dashboardData->re_shipping_50000, $dashboardData->re_fedex_dhl, $dashboardData->re_domestic_delivery, $dashboardData->re_resedential_delivery),
    getWOTCreditCalculationValue($dashboardData->re_people_hired_annually),
    getPEO($dashboardData->re_current_employees),
    getProcessAutomationOptimisation($dashboardData->re_total_hours_spent, $dashboardData->re_emp_avg_wage),
    getBusinessTelephones($dashboardData->re_line_type, $dashboardData->re_phone_expenses, $dashboardData->re_dedicated_lines),
    getElecronicPaymentProcessing($dashboardData->re_electronic_payment),
    getSolidWasteValue($dashboardData->re_solid_waste_expense),
    getMedicalWasteValue($dashboardData->re_medical_waste_expense),
    getUtility($dashboardData->re_natural_gas, $dashboardData->re_electricity)
);

$year_2 = year_2( $netProfit, $getHealthValueArray, getERTCBenefitCalculationValue($dashboardData->re_total_employees), getPropertyTaxCalculationValue($dashboardData->re_recent_property_tax), getCommercialPropertyTax($dashboardData->re_property_type, $dashboardData->re_total_property_cost), getWorkersCompCalculationValue($dashboardData->re_annual_workers_premium), getRDTaxCreditCalculationValue($dashboardData->re_wages, $dashboardData->re_supplies, $dashboardData->re_contracts,  $dashboardData->cloud_computing),getShippingValue($dashboardData->re_last_review_fedex, $dashboardData->re_shipping_50000, $dashboardData->re_fedex_dhl, $dashboardData->re_domestic_delivery, $dashboardData->re_resedential_delivery) );

$year_3 = year_3( $netProfit, $getHealthValueArray, getERTCBenefitCalculationValue($dashboardData->re_total_employees), getPropertyTaxCalculationValue($dashboardData->re_recent_property_tax), getCommercialPropertyTax($dashboardData->re_property_type, $dashboardData->re_total_property_cost), getWorkersCompCalculationValue($dashboardData->re_annual_workers_premium), getRDTaxCreditCalculationValue($dashboardData->re_wages, $dashboardData->re_supplies, $dashboardData->re_contracts,  $dashboardData->cloud_computing), getShippingValue($dashboardData->re_last_review_fedex, $dashboardData->re_shipping_50000, $dashboardData->re_fedex_dhl, $dashboardData->re_domestic_delivery, $dashboardData->re_resedential_delivery) );

$getCashBenefit = getCashBenefit( array(
    'workers_Comp'                       => getWorkersCompCalculationValue($dashboardData->re_annual_workers_premium),
    'professional_employer_organisation' => getPEO($dashboardData->re_current_employees),
    'process_automation'                 => 
    getProcessAutomationOptimisation($dashboardData->re_total_hours_spent, $dashboardData->re_emp_avg_wage),
    'electronic_payment'                 => getElecronicPaymentProcessing($dashboardData->re_electronic_payment),
    'solid_waste'                        => getSolidWasteValue($dashboardData->re_solid_waste_expense),
    'medical_waste'                      => getMedicalWasteValue($dashboardData->re_medical_waste_expense),
    'property_tax'                       => getPropertyTaxCalculationValue($dashboardData->re_recent_property_tax),
    'health_insurance_benefit'           => $getHealthValueArray[0],
    'business_phone_benefit'             => getBusinessTelephones($dashboardData->re_line_type, $dashboardData->re_phone_expenses, $dashboardData->re_dedicated_lines),
    'shipping_result'                    => getShippingValue($dashboardData->re_last_review_fedex, $dashboardData->re_shipping_50000, $dashboardData->re_fedex_dhl, $dashboardData->re_domestic_delivery, $dashboardData->re_resedential_delivery),
) );

$getTaxCreditBenefit = getTaxCreditBenefit( array(
    'wotc'         => getWOTCreditCalculationValue($dashboardData->re_people_hired_annually),
    'ertc_benefit' => getERTCBenefitCalculationValue($dashboardData->re_total_employees),
    'property_tax_benefit' => getCommercialPropertyTax($dashboardData->re_property_type, $dashboardData->re_total_property_cost),
    'rdTaxCredit'  => getRDTaxCreditCalculationValue($dashboardData->re_wages, $dashboardData->re_supplies, $dashboardData->re_contracts,  $dashboardData->cloud_computing),
) );


@endphp

<?php
/*echo '<pre>';
print_r(getWorkersCompCalculationValue($dashboardData->re_annual_workers_premium));
echo '</pre>';
die();*/

?>

    <section class="dashboardSec">
        <div class="dashboardHead hding-2">
            <h2>{!! (auth()->check()) ? auth()->user()->company_name:"" !!} <span>Profitablity & Operating Efficiency Score</span></h2>
        </div>

        <ul class="estimateList">
            <li>
                <div class="estimateBox increase">
                    <h4>
                        <span>ESTIMATED</span>
                        <strong>NET PROFIT INCREASE</strong>
                        <b> {!! round_price_format($netProfit) !!}</b>
                    </h4>
                </div>
            </li>
            <li>
                <div class="estimateBox">
                    <h4>
                        <span>ESTIMATED</span>
                        <strong>SALES EQUIVALENT</strong>
                        <b>{!! round_price_format(getrevenueEquivalent($netProfit, $getCurrentNetProfitMargin)) !!}</b>
                    </h4>
                </div>
            </li>
            <li>
                <div class="estimateBox">
                    <h4>
                        <span>ESTIMATED</span>
                        <strong>OLD PROFIT MARGIN</strong>
                        <b>{!! number_format($dashboardData->re_net_profit_margin, 0) !!}%</b>
                    </h4>
                </div>
            </li>
            <li>
                <div class="estimateBox">
                    <h4>
                        <span>ESTIMATED</span>
                        <strong>NEW PROFIT MARGIN</strong>
                        <b>{!! number_format($dashboardData->re_new_net_profit_margin, 0) !!}%</b>
                    </h4>
                </div>
            </li>
            <li>
                <div class="estimateBox increase">
                    <h4>
                        <span>ESTIMATED</span>
                        <strong>LIFETIME VALUE</strong>
                        <b>{!! round_price_format($getLifeTimeValue) !!}</b>
                    </h4>
                </div>
            </li>    
        </ul>

        <div class="table-and-charts px-2">                        
            <div class="row">
                <div class="col-md-7 col-4k-6 mb-3 mb-md-0">
                    <h5>ESTIMATED NET PROFIT INCREASE PER SECTOR</h5>
                    <div class="tableScroll">
                        <table class="table table-striped table-borderless">
                            <tbody>
                                <tr>
                                    <td colspan="3">HIRING TAX CREDITS (WOTC)</td>
                                    <td>${!! number_format($dashboardData->re_wotc) !!}</td>
                                </tr>
                                <tr>
                                    <td colspan="3">EMPLOYEE RETENTION TAX CREDITS (ERTC)</td>
                                    <td>{!! round_price_format_for_count(getERTCBenefitCalculationValue($dashboardData->re_total_employees)) !!}</td>
                                </tr>
                                <tr>
                                    <td colspan="3">R&D TAX CREDITS</td>
                                    <td>{!! round_price_format_for_count(getRDTaxCreditCalculationValue($dashboardData->re_wages, $dashboardData->re_supplies, $dashboardData->re_contracts, $dashboardData->re_cloud_computing)) !!}</td>
                                </tr>
                                <tr>
                                    <td colspan="3">COMMERCIAL PROPERTY</td>
                                    <td>{!! round_price_format_for_count(getCommercialPropertyTax($dashboardData->re_property_type, $dashboardData->re_total_property_cost)) !!}</td>
                                </tr>
                                <tr>
                                    <td colspan="3">PROPERTY TAX</td>
                                    <td>{!! round_price_format_for_count(getPropertyTaxCalculationValue($dashboardData->re_recent_property_tax)) !!}</td>
                                </tr>
                                <tr>
                                    <td colspan="3">WORKERS COMPENSATION RECOVERY</td>
                                    <td>{!! round_price_format_for_count(getWorkersCompCalculationValue($dashboardData->re_annual_workers_premium)) !!}</td>
                                </tr>
                                <tr>
                                    <td colspan="3">HEALTH INSURANCE</td>
                                    <td>{!! round_price_format_for_count( $getHealthValueArray[0] ) !!} <button type="button" class="table-dropdown"><img src="{!! asset('assets/frontend/website/assets/images/icons/caret.png') !!}" alt=""></button>
                                        <ul class="table-dropdown-list">
                                            <li>{!! round_price_format_for_count( $getHealthValueArray[1] ) !!} Yr. 2</li>
                                            <li>{!! round_price_format_for_count( $getHealthValueArray[2] ) !!} Yr. 3</li>
                                            <li>{!! round_price_format_for_count( $getHealthValueArray[3] ) !!} Yr. 4</li>
                                            <li>{!! round_price_format_for_count( $getHealthValueArray[4] ) !!} Yr. 5</li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3">PROFESSIONAL EMPLOYER ORGANIZATION (PEO)</td>
                                    <td>{!! round_price_format(getPEO($dashboardData->re_current_employees)) !!}</td>
                                </tr>
                                <tr>
                                    <td colspan="3">PROCESS AUTOMATION</td>
                                    <td>{!! round_price_format(getProcessAutomationOptimisation($dashboardData->re_total_hours_spent, $dashboardData->re_emp_avg_wage))  !!}</td>
                                </tr>
                                <tr>
                                    <td colspan="3">ELECTRONIC PAYMENTS</td>
                                    <td>{!! round_price_format(getElecronicPaymentProcessing($dashboardData->re_electronic_payment)) !!}</td>
                                </tr>
                                <tr>
                                    <td colspan="3">BUSINESS TELEPHONES</td>
                                    <td>{!! round_price_format(getBusinessTelephones($dashboardData->re_line_type, $dashboardData->re_phone_expenses, $dashboardData->re_dedicated_lines)) !!}</td>
                                </tr>
                                <tr>
                                    <td colspan="3">SHIPPING - SMALL PARCEL</td>
                                    <td>{!! round_price_format(getShippingValue($dashboardData->re_last_review_fedex, $dashboardData->re_shipping_50000, $dashboardData->re_fedex_dhl, $dashboardData->re_domestic_delivery, $dashboardData->re_resedential_delivery)) !!}</td>
                                </tr>
                                <tr>
                                    <td colspan="3">SOLID WASTE & RECYLING</td>
                                    <td>{!! round_price_format($dashboardData->re_solid_waste_benefit)   !!}</td>
                                </tr>
                                <tr>
                                    <td colspan="3">MEDICAL WASTE DISPOSAL</td>
                                    <td>{!! round_price_format($dashboardData->re_medical_waste_benefit)  !!}</td>
                                </tr>

                                <tr>
                                    <td colspan="3">UTILITIES</td>
                                    <td>{!! round_price_format($dashboardData->re_utility_value) !!}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="col-md-5 col-4k-6">
                    <div class="charts su-dashboard">
                        <div class="chart-type">
                            <div id="typeChart"></div>
                            <span>By Type</span>
                        </div>

                        <div class="chart-type">
                            <div id="timeChart"></div>
                            <span>By Time</span>
                        </div>
                    </div>
                </div>

                <!-- <div class="col-md-12 text-right">
                    <a href="{!! route('index') !!}">More Details <span><img src="{!! asset('assets/frontend/website/assets/images/icons/caret.PNG') !!}" alt=""></span></a>
                </div> -->
            </div>
        </div>
    </section>

    <!-- Scripts file here -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script>

        //Type chart end 
        Highcharts.chart('typeChart', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie',
                height: 145,
                backgroundColor: 'transparent',
            },
            legend: {
                align: 'right',
                verticalAlign: 'middle',
                symbolRadius: 0,
                x: 50,
                itemStyle: {
                    fontSize: '10px',
                }
            },
            title: {
                text: null,
            },
            credits: {
                enabled: false
            },
            tooltip: {
                enabled: false
            },
            accessibility: {
                point: {
                    valueSuffix: '%'
                }
            },
            plotOptions: {
                pie: {
                    allowPointSelect: false,
                    cursor: 'pointer',
                    selected: true,
                    dataLabels: {
                        enabled: true,
                        format: '{point.percentage:.0f}%',
                        distance: -20,
                        style: {
                            fontSize: 9,
                            fontWeight: 'normal',
                            textOutline: 'none'
                        }
                    },
                    showInLegend: true,
                    center: ["35px", "50%"],
                },
            },
            series: [{
                colorByPoint: true,
                data: [{
                    name: 'Cash Benefit',
                    y: {!! round($getCashBenefit, 0) !!},
                    color: '#90b742',
                },
                {
                    name: 'Tax Credit',
                    y: {!! round($getTaxCreditBenefit, 0) !!},
                    color: '#2e6da6',
                }]
            }],
        });

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

        Highcharts.chart('timeChart', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie',
                height: 145,
                backgroundColor: 'transparent',
            },
            legend: {
                align: 'right',
                verticalAlign: 'middle',
                symbolRadius: 0,
                x: 50,
                itemStyle: {
                    fontSize: '10px',
                }
            },
            title: {
                text: null,
            },
            credits: {
                enabled: false
            },
            tooltip: {
                enabled: false
            },
            
            plotOptions: {
                pie: {
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        //format: '${point.percentage:.0f}K',
                        formatter: function() {
                            this.point.percentage = this.percentage;
                            return '$'+nFormatter(this.y);
                        },
                        distance: -20,
                        style: {
                            fontSize: 9,
                            fontWeight: 'normal',
                            textOutline: 'none'
                        }
                    },
                    showInLegend: true,
                    center: ["35px", "50%"],
                },
            },
            series: [{
                colorByPoint: true,
                data: [{
                    name: 'Year 1',
                    y: {!! $netProfit !!},
                    color: '#90b742',
                },
                {
                    name: 'Year 2',
                    y: {!! $year_2 !!},
                    color: '#2e6da6',
                },
                {
                    name: 'Year 3',
                    y: {!! $year_3 !!},
                    color: '#42a2d4',
                }]
            }]
        });
    </script>
@else
    <div class="container" style="margin-top: 50%;">
        <div class="row vertical-center-row">
            <div class="col-md-12">
                <h3 class="text-center">No data found.</h3>
            </div>
        </div>
    </div>
@endif