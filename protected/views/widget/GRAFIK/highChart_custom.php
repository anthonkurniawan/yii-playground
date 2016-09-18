<?php $this->layout='column1';?> 
<?php
$this->pageTitle=Yii::app()->name . ' - HighChart';
$this->breadcrumbs=array('mytemplate/HighChart',);
?>

<style>
.container{width:1100px}
.php-hl-main {font-size:90% }
</style>

<h1><small>HighChart Custom </small></h1>
<a href="http://api.highcharts.com/highcharts" target="_blank" style="float:right">Highchart Config</a> <br>

<div class="view2">
<b class="badge">With link tooltip</b><br><br>

<div  id="chart1" style="width: 430px; height: 450px; margin: 0 auto; float:left"></div>
<?php
$this->Widget('ext-coll.grafik.highcharts.HighchartsWidget', array(
	'options'=>array(
		'title' => array('text' => 'Fruit Consumption'),
		'xAxis' => array(
			'categories' => array('Apples', 'Bananas', 'Oranges')
		),
		'yAxis' => array(
			'title' => array('text' => 'Fruit eaten')
		),
		'series' => array(
			array('name' => 'Jane', 'data' => array(1, 0, 4)),
			array('name' => 'John', 'data' => array(5, 7, 3))
		),
		#OPTIONAL
		'chart' => array(
			//'defaultSeriesType'=> 'bar',  //line, spline, area, areaspline, column, bar, pie and scatter
												//From version 2.3, arearange, areasplinerange and columnrange are supported with the highcharts-more.js component. 
												//Defaults to line.
			'type'=>'column',			
			'renderTo'=>'chart1',
			//'legend'=>array(
				// 'layout'=> 'horizontal',   //vertical
				// 'floating'=> true,
				// 'backgroundColor'=> '#FFFFFF',
				// 'align'=> 'right',
				// 'verticalAlign'=> 'top',
				// 'y'=> 60,
				// 'x'=> -60
			// ),
		),
		'tooltip' => array(
			'formatter' => 'js:function(){ return "<a href=\"#\"> with link " + this.series.name + "</a>" }'	// return this.series.name; 
		),
		'theme' => 'dark-blue',  #skies, dark-green, dark-blue, gray, grid, 
		'credits' => array('enabled' => false),	#disable credit of higcharts
		'exporting' => array('enabled' => false),	#disable export tools
   )
));
?>

<div class="scroll" style="float:right; width:600px; height: 450px" >
<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP', 'tabSize'=>2, )); ?>
$this->Widget('ext-coll.grafik.highcharts.HighchartsWidget', array(
	'options'=>array(
		'title' => array('text' => 'Fruit Consumption'),
		'xAxis' => array(
			'categories' => array('Apples', 'Bananas', 'Oranges')
		),
		'yAxis' => array(
			'title' => array('text' => 'Fruit eaten')
		),
		'series' => array(
			array('name' => 'Jane', 'data' => array(1, 0, 4)),
			array('name' => 'John', 'data' => array(5, 7, 3))
		),
		
		#OPTIONAL
		'chart' => array(
			//'defaultSeriesType'=> 'bar',  //line, spline, area, areaspline, column, bar, pie and scatter
												//From version 2.3, arearange, areasplinerange and columnrange are supported with the highcharts-more.js component. 
												//Defaults to line.
			'type'=>'bar',			
			'renderTo'=>'chart1',
			//'legend'=>array(
				// 'layout'=> 'horizontal',   //vertical
				// 'floating'=> true,
				// 'backgroundColor'=> '#FFFFFF',
				// 'align'=> 'right',
				// 'verticalAlign'=> 'top',
				// 'y'=> 60,
				// 'x'=> -60
			// ),
		),
		
		#CUSTOM TOOLTIP WITH LINK
		'tooltip' => array(
			'formatter' => 'js:function(){ return "<a href=\"#\"> with link " + this.series.name + "</a>" }'	// return this.series.name; 
		),
		
		'theme' => 'dark-blue',   #skies, dark-green, dark-blue, gray, grid, 
		'credits' => array('enabled' => false), 	#disable credit of higcharts
		'exporting' => array('enabled' => false), 	#disable export tools
   )
));
<?php $this->endWidget(); ?>
</div>

</div><!--view2-->
<!------------------------------------------------------------------------------------------------------------------->
<div class="view2">
<b class="badge"> sample custom2</b><br><br>

<div id="chart2" style="width: 430px; height: 430px; margin: 0 auto; float:left"></div>
<?php
$this->Widget('ext-coll.grafik.highcharts.HighchartsWidget', array(
   'options'=>array(
		'chart'=> array(
            'renderTo'=>'chart2',
            'plotBackgroundColor'=> null,
            'plotBorderWidth'=> null,
            'plotShadow'=> false
        ),
		'title' => array('text' => 'Browser market shares at a specific website, 2010'),
        'tooltip'=>array(
           'formatter'=>'js:function() { return "<b>"+ this.point.name +"</b>: "+ this.percentage +" % Of" + this.total; }'
		),
		#OPTIONAL
        'plotOptions'=>array(
            'pie'=>array(			
                'allowPointSelect'=> true,
                'cursor'=>'pointer',
                'dataLabels'=>array(
                    'enabled'=> true,
                    'color'=>'#000000',
                    'connectorColor'=>'#000000',
                    'formatter'=>'js:function() { return "<b>"+ this.point.name +"</b>:"+this.percentage +" %"; }'  
                )
            )
        ),
			
		'series' => array(
			array(
				'type'=>'pie',
				'name' => 'Browser share', 
				'data' => array(
					array('Firefox',45.0), array('opera',26.8), array('Safari',8.5), array('Opera',6.2), array('Others',0.7),
					array(
						'name'=>'Chrome',
						'y'=>12.8,
						'sliced'=>true,
						'selected'=>true
                    )
				)
			),
		)
 
   )
));
?>

<div class="scroll" style="float:right; width:600px; height: 450px" >
<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP', 'tabSize'=>2, )); ?>
$this->Widget('ext-coll.grafik.highcharts.HighchartsWidget', array(
	'options'=>array(
		'chart'=> array(
			'renderTo'=>'chart2',
			'plotBackgroundColor'=> null,
			'plotBorderWidth'=> null,
			'plotShadow'=> false
		),
		'title' => array('text' => 'Browser market shares at a specific website, 2010'),
		'tooltip'=>array(
			'formatter'=>'js:function() { return "<b>"+ this.point.name +"</b>: "+ this.percentage +" %"; }'
		),
		
		#OPTIONAL (TYPE chart here )
		'plotOptions'=>array(
			'pie'=>array(
				'allowPointSelect'=> true,
				'cursor'=>'pointer',
				'dataLabels'=>array(
					'enabled'=> true,
					'color'=>'#000000',
					'connectorColor'=>'#000000',
					'formatter'=>'js:function() { return "<b>"+ this.point.name +"</b>:"+this.percentage +" %"; }'  
				)
			)
		),
 
		'series' => array(
			array(
				'type'=>'pie','name' => 'Browser share', 
				'data' => array(
					array('Firefox',45.0),array('opera',26.8),array('Safari',8.5),array('Opera',6.2),array('Others',0.7),
					array(
						'name'=>'Chrome',
						'y'=>12.8,
						'sliced'=>true,
						'selected'=>true
					)
				)
			),
		)
	)
));
<?php $this->endWidget(); ?>
</div>

</div><!--view2-->

Note: You must provide a valid JSON string (e.g. double quotes) when using the second option. You can quickly validate your JSON string online using JSONLint.



