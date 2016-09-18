
<?php
    $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'links'=>array('Product'),
    ));
?>
$this->menu=array(
	array('label'=>'Create Products','url'=>array('create')),
	array('label'=>'Manage Products','url'=>array('admin')),
);
?>

<h1>Products</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'crud_default/_view',
)); ?>
