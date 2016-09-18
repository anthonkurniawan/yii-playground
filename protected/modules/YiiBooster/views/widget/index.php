<!--<style>.container{width:1000px}</style>-->
<?php //dump( $this ); ?>
<?php
    $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'links'=>array('index'=>'#', ''),
    ));
?>

<h1>Miscellaneous <small>Lightweight utility Bootstrap CSS components</small> </h1>

<div class="page-header">
<h1>Example page header <small>Subtext for header</small></h1>
</div>

<ul>
	<li><span class="label label-important"> span class label label-important text</span></li>
	<li><code> code text </code></li>

	<li><div class="well">div class="well"</div></li>
	<li><div class="well well-large">div class="well well-large"</div></li>
	<li><code>class="pull-left"</code> float:left </li>
	<li><code>class="pull-right"</code> floar:right </li>
	<li><div class="muted"> class="muted" </div> <code>div class="muted"</code> </li>
	<li>
		<code> class="clearfix"</code> Clear the float on any element<br>
		<code> clearfix { *zoom: 1; &:before, &:after { display: table; content: ""; } &:after { clear: both;}	} </code>
	</li>
	
	
</ul>

<h3>Close icon</h3>
Use the generic close icon for dismissing content like modals and alerts.<br>
<button class="close">&times;</button>  <code>button class="close"</code> <br>
<a class="close" href="#">&times;</a>  <code>a href="#" class="close" for IOS device</code>

<h1><small>Labels</small></h1>
<span class="label">Default</span>
<span class="label label-success">Success</span>
<span class="label label-warning">Warning</span>
<span class="label label-important">Important</span>
<span class="label label-info">Info</span>
<span class="label label-inverse">Inverse</span> 

<h1><small>Badges</small></h1>
 <span class="badge">1</span>
<span class="badge badge-success">2</span>
<span class="badge badge-warning">4</span>
<span class="badge badge-important">6</span>
<span class="badge badge-info">8</span>
<span class="badge badge-inverse">10</span> 
<p>

<?php
$this->widget('bootstrap.widgets.TbBadge', array(
'type'=>'success', // 'success', 'warning', 'important', 'info' or 'inverse'
'label'=>'2',
));
?>

<!--------------------------------------------------------------- CODE VIEW ------------------------------------------------------------------->
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
</div><br><hr>

<!----------------------------------------------------------- TABS WIDGET ---------------------------------------------->
<h1><small>TABS WIDGET</small></h1>

<?php
$this->widget('bootstrap.widgets.TbTabs', array(
	'type'=>'tabs', // 'tabs' or 'pills'
	'stacked'=>false, //true like table right menu, false: default tab
	'placement'=>'above',  //above - default, right, bellow, or left
	'htmlOptions' => array('style'=>'width:300px', 'class'=>'pull-left' ),
	'tabs'=>array(
		array('label'=>'Home', 'content'=>'<i class="muted"> Basic Tabs </i>', 'active'=>true),
		//array('label'=>'Messages', 'content'=>'Messages Content'),
		array('label'=>'Disable', 'content'=>'Messages Content', 'itemOptions'=>array('class'=>'disabled')), // for gray links and no hover effects
		array('label' => 'DropDown', 'items' => array(
			array('label' => 'Item1', 'content' => 'Item1 Content'),
			array('label' => 'Item2', 'content' => 'Item2 Content')
		)),
	),
));
?>

<?php
$this->widget('bootstrap.widgets.TbTabs', array(
	'type'=>'pills', // 'tabs' or 'pills'
	'stacked'=>false, //true like table right menu, false: default tab
	'placement'=>'above',  //above - default, right, bellow, or left
	'htmlOptions' => array('style'=>'width:300px', 'class'=>'pull-right' ),
	'tabs'=>array(
		array('label'=>'Home', 'content'=>'<i class="muted">with option "type"=>"pills" </i>', 'active'=>true),
		array('label'=>'Profile', 'content'=>'Profile Content'),
		array('label'=>'Messages', 'content'=>'Messages Content'),
		array('label'=>'Disable', 'content'=>'Messages Content', 'itemOptions'=>array('class'=>'disabled')), // for gray links and no hover effects
	),
));
?><hr><br><br>

