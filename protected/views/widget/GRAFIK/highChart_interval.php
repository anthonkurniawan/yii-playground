<?php $this->layout = 'column2'; ?> 
<?php
$this->pageTitle = Yii::app()->name . ' - HighChart Date Interval';
$this->breadcrumbs = array('mytemplate/HighChart_interval',);
?>

<?php $this->renderPartial('grafik/_menu'); ?>

<h1><small>HighChart Interval with ajax Load</small></h1>
<a href="http://api.highcharts.com/highcharts#chart" target="_blank" style="float:right">Highchart Config</a> <br>

<div class="view2">
    <b class="badge"> Sample "events function"</b><br>
    <code>addSeries, click, load, redraw, selection</code><br>
    <code>"load": "js:function(event) { 	alert ("The chart Loaded" + event ); }", </code><br>
    <code>"redraw": "js:function(event) { alert ("The chart was just redrawn" + event ); }"</code><br><br>

    <b class="badge"> Note :</b>
    <ul>
        <li>Untuk penggunaan  <code>events function</code> sebaik config option yg digunakan pake format <code>JSON</code> ( saat define fungsi error coz ga pake tanda kutip )</li>
        <li> Update title : <code>chart.setTitle({text: "New Title"});</code> OR <code>chart.title = {text:'New Title'};</code></li>
        <li>untuk date interval data from ajax call, pada array date nya harus di convert dulu ke milisecond <code>strtotime</code> 
            dan timezone nya harus di set ke UTC <code>date_default_timezone_set('UTC'); </code></li>
</div>
<!--
<script type="text/javascript" src="http://localhost/js/jquery/jquery-min.js"></script>
<script src="http://localhost/js/demo/chart/Highcharts-3.0.1/js/highcharts.js"></script>
<script src="http://localhost/js/demo/chart/Highcharts-3.0.1/js/modules/data.js"></script>
<script src="http://localhost/js/demo/chart/Highcharts-3.0.1/js/modules/exporting.js"></script>
-->
<!-------------------------------------------------------------------------------------------------------------------------------------------------------------------->
<?php Yii::app()->sc->setStart(__LINE__);  ?>

<div id="chart_container" style="width: 700px; height: 400px; margin: 0 auto; float:left"></div> 

<?php
$this->Widget('ext-coll.grafik.highcharts301.HighchartsWidget', array(
    'options' => '{
		title: { text: "Sample Interval 1 month and add new series "},
		chart: {
			 renderTo : "chart_container",
			 events:{
				//load: "js:add_data()",
				//load: "js:req_data()",
			},
		},		
		 xAxis: {
		    type: "datetime",
			 tickInterval: 2419200000, // 1 month  7 * 24 * 3600 * 1000, // one week
			 tickWidth: 0,
			gridLineWidth: 1,
			labels: {
				align: "left",
				x: 3, y: -3
			}	
        },
		 series: [
			{
			name: "Data Series",
			//data:data,
			//data: "js:add_data()",
			//data: [[1354406400000,2],[1354838400000,4],[1362182400000,273],[1362268800000,276],[1362355200000,3],[1363478400000,2]] ,
			data:' . $data . '
			}
        ]	
     }'
));
?>

<!------------------------------------------ ACTION BUTTON---------------------------------------->
<?php dump($data); ?><br>

<!--<button id="button">Add series</button><br>-->
<?php echo CHtml::button('view chart options', array('id' => 'btn_chart_options')); ?>
<?php echo CHtml::button('refresh', array('id' => 'btn_refresh')); ?>
<?php echo CHtml::button('add series', array('id' => 'btn_add')); ?><br><br>

<div id="result" class="view2" style=" overflow:scroll;">.....result array config chart....</div>

