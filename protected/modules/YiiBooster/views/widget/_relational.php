<div class="well well-small">
<?php
	// example code for the view "_relational" that returns the HTML content
	echo CHtml::tag('h3',array(),'RELATIONAL DATA EXAMPLE ROW : "'.$id.'"');
	$this->widget('bootstrap.widgets.TbExtendedGridView', array(
		'type'=>'striped bordered',
		'dataProvider' => $gridDataProvider,
		'template' => "{items}",
		'columns' => array_merge(array(array('class'=>'bootstrap.widgets.TbImageColumn')),$gridColumns),
));

?>
</div>