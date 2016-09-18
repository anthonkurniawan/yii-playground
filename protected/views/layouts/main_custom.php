<!---------------------- CODE FROM YII PLAY-GROUND ------------------------------>
<?php
if(!Yii::app()->request->isAjaxRequest)
{
	$cs=Yii::app()->clientScript;
	// $cs->registerCoreScript('jquery');
	// $cs->registerCoreScript('yii');
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
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/myStyle.css" />
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
<div class="container_custom" id="page">

	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
        <a href="./index.php?r=site/logout"> logout </a> |
        <?php echo CHtml::link('Check app()',array('site/page','view'=>'print_app')); ?> |
	</div><!-- header -->
	
    <!---------------------------------- MAIN MENU -------------------------------------------->
	<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Home', 'url'=>array('/site/index')),
				array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
				array('label'=>'Contact', 'url'=>array('/site/contact')),
				array('label'=>'Data User', 'url'=>array('/userMysql')),
				//test add for cek variable
				array('label'=>'Check instance', 'url'=>array('/cek/index')),
				//*test select DB
				array('label'=>'Test DB', 'url'=>array('/TestDb/index')),
				//*testing form
				array('label'=>'Test Form', 'url'=>array('/testForm/index')),
				
				//jika belum login  maka user adalah 'guest'
				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest), 
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); ?>
	</div>
    
    <!--------- MENU WITH (ext.widgets.ddmenu.XDropDownMenu) --------->
    <?php
    $this->widget('ext-coll.MENU.ddmenu.XDropDownMenu', array(
    'items'=>array(
        array('label'=>'Home', 'url'=>array('site/index')),
		array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
		array('label'=>'Contact', 'url'=>array('/site/contact')),
		array('label'=>'Check instance', 'url'=>array('/cek/index')),
		array('label'=>'Data User', 'url'=>array('/userMysql/index'),'items'=>array(
			array('label'=>'Create user', 'url'=>array('userMysql/create')),
			array('label'=>'Manage user', 'url'=>array('userMysql/admin')),
		 )),	
        //array('label'=>'Test Form','url'=>'#','items'=>array(		//**# jika tidak nge-LINK**/
		array('label'=>'Test Form','url'=>array('testForm/index'),'items'=>array(
            //array('label'=>'Detail view', 'url'=>array('/person/view', 'id'=>3)),
            //array('label'=>'Tree view', 'url'=>array('/site/widget', 'view'=>'treeview')),
			array('label'=>'Input Link', 'url'=>array('testForm/inputLink')),	//sintax: 'url'=>array($router,$params)
			array('label'=>'Input TextField', 'url'=>array('testForm/inputTxt')), //$router bisa berupa "page" atau "class action"
			array('label'=>'Input Tabular', 'url'=>array('testForm/inputBatch')),	//array('/site/page', 'view'=>'about')),
			array('label'=>'Form with CActiveForm', 'url'=>array('testForm/formWid')),
			array('label'=>'List Data', 'url'=>array('testForm/listData')),
        )),			
		array('label'=>'Test DB', 'url'=>array('/testDb/index'),'items'=>array(
			array('label'=>'Test Query', 'url'=>array('testDb/testQuery')),								  
		)),
		//jika belum login  maka user adalah 'guest'
		array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest), 
		array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
    ),
));
	?>
    <!-------------------------------------->
    
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>
    
	<!-------------------------------------------------ISI CONTENT----------------------------------------------------->
	<?php echo $content; ?>
	<!----------------------------------------------------------------------------------------------------------------->
	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>