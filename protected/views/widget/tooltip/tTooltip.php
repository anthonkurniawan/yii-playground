<?php $this->layout='column2';?>
<?php
$this->pageTitle=Yii::app()->name . ' - Tooltip Basic'; 
$this->breadcrumbs=array('tooltip',);
?>

<?php $this->renderPartial('tooltip/_menu'); ?>

<a href="http://localhost/HTDOCS/TESTING/JQUERY_TESTER/tTooltip/" target="_blank">Demo & Dokumentation</a> |
<a href="http://docs.jquery.com/Plugins/Tooltip" target="_blank">Tooltip JQuery-Dokumentasi</a> <p><br>

<b class="txtTitle">Sample tTooltip</b><br>

<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>

<?php
Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js//ttooltip/jquery-ttooltip.js'); 
Yii::app()->clientScript->registerCssFile(Yii::app()->request->baseUrl.'/js/ttooltip/jquery-ttooltip.css'); 
?>		  

<style type="text/css">
.loading {
    background-color: #eee;
    background-image:  url(<?php Yii::app()->request->baseUrl;?>'../../images/loading/black_loading5.gif');
	background-position:  center center;
    background-repeat: no-repeat;
    opacity: 1;
}
div.loading * { opacity: .8; }
</style>
		  
<script type="text/javascript">
jQuery(document).ready(function($){
	$('.ttooltip').ttooltip({
		trigger    :'hover',  ////possible value: hover, mouseenter, click, dblclick
		followmouse: true,
		//close 	: 'mouseleave',  //mouseleave,click
		//autohide 	: true,
		timeout	: 10
	});
	
  /* assign tTooltip to all link with .ttooltip class */
	/*$('.ttooltip').ttooltip({
		trigger    :'mouseenter', //possible value: hover, mouseenter, click, dblclick
		followmouse: true,
		onload   : function(tooltip,source){
			tooltip.click(function(){
				//console.log('tooltip clicked');
				if(source.is('input')){
				source.val(tooltip.text());
				}
			});
		},
		onclose : function(tooltip,source){
			//console.log('tooltip closed');
		}
	}); */
});
</script>

<!-------------------- SAMPLE ------------------------>
<ul>
<li><a class="ttooltip" href="#" data-title="Title sample" data-content="Content sample" data-footer="Footer sample">Basic tooltip </a></li>
<li><a  class="ttooltip" href="#" data-title="Title sample" data-content="Content sample" data-footer="Footer sample">Tooltip with no footer </a></li>
<li><a class="ttooltip" href="#" data-content="Content sample, no footer, no header">Tooltip with no footer and header </a> </li>
<li>
	<a href="#" class="ttooltip" data-title="This is sample title" data-content="<img style='float:left;width:100px;margin-right:8px' src='../../upload/propic1.png' /> This is sample tooltip content with image and <strong>HTML</strong> markup." data-footer="This is tooltip footer" data-width="300">Tooltip with image</a>
</li>
<li><a href="/yii/yiiTest/index.php/widget_CgridView/view?id=1" class="ttooltip" data-title="Another title" data-content="ajax">Tooltip content from AJAX</a></li>
</ul>

	<?php Yii::app()->sc->collect('html', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
	<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>
