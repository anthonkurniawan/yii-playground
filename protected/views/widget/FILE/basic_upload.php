<?php 
$this->pageTitle=Yii::app()->name . ' - Basic Upload'; 
$this->breadcrumbs=array('image/basic_upload',);
$this->renderPartial('/widget/FILE/menu');
?>

<span class="badge badge-inverse">Basic File Upload + custom model</span>

<!---------------------- RESULT ------------------------->
<?php if (Yii::app()->user->hasFlash('success')): ?>
    <div class="flash-success">
        <?php echo Yii::app()->user->getFlash('success'); ?>
    </div>
<?php endif; ?>

<!------------------------------- #USE WITH CFORM ----------------------------------------->
<div class="form wide myBox">
<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>

	<?php echo CHtml::form('basic_upload','post',array('enctype'=>'multipart/form-data')); ?>

	<?php echo CHtml::errorSummary($model); ?>

	<?php echo CHtml::activeLabelEx($model,"name"); ?>
	<?php echo CHtml::activeFileField($model,'name'); ?>
	<?php echo CHtml::error($model,"name"); ?>

	<?php	echo CHtml::submitButton('Submit'); ?>
	
	<?php echo CHtml::endForm(); ?>
	
<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
</div>


<div class="left">
<?php 
echo CHtml::image(Yii::app()->baseUrl . '/upload/' . $model->name, 
$model->types,
   array("class" => "clickme", "title" => $model->title, "width"=>"300", "height"=>"220")); 
?>
</div>

<div class="left">
	$model->image : <?php echo $model->name; ?>
	$model obj : <div class="scroll" style="width:545px"><?php dump($model); ?> </div>
</div>
<div class="clear"></div>

<div class="tpanel right">
	<div class="toggle btn"><?php echo Yii::t('ui','Code Form'); ?></div>
	<div class='scroll'><?php Yii::app()->sc->renderSourceBox();  ?></div>
</div>

<div class="tpanel right">
	<div class="toggle btn btn-sm btn-primary"><?php echo Yii::t('ui','View Controller'); ?></div>
	<?php $this->render_script(array('image/basic_upload')); /* from MediaController*/ ?>
</div>

<div class="tpanel right">
	<div class="toggle btn btn-sm btn-primary"><?php echo Yii::t('ui','View Sample File Mode Class'); ?></div>
	<?php $this->render_script(realpath(__DIR__.'/../../../models/Image_sample.php')); /* from MediaController*/ ?>
</div>

<!------------------ USE WITH CACTIVE-FORM ----------------------->
<?php 			
/*   
$form = $this->beginWidget(
    'CActiveForm',
    array(
        'id' => 'upload-form',
        'enableAjaxValidation' => false,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
    )
);
// ...
echo $form->labelEx($model, 'image');
echo $form->fileField($model, 'image');
echo $form->error($model, 'image');

//echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', $htmlOptions=array()); 
echo CHtml::submitButton('Submit');
$this->endWidget();
*/
?>