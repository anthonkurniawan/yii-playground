<?php
$this->breadcrumbs=array(
	'User Sqlites'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List UserSqlite', 'url'=>array('index')),
	array('label'=>'Create UserSqlite', 'url'=>array('create')),
	array('label'=>'View UserSqlite', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage UserSqlite', 'url'=>array('admin')),
);
?>

<h1>Update UserSqlite <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>