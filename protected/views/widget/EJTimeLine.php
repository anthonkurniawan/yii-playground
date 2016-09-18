<?php //$this->layout='column1'; ?>
<?php
$this->pageTitle=Yii::app()->name . ' - EJTimeLine';
$this->breadcrumbs=array('widget/eJTimeLine',);
?>

<b class="badge">EJTimeline</b><br>
Yii framework extensions rendering a time line.
<a href="file:///D:/WEB/yiiProject/yiiTest/protected/extensions/EJTimeline/docs/index.html">docs<a>

<div class="view2">
This widget encapsulates the popupWindow JQuery Plugin.
Takes a link (or other HTML element) and will create a popup window
</div>
<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
<?php 
	$this->widget(
		'ext.EJTimeline.EJTimeline', 
		array('modelName'=>'TblUserMysql', 'attribute'=>'username')
	); 
?><!-- popup -->
<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>
</p>


<?php $this->beginWidget('ext.EJTimeline.EJTimeline', array('modelName'=>'TblUserMysql', 'attribute'=>'create_time', 'CListViewConfig'=>array())); ?>
<?php $this->endWidget();?>