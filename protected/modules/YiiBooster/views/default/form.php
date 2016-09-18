<style> .view_col { float:left; display:block; padding: 5px } </style>

<?php //$this->layout='/layouts/column1'; ?>
<?php
$this->pageTitle=Yii::app()->name .' - Module'; 
$this->breadcrumbs=array(
	$this->module->id,
);
?>

<div class="view_col">
<b> Button</b><br>
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

<div class="view_col">
<b> Single button group </b>
<?php
$this->widget('bootstrap.widgets.TbButtonGroup', array(
'buttons'=>array(
array('label'=>'Left', 'url'=>'#'),
array('label'=>'Middel', 'url'=>'#'),
array('label'=>'Right', 'url'=>'#')
),
));
?>
</div>

<div class="view_col">
<b> Vertical button groups </b><br>
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

<div class="view_col">
<b> Checkbox or radio button groups </b><br>
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

<div class="view_col">
<b> Split button dropdowns </b>
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
</div>

<div class="view_col">
<b> Basic Box </b>
<?php
    $this->widget('bootstrap.widgets.TbBox', array(
    'title' => 'Basic Box',
    'headerIcon' => 'icon-home',
    'content' => 'My Basic Content (you can use renderPartial here too :))' // $this->renderPartial('_view')
    ));
?>
</div>

<?php
//$model = $model=new TblUserMysql('search_join'); 
?>
<?php
    // $this->widget('bootstrap.widgets.TbExtendedGridView', array(
    // 'fixedHeader' => true,
    // 'headerOffset' => 40, // 40px is the height of the main navigation at bootstrap
    // 'type' => 'striped',
   // 'dataProvider'=>$model->search(),
    // 'responsiveTable' => true,
    // 'template' => "{items}",
   // // 'columns' => $gridColumns,
   // 'columns'=>array(
		// 'custID',
		// 'custName',
	// )
 // ));
?>

