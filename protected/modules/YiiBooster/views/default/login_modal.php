<?php $this->pageTitle=Yii::app()->name . ' - Login'; ?>

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
    <h4>Login</h4>
</div>

<div class="modal-body">
	<?php $this->renderPartial('_login_modal', array('model'=>$model)); ?>
</div><!--modal-body-->


<?php $this->endWidget(); ?> <!--TbModal widget-->


 <!-------------- trigger button------------>
<?php 
// $this->widget('bootstrap.widgets.TbButton', array(
    // 'label'=>'Click me',
    // 'type'=>'primary',
    // 'htmlOptions'=>array(
        // 'data-toggle'=>'modal',
        // 'data-target'=>'#myModal',
    // ),
// )); 
?>
