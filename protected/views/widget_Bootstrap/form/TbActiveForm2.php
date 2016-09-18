<style>.container{width:1000px}</style>

<?php
    $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'links'=>array('Widget'=>'#', 'TbActiveForm2'),
    ));
?>

<span class="label label-important"> span class label label-important text</span>
<code> code text </code>

<div class="bs-docs-example">
...
</div>

<!------------------------------------- TbActiveForm1 -------------------------------------->
<h3> Vertical Form</h3>
<?php 
$model=new Products;
//$model2=new Stocks; 
?>

<?php /** @var BootActiveForm $form */
    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'horizontalForm',
    'type'=>'horizontal',
)); ?>
     
<fieldset>
		<legend style="text-align:right">Legend</legend>
		
	<!------------------- FIELD FORM ---------------------->
	<b> FIELD FORM </b><br>
	<?php //dump( "echo $form->textFieldRow($model, 'item', array('hint'=>'In addition to freeform text, any HTML5 text-based input appears like so.'));" ); ?>
    <?php echo $form->textFieldRow($model, 'item', array('hint'=>'In addition to freeform text, any HTML5 text-based input appears like so.')); ?>
	<?php echo $form->uneditableRow($model, 'supID', array('hint'=>'uneditableRow.')); ?>
    <?php echo $form->textFieldRow($model, 'contact', array('disabled'=>true, 'hint'=>'Disabled input')); ?>
    <?php echo $form->textFieldRow($model, 'sup_email', array('prepend'=>'@')); ?>
    <?php echo $form->textFieldRow($model, 'price', array('append'=>'.00')); ?>
	
	<div class="tpanel"> <!--- load model ------->
	<div class="toggle btn" style="float:right"><?php echo Yii::t('ui','View Code'); ?></div>
	<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP','tabSize'=>0));  ?> <!---Code view-->
	echo $form->textFieldRow($model, 'item', array('hint'=>'In addition to freeform text, any HTML5 text-based input appears like so.')); 
	echo $form->uneditableRow($model, 'supID'); 
    echo $form->textFieldRow($model, 'contact', array('disabled'=>true)); 
    echo $form->textFieldRow($model, 'sup_email', array('prepend'=>'@')); 
    echo $form->textFieldRow($model, 'price', array('append'=>'.00')); 
	<?php $this->endWidget(); ?>
	</div><hr>
	
	<!------------------- DATE/TIME FORM ---------------------->
	<b> DATE/TIME FORM  </b><br>
     <?php echo $form->datepickerRow($model, 'createDate', 
		array('hint'=>'Click inside! This is a super cool date field.', 'prepend'=>'<i class="icon-calendar"></i>')); ?>
    <?php echo $form->dateRangeRow($model, 'modifiedDate',
				array('hint'=>'Click inside! An even a date range field!.',
						'prepend'=>'<i class="icon-calendar"></i>',
						'options' => array('callback'=>'js:function(start, end){console.log(start.toString("MMMM d, yyyy") + " - " + end.toString("MMMM d, yyyy"));}')
			)); 
	?>
    <?php echo $form->timepickerRow($model, 'stk_createDate', array('hint'=>'Nice bootstrap time picker', 'append'=>'<i class="icon-time" style="cursor:pointer"></i>'));?>
	
	<div class="tpanel"> <!--- load model ------->
	<div class="toggle btn" style="float:right"><?php echo Yii::t('ui','View Code'); ?></div>
	<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP','tabSize'=>0));  ?> <!---Code view-->
	 echo $form->datepickerRow($model, 'createDate', 
		array('hint'=>'Click inside! This is a super cool date field.', 'prepend'=>'<i class="icon-calendar"></i>')); 
     echo $form->dateRangeRow($model, 'modifiedDate',
				array('hint'=>'Click inside! An even a date range field!.',
						'prepend'=>'<i class="icon-calendar"></i>',
						'options' => array('callback'=>'js:function(start, end){console.log(start.toString("MMMM d, yyyy") + " - " + end.toString("MMMM d, yyyy"));}')
			)); 
	
     echo $form->timepickerRow($model, 'stk_createDate', array('hint'=>'Nice bootstrap time picker', 'append'=>'<i class="icon-time" style="cursor:pointer"></i>'));
	<?php $this->endWidget(); ?>
	</div><hr>
	
	<!------------------- DROPDOWN FORM ---------------------->
	<b> DROPDOWN  </b><br>
    <?php echo $form->dropDownListRow($model, 'proID', array('Something ...', '1', '2', '3', '4', '5')); ?>
    <?php echo $form->dropDownListRow($model, 'proID', array('1', '2', '3', '4', '5'), array('multiple'=>true)); ?>
	
	<div class="tpanel"> <!--- load model ------->
	<div class="toggle btn" style="float:right"><?php echo Yii::t('ui','View Code'); ?></div>
	<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP','tabSize'=>2));  ?> <!---Code view-->
	echo $form->dropDownListRow($model, 'proID', array('Something ...', '1', '2', '3', '4', '5')); 
    echo $form->dropDownListRow($model, 'proID', array('1', '2', '3', '4', '5'), array('multiple'=>true)); 
	<?php $this->endWidget(); ?>
	</div><hr>
	
	<!------------------- SELECT FORM ---------------------->
	<b>SELECT FORM   </b><br>
	<b style="float:left; display:inline"> rselect2Row </b>
	<?php echo $form->select2Row($model, 'catName', 
				array('asDropDownList' => false, 
					'options' => array(
						'tags' => array('clever','is', 'better', 'clevertech'),
							'placeholder' => 'type clever, or is, or just type!',
							'width' => '40%',
							'tokenSeparators' => array(',', ' ')
					)
			));
	?>
	<div class="tpanel"> <!--- load model ------->
	<div class="toggle btn" style="float:right"><?php echo Yii::t('ui','View Code'); ?></div>
	<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP','tabSize'=>2));  ?> <!---Code view-->
    echo $form->select2Row($model, 'catName', 
				array('asDropDownList' => false, 
					'options' => array(
						'tags' => array('clever','is', 'better', 'clevertech'),
							'placeholder' => 'type clever, or is, or just type!',
							'width' => '40%',
							'tokenSeparators' => array(',', ' ')
					)
			));
	<?php $this->endWidget(); ?>
	</div><br><br>
	
	
	<span class="label label-info"> TbSelect2</span> 
	<?php     
	$this->widget('bootstrap.widgets.TbSelect2', array(
		'asDropDownList' => false,
		'name' => 'clevertech',
		'options' => array(
			'tags' => array('clever','is', 'better', 'clevertech'),
				'placeholder' => 'disciplines',
				'width' => '40%',
				'tokenSeparators' => array(',', ' ')
		)));	
	?>
	<a href="http://ivaynberg.github.com/select2/#basics" target="_blank">Docs site</a>
	
	<div class="tpanel"> <!--- load model ------->
	<div class="toggle btn" style="float:right"><?php echo Yii::t('ui','View Code'); ?></div>
	<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP','tabSize'=>2));  ?> <!---Code view-->
    $this->widget('bootstrap.widgets.TbSelect2', array(
		'asDropDownList' => false,
		'name' => 'clevertech',
		'options' => array(
			'tags' => array('clever','is', 'better', 'clevertech'),
				'placeholder' => 'disciplines',
				'width' => '40%',
				'tokenSeparators' => array(',', ' ')
		)));	
	<?php $this->endWidget(); ?>
	</div><hr>
	
	<!--------------------- BUTTON TONGLE ---------------------->
	<b>BUTTON / TONGLE  </b><br>
    <?php echo $form->toggleButtonRow($model, 'catID'); ?>
	<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP','tabSize'=>0));  ?> <!---Code view-->
	echo $form->toggleButtonRow($model, 'catID'); 
	<?php $this->endWidget(); ?>
	
	<!-------------------- CHECKBOX FORM ---------------------->
	<b> CHECKBOX FORM   </b><br>
    <?php echo $form->checkBoxRow($model, 'item', array('disabled'=>true)); ?>
    <?php echo $form->checkBoxListInlineRow($model, 'item', array('1', '2', '3')); ?>
    <?php echo $form->checkBoxListRow($model, 'item', array(
						'Option one is this and that—be sure to include why it\'s great',
						'Option two can also be checked and included in form results',
						'Option three can—yes, you guessed it—also be checked and included in form results',
					), 
					array('hint'=>'<strong>Note:</strong> Labels surround all the options for much larger click areas.')); 
	?>
	
	<div class="tpanel"> <!--- load model ------->
	<div class="toggle btn" style="float:right"><?php echo Yii::t('ui','View Code'); ?></div>
	<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP','tabSize'=>2));  ?> <!---Code view-->
	echo $form->checkBoxRow($model, 'item', array('disabled'=>true)); 
    echo $form->checkBoxListInlineRow($model, 'item', array('1', '2', '3')); 
    echo $form->checkBoxListRow($model, 'item', array(
						'Option one is this and that—be sure to include why it\'s great',
						'Option two can also be checked and included in form results',
						'Option three can—yes, you guessed it—also be checked and included in form results',
					), 
					array('hint'=>'<strong>Note:</strong> Labels surround all the options for much larger click areas.')); 
	<?php $this->endWidget(); ?>
	</div><hr>
	
	<!-------------------- RADIO FORM ---------------------->
	<b> RADIO BUTTON  </b><br>
    <?php echo $form->radioButtonRow($model, 'item'); ?>
    <?php echo $form->radioButtonListRow($model, 'item', array(
				'Option one is this and that—be sure to include why it\'s great',
				'Option two can is something else and selecting it will deselect option one', )); 
	?>
	
	<div class="tpanel"> <!--- load model ------->
	<div class="toggle btn" style="float:right"><?php echo Yii::t('ui','View Code'); ?></div>
	<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP','tabSize'=>2));  ?> <!---Code view-->
	echo $form->radioButtonRow($model, 'item'); ?>
    echo $form->radioButtonListRow($model, 'item', array(
		'Option one is this and that—be sure to include why it\'s great',
		'Option two can is something else and selecting it will deselect option one', )); 
	<?php $this->endWidget(); ?>
	</div><hr>
	
	<!-------------------- FILE FIELD FORM ---------------------->
	<b> FILE FIELD FORM </b><br>
	<?php echo $form->fileFieldRow($model, 'fileField'); ?>
	<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP','tabSize'=>0));  ?> <!---Code view-->
	echo $form->fileFieldRow($model, 'fileField'); 
	<?php $this->endWidget(); ?><hr>
	
	<!-------------------- WYSIWIG Editor FORM---------------------------->
	<b> WYSIWIG EDITOR FORM </b><p>
	
	<div class="view"> <span class="label label-info" style="float:right"> redactorRow </span><br>
	<?php echo $form->redactorRow($model, 'type', array('class'=>'span4', 'rows'=>5)); ?>
		<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP','tabSize'=>0));  ?>
		 echo $form->redactorRow($model, 'type', array('class'=>'span4', 'rows'=>5));
		<?php $this->endWidget(); ?> </div>
	
	<div class="view"><span class="label label-info" style="float:right"> textAreaRow </span><br>
    <?php echo $form->textAreaRow($model, 'itemDesc', array('class'=>'span8', 'rows'=>5)); ?>
		<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP','tabSize'=>0));  ?>
		echo $form->textAreaRow($model, 'itemDesc', array('class'=>'span8', 'rows'=>5));
		<?php $this->endWidget(); ?></div>
	
	<div class="view"> <span class="label label-info" style="float:right">html5EditorRow</span><br>
    <?php echo $form->html5EditorRow($model, 'modelID', array('class'=>'span4', 'rows'=>5, 'height'=>'200', 'options'=>array('color'=>true))); ?>
		<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP','tabSize'=>0));  ?>
		echo $form->html5EditorRow($model, 'modelID', array('class'=>'span4', 'rows'=>5, 'height'=>'200', 'options'=>array('color'=>true)));
		<?php $this->endWidget(); ?></div>
	
	<div class="view"> <span class="label label-info" style="float:right">ckEditorRow</span><br>
    <?php echo $form->ckEditorRow($model, 'company', array('options'=>array('fullpage'=>'js:true', 'width'=>'640', 'resize_maxWidth'=>'640','resize_minWidth'=>'320'))); ?>
		<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP','tabSize'=>0));  ?>
		echo $form->ckEditorRow($model, 'company', array('options'=>array('fullpage'=>'js:true', 'width'=>'640', 'resize_maxWidth'=>'640','resize_minWidth'=>'320')));
		<?php $this->endWidget(); ?> </div>
	
	<div class="view"> <span class="label label-info" style="float:right"> markdownEditorRow</span><br>
    <?php echo $form->markdownEditorRow($model, 'alamat', array('height'=>'200px')); ?>
		<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP','tabSize'=>0));  ?>
		echo $form->markdownEditorRow($model, 'alamat', array('height'=>'200px'));
		<?php $this->endWidget(); ?></div>
	
	<!------------------------ SUBMIT BUTTON ----------------------->
	<div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Submit')); ?>
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Reset')); ?>
    </div>
     
	<div class="tpanel"> <!--- load model ------->
	<div class="toggle btn" style="float:right"><?php echo Yii::t('ui','View Code'); ?></div>
	<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP','tabSize'=>0));  ?> <!---Code view-->
	$this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Submit')); 
    $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Reset'));
	<?php $this->endWidget(); ?>
	</div>
	
</fieldset>
     
    
	
<?php $this->endWidget(); ?> <!---ActiveForm---->

<!----------------------------RESULT POST------------------------>
<?php if($_POST) dump( $_POST); ?>

