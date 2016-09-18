<div class="wide form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'products-ex-giix-form',
	'enableAjaxValidation' => true,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="span-8 last">
		<?php echo $form->labelEx($model,'catID'); ?>
		<?php echo $form->textField($model, 'catID'); ?>
		<?php echo $form->error($model,'catID'); ?>
		</div><!-- row -->
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'supID'); ?>
		<?php echo $form->textField($model, 'supID'); ?>
		<?php echo $form->error($model,'supID'); ?>
		</div><!-- row -->
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'item'); ?>
		<?php echo $form->textField($model, 'item', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'item'); ?>
		</div><!-- row -->
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'price'); ?>
		<?php echo $form->textField($model, 'price', array('maxlength' => 19)); ?>
		<?php echo $form->error($model,'price'); ?>
		</div><!-- row -->
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'type'); ?>
		<?php echo $form->textField($model, 'type', array('maxlength' => 30)); ?>
		<?php echo $form->error($model,'type'); ?>
		</div><!-- row -->
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'modelID'); ?>
		<?php echo $form->textField($model, 'modelID', array('maxlength' => 30)); ?>
		<?php echo $form->error($model,'modelID'); ?>
		</div><!-- row -->
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'itemDesc'); ?>
		<?php echo $form->textField($model, 'itemDesc', array('maxlength' => 100)); ?>
		<?php echo $form->error($model,'itemDesc'); ?>
		</div><!-- row -->
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'weight'); ?>
		<?php echo $form->textField($model, 'weight', array('maxlength' => 20)); ?>
		<?php echo $form->error($model,'weight'); ?>
		</div><!-- row -->
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'createDate'); ?>
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
		<?php echo $form->error($model,'createDate'); ?>
		</div><!-- row -->
		<div class="span-8 last">
		<?php echo $form->labelEx($model,'modifiedDate'); ?>
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
		<?php echo $form->error($model,'modifiedDate'); ?>
		</div><!-- row -->
<!-- june -->
<div class="row"></div>
<!-- june -->
		<!--label--><!--/label-->
		                
<?php
echo GxHtml::Button(Yii::t('app', 'Cancel'), array(
			'submit' => array('products_exgiix/admin')
		));
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->