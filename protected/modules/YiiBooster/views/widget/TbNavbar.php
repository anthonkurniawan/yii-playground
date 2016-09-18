
<?php
    $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'links'=>array('Widget'=>'#', 'TbNavbar'),
    ));
?>

$this->id . '/' . $this->action->id; <?php echo $this->id . '/' . $this->action->id; ?>
<h1><small>TbMenu</small></h1>

<!------------------------------------- TbMenu -------------------------------------->
<?php
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
?>
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


<?php $this->widget('bootstrap.widgets.TbMenu', array(
    'type'=>'list',
    'items'=>array(
        array('label'=>'LIST HEADER'),
        array('label'=>'Home', 'icon'=>'home', 'url'=>'#', 'active'=>true),
        array('label'=>'Library', 'icon'=>'book', 'url'=>'#'),
        array('label'=>'Application', 'icon'=>'pencil', 'url'=>'#'),
        array('label'=>'ANOTHER LIST HEADER'),
        array('label'=>'Profile', 'icon'=>'user', 'url'=>'#'),
        array('label'=>'Settings', 'icon'=>'cog', 'url'=>'#'),
        array('label'=>'Help', 'icon'=>'flag', 'url'=>'#'),
    ),
)); ?>

<!------------------------------------- TbNavbar1 -------------------------------------->
<h1><small>TbNavbar</small></h1>

<?php
$this->widget('bootstrap.widgets.TbNavbar', array(
	'brand' => 'Title',
	'fixed' => false, //kalo ga di set akan override main menu!!  //false, true, top, bottom
	'items' => array(
		array(
			'class' => 'bootstrap.widgets.TbMenu',
			'items' => array(
				array('label'=>'Home', 'url'=>'#', 'active'=>true),
				array('label'=>'Link', 'url'=>'#'),
			)
		)
	)
));
?>

<div class="tpanel">
	<div class="toggle btn" style="float:right"><?php echo Yii::t('ui','View Code'); ?></div>
	<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP','tabSize'=>2));  ?>
	$this->widget('bootstrap.widgets.TbNavbar', array(
	'brand' => 'Title',
	'fixed' => false, //kalo ga di set akan override main menu!!  //false, true, top, bottom
	'items' => array(
		array(
			'class' => 'bootstrap.widgets.TbMenu',
			'items' => array(
				array('label'=>'Home', 'url'=>'#', 'active'=>true),
				array('label'=>'Link', 'url'=>'#'),
			)
		))
	));
	<?php $this->endWidget(); ?>
</div><hr>

<?php
$this->widget('bootstrap.widgets.TbNavbar', array(
	'brand' => 'Title',
	'fixed' => false,
	'items' => array(
		'<form class="navbar-form pull-left">
			<input type="text" class="span2">
			<button type="submit" class="btn">Submit</button>
		</form>'
	)
));
?>
<!------------------------------------------------------ CODE VIEW --------------------------------------------------------------->
<div class="tpanel">
	<div class="toggle btn" style="float:right"><?php echo Yii::t('ui','View Code'); ?></div>
	<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP','tabSize'=>2));  ?>
	$this->widget('bootstrap.widgets.TbNavbar', array(
	'brand' => 'Title',
	'fixed' => false,
	'items' => array(
		'<form class="navbar-form pull-left">
			<input type="text" class="span2">
			<button type="submit" class="btn">Submit</button>
		</form>'
		)
	));
	<?php $this->endWidget(); ?>
</div><hr>

<!------------------------------------- TbNavbar2 -------------------------------------->
<?php
    $this->widget('bootstrap.widgets.TbNavbar', array(
    'brand' => 'Title',
    'fixed' => false,  //false, true, top, bottom
    'items' => array(
    '<form class="navbar-search pull-left">
    <input type="text" class="search-query" placeholder="search">
    <button type="submit" class="btn">Submit</button>
    </form>'
    )
    ));	
?>
<!------------------------------------------------------ CODE VIEW --------------------------------------------------------------->
<div class="tpanel">
	<div class="toggle btn" style="float:right"><?php echo Yii::t('ui','View Code'); ?></div>
	<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP','tabSize'=>2));  ?>
	$this->widget('bootstrap.widgets.TbNavbar', array(
    'brand' => 'Title',
    'fixed' => false, //false, true, top, bottom
    'items' => array(
    '<form class="navbar-search pull-left">
    <input type="text" class="search-query" placeholder="search">
    <button type="submit" class="btn">Submit</button>
    </form>'
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