
<h2><small>CJuiButton</small></h2>
<?php
    $this->widget('zii.widgets.jui.CJuiButton', array(
		'name'=>'submit',
		'caption'=>'Save',
		// you can easily change the look of the button by providing the correct class
		// ui-button-error, ui-button-primary, ui-button-success
		'htmlOptions' => array('class'=>'ui-button-error'),
		'onclick'=>new CJavaScriptExpression('function(){alert("Yes");}'),
    ));
?>

<br><span class="label label-info pull-right">Code</span>
<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP','tabSize'=>2));  ?> 
    $this->widget('zii.widgets.jui.CJuiButton', array(
		'name'=>'submit',
		'caption'=>'Save',
		// you can easily change the look of the button by providing the correct class
		// ui-button-error, ui-button-primary, ui-button-success
		'htmlOptions' => array('class'=>'ui-button-error'),
		'onclick'=>new CJavaScriptExpression('function(){alert("Yes");}'),
    ));
<?php $this->endWidget(); ?><hr>


<h2><small>Radio Button</small></h2>
<?php 
	$radio = $this->beginWidget('zii.widgets.jui.CJuiButton', array(
		'name'=>'btnradio',
		'buttonType'=>'buttonset'
	)); ?>
    <input type="radio" id="radio1" name="radio" /><label for="radio1">Choice 1</label>
    <input type="radio" id="radio2" name="radio" checked="checked" /><label for="radio2">Choice 2</label>
    <input type="radio" id="radio3" name="radio" /><label for="radio3">Choice 3</label>
<?php $this->endWidget();?>

<br><span class="label label-info pull-right">Code</span>
<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP','tabSize'=>2));  ?> 
	$radio = $this->beginWidget('zii.widgets.jui.CJuiButton', array(
		'name'=>'btnradio',
		'buttonType'=>'buttonset'
	)); 
	<input type="radio" id="radio1" name="radio" /><label for="radio1">Choice 1</label>
    <input type="radio" id="radio2" name="radio" checked="checked" /><label for="radio2">Choice 2</label>
    <input type="radio" id="radio3" name="radio" /><label for="radio3">Choice 3</label>
	 $this->endWidget();
<?php $this->endWidget(); ?><hr>


<h2><small>CheckBoxes</small></h2>
<?php 
	$radio = $this->beginWidget('zii.widgets.jui.CJuiButton', array(
		'name'=>'btnradio',
		'buttonType'=>'buttonset'
    )); ?>
    <input type="checkbox" id="check1" /><label for="check1">B</label>
    <input type="checkbox" id="check2" /><label for="check2">I</label>
    <input type="checkbox" id="check3" /><label for="check3">U</label>
<?php $this->endWidget();?>

<br><span class="label label-info pull-right">Code</span>
<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP','tabSize'=>2));  ?> 
	 $radio = $this->beginWidget('zii.widgets.jui.CJuiButton', array(
		'name'=>'btnradio',
		'buttonType'=>'buttonset'
    ));
	<input type="checkbox" id="check1" /><label for="check1">B</label>
    <input type="checkbox" id="check2" /><label for="check2">I</label>
    <input type="checkbox" id="check3" /><label for="check3">U</label>
	 $this->endWidget()
<?php $this->endWidget(); ?>