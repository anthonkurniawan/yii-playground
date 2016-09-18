<?php $this->layout = 'column2'; ?> 
<?php
$this->pageTitle = Yii::app()->name . ' - HighChart Custom';
$this->breadcrumbs = array('mytemplate/HighChart_line',);
?>

<?php $this->renderPartial('grafik/_menu'); ?>

<h1><small>HighChart Config  Custom ( with data model $data)</small></h1>
<a href="http://api.highcharts.com/highcharts" target="_blank" style="float:right">Highchart Config</a> 

<div class="view2">
    <div id="chart_container" style="width: 700px; height: 400px; margin: 0 auto; float:left"></div> <!--min-width: 400px;-->
    <?php
#$this->Widget('ext-coll.grafik.highcharts.HighchartsWidget', array(		#ver 2..
    $this->Widget('ext-coll.grafik.highcharts301.HighchartsWidget', array(#ver 3.0.1
        'options' => array(
            'title' => array('text' => 'Browser market shares at a specific website, 2010'),
            'subtitle' => array(
                'text' => 'SubTitle Sample',
            // 'align'=>'center', 
            // 'floating'=>false, 'verticalAlign'=>'top'
            ),
            #CHART CONFIG
            'chart' => array(
                'renderTo' => "chart_container",
                #Event listeners CONFIG . ( sample live data ajax req )
                //'events'=>array(  'load'=> 'requestData' ),  //function name
                //'defaultSeriesType'=> 'line',	# line, spline, area, areaspline, column, bar, pie and scatter  ( Alias of type. Defaults to line. )
                //'polar'=> true,
                'type' => 'line', # line, spline, area, areaspline, column, bar, pie and scatter, gauge,  // 'arearange', 'areasplinerange', 'columnrange
                'animation' => true, #Boolean
                'borderColor' => '#4572A7', # Defaults to #4572A7.
                'plotBorderColor' => '#C0C0C0', #Color - The color of the inner chart or plot area border. Defaults to #C0C0C0.
                'backgroundColor' => '#FCCCC5', #Defaults to #FFFFFF. ( MAIN BOX )
                //'plotBackgroundColor'=> '#FCFFC5',	# Color, gradient ( The background color or gradient for the plot area - GRAPH BOX )  
                'plotBackgroundColor' => array(#gradient sample
                    'linearGradient' => array(0, 0, 500, 500),
                    'stops' => array(
                        array(0, 'rgb(255, 255, 255)'),
                        array(1, 'rgb(200, 200, 255)')
                    )
                ),
            //'plotBackgroundImage'=> 'http://localhost/skies.jpg',	 # String ( The URL for an image to use as the plot background. 
            #To set an image as the background for the entire chart, set a CSS background image to the container element.)
            // 'plotBorderWidth'=> null,
            // 'plotShadow'=> false
            //'style'=>array( 'fontSize'=> '30px' ),
            ),
            #COLORS CONFIG
            'colors' => array('#2f7ed8', '#0d233a', '#8bbc21', '#910000', '#1aadce', '#492970', '#f28f43', '#77a1e5', '#c42525', '#a6c96a'),
            # default : array('#4572A7', '#AA4643', '#89A54E', '#80699B',  '#3D96AE',  '#DB843D',  '#92A8CD',  '#A47D7C',  '#B5CA92'),
            #X-AXIS, Y-AXIZ CONFIG		
            'xAxis' => array(
                //'categories' => array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'),
                'title' => array('text' => 'Title Bulan'),
            ),
            'yAxis' => array(
                'gridLineColor' => '#0d233a', #default :  #C0C0C0.
                'gridLineDashStyle' => 'ShortDashDot', #String - 'Solid', 'ShortDash', 'ShortDot', 'ShortDashDot', 'ShortDashDotDot', 'Dot', 'Dash', 'LongDash', 'DashDot', 'LongDashDot', 'LongDashDotDot'
                'labels' => array(
                    'formatter' => 'js:function() { return "<a href=\"#\" >" + this.value + " (with link)</a>"; }'
                ),
                'title' => array('text' => 'Title Jumlah'),
            ),
            #LEGEND CONFIG
            'legend' => array(
                'enabled' => true, #false to disable
                'title' => array('text' => 'Title Legend<br> <span style="font-size: 9px; color: #666; font-weight: normal">( Click to hide )</span>'), #available ver 3.0
                'align' => 'right',
                'layout' => 'vertical', //vertical
                'verticalAlign' => 'top',
                //'floating'=> true,	#default : false (set true kalo pengen di taro di dalam plot chart nya)
                //'backgroundColor'=> '#FFFFFF',
                'y' => 50,
                'x' => -10
            ),
            'series' => array(
                // array( 
                // # 'data'=> dapat berupa 'array', 'json', 'js function
                // 'data' => array(29.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4), 
                // 'type'=> 'column',
                // 'name'=> 'Series Type Column',
                // ),
                array(
                    //'data' => array(29.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4), 
                    'data' => $data, //data dummy ( sama sperti di atas )
                    //'data'=>$event, //$event ini di controller dalam format json jadi ga bisa (rubah ke format array)
                    //'data' => 'js:req_data()',  GA BISA COZ CHART NYA USADH DI RENDER DULUAN
                    'type' => 'line',
                    'name' => 'Series Type Line',
                    'pointPlacement' => 'between',
                ),
            ),
            #TOOLTIP CONFIG
            'tooltip' => array(
                #'valueSuffix'=> '�Kali',	//variable akhiran
                // 'formatter' => 'js:function(){ 
                // return "<a href=\"#\"> with link " + this.series.name + "</a>" 
                // }',	// return this.series.name; 
                //'formatter'=>'js:function() { return "<b>"+ this.point.name +"</b>: "+ this.percentage +" %"; }',

                'shared' => true,
                'useHTML' => true,
                'headerFormat' => '<small> point.key: {point.key}</small> <table border=\"1px\">', #point.key = xAxis ( categories )
                'pointFormat' => '<tr> <td>series.color</td> <td style=\"color: {series.color}\"> {series.color}: </td> </tr>
									<tr> <td>series.name</td> <td> {series.name}: </td></tr> 
									<tr> <td>point.x</td> <td style=\"text-align: right\"> <b>{point.x}</b> </td></tr>
									<tr> <td>point.y</td> <td style=\"text-align: right\"> <b>{point.y}</b> </td></tr>',
                'footerFormat' => '</table>',
            //'valueDecimals'=> 2,
            //xDateFormat: '%Y-%m-%d',
            ),
            #LABEL CONFIG
            //'labels'=>array('items'=>array('label')),
            #EXPORT CONFIG
            //'exporting' => array('enabled' => false),
            # Credit of higcharts CONFIG ( custom link)
            'credits' => array(
                'enabled' => true,
                'href' => $this->createUrl('site/index'),
                'text' => 'test link ke home.com',
                'position' => array(
                    'align' => 'right',
                    'x' => -10,
                    'verticalAlign' => 'bottom',
                    'y' => -10
                ),
                'style' => array(
                    'cursor' => 'pointer',
                    'color' => '#FFDD', #default : '#909090',
                    'fontSize' => '10px'
                ),
            ),
        )
            )
    );
    ?><div class="clear"></div>

    <?php
