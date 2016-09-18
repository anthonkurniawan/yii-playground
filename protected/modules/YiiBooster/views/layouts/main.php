<?php 
/* @var $this Controller */ 
if(!Yii::app()->request->isAjaxRequest)
{
	$cs=Yii::app()->clientScript;
	// $cs->registerCoreScript('jquery');
	// $cs->registerCoreScript('yii');
	$cs->registerScriptFile(bu('js/common.js'), CClientScript::POS_HEAD);
	//$preload = array();
}
?>

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

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->

	<!--<div id="mainmenu">
		<?php 
		// $this->widget('zii.widgets.CMenu',array(
			// 'items'=>array(
				// array('label'=>'Home', 'url'=>array('/site/index')),
				// array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
				// array('label'=>'Contact', 'url'=>array('/site/contact')),
				// array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				// array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			// ),
		// )); 
		?>
	</div>--><!-- mainmenu -->
	

    <!---------------------------- MENU FROM YII PLAY-G LITE --------------------------------------->
    <div id="mb_mainmenu">
		<?php /*$this->widget('application.extensions.mbmenu.MbMenu',array(
			'items'=>array(
				array('label'=>'Home', 'url'=>array('/site/index')),
				array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
				array('label'=>'Data Warehouse', 'url'=>array('/products/index_adv'), 'items'=>array(
					array('label'=>'Category', 'url'=>array('/category/index')),
					array('label'=>'Suppliers', 'url'=>array('/suppliers/index')),
					array('label'=>'Products', 'url'=>array('/Products/index')),
					array('label'=>'Customers', 'url'=>array('/Customers/index')),
					array('label'=>'Expediters', 'url'=>array('/Expediters/index')),
				)),

			),
		)); */?>
	</div><!-- mb_mainmenu -->

        <!---------------------------- MENU FROM YII BOOTSTRAP --------------------------------------->
<?php //Yii::app()->bootstrap->registerCoreCss('bootstrap.min.css'); ?>


 <!--------- MENU WITH (ext.widgets.ddmenu.XDropDownMenu) --------->
	<?php $this->renderPartial('/layouts/_mainMenu'); ?>
    <!---------------------------------------------------------------------------------------------->
    
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
