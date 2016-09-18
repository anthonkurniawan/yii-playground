<?php $this->layout='column1';?> 
<?php
$this->pageTitle=Yii::app()->name . ' - HighChart Dynamic HTML';
$this->breadcrumbs=array('mytemplate/HighChart_dynamic_html',);
?>
<style>
.container{width:1100px}
.javascript-hl-main {font-size:90% }
</style>

<h1><small>HighChart Dynamic HTML( no widget )  </small></h1>

<script src="http://localhost/TESTING/CHART/Highcharts-3.0.1/js/highcharts.js"></script>

<select id="chartType">
    <option value="line">line</option>
    <option value="column">column</option>
    <option value="scatter">point</option>
    <option value="bar">bar</option>
</select><br>

<div id="container" style="width: 500px; float:left"></div>
 
 <script>
 // function changeType(chart, series, newType) {
    // for (var i = 0; i < series.length; i++) {
        // alert(newType);
        // serie = series[0];
        // serie.chart.addSeries({
            // type: newType,
            // name: serie.name,
            // yaxis: serie.yaxis,
            // color: serie.color,
            // data: serie.options.data
        // }, false);

        // serie.remove();
    // }
// }

function changeType(chart, series, newType) {
        newType = newType.toLowerCase();
        for (var i = 0; i < series.length; i++) {
            series = series[0];
            try {
                series.chart.addSeries({
                    type: newType,
                    stack: series.stack,
                    yaxis: series.yaxis,
                    name: series.name,
                    color: series.color,
                    data: series.options.data
                },
                false);
                series.remove();
            } catch (e) {
                alert(newType & ': ' & e);
            }
        }
    }


Highcharts.setOptions({
    colors: ['#058DC7', '#50B432', '#ED561B', '#DDDF00', '#24CBE5', '#64E572', '#FF9655', '#FFF263', '#6AF9C4']
});
var chartDist;
$(document).ready(function() {
    chartDist = new Highcharts.Chart({
        chart: {
            renderTo: 'container',
            alignTicks: true,
            borderWidth: 1,
            height: 500,
            resetZoomButton: {
                position: {
                    align: 'right',
                    verticalAlign: 'top'
                }
            },
            spacingTop: 0,
            spacingRight: 0,
            spacingBottom: 50,
            spacingLeft: 0,
            width: 500,
            zoomType: 'x'
        },
        legend: {
            enabled: true,
            layout: 'horizontal'
        },
        plotOptions: {
            series: {
                shadow: true
            },
            spline: {
                marker: {
                    enabled: false
                }
            }
        },
        subtitle: {
            text: 'Occupational Employment Statistics (OES) Program',
            verticalAlign: 'bottom'
        },
        title: {
            text: ''
        },
        tooltip: {
            formatter: function() {
                var s = '<b>' + this.x + '</b>';
                $.each(this.points, function(i, point) {
                    s += '<br/>' + point.series.name + ': ';
                    if (point.series.name == 'Unemployment Rate (%)') {
                        s += Highcharts.numberFormat(point.y, 2, '.');
                    } else {
                        s += Highcharts.numberFormat(point.y, 0, ',');
                    }
                });
                return s;
            },
            shared: true
        },
        xAxis: {
            categories: ['Chay', 'Brevard', 'Polk', 'Okaloosa', 'Miami', 'Broward', 'Palm', 'Collier']
        },
        yAxis: [{
            endOnTick: true,
            title: {
                text: 'Wages'
            },
            labels: {
                style: {
                    color: '#89A54E'
                }
            },
            opposite: false},
        {
            endOnTick: false,
            title: {
                text: 'Employment'
            },
            labels: {

                style: {
                    color: '#999999'
                }
            },
            opposite: true}],
        exporting: {
            buttons: {
                exportButton: {
                    align: 'right',
                    verticalAlign: 'bottom',
                    y: -20
                },
                printButton: {
                    align: 'right',
                    verticalAlign: 'bottom',
                    y: -20
                }
            },
            width: 565
        },
        series: [{
            data: [30321.00, 33280.00, 33549.00, 36184.00, 35678.00, 34011.00, 36535.00, 36535.00],
            name: 'Entry Level',
            type: 'bar',
            yAxis: 0},
        {
            data: [47974.00, 51307.00, 53781.00, 54365.00, 54838.00, 58262.00, 58345.00, 58345.00],
            name: 'Mean (average)',
            type: 'bar',
            yAxis: 0},
        {
            data: [56801.00, 60320.00, 63896.00, 63456.00, 64419.00, 70387.00, 69250.00],
            name: 'Experienced',
            type: 'bar',
            yAxis: 0},
        {
            data: [260, 3530, 1130, 490, 1070, 410, 2440],
            name: 'Employment',
            type: 'bar',
            yAxis: 1}]
    });

    $('#chartType').change(function() {
		changeType(chartDist, chartDist.series, this.value);
	});
    
});
</script>