//$data2 = array(29.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4); 	dump($data2); 
//dump($date); 
    ?>

    <!-------------------------------------------------------------------------- TEST LINK --------------------------------------------------------------->
    <div id="result" class="view2"></div>

    <?php echo CHtml::link('view chart options ', '#', array('id' => 'link')); ?><br>

    <?php
    $cs = Yii::app()->getClientScript();
    $cs->registerScript('load_chart', //ID that uniquely identifies this piece of JavaScript code
            "
	$('#link').click( function(){  			//alert(chart.series[0].type); 
		var items=[];
		$.each(chart, function(key, val) {			//alert(key);
			items.push('<li><b>'+ key +' :</b> ' + val + '</li>');				
		});	//alert(items);
		
		$('#result').append( '<ul>' + items + '</ul>');
	});	
	
	//REQUEST DATA CHART
	function req_data() {	
		$.ajax({
			//url: 'live-server-data.php',
			url: 'http://127.0.0.1/yii/yiiTest/index.php/mytemplate/req_data',
		/*	success: function(point) {
				var series = chart.series[0],
					//shift = series.data.length > 20; // shift if the series is longer than 20
					shift = series.data; // shift if the series is longer than 20
					
				// add the point
				chart.series[0].addPoint(point, true, shift);
            
				// call it again after one second
				//setTimeout(req_data, 1000);    
			},	*/
			cache: false
		});
	}  
		
	", CClientScript::POS_LOAD      //POS_HEAD, POS_BEGIN, POS_END, POS_LOAD, POS_READY
    );
    ?>
</div>
addSeries({
data: [216.4, 194.1, 95.6, 54.4, 29.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5],
type: $('#chart_type').val()
});
<!---------------------------------------------------- VIEW CODE --------------------------------------------->
    <?php $this->renderPartial('grafik/_highChart_custom_adv'); ?>