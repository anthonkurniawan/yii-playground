<?php //$this->layout='column2';?>

<?php
$this->pageTitle=Yii::app()->name . ' - Widget'; 
$this->breadcrumbs=array('eHtmlDateSelect',);
?>

<div class="view2">
<h2> Sample calendar </h2>
<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
<?php
$this->widget('ext.calendar.Calendar',array(
        'day' => date('d'), // tanggal yang diinginkan, bisa load dari database artikel
        'month' => date('M'), // bulan yang diinginkan, bisa load dari database artikel
    ));
?>
<div class="clear"></div>
<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>
</div>

<div class="view2">
<a href="http://www.yiiframework.com/extension/ehtmldataselect/"><b>Extension</b></a><br />
<h2> Sample EHtmlDateSelect </h2>
<!-------------------------- CONTENT ---------------------------------->

<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>

<?php 
$model= new TblUserMysql;

$this->widget('ext.date.EHtmlDateSelect', array(
	'time'=>$model->create_time,
	'field_array'=>'ItemsDate',
	'prefix'=>'',
	'field_order'=>'DMY',
	'start_year'=>2010,
	'end_year'=>2012,
));
?>

<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>

<?php $this->render_script(array('widget/EHtmlDateSelec')); ?>
</div>