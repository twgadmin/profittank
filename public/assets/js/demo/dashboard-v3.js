/*
Template Name: Color Admin - Responsive Admin Dashboard Template build with Twitter Bootstrap 4
Version: 4.6.0
Author: Sean Ngu
Website: http://www.seantheme.com/color-admin/admin/
*/
var state_1 = "";
var state_2 = "";
var state_3 = "";
var state_4 = "";

var handleTotalSalesSparkline = function() {
	var options = {
		chart: {
			type: 'line',
			width: 200,
			height: 36,
			sparkline: {
				enabled: true
			},
			stacked: true
		},
		stroke: {
			curve: 'smooth',
			width: 3
		},
		fill: {
			type: 'gradient',
			gradient: {
				opacityFrom: 1,
				opacityTo: 1,
				colorStops: [{
					offset: 0,
					color: COLOR_BLUE,
					opacity: 1
				},
				{
					offset: 100,
					color: COLOR_INDIGO,
					opacity: 1
				}]
			},
		},
		series: [{
			data: [9452.37, 11018.87, 7296.37, 6274.29, 7924.05, 6581.34, 12918.14]
		}],
		tooltip: {
			theme: 'dark',
			fixed: {
				enabled: false
			},
			x: {
				show: false
			},
			y: {
				title: {
					formatter: function (seriesName) {
						return ''
					}
				},
				formatter: (value) => { return '$'+ convertNumberWithCommas(value) },
			},
			marker: {
				show: false
			}
		},
		responsive: [{
			breakpoint: 1500,
			options: {
				chart: {
					width: 130
				}
			}
		},{
			breakpoint: 1300,
			options: {
				chart: {
					width: 100
				}
			}
		},{
			breakpoint: 1200,
			options: {
				chart: {
					width: 200
				}
			}
		},{
			breakpoint: 576,
			options: {
				chart: {
					width: 180
				}
			}
		},{
			breakpoint: 400,
			options: {
				chart: {
					width: 120
				}
			}
		}]
	};
	if ($('#total-sales-sparkline').length !== 0) {
		new ApexCharts(document.querySelector('#total-sales-sparkline'), options).render();
	}
};

var handleConversionRateSparkline = function() {
	var options = {
		chart: {
			type: 'line',
			width: 160,
			height: 28,
			sparkline: {
				enabled: true
			}
		},
		stroke: {
			curve: 'smooth',
			width: 3
		},
		fill: {
			type: 'gradient',
			gradient: {
				opacityFrom: 1,
				opacityTo: 1,
				colorStops: [{
					offset: 0,
					color: COLOR_RED,
					opacity: 1
				},
				{
					offset: 50,
					color: COLOR_ORANGE,
					opacity: 1
				},
				{
					offset: 100,
					color: COLOR_LIME,
					opacity: 1
				}]
			},
		},
		series: [{
			data: [2.68, 2.93, 2.04, 1.61, 1.88, 1.62, 2.80]
		}],
		labels: ['Jun 23', 'Jun 24', 'Jun 25', 'Jun 26', 'Jun 27', 'Jun 28', 'Jun 29'],
		xaxis: {
			crosshairs: {
				width: 1
			},
		},
		tooltip: {
			theme: 'dark',
			fixed: {
				enabled: false
			},
			x: {
				show: false
			},
			y: {
				title: {
					formatter: function (seriesName) {
						return ''
					}
				},
				formatter: (value) => { return value + '%' },
			},
			marker: {
				show: false
			}
		},
		responsive: [{
			breakpoint: 1500,
			options: {
				chart: {
					width: 120
				}
			}
		},{
			breakpoint: 1300,
			options: {
				chart: {
					width: 100
				}
			}
		},{
			breakpoint: 1200,
			options: {
				chart: {
					width: 160
				}
			}
		},{
			breakpoint: 900,
			options: {
				chart: {
					width: 120
				}
			}
		},{
			breakpoint: 576,
			options: {
				chart: {
					width: 180
				}
			}
		},{
			breakpoint: 400,
			options: {
				chart: {
					width: 120
				}
			}
		}]
	}
	if ($('#conversion-rate-sparkline').length !== 0) {
		new ApexCharts(document.querySelector("#conversion-rate-sparkline"), options).render();
	}
};

