<?php //$this->layout='/layouts/column1'; ?>
<?php
$this->pageTitle=$this->module->id; 
$this->breadcrumbs=array(
	$this->module->id,
);
?>

<!----------------------------------------------------------- THE WIDGET ----------------------------------------------------->
<?php 
	$this->beginWidget('bootstrap.widgets.TbModal', array(
		'id'=>'myModal', 
		'autoOpen'=>true,	#default false
		'fade'=>true,	#default false
		'options'=>array(), 	#options for the Bootstrap Javascript plugin.
		'events'=>array(), 	#@var string[] the Javascript event handlers.
		'htmlOptions'=>array()
	)); 
?>
 
<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h4>Modal header</h4>
</div>
 
<div class="modal-body">
    <p>One fine body...</p>
</div>
 
 <!-------------- modal button ------------>
<div class="modal-footer">
    <?php $this->widget('bootstrap.widgets.TbButton', array(
        'type'=>'primary',
        'label'=>'Save changes',
        'url'=>'#',
        'htmlOptions'=>array('data-dismiss'=>'modal'),
    )); ?>
	
    <?php $this->widget('bootstrap.widgets.TbButton', array(
        'label'=>'Close',
        'url'=>'#',
        'htmlOptions'=>array('data-dismiss'=>'modal'),
    )); ?>
</div>
 
<?php $this->endWidget(); ?>


 <!-------------- trigger button------------>
<?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>'Click me',
    'type'=>'primary',
    'htmlOptions'=>array(
        'data-toggle'=>'modal',
        'data-target'=>'#myModal',
    ),
)); ?>
