<?php $this->layout='column1'; ?>
<?php
$this->pageTitle=Yii::app()->name . ' - XMultiSelect';
$this->breadcrumbs=array('widget/XEditableWidget',);			
?>


	<p><b class="badge badge-inverse">  XMultiSelect</b></p>
	<p>This widget is used to transfer options between two select filed</p>
	
	<div class="left">
	<?php Yii::app()->sc->setStart(__LINE__);  ?>

	<?php
	$this->widget('ext-coll.INTERFACE.multiselects.XMultiSelects',array(
     'leftTitle'=>'Australia',
     'leftName'=>'Person[australia][]',
     'leftList'=>TblUserMysql::model()->findByPk(1),
     'rightTitle'=>'New Zealand',
     'rightName'=>'Person[newzealand][]',
     'rightList'=>TblUserMysql::model()->findByPk(2),
     'size'=>20,
     'width'=>'200px',
 ));
	?>
	
	<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  ?>
	</div>
	
	<div class="right">
	<?php Yii::app()->sc->renderSourceBox(); ?>
	</div>
	<div class="clear"></div>

