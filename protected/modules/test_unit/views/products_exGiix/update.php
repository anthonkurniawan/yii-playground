<?php
$this->breadcrumbs = array(
	'Products Ex Giixes' => array('index'),
	GxHtml::valueEx($model) => array('view', 'id' => GxActiveRecord::extractPkValue($model, true)),
	Yii::t('app', 'Update'),
);

$this->menu = array(
	array('label' => Yii::t('app', 'List') . ' Products_exGiix', 'url'=>array('index')),
	array('label' => Yii::t('app', 'Create') . ' Products_exGiix', 'url'=>array('create')),
	array('label' => Yii::t('app', 'View') . ' Products_exGiix', 'url'=>array('view', 'id' => GxActiveRecord::extractPkValue($model, true))),
	//array('label' => Yii::t('app', 'Manage') . ' Products_exGiix', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('app', 'Update'); ?> Products_exGiix #<?php echo GxHtml::encode(GxHtml::valueEx($model)); ?></h1>

<?php
$this->renderPartial('_form', array(
		'model' => $model));
?>