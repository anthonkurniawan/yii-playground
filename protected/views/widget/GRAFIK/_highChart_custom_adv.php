<style> .javascript-hl-main{font-size:75%} </style>

<div class="tpanel view2"> 
<b class="toggle btn" style="float:right"><?php echo Yii::t('ui','View Code'); ?></b>

<?php $this->beginWidget('CTextHighlighter',array('language'=>'JAVASCRIPT', 'lineNumberStyle'=>'table','tabSize'=>1  )); ?>
#THE TAG CONTAINER
<div id="chart_container" style="width: 800px; height: 400px; margin: 0 auto; float:left"></div> <!--min-width: 400px;-->

#THE CHART WIDGET
#$this->Widget('ext-coll.grafik.highcharts.HighchartsWidget', array(		#FOR ver 2.. ( ga ada buat custom legend )
$this->Widget('ext-coll.grafik.highcharts301.HighchartsWidget', array(		#FOR ver 3.0.1
   'options'=>array(
		'title' => array('text' => 'Browser market shares at a specific website, 2010'),
		'subtitle'=>array(
               'text'=> 'SubTitle Sample', 
			  // 'align'=>'center', 
			  // 'floating'=>false, 'verticalAlign'=>'top'
		),
		#CHART CONFIG
		'chart'=> array(
            'renderTo'=>"chart_container",
			
			#Event listeners CONFIG . ( sample live data ajax req )
			//'events'=>array(  'load'=> 'requestData' ),  //function name
			
			//'defaultSeriesType'=> 'line',	# line, spline, area, areaspline, column, bar, pie and scatter  ( Alias of type. Defaults to line. )
			//'polar'=> true,
			'type'=> 'line',	# line, spline, area, areaspline, column, bar, pie and scatter, gauge,  // 'arearange', 'areasplinerange', 'columnrange
			'animation'=> true,	#Boolean
			
			'borderColor'=> '#4572A7',	# Defaults to #4572A7.
			'plotBorderColor'=> '#C0C0C0', #Color - The color of the inner chart or plot area border. Defaults to #C0C0C0.

			'backgroundColor'=>  '#FCCCC5',	#Defaults to #FFFFFF. ( MAIN BOX )
			//'plotBackgroundColor'=> '#FCFFC5',	# Color, gradient ( The background color or gradient for the plot area - GRAPH BOX )  
			'plotBackgroundColor'=> array(	#gradient sample
                'linearGradient'=> array(0, 0, 500, 500),
                'stops'=> array(
                    array(0, 'rgb(255, 255, 255)'),
                    array(1, 'rgb(200, 200, 255)')
                )
            ),
			
			 # String ( The URL for an image to use as the plot background. 
			#To set an image as the background for the entire chart, set a CSS background image to the container element.)
			//'plotBackgroundImage'=> 'http://localhost/skies.jpg',	
			
            // 'plotBorderWidth'=> null,
            // 'plotShadow'=> false
			//'style'=>array( 'fontSize'=> '30px' ),
        ),
		
		#COLORS CONFIG
		'colors'=> array('#2f7ed8',  '#0d233a',  '#8bbc21',  '#910000',  '#1aadce', '#492970', '#f28f43', '#77a1e5', '#c42525', '#a6c96a'),
						# default : array('#4572A7', '#AA4643', '#89A54E', '#80699B',  '#3D96AE',  '#DB843D',  '#92A8CD',  '#A47D7C',  '#B5CA92'),
		
		#X-AXIS, Y-AXIZ CONFIG		
		'xAxis' => array(
			'categories' => array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'),
			'title'=>array( 'text'=> 'Title Bulan'),
		),
		'yAxis' =>array(
			'gridLineColor'=>'#0d233a',	#default :  #C0C0C0.
			#String-'Solid', 'ShortDash', 'ShortDot', 'ShortDashDot', 'ShortDashDotDot', 'Dot', 'Dash', 'LongDash', 'DashDot', 'LongDashDot', 'LongDashDotDot'
			'gridLineDashStyle'=>'ShortDashDot', 
			'labels'=>array(
				'formatter'=>'js:function() { return "<a href=\"#\" >" + this.value + " (with link)</a>"; }'  
            ),
			'title'=>array( 'text'=> 'Title Jumlah'),
		),
 
		#LEGEND CONFIG
		'legend'=>array(
			'enabled'=>true, #false to disable
			'title'=>array('text'=>'Title Legend<br> <span style="font-size: 9px; color: #666; font-weight: normal">(Click to hide)</span>' ),#available ver 3.0
			'align'=> 'right',
			'layout'=> 'vertical',   //vertical
			'verticalAlign'=> 'top',
			//'floating'=> true,	#default : false (set true kalo pengen di taro di dalam plot chart nya)
			//'backgroundColor'=> '#FFFFFF',
			'y'=> 50,
			'x'=> -10
		),
			
		'series' => array(
			array( 
				# 'data'=> dapat berupa 'array', 'json', 'js function
				'data' => array(29.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4), 
				'type'=> 'column',
				'name'=> 'Series Type Column',
			),
			array( 
				'data' => array(29.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4), 
				'type'=> 'line',
				'name'=> 'Series Type Line',
				'pointPlacement'=> 'between',
			),
		),
		
		#TOOLTIP CONFIG
		'tooltip'=> array(
			#'valueSuffix'=> '�Kali',	//variable akhiran
			// 'formatter' => 'js:function(){ 
				// return "<a href=\"#\"> with link " + this.series.name + "</a>" 
			// }',	// return this.series.name; 
			//'formatter'=>'js:function() { return "<b>"+ this.point.name +"</b>: "+ this.percentage +" %"; }',
			
			'shared'=> true,
            'useHTML'=> true,
            'headerFormat'=> '<small> point.key: {point.key}</small> <table border=\"1px\">',	#point.key = xAxis ( categories )
            'pointFormat'=>'<tr> <td>series.color</td> <td style=\"color: {series.color}\"> {series.color}: </td> </tr>
									<tr> <td>series.name</td> <td> {series.name}: </td></tr> 
									<tr> <td>point.x</td> <td style=\"text-align: right\"> <b>{point.x}</b> </td></tr>
									<tr> <td>point.y</td> <td style=\"text-align: right\"> <b>{point.y}</b> </td></tr>' ,
            'footerFormat'=> '</table>',
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
			'href'=>$this->createUrl('site/index'),
			'text'=>'test link ke home.com',
			'position'=> array(
				'align'=> 'right',
				'x'=> -10,
				'verticalAlign'=> 'bottom',
				'y'=> -10
			),
			'style'=> array(
				'cursor'=> 'pointer',
				'color'=> '#FFDD',		#default : '#909090',
				'fontSize'=> '10px'
			),
		),	
   )
)
);
<?php $this->endWidget(); ?>
</div>

