
<?php
    $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'links'=>array('Product'=>'#', 'Manage'),
    ));
?>

<?php
$this->menu=array(
	array('label'=>'List Products','url'=>array('index')),
	array('label'=>'Create Products','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('products-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Products</h1>

<div class="well well-small">
	With render partial CgridView (more fast ajax respon ) not load all page
</div>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('crud_default/_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<!--------------------------------------------------- Content CGRIDVIEW ------------------------------------------------------>
<?php $this->renderPartial('crud_default/_admin',array('model'=>$model,)); ?>