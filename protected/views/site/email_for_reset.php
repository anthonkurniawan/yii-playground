<?php
$this->pageTitle=Yii::app()->name . ' - Email For Reset ';
$this->breadcrumbs=array(
	'Email for Reset',
);

// Yii::import('bootstrap.widgets.input.*');
app()->bootstrap->init(); 
?>

<p class="alert alert-info"><?php echo  Yii::t('passwordreset','Please submit your email,we will send you a  password reset link.');?></p>

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

<div class="form">
	<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'email-form',
    'type'=>'horizontal',
	'enableClientValidation'=>true,
	'htmlOptions'=>array('class'=>'well'),
	'clientOptions'=>array(
   'validateOnSubmit'=>true,
	),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->textFieldRow($model, 'email', array('class'=>'span3'));?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit','type'=>'primary','label'=>'Submit', 'icon'=>'ok'));?>
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset','label'=>'Reset'));?>
	</div>

	<?php $this->endWidget(); ?>
</div>
