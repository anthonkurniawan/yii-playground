<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,  //jika "true" maka akan submit via ajax tanpa validasi
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div style="float:left; border: 1px solid #0C0; width: 300px;">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>
	<div style="float:left; border: 1px solid #0C0; width: 300px;">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>
	<div style="clear: both;"></div>
    
	<div style="float:left; border: 1px solid #0C0; width: 300px;">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>
	<div style="float:left; border: 1px solid #0C0; width: 300px;">
		<?php echo $form->labelEx($model,'first_name'); ?>
		<?php echo $form->textField($model,'first_name',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'first_name'); ?>
	</div>
	<div style="clear: both;"></div>
    
	<div style="float:left; border: 1px solid #0C0; width: 300px;">
		<?php echo $form->labelEx($model,'role'); ?>
		<?php echo $form->textField($model,'role'); ?>
		<?php echo $form->error($model,'role'); ?>
	</div>
    <!-------------  tambah utk field(ket) ------------------------->
    <!--<div style="float:left; border: 1px solid #0C0; width: 300px;">
		<?php //echo $form->labelEx($model,'ket'); ?>
		<?php //echo $form->textField($model,'ket'); ?>
		<?php //echo $form->error($model,'ket'); ?>
	</div>-->

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->