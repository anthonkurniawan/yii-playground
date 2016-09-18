<?php $this->layout='column1';?> 
<?php $this->pageTitle=' Yii - Api System'; ?>

<style>
.container {width:1100px; } .myBox{ margin-right:3px }
</style>

<?php echo CHtml::link('Script Handler  ', array('scriptHandler/index'), array('target'=>'_blank')); ?>  | 
<?php echo CHtml::link('CHTML  ', array('testForm/index'), array('target'=>'_blank')); ?>
<br>

<?php
	$this->widget('zii.widgets.jui.CJuiTabs', array(
		//'headerTemplate'=>'{url}',
		'id'=>'tabs',
		'tabs'=>array(		//renderPartial(string $view, array $data=NULL, boolean $return=false, boolean $processOutput=false)
			'<span>Utility</span>'=>array('ajax'=>array('','view'=>'_utils'), 'id'=>'tab2' ),
			'<span>Tips&Trick</span>'=>array('ajax'=>array('','view'=>'_tips'), 'id'=>'tab1' ),
			'<span>Data Collection</span>'=>array('ajax'=>array('','view'=>'_data_collect'), 'id'=>'tab3' ),
			'<span>Error Handler</span>'=>array('ajax'=>array('','view'=>'_error_handler'), 'id'=>'tab4' ),
			//'<span>CactiveForm</span>'=>array( 'content'=>$this->renderPartial('CactiveForm', array('model'=>$model), true, true), 'id'=>'tab1' ),
			

		),
		// additional javascript options for the tabs plugin
		'options'=>array(
			'collapsible'=>true,
			'selected'=>0,
		),
		'htmlOptions'=>array(
			'style'=>'width:100%; overflow:auto; font-size: 10px'
		),
	));
?>

<script>
	$(function() {	
		$("#tabs").tabs({ spinner: "<em>Retrieving data...</em>" });
	});
</script>