var handleStoreSessionSparkline = function() {
	var options = {
		chart: {
			type: 'line',
			width: 160,
			height: 28,
			sparkline: {
				enabled: true
			},
			stacked: false
		},
		stroke: {
			curve: 'smooth',
			width: 3
		},
		fill: {
			type: 'gradient',
			gradient: {
				opacityFrom: 1,
				opacityTo: 1,
				colorStops: [{
					offset: 0,
					color: COLOR_TEAL,
					opacity: 1
				},
				{
					offset: 50,
					color: COLOR_BLUE,
					opacity: 1
				},
				{
					offset: 100,
					color: COLOR_AQUA,
					opacity: 1
				}]
			},
		},
		series: [{
			data: [10812, 11393, 7311, 6834, 9612, 11200, 13557]
		}],
		labels: ['Jun 23', 'Jun 24', 'Jun 25', 'Jun 26', 'Jun 27', 'Jun 28', 'Jun 29'],
		xaxis: {
			crosshairs: {
				width: 1
			},
		},
		tooltip: {
			theme: 'dark',
			fixed: {
				enabled: false
			},
			x: {
				show: false
			},
			y: {
				title: {
					formatter: function (seriesName) {
						return ''
					}
				},
				formatter: (value) => { return convertNumberWithCommas(value) },
			},
			marker: {
				show: false
			}
		},
		responsive: [{
			breakpoint: 1500,
			options: {
				chart: {
					width: 120
				}
			}
		},{
			breakpoint: 1300,
			options: {
				chart: {
					width: 100
				}
			}
		},{
			breakpoint: 1200,
			options: {
				chart: {
					width: 160
				}
			}
		},{
			breakpoint: 900,
			options: {
				chart: {
					width: 120
				}
			}
		},{
			breakpoint: 576,
			options: {
				chart: {
					width: 180
				}
			}
		},{
			breakpoint: 400,
			options: {
				chart: {
					width: 120
				}
			}
		}]
	};
	if ($('#store-session-sparkline').length !== 0) {
		new ApexCharts(document.querySelector('#store-session-sparkline'), options).render();
	}
};

var handleVisitorsAreaChart = function() {
	var handleGetDate = function(minusDate) {
		var d = new Date();
		d = d.setDate(d.getDate() - minusDate);
		return d;
	};
	var visitorAreaChartData = [{
		'key' : 'Transactions',
		'color' : COLOR_INDIGO,
		'values' : monthlyCount
	},{
		'key' : 'Amount',
		'color' : COLOR_ORANGE,
		'values' : monthlyAmount
	}];
	
	if ($('#visitors-line-chart').length !== 0) {
		nv.addGraph(function() {
			var stackedAreaChart = nv.models.stackedAreaChart()
				.useInteractiveGuideline(true)
				.x(function(d) { return d[0] })
				.y(function(d) { return d[1] })
				.pointSize(0.5)
				.margin({'left':35,'right': 25,'top': 20,'bottom':20})
				.controlLabels({stacked: 'Stacked'})
				.showControls(false)
				.duration(300);

			stackedAreaChart.xAxis.tickFormat(function(d) { 
				var monthsName = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
				d = new Date(d);
				d = monthsName[d.getMonth()] + ' ' + d.getDate();
				return d ;
			});
			stackedAreaChart.yAxis.tickFormat(d3.format(',.0f'));

			d3.select('#visitors-line-chart')
				.append('svg')
				.datum(visitorAreaChartData)
				.transition().duration(1000)
				.call(stackedAreaChart)
				.each('start', function() {
					setTimeout(function() {
						d3.selectAll('#visitors-line-chart *').each(function() {
							if(this.__transition__)
								this.__transition__.duration = 1;
						})
					}, 0)
				});

			nv.utils.windowResize(stackedAreaChart.update);
			return stackedAreaChart;
		});
	}
};

