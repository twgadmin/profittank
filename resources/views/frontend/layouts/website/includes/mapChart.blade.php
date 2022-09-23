<style>
    rect.highcharts-background, rect.highcharts-legend-box{fill: transparent!important;}
    g.highcharts-exporting-group {display: none;}
    .highcharts-title {
        font-weight: bold;
        font-size: 25px!important;
    }
</style>

<div id="container"></div>

<script src="https://code.highcharts.com/maps/highmaps.js"></script>
<script src="https://code.highcharts.com/maps/modules/data.js"></script>
<script src="https://code.highcharts.com/maps/modules/exporting.js"></script>
<script src="https://code.highcharts.com/maps/modules/offline-exporting.js"></script>
<script src="https://code.highcharts.com/mapdata/countries/us/us-all.js"></script>

<script>
Highcharts.getJSON('https://cdn.jsdelivr.net/gh/highcharts/highcharts@v7.0.0/samples/data/us-population-density.json', function(data) {

// Make codes uppercase to match the map data
data.forEach(function(p) {
    p.code = p.code.toUpperCase();
});

// Instantiate the map
Highcharts.mapChart('container', {

    chart: {
        map: 'countries/us/us-all',
        borderWidth: 0
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

        dataClasses: [{
                from: 100,
                to: 0,
                color: '#c6e3f9',
                name: '(45,435 to 34,324)',

            }, {
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
</script>
