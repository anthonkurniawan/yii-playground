<?php $this->layout='column1';?> 
<?php
$this->pageTitle=Yii::app()->name . ' - HighChart';
$this->breadcrumbs=array('mytemplate/HighChart',);
?>

<a href="http://localhost//TESTING/CHART/Highcharts-3.0.1/index.htm" target="_blank">Highcharts-3.0.1 Others Sample</a> |
<a href="http://127.0.0.1/testing/chart/Highstock-1.3.1/examples/" target="_blank">Highstock-1.3.1 Others Sample</a> |
<a href="http://api.highcharts.com/highcharts" target="_blank" style="float:right">Highchart Config</a> <br><br>

<h1><small>HighCharts</small></h1> with HighChart 2.3.5
<!------------------------------------------------------------ Line ----------------------------------------------------->
<div class="view2" id="chart2" style="width: 430px; height: 300px; margin: 0 auto; float:left"></div> <!--min-width: 430px;-->
<?php
$this->Widget('ext-coll.grafik.highcharts.HighchartsWidget', array(
   'options'=>array(
		'chart'=> array(
            'renderTo'=>'chart2',
			'type'=>'line',		# line, spline, area, areaspline, column, bar, pie and scatter, gauge
            'plotBackgroundColor'=> null,
            'plotBorderWidth'=> null,
            'plotShadow'=> false
        ),
		'title' => array('text' => 'HighCharts Line'),
		#x-axis karena tdk di set maka akan  pake nilai default: dgn interval "0.5" ( 0, 0.5, 1, 1.5 ..dst )
		#y-axis aan mengikuti dari "data series" dan mengambil nila max sebagai batas
		'series' => array(				
			array('name' => 'Jane', 'data' => array(1, 0, 4)),		
			array('name' => 'John', 'data' => array(5, 7, 3))
		),
   )
));
?>

<!------------------------------------------------------------ SPLINE ----------------------------------------------------->
<div class="view2" id="chart4" style="width: 430px; height: 300px; margin: 0 auto; float:left"></div> <!--min-width: 430px;-->
<?php
$this->Widget('ext-coll.grafik.highcharts.HighchartsWidget', array(
   'options'=>array(
		'chart'=> array(
            'renderTo'=>'chart4',
			'type'=>'spline',	# line, spline, area, areaspline, column, bar, pie and scatter, gauge
            'plotBackgroundColor'=> null,
            'plotBorderWidth'=> null,
            'plotShadow'=> false
        ),
		'title' => array('text' => 'HighCharts SPline'),
		'series' => array(
			array('name' => 'Jane', 'data' => array(1, 0, 4)),
			array('name' => 'John', 'data' => array(5, 7, 3))
		),
   )
));
?>

<!------------------------------------------------------------ BAR ----------------------------------------------------->
<div class="view2" id="chart1" style="width: 430px; height: 300px; margin: 0 auto; float:left"></div> <!--min-width: 430px;-->
<?php
$this->Widget('ext-coll.grafik.highcharts.HighchartsWidget', array(
   'options'=>array(
		'chart'=> array(
            'renderTo'=>'chart1',
			'type'=>'bar',		# line, spline, area, areaspline, column, bar, pie and scatter, gauge
            'plotBackgroundColor'=> null,
            'plotBorderWidth'=> null,
            'plotShadow'=> false
        ),
		'title' => array('text' => 'Highcharts Bar'),
		'series' => array(
			array('name' => 'Jane', 'data' => array(1, 0, 4)),
			array('name' => 'John', 'data' => array(5, 7, 3))
		),
   )
));
?>

<!------------------------------------------------------------ COLUMN ----------------------------------------------------->
<div class="view2" id="chart5" style="width: 430px; height: 300px; margin: 0 auto; float:left"></div> <!--min-width: 430px;-->
<?php
$this->Widget('ext-coll.grafik.highcharts.HighchartsWidget', array(
   'options'=>array(
		'chart'=> array(
            'renderTo'=>'chart5',
			'type'=>'column',		# line, spline, area, areaspline, column, bar, pie and scatter, gauge
            'plotBackgroundColor'=> null,
            'plotBorderWidth'=> null,
            'plotShadow'=> false
        ),
		'title' => array('text' => 'Highcharts Column'),
		'series' => array(
			array('name' => 'Jane', 'data' => array(1, 0, 4)),
			array('name' => 'John', 'data' => array(5, 7, 3))
		),
   )
));
?>

