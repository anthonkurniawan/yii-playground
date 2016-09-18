
<?php
$this->pageTitle=Yii::app()->name . ' - Ejsonbehavior'; 
$this->breadcrumbs=array('Ejsonbehavior',);
?>

<a href="http://www.yiiframework.com/extension/ejsonbehavior/"><b>Extension</b></a><br />
<a href="http://json.parser.online.fr/"><b>JSON PARSER ONLINE</b></a><br />

<div class="myBox" style="width:100%; overflow:auto">
<p><span class="badge badge-inverse">Ejsonbehavior</span></p>
<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>

<?php  $model = TblUserMysql::model()->findByPk(1); ?>

<?php echo $model->toJSON(); ?>

 <?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
 
 <div class="tpanel right">
	<div class="toggle btn btn-sm btn-primary"><?php echo Yii::t('ui','Save Controller'); ?></div>
	<div class="scroll"><?php dump($model); ?></div>
</div>
<div class="clear"></div>

<p><span class="badge badge-inverse"> Test with "CJSON::encode($model);"</span></p>
<?php echo CJSON::encode($model); ?>

 <?php Yii::app()->sc->renderSourceBox();  ?>
</div>


<div class="flash-error">
<b>Summary : </b>
dari perbandingan use <b>Ejsonbehavior</b> dengan <code>CJSON::encode($model);</code>, pada <b>Ejsonbehavior</b> sudah ada <b>relasi</b>s data model nya 
</div>

