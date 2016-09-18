<?php $this->layout='column2';?> 
<?php
$this->pageTitle="Dynamic CListView";
$this->breadcrumbs=array('Dynamic CListView ',);
?>

<?php
$this->menu=array(
	array('label'=>'CListView(standart)', 'url'=>array('index'), 'linkOptions'=>array('target'=>'_blank')),
	array('label'=>'CListView(standart)(select query)', 'url'=>array('userMysql/ListUser'),  'linkOptions'=>array('target'=>'_blank')),
	array('label'=>'Npager', 'url'=>array('widget/Npager'), 'linkOptions'=>array('target'=>'blank'), 'linkOptions'=>array('target'=>'_blank') ),
);
?>						

<h2>NPager View </h2>

<?php 
$dataProvider = new CActiveDataProvider('TblUserMysql'); //print_r($dataProvider);

$this->widget('ext.NPager.NListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'/userMysql/_view',
));
 ?>
