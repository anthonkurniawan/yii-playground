<?php 
//cs()->registerScriptFile( "../../js/gviz-api.js"); 
//cs()->registerScriptFile( "../../js/jsapi.js"); 
//dump( Yii::app()->bootstrap->registerAssetJs('highcharts/highcharts.js') ) ; 
?>  
<?php
	$products = Products::model()->findAll();
	$listData = CHtml::listData($products, 'item', 'price');
	
	echo "<b>Using listData :</b>"; dump($listData); 
	
	foreach ($listData as $key=>$value) {
		$data1[] = $key;
		$data2[] = (int)$value;
	}
?>

JQGrid
( easy-pie-chart )					<?php //echo Yii::app()->format->format('2,000,000','number') ;?><br>
											<?php echo number_format(2000000, 2, ',', ' -' ); ?> Three elements may be specified: "decimals", "decimalSeparator" and "thousandSeparator"

<?php $this->layout="column1"; ?>
<style>.container{width:1000px}</style>

<?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'links'=>array('Widget'=>'#', 'TbExtendedGridView'),
    ));
?>

<?php
$this->menu=array(
	array('label'=>'List Products', 'url'=>array('index')),
	array('label'=>'Create Products', 'url'=>array('create')),
);
?>
<div class="page-header">
	<a href="http://yii-booster.clevertech.biz/extended-grid.html" target="_blank" class="pull-right">TbExtendedGridView Docs</a>
	<h1><small> TbExtendedGridView ( Extended TbGridView default )</small></h1>
</div>	

