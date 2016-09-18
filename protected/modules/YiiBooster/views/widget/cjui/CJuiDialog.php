
<h2><small>CJuiDialog</small></h2>
<?php
    $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
		'id'=>'mydialog',
		// additional javascript options for the dialog plugin
		'options'=>array(
			'title'=>'Dialog box 1',
			'autoOpen'=>false,
			'buttons' => array(
				array('text'=>'Close','click'=> 'js:function(){$(this).dialog("close");}'),
				array('text'=>'Cancel','click'=> 'js:function(){$(this).dialog("close");}'),
			),
		),
    ));
     
    echo 'dialog content here';
     
    $this->endWidget('zii.widgets.jui.CJuiDialog');
     
    // the button that may open the dialog
    $this->widget('zii.widgets.jui.CJuiButton', array(
		'name'=>'btndialog',
		'caption'=>'Open Dialog',
		'onclick'=>new CJavaScriptExpression('function(){$("#mydialog").dialog("open"); return false;}'),
    ));
?>

<br><span class="label label-info pull-right">Code</span>
<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP','tabSize'=>2));  ?> 
 $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
		'id'=>'mydialog',
		// additional javascript options for the dialog plugin
		'options'=>array(
			'title'=>'Dialog box 1',
			'autoOpen'=>false,
			'buttons' => array(
				array('text'=>'Close','click'=> 'js:function(){$(this).dialog("close");}'),
				array('text'=>'Cancel','click'=> 'js:function(){$(this).dialog("close");}'),
			),
		),
    ));
     
    echo 'dialog content here';
     
    $this->endWidget('zii.widgets.jui.CJuiDialog');
     
    // the button that may open the dialog
    $this->widget('zii.widgets.jui.CJuiButton', array(
		'name'=>'btndialog',
		'caption'=>'Open Dialog',
		'onclick'=>new CJavaScriptExpression('function(){$("#mydialog").dialog("open"); return false;}'),
    ));
<?php $this->endWidget(); ?>