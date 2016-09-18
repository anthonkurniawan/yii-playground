<?php $form=$this->beginWidget('ext.GII.YiiBooster.widgets.TbActiveForm',array(
	'id'=>'products-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'catID',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'supID',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'item',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'price',array('class'=>'span5','maxlength'=>19)); ?>

	<?php echo $form->textFieldRow($model,'type',array('class'=>'span5','maxlength'=>30)); ?>

	<?php echo $form->textFieldRow($model,'modelID',array('class'=>'span5','maxlength'=>30)); ?>

	<?php echo $form->textFieldRow($model,'itemDesc',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'weight',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'createDate',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'modifiedDate',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('ext.GII.YiiBooster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
