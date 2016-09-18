<!--<style>.container{width:1000px}</style>-->

<?php
    $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'links'=>array('TbEditableField'=>'#', ''),
    ));
?>


<!------------------------------------------------------ Editable Widgets--------------------------------------------------------------->
<h3>TbEditableField Widget</h3>
<a href="http://yii-booster.clevertech.biz/components.html#editable" target="_blank" style="float:right">Docs site</a> <br>

<div>
bootstrap-editable.js, bootstrap.js, bootstrap-bootbox.min.js
</div>

<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP','tabSize'=>0));  ?> <!--- MODEL -->
$model=Products::model()->findByPk(1);  		
<?php $this->endWidget(); ?>


<div class="view">
<span class="label label-info" style="float:left"> type text</span><br>
<?php
$this->widget('bootstrap.widgets.TbEditableField', array(
'type' => 'text', //text, textarea, select, date
'model' => $model,
'attribute' => 'item',
'url' => $this->createUrl('site/editable'), //url for submit data
'enabled' => true
));
?>

<div class="tpanel"> <!--- load model ------->
	<div class="toggle btn" style="float:right"><?php echo Yii::t('ui','View Code'); ?></div>
	<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP','tabSize'=>0));  ?> <!---Code view-->
	$this->widget('bootstrap.widgets.TbEditableField', array(
		'type' => 'text', //text, textarea, select, date
		'model' => $model,
		'attribute' => 'item',
		'url' => $this->createUrl('site/editable'), //url for submit data
		'enabled' => true
	));
	<?php $this->endWidget(); ?>
	</div>
</div><br>

<div class="view">
<span class="label label-info" style="float:left"> type textarea</span><br>
<?php
$this->widget('bootstrap.widgets.TbEditableField', array(
'type' => 'textarea', //text, textarea, select, date
'model' => $model,
'attribute' => 'price',
'url' => $this->createUrl('site/editable'), //url for submit data
'enabled' => true
));
?>

<div class="tpanel"> <!--- load model ------->
	<div class="toggle btn" style="float:right"><?php echo Yii::t('ui','View Code'); ?></div>
	<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP','tabSize'=>0));  ?> <!---Code view-->
	$this->widget('bootstrap.widgets.TbEditableField', array(
		'type' => 'textarea', //text, textarea, select, date
		'model' => $model,
		'attribute' => 'price',
		'url' => $this->createUrl('site/editable'), //url for submit data
		'enabled' => true
	));
	<?php $this->endWidget(); ?>
	</div>
</div><br>


<div class="view">
<span class="label label-info" style="float:left"> type select</span><br>
<?php
$this->widget('bootstrap.widgets.TbEditableField', array(
    'type' => 'select',
    'model' => $model,
    'attribute' => 'catID',
    'url' => $this->createUrl('site/editable'), //url for submit data
    'source' => array('1', 'Antonio', 'Ramirez', 'Cobos', 'Works', 'At', 'Clevertech'),
    'enabled' => true
 ));	
?>

<div class="tpanel"> <!--- load model ------->
	<div class="toggle btn" style="float:right"><?php echo Yii::t('ui','View Code'); ?></div>
	<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP','tabSize'=>0));  ?> <!---Code view-->
	$this->widget('bootstrap.widgets.TbEditableField', array(
		'type' => 'textarea', //text, textarea, select, date
		'model' => $model,
		'attribute' => 'catID',
		'url' => $this->createUrl('site/editable'), //url for submit data
		'enabled' => true
	));
	<?php $this->endWidget(); ?>
	</div>
</div><br>

<div class="view">
<span class="label label-info" style="float:left"> type date</span><br>
<?php
$this->widget('bootstrap.widgets.TbEditableField', array(
    'type' => 'date',
	'model' => $model,
	'attribute' => 'createDate',
	'url' => $this->createUrl('site/editable'), //url for submit data
	'format' => 'dd-mm-yyyy',
	'viewformat' => 'dd/mm/yyyy',
	'placement' => 'right',
	'enabled' => true
 ));	
?>

<div class="tpanel"> <!--- load model ------->
	<div class="toggle btn" style="float:right"><?php echo Yii::t('ui','View Code'); ?></div>
	<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP','tabSize'=>0));  ?> <!---Code view-->
	$this->widget('bootstrap.widgets.TbEditableField', array(
		'type' => 'date',
		'model' => $model,
		'attribute' => 'createDate',
		'url' => $this->createUrl('site/editable'), //url for submit data
		'format' => 'dd-mm-yyyy',
		'viewformat' => 'dd/mm/yyyy',
		'placement' => 'right',
		'enabled' => true
	));
	<?php $this->endWidget(); ?>
</div>
</div><br>
   