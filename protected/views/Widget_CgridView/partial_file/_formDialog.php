<?php if( Yii::app()->request->isAjaxRequest ) {  
	echo "<i class='badge rigth'>from ajax request..</i>"; ?>  
	<style>.form{ font-size: 65%; } </style>

	<!------ REGISTER SCRIPT FOR UPLOAD (using ajxForm) -------->
	<script src="../../js/jquery.form.js"></script> 	gss
	
	<script>								//alert( $.fn.yiiactiveform.$('form').submit  );
		function kirim() {
			$('form').ajaxForm({
				//delegation: true,
				//target: '#submit',
				dataType: 'json',
				forceSync: true,
				//data: { key1: 'value1', key2: 'value2' },
				success: function(data) {	
					if (data.status == 'failure'){
						$('#dialog').dialog({'title':  data.title } );
						$('#dialog div.dialogContent').html(data.content);
					}
					else{	
						$('#dialog div.dialogContent').html(data.content);
						$.fn.yiiGridView.update('user-grid');	//refresh table
						setTimeout( "$('#dialog').dialog('close')" ,1000);
					}
				} 
			});
		}
	</script>
<?php } ?>

<style>div .view2{ width: auto } </style>

<div class="form wide">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'enableAjaxValidation'=>true,  
	'enableClientValidation'=>true,
	//'focus'=>array($model,'username'),	#atau as below
	'focus'=>'#'.CHtml::activeId($model,'username'),	// - $model->username input field
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
	#'htmlOptions' => array('enctype' => 'multipart/form-data', 'onsubmit'=>"startUpload();"),
	//'method'=>'get',  // default: POST
	//'action'=>'create',
)); ?>

<?php 
if( $model->isNewRecord )  
	echo $form->errorSummary( array($model, $model2, $model3)); 
 else 
	echo $form->errorSummary(array($model) ); 
 ?>
 
<fieldset > 

<legend><?php echo $model->isNewRecord ? 'Create' : 'Update'  ?> User # <?php echo $model->id; ?></legend>

<div class="left" >		<!----class="wide form"-->
	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?> <!--- label --->
		<?php echo $form->textField($model,'username',array('size'=>30,'maxlength'=>50)); ?><!-- input field -->
		<?php echo $form->error($model,'username'); ?>  <!-- ajax error -->
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('size'=>30,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>30,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'first_name'); ?>
		<?php echo $form->textField($model,'first_name',array('size'=>30,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'first_name'); ?>
	</div>
	
	<div class="row"> 
		<?php //echo $form->labelEx($model2,'ket'); ?>
		<?php //echo $form->textArea($model2,'ket',array('size'=>30,'maxlength'=>50, 'cols'=>30)); ?>
		<?php //echo $form->error($model2,'ket'); ?>
		<?php echo $form->labelEx($model,'ket'); ?>
		<?php echo $form->textArea($model->TblDatas,'ket',array('size'=>30,'maxlength'=>50, 'cols'=>30)); ?>
		<?php echo $form->error($model->TblDatas,'ket'); ?>
	</div>
	<!-------------------- SUBMIT Button--------------->
	<div class="row buttons">
		<?php //echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', $htmlOptions=array('onclick'=>'event.preventDefault(); parent.$.fancybox.close();' ));    snytax: submitButton(string $label='submit', array $htmlOptions=array ( )) ?>
		<?php //echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('onclick'=>'event.preventDefault(); ' ));   ?>
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('onclick'=>'js:kirim()')); ?>
	</div>
</div>


<div class="left" style="margin-left:0px">			<!----class="wide form"-->
	<div class="row"> 
		<?php echo $form->labelEx($model,'role'); ?>
        <?php //echo $form->textField($model,'role'); ?> <!-- text input -->
        <?php echo $form->DropDownList($model,'role', $model->getList_distinct('role'),array('prompt'=>'-role-'));?>
		<?php echo $form->error($model,'role'); ?>
	</div>
	
	<div class="row"> 
		<?php echo $form->labelEx($model,'active'); ?>
		<?php echo $form->DropDownList($model,'active',array(0=>'unactive', 1=>'active'),array('prompt'=>'-active-'));?>
		<?php echo $form->error($model,'active'); ?>
	</div>
	
	<div class="row"> 
		<?php echo $form->labelEx($model3, 'filename_ori'); ?>
		<?php echo $form->fileField($model3, 'filename_ori'); ?>
		<?php echo $form->error($model3, 'filename_ori'); ?>
	</div>
</div>

<!-------------------------------  PROPERTIES TBL DATA & PICS ------------------------------------->
<?php if($model->TblPics["filename_ori"]) {  ?>
	<div class="left view2" >
		<?php if($model->TblPics["filename_ori"]) echo tblPic::model()->pic($model->TblPics["filename_ori"],130,130);?><br>
		<span class="right"><?php echo $model->TblPics->filename_ori; ?></span>
	</div>
	<?php } ?>
	
<!------------------------------------------------ INCLUDE FILE UPLOAD EXT-------------------------------------------->	
<?php if( !Yii::app()->request->isAjaxRequest ) {  ?>
<div class="row left">
	<?php //$this->renderPartial('partial_file/_formUpload'); ?>
</div>
 <?php } ?>
 
 <div class="clear"></div>
 <span class="right">Fields with <span class="required">*</span> are required.</span><br>
 
 
<?php $this->endWidget(); ?>

</fieldset>
</div><!-- form -->


 
	
    