<?php
$this->widget('bootstrap.widgets.TbTabs', array(
	'type'=>'tabs', // 'tabs' or 'pills'
	'stacked'=>false, //true like table right menu, false: default tab
	'placement'=>'right',  //above - default, right, bellow, or left
	'htmlOptions' => array('style'=>'width:300px', 'class'=>'pull-left' ),
	'tabs'=>array(
		array('label'=>'Home', 'content'=>'<i class="muted"> With "placement"=>"right",</i>', 'active'=>true),
		array('label'=>'Profile', 'content'=>'Profile Content'),
		array('label'=>'Messages', 'content'=>'Messages Content'),
		array('label'=>'Disable', 'content'=>'Messages Content', 'itemOptions'=>array('class'=>'disabled')), // for gray links and no hover effects
	),
));
?>

<?php
$this->widget('bootstrap.widgets.TbTabs', array(
	'type'=>'pills', // 'tabs' or 'pills'
	'stacked'=>true, //true like table right menu, false: default tab
	'placement'=>'above',  //above - default, right, bellow, or left
	'htmlOptions' => array('style'=>'width:300px', 'class'=>'pull-right' ),
	'tabs'=>array(
		array('label'=>'Home', 'content'=>'Home Content', 'active'=>true),
		array('label'=>'Profile', 'content'=>'Profile Content'),
		array('label'=>'Messages', 'content'=>'Messages Content'),
		array('label'=>'Disable', 'content'=>'Messages Content', 'itemOptions'=>array('class'=>'disabled')), // for gray links and no hover effects
	),
));
?><hr><br><br>

<code> Optonal:  placement property: above, right, bellow, or left </code>

<div class="tpanel">
	<div class="toggle btn" style="float:right"><?php echo Yii::t('ui','View Code'); ?></div>
	<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP','tabSize'=>2));  ?> 
	$this->widget('bootstrap.widgets.TbTabs', array(
		'type'=>'tabs', // 'tabs' or 'pills'
		'stacked'=>false, //true like table right menu, false: default tab
		'placement'=>'right',  //above - default, right, bellow, or left
		'htmlOptions' => array('style'=>'width:300px', 'class'=>'pull-left' ),
		'tabs'=>array(
			array('label'=>'Home', 'content'=>'Home Content', 'active'=>true),
			array('label'=>'Profile', 'content'=>'Profile Content'),
			array('label'=>'Messages', 'content'=>'Messages Content'),
			array('label'=>'Disable', 'content'=>'Messages Content', 'itemOptions'=>array('class'=>'disabled')), // for gray links and no hover effects
			array('label' => 'DropDown', 'items' => array(
				array('label' => 'Item1', 'content' => 'Item1 Content'),
				array('label' => 'Item2', 'content' => 'Item2 Content')
			)),
		),
	));
	<?php $this->endWidget(); ?>
</div><br><br>

<div class="well well-small">
To align nav links, use the bootstrap .pull-left or .pull-right utility classes on its htmlOptions attribute. Both classes will add a CSS float in the specified direction.
</div>

<!---------------------------------------------------- Alerts ------------------------------------------->
<h1><small>Alerts Styles for success, warning, and error messages</small></h1>
<?php
Yii::app()->user->setFlash('success', '<strong>Well done!</strong> You successfully read this important alert message.');
$this->widget('bootstrap.widgets.TbAlert', array(
	'block'=>true, // display a larger alert block?
	'fade'=>true, // use transitions?
	'closeText'=>'×', // close link text - if set to false, no close link is displayed
	'alerts'=>array( // configurations per alert type
		'success'=>array('block'=>true, 'fade'=>true, 'closeText'=>'×'), // success, info, warning, error or danger
	),
));
?>

<div class="tpanel">
	<div class="toggle btn" style="float:right"><?php echo Yii::t('ui','View Code'); ?></div>
	<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP','tabSize'=>2));  ?> 
Yii::app()->user->setFlash('success', '<strong>Well done!</strong> You successfully read this important alert message.');
	$this->widget('bootstrap.widgets.TbAlert', array(
	'block'=>true, // display a larger alert block?
	'fade'=>true, // use transitions?
	'closeText'=>'×', // close link text - if set to false, no close link is displayed
	'alerts'=>array( // configurations per alert type
		'success'=>array('block'=>true, 'fade'=>true, 'closeText'=>'×'), // success, info, warning, error or danger
	),
));
	<?php $this->endWidget(); ?>
	
	
<!---------------------------------------------------- THUMB TbThumbnails ------------------------------------------->
<?php
$dataProvider=new CActiveDataProvider('Products');	//dump($dataProvider);

$this->widget('bootstrap.widgets.TbThumbnails', array(
'dataProvider'=>$dataProvider,
'template'=>"{items}\n{pager}",
'itemView'=>'_TbThumbnails',
));
?>
