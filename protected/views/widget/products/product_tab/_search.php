<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'proID'); ?>
		<?php echo $form->textField($model,'proID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'catID'); ?>
		<?php echo $form->textField($model,'catID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'supID'); ?>
		<?php echo $form->textField($model,'supID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'item'); ?>
		<?php echo $form->textField($model,'item',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'price'); ?>
		<?php echo $form->textField($model,'price',array('size'=>19,'maxlength'=>19)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->