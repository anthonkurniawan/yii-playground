
<h2><small>CJuiDatePicker</small></h2>
<?php
    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
		'name'=>'publishDate',
		// additional javascript options for the date picker plugin
		'options'=>array(
			'showAnim'=>'fold',
		),
		'htmlOptions'=>array(
			'style'=>'height:20px;'
		),
    ));
?>

<br><span class="label label-info pull-right">Code</span>
<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP','tabSize'=>2));  ?> 
    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
		'name'=>'publishDate',
		// additional javascript options for the date picker plugin
		'options'=>array(
			'showAnim'=>'fold',
		),
		'htmlOptions'=>array(
			'style'=>'height:20px;'
		),
    ));
<?php $this->endWidget(); ?>