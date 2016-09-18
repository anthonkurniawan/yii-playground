<?php
$this->pageTitle=Yii::app()->name . ' - Register';
$this->breadcrumbs=array(
	'Register',
);

//Yii::import('bootstrap.widgets.input.*');
app()->bootstrap->init(); 
?>

<!------------------------------------------------ FLASH MSG -------------------------------------------->
<?php
	$flashMessages = Yii::app()->user->getFlashes();
	if ($flashMessages) {
		echo '<div class="flash-messages">';
		foreach ($flashMessages as $key => $message) {
			echo '<div class="alert alert-' . $key . '">' . "
						<a class='close' data-dismiss='alert'>×</a>
						{$message}
					</div>\n";
		}
		echo '</div>';
	}
?>

		
<p>Please register your account:</p>

<div class="form">
	<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'register-form',
    'type'=>'horizontal',
	'enableClientValidation'=>true,
	'htmlOptions'=>array('class'=>'well'),
	'clientOptions'=>array(
'validateOnSubmit'=>true,
	),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php
       echo $form->errorSummary($model)
         ?>
    <?php echo $form->textFieldRow($model, 'email', array('class'=>'span3'));?>
	<?php echo $form->textFieldRow($model, 'username', array('class'=>'span3'));?>
	<?php echo $form->passwordFieldRow($model, 'new_password', array('class'=>'span3'));?>
    <?php echo $form->passwordFieldRow($model, 'password_confirm', array('class'=>'span3 required'));?>

   <!-- <?php /*echo CHtml::activeLabel($model, 'verify_code'); */?>
    <?php /*$this->widget('application.extensions.recaptcha.EReCaptcha',
       array('model'=>$user, 'attribute'=>'verify_code',
             'theme'=>'red', 'language'=>'en',
             'publicKey'=>Yii::app()->params['recaptcha_public_key'] )); */?>
    --><?php /*echo CHtml::error($model, 'verify_code'); */?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit','type'=>'primary','label'=>'Submit', 'icon'=>'ok'));?>
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset','label'=>'Reset'));?>
	</div>

	<?php $this->endWidget(); ?>
</div><!-- form -->
