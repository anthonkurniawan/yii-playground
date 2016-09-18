<h2><small>CJuiTabs</small></h2>
<?php
    $this->widget('zii.widgets.jui.CJuiTabs', array(
		'tabs'=>array(
			'StaticTab 1'=>'Content for tab 1',
			'StaticTab 2'=>array('content'=>'Content for tab 2', 'id'=>'tab2'),
			// panel 3 contains the content rendered by a partial view
			// 'AjaxTab'=>array('ajax'=>$ajaxUrl),
		),
		// additional javascript options for the tabs plugin
		'options'=>array(
			'collapsible'=>true,
		),
    ));
?>

<br><span class="label label-info pull-right">Code</span>
<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP','tabSize'=>2));  ?> 
	$this->widget('zii.widgets.jui.CJuiTabs', array(
		'tabs'=>array(
			'StaticTab 1'=>'Content for tab 1',
			'StaticTab 2'=>array('content'=>'Content for tab 2', 'id'=>'tab2'),
			// panel 3 contains the content rendered by a partial view
			// 'AjaxTab'=>array('ajax'=>$ajaxUrl),
		),
		// additional javascript options for the tabs plugin
		'options'=>array(
			'collapsible'=>true,
		),
	));
<?php $this->endWidget(); ?>