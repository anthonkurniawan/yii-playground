<?php
$this->pageTitle=Yii::app()->name . ' - TagHandler';
$this->breadcrumbs=array('widget/tagHandler',);
?>

<a href="http://ioncache.github.io/Tag-Handler/" target="_blank" class="right">DEMO</a>
<!--<script type="text/javascript" src="http://localhost/html5/angular-test/app/lib/jquery-2.0.0.js"></script> -->

<div class="flash-error">
if use query-ui-1.8.23.custom.min.js : ERROR
</div>


<h1>TagHandler</h1>
Masih ada error : <b class="txtAtt"> Uncaught TypeError: Object [object Object] has no method 'zIndex' </b>

<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>

<?php
 	$this->widget('ext.TagHandler.TagHandler',array(
  		'name'=>'Entry[Associates]',
 		'options'=>array(
 			//'getURL'=>$ajaxURL,
 			'assigned'=> array('1', '2', '3'), 	//TblUserMysql::model()->suggestUsername('a', $limit=20),
 			'available'=> array(1,2,3,4,5,6),
 			'autocomplete'=>true,
 		),
 	));
 ?>
 
 <?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox(); ?>


<?php //dump(CHtml::listData(TblUserMysql::model()->findAll(),'id','username')); ?>
<?php //dump(TblUserMysql::model()->getList_all() ); ?>

<h1> sample with model (not implemented)</h1>

<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?> <!--
$this->widget('ext.TagHandler.TagHandler',array(
 * 		'name'=>'Entry[Associates]',
 *		'options'=>array(
 *			//'getURL'=>$ajaxURL,
 *			'assigned'=> Site::model()->findAll(),
 *			'available'=> Example::model()->findAll(),
 *			'autocomplete'=>true,
 *		),
 *	));
  <?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox(); ?>