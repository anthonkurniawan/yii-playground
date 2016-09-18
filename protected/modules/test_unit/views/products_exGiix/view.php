<?php
$this->breadcrumbs = array(
	'Products Ex Giixes' => array('index'),
	GxHtml::valueEx($model),
);

$this->menu=array(
	array('label'=>Yii::t('app', 'List') . ' Products_exGiix', 'url'=>array('index')),
	array('label'=>Yii::t('app', 'Create') . ' Products_exGiix', 'url'=>array('create')),
	array('label'=>Yii::t('app', 'Update') . ' Products_exGiix', 'url'=>array('update', 'id' => $model->proID)),
	array('label'=>Yii::t('app', 'Delete') . ' Products_exGiix', 'url'=>'#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->proID), 'confirm'=>'Are you sure you want to delete this item?')),
	//array('label'=>Yii::t('app', 'Manage') . ' Products_exGiix', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('app', 'View'); ?> Products_exGiix #<?php echo GxHtml::encode(GxHtml::valueEx($model)); ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data' => $model,
	'attributes' => array(
'proID',
'catID',
'supID',
'item',
'price',
'type',
'modelID',
'itemDesc',
'weight',
'createDate',
'modifiedDate',
	),
        'itemTemplate' => "<tr class=\"{class}\"><td style=\"width: 120px\"><b>{label}</b></td><td>{value}</td></tr>\n",
        'htmlOptions' => array(
            'class' => 'table',
        ),
)); ?>

