<?php		#code from yii-playground
if(!Yii::app()->request->isAjaxRequest)
{
	$cs=Yii::app()->clientScript;   //OR USE SHOTCUT "cs()"
	//cs()->registerCoreScript('jquery');  //udah di load pada "home" page
	//cs()->registerCoreScript('yii');
	$cs->registerScriptFile(bu('js/common.js'), CClientScript::POS_HEAD);  //include function :
								//$('a[rel*=external]').click, $('.tpanel .toggle'), $('.cpanel :checkbox:not(:checked)'), $('.cpanel :checkbox').click, 
								//$('.spanel select').change, $('.rpanel :radio').click, $(".openhelp").click, $(".clearform").click
}
	//$cs->registerScriptFile(bu('js/jquery-1.8.3.js') );  //just optional ( so far use jquery include by YII )
?> 

<?php  //Yii::app()->bootstrap->init(); #buat aktifin script "bootstrap" ?>

<!-- DEFAULT LAYOUT-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo bu() ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/myStyle.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->

    <!---------------------------- MENU FROM YII PLAY-G LITE --------------------------------------->
    <div id="mb_mainmenu">
		<?php $this->widget('application.extensions.mbmenu.MbMenu',array(
			'items'=>array(
				array('label'=>'Home', 'url'=>array('/test_unit/')),
				array('label'=>'About', 'url'=>array('/default/page', 'view'=>'about')),
				array('label'=>'File Generator', 'url'=>array('/test_unit/files/index')),
				array('label'=>'Testing from Generator', 'url'=>array('#'), 'items'=>array(
					array('label'=>'bootstrap form', 'url'=>array('/test_unit/products_bootstrap/index')),
					array('label'=>'YiiBooster form', 'url'=>array('/test_unit/products_yiibooster/index')),
					array('label'=>'ex Giix form', 'url'=>array('#'), 'items'=>array(
						array('label'=>'ex-Giix', 'url'=>array('/test_unit/products_exGiix/index')),
						array('label'=>'ex-GiixJS', 'url'=>array('/test_unit/products_exGiixJS/index')),
					)),
				)),
				array('label'=>'Testing Model Ext', 'url'=>array('#'), 'items'=>array(
					array('label'=>'test exted model with MODELS ext', 'url'=>array('model_ext/list')),
				)),
				array('label'=>'Test MODULE', 'url'=>array('#'),'items'=>array(	
					array('label'=>'GII', 'url'=>array('../gii'), 'linkOptions'=>array('target'=>'_blank'),),		
					array('label'=>'yii - Bootstrap', 'url'=>array('Bootstrap/')),
					array('label'=>'yii - Booster', 'url'=>array('YiiBooster/')),
					array('label'=>'yii - Foundation', 'url'=>array('Foundation/')),
				)),
				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); ?>
	</div><!-- mb_mainmenu -->
	
    <!--------------------------------------- CONTENT -------------------------------------------->
    
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>