<?php
$this->breadcrumbs=array(
	'Tbl User Mysqls',
);

$this->menu=array(
	array('label'=>'Create TblUserMysql','url'=>array('create')),
	array('label'=>'Manage TblUserMysql','url'=>array('admin')),
);
?>

<h1>Tbl User Mysqls</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
