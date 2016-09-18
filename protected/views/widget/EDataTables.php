<?php //$this->layout='column2';?>
<style> .container {width:1100px; margin:0 auto;   /*change width page*/ </style>
<?php
$this->pageTitle=Yii::app()->name . ' - Widget'; 
$this->breadcrumbs=array('EDataTables',);
?>

<?php $this->renderPartial('_menuGrid'); ?>

<a href="http://datatables.net/examples/" target="_blank" style="float:right">Documentation</a> | 
<a href="http://www.yiiframework.com/extension/edatatables//"  target="_blank" style="float:right">YII ext.</a><br />

<!-------------------------- CONTENT ---------------------------------->
<b class="badge">EDataTables</b><br />

<?php //dump($widget); ?>

<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
<?php 
$widget->run(); 
?>
<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>

<div class="tpanel left">
	<div class="toggle btn"><?php echo Yii::t('ui','View Code'); ?></div>
	<div class='scoll'><?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?></div>
</div>
<div class="tpanel left">
	<div class="toggle btn"><?php echo Yii::t('ui','Code Controller'); ?></div>
	<div class='scoll'><?php $this->render_script( array('widget/EdataTables') ); ?></div>
</div>
