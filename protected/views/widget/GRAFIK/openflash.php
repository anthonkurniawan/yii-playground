<?php $this->layout='column1';?> 
<style>
.container {width:1200px; margin:0 auto; overflow:auto}  /*change width page*/
</style>

<?php
$this->pageTitle=Yii::app()->name . ' - Open Flash Chart';
$this->breadcrumbs=array('Open Flash Chart',);
?>

<a href="http://openflashchart.com" target="_blank">openflashchart site</a> |
<a href="http://teethgrinder.co.uk/open-flash-chart-2/tutorial.php" target="_blank">openflashchart tutorial</a>
<br>

<!---------------------------------------------------------------------------------------->

<!---------------------------------------------------------------------------------------->
<div class="view2" style="width:1060px">
<div style="float:left;">
<b>Minimum with 1 datasets</b><br>
<?php
// Creating an Yii Extension component
$flashChart = Yii::createComponent('ext-coll.grafik.openflashchart2.EOFC2');
 
// Minimum usage. You will always need at least this.
$flashChart->begin();
$flashChart->setData(array(1,2,2,3,5,6,1,9,6,4,5,6,7,8,0,8,2,2,1,9));
$flashChart->renderData('line');
$flashChart->render(350, 200);
?>

<?php //print_r(array(1,2,2,3,5,6,1,9,6,4,5,6,7,8,0,8,2,2,1,9)); ?>
</div>

<div style="float:right; width:700px" >
<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP', 'lineNumberStyle'=>'table', 'showLineNumbers'=>1, )); ?>
// Creating an Yii Extension component
$flashChart = Yii::createComponent('ext-coll.grafik.openflashchart2.EOFC2');
 
// Minimum usage. You will always need at least this.
$flashChart->begin();
$flashChart->setData(array(1,2,2,3,5,6,1,9,6,4,5,6,7,8,0,8,2,2,1,9));
$flashChart->renderData('line');
$flashChart->render(350, 200);
<?php $this->endWidget(); ?>
</div>
</div><!--view2-->

<!---------------------------------------------------------------------------------------->
<div class="view2" style="width:1060px">
<div style="float:left;">
<b>Minimum with 2 datasets</b><br>
<?php
$flashChart = Yii::createComponent('ext-coll.grafik.openflashchart2.EOFC2');
 
$flashChart->begin();
$flashChart->setData(array(1,2,4,8),'{n}',false,'Apples');
$flashChart->setData(array(3,4,6,9),'{n}',false,'Oranges');
$flashChart->renderData('line',array('colour'=>'green'),'Apples');
$flashChart->renderData('line',array('colour'=>'orange'),'Oranges');
$flashChart->render(350,200);
?>
</div>

<div style="float:right; width:700px" >
<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP', 'lineNumberStyle'=>'table', 'showLineNumbers'=>1, )); ?>
$flashChart = Yii::createComponent('ext-coll.grafik.openflashchart2.EOFC2');
 
$flashChart->begin();
$flashChart->setData(array(1,2,4,8),'{n}',false,'Apples');
$flashChart->setData(array(3,4,6,9),'{n}',false,'Oranges');
$flashChart->renderData('line',array('colour'=>'green'),'Apples');
$flashChart->renderData('line',array('colour'=>'orange'),'Oranges');
$flashChart->render(350,200);
<?php $this->endWidget(); ?>
</div>
</div><!--view2-->
<!---------------------------------------------------------------------------------------->
<div class="view2" style="width:1100px">
<div style="float:left;">
<b>Customizing your chart and setting labels</b><br>
<?php
$flashChart = Yii::createComponent('ext-coll.grafik.openflashchart2.EOFC2');
 
$flashChart->begin('Stepp Chart');
$flashChart->setTitle('Steppometer','{color:#880a88;font-size:15px;padding-bottom:20px;}');
 
$data['1']['Day']['date'] = 'October \'09';
$data['1']['Day']['count'] = '123';
$data['2']['Day']['date'] = 'November \'09';
$data['2']['Day']['count'] = 345;
$data['3']['Day']['date'] = 'December \'09';
$data['3']['Day']['count'] = 500;
 