<!------------------------------------------------------------ AREA ----------------------------------------------------->
<div class="view2" id="chart6" style="width: 430px; height: 300px; margin: 0 auto; float:left"></div> <!--min-width: 430px;-->
<?php
$this->Widget('ext-coll.grafik.highcharts.HighchartsWidget', array(
   'options'=>array(
		'chart'=> array(
            'renderTo'=>'chart6',
			'type'=>'area',		# line, spline, area, areaspline, column, bar, pie and scatter, gauge
            'plotBackgroundColor'=> null,
            'plotBorderWidth'=> null,
            'plotShadow'=> false
        ),
		'title' => array('text' => 'Highcharts Area'),
		'series' => array(
			array('name' => 'Jane', 'data' => array(1, 0, 4)),
			array('name' => 'John', 'data' => array(5, 7, 3))
		),
   )
));
?>

<!------------------------------------------------------------ AREA SPLINE ----------------------------------------------------->
<div class="view2" id="chart7" style="width: 430px; height: 300px; margin: 0 auto; float:left"></div> <!--min-width: 430px;-->
<?php
$this->Widget('ext-coll.grafik.highcharts.HighchartsWidget', array(
   'options'=>array(
		'chart'=> array(
            'renderTo'=>'chart7',
			'type'=>'areaspline',		# line, spline, area, areaspline, column, bar, pie and scatter, gauge
            'plotBackgroundColor'=> null,
            'plotBorderWidth'=> null,
            'plotShadow'=> false
        ),
		'title' => array('text' => 'Highcharts Area Spline'),
		'series' => array(
			array('name' => 'Jane', 'data' => array(1, 0, 4)),
			array('name' => 'John', 'data' => array(5, 7, 3))
		),
   )
));
?>

<!------------------------------------------------------------ PIE ----------------------------------------------------->
<div class="view2" id="chart3" style="width: 430px; height: 300px; margin: 0 auto; float:left"></div> <!--min-width: 430px;-->
<?php
$this->Widget('ext-coll.grafik.highcharts.HighchartsWidget', array(
   'options'=>array(
		'chart'=> array(
            'renderTo'=>'chart3',
			'type'=>'pie',	# line, spline, area, areaspline, column, bar, pie and scatter, gauge
            'plotBackgroundColor'=> null,
            'plotBorderWidth'=> null,
            'plotShadow'=> false
        ),
		'title' => array('text' => 'HighCharts Pie'),
		'series' => array(
			array('name' => 'Jane', 'data' => array(1, 0, 4)),
			array('name' => 'John', 'data' => array(5, 7, 3))
		),
   )
));
?>

<!------------------------------------------------------------ SCATTER ----------------------------------------------------->
<div class="view2" id="chart8" style="width: 430px; height: 300px; margin: 0 auto; float:left"></div> <!--min-width: 430px;-->
<?php
$this->Widget('ext-coll.grafik.highcharts.HighchartsWidget', array(
   'options'=>array(
		'chart'=> array(
            'renderTo'=>'chart8',
			'type'=>'scatter',	# line, spline, area, areaspline, column, bar, pie and scatter, gauge
            'plotBackgroundColor'=> null,
            'plotBorderWidth'=> null,
            'plotShadow'=> false
        ),
		'title' => array('text' => 'HighCharts Scatter'),
		'series' => array(
			array('name' => 'Jane', 'data' => array(1, 0, 4)),
			array('name' => 'John', 'data' => array(5, 7, 3))
		),
   )
));
?>

<!------------------------------------------------------------ GAUGE ----------------------------------------------------->
<div class="view2" id="chart9" style="width: 430px; height: 300px; margin: 0 auto; float:left"></div> <!--min-width: 430px;-->
<?php
$this->Widget('ext-coll.grafik.highcharts.HighchartsWidget', array(
   'options'=>array(
		'chart'=> array(
            'renderTo'=>'chart9',
			'type'=>'gauge',	# line, spline, area, areaspline, column, bar, pie and scatter, gauge
            'plotBackgroundColor'=> null,
            'plotBorderWidth'=> null,
            'plotShadow'=> false
        ),
		'title' => array('text' => 'HighCharts Gauge'),
		'series' => array(
			array('name' => 'Jane', 'data' => array(1, 0, 4)),
			array('name' => 'John', 'data' => array(5, 7, 3))
		),
   )
));
?>

