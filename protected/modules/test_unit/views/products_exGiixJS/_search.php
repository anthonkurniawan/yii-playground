<div class="wide form">

<?php $form = $this->beginWidget('GxActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>

	<div class="span-8 last">
		<?php echo $form->label($model, 'proID'); ?>
		<?php echo $form->textField($model, 'proID'); ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'catID'); ?>
		<?php echo $form->textField($model, 'catID'); ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'supID'); ?>
		<?php echo $form->textField($model, 'supID'); ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'item'); ?>
		<?php echo $form->textField($model, 'item', array('maxlength' => 255)); ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'price'); ?>
		<?php echo $form->textField($model, 'price', array('maxlength' => 19)); ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'type'); ?>
		<?php echo $form->textField($model, 'type', array('maxlength' => 30)); ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'modelID'); ?>
		<?php echo $form->textField($model, 'modelID', array('maxlength' => 30)); ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'itemDesc'); ?>
		<?php echo $form->textField($model, 'itemDesc', array('maxlength' => 100)); ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'weight'); ?>
		<?php echo $form->textField($model, 'weight', array('maxlength' => 20)); ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'createDate'); ?>
		<?php $form->widget('zii.widgets.jui.CJuiDatePicker', array(
			'model' => $model,
			'attribute' => 'createDate',
			'value' => $model->createDate,
			'options' => array(
				'showButtonPanel' => true,
				'changeYear' => true,
				'dateFormat' => 'yy-mm-dd',
				),
			));
; ?>
	</div>

	<div class="span-8 last">
		<?php echo $form->label($model, 'modifiedDate'); ?>
		<?php $form->widget('zii.widgets.jui.CJuiDatePicker', array(
			'model' => $model,
			'attribute' => 'modifiedDate',
			'value' => $model->modifiedDate,
			'options' => array(
				'showButtonPanel' => true,
				'changeYear' => true,
				'dateFormat' => 'yy-mm-dd',
				),
			));
; ?>
	</div>

	<div class="row buttons">
		<?php echo GxHtml::submitButton(Yii::t('app', 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
