<?php
$this->breadcrumbs=array(
	'Products'=>array('index'),
	$model->proID,
);

$this->menu=array(
	array('label'=>'List Products','url'=>array('index')),
	array('label'=>'Create Products','url'=>array('create')),
	array('label'=>'Update Products','url'=>array('update','id'=>$model->proID)),
	array('label'=>'Delete Products','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->proID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Products','url'=>array('admin')),
);
?>

<h1>View Products #<?php echo $model->proID; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'proID',
		'catID',
		'supID',
		'item',
		'price',
		'type',
		'modelID',
		'itemDesc',
		'weight',
		'createDate',
		'modifiedDate',
	),
)); ?>
