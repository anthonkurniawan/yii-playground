<div class="form">

<?php $form=$this->beginWidget('CActiveForm'); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo CHtml::errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>80,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'content'); ?>
		<?php echo CHtml::activeTextArea($model,'content',array('rows'=>13, 'cols'=>80)); ?>
		<p class="hint">You may use <a target="_blank" href="http://daringfireball.net/projects/markdown/syntax">Markdown syntax</a>.</p>
		<?php echo $form->error($model,'content'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tags'); ?>
		<?php $this->widget('CAutoComplete', array(
			'model'=>$model,
			'attribute'=>'tags',
			'url'=>array('suggestTags'),
			'multiple'=>true,
			'htmlOptions'=>array('size'=>50),
		)); ?>
		<p class="hint">Please separate different tags with commas.</p>
		<?php echo $form->error($model,'tags'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->dropDownList($model,'status',Lookup::items('PostStatus')); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Preview',array('name'=>'previewPost')); ?>
		<?php //echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?> <!--ori-->
		<?php echo CHtml::submitButton($model->isNewRecord  ? 'Save' : 'Create', array('name'=>'submitPost')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<!---------------------------------------------- PREVIEW -------------------------------------------------->
<?php if(isset($_POST['previewPost']) && !$model->hasErrors()): ?>
<div class="view2">
<h3>Preview</h3>
<div class="post">
  <div class="title"><?php echo CHtml::encode($model->title); ?></div>
  <div class="author">posted by <?php echo Yii::app()->user->name . ' on ' . date('F j, Y',$model->create_time); ?></div>
  <div class="content"><?php echo $model->content; ?></div>
</div><!-- post preview -->
</div>
<?php endif; ?>