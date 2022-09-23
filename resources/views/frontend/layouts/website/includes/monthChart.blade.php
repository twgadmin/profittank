<style>
    rect.highcharts-background{fill: transparent;}
    .highcharts-title {
        font-weight: bold;
        font-size: 25px!important;
    }

</style>

<div id="container" style="height: 300px"></div>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
    Highcharts.chart('container', {
        chart: {
            
            type: 'column',
            height: 300,
        left: 0,
        width: 600,
        },
         title: {
            text: 'Monthly Average Rainfall',
            align: 'left',
            
        },
        credits: {
            enabled: false
        },
        yAxis: {
          title: {
            text: ''
          },
          labels: {
                style: {
                    fontSize: '18px',
                },
            },
        },
        xAxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            labels: {
                style: {
                    fontSize: '18px',
                },
            },
            
        },

        legend: {
            enabled: false,
        },
    
        plotOptions: {
            series: {
                pointWidth: 40,
            },
        },
    
        series: [{
            data: [29.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]
        }]
    });
</script>