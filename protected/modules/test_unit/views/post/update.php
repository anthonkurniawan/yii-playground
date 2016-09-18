<?php
$this->breadcrumbs=array(
	$model->title=>$model->url,
	'Update',
);
?>

<h1><small>Update <i><?php echo CHtml::encode($model->title); ?></i></small></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>