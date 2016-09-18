
<?php
$this->pageTitle=Yii::app()->name . ' - Modules';
$this->breadcrumbs=array(
	'Modules',
);
?>

<h1><small>Modules</small></h1>

<div class="tpanel">
<b>View all modules : </b><code>Yii::app()->modules</code>
	<span class="toggle btn btn-xs btn-primary"><?php echo Yii::t('ui','show all module'); ?></span>
	<div class="scroll" style="height:200px"><?php dump(Yii::app()->modules); ?></div>
</div><br>

<p>
<b>Check if module exist :</b> <code>Yii::app()->hasModule('test_unit')</code>
<?php dump(Yii::app()->hasModule('test_unit')); ?><br>

<div class="tpanel">
<b>access module class :</b> <code>Yii::app()->getModule('test_unit');</code>
	<span class="toggle btn btn-xs btn-primary"><?php echo Yii::t('ui','show module class'); ?></span>
	<div class="scroll" style="height:200px"><?php dump(Yii::app()->getModule('test_unit')); ?></div>
</div><br>

<b>access variable on module : <b> <code>Yii::app()->getModule('test_unit')->ipFilters</code>
<?php dump(Yii::app()->getModule('test_unit')->ipFilters); ?>
</p>
	
<div class="view">
<b>Sample created module template : <b><br>	
<?php
$file = dirname(__FILE__).'/_templModule.php';	//echo $file;
Yii::app()->sc->collect('php', Yii::app()->sc->getSourceFromFile($file));	
Yii::app()->sc->renderSourceBox(); 
?>
<div class="clear"></div>
</div>


<?php //Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>	<!-- 

 -->
<?php //Yii::app()->sc->collect('html', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php //Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>	