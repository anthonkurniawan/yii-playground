<?php $this->layout='column2';?>
<?php
$this->pageTitle=Yii::app()->name . ' Tooltip'; 
$this->breadcrumbs=array('tooltip',);
?>
	
<?php $this->renderPartial('tooltip/_menu'); ?>

<!-------------- ADD SCRIPT JS ( BISA DI TULIS SPERTI HTML TAG BIASA "<script></script>" ) ---------------->
 <?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
<style>
/* -- CUSTOM STYLE --*/
	.ui-tooltip, .arrow:after {
		background: black;
		border: 2px solid white;
	}
	.ui-tooltip {
		padding: 10px 20px;
		color: white;
		border-radius: 20px;
		font: bold 14px "Helvetica Neue", Sans-Serif;
		text-transform: uppercase;
		box-shadow: 0 0 7px black;
	}
	.arrow {
		width: 70px;
		height: 16px;
		overflow: hidden;
		position: absolute;
		left: 50%;
		margin-left: -35px;
		bottom: -16px;
	}
	.arrow.top {
		top: -16px;
		bottom: auto;
	}
	.arrow.left {
		left: 20%;
	}
	.arrow:after {
		content: "";
		position: absolute;
		left: 20px;
		top: -20px;
		width: 25px;
		height: 25px;
		box-shadow: 6px 5px 9px -9px black;
		-webkit-transform: rotate(45deg);
		-moz-transform: rotate(45deg);
		-ms-transform: rotate(45deg);
		-o-transform: rotate(45deg);
		tranform: rotate(45deg);
	}
	.arrow.top:after {
		bottom: -20px;
		top: auto;
	}
</style>
	
<p><a class="tooltip" title="A tooltip with default settings, the href is displayed below the title" href="http://google.de">Tooltip sample Link</a><p>


<?php //Yii::app()->clientScript->registerCoreScript('jquery.ui'); ?>
<?php 
// $cs = Yii::app()->getClientScript();
// $path = $cs->getCoreScriptUrl().'/jui/css/base/';
// // $cs->registerCssFile( $path.'jquery.ui.tooltip.css'); 
// $cs->registerCssFile( $path.'jquery-ui.css'); 
?>

<?php
#jquery-tooltip(Jorn Zafferer')
// Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js//jquery-tooltip/jquery.tooltip.js'); 
// Yii::app()->clientScript->registerCssFile(Yii::app()->request->baseUrl.'/js/jquery-tooltip/jquery.tooltip.css'); 
// Yii::app()->clientScript->registerCssFile(Yii::app()->request->baseUrl.'/js/jquery-tooltip/screen.css'); 
?>

<?php
#ttooltip
Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js//ttooltip/jquery-ttooltip.js'); 
Yii::app()->clientScript->registerCssFile(Yii::app()->request->baseUrl.'/js/ttooltip/jquery-ttooltip.css'); 
?>	


<?php  
#public CClientScript registerScript(string $id, string $script, integer $position=NULL)
Yii::app()->clientScript->registerScript('ttooltip', "
	$('.ttooltip').ttooltip({
		trigger    :'hover',  ////possible value: hover, mouseenter, click, dblclick
		followmouse: true,
		//close 	: 'mouseleave',  //mouseleave,click
		//autohide 	: true,
		timeout	: 10
	});
" );		
 ?>

<li><a class="ttooltip" href="#" data-title="Title sample" data-content="Content sample" data-footer="Footer sample">Basic tooltip </a></li>

 <?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>