$flashChart->setData($data);
$flashChart->setNumbersPath('{n}.Day.count');
$flashChart->setLabelsPath('default.{n}.Day.date');
 
$flashChart->setLegend('x','Dato');
$flashChart->setLegend('y','Skritt', '{color:#AA0aFF;font-size:12px;}');
 
$flashChart->axis('x',array('tick_height' => 10,'3d' => -10));
$flashChart->axis('y',array('range' => array(0,600,100)));
 
$flashChart->renderData();
$flashChart->render(400,200);
?>
</div>

<div style="float:right; width:700px" >
<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP', 'lineNumberStyle'=>'table', 'showLineNumbers'=>1, )); ?>
$flashChart = Yii::createComponent('ext-coll.grafik.openflashchart2.EOFC2');
 
$flashChart->begin('SteppChart');
$flashChart->setTitle('Steppometer','{color:#880a88;font-size:15px;padding-bottom:20px;}');
 
$data['1']['Day']['date'] = 'October \'09';
$data['1']['Day']['count'] = '123';
$data['2']['Day']['date'] = 'November \'09';
$data['2']['Day']['count'] = 345;
$data['3']['Day']['date'] = 'December \'09';
$data['3']['Day']['count'] = 500;
 
$flashChart->setData($data);
$flashChart->setNumbersPath('{n}.Day.count');
$flashChart->setLabelsPath('default.{n}.Day.date');
 
$flashChart->setLegend('x','Dato');
$flashChart->setLegend('y','Skritt', '{color:#AA0aFF;font-size:12px;}');
 
$flashChart->axis('x',array('tick_height' => 10,'3d' => -10));
$flashChart->axis('y',array('range' => array(0,600,100)));
 
$flashChart->renderData();
$flashChart->render(400,200);
<?php $this->endWidget(); ?>
</div>
</div><!--view2-->
<!---------------------------------------------------------------------------------------->
<div class="view2" style="width:1060px">
<div style="float:left;">
<b>Scatter</b><br>
<?php
$flashChart = Yii::createComponent('ext-coll.grafik.openflashchart2.EOFC2');
 
$data = array();
for( $i=0; $i<360; $i+=5 )
{
    $data[] = array(
        'x' => number_format(sin(deg2rad($i)), 2, '.', ''),
        'y' => number_format(cos(deg2rad($i)), 2, '.', '')
    );
}
 
$flashChart->begin();
$flashChart->setData($data);
$flashChart->setTitle('Scatter','{color:#880a88;font-size:15px;padding-bottom:20px;}');
$flashChart->axis('x',array('range' => array(-2,3,1)));
$flashChart->axis('y',array('range' => array(-2,2,1)));
$flashChart->renderData('scatter');
$flashChart->render(300,300);
?>
</div>

<div style="float:right; width:700px" >
<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP', 'lineNumberStyle'=>'table', 'showLineNumbers'=>1, )); ?>
$flashChart = Yii::createComponent('ext-coll.grafik.openflashchart2.EOFC2');
 
$data = array();
for( $i=0; $i<360; $i+=5 )
{
    $data[] = array(
        'x' => number_format(sin(deg2rad($i)), 2, '.', ''),
        'y' => number_format(cos(deg2rad($i)), 2, '.', '')
    );
}
 
$flashChart->begin();
$flashChart->setData($data);
$flashChart->setTitle('Scatter');
$flashChart->axis('x',array('range' => array(-2,3,1)));
$flashChart->axis('y',array('range' => array(-2,2,1)));
$flashChart->renderData('scatter');
$flashChart->render(300,300);
<?php $this->endWidget(); ?>
</div>
</div><!--view2-->

<!-------------------------------------------------------------------------------------------->
<div class="view2" style="width:1060px">
<div style="float:left;">
<b>Scatter</b><br>
<?php
$flashChart = Yii::createComponent('ext-coll.grafik.openflashchart2.EOFC2');
 
