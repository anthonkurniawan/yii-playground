<?php $this->layout='//layouts/Xportlet/Xportlet_left';?>  

<?php $this->leftPortlets['ptl._widgetMenu']=array(); ?>   <!--disesuikan dengan di atas-->

<?php //$this->rightPortlets['ptl.WidgetMenu']=array(); ?>
<?php //$this->sidePortlets['ptl.WidgetMenu']=array(); ?>

<!--<style> .container {width:1100px; margin:0 auto; overflow:auto}  /*change width page*/ </style>-->
<?php
$this->pageTitle=Yii::app()->name . ' - Widget'; 
$this->breadcrumbs=array('Xportlet',);
?>

<?php 
$this->widget('ext.xportlet.xlogin.XLoginPortlet',array(
     'visible'=>Yii::app()->user->isGuest,
)); 
?>

<!-------------------------- CONTENT ---------------------------------->
<a href="http://www.yiiframework.com/extension/portlet/"><b class="txtKet">Documentation Xportlet</b></a> |
<a href="http://www.yiiframework.com/extension/login/"><b class="txtKet">Documentation Xlogin</b></a><br /><br />

<h2> Xportlet with Xlogin</h2>

<!-------------------------- CODE ---------------------------------->
<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP'));  ?> 
#config/main.php
Yii::setPathOfAlias('ptl',dirname(__FILE__).'/../views/widget/Xportlets');  // set path alias "ptl"

import'=>array(
         'ext.widgets.portlet.XPortlet',	
),

#components/Controller.php
public $leftPortlets=array();		//define leftPortlets
public $rightPortlets=array();	//define rightPortlets
  
#controller/nama_controller.php
public $layout='leftbar';
function init()  {	
    parent::init();		
    $this->leftPortlets['ptl.WidgetMenu']=array();  //bisa diletakan langsung dalam "view"
    ----atau-----
    $this->rightPortlets['ptl.WidgetMenu']=array();
}
<?php $this->endWidget(); ?>