<!-------------------------------------------------------------------------- JS RENDERED VIEW --------------------------------------------------------------->
<div class="tpanel view2"> 
<b class="toggle btn" style="float:right"><?php echo Yii::t('ui','Rendered JS Code'); ?></b>
<?php $this->beginWidget('CTextHighlighter',array('language'=>'JAVASCRIPT', 'lineNumberStyle'=>'table','tabSize'=>1  )); ?>
#RESULT RENDERED ON HTML
jQuery(window).on('load',function() {
	var chart = new Highcharts.Chart({
		'chart':{
			'renderTo':'chart_container',
			'type':'line',
			'animation':true,
			'borderColor':'#4572A7',
			'plotBorderColor':'#C0C0C0',
			'backgroundColor':'#FCCCC5',
			'plotBackgroundColor':{'linearGradient':[0,0,500,500],'stops':[[0,'rgb(255, 255, 255)'],[1,'rgb(200, 200, 255)']]}
		},
		'exporting':{'enabled':true},
		'title':{'text':'Browser market shares at a specific website, 2010'},
		'subtitle':{'text':'SubTitle Sample'},
		'colors':['#2f7ed8','#0d233a','#8bbc21','#910000','#1aadce','#492970','#f28f43','#77a1e5','#c42525','#a6c96a'],
		'xAxis':{'categories':['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'],'title':{'text':'Title Bulan'}},
		'yAxis':{
			'gridLineColor':'#0d233a',
			'gridLineDashStyle':'ShortDashDot',
			'labels':{'formatter':function() { return "<a href=\"#\" >" + this.value + " (with link)</a>"; }},
			'title':{'text':'Title Jumlah'}
		},
		'legend':{
			'enabled':true,
			'title':{'text':'Title Legend<br> <span style=\"font-size: 9px; color: #666; font-weight: normal\">( Click to hide )<\/span>'},
			'align':'right',
			'layout':'vertical',
			'verticalAlign':'top','y':50,'x':-10
		},
		'series':[
			{
			'data':[29.8999999999999986,71.5,106.4000000000000057,129.1999999999999886,144.,176.,135.5999999999999943,
				148.5,216.4000000000000057, 194.0999999999999943,95.5999999999999943,54.3999999999999986],
			'type':'column','name':'Series Type Column'
			},
			{
			'data':[29.8999999999999986,71.5,106.4000000000000057,129.1999999999999886,144.,176.,135.5999999999999943,
				148.5,216.4000000000000057,194.0999999999999943,  95.5999999999999943,54.3999999999999986],
			'type':'line','name':'Series Type Line','pointPlacement':'between'
			}
		],
		'tooltip':{
			'shared':true,
			'useHTML':true,
			'headerFormat':'<small> point.key: {point.key}<\/small> <table border=\\\"1px\\\">',
			'pointFormat':'<tr> <td>series.color<\/td> <td style=\\\"color: {series.color}\\\"> {series.color}: <\/td> 
				<\/tr>\r\n\t\t\t\t\t\t\t\t\t<tr> <td>series.name<\/td> <td> {series.name}: <\/td><\/tr> \r\n\t
				< tr> <td>point.x<\/td> <td style=\\\"text-align: right\\\"> <b>{point.x}<\/b> <\/td><\/tr>\r\n\t\t
				<tr> <td>point.y<\/td> <td style=\\\"text-align: right\\\"> <b>{point.y}<\/b> <\/td><\/tr>',
			'footerFormat':'<\/table>'
		},
		'credits':{
			'enabled':true,
			'href':'/yii/yiiTest/index.php/site/index?language=id',
			'text':'test link ke home.com',
			'position':{'align':'right','x':-10,'verticalAlign':'bottom','y':-10},
			'style':{'cursor':'pointer','color':'#FFDD','fontSize':'10px'}
		},

 <?php $this->endWidget(); ?>
</div>




 
 
 