$data = array();
for( $i=0; $i<360; $i+=5 )
{
    $data[] = array(
        'x' => number_format(sin(deg2rad($i)), 2, '.', ''),
        'y' => number_format(cos(deg2rad($i)), 2, '.', '')
    );
}
 
$flashChart->begin();
$flashChart->setData($data);
$flashChart->setTitle('Scatter Line','{color:#880a88;font-size:15px;padding-bottom:20px;}');
$flashChart->axis('x',array('range' => array(-2,3,1)));
$flashChart->axis('y',array('range' => array(-2,2,1)));
$flashChart->renderData('scatter_line');
$flashChart->render(300,300);
?>
</div>

<div style="float:right; width:700px" >
<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP', 'lineNumberStyle'=>'table', 'showLineNumbers'=>1, )); ?>
$flashChart = Yii::createComponent('ext-coll.grafik.openflashchart2.EOFC2');
 
$data = array();
for( $i=0; $i<360; $i+=5 )
{
    $data[] = array(
        'x' => number_format(sin(deg2rad($i)), 2, '.', ''),
        'y' => number_format(cos(deg2rad($i)), 2, '.', '')
    );
}
 
$flashChart->begin();
$flashChart->setData($data);
$flashChart->setTitle('Scatter');
$flashChart->axis('x',array('range' => array(-2,3,1)));
$flashChart->axis('y',array('range' => array(-2,2,1)));
$flashChart->renderData('scatter');
$flashChart->render(300,300);
<?php $this->endWidget(); ?>
</div>
</div><!--view2-->

<!-------------------------------------------------------------------------------------------->
<div class="view2" style="width:1060px">
<div style="float:left;">
<b>Radar</b><br>
<?php
$flashChart = Yii::createComponent('ext-coll.grafik.openflashchart2.EOFC2');
 
$flashChart->begin('progress');
$flashChart->setTitle('Radar','{color:#880a88;font-size:15px;padding-bottom:20px;}');
$flashChart->setData(array(3, 4, 5, 4, 3, 3, 2.5));
$flashChart->setRadarAxis(array(
    'max' => 5,
    'steps' => 1,
    'colour' => '#EFD1EF',
    'grid_colour' => '#EFD1EF',
    'label_colour' => '#343434',
    'labels' => array('0', '1', '2', '3', '4', '5')));
$flashChart->setToolTip(null, array('proximity' => true));
$flashChart->renderData('radar', array(
    'halo_size' => 1,
    'width' => 1,
    'dot_size' => 2,
    'colour' => '#45909F',
    'type' => 'filled',
    'fill_colour' => '#45909F',
    'fill_alpha' => 0.4,
    'loop' => true)
);
$flashChart->render(300,300);
?>
</div>

<div style="float:right; width:700px" >
<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP', 'lineNumberStyle'=>'table', 'showLineNumbers'=>1, )); ?>
$flashChart = Yii::createComponent('ext-coll.grafik.openflashchart2.EOFC2');
 
$flashChart->begin('progress');
$flashChart->setTitle('Radar');
$flashChart->setData(array(3, 4, 5, 4, 3, 3, 2.5));
$flashChart->setRadarAxis(array(
    'max' => 5,
    'steps' => 1,
    'colour' => '#EFD1EF',
    'grid_colour' => '#EFD1EF',
    'label_colour' => '#343434',
    'labels' => array('0', '1', '2', '3', '4', '5')));
$flashChart->setToolTip(null, array('proximity' => true));
$flashChart->renderData('radar', array(
    'halo_size' => 1,
    'width' => 1,
    'dot_size' => 2,
    'colour' => '#45909F',
    'type' => 'filled',
    'fill_colour' => '#45909F',
    'fill_alpha' => 0.4,
    'loop' => true)
);
$flashChart->render(300,300);
<?php $this->endWidget(); ?>
</div>
</div><!--view2-->

<!----------------------------------------------------------------------------------------------------->
<div class="view2" style="width:1060px">
<div style="float:left;">
<b>SKETCH</b><br>
<?php
$data = null; // here we need to clean up any previous data for charts

