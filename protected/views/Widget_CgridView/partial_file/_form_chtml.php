<!---
<script src="../../js/jquery.form.js"></script> 

<form id="user-form" action="" method="post" enctype="multipart/form-data" >
		<input type="text" name="dumy_input" value="dummy input"/><br>
        <input type="file" name="myfile" id="myfile"  multiple onchange="loadImageFile();"><br>
        <input id="ajaxSubmit" type="submit" value="Upload File to Server" >	
</form>
-->

<!--------------------------------------------------------- CHTML ------------------------------------------------------------>
<style>.form{ font-size: 65%; } </style>			


<!--- http://malsup.com/jquery/form/#options-object -->
<script src="../../js/jquery.form.js"></script>
	<?php //cs()->registerScriptFile( bu('/js/jquery.form.js')); ?>
	
	<script>								//alert( $.fn.yiiactiveform.$('form').submit  );
		// (function() {
			// $('form').ajaxForm(); 
		// })();
		
		// $(document).ready(function() {
			// $('#user-form').ajaxForm({
				// target: '#submit'
			// });
		// });
		function kirim() {
			$('form').ajaxForm({
				//delegation: true,
				//target: '#submit',
				dataType: 'json',
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
		
		// (function() {
			// //$('form').ajaxForm(); 
			// $('#user-form').on('submit', function(e) {		
				// e.preventDefault(); // <-- important
				// $(this).ajaxSubmit({
					// target: '#submit'
				// });
			// });
		// })();
	</script>
	

<style>div .view2{ width: auto } </style>

<div class="form wide">		<!----class="wide form"-->

<fieldset style="width:550px"> 
<legend><?php echo $model->isNewRecord ? 'Create' : 'Update'  ?> User # <?php echo $model->id; ?></legend>

<?php echo CHtml::beginForm('', 'post', array('id'=>'user-form')); ?>

<?php echo CHtml::errorSummary($model); ?>

	<div class="row">
	<?php echo CHtml::activeLabelEx($model,"username"); ?>
	<?php echo CHtml::activeTextField($model,"username"); ?>
	<?php echo CHtml::error($model,"username"); ?>
	</div>

	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'password'); ?>
		<?php echo CHtml::activePasswordField($model,'password',array('size'=>30,'maxlength'=>50)); ?>
		<?php echo CHtml::error($model,'password'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'email'); ?>
		<?php echo CHtml::activeTextField($model,'email',array('size'=>30,'maxlength'=>50)); ?>
		<?php echo CHtml::error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'first_name'); ?>
		<?php echo CHtml::activeTextField($model,'first_name',array('size'=>30,'maxlength'=>50)); ?>
		<?php echo CHtml::error($model,'first_name'); ?>
	</div>

	<div class="row"> 
		<?php echo CHtml::activeLabelEx($model,'role'); ?>
        <?php //echo CHtml::activeTextField($model,'role'); ?> <!-- text input -->
        <?php echo CHtml::activeDropDownList($model,'role', $model->getList_distinct('role'),array('prompt'=>'-role-'));?>
		<?php echo CHtml::error($model,'role'); ?>
	</div>
	
	<div class="row"> 
		<?php echo CHtml::activeLabelEx($model,'active'); ?>
		<?php echo CHtml::activeDropDownList($model,'active',array(0=>'unactive', 1=>'active'),array('prompt'=>'-active-'));?>
		<?php echo CHtml::error($model,'active'); ?>
	</div>
	
	<!-------------------------------  PROPERTIES TBL DATA & PICS ------------------------------------->
	<div class="row"> 
		<?php //echo CHtml::activeLabelEx($model->TblDatas,'ket'); ?>
		<?php echo CHtml::activeLabelEx($model2,'ket'); ?>
		<?php echo CHtml::activeTextArea($model2,'ket',array('size'=>30,'maxlength'=>50, 'cols'=>30)); ?>
		<?php echo CHtml::error($model2,'ket'); ?>
	</div>
	<div class="row"> 
		<?php //echo CHtml::activeLabelEx($model->TblPics, 'filename_ori'); ?>
		<?php echo CHtml::activeLabelEx($model3, 'filename_ori'); ?>
		<?php echo CHtml::activeFileField($model3, 'filename_ori'); ?>
		<?php echo CHtml::error($model3, 'filename_ori'); ?>
	</div>
		
	<!-------------------- SUBMIT Button--------------->
	<div class="row buttons">
		<?php //echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', $htmlOptions=array('onclick'=>'event.preventDefault(); parent.$.fancybox.close();' ));    snytax: submitButton(string $label='submit', array $htmlOptions=array ( )) ?>
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('onclick'=>'js:kirim()')); ?>
		<?php //echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('id'=>'submit', 'onclick'=>'js:$(this).ajaxSubmit()')); ?>
		<?php //echo CHtml::ajaxSubmitButton($model->isNewRecord ? 'Create' : 'Save',  array('widget_CgridView/create')  ); ?>
	</div>
	
	  <!--activeFileField(CModel $model, string $attribute, array $htmlOptions=array ( ))
	fileField(string $name, string $value='', array $htmlOptions=array ( ))-->
	<?php if($model->TblPics["filename_ori"]) {  ?>
	<div class="row view2" style="top: 140px; left: 440px; position: absolute">
		<?php if($model->TblPics["filename_ori"]) echo tblPic::model()->pic($model->TblPics["filename_ori"],150,150);?><br>
		<span class="right"><?php echo $model->TblPics->filename_ori; ?></span>
	</div>
	<?php } ?>
	
	<!------------------------------------------------ INCLUDE FILE UPLOAD EXT-------------------------------------------->	
	<?php if( !Yii::app()->request->isAjaxRequest ) {  ?>
	<div class="row left">
		<?php //$this->renderPartial('partial_file/_formUpload'); ?>
	</div>
	<?php } ?>
 
	<?php echo CHtml::endForm(); ?>

	<span class="right">Fields with <span class="required">*</span> are required.</span><br>

</fieldset>
</div><!-- form -->
