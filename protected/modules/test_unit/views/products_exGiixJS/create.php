<?php
$this->breadcrumbs = array(
	'Products Ex Giixes' => array('index'),
	Yii::t('app', 'Create'),
);

$this->menu = array(
	array('label'=>Yii::t('app', 'List') . ' Products_exGiix', 'url' => array('index')),
	array('label'=>Yii::t('app', 'Manage') . ' Products_exGiix', 'url' => array('admin')),
);
?>

<h1><?php echo Yii::t('app', 'Create'); ?> Products_exGiix</h1>

<?php
$this->renderPartial('_form', array(
		'model' => $model,
		'buttons' => 'create'));
?>