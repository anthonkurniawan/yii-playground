
<?php
    $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'links'=>array('Widget'=>'#', 'TbJsonGridView '),
    ));
?>

<?php
$this->menu=array(
	array('label'=>'List Products','url'=>array('index')),
	array('label'=>'Create Products','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('products-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('crud_default/_search',array( 'model'=>$model,)); ?>
</div><!-- search-form -->


<div class="well well-small"> 
<h1><small> TbJsonGridView Load Data Grid with pure AJAX</small></h1>
<ul>
	<li>With render partial _TbJsonGridView (more fast ajax respon ) not load all page</li>
	<li> tapi hanya bisa sort asc/desc one time secara berurut</li>
</ul></div>

<!------------------------------------- TbJsonGridView CONTENT-------------------------------------->
<?php $this->renderPartial('_TbJsonGridView',array('model'=>$model,)); ?>
<!------------------------------------- TbJsonGridView CONTENT-------------------------------------->

<div class="well well-small"> 
<h1><small> TbJsonPickerColumn</small></h1>
Displays any data you wish in a 'cool' picker dropdown box. The following code is an example of use, it calls an url via AJAX call and fills the content of the picker with its results.
<ul>
	<li>With render partial _TbJsonGridView (more fast ajax respon ) not load all page</li>
	<li> tapi hanya bisa sort asc/desc one time secara berurut</li>
</ul></div>

<div class="tpanel">
	<div class="toggle btn" style="float:right"><?php echo Yii::t('ui','View Code'); ?></div>
	<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP','tabSize'=>2));  ?>
	$this->widget('bootstrap.widgets.TbMenu', array(
	'type'=>'list',
	'htmlOptions' => array('style'=>'width:300px', ),
	'items' => array(
		array('label'=>'List header', 'itemOptions'=>array('class'=>'nav-header')),
		array('label'=>'Home', 'url'=>'#', 'itemOptions'=>array('class'=>'active')),
		array('label'=>'Library', 'url'=>'#'),
		array('label'=>'Another list header', 'itemOptions'=>array('class'=>'nav-header')),
		array('label'=>'Profile', 'url'=>'#'),
		'', //divider
		array('label'=>'Help', 'url'=>'#'),
	)
));
	<?php $this->endWidget(); ?>
</div><hr>


<div class="well well-small">
	<ul>
	<li>To align nav links, use the bootstrap <code>.pull-left or .pull-right</code> utility classes on its htmlOptions attribute. Both classes will add a CSS float in the specified direction. </li>
	<li>Wrap strings of text in an element with .navbar-text, usually on a <p> tag for proper leading and color.</li>
	<li>Setting the property fixed to false will make the navbar static..</li>
	<li>To implement a collapsing responsive navbar, just set the collapse property to true.</li>
	</ul>
</div>