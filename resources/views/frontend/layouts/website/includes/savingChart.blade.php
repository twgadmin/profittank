<style>
    .savingRow{display: flex;}
    .savingRow .col{width: 52%;}
    .savingRow .col p {font-size: 20px;text-align: center;width: 38%;margin-top: -16px;font-family: 'Open Sans';font-weight: 600;margin-bottom: 0;}
    rect.highcharts-background, rect.highcharts-legend-box{fill: transparent!important;}
    g.highcharts-exporting-group {display: none;}
    .highcharts-title {
        font-weight: bold;
        font-size: 20px!important;
        letter-spacing: -1px;
    }
</style>

<div class="savingRow"> 
    <div class="col">
        <div id="revenue"></div>
        <p>REVENUE</p>
    </div>
    <div class="col">
        <div id="percent"></div>
        <p>PERCENT</p>
    </div>
</div>


<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
// revenue the chart
Highcharts.chart('revenue', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie',
        height: 200,
        left: 0,
        width: 360,
    },
    credits: {
        enabled: false
    },
    title: {
        text: 'ESTIMATED /ACTUAL S AVINGS ',
        align: 'left',
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    
    legend: {
            layout: 'vertical',
            borderWidth: 0,
            backgroundColor: 'rgba(255,255,255,0.85)',
            floating: true,
            align: 'right',
            verticalAlign: 'middle',
            y: 0,
            right: 0,
            width: 200,
            symbolRadius: 0,
            symbolHeight: 12,
            itemMarginTop: 5,
            itemStyle: {
                color: '#000',
                fontSize: '18px',
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
            center: ["10%", "50%"]
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
        height: 200,
        left: 0,
        width: 360,
    },
    credits: {
        enabled: false
    },
    title: {
        text: 'ESTIMATED /ACTUAL S AVINGS ',
        align: 'left',
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    
    legend: {
            layout: 'vertical',
            borderWidth: 0,
            backgroundColor: 'rgba(255,255,255,0.85)',
            floating: true,
            align: 'right',
            verticalAlign: 'middle',
            y: 0,
            right: 0,
            width: 200,
            symbolRadius: 0,
            symbolHeight: 12,
            itemMarginTop: 5,
            itemStyle: {
                color: '#000',
                fontSize: '18px',
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
            center: ["10%", "50%"]
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
</script>