<!---------------------- CODE FROM YII PLAY-GROUND ------------------------------>
<?php
if(!Yii::app()->request->isAjaxRequest)
{
	$cs=Yii::app()->clientScript;
	$cs->registerCoreScript('jquery');
	$cs->registerCoreScript('yii');
	$cs->registerScriptFile(bu('js/common.js'), CClientScript::POS_HEAD);
}
?>

<!-- DEFAULT LAYOUT-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
	<!-------------------------------------- CODE FROM YII PLAY-GROUND ---------------------------------------->
	<link rel="shortcut icon" href="<?php //echo bu('images/favicon.ico'); ?>" />
	<link rel="stylesheet" type="text/css" href="<?php //echo bu('css/960.css'); ?>" />
	<link rel="stylesheet" type="text/css" href="<?php //echo bu('css/main.css'); ?>" />
	<link rel="stylesheet" type="text/css" href="<?php //echo bu('css/form.css'); ?>" />
	<!-------------------------------------------------------------------------------------------------------------------------------->
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
<?php //test echo"print_r(Yii::app()->catchAllRequest):"; print_r(Yii::app()->catchAllRequest); ?>
<div class="container" id="page">
	<!-------------------------------------------------ISI CONTENT----------------------------------------------------->
	<?php echo $content; ?>

<!-------------------------- ADD SCRIPT JS ------------------------->
<!-- NOTE: BISA DI TULIS SPERTI HTML TAG BIASA <script></script>-->
<?php 
Yii::app()->clientScript->registerScript('fancy', "
$('.view').fancybox({
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
");		
?>
</div><!-- page -->

</body>
</html>