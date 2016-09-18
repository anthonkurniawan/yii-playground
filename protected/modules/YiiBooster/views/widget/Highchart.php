<!--<style>.container{width:1000px}</style>-->
<?php $this->layout="column1"; ?>
<?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'links'=>array('Highchart'=>'#', ''),
    ));
?>


<!------------------------------------------------------ Editable Widgets--------------------------------------------------------------->
<h1><small>Highcharts</small></h1>
<a href="http://api.highcharts.com/highcharts" target="_blank" style="float:right">Highchart Config</a> <br>

<div class="well well-small">
highcharts.js, *theme*.js
</div>
 
 <?php
 $this->widget('bootstrap.widgets.TbHighCharts', array(
    'options'=>array(
        'title' => array('text' => 'Fruit Consumption'),
        'xAxis' => array(
           'categories' => array('Apples', 'Bananas', 'Oranges')
        ),
        'yAxis' => array(
           'title' => array('text' => 'Fruit eaten')
        ),
		
		'chart' => array(
			//'defaultSeriesType'=> 'bar',  //line, spline, area, areaspline, column, bar, pie and scatter
													//From version 2.3, arearange, areasplinerange and columnrange are supported with the highcharts-more.js component. 
													//Defaults to line.
			'type'=>'bar',										
			// 'legend'=>array(
				// 'layout'=> 'horizontal',   //vertical
				// 'floating'=> true,
				// 'backgroundColor'=> '#FFFFFF',
				// 'align'=> 'right',
				// 'verticalAlign'=> 'top',
				// 'y'=> 60,
				// 'x'=> -60
			// ),


		),
		'theme' => 'dark-blue',  #skies, dark-green, dark-blue, gray, grid, 
		
        'series' => array(
           array('name' => 'Jane', 'data' => array(1, 0, 4)),
           array('name' => 'John', 'data' => array(5, 7, 3))
        )
     )
  ));

 ?>
 
 <div class="tpanel"> <!--- load model ------->
	<button class="toggle txtHead"><?php echo Yii::t('ui','View Code'); ?></button>
<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP','tabSize'=>2));  ?> <!--- MODEL -->
 $this->widget('bootstrap.widgets.TbHighCharts', array(
    'options'=>array(
        'title' => array('text' => 'Fruit Consumption'),
        'xAxis' => array(
           'categories' => array('Apples', 'Bananas', 'Oranges')
        ),
        'yAxis' => array(
           'title' => array('text' => 'Fruit eaten')
        ),
		
		'chart' => array(
			//'defaultSeriesType'=> 'bar',  //line, spline, area, areaspline, column, bar, pie and scatter
													//From version 2.3, arearange, areasplinerange and columnrange are supported with the highcharts-more.js component. 
													//Defaults to line.
			'type'=>'bar',										
			// 'legend'=>array(
				// 'layout'=> 'horizontal',   //vertical
				// 'floating'=> true,
				// 'backgroundColor'=> '#FFFFFF',
				// 'align'=> 'right',
				// 'verticalAlign'=> 'top',
				// 'y'=> 60,
				// 'x'=> -60
			// ),
		),
		'theme' => 'dark-blue',  #skies, dark-green, dark-blue, gray, grid, 
		
        'series' => array(
           array('name' => 'Jane', 'data' => array(1, 0, 4)),
           array('name' => 'John', 'data' => array(5, 7, 3))
        )
     )
  ));
<?php $this->endWidget(); ?>
</div>

   