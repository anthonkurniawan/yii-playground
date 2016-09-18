<?php $this->layout="column1"; ?>

<style> .view_col { float:left; display:block; padding: 5px } </style>
<?php $this->breadcrumbs=array($this->id,); ?>
 
<div class="pull-left well well-small">
<b style="float:left"> TbButton</b><br>
<?php
$this->widget('bootstrap.widgets.TbButton',array(
'label' => 'Primary',
'type' => 'primary',
'size' => 'large'     // large, small, or mini.
));
$this->widget('bootstrap.widgets.TbButton',array(
'label' => 'Secondary',
'size' => 'small'
));
?>
</div>

<div class="pull-left well well-small">
<b style="float:left"> Single button group </b><br>
<?php
$this->widget('bootstrap.widgets.TbButtonGroup', array(
'buttons'=>array(
array('label'=>'Left', 'url'=>'#'),
array('label'=>'Middel', 'url'=>'#'),
array('label'=>'Right', 'url'=>'#')
),
));
?>

<div class="btn-toolbar">
<?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
'buttons'=>array(
array('label'=>'1', 'url'=>'#'),
array('label'=>'2', 'url'=>'#'),
array('label'=>'3', 'url'=>'#'),
array('label'=>'4', 'url'=>'#'),
),
)); ?>
</div>
</div>

<div class="pull-left well well-small">
<b style="float:left"> Vertical button groups </b><br>
<?php
$this->widget('bootstrap.widgets.TbButtonGroup', array(
'stacked'=>true,
'buttons'=>array(
array('buttonType'=>'button', 'url'=>'#', 'icon'=>'align-left'),
array('buttonType'=>'button', 'url'=>'#', 'icon'=>'align-center'),
array('buttonType'=>'button', 'url'=>'#', 'icon'=>'align-right'),
array('buttonType'=>'button', 'url'=>'#', 'icon'=>'align-justify'),
),
));
?>
</div>

<div class="pull-left well well-small">
<b style="float:left"> Checkbox or radio button groups </b><br>
<?php
$this->widget('bootstrap.widgets.TbButtonGroup', array(
'type' => 'primary',
'toggle' => 'radio',
'buttons' => array(
array('label'=>'Left'),
array('label'=>'Middle'),
array('label'=>'Right'),
),
));
?><p>

<?php
$this->widget('bootstrap.widgets.TbButtonGroup', array(
'type' => 'primary',
'toggle' => 'checkbox',
'buttons' => array(
array('label'=>'Left'),
array('label'=>'Middle'),
array('label'=>'Right'),
),
));
?>
</div>

<div class="pull-left well well-small">
<b style="float:left"> Split button dropdowns </b><br>

<?php
$this->widget('bootstrap.widgets.TbButtonGroup', array(
'type' => 'primary', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
'buttons' => array(
array('label' => 'Action', 'url' => '#'), // this makes it split :)
array('items' => array(
array('label' => 'Action', 'url' => '#'),
array('label' => 'Another action', 'url' => '#'),
array('label' => 'Something else', 'url' => '#'),
array('label' => 'Separate link', 'url' => '#'),
)),
),
));
?>

<?php
$this->widget('bootstrap.widgets.TbButtonGroup', array(
'htmlOptions' => array('class'=>'dropup'), // easy stuff
'buttons' => array(
array('label' => 'Action', 'url' => '#'),
array('items' => array(
array('label' => 'Action', 'url' => '#'),
array('label' => 'Another action', 'url' => '#'),
array('label' => 'Something else', 'url' => '#'),
'---',
array('label' => 'Separate link', 'url' => '#'),
)),
),
));
?>
</div>

<div class="pull-left well well-small">
Works with all button sizes
<code> 'size'=>'large', 'size'=>'small', or 'size'=>'mini' </code><br>
Works with all button Type
<code>'type'=>'inverse', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse </code>
</div>
<hr>
<!--------------------------------------------------------- BOX ---------------------------------------------------------->

<b style="float:left"> Basic Box </b><br>
<?php
    $this->widget('bootstrap.widgets.TbBox', array(
    'title' => 'Basic Box',
    'headerIcon' => 'icon-home', //'icon-th-list',
    'content' => 'My Basic Content (you can use renderPartial here too :)) <br> atau bisa dgn contet <code>this->renderPartial("_view") </code>' // $this->renderPartial('_view')
    ));
?>
<code> Optional header icon : 'icon-home', 'icon-th-list', </code>



