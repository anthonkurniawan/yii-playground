<?php $this->layout='column1';?> 
	
<?php if( Yii::app()->request->isAjaxRequest ) {  echo "test: ini dari ajax request"; ?>  
<style>
.form{ font-size: 62.5%; } .left{margin-right:5px}
</style>
<?php } ?>	


<?php $this->pageTitle=Yii::app()->name . ' - FORM'; ?>
<?php $this->breadcrumbs=array('Test Form',);?>

<div class="view2">
	<b class="badge">normalizeUrl() </b> <code>normalizeUrl(mixed $url)</code> <br>	
	<code>echo CHtml::normalizeUrl( array('post/list', 'page'=>3) </code> <?php echo CHtml::normalizeUrl( array('post/list', 'page'=>3) ); ?> 
	<p>
	<b class="badge">createUrl() </b> <code>createUrl(string $route, array $params=array ( ), string $ampersand='&')</code> <br>
	<code>echo Yii::app()->createUrl( 'site/index', array( 'param'=>'value')  ); </code>
	<?php echo Yii::app()->createUrl( 'site/index', array( 'param'=>'value')  ); ?>
</div>

<a href="http://localhost/yii/demos/Yii-Playground/index.php/en/site/widget?view=maskedtextfield" target="_blank">CMaskedTextField</a></b>

<!--- FLASH MSG -->
<?php if(Yii::app()->user->hasFlash('msg')) {  ?>
	<div class="flash-success"> <?php echo Yii::app()->user->getFlash('msg'); ?> </div>
<?php } ?>

<?php
	$this->widget('zii.widgets.jui.CJuiTabs', array(
		//'headerTemplate'=>'{url}',
		'id'=>'tabs',
		'tabs'=>array(		//renderPartial(string $view, array $data=NULL, boolean $return=false, boolean $processOutput=false)
			'<span>CactiveForm</span>'=>array('ajax'=>array('','view'=>'CactiveForm'), 'id'=>'tab0'),
			'<span>CHtml Form</span>'=>array('ajax'=>array('','view'=>'CHtmlForm'), 'id'=>'tab1'),
			'<span>CHtml Button</span>'=>array('ajax'=>array('','view'=>'inputBtn'), 'id'=>'tab2'),
			'<span>CHtml Text</span>'=>array('ajax'=>array('','view'=>'inputTxt'), 'id'=>'tab4' ),
			'<span>CHtml Link</span>'=>array('ajax'=>array('','view'=>'inputLink'), 'id'=>'tab5' ),
			'<span>sample input batch</span>'=>array('ajax'=>array('testForm/inputBatch'), 'id'=>'tab7'),
			//'<span>Client Script handle</span>'=>array( 'content'=>$this->renderPartial('script_handle', null, true), 'id'=>'tab8' ),
			
			'<span>Design</span>'=>array('content'=>$this->renderPartial('design', null, true), 'id'=>'tab11'),
		),
		// additional javascript options for the tabs plugin
		'options'=>array(
			'collapsible'=>true,
			'selected'=>5,
		),
		'htmlOptions'=>array(
			'style'=>'width:100%; overflow:auto; font-size: 10px'
		),
	));
?>


