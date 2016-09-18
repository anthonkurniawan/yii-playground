<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('proID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->proID),array('view','id'=>$data->proID)); ?>
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('type')); ?>:</b>
	<?php echo CHtml::encode($data->type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('modelID')); ?>:</b>
	<?php echo CHtml::encode($data->modelID); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('itemDesc')); ?>:</b>
	<?php echo CHtml::encode($data->itemDesc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('weight')); ?>:</b>
	<?php echo CHtml::encode($data->weight); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('createDate')); ?>:</b>
	<?php echo CHtml::encode($data->createDate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('modifiedDate')); ?>:</b>
	<?php echo CHtml::encode($data->modifiedDate); ?>
	<br />

	*/ ?>

</div>