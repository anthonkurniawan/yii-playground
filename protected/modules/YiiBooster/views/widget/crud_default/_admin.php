
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'products-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'htmlOptions'=>array('style'=>'width:800px',),
	'columns'=>array(
		'proID',
		// 'catID',
		// 'supID',
		'item',
		'price',
		//'type',
		/*
		'modelID',
		'itemDesc',
		'weight',
		'createDate',
		'modifiedDate',
		*/
		array(
			'name' => 'createDate',
			'type' => 'datetime'
		),
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template' => '{view} {delete} {update}', //optional
		),

	),
)); ?>
