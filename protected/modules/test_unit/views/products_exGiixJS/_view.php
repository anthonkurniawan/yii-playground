<div class="view">
	<?php echo GxHtml::encode($data->getAttributeLabel('proID')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->proID), array('view', 'id' => $data->proID)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('catID')); ?>:
	<?php echo GxHtml::encode($data->catID); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('supID')); ?>:
	<?php echo GxHtml::encode($data->supID); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('item')); ?>:
	<?php echo GxHtml::encode($data->item); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('price')); ?>:
	<?php echo GxHtml::encode($data->price); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('type')); ?>:
	<?php echo GxHtml::encode($data->type); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('modelID')); ?>:
	<?php echo GxHtml::encode($data->modelID); ?>
	<br />
	<?php /*
	<?php echo GxHtml::encode($data->getAttributeLabel('itemDesc')); ?>:
	<?php echo GxHtml::encode($data->itemDesc); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('weight')); ?>:
	<?php echo GxHtml::encode($data->weight); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('createDate')); ?>:
	<?php echo GxHtml::encode($data->createDate); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('modifiedDate')); ?>:
	<?php echo GxHtml::encode($data->modifiedDate); ?>
	<br />
	*/ ?>

</div>