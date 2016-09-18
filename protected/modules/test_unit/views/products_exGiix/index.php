<?php
$this->breadcrumbs = array(
	'Products Ex Giixes',
	Yii::t('app', 'Index'),
);

$this->menu = array(
	array('label'=>Yii::t('app', 'Create') . ' Products_exGiix', 'url' => array('create')),
	array('label'=>Yii::t('app', 'Manage') . ' Products_exGiix', 'url' => array('admin')),
);
?>

<h1>Products Ex Giixes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); 