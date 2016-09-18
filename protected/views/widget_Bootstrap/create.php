<?php
$this->breadcrumbs=array(
	'Tbl User Mysqls'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TblUserMysql','url'=>array('index')),
	array('label'=>'Manage TblUserMysql','url'=>array('admin')),
);
?>

<h1>Create TblUserMysql</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>