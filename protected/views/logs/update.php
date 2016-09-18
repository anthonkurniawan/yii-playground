<?php
/* @var $this LogsController */
/* @var $model Logs */

$this->breadcrumbs=array(
	'Logs'=>array('index'),
	$model->index=>array('view','id'=>$model->index),
	'Update',
);

$this->menu=array(
	array('label'=>'List Logs', 'url'=>array('index')),
	array('label'=>'Create Logs', 'url'=>array('create')),
	array('label'=>'View Logs', 'url'=>array('view', 'id'=>$model->index)),
	array('label'=>'Manage Logs', 'url'=>array('admin')),
);
?>

<h1>Update Logs <?php echo $model->index; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>