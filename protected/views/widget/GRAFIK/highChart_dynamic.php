<?php $this->layout='column2';?> 
<?php
$this->pageTitle=Yii::app()->name . ' - HighChart Dynamic';
$this->breadcrumbs=array('mytemplate/HighChart_dynamic',);
?>
<?php $this->renderPartial('grafik/_menu'); ?>

<h1><small>HighChart Dynamic</small></h1>
<a href="http://api.highcharts.com/highcharts#chart.events" target="_blank" style="float:right">Highchart Events Config</a> <br>

<div class="view2">
<b class="badge"> Sample "events function"</b><br>
	<code>addSeries, click, load, redraw, selection</code><br>
	<code>"load": "js:function(event) { 	alert ("The chart Loaded" + event ); }", </code><br>
	<code>"redraw": "js:function(event) { alert ("The chart was just redrawn" + event ); }"</code><br>
	
	<b class="badge"> Note :</b>
	<ul>
	<li>Untuk penggunaan  <code>events function</code> sebaik config option yg digunakan pake format <code>JSON</code> ( saat define fungsi error coz ga pake tanda kutip )</li>
	<li> Update title : <code>chart.setTitle({text: "New Title"});</code> OR <code>chart.title = {text:'New Title'};</code></li>
</div>

<!-------------------------------------------------------------------------------------------------------------------------------------------------------------------->
<?php Yii::app()->sc->setStart(__LINE__);  ?>

<div id="chart_container" style="width: 400px; height: 300px; margin: 0 auto; float:left"></div> <!--container-->

<?php
$this->Widget('ext-coll.grafik.highcharts301.HighchartsWidget', array(	
     'options'=>'{
        "title": { "text": "Fruit Consumption" },
		"credits": { enabled: false },
		"chart": {
			 "renderTo" : "chart_container",
			 "type" : "pie",
			 "events":{
				"load": "js:function(event) { alert("The chart Loaded"); var items=fecth_array(event); $("#result").html( "<ul>" + items + "</ul>");  }",
				"redraw": "js:function(event) { 		/*alert(event); */
					var items = fecth_array( event );
					$("#result").html( "<ul>" + items + "</ul>");
				}",
			},
		},
        // "xAxis": {
           // "categories": ["Apples", "Bananas", "Oranges"]
        // },
        "yAxis": {
           "title": { "text": "Disk Use" }
        },
		"tooltip": {
			pointFormat:  "<b>{point.y}</b> (<i>{point.percentage}%</i>)",
           	percentageDecimals: 0
		},
		"plotOptions": {
                pie: {
                    allowPointSelect: true,
                    cursor: "pointer",
                    dataLabels: {
                        enabled: true,
                        color: "#000000",
                        connectorColor: "#000000"
                       // formatter: function() {
                        //    return "<b>"+ this.point.name +"</b>: "+ this.percentage +" %";
                        //}
                    },
                    showInLegend: true
                }
            },
		 "series": [{
               // type: "pie",
                name: "System Disk C",
                data: [
					["Disk Use", 100  ],
					 {
                        name: "BMS DB",
                        y: 20,
                        sliced: true,
                        selected: true
                    },
					["Disk Free", 50  ]
                ]
            }]
		
     }'
  ));
?>

<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>

<div class="tpanel right">
	<div class="toggle btn"><?php echo Yii::t('ui','View Code'); ?></div>
	<div class='scroll'><?php Yii::app()->sc->renderSourceBox(); ?></div>
</div>
	
<div class="clear"></div>

<!-------------------------------------------------------------------------- ACTION BUTTON--------------------------------------------------------------->
<?php Yii::app()->sc->setStart(__LINE__);  ?>

<?php
# line, spline, area, areaspline, column, bar, pie and scatter, gauge,  // 'arearange', 'areasplinerange', 'columnrange
echo CHtml::dropDownList('pie', 'chart Type', 
	array( 0=>'-Pager Style-',  'line'=>'line', 'spline'=>'spline', 'area'=>'area', 'areaspline'=>'areaspline', 'bar'=>'bar', 'column'=>'column',  'pie'=>'pie', 'scatter'=>'scatter', 'gauge'=>'gauge' ),
		array(
			'id'=>'chart_type',
			'class'=>'left',
			'style'=>'width:70px;',
			//'onchange'=>"$.fn.yiiListView.update('user-list', { data:{ pager_style: $(this).val() } } )",
			'options'=> array( 0 =>array('disabled'=>true, 'label'=>'-Pager Style-') ),
		));
?>
  
<span id="update_series" class="btn left" style="margin-left:2px"> Update Chart Series</span>

<span id="add_series" class="btn left" style="margin-left:2px"> Add Chart Series</span>
 
<span id="chart_option" class="btn left" style="margin-left:2px"> show chart Opt.</span>

