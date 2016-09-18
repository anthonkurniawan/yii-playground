<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('proID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->proID), array('view', 'id'=>$data->proID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('catID')); ?>:</b>
	<?php echo CHtml::encode($data->catID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('supID')); ?>:</b>
	<?php echo CHtml::encode($data->supID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('item')); ?>:</b>
	<?php echo CHtml::encode($data->item); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('price')); ?>:</b>
	<?php echo CHtml::encode($data->price); ?>
	<br />


</div>