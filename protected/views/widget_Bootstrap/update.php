<?php
$this->breadcrumbs=array(
	'Tbl User Mysqls'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TblUserMysql','url'=>array('index')),
	array('label'=>'Create TblUserMysql','url'=>array('create')),
	array('label'=>'View TblUserMysql','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage TblUserMysql','url'=>array('admin')),
);
?>

<h1>Update TblUserMysql <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>