<!------------------------------------------------------------ POLAR LINE ----------------------------------------------------->
<div class="view2" id="chart10" style="width: 430px; height: 300px; margin: 0 auto; float:left"></div> <!--min-width: 430px;-->
<?php
$this->Widget('ext-coll.grafik.highcharts.HighchartsWidget', array(
   'options'=>array(
		'chart'=> array(
            'renderTo'=>'chart10',
			'type'=>'line',	# line, spline, area, areaspline, column, bar, pie and scatter, gauge
			'polar'=>true,
            'plotBackgroundColor'=> null,
            'plotBorderWidth'=> null,
            'plotShadow'=> false
        ),
		'title' => array('text' => 'HighCharts Polar Line'),
		'series' => array(
			array('name' => 'Jane', 'data' => array(1, 0, 4)),
			array('name' => 'John', 'data' => array(5, 7, 3))
		),
   )
));
?>

<!------------------------------------------------------------ POLAR COLUMN ----------------------------------------------------->
<div class="view2" id="chart11" style="width: 430px; height: 300px; margin: 0 auto; float:left"></div> <!--min-width: 430px;-->
<?php
$this->Widget('ext-coll.grafik.highcharts.HighchartsWidget', array(
   'options'=>array(
		'chart'=> array(
            'renderTo'=>'chart11',
			'type'=>'column',	# line, spline, area, areaspline, column, bar, pie and scatter, gauge
			'polar'=>true,
            'plotBackgroundColor'=> null,
            'plotBorderWidth'=> null,
            'plotShadow'=> false
        ),
		'title' => array('text' => 'HighCharts Polar Column'),
		'series' => array(
			array('name' => 'Jane', 'data' => array(1, 0, 4)),
			array('name' => 'John', 'data' => array(5, 7, 3))
		),
   )
));
?>

<!------------------------------------------------------------ POLAR AREA ----------------------------------------------------->
<div class="view2" id="chart12" style="width: 430px; height: 300px; margin: 0 auto; float:left"></div> <!--min-width: 430px;-->
<?php
$this->Widget('ext-coll.grafik.highcharts.HighchartsWidget', array(
   'options'=>array(
		'chart'=> array(
            'renderTo'=>'chart12',
			'type'=>'area',	# line, spline, area, areaspline, column, bar, pie and scatter, gauge
			'polar'=>true,
            'plotBackgroundColor'=> null,
            'plotBorderWidth'=> null,
            'plotShadow'=> false
        ),
		'title' => array('text' => 'HighCharts Polar Area'),
		'series' => array(
			array('name' => 'Jane', 'data' => array(1, 0, 4)),
			array('name' => 'John', 'data' => array(5, 7, 3))
		),
   )
));
?>

<!------------------------------------------------------------ POLAR AREA ----------------------------------------------------->
<div class="view2" id="chart13" style="width: 430px; height: 300px; margin: 0 auto; float:left"></div> <!--min-width: 430px;-->
<?php
$this->Widget('ext-coll.grafik.highcharts.HighchartsWidget', array(
   'options'=>array(
		'chart'=> array(
            'renderTo'=>'chart13',
			'type'=>'line',	# line, spline, area, areaspline, column, bar, pie and scatter, gauge
			'polar'=>true,
            'plotBackgroundColor'=> null,
            'plotBorderWidth'=> null,
            'plotShadow'=> false
        ),
		
		'title' => array('text' => 'HighCharts Polar Line (gridLineInterpolation: polygon) '),
		//'pane'=> array( 'size'=> '80%'),
		'yAxis'=> array(
			'gridLineInterpolation'=> 'polygon',
			'lineWidth'=> 0,
			'min'=> 0,
	    ),
		'xAxis' => array(
			'categories' => array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'),
			'tickmarkPlacement'=> 'on',
			'lineWidth'=> 0,
			// labels: {
	        	// formatter: function () {
	        		// return this.value + '°';
	        	// }
	        // }
		),
		'series' => array(
			array('name' => 'Jane', 'data' => array(1, 0, 4)),
			array('name' => 'John', 'data' => array(5, 7, 3))
		),
   )
));
?>