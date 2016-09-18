
<?php
$this->pageTitle= 'View - '.$model->id;

$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->id,
);
/**----------------------------- MENU --------------------------------------**/
$this->menu=array(
	array('label'=>'List user', 'url'=>array('index')),
	array('label'=>'Create user', 'url'=>array('create')),
	array('label'=>'Update user', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete user', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage user', 'url'=>array('admin')),
);
?>

<h1>View user #<?php echo $model->id; ?> ( CDetailView - Standart )</h1>

<?php echo CHtml::link('view in custom', array('widget_CgridView/'.$model->id), array('style'=>'float: right', 'target'=>'_blank') ); ?><br>

<!------------ CONTENT---------->
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'username',
		'password',
		'email',
		'first_name',
		'role',
	),
)); ?>

<div class="tpanel left">
	<div class="toggle btn"><?php echo Yii::t('ui','View Controller'); ?></div>
	<?php $this->render_script(); /* from AdminController*/ ?>
</div>

<div class="tpanel left">
	<div class="toggle btn"><?php echo Yii::t('ui','View Code'); ?></div>
	<?php $this->render_script(__FILE__); /* from AdminController*/ ?>
</div>