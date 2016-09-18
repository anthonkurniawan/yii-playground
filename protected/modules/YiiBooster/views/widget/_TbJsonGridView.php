
<?php
$this->widget('bootstrap.widgets.TbJsonGridView', array(
	'id'=>'products-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
	//'json' => true, //optinal :default not set :true 
	//'ajaxUpdate' => true,	//optinal :default not set :true 
    'type' => 'striped bordered condensed',
    'summaryText' => false,
    'cacheTTL' => 10, // cache will be stored 10 seconds (see cacheTTLType)
    'cacheTTLType' => 's', // type can be of seconds, minutes or hours
	'htmlOptions'=>array('style'=>'width:800px',),
    'columns' => array(
		'proID','item',
		'price',
		array(
			'name' => 'createDate',
			'type' => 'datetime'
		),
		
		#TbJsonPickerColumn
		// array(
			// 'class' => 'bootstrap.widgets.TbJsonPickerColumn',
			// 'name'=>'modifiedDate',
			// 'pickerOptions' => array(
				// 'title' => 'My Title',
				// 'width' => '400px',
				// 'content' => 'js:function(){
					// $.ajax({
						// url: "'.$this->createUrl('site/yiiGrid').'",
						// success: function(r) {
							// $(".picker-content > *").html(r);
						// }
					// });
				// return "<span id=\"picker-ajax-html\">".
					// "<img src=\" Yii::app()->request->baseUrl;../../images/loading/black_loading5.gif1 \"/>". "</span>";  
				// }'),
		// ),

		array(
			'header' => Yii::t('ses', 'Edit'),
			'class' => 'bootstrap.widgets.TbJsonButtonColumn',
			'template' => '{view} {delete}',
		),
    ),
	//'template'=>"{items}\n{summary}",  //default :  {summary}\n{items}\n{pager}
	'summaryText'=>Yii::t('zii','Displaying {start}-{end} of 1 result.|Displaying {start}-{end} of {count} results.') /*. $grid_style.$pager_style*/,   
));
?>