<!---------------------------------------------------------------------- CODE VIEW -------------------------------------------------------------->
<div class="scroll view" style="float:right; width:550px; height: 500px" >
<?php $this->beginWidget('CTextHighlighter',array('language'=>'JAVASCRIPT', 'tabSize'=>1, )); ?>
#THE HTML
<select id="chartType">
    <option value="line">line</option>
    <option value="column">column</option>
    <option value="scatter">point</option>
    <option value="bar">bar</option>
</select><br>

<div id="container" style="width: 500px; float:left"></div>

#THE JS
// function changeType(chart, series, newType) {
    // for (var i = 0; i < series.length; i++) {
        // alert(newType);
        // serie = series[0];
        // serie.chart.addSeries({
            // type: newType,
            // name: serie.name,
            // yaxis: serie.yaxis,
            // color: serie.color,
            // data: serie.options.data
        // }, false);

        // serie.remove();
    // }
// }

function changeType(chart, series, newType) {
        newType = newType.toLowerCase();
        for (var i = 0; i < series.length; i++) {
            series = series[0];
            try {
                series.chart.addSeries({
                    type: newType,
                    stack: series.stack,
                    yaxis: series.yaxis,
                    name: series.name,
                    color: series.color,
                    data: series.options.data
                },
                false);
                series.remove();
            } catch (e) {
                alert(newType & ': ' & e);
            }
        }
    }


Highcharts.setOptions({
    colors: ['#058DC7', '#50B432', '#ED561B', '#DDDF00', '#24CBE5', '#64E572', '#FF9655', '#FFF263', '#6AF9C4']
});
var chartDist;
$(document).ready(function() {
    chartDist = new Highcharts.Chart({
        chart: {
            renderTo: 'container',
            alignTicks: true,
            borderWidth: 1,
            height: 500,
            resetZoomButton: {
                position: {
                    align: 'right',
                    verticalAlign: 'top'
                }
            },
            spacingTop: 0,
            spacingRight: 0,
            spacingBottom: 50,
            spacingLeft: 0,
            width: 500,
            zoomType: 'x'
        },
        legend: {
            enabled: true,
            layout: 'horizontal'
        },
        plotOptions: {
            series: {
                shadow: true
            },
            spline: {
                marker: {
                    enabled: false
                }
            }
        },
        subtitle: {
            text: 'Occupational Employment Statistics (OES) Program',
            verticalAlign: 'bottom'
        },
        title: {
            text: ''
        },
        tooltip: {
            formatter: function() {
                var s = '<b>' + this.x + '</b>';
                $.each(this.points, function(i, point) {
                    s += '<br/>' + point.series.name + ': ';
                    if (point.series.name == 'Unemployment Rate (%)') {
                        s += Highcharts.numberFormat(point.y, 2, '.');
                    } else {
                        s += Highcharts.numberFormat(point.y, 0, ',');
                    }
                });
                return s;
            },
            shared: true
        },
        xAxis: {
            categories: ['Chay', 'Brevard', 'Polk', 'Okaloosa', 'Miami', 'Broward', 'Palm', 'Collier']
        },
        yAxis: [{
            endOnTick: true,
            title: {
                text: 'Wages'
            },
            labels: {
                style: {
                    color: '#89A54E'
                }
            },
            opposite: false},
        {
            endOnTick: false,
            title: {
                text: 'Employment'
            },
            labels: {

                style: {
                    color: '#999999'
                }
            },
            opposite: true}],
        exporting: {
            buttons: {
                exportButton: {
                    align: 'right',
                    verticalAlign: 'bottom',
                    y: -20
                },
                printButton: {
                    align: 'right',
                    verticalAlign: 'bottom',
                    y: -20
                }
            },
            width: 565
        },
        series: [{
            data: [30321.00, 33280.00, 33549.00, 36184.00, 35678.00, 34011.00, 36535.00, 36535.00],
            name: 'Entry Level',
            type: 'bar',
            yAxis: 0},
        {
            data: [47974.00, 51307.00, 53781.00, 54365.00, 54838.00, 58262.00, 58345.00, 58345.00],
            name: 'Mean (average)',
            type: 'bar',
            yAxis: 0},
        {
            data: [56801.00, 60320.00, 63896.00, 63456.00, 64419.00, 70387.00, 69250.00],
            name: 'Experienced',
            type: 'bar',
            yAxis: 0},
        {
            data: [260, 3530, 1130, 490, 1070, 410, 2440],
            name: 'Employment',
            type: 'bar',
            yAxis: 1}]
    });

	$('#chartType').change(function() {
		changeType(chartDist, chartDist.series, this.value);
	});
    
});
<?php $this->endWidget(); ?>
</div>