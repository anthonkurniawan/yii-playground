<!---------------------- CODE FROM YII PLAY-GROUND ------------------------------>
<?php
// COPY FOLDER .\JS
// COPY FOLDER .\protected\extensions\helpers\Xhtml.php
// MODIF .\config\main.php --> add 'ext.helpers.XHtml',	
if(!Yii::app()->request->isAjaxRequest)
{
	$cs=Yii::app()->clientScript;
	//$cs->registerCoreScript('jquery');
	$cs->registerCoreScript('yii');
	$cs->registerScriptFile(bu('js/common.js'), CClientScript::POS_HEAD);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.8.2.js"></script>
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo">YII-Foundation</div>
	</div><!-- header -->
<a href="http://www.yiiframework.com/extension/foundation3/" target="_blank"> Source Ext.</a><br>
<a href="http://foundation3.oakwebdev.com" target="_blank"> Website & Documentation</a>
    
    <!---------------------------- MAIN MENU  --------------------------------------->
<ul class="nav-bar">
  <li class="active"><a href="#">Home</a></li>
  <li><a href="#">About</a></li>            
  <li> <?php echo CHtml::link('test',array('default/navigation')); ?> </li>
  <li class="has-flyout">
    <a href="#">Start Page</a>
    <a href="#" class="flyout-toggle"><span> </span></a>
    <ul class="flyout">
      <li><a href="#">Navigation</a></li>
      <li><a href="#">Grid</a></li>
      <li><a href="#">Typography</a></li>
      <li><a href="#">Buttons</a></li>
    </ul>
  </li>
  ...
</ul>
    <!---------------------------------------------------------------------------------------------->
    
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