<?php
$this->pageTitle=Yii::app()->name . ' - FancyBox'; 
$this->breadcrumbs=array('FancyBox',);
?>

<div class="view2">

<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
<!-------------------------- fancyBox Script----------------------------->
<!--<script type="text/javascript" src="<?php //echo Yii::app()->baseUrl ;?>/js/fancybox/jquery.fancybox.js"></script>
<link rel="stylesheet" href="<?php //echo Yii::app()->baseUrl ;?>/js/fancybox/jquery.fancybox.css" type="text/css" media="screen" />-->
<?php  //#1
#public CClientScript registerScript(string $id, string $script, integer $position=NULL)
Yii::app()->clientScript->registerScript('fancy', "
$('.fancy').fancybox({
	afterClose: function() {
		parent.location.reload(true);
	},
	'transitionIn'	:	'elastic',//none
	'transitionOut'	:	'elastic',
	'speedIn'		:	600, 
	'speedOut'		:	200, 
	'overlayShow'	:	false,
	'autoDimensions': false,
	'width'         : 550,
	'height'        : 500,//auto
});

$('.fancy2').fancybox({
	afterClose: function() {},
	'transitionIn'	:	'elastic',//none
	'transitionOut'	:	'elastic',
	'speedIn'		:	600, 
	'speedOut'		:	200, 
	'overlayShow'	:	false,
	'autoDimensions': false,
	'width'         : 550,
	'height'        : 500,//auto
});
");		
?>
<!------ register ccript file --->
<?php Yii::app()->clientScript->registerPackage('fancy'); ?> <!--#2--> 

<?php
echo CHtml::link('Link with Fancy', 
	array("Widget_CgridView/view", "id"=>1, "layout"=>"fancy"), 
	array("class"=>"fancy2 fancybox.iframe") );
?> <br>

<a class="fancy fancybox.iframe" href="#" title="Test FancyBox"> fancy with refesh after close</a><p>
<?php Yii::app()->sc->collect('html', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
</div>

<!---------------------------------------------------- CODE VIEW ------------------------------------------------->
	<div class="tpanel left">
		<div class="toggle btn"><?php echo Yii::t('ui','View Code'); ?></div>
		<div class='scroll'><?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?></div>
	</div>
	
	<div class="tpanel left">
		<div class="toggle btn"><?php echo Yii::t('ui','View Controller'); ?></div>
		<div><?php $this->render_script(array('Widget_CgridView/view')); ?></div>
	</div>