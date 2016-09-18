<?php
$this->breadcrumbs=array(
	'User Sqlites'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List UserSqlite', 'url'=>array('index')),
	array('label'=>'Manage UserSqlite', 'url'=>array('admin')),
);
?>

<h1>Create UserSqlite</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>