<!------------------------------- RENDER NOTE ---------------------------------->
<?php $this->renderPartial('_TbExtendedGridView_note'); ?> <div class="clear"></div> <hr>
<!------------------------------- SEARCH  -------------------------------->
<?php
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('yw2', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('crud_default/_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<!------------------------------------------------------ TABLE FROM YII-BOOSTER -------------------------------------->
<span class="label label-info">Sum Of Selected Hours</span>: <span id="hours">0</span>
<span class="label label-info">Cell Selected</span>: <span id="select">0</span>

<?php $gridColumns = array('proID', 'catID', 'supID', 'item', 'price', /*array('class'=>'bootstrap.widgets.TbButtonColumn', )*/ ); ?>
<?php
    $this->widget('ext.yiibooster-211.widgets.TbExtendedGridView', array(
	//'id'=>'products-grid',   !!kalo di define sdr no working with swith sharct ( their define own )
    'fixedHeader' => true, // jquery plugin StickyTableHeaders 
    'headerOffset' => 40, // 40px is the height of the main navigation at bootstrap
    'type' => 'striped', //'striped bordered',
    'dataProvider'=>$model->search(),
	'filter'=>$model,
	//'template'=> "{summary}\n{items}\n{pager}\n{extendedSummary}",  //default :  "{summary}\n{items}\n{pager}\n{extendedSummary}";
	//'template' => "{items}",
    'responsiveTable' => true,

	'sortableRows'=>false,  #drag&drop row table  ( ga bisa bersamaan di pake dengan 'selectableCells' )
	'afterSortableUpdate' => 'js:function(id, position){ console.log("id: "+id+", position:"+position); /*alert(id + position);*/ }',

	'selectableCells'=>true, 	#Select area cell Function  ( ga bisa bersamaan di pake dengan 'selectableCells' )
	'selectableCellsFilter'=>'td',  //'td.tobeselected',
	'afterSelectableCells' => 'js:function(selected){				 //var ids=$.fn.yiiGridView.getSelection("user-grid"); 	alert("jumlah ada:"+ ids.length );      
		var sum = 0;
		var select = "";
																						//alert (selected.lenght);
		$.each(selected, function(){		alert( $(this).text() ); 
			sum += parseInt($(this).text());
			select += $(this).text() +", ";
		});
		$("#hours").html(sum);
		$("#select").html( select );
	}',
	
	'bulkActions' => array(
		'actionButtons' => array(
			array(
				'buttonType' => 'button',
				'type' => 'primary',
				'size' => 'small',
				'label' => 'Bulk Actions (check some row to enable)',
				'click' => 'js:function(values){console.log(values);}'
			)
		),
		// if grid doesn't have a checkbox column type, it will attach
		// one and this configuration will be part of it
		'checkBoxColumnConfig' => array(
			'name' => 'id'
		),
	),
	
	'extendedSummary' => array(
		'title' => 'Total Products',
		'columns' => array(
			'price' => array('label'=>'<b>Total Price</b>', 'class'=>'TbSumOperation'),  //cell data yg di count
			'item' => array('label'=>'<b>Total Item</b>', 'class'=>'TbSumOperation'),  //cell data yg di count
			'catID' => array(
				'label'=>'<b>Total Expertise</b>',
				'types' => array(
					'1'=>array('label'=>'TV'),
					'2'=>array('label'=>'kulkas'),
					'3'=>array('label'=>'mesin cuci'),
					'4'=>array('label'=>'AC'),
					'5'=>array('label'=>'CD/DVD'),
				),
				//'class'=>'TbCountOfTypeOperation',   # by count each item 
				'class'=>'TbPercentOfTypeOperation', # by % each item 
				//'class'=>'TbPercentOfTypeGooglePieOperation',    //shoul be connected to internet
				 'class'=>'TbPercentOfTypeEasyPieOperation',   # by % in chart each item 
				'chartOptions' => array(
					'barColor' => '#333',	// The color of the curcular bar. You can pass either a css valid color string like rgb,
					'trackColor' => '#999',	 // The color of the track for the bar, false to disable rendering.
					'scaleColor' => "#dfe0e0", // The color of the scale lines, false to disable rendering.
					'lineWidth' => 8 ,	// Width of the bar line in px.
					'lineCap' => 'square',	#butt, round and square. // Defines how the ending of the bar line looks like. Possible values are: butt, round and square.
					"size" => 80, // Size of the pie chart in px. It will always be a square.
					"animate" => 2000, // Time in milliseconds for a eased animation of the bar growing, or false to deactivate.
					#"onStart" => "js:$.noop", // Callback function that is called at the start of any animation (only if animate is not false).
					#"onStop" => "js:$.noop" // Callback function that is called at the end of any animation (only if animate is not false).
					//'template' => "<div style="clear:both">{label}: </div>{types}";
					//'typeTemplate' => "<div style="float:left;text-align:center;margin:2px"><div class="{class}" data-percent="{value}">{value}%</div><div>{label}</div></div>";
				)
			),

		),
	),
	'extendedSummaryOptions' => array(
		'class' => 'well well-small pull-right',
		'style' => 'width: auto'
	),
	
	#The Grid/Chart switcher
	'chartOptions' => array(
		'config' => array(
			'chart'=>array(
				'width'=>800,
				'type'=>'column',	# line, spline, area, areaspline, column, bar, pie and scatter, gauge
			),
			'title' => array('text' => 'Total Products'),
			'xAxis' => array(
				// 'categories' => array('Apples', 'Bananas', 'Oranges')
				'categories' => $data1,  #HARUS DI BUAT TERPISAH DI LUAR DATA "$model"
			),
			'yAxis' => array(
				'title' => array('text' => 'Fruit eaten')
			),
		),
		'data' => array(
			'series' => array(
				array(
					'name' => 'price summary',
					'attribute' => 'price'
				),
			)
		),
		
	),
	
	//'columns' => array_slice($gridColumns, 0, count($gridColumns)-1),
	#'columns' => array_merge(array(array('class'=>'bootstrap.widgets.TbImageColumn')),$gridColumns),
   # 'columns' => $gridColumns,
	'columns'=>array( 
		array('name'=>'proID', 'header'=>'#'), 'catID', 'supID', /*array('class'=>'bootstrap.widgets.TbButtonColumn', )*/ 
		array('name'=>'item', 'footer'=>'<b>Total Price</b>'),
		//array( 'name'=>'price', 'value'=>'number_format($data->price)', 'htmlOptions'=>array('width'=>'50px'),), // CONV VALUE TO number_format()
		 array(
			'name'=>'price',
			//'type'=>'number',	//'raw', 'text', 'ntext', 'number'
			//'value'=>'number_format($data->price)',   Yii::app()->format->formatEmail(
			//'value'=>' Yii::app()->format->formatNumber($data->price)',  
			'class'=>'bootstrap.widgets.TbTotalSumColumn' ,
			///'totalExpression'=>2, //KOQ MALAH DI TAMBAH 2 YA???
			//'footer'=>number_format($totalValue)
		),
		
		array(
			'name'=>'price',
			'header'=>'price(TbJEditableColumn)',
			'headerHtmlOptions' => array('style' => 'width:50px'),
			'class'=>'bootstrap.widgets.TbJEditableColumn',
			'jEditableOptions' => array(
				'type' => 'text',  #Option : text, select, textarea, time, masked, bdatepicker, bcolorpicker
				// very important to get the attribute to update on the server!
				'submitdata' => array('attribute'=>'price'),
				'cssclass' => 'form',
				'width' => '80px'
			),
		),

		array(
			'class'=>'bootstrap.widgets.TbRelationalColumn',
			'name' => 'proID',
			'url' => $this->createUrl('widget/relational'),
			'value'=> '"test-subgrid"',
			'afterAjaxUpdate' => 'js:function(tr,rowid,data){
				bootbox.alert("I have afterAjax events too! This will only happen once for row with id: "+ rowid);
			}'
		),
		array(
			'header'=>'TbImageColumn',
			'imagePathExpression'=>'Yii::app()->request->baseUrl ."/images/fade away.jpg" ',
			'imageOptions'=>array('width'=>48, 'height'=>48),
			'class'=>'bootstrap.widgets.TbImageColumn'
		
		),
		// array(
			// 'name'=>'price',
			// 'header'=>'Hours worked',
			// 'class'=>'bootstrap.widgets.TbPickerColumn',
			// 'pickerOptions' => array(
				// 'title' => 'My Title',
				// 'width' => '400px',
				// 'content' => 'js:function(){
					// $.ajax({
						// //url: "'.$this->createUrl('site/about').'",
						// url:"http://localhost/yii/asset/index.php/widget/index",
						// success: function(r) {
							// $(".picker-content > *").html(r);
						// }
					// });
					// return "<span id=picker-ajax-html> <img src= ../../images/loading/black_loading5.gif1 /> </span>";  
			// }'),    //return "<span id=\"picker-ajax-html\">". "<img src=\" Yii::app()->request->baseUrl;../../images/loading/black_loading5.gif1 \"/>". "</span>";  
		//),
		
		 array(	#toggle action value
			'class'=>'bootstrap.widgets.TbToggleColumn',
			'toggleAction'=>'widget/toggle',
			'name' => 'active',
			'header' => 'Status'
		),
		
		array( 'class'=>'CButtonColumn', 'htmlOptions' => array('nowrap'=>'nowrap'), ),  #button column bawaan Yii farmework
		array(							 #button column bawaan TbButtonColumn' Yii-booster
			'htmlOptions' => array('nowrap'=>'nowrap'),
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'viewButtonUrl'=>null,
			'updateButtonUrl'=>null,
			'deleteButtonUrl'=>null,
		),
	),
	
	// 'columns'=>array(
		// array( 'name'=>'proID', 'value'=>'$data->proID','htmlOptions'=>array('width'=>'50px'),),
		// array( 'name'=>'catID', 'value'=>'$data->catID','htmlOptions'=>array('width'=>'50px'),),
		// array( 'name'=>'supID', 'value'=>'$data->supID','htmlOptions'=>array('width'=>'50px'),),
		// array( 'name'=>'item', 'value'=>'$data->item','htmlOptions'=>array('width'=>'50px'),),
		// //'price',
		// //array( 'name'=>'price', 'value'=>'$data->price','htmlOptions'=>array('width'=>'50px'),),  
		// array( 'name'=>'price', 'value'=>'number_format($data->price)','htmlOptions'=>array('width'=>'50px'),), // CONVER VALUE TO number_format()
		
	// ),
));
?>

<?PHP
	// $this->widget('bootstrap.widgets.TbGridView', array(
	// 'type' => 'striped bordered',
	// 'dataProvider'=>$model->search(),
	// // 'filter'=>$model,
	// 'template' => "{items}",
	// 'columns' => array_merge(array(
		// array(
			// 'class'=>'bootstrap.widgets.TbRelationalColumn',
			// 'name' => 'proID',
			// 'url' => $this->createUrl('widget/relational'),
			// 'value'=> '"test-subgrid"',
			// 'afterAjaxUpdate' => 'js:function(tr,rowid,data){
				// bootbox.alert("I have afterAjax events too! This will only happen once for row with id: "+ rowid);
			// }'
		// )
	// ),$gridColumns),
// ));
?>

<?php  //dump( array_slice($gridColumns, 0, count($gridColumns)-1) ); ?>
