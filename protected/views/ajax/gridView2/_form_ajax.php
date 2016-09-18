
<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'user-form',
			//'enableAjaxValidation'=>false,
			'enableClientValidation'=>true,
)); ?>

<div class="form" style="border:1px #F90 solid">
<B>DI SINI SETIAP INPUT FIELD GW RUBAH ID NYA COZ BENTROK (TAPI "enableClientValidation" JD GA JALAN)</B>
	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
<table cellpadding="2" cellspacing="1" border="1">
	<tr><td>
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>15,'maxlength'=>50,'id'=>'username')); ?>
        <?php //echo CHtml::activeTextField($model,"username"); ?>
		<?php echo $form->error($model,'username'); ?>
	</td>
	<td>
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('size'=>15,'maxlength'=>50,)); ?>
		<?php echo $form->error($model,'password'); ?>
	</td>
	
	<td>
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>30,'maxlength'=>50,'id'=>'email')); ?>
		<?php echo $form->error($model,'email'); ?>
	</td>
	<td>
		<?php echo $form->labelEx($model,'first_name'); ?>
		<?php echo $form->textField($model,'first_name',array('size'=>15,'maxlength'=>50,'id'=>'first_name')); ?>
		<?php echo $form->error($model,'first_name'); ?>
	</td>
	
	<td>
		<?php echo $form->labelEx($model,'role'); ?>
        <?php //echo $form->textField($model,'role'); ?> <!-- text input -->
        <?php echo $form->DropDownList($model,'role',$model->getList_distinct('role'),array('prompt'=>'-role-', 'id'=>'role'));?>
		<?php echo $form->error($model,'role'); ?>
	</td>
    </tr>
    <!-------------  tambah utk field(ket) ------------------------->
    <!--<td>
		<?php //echo $form->labelEx($model,'ket'); ?>
		<?php //echo $form->textField($model,'ket'); ?>
		<?php //echo $form->error($model,'ket'); ?>
	</td>-->

	<tr><td colspan="5">
    	<?php //echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); //cara post biasa (refresh)?>
    	
		<?php echo CHtml::hiddenField('id', 0, array('id'=>'id')); //get id record?>
        <?php 
			// echo CHtml::ajaxSubmitButton('Submit request',
				// array('ajax/update'),array('update'=>'#user-grid',),array('type'=>'submit',)
				// );
		?>
        <?php echo CHtml::ajaxButton('Save', $this->createUrl('userinputSave'),
				array('type'=>'POST', 'success'=>'formSaved'), array('disabled'=>"disabled", 'id'=>'save_btn')); ?> ini yg di pake
    </td></tr>
</table>
</div>
<?php $this->endWidget(); ?>

<?php //echo CHtml::activeTextField($model,"username", array('id'=>'TblUserMysql_test','onClick'=>'alert($(this).attr("id"));')); ?>