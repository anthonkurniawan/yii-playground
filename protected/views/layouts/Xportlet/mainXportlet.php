<?php
if(!Yii::app()->request->isAjaxRequest)
{
	$cs=Yii::app()->clientScript;
	$cs->registerCoreScript('jquery');
	$cs->registerCoreScript('yii');
	$cs->registerScriptFile(bu('js/common.js'), CClientScript::POS_HEAD);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="language" content="en" />
<link rel="shortcut icon" href="<?php echo bu('favicon.ico'); ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo bu('css/YiiPlayg_css/960.css'); ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo bu('css/YiiPlayg_css/main.css'); ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo bu('css/YiiPlayg_css/form.css'); ?>" />

<title><?php echo $this->pageTitle; ?></title>
</head>

<body>


<div id="page">

	<div id="header">
<!-------------------->
layout: mainXportlet.php
<!-------------------->
 		<?php //print_r($this); ?><!------ TEST-------->
		<div id="menubar">
			<?php $this->widget('ext.language.XLangMenu', array(
				'encodeLabel'=>false,
				'items'=>array(
					'et'=>bu('images/et.png','Eesti',true),
					'en'=>bu('images/en.png','In English',true)
				),
			)); ?>
		</div><!-- menubar -->

		<div id="logo">
			<?php echo bu('images/blocks.gif', Yii::app()->name);?>
		</div><!-- logo -->

		<div id="mainmenu"> <b class="txtRed"> test: ptl.MainMenu</b>
			<?php $this->widget('ptl._mainMenu'); ?>
		</div><!-- mainmenu -->

	</div><!-- header -->

	<?php if(empty($this->layout)): ?>
	<?php $this->widget('zii.widgets.CBreadcrumbs', array(
		'links'=>$this->breadcrumbs,
	)); ?>
	<!-- breadcrumbs -->
	<?php endif; ?>

	<div id="content">
		<?php echo $content; ?>
	</div><!-- content -->

	<div id="footer">
		<?php echo Yii::app()->params['copyrightInfo']; ?>
	</div><!-- footer -->

</div><!-- page -->

<?php $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
	'id'=>'help-dialog',
	'options'=>array(
		'title'=>Yii::t('ui','Help'),
		'width'=>600,
		'height'=>400,
		'autoOpen'=>false,
		'modal'=>true,
	),
));
$this->endWidget('zii.widgets.jui.CJuiDialog'); ?>

<?php 
$this->widget('ext-coll.google.XGoogleAnalytics', array(
	'visible'=>Yii::app()->params['googleAnalytics'] && !$this->isIpMatched(),
	'tracker'=>Yii::app()->params['googleAnalyticsTracker'],
)); 
?>


</body>
</html>