<!----------------------------------------- REGISTER SCRIPTS --------------------------------------->
<?php
$cs = Yii::app()->getClientScript();
$cs->registerScript(
        'load_chart2', //ID that uniquely identifies this piece of JavaScript code
        "
	var chart_gw = chart;	//sebenernya ga usah di define lagi cukup 'chart'
	
	//REQUEST DATA CHART
	function req_data() {	
		$.ajax({
			url: 'http://127.0.0.1/yii/yiiTest/index.php/mytemplate/req_data_group',
			//url: 'http://127.0.0.1/yii/yiiTest/index.php/mytemplate/req_data',
			//'data':$(this).serialize(),
			//data: data,
			//'type':'post',
			//dataType:'json',

			success: function(data){	alert(data);
				chart.series[0].data = data;
				series = chart.series[0];
				
				series.chart.addSeries({
					yaxis: series.yaxis,
                    name: series.name,
                    color: series.color,
                    data: series.options.data
                },
                false);
			},
		});
	}  

	//------------------------------------------------------------------------
	function add_data() {			//alert(chart);
		chart.addSeries({
            name: 'new series',
			data: [
						[1349395200000,188.15],[1355270400000,200.36],[1358208000000,240.39],[1365984000000,170.39],[1376524800000,270.39]
					] 
				//type: $('#chart_type').val()
        });
	}
	
	//------------------------------------------------------------------------
	function view_options() {			//alert(chart);
		var items=[];
		$.each( chart_gw, function(key, val) {			//alert(key);
			items.push('<li><b>'+ key +' :</b> ' + val + '</li>');				
		});	//alert(items);
		$('#result').append( '<ul>' + items + '</ul>');
	}
	
	var chart_gw = chart;	//sebenernya ga usah di define lagi cukup 'chart'
	
	$('#btn_chart_options').click( function(){  	//alert( chart); 	
		view_options();
	});	
	
	// activate the button ( add new series ) --------------------------------------------------------------------
    $('#btn_add').click(function() {		
		alert('existing series data :' + chart_gw.series[0].data); 
		alert('run add data');	
		add_data();
    });
	"
        , CClientScript::POS_LOAD      //POS_HEAD, POS_BEGIN, POS_END, POS_LOAD, POS_READY
);
?>

<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>

<div class="tpanel right">
	<div class="toggle btn"><?php echo Yii::t('ui','View Code'); ?></div>
	<div class='scroll'><?php Yii::app()->sc->renderSourceBox(); ?></div>
</div>

<div class="tpanel right">
	<div class="toggle btn"><?php echo Yii::t('ui','Controller Code'); ?></div>
	<div><?php $this->render_script(array('mytemplate/highChart_interval') ) ; ?></div>
</div>

<!------------------------------------------------------------------ VIEW REGISTERED SCRIPTS ---------------------------------------------------------------------------------->
<div class="tpanel view2"> 
    <b class="toggle btn"><?php echo Yii::t('ui', 'View Registered Scripts'); ?></b>
    <?php $this->beginWidget('CTextHighlighter', array('language' => 'JAVASCRIPT', 'tabSize' => 1)); ?>
    <?php print_r(Yii::app()->getClientScript()->scripts); ?>
    <?php $this->endWidget(); ?>
</div>

<pre>
 
 KESIMPULAN : GA BISA jalanin fungsi dengan "events:load fungsi ajax" coz chart nya sudah di render, 
 JADI UTK LOAD VIA AJAX LOAD HARUS SPERTI INI :
 
 var HCChartName = new Highcharts.Chart({ ... });

Assuming that you are using jQuery, you could fetch the JSON file using a AJAX call like this:

$.ajax({
url: url,
dataType: 'json',
data: parameterData, // parameters for the ajax call
success: function(data){
// At this stage 'data' represents the JSON object returned
// Now all you have to do is
HCChartName.series[0].data = data;
// however for this assignment to work directly, you will need to rename the JSON object properties 
//to 'x' and 'y' as that corresponds to one of the default point implementations provided by highcharts
}
});


<!--	
<div id="container3" style="width: 700px; height: 400px; margin: 0 auto; float:left"></div>

//data: [[1354406400000,2],[1354838400000,4],[1362182400000,273],[1362268800000,276],[1362355200000,3],[1363478400000,2]] 

<script type="text/javascript">
$(function () {
	//$.getJSON('http://localhost/js/demo/chart/Highcharts-3.0.1/examples/data.php', function(data) { 	alert('test');

		$('#container3').highcharts({
			title: { text: 'Sample Interval on array data'},
			xAxis: {
				type: 'datetime',
				tickInterval: 7 * 24 * 3600 * 1000, // one week
				tickWidth: 0,
				gridLineWidth: 1,
				labels: {
					align: 'left',
					x: 3, y: -3
				}	
			},
			series: [
				{
				name: 'date2',
				//data: data,
				 data: [[1362096000000,66.17],[1362441600000,68.15],[1363046400000,69.36],[1363305600000,70.39]] 
				//data: [[1362096000000,66.17,'test1'],[1362441600000,68.15,'test1'],[1363046400000,69.36,'test1'],[1363305600000,70.39,'test1']] 
				//data: [[1354406400000,2],[1354838400000,4],[1362182400000,273],[1362268800000,276],[1362355200000,3],[1363478400000,2]] 
				},	
			]
		});
		
	//});
});
</script>
-->
</pre>