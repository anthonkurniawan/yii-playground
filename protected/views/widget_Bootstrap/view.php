<?php
$this->breadcrumbs=array(
	'Tbl User Mysqls'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List TblUserMysql','url'=>array('index')),
	array('label'=>'Create TblUserMysql','url'=>array('create')),
	array('label'=>'Update TblUserMysql','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete TblUserMysql','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TblUserMysql','url'=>array('admin')),
);
?>

<h1>View TblUserMysql #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'username',
		'password',
		'email',
		'first_name',
		'role',
		'active',
	),
)); ?>