var handleVisitorsMap = function() {
	if (statesCount != '') {
		var options = {
			map: 'us_mill',
			scaleColors: [COLOR_BLACK_LIGHTER, COLOR_BLACK],
			container: $('#visitors-map'),
			normalizeFunction: 'linear',
			hoverOpacity: 0.5,
			hoverColor: false,
			zoomOnScroll: false,
			zoomButtons: false,
			markerStyle: {
				initial: {
					fill: COLOR_BLACK,
					stroke: 'transparent',
					r: 3
				}
			},
			regions: [{
				attribute: 'fill'
			}],
			regionStyle: {
				initial: {
					fill: COLOR_DARK_LIGHTER,
					"fill-opacity": 1,
					stroke: 'none',
					"stroke-width": 0.4,
					"stroke-opacity": 1
				},
				hover: {
					fill: COLOR_BLUE,
					"fill-opacity": 0.8
				},
				selected: {
					fill: 'yellow'
				}
			},
			series: {
				regions: [{
					values: statesCount
				}]
			},
			focusOn: {
				x: 0.7,
				y: 0.5,
				scale: 1
			},
			backgroundColor: 'transparent'
		};

		if ($('#visitors-map').length !== 0) {
			$('#visitors-map').vectorMap(options);
			return false;
		}
	}
}

var handleDateRangeFilter = function() {
	$('#daterange-filter span').html(moment().subtract('days', 7).format('D MMMM YYYY') + ' - ' + moment().format('D MMMM YYYY'));
	$('#daterange-prev-date').html(moment().subtract('days', 15).format('D MMMM') + ' - ' + moment().subtract('days', 8).format('D MMMM YYYY'));

	$('#daterange-filter').daterangepicker({
		format: 'MM/DD/YYYY',
		startDate: moment().subtract(7, 'days'),
		endDate: moment(),
		minDate: '01/06/2020',
		maxDate: '07/06/2020',
		dateLimit: { days: 60 },
		showDropdowns: true,
		showWeekNumbers: true,
		timePicker: false,
		timePickerIncrement: 1,
		timePicker12Hour: true,
		ranges: {
			'Today': [moment(), moment()],
			'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
			'Last 7 Days': [moment().subtract(6, 'days'), moment()],
			'Last 30 Days': [moment().subtract(29, 'days'), moment()],
			'This Month': [moment().startOf('month'), moment().endOf('month')],
			'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
		},
		opens: 'right',
		drops: 'down',
		buttonClasses: ['btn', 'btn-sm'],
		applyClass: 'btn-primary',
		cancelClass: 'btn-default',
		separator: ' to ',
		locale: {
			applyLabel: 'Submit',
			cancelLabel: 'Cancel',
			fromLabel: 'From',
			toLabel: 'To',
			customRangeLabel: 'Custom',
			daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr','Sa'],
			monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
			firstDay: 1
		}
	}, function(start, end, label) {
		$('#daterange-filter span').html(start.format('D MMMM YYYY') + ' - ' + end.format('D MMMM YYYY'));
		
		var gap = end.diff(start, 'days');
		$('#daterange-prev-date').html(moment(start).subtract('days', gap).format('D MMMM') + ' - ' + moment(start).subtract('days', 1).format('D MMMM YYYY'));
	});
};

var DashboardV3 = function () {
	"use strict";
	return {
		//main function
		init: function () {
			handleTotalSalesSparkline();
			handleConversionRateSparkline();
			handleStoreSessionSparkline();
			handleVisitorsAreaChart();
			handleVisitorsMap();
			handleDateRangeFilter();
		}
	};
}();

$(document).ready(function() {
	DashboardV3.init();
});