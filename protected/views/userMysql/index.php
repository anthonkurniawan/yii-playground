<?php $this->layout='all_sidemenu';?> 
<?php
$this->pageTitle="CListView Standart";
$this->breadcrumbs=array('CListView ',);

$this->menu=array(
	array('label'=>'Create user', 'url'=>array('create')),
	array('label'=>'Manage user', 'url'=>array('admin')),
);
?>

<?php echo CHtml::link('view Dynamic CListView', array('Widget_ClistView/dynamic_view'), array('style'=>'float:right', 'target'=>'_blank')); ?>

<h2>CListView (tampilan default)</h2> 

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'/userMysql/_view',
)); ?>

<div class="tpanel">
	<div class="toggle btn"><?php echo Yii::t('ui','View Controller'); ?></div>
	<?php $this->render_script(); /* from AdminController*/ ?>
</div>