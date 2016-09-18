<?php
$this->pageTitle=Yii::app()->name . ' - Backup';
$this->breadcrumbs=array(
	'Manage'=>array('index'),
);?>

<h1> Manage database backup files</h1>

<?php $this->renderPartial('_list', array(
		'dataProvider'=>$dataProvider,
));
?>

<div class="flash-error">
<b>Backup Module</b> by it10 <br>
Add following code in config main.php under modules <code>'backup'</code>, You can specify custom path for backup files.

<?php Yii::app()->sc->setStart(__LINE__); ?> <!--
'backup'=> array('path' => __DIR__.'/../_backup/'  ),
Thats it , now you can open your web app with ?r=backup or /backup appended to home url.
-->
<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__)); ?>
<?php Yii::app()->sc->renderSourceBox();  ?>

<div class="tpanel"> <!--- load model ------->
	<div class="toggle btn btn-sm btn-primary" style="float:right"><?php echo Yii::t('ui','show class module'); ?></div>
	<div class="scroll" style="width:100%"><?php dump($this->module); ?></div>
</div>
<div class="clear"></div>

</div>
