<?php $this->layout="column1"; ?>
<?php $this->breadcrumbs=array($this->id,); ?>
<h1><small>BOXES</small></h1>

<span class="label label-inverse">Basic Box </span> 
<?php
    $this->widget('bootstrap.widgets.TbBox', array(
    'title' => 'Basic Box',
    'headerIcon' => 'icon-home', //'icon-th-list',
    'content' => 'My Basic Content (you can use renderPartial here too :)) <br> atau bisa dgn contet <code>this->renderPartial("_view") </code>' // $this->renderPartial('_view')
    ));
?>

<div class="tpanel"> <!--- load model ------->
	<div class="toggle btn" style="float:right"><?php echo Yii::t('ui','View Code'); ?></div>
	<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP','tabSize'=>2));  ?> <!---Code view-->
	 $this->widget('bootstrap.widgets.TbBox', array(
		'title' => 'Basic Box',
		'headerIcon' => 'icon-home', //'icon-th-list',
		'content' => 'My Basic Content (you can use renderPartial here too :)) <br> atau bisa dgn contet <code>this->renderPartial("_view") </code>' // $this->renderPartial('_view')
    ));
	<?php $this->endWidget(); ?>
	</div>
<hr>

<!----------------------------------------------------- with custom content------------------------------------------------------->
<span class="label label-inverse">Advance Box </span> 
    <?php $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
		'title' => 'Advanced Box',
		'headerIcon' => 'icon-th-list',
		// when displaying a table, if we include bootstra-widget-table class
		// the table will be 0-padding to the box
		'htmlOptions' => array('class'=>'bootstrap-widget-table', 'style'=>'width:500px', )
		));?>
		<table class="table">
			<thead>
				<tr>
					<th>#</th>
					<th>First name</th>
					<th>Last name</th>
				</tr>
			</thead>
			<tbody>
				<tr class="odd">
					<td>1</td><td>Mark</td><td>Otto</td>
				</tr>
				<tr class="even">
					<td>2</td><td>Jacob</td><td>Thornton</td>
				</tr>
				<tr class="odd">
					<td>3</td><td>Stu</td><td>Dent</td>
				</tr>
			</tbody>
		</table>
    <?php $this->endWidget();?>

<div class="tpanel"> <!--- load model ------->
	<div class="toggle btn" style="float:right"><?php echo Yii::t('ui','View Code'); ?></div>
	<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP','tabSize'=>2));  ?> <!---Code view-->
	 $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
		'title' => 'Advanced Box',
		'headerIcon' => 'icon-th-list',
		// when displaying a table, if we include bootstra-widget-table class
		// the table will be 0-padding to the box
		'htmlOptions' => array('class'=>'bootstrap-widget-table', 'style'=>'width:500px', )
		));
		
		<table class="table">
			<thead>
				<tr>
					<th>#</th>
					<th>First name</th>
					<th>Last name</th>
				</tr>
			</thead>
			<tbody>
				<tr class="odd">
					<td>1</td><td>Mark</td><td>Otto</td>
				</tr>
				<tr class="even">
					<td>2</td><td>Jacob</td><td>Thornton</td>
				</tr>
				<tr class="odd">
					<td>3</td><td>Stu</td><td>Dent</td>
				</tr>
			</tbody>
		</table>
		
$this->endWidget();
<?php $this->endWidget(); ?>
	</div>
<hr>

<!-----------------------------------------------------Box with Actions------------------------------------------------------->
<span class="label label-inverse">Box with Actions </span> 
You can also set actions to a box, so they can nicely display on its right corner as a dropdown button -icon actions on the way :)
Heads Up! Now you can add any type of buttons to boxes

<?php
$this->widget('bootstrap.widgets.TbBox', array(
    'title' => 'test',
    'headerIcon' => 'icon-home',
	'htmlOptions'=>array('style'=>'width:700px',),
    'headerButtons' => array(
		array(
			'class' => 'bootstrap.widgets.TbButtonGroup',
			'type' => 'primary', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
			'buttons' => array(
				array('label' => 'Action', 'url' => '#'), // this makes it split :)
				array('items' => array(
					array('label' => 'Action', 'url' => '#'),
					array('label' => 'Another action', 'url' => '#'),
					array('label' => 'Something else', 'url' => '#'),
					'---',
					array('label' => 'Separate link', 'url' => '#'),
				)),
			)
		),
		array(
			'class' => 'bootstrap.widgets.TbButtonGroup',
			'buttons'=>array(
				array('label'=>'Left', 'url'=>'#'),
				array('label'=>'Middel', 'url'=>'#'),
				array('label'=>'Right', 'url'=>'#')
			),
		),
    ),
	'content' => 'Content (you can use renderPartial here too :)) <br> atau bisa dgn contet <code>this->renderPartial("_view") </code>'
));
?>

<div class="tpanel"> <!--- load model ------->
	<div class="toggle btn" style="float:right"><?php echo Yii::t('ui','View Code'); ?></div>
	<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP','tabSize'=>2));  ?> <!---Code view-->
	$this->widget('bootstrap.widgets.TbBox', array(
    'title' => 'test',
    'headerIcon' => 'icon-home',
	'htmlOptions'=>array('style'=>'width:700px',),
    'headerButtons' => array(
		array(
			'class' => 'bootstrap.widgets.TbButtonGroup',
			'type' => 'primary', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
			'buttons' => array(
				array('label' => 'Action', 'url' => '#'), // this makes it split :)
				array('items' => array(
					array('label' => 'Action', 'url' => '#'),
					array('label' => 'Another action', 'url' => '#'),
					array('label' => 'Something else', 'url' => '#'),
					'---',
					array('label' => 'Separate link', 'url' => '#'),
				)),
			)
		),
		array(
			'class' => 'bootstrap.widgets.TbButtonGroup',
			'buttons'=>array(
				array('label'=>'Left', 'url'=>'#'),
				array('label'=>'Middel', 'url'=>'#'),
				array('label'=>'Right', 'url'=>'#')
			),
		),
    )));
	<?php $this->endWidget(); ?>
	</div>
<hr>

<code> Optional header icon : 'icon-home', 'icon-th-list', </code>