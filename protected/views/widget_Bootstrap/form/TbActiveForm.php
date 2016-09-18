<style>.container{width:1000px}</style>

<?php
    $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'links'=>array('Widget'=>'#', 'TbActiveForm'),
    ));
?>

<!------------------------------------- TbActiveForm1 -------------------------------------->
<b> Vertical Form</b>
<?php $model=new LoginForm; ?>
<?php 
	$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'verticalForm',
    'htmlOptions'=>array('class'=>'well'),
    )); 
?>
     
    <?php echo $form->textFieldRow($model, 'username', array('class'=>'span3')); ?>
    <?php echo $form->passwordFieldRow($model, 'password', array('class'=>'span3')); ?>
    <?php echo $form->checkboxRow($model, 'rememberMe'); ?>
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>'Login')); ?>
     
<?php $this->endWidget(); ?>

<!------------------------------------------------------ CODE VIEW --------------------------------------------------------------->
<div class="tpanel"> <!--- load model ------->
	<b class="toggle txtHead"><?php echo Yii::t('ui','View Code'); ?></b>
	<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP'));  ?> 
	$model=new LoginForm; 

	$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
		'id'=>'verticalForm',
		'htmlOptions'=>array('class'=>'well'),
    )); 

    echo $form->textFieldRow($model, 'username', array('class'=>'span3')); 
    echo $form->passwordFieldRow($model, 'password', array('class'=>'span3')); 
    echo $form->checkboxRow($model, 'rememberMe'); 
    $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>'Login')); 
     
	$this->endWidget(); 
	<?php $this->endWidget(); ?>
</div>


<!------------------------------------- TbActiveForm2 -------------------------------------->
<b> Search Form</b>
<?php 
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
'id'=>'searchForm',
'type'=>'search',
'htmlOptions'=>array('class'=>'well'),
)); 
?>
<?php echo $form->textFieldRow($model, 'username', array('class'=>'input-medium', 'prepend'=>'<i class="icon-search"></i>')); ?>
<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>'Go')); ?>
 
<?php $this->endWidget(); ?>

<!------------------------------------------------------ CODE VIEW --------------------------------------------------------------->
<div class="tpanel"> <!--- load model ------->
	<b class="toggle txtHead"><?php echo Yii::t('ui','View Code'); ?></b>
	<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP'));  ?> 
	$model=new LoginForm; 

	$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
		'id'=>'searchForm',
		'type'=>'search',
		'htmlOptions'=>array('class'=>'well'),
	)); 

	echo $form->textFieldRow($model, 'username', array('class'=>'input-medium', 'prepend'=>'<i class="icon-search"></i>'));
	echo $form->textFieldRow($model, '', array('class'=>'input-medium', 'prepend'=>'<i class="icon-search"></i>')); 
	$this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>'Go')); 
     
	$this->endWidget(); 
	<?php $this->endWidget(); ?>
</div>

<!------------------------------------- TbActiveForm - INLINE -------------------------------------->
<b> Inline Form </b>
<?php $model=new LoginForm; ?>
<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
'id'=>'inlineForm',
'type'=>'inline',
'htmlOptions'=>array('class'=>'well'),
)); ?>
 
<?php echo $form->textFieldRow($model, 'username', array('class'=>'input-small')); ?>
<?php echo $form->passwordFieldRow($model, 'password', array('class'=>'input-small')); ?>
<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>'Log in')); ?>
 
<?php $this->endWidget(); ?>

<!------------------------------------------------------ CODE VIEW --------------------------------------------------------------->
<div class="tpanel"> <!--- load model ------->
	<b class="toggle txtHead"><?php echo Yii::t('ui','View Code'); ?></b>
	<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP'));  ?> 
	$model=new LoginForm; 

	$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
		'id'=>'inlineForm',
		'type'=>'inline',
		'htmlOptions'=>array('class'=>'well'),
	));
 
	echo $form->textFieldRow($model, 'username', array('class'=>'input-small')); 
	echo $form->passwordFieldRow($model, 'password', array('class'=>'input-small')); 
	$this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>'Log in')); 
     
	$this->endWidget(); 
	<?php $this->endWidget(); ?>
</div>


