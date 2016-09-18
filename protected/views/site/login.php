<?php 
	print_r($_POST); 
	echo "Yii::app()->user->returnUrl :". Yii::app()->user->returnUrl."<br>";
	echo Yii::app()->user->getReturnUrl()

?>
<?php
$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array('Login',);
?>
<?php //Yii::app()->_identity; ?>

<h1>Login</h1>

<p>Please fill out the following form with your login credentials:</p>

<!--------------------------------------- FORM---------------------------------------------------->
<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username'); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password'); ?>
		<?php echo $form->error($model,'password'); ?>
		<p class="hint">
			Hint: You may login with <tt>demo/demo</tt> or <tt>admin/admin</tt>.
		</p>
	</div>

	<div class="row rememberMe">
		<?php echo $form->checkBox($model,'rememberMe'); ?>
		<?php echo $form->label($model,'rememberMe'); ?>
		<?php echo $form->error($model,'rememberMe'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Login'); ?>
		<?php echo CHtml::resetButton('Reset'); ?>
	</div>
	
	<div class="row buttons">
		<?php echo CHtml::link('Forgot my  password', array('site/email_for_reset')); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->

