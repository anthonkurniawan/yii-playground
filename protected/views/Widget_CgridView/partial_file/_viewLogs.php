<?php
/* @var $this LogsController */
/* @var $data Logs */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('index')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->index), array('view', 'id'=>$data->index)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_user')); ?>:</b>
	<?php echo CHtml::encode($data->id_user); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('stamp')); ?>:</b>
	<?php echo CHtml::encode($data->stamp); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('event')); ?>:</b>
	<?php echo CHtml::encode($data->event); ?>
	<br />


</div>