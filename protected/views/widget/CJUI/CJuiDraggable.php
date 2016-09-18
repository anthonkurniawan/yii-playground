<?php $this->layout="column2"; ?>
<?php $this->renderPartial('cjuiDialog/_menu'); ?>

<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
<style type="text/css">
/* THE CSS */
#draggable-start-drag-stop{ width: 16em; padding: 0 1em; height:11em; }
#draggable-start-drag-stop ul li { margin: 1em 0; padding: 0.5em 0; } 
#draggable-start-drag-stop ul li span.ui-icon { float: left; }
#draggable-start-drag-stop ul li span.count { font-weight: bold; }
ul li{
    list-style: none;
    margin: 5px;
    padding: 5px;
}
#draggable, #draggable-start-drag-stop, #draggable-stack { cursor: pointer }
</style>
<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>


<h1>Basic Draggable</h1>
<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>

<div style="height: 200px; border:1px solid;" id="scroll-container">
<br />
<?php
$this->beginWidget('zii.widgets.jui.CJuiDraggable',array(
    'options'=>array(
        'scope'=>'myScope',       
    ),
    'htmlOptions'=>array(
        'style'=>'border:1px solid grey;padding:5px;',
    ),    
    'tagName'=>'span',
    'id'=>'draggable',
));
    echo 'Draggable Anywhere';

$this->endWidget();
?>
<br /><br />
<?php
$this->beginWidget('zii.widgets.jui.CJuiDraggable',array(
    'options'=>array(
        'containment'=>'parent',//'containment'=>'#scroll-container',
    ), 
    'htmlOptions'=>array(
        'style'=>'border:1px solid grey;padding:5px;',
    ),    
    'tagName'=>'span',
    'id'=>'draggable-2',
));
    echo 'Inside Parent Only';

$this->endWidget();
?>
</div>
<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>
<hr>



<h1>Draggable Event</h1>
<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>

<div id="event-div" style="height: 300px;;">
<?php
$this->beginWidget('zii.widgets.jui.CJuiDraggable',array(
    'options'=>array(
        'containment'=>'parent',
        'start'=>'js:function(){
            var new_count=parseInt($("#start").val())+1;
            $( "#event-start span.count" ).text( new_count );
            $("#start").val(new_count);
        }',
        'drag'=>'js:function(){
            var new_count=parseInt($("#drag").val())+1;
            $( "#event-drag span.count" ).text( new_count );
            $("#drag").val(new_count);
        }',
        'stop'=>'js:function(){
            var new_count=parseInt($("#stop").val())+1;
            $( "#event-stop span.count" ).text( new_count );
            $("#stop").val(new_count);
        }',
    ),
    'htmlOptions'=>array(
        'style'=>'border:1px solid ;',
    ),    
    'tagName'=>'div',
    'id'=>'draggable-start-drag-stop',
));
?>
<ul class="ui-helper-reset">
    <li id="event-start" class="ui-state-default ui-corner-all">
        <span class="ui-icon ui-icon-play"></span>
        "start" invoked <span class="count">0</span>x
    </li>
    <li id="event-drag" class="ui-state-default ui-corner-all">
        <span class="ui-icon ui-icon-arrow-4"></span>
        "drag" invoked <span class="count">0</span>x
    </li>
    <li id="event-stop" class="ui-state-default ui-corner-all">
        <span class="ui-icon ui-icon-stop"></span>
        "stop" invoked <span class="count">0</span>x
    </li>
</ul>
<input type="hidden" id="start" value="0" />
<input type="hidden" id="drag" value="0" />
<input type="hidden" id="stop" value="0" />
<?php
$this->endWidget();
?>
</div>
<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>
<hr>


<h1>Stack Draggable</h1>
<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>

<?php
Yii::app()->clientScript->registerScript("sortable-js",'
$( "#sortable" ).sortable({
      revert: true
    });  
');
?>
<?php
$this->beginWidget('zii.widgets.jui.CJuiDraggable',array(
    'options'=>array(
        'containment'=>'parent',
    ),
    'htmlOptions'=>array(
        'style'=>'border:1px solid ;',
    ),    
    'tagName'=>'div',
    'id'=>'draggable-stack',
));
?>
<ul id="sortable">
  <li class="ui-state-default">Item 1</li>
  <li class="ui-state-default">Item 2</li>
  <li class="ui-state-default">Item 3</li>
  <li class="ui-state-default">Item 4</li>
  <li class="ui-state-default">Item 5</li>
</ul>
<?php $this->endWidget(); ?>

<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>
