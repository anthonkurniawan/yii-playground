
<h2><small>CJuiSlider</small></h2>
<?php
    // simple example
    $this->widget('zii.widgets.jui.CJuiSlider', array(
		'value'=>37,
		// additional javascript options for the slider plugin
		'options'=>array(
			'min'=>10,
			'max'=>50,
		),
    ));
     
    // range slider
    $this->widget('zii.widgets.jui.CJuiSlider', array(
		'options'=>array(
			'min'=>10,
			'max'=>50,
			'range'=>true,
			'values'=>array(5, 20)
		),
    ));
?>

<br><span class="label label-info pull-right">Code</span>
<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP','tabSize'=>2));  ?> 
 // simple example
    $this->widget('zii.widgets.jui.CJuiSlider', array(
		'value'=>37,
		// additional javascript options for the slider plugin
		'options'=>array(
			'min'=>10,
			'max'=>50,
		),
    ));
     
    // range slider
    $this->widget('zii.widgets.jui.CJuiSlider', array(
		'options'=>array(
			'min'=>10,
			'max'=>50,
			'range'=>true,
			'values'=>array(5, 20)
		),
    ));
<?php $this->endWidget(); ?>