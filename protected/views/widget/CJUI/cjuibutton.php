<?php $this->layout="column2"; ?>
<?php $this->renderPartial('cjuiDialog/_menu'); ?>

<h1>Submit Button</h1>
<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
<?php
$this->widget('zii.widgets.jui.CJuiButton',array(
    'name'=>'submit',
    'caption'=>'Submit',
    'htmlOptions'=>array(
        'style'=>'background:#0064cd;color:#ffffff;',
    ),
));
?>
<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>
<hr>


<h1>Default Button</h1>
<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
<?php
$this->widget('zii.widgets.jui.CJuiButton',array(
    'name'=>'button',
    'caption'=>'Instructions',
    'onclick'=>new CJavaScriptExpression('function(){alert("Enter User Name"); this.blur(); return false;}'),
));
?>
<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>
<hr>


<h1>Basic Link</h1>
<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
<?php
$this->widget('zii.widgets.jui.CJuiButton',array(
    'name'=>'link',
    'caption'=>'Link To Bsourcecode.com',
    'buttonType'=>'link',
    'url'=>'http://www.bsourcecode.com',
));
?>
<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>
<hr>


<h1>CJuiButton: Link->htmlOptions</h1>
<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
<?php
$this->widget('zii.widgets.jui.CJuiButton',array(
    'name'=>'cjui-link',
    'caption'=>'Link To Bsourcecode.com',
    'buttonType'=>'link',
    'url'=>'http://www.bsourcecode.com',
    'htmlOptions'=>array(
        'style'=>'color:#ffffff;background: #0064cd;'
    ),
    //'onclick'=>new CJavaScriptExpression('function(){alert("Enter User Name"); this.blur(); return false;}'),
    
));
?>
<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>
<hr>


<h1>Single Radio Button</h1>
<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
<?php
$this->widget('zii.widgets.jui.CJuiButton',array(
    'name'=>'ratio-button',
    'buttonType'=>'radio',
    'caption'=>'Single Radio'
));
?>
<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>
<hr>


<h1>Radio Button Set</h1>
<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
<?php $radio = $this->beginWidget('zii.widgets.jui.CJuiButton', array(
    'name'=>'radio-btn',
    'buttonType'=>'buttonset',
)); ?>
<input type="radio" id="radio1" name="radio" value="1" /><label for="radio1">Choice 1</label>
<input type="radio" id="radio2" name="radio" value="2" checked="checked"/><label for="radio2">Choice 2</label>
<input type="radio" id="radio3" name="radio" value="3" /><label for="radio3">Choice 3</label>
<?php $this->endWidget();?>
<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>
<hr>


<h1>Single Checkbox Button</h1>
<?php
$this->widget('zii.widgets.jui.CJuiButton',array(
    'name'=>'checkbox-button',
    'buttonType'=>'checkbox',
    'caption'=>'Single Checkbox'
));
?>
<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>
<hr>


<h1>Checkbox Button Set</h1>
<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
<?php $radio = $this->beginWidget('zii.widgets.jui.CJuiButton', array(
    'name'=>'checkbox-btn',
    'buttonType'=>'buttonset',
    'htmlTag'=>'span',
)); ?>
<input type="checkbox" id="check1" value="1" /><label for="check1">Checkbox 1</label>
<input type="checkbox" id="check2" value="2" /><label for="check2">Checkbox 2</label>
<input type="checkbox" id="check3" value="3" /><label for="check3">Checkbox 3</label>
<?php $this->endWidget();?>
<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>
