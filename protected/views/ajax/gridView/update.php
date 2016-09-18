<?php $this->layout='null';?>
<?PHP print_r($_GET); ?> <!-------------------------------- TEST PARAM ---------------------------------->
<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'user-form',
			'enableAjaxValidation'=>false,
)); ?>
	
<script>	
function formSaved(data, textStatus, XMLHttpRequest) {	alert(data);
		//$.fn.yiiGridView.update('user-grid');
	}             // ga di kenal, ga di load/ beda page
</script>

<div class="form" style="border:1px #00F solid">

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
<table cellpadding="2" cellspacing="1" border="1">
	<tr><td>
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>15,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'username'); ?>
	</td>
	<td>
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('size'=>15,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'password'); ?>
	</td>
	
	<td>
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>30,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'email'); ?>
	</td>
	<td>
		<?php echo $form->labelEx($model,'first_name'); ?>
		<?php echo $form->textField($model,'first_name',array('size'=>15,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'first_name'); ?>
	</td>
	
	<td>
		<?php echo $form->labelEx($model,'role'); ?>
        <?php //echo $form->textField($model,'role'); ?> <!-- text input -->
        <?php echo $form->DropDownList($model,'role',$model->getList_distinct('role'),array('prompt'=>'-role-'));?>
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
		<?php //echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); //test param aja ?>
        <?php 
			echo CHtml::ajaxSubmitButton('Update <b>id :'.$model->id."</b>",
				array('ajax/Update', 'id'=>$model->id, 'ajax'=>'ajax'), 
				// array(
					// //'update'=>'#user-grid',
					// 'replace'=>'#reqData' 
				// ), 
				array( 'success'=>'formSaved'),  //window.setTimeout( 'window.location=msg ', 1000 );
				//array( 'success'=>'window.setTimeout(1000 )'), 
				array('type'=>'submit',)
			);  
		?>
    </td></tr>
</table>
</div>
<?php $this->endWidget(); ?>
