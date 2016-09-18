<?php $this->layout="column2"; ?>
<?php $this->renderPartial('cjui/_menu'); ?>

<?php
$this->pageTitle=Yii::app()->name . ' - CjuiAccordion'; 
$this->breadcrumbs=array('CjuiAccordion',);
?>

<a href="http://localhost/yiidoc/CjuiAccordion.html" target="_blank" class="txtHead">DOKUMENTASI </a>|
<a href="http://localhost/js/jquery/jquery-ui-192/development-bundle/demos/accordion/" target="_blank" class="txtHead"> Demo </a><br><br>

<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
	<style>
	#myAccordion {
		padding: 10px;
		width: 350px;
		height: 220px;
	}
	</style>
<!--
	<script>
	$(function() {
		$( "#accordion" ).accordion({
			heightStyle: "fill"
		});
	});
	$(function() {
		$( "#accordion-resizer" ).resizable({
			minHeight: 140,
			minWidth: 200,
			resize: function() {
				$( "#accordion" ).accordion( "refresh" );
			}
		});
	});
	</script>
-->	
<?php
$this->widget('zii.widgets.jui.CJuiAccordion',array(
	'id'=>'myAccordion',
    'panels'=>array(
        'panel 1'=>'content for panel 1',
        'panel 2'=>'content for panel 2',
        // panel 3 contains the content rendered by a partial view
        'panel 3'=>$this->renderPartial('index',null,true),
		// '<span>StaticTab 2</span>'=>array('content'=>'Content for tab 2', 'id'=>'tab2'),
		//'<span>Ajax Request</span>'=>array('ajax'=>array('','view'=>'doc/ar_relasional'), 'id'=>'tab5'),
    ),
    // additional javascript options for the accordion plugin
    'options'=>array(
        'animated'=>'bounceslide',
		'style'=>array('minHeight'=>'100'),
    ),
));
?>

<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>
<hr>

<h1>Yii Accordion Auto Height True/False</h1>
<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>

<?php
$this->widget('zii.widgets.jui.CJuiAccordion',array(
    'panels'=>array(
        'panel 1'=>'content for panel 1',
        'panel 2'=>'content for panel 2',
        // panel 3 contains the content rendered by a partial view
        'panel 3'=>$this->renderPartial('cjui/_menu',null,true),
    ),
    // additional javascript options for the accordion plugin
    'options'=>array(
        'collapsible'=> true,
        'animated'=>'bounceslide',
        'autoHeight'=>false,
        'active'=>2,
    ),
));
?>

<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>
<hr>

<h1>Yii Accordion Icon </h1>
<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>

<?php
$this->widget('zii.widgets.jui.CJuiAccordion',array(
    'panels'=>array(
        'panel 1'=>'content for panel 1',
        'panel 2'=>'content for panel 2',
        // panel 3 contains the content rendered by a partial view
        'panel 3'=>$this->renderPartial('cjui/_menu',null,true),
    ),
    // additional javascript options for the accordion plugin
    'options'=>array(
        'animated'=>'bounceslide',        
        'icons'=>array(
            "header"=>"ui-icon-plus",//ui-icon-circle-arrow-e
             "headerSelected"=>"ui-icon-circle-arrow-s",//ui-icon-circle-arrow-s, ui-icon-minus
        ),
    ),
));
?>

<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>
<hr>


<h1>Dynamic Yii Accordion Menu With Color </h1>
<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>

<?php
$tablist=array("Red","Green","Blue");
foreach($tablist as $tabs){
    $css='';
		if($tabs=='Red'){$css='color:red;';}
		else if($tabs=='Green'){$css='color:green;';}
		else if($tabs=='Blue'){$css='color:blue';}	
		$tabarray["<span id='tab-$tabs' style='$css'>$tabs</span>"]="$tabs Color";
}
?>
<?php
$this->widget('zii.widgets.jui.CJuiAccordion',array(
    'panels'=>$tabarray,
    // additional javascript options for the accordion plugin
    'options'=>array(
        'animated'=>'bounceslide',        
        'icons'=>array(
            "header"=>"ui-icon-plus",//ui-icon-circle-arrow-e
             "headerSelected"=>"ui-icon-circle-arrow-s",//ui-icon-circle-arrow-s, ui-icon-minus
        ),
    ),
));
?>
<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>