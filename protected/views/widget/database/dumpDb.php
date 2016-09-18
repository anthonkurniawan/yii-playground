<?php
$this->pageTitle=Yii::app()->name . ' - Dump DB';
$this->breadcrumbs=array('widget/dumpDb',);
?>

<div class="myBox">
<h1>Dump DB - rodzadra-yii-dump ext</h1>
<div class="row-fluid"> <!-- row-fluid -->

<div class="span6">
<b>To generated sql file</b>

<?php Yii::app()->sc->setStart(__LINE__); ?> <!--
Yii::import('ext.dumpDB.dumpDB');
$dumper = new dumpDB();
$dumper->getDump();
-->
<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__)); ?>
<?php Yii::app()->sc->renderSourceBox();  ?>

 <?php echo CHtml::link('Generate dump file', array('widget/dumpDb_gen', 'mode'=>'file'), array('class'=>'right btn btn-sm btn-primary') ); ?>
</div>

<div class="span6">
	<b>To show the generated sql</b>
<?php Yii::app()->sc->setStart(__LINE__); ?> <!--
Yii::import('ext.dumpDB.dumpDB');
$dumper = new dumpDB();
echo $dumper->getDump(false);
-->
<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>

 
  <?php echo CHtml::link('View dump DB', array('widget/dumpDb_gen', 'mode'=>'view'), array('class'=>'right btn btn-sm btn-primary', 'target'=>'_blank') ); ?>
</div>

</div>
</div>

<!-------------------------------------------------------------------------------------- Other dump ------------------------------------------------------------------------------>
<div class="myBox" style="margin-top:10px">
<h1>SDatabseDumper ext</h1>
<div class="row-fluid"> <!-- row-fluid -->

<div class="span6">
<b>To generated sql file</b>

<?php
Yii::app()->sc->collect('php', Yii::app()->sc->getFunctionFromFile(
	'public function actionSDump_gen',
	'protected/controllers/WidgetController.php'
), false, true);
		
Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE
?>

 <?php echo CHtml::link('Generate dump file', array('widget/sDump_gen'), array('class'=>'right btn btn-sm btn-primary',  'target'=>'_blank') ); ?>
</div>

</div>
</div>