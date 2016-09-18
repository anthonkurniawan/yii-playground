<?php
$this->pageTitle=Yii::app()->name . ' Script'; 
$this->breadcrumbs=array('Script',);
?>

<b class="txtTitle">Scrip Handle on YII</b>
<a href="http://localhost/yiidoc/CClientScript.html" target="_blank" style="float:right">register ClientScript</a><br>

<div class="tpanel left">
	<div class="toggle btn"><?php echo Yii::t('ui','getclientScript(CClientScript)'); ?></div>
	<div class="scroll"><?php //dump(Yii::app()->getclientScript()); ?></div>
</div>

<div class="tpanel left">
	<div class="toggle btn"><?php echo Yii::t('ui','assetManager(CAssetManager)'); ?></div>
	<div class="scroll"><?php  //dump( Yii::app()->assetManager ); ?></div>
</div>

<?php
	$this->widget('zii.widgets.jui.CJuiTabs', array(
		//'headerTemplate'=>'{url}',
		'id'=>'tabs',
		'tabs'=>array(
			'<span>Client Script handle</span>'=>array('ajax'=>array('','view'=>'script_handle'), 'id'=>'tab1'),
			'<span>ClientScript method</span>'=>array('ajax'=>array('','view'=>'ClientScript_method'), 'id'=>'tab2'),
			'<span>Register CoreScript sample</span>'=>array('ajax'=>array('','view'=>'registerCoreScript'), 'id'=>'tab3'),
			'<span>CHtml Code</span>'=>array('ajax'=>array('','view'=>'CHtmlCode'), 'id'=>'tab4' ),
			'<span>CJs&JASON helper</span>r'=>array('ajax'=>array('','view'=>'js_json_help'), 'id'=>'tab5'),
			//'<span>CHtml Button</span>'=>array( 'content'=>$this->renderPartial('inputBtn', null, true), 'id'=>'tab3' ),
			//'<span>CHtml Text</span>'=>array('ajax'=>array('','view'=>'inputTxt'), 'id'=>'tab4' ),
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


