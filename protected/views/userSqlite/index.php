<?php
$this->breadcrumbs=array(
	'User Sqlites',
);

$this->menu=array(
	array('label'=>'Create UserSqlite', 'url'=>array('create')),
	array('label'=>'Manage UserSqlite', 'url'=>array('admin')),
	//ADDD NEW MENU 'from actionTest'
	array('label'=>'Manage UserSqlite', 'url'=>array('test')),
);
?>

<h1>User Sqlites</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
