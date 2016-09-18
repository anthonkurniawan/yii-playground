<?php //$this->layout="main_custom"; //dump(Yii::app()->clientScript); ?>

<h2><small>CJuiAccordion</small></h2>
<?php
    $this->widget('zii.widgets.jui.CJuiAccordion', array(
		'panels'=>array(
			'panel 1'=>'content for panel 1',
			'panel 2'=>'content for panel 2',
			// panel 3 contains the content rendered by a partial view
			// 'panel 3'=>$this->renderPartial('_partial',null,true),
		),
		// additional javascript options for the accordion plugin
		'options'=>array(
			'animated'=>'bounceslide',
		),
    ));
?>	

<br><span class="label label-info">Code</span>
<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP','tabSize'=>2));  ?> 
 $this->widget('zii.widgets.jui.CJuiAccordion', array(
		'panels'=>array(
			'panel 1'=>'content for panel 1',
			'panel 2'=>'content for panel 2',
			// panel 3 contains the content rendered by a partial view
			// 'panel 3'=>$this->renderPartial('_partial',null,true),
		),
		// additional javascript options for the accordion plugin
		'options'=>array(
			'animated'=>'bounceslide',
		),
    ));
<?php $this->endWidget(); ?>