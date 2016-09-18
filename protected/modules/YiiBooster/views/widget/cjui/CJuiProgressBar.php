
<h2><small>CJuiProgressBar</small></h2>
<?php
    $this->widget('zii.widgets.jui.CJuiProgressBar', array(
		'value'=>75,
		// additional javascript options for the progress bar plugin
		'options'=>array(
			'change'=>new CJavaScriptExpression('function(event, ui) {...}'),
		),
		'htmlOptions'=>array(
			'style'=>'height:20px;'
		),
    ));
?>

<br><span class="label label-info pull-right">Code</span>
<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP','tabSize'=>2));  ?> 
    $this->widget('zii.widgets.jui.CJuiProgressBar', array(
		'value'=>75,
		// additional javascript options for the progress bar plugin
		'options'=>array(
			'change'=>new CJavaScriptExpression('function(event, ui) {...}'),
		),
		'htmlOptions'=>array(
			'style'=>'height:20px;'
		),
    ));
<?php $this->endWidget(); ?>