<span id="stop_interval" class="btn left" value="1" style="margin-left:2px">Start Interval</span>
<?php echo CHtml::textField('state', 0, array('id'=>'state', 'disabled'=>'disabled', 'style'=>'width:15px')); ?>

 <!-------------------------------------------------------------------------- REGISTER SCRIPTS --------------------------------------------------------------->
 <?php
 cs()->registerScript( 'test_dynamic', "
	var interval_id =0;
 	$('#stop_interval').click( function(){  		alert( $('#chart_container').highcharts() );
		var state = parseInt( $('#state').val() );	alert(state);
		
		if(state==0) {
			$('#state').val(1);
			$(this).text('Stop Interval');
			interval_id = setInterval(function() { requestData(); }, 3000);												
		}
		else {			
			$('#state').val(0);
			$(this).text('Start Interval');
			clearInterval(interval_id);	//alert(interval_id);
		}
	});
	
	// button (Update Series) ---------------------------------------------------
	$('#update_series').click(function() {
		//var seri = chart_gw.series[0];	//alert( seri);
		//seri.points[0].update(400);	//single data
		//seri.update( { data: [216.4, 194.1, 95.6] });	//array data	
		
		requestData();		
	});
	
	function requestData() {
		var chart_gw = $('#chart_container').highcharts();
		$.ajax({
			type: 'get',
			url: 'http://localhost/yii/yiiTest/index.php/mytemplate/ReqData_dynamic',
			dataType: 'json',
			success: function(data) {   //alert(data.data);
				//series.addPoint(data.nilai, true, true);
				var seri = chart_gw.series[0];
				seri.update(data);
			}
		});			
	}
	");
 ?>
 
<?php
$cs = Yii::app()->getClientScript();  
$cs->registerScript(
	'load_chart',        //ID that uniquely identifies this piece of JavaScript code
	"
	//var chart_gw = chart;	//sebenernya ga usah di define lagi. default : 'chart'
	var chart_gw = $('#chart_container').highcharts();
	
	// funsi select type chart ------------------------------------------------------
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
				}, false);    
				series.remove();
            } 
			catch (e) { alert(newType & ': ' & e); }
        }
    }
	
	// button ( Chart Options ) --------------------------------------------------------------------
	$('#chart_option').click( function(){  	//alert( Highcharts.Chart() );
		var items = fecth_array( chart_gw );
		$('#result').html( '<ul>' + items + '</ul>');
	});
	
	// selection change type ----------------------------------------------------------------------------------------
	$('#chart_type').change(function() {
		alert(chart_gw.options.chart.type); 		//alert( $.chart.options);
		changeType(chart, chart.series, this.value);
	});
	
	// button ( add new series ) -----------------------------------------------------
    $('#add_series').click(function() {		//alert(chart_gw.series[0].data[0]); 
        chart_gw.addSeries({
            data: [216.4, 194.1, 95.6],
			type: $('#chart_type').val()
        });
		
		var items = fecth_object( chart_gw.series[0].data );
		$('#result').html( '<ul>' + items + '</ul>');
       //$('#add_series').unbind('click');
    });
	
	function fecth_array( arr) {	
		var items=[];
		var x =1;
		$.each( arr, function(key, val) {			
			var kelas = 'toggle'+x;
		
			//if($.isArray(val) ) { 
			//var arr2=['seriesGroup', 'xAxis', 'yAxis', 'series']
			//if( $.inArray('seriesGroup', arr2) !== -1) {alert(\"test\"); }
			
			 if( val=='[object Object]' && $.inArray( key, ['seriesGroup', 'xAxis', 'yAxis', 'series', 'options'] ) !== -1 ) { 
				items.push( '<small> <li class=\'txtHead  txtCursor\' onClick=$(\".'+kelas+'\").toggle(); > ('+ x +')' + key + ' : ' + val + '</li> <ul class='+kelas+' style=\'display:none\'>' );
				fecth_object( val, items, x );			//alert('isArray!'); 
				items.push('</ul></small>');
			}
			else { items.push( '<li> <b>' + key + ' :</b> ' + val + '</li>'); }
			x++;
		});
		return items;
	}
	
	function fecth_object( obj, items=[], index=1 ) {
		var i =1;
		var idx = index +'-';
		
		$.each( obj, function(key, val) {
			var kelas = 'toggle-'+index;
			index = idx + i;
			//if($.isArray(val) ) { items.push(' <li class=\'txtHead  txtCursor\' onClick=$(\".'+kelas+'\").toggle(); > ('+ index +')' + key + ' : ' + val + '</li>' );}
			if( val=='[object Object]' ) { 			
				items.push(' <li class=\'txtHead  txtCursor\' onClick=$(\".'+kelas+'\").toggle(); > ('+ index +')' + key + ' : ' + val + '</li> <ul class='+kelas+' style=\'display:none\'>' );
				$.each( val, function(x, y) {
					items.push( '<li> <b>' + x + ' :</b> ' + y + '</li>'); 
				});
				items.push('</ul>');
			}
			else { items.push( '<li> <b>' + key + ' :</b> ' + val + '</li>'); }
			i++;
		});		
		return items;
	}
	
	// get data via ajax -------------------------------------------------
	 $('#button2').click(function() {
        $.get('data.php', function(data) {
			chart.series[0].setData(data);
        });
    });
	"
	,CClientScript::POS_LOAD      //POS_HEAD, POS_BEGIN, POS_END, POS_LOAD, POS_READY
);
?>

<div id="result" class="view2" style=" overflow:scroll;">.....result array config chart....</div>

<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>

<!---------------------------------------------------- VIEW CODE --------------------------------------------->
<div class="tpanel right">
	<div class="toggle btn"><?php echo Yii::t('ui','Dynamic Code'); ?></div>
	<div class='scroll'><?php Yii::app()->sc->renderSourceBox(); ?></div>
</div>

  
