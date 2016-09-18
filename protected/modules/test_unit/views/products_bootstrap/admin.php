<?php $this->layout='column2_custom'; ?>
<?php Yii::app()->YiiBooster->init(); ?>

<pre> MASIH LOM BISA</pre>

<h1>Manage Products</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php print_r($model); ?>
<?php $this->widget('ext.GII.YiiBooster.widgets.TbGridView',array(
	'id'=>'products-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'proID',
		'catID',
		'supID',
		'item',
		'price',
		'type',
		/*
		'modelID',
		'itemDesc',
		'weight',
		'createDate',
		'modifiedDate',
		*/
		array(
			'class'=>'ext.GII.YiiBooster.widgets.TbButtonColumn',
		),
	),
)); ?>
