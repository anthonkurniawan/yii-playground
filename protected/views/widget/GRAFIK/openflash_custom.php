<?php $this->layout='column1';?> 
<style>
.container {width:1200px; margin:0 auto; overflow:auto}  /*change width page*/
</style>

<?php
$this->pageTitle=Yii::app()->name . ' - Open Flash Chart';
$this->breadcrumbs=array('Open Flash Chart',);
?>

<a href="http://openflashchart.com" target="_blank">openflashchart site</a><br>


<div class="view2" style="width:1060px">
<div style="float:left;">
<b>Pie</b><br>
<?php
$data['1']['Day']['date'] = 'October \'09';
$data['1']['Day']['count'] = '123';
$data['2']['Day']['date'] = 'November \'09';
$data['2']['Day']['count'] = 345;
$data['3']['Day']['date'] = 'December \'09';
$data['3']['Day']['count'] = 500;
 
 $data2 = array(3, 4, 5, 4, 3, 3, 2.5);

//$data2 = array(2,3,4,new pie_value(6.5, "hello (6.5)") ) ;

// Creating an Yii Extension component
$flashChart = Yii::createComponent('ext-coll.grafik.openflashchart2.EOFC2');
 
//$flashChart->loading = "alert('ready');" ;
$flashChart->begin();

//$flashChart->setData(array(3, 4, 5, 4, 3, 3, 2.5));
$flashChart->setData($data);

$flashChart->setTitle('pie title','{color:#880a88;font-size:15px;padding-bottom:24px;}');	#setTitle($title_text, $style = '')
//$flashChart->setLabelsPath('<a>');
$flashChart->setLabelsPath('default.{n}.Day.date');	#must
$flashChart->setNumbersPath('{n}.Day.count');

//$flashChart->setToolTip('#val#%'); #atau pada "renderData-pie"	#setToolTip($tooltip = '', $options = array())
 
 #setBgColour($colour)
 #  am()  Merge a group of arrays - return array All array parameters merged into one
 
 # setLegend($axis, $title, $style = '')
//$flashChart->setLegend('x','Dato');
//$flashChart->setLegend('y','Skritt', '{color:#AA0aFF;font-size:12px;}');

#  axis($axis, $options = array(), $labelsOptions = array()) optional : if not set (defaulr will be otomatis )
//$flashChart->axis('x', array('tick_height' => 10,'3d' => -10) );
//$flashChart->axis('y', array('range'=>array(0,50,5), 'tick_length'=>15) );
//$flashChart->axis('x',array('labels'=>array('Things','To','Do')),array('colour'=>'#aaFF33', 'vertical'=>true)); 

//$flashChart->setNumbersPath('{n}.Day.count'); #setNumbersPath($path, $datasetName = 'default')
//$flashChart->setLabelsPath('default.{n}.Day.date');	#setLabelsPath($path)

//$flashChart->axis('y',array('range' => array(0, 100, 10)));
//$flashChart->setStackColours(array('#0000ff','#ff0000','#00FF00'));	#setStackColours($colours = array())

# rightAxis($options = array())
# setRadarAxis($options = array(), $labels = array())
# setRadarSpokes($spokes, $colour = null)

# pie($options = array(), $datasetName = 'default', $chartId = null)
//$flashChart->renderData('pie'); #basic
//$flashChart->renderData('pie', array('animate'=>false) );
$flashChart->renderData('pie', array(
	#'values'=>	,
	'animate'=>false,
	#'start_angle'=>	,
	'tooltip'=>' <a>test</a> #val# of #total#<br>#percent# of 100%' ,  //show value of total
	//'colours' =>"#1CCCC",
	//'colours' =>array("#d01f3c","#356aa0","#C79810"),
	'alpha'=>0.6,
	//'start_angle'=>35	#efek picture aja
	

	), 
	"default",  //default value 
	'testID'	//chart id	(jadi nya : #chart_testID)
);

$flashChart->render(350, 200);
?>
</div>

<div style="float:right; width:700px" >
<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP', 'lineNumberStyle'=>'table', 'showLineNumbers'=>1, )); ?>
$flashChart = Yii::createComponent('ext-coll.grafik.openflashchart2.EOFC2');
 
$flashChart->begin();
$flashChart->setData(array(3, 4, 5, 4, 3, 3, 2.5));

$flashChart->setTitle('pie title','{color:#880a88;font-size:15px;padding-bottom:20px;}');
$flashChart->setNumbersPath('{n}.Day.count');
$flashChart->setLabelsPath('default.{n}.Day.date');

//$flashChart->renderData('pie'); #basic
//$flashChart->renderData('pie', array('animate'=>false) );
$flashChart->renderData('pie', array(
   //'colours' =>"#1C9E05",
  // 'colours' =>'#FF368D',  #def: array("#d01f3c","#356aa0","#C79810");
   'alpha'=>0.6,
   //'start_angle'=>35	#efek picture aja
   'tooltip'=>' #val# of #total#<br>#percent# of 100%' ,  //show value of total
	)
);
$flashChart->render(350, 200);
<?php $this->endWidget(); ?>
</div>
</div><!--view2-->

<!------------------------------------------------------------------------------------------>
<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP', 'lineNumberStyle'=>'table', 'showLineNumbers'=>1, )); ?>
var data_fe0efe13583157ccbfb5216af6987921 = {
	"elements":[{"type":"pie","colours":"{color:blue;}","border":2,"alpha":"0.6","tip":" #val# of #total#<br>#percent# of 100%","values":[3,4,5,4,3,3,2.5]}],
	"title":{"text":"pie title","style":"{color:#880a88;font-size:15px;padding-bottom:20px;}"},
	"bg_colour":"#ffffff"
}; 

function get_data_fe0efe13583157ccbfb5216af6987921() { 
	return JSON.stringify(data_fe0efe13583157ccbfb5216af6987921); 
}

swfobject.embedSWF("/yii/yiiTest/assets/9a9c4524/open-flash-chart.swf",
	"chart_fe0efe13583157ccbfb5216af6987921","350","200","9.0.0","",
	{"get-data":"get_data_fe0efe13583157ccbfb5216af6987921"}
);
<div id="chart_fe0efe13583157ccbfb5216af6987921"></div>

 The tooltip text can contain these magic variables, they are replaced with

    #val# - the number value of the slice
    #total# - the total of all the slices
    #percent# - the value as a percent
    #label# - if you have passed in a label, the tooltip can contain it. This is useful if you set 'nolabel' to true, the pie chart will fill the area, but you can still display a unique label for each slice.
    #radius# - to help figure out a good radius when you want to fix it. 
<?php $this->endWidget(); ?>