// SKETCH - my favourite :)
$flashChart->begin('Sketch Chart');
$flashChart->setTitle('Sketchometer','{color:#880a88;font-size:15px;padding-bottom:20px;}');

$data['1']['Day']['date'] = 'Oct \'09';
$data['1']['Day']['count'] = '321';
$data['2']['Day']['date'] = 'Nov \'09';
$data['2']['Day']['count'] = 345;
$data['3']['Day']['date'] = 'Dec \'09';
$data['3']['Day']['count'] = 500;					//echo"<pre>";print_r($data);echo"</pre>";

$flashChart->setData($data);
$flashChart->setNumbersPath('{n}.Day.count');
$flashChart->setLabelsPath('default.{n}.Day.date');

$flashChart->setLegend('x','Dato');
$flashChart->setLegend('y','Skritt', '{color:#AA0aFF;font-size:12px;}');

$flashChart->axis('x',array('tick_height' => 10,'3d' => -10));
$flashChart->axis('y',array('range' => array(0,600,100)));

$flashChart->renderData('sketch', array(
	'colour' => '#81AC00',
	'outline_colour' => '#567300',
	'offset' => 5,
	'fun_factor' => 7,
));
$flashChart->render(200,300);
?>

<div class="scroll2" style="height:270px; width:280px">
<b> print data:<b> <br>
	<?php dump( $data ); ?> 
</div>
</div>

<div style="float:right; width:700px" >
<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP', 'lineNumberStyle'=>'table', 'showLineNumbers'=>1, )); ?>
$data = null; // here we need to clean up any previous data for charts

// SKETCH - my favourite :)
$flashChart->begin('Sketch Chart');
$flashChart->setTitle('Sketchometer','{color:#880a88;font-size:15px;padding-bottom:20px;}');

$data['1']['Day']['date'] = 'Oct \'09';
$data['1']['Day']['count'] = '321';
$data['2']['Day']['date'] = 'Nov \'09';
$data['2']['Day']['count'] = 345;
$data['3']['Day']['date'] = 'Dec \'09';
$data['3']['Day']['count'] = 500;					echo"<pre>";print_r($data);echo"</pre>";

$flashChart->setData($data);
$flashChart->setNumbersPath('{n}.Day.count');
$flashChart->setLabelsPath('default.{n}.Day.date');

$flashChart->setLegend('x','Dato');
$flashChart->setLegend('y','Skritt', '{color:#AA0aFF;font-size:12px;}');

$flashChart->axis('x',array('tick_height' => 10,'3d' => -10));
$flashChart->axis('y',array('range' => array(0,600,100)));

$flashChart->renderData('sketch', array(
	'colour' => '#81AC00',
	'outline_colour' => '#567300',
	'offset' => 5,
	'fun_factor' => 7,
));
$flashChart->render(200,300);
<?php $this->endWidget(); ?>
</div>
</div><!--view2-->

<!---------------------------------------------------------------------------------------->
<div class="view2" style="width:1060px">
<div style="float:left;">
<b>Minimum with 2 seperate charts</b><br>
<?php
$flashChart = Yii::createComponent('ext-coll.grafik.openflashchart2.EOFC2');
 
$flashChart->begin();
$flashChart->setData(array(3,4,6,9),'{n}',false,'Potatoes');
$flashChart->setTitle('Veggies','{color:#880a88;font-size:15px;padding-bottom:20px;}');
$flashChart->renderData('line',array('colour'=>'#cc3355'),'Potatoes');
$flashChart->render(200,200);
 
$flashChart->setTitle('Fruits','{color:#880a88;font-size:15px;padding-bottom:20px;}');
$flashChart->setData(array(1,2,4,8),'{n}',false,'Apples','dig');
$flashChart->setData(array(3,4,6,9),'{n}',false,'Oranges','dig');
$flashChart->renderData('line',array('colour'=>'#33cc33'),'Apples','dig');
$flashChart->renderData('line',array('colour'=>'#ccaa44'),'Oranges','dig');
$flashChart->render(200,300,'dig');
?>
</div>

<div style="float:right; width:630px" >
<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP', 'lineNumberStyle'=>'table', 'showLineNumbers'=>1, )); ?>
$flashChart = Yii::createComponent('ext-coll.grafik.openflashchart2.EOFC2');
 
$flashChart->begin();
$flashChart->setData(array(3,4,6,9),'{n}',false,'Potatoes');
$flashChart->setTitle('Veggies');
$flashChart->renderData('line',array('colour'=>'#cc3355'),'Potatoes');
$flashChart->render();
 
$flashChart->setTitle('Fruits');
$flashChart->setData(array(1,2,4,8),'{n}',false,'Apples','dig');
$flashChart->setData(array(3,4,6,9),'{n}',false,'Oranges','dig');
$flashChart->renderData('line',array('colour'=>'#33cc33'),'Apples','dig');
$flashChart->renderData('line',array('colour'=>'#ccaa44'),'Oranges','dig');
$flashChart->render(300,400,'dig');
<?php $this->endWidget(); ?>
</div>
</div><!--view2-->

<!---------------------------------------------------------------------------------------->
<div class="view2" style="width:1060px">
<div style="float:left;">
<b>Stacked Bars, multiple charts and dom id</b><br>
<?php
$flashChart = Yii::createComponent('ext-coll.grafik.openflashchart2.EOFC2');
 
$flashChart->begin();
$flashChart->setTitle('Stacked Bars','{color:#880a88;font-size:15px;padding-bottom:20px;}');
$flashChart->axis('y',array('range' => array(0, 100, 10)));
$flashChart->setStackColours(array('#0000ff','#ff0000','#00FF00'));
$flashChart->setData(array(
    array(65,15,20),
    array(45,15,40),
    array(51,29,20),
    array(15,35,50),
));
$flashChart->renderData('bar_stack');
$flashChart->render(200,300);
$flashChart->setData(array(1,3,2,4),'{n}',false,'stuff','chart2');
$flashChart->renderData('line',array(),'stuff','chart2');
$flashChart->render(190,400,'chart2','chartDomId');
echo '<div id="chartDomId"></div>';
?>
</div>

<div style="float:right; width:625px" >
<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP', 'lineNumberStyle'=>'table', 'showLineNumbers'=>1, )); ?>
$flashChart = Yii::createComponent('ext-coll.grafik.openflashchart2.EOFC2');
 
$flashChart->begin();
$flashChart->setTitle('Stacked Bars');
$flashChart->axis('y',array('range' => array(0, 100, 10)));
$flashChart->setStackColours(array('#0000ff','#ff0000','#00FF00'));
$flashChart->setData(array(
    array(65,15,20),
    array(45,15,40),
    array(51,29,20),
    array(15,35,50),
));
$flashChart->renderData('bar_stack');
$flashChart->render(300,300);
$flashChart->setData(array(1,3,2,4),'{n}',false,'stuff','chart2');
$flashChart->renderData('line',array(),'stuff','chart2');
$flashChart->render(200,400,'chart2','chartDomId');
echo '<div id="chartDomId"></div>';
<?php $this->endWidget(); ?>
</div>
</div><!--view2-->
<!---------------------------------------------------------------------------------------->



<div class="clear"></div>
<!---------------------------------------------------------------------------------------->
<pre>
ofc_area_base.php
ofc_area_hollow.php
ofc_area_line.php
ofc_bar_3d.php
ofc_bar_base.php
ofc_bar_filled.php
ofc_bar_glass.php
ofc_bar_sketch.php
ofc_bar_stack.php
ofc_hbar.php
ofc_line_base.php
ofc_line_dot.php
ofc_line_hollow.php
ofc_line_style.php
ofc_pie.php
ofc_radar_axis.php
ofc_radar_axis_labels.php
ofc_radar_spoke_labels.php
ofc_scatter.php
ofc_scatter_line.php
ofc_shape.php
ofc_title.php
ofc_tooltip.php

function bar_value( $top, $bottom=null )
	function set_colour( $colour )
		function set_tooltip( $tip )
</pre>