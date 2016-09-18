
<h2><small>CJuiAutoComplete</small></h2>
<?php
    $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
		'name'=>'city',
		'source'=>array('ac1', 'ac2', 'ac3'),
		// additional javascript options for the autocomplete plugin
		'options'=>array(
			'minLength'=>'2',
		),
		'htmlOptions'=>array(
			'style'=>'height:20px;'
		),
    ));
?>

<br><span class="label label-info pull-right">Code</span>
<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP','tabSize'=>2));  ?> 
    $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
		'name'=>'city',
		'source'=>array('ac1', 'ac2', 'ac3'),
		// additional javascript options for the autocomplete plugin
		'options'=>array(
			'minLength'=>'2',
		),
		'htmlOptions'=>array(
			'style'=>'height:20px;'
		),
    ));
<?php $this->endWidget(); ?>









