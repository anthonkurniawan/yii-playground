<?php
$this->Widget('ext.charts.highcharts.HighchartsWidget', array(
	'options'=>array(
		'chart'=> array(
           // 'renderTo'=>'chart2',
			'type'=>'line',		# line, spline, area, areaspline, column, bar, pie and scatter, gauge
            // 'plotBackgroundColor'=> null,
            // 'plotBorderWidth'=> null,
            // 'plotShadow'=> false
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