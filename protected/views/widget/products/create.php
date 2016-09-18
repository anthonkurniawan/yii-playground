<?php
/* @var $this ProductsController */
/* @var $model Products */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'products-produtcs-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with -TONA<span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<!--public static string activeLabel(CModel $model, string $attribute, array $htmlOptions=array ( ))-->
		<?php echo $form->labelEx($model,'catID'); ?>
		<!--public static string activeTextField(CModel $model, string $attribute, array $htmlOptions=array ( ))-->
		<?php echo $form->textField($model,'catID'); ?>
		<?php echo $form->error($model,'catID'); ?>
	</div>

	<div class="row">
		<!--public static string activeLabel(CModel $model, string $attribute, array $htmlOptions=array ( ))-->
		<?php echo $form->labelEx($model,'supID'); ?>
		<!--public static string activeTextField(CModel $model, string $attribute, array $htmlOptions=array ( ))-->
		<?php echo $form->textField($model,'supID'); ?>
		<?php echo $form->error($model,'supID'); ?>
	</div>

	<div class="row">
		<!--public static string activeLabel(CModel $model, string $attribute, array $htmlOptions=array ( ))-->
		<?php echo $form->labelEx($model,'item'); ?>
		<!--public static string activeTextField(CModel $model, string $attribute, array $htmlOptions=array ( ))-->
		<?php echo $form->textField($model,'item'); ?>
		<?php echo $form->error($model,'item'); ?>
	</div>

	<div class="row">
		<!--public static string activeLabel(CModel $model, string $attribute, array $htmlOptions=array ( ))-->
		<?php echo $form->labelEx($model,'price'); ?>
		<!--public static string activeTextField(CModel $model, string $attribute, array $htmlOptions=array ( ))-->
		<?php echo $form->textField($model,'price'); ?>
		<?php echo $form->error($model,'price'); ?>
	</div>

	<div class="row">
		<!--public static string activeLabel(CModel $model, string $attribute, array $htmlOptions=array ( ))-->
		<?php echo $form->labelEx($model,'type'); ?>
		<!--public static string activeTextField(CModel $model, string $attribute, array $htmlOptions=array ( ))-->
		<?php echo $form->textField($model,'type'); ?>
		<?php echo $form->error($model,'type'); ?>
	</div>

	<div class="row">
		<!--public static string activeLabel(CModel $model, string $attribute, array $htmlOptions=array ( ))-->
		<?php echo $form->labelEx($model,'modelID'); ?>
		<!--public static string activeTextField(CModel $model, string $attribute, array $htmlOptions=array ( ))-->
		<?php echo $form->textField($model,'modelID'); ?>
		<?php echo $form->error($model,'modelID'); ?>
	</div>

	<div class="row">
		<!--public static string activeLabel(CModel $model, string $attribute, array $htmlOptions=array ( ))-->
		<?php echo $form->labelEx($model,'itemDesc'); ?>
		<!--public static string activeTextField(CModel $model, string $attribute, array $htmlOptions=array ( ))-->
		<?php echo $form->textField($model,'itemDesc'); ?>
		<?php echo $form->error($model,'itemDesc'); ?>
	</div>

	<div class="row">
		<!--public static string activeLabel(CModel $model, string $attribute, array $htmlOptions=array ( ))-->
		<?php echo $form->labelEx($model,'weight'); ?>
		<!--public static string activeTextField(CModel $model, string $attribute, array $htmlOptions=array ( ))-->
		<?php echo $form->textField($model,'weight'); ?>
		<?php echo $form->error($model,'weight'); ?>
	</div>

	<div class="row">
		<!--public static string activeLabel(CModel $model, string $attribute, array $htmlOptions=array ( ))-->
		<?php echo $form->labelEx($model,'createDate'); ?>
		<!--public static string activeTextField(CModel $model, string $attribute, array $htmlOptions=array ( ))-->
		<?php echo $form->textField($model,'createDate'); ?>
		<?php echo $form->error($model,'createDate'); ?>
	</div>

	<div class="row">
		<!--public static string activeLabel(CModel $model, string $attribute, array $htmlOptions=array ( ))-->
		<?php echo $form->labelEx($model,'modifiedDate'); ?>
		<!--public static string activeTextField(CModel $model, string $attribute, array $htmlOptions=array ( ))-->
		<?php echo $form->textField($model,'modifiedDate'); ?>
		<?php echo $form->error($model,'modifiedDate'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->