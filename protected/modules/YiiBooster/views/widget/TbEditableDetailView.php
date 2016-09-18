<!--<style>.container{width:1000px}</style>-->

<?php
    $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'links'=>array('TbEditableField'=>'#', ''),
    ));
?>


<!------------------------------------------------------ Editable Widgets--------------------------------------------------------------->
<h3>TbEditableField Widget</h3>

<div>
 Makes editable several attributes of single model, shown as name-value table. Just define editable section inside attribute config. Only safe attributes become editable.<br>
 For more information: please visit <a href="http://www.ybe.demopage.ru/#EditableDetailView" target="_blank" style="float:right">EditableDetailView </a> 
 
Load JS/CSS :<br>
bootstrap-editable.js, bootstrap.js, bootstrap-bootbox.min.js
</div>

<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP','tabSize'=>2));  ?> <!--- MODEL -->
$model=Products::model()->findByPk(1);  		
<?php $this->endWidget(); ?>

<div class="view">
<span class="label label-info" style="float:left">TbEditableDetailView</span><br>
<?php
    $this->widget('bootstrap.widgets.TbEditableDetailView', array(
		'id' => 'region-details',
		'data' =>Products::model()->findByPk(1),
		'url' => $this->createUrl('site/editable'), //common submit url for all editables
		'attributes'=>array(
			'item',
			'price',
		)
    ));
?>

<div class="tpanel"> <!--- load model ------->
	<div class="toggle btn" style="float:right"><?php echo Yii::t('ui','View Code'); ?></div>
	<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP','tabSize'=>2));  ?> <!---Code view-->
	$this->widget('bootstrap.widgets.TbEditableDetailView', array(
		'id' => 'region-details',
		'data' =>Products::model()->findByPk(1),
		'url' => $this->createUrl('site/editable'), //common submit url for all editables
		'attributes'=>array(
			'item',
			'price',
		)
    ));
	<?php $this->endWidget(); ?>
	</div>
</div>

<!---------------------------------------------------- TbEditableColumn -------------------------------------------------->
<h3>TbEditableColumn  Widget</h3>
<div>
 Do not get confused with TbJEditableColumn, this is the 
 <a href="http://ybe.demopage.ru/#EditableColumn" target="_blank"> EditableColumn </a> widget from 
<a href="http://www.yiiframework.com/user/56359/" target="_blank"> Vitaliy Potapov. </a> 
Important: Choose between TbJEditableColumn or TbEditableColum, both types have conflicts if you are trying to use them together. 
 
Load JS/CSS :<br>
bootstrap-editable.js, bootstrap.js, bootstrap-bootbox.min.js
</div>

<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP','tabSize'=>2));  ?> <!--- MODEL -->
$model=Products::model()->findByPk(1);  		
<?php $this->endWidget(); ?>

<div class="view">
<span class="label label-info" style="float:left">TbEditableDetailView</span><br>
<?php
    $this->widget('bootstrap.widgets.TbGridView', array(
		'type' => 'striped bordered',
		'dataProvider' => new CActiveDataProvider('Products',array(
			'criteria'=>array('condition'=>'proID < 50'))
		),
		//'dataProvider' =>$model,
		'template' => "{items}",
		'columns' => array(
		'proID', 'item', 
		array(
			'class' => 'bootstrap.widgets.TbEditableColumn',
			'name' => 'price',
			'sortable'=>false,
			'editable' => array(
				'url' => $this->createUrl('site/editable'),
				'placement' => 'right',
				'inputclass' => 'span3'
			)
		)),
    ));
?>

<div class="tpanel"> <!--- load model ------->
	<div class="toggle btn" style="float:right"><?php echo Yii::t('ui','View Code'); ?></div>
	<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP','tabSize'=>2));  ?> <!---Code view-->
	 $this->widget('bootstrap.widgets.TbGridView', array(
		'type' => 'striped bordered',
		'dataProvider' => new CActiveDataProvider('Products',array(
			'criteria'=>array('condition'=>'proID < 50'))
		),
		//'dataProvider' =>$model,
		'template' => "{items}",
		'columns' => array(
		'proID', 'item', 
		array(
			'class' => 'bootstrap.widgets.TbEditableColumn',
			'name' => 'price',
			'sortable'=>false,
			'editable' => array(
				'url' => $this->createUrl('site/editable'),
				'placement' => 'right',
				'inputclass' => 'span3'
			)
		)),
    ));
	<?php $this->endWidget(); ?>
	</div>
</div>