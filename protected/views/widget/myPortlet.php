<?php
$this->pageTitle=Yii::app()->name . ' - Portlet-Collection';
$this->breadcrumbs=array('Portlet Collection',);
?>


<?php //cs()->registerCssFile( bu('css/bootstrap.css') ); ?>
<?php Yii::app()->sc->setStart(__LINE__);  ?>
<style>
.row-left {float:left; padding-left:3px;margin-right:10px; border-left: 5px solid #F4F4F4}

/* CSS */
.portlet2 > .portlet-decoration2, .sidebar-nav > ul > li > a, .navbar li > a, th{
	font-size:14px!important;
}
/* Start Portlets*/
.portlet2{
-webkit-box-shadow:#F9F9F9 0 1px 0 inset;
  border:1px solid #DDDDDD;
  border-radius:3px;
  box-shadow:#F9F9F9 0 1px 0 inset;
  margin-bottom:20px;
  min-height:40px;
}

.portlet-decoration2{
	border-bottom:1px solid #DDD;
	background-color: #F1F1F1;
	background-image: -moz-linear-gradient(top, #F1F1F1, #DBDBDB);
	background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#F1F1F1), to(#DBDBDB));
	background-image: -webkit-linear-gradient(top, #F1F1F1, #DBDBDB);
	background-image: -o-linear-gradient(top, #F1F1F1, #DBDBDB);
	background-image: linear-gradient(to bottom, #F1F1F1, #DBDBDB);
	background-repeat: repeat-x;
	filter: progid:dximagetransform.microsoft.gradient(startColorstr='#ffF1F1F1', endColorstr='#ffDBDBDB', GradientType=0);
	padding:10px;
}

.portlet-decoration2 [class^="icon-"], .portlet-decoration2 [class*=" icon-"] 
{
  margin-right:5px;
}
.portlet-content2{
	padding:5px;
}

</style>
<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>


<div class="flash-error">
<ul class="left" style="margin-left:5px">
<b>NOTE:</b>
<li>pada main config tambahkan "widget yg di buat. cth: <code>'application.components.myCPortlet.*',</code></li>
<li>letak widget yg dibuat defaultnya pada direktori "COMPONENT"</li>
</ul>
<div class="tpanel right"> <!--- load model ------->
	<div class="toggle btn btn-sm btn-primary"><?php echo Yii::t('ui','View CSS'); ?></div>
	<div class="scroll2"><?php Yii::app()->sc->renderSourceBox();?></div>
</div>
<div class="clear"></div>
</div>


<div class="row-fluid">

<!-------------------------------------------------- CMenu widget ----------------------------------------------------->
<div class="row-left">
<p><span class="badge badge-inverse">CMenu</span> </p>

<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
<?php
$menu  = array(
	// Important: you need to specify url as 'controller/action',
	// not just as 'controller' even if default acion is used.
	// 'Products' menu item will be selected no matter which tag parameter value is since it's not specified.
	array('label'=>'menu1', 'items'=>array(
		array('label'=>'sub1-menu1', 'url'=>array('controller/sub1-menu1', 'tag'=>'new')),
		array('label'=>'sub2-menu1', 'url'=>array('controller/sub2-menu1', 'tag'=>'popular')),
	)),
	array('label'=>'menu2', 'url'=>array('controller/menu2'), 'visible'=>Yii::app()->user->isGuest),
);
	  
$this->widget('zii.widgets.CMenu', array(
     'items'=>$menu,
  ));
 ?>
 
 <?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
	<div class="tpanel left">
		<div class="toggle btn btn-sm btn-default"><?php echo Yii::t('ui','View Code'); ?></div>
		<div><?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?></div>
	</div>
</div>

<!--------------------------------------------- CPORTLET YII -------------------------------------------------->
<div class="row-left">
<p><span class="badge badge-inverse">CPortlet</span> </p>
<?php Yii::app()->sc->setStart(__LINE__);  ?>

<?php 
	$this->beginWidget('zii.widgets.CPortlet', array(
	'title'=>'CPortlet Sample',
	'htmlOptions'=>array('style'=>'width:300px'),
	)); 
?>
    ...insert content here...
<?php $this->endWidget(); ?>

<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>

<div class="tpanel"> 
	<div class="toggle btn btn-sm btn-default"><?php echo Yii::t('ui','Show Widget'); ?></div>
	<div><?php Yii::app()->sc->renderSourceBox(); ?></div>
</div>
</div>

<!--------------------------------------------- CUSTOM CSS - CPORTLET YII -------------------------------------------------->
<div class="row-left">
<p><span class="badge badge-inverse">Custom CPortlet Yii</span></p>
<?php Yii::app()->sc->setStart(__LINE__);  ?>
<?php
		$this->beginWidget('zii.widgets.CPortlet', array(
			'title'=>"<i class='icon_max'></i> Sample CPortlet",
			'htmlOptions'=>array('class'=>'portlet2', 'style'=>'width:300px'),
			'decorationCssClass'=>"portlet-decoration2",
			'titleCssClass'=>null,
			'contentCssClass'=>"portlet-content2",
			'hideOnEmpty'=>true, #default "true"
		));
	?>
        .. content portlet.. (anything or menu) 
<?php $this->endWidget();?>

<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>

	<div class="tpanel"> 
		<div class="toggle btn btn-sm btn-default"><?php echo Yii::t('ui','Show Widget'); ?></div>
		<div><?php Yii::app()->sc->renderSourceBox(); ?></div>
	</div>
</div>

<!-------------------------------------------------- XPortlet ----------------------------------------------------->
<div class="row-left" style="width:200px">
<p> <span class="badge badge-inverse">XPorlet Sample</span> </p>
<?php Yii::app()->sc->setStart(__LINE__);  ?>

<?php $this->beginWidget('ext.XPortlet.XPortlet', array('title'=>'XPortlet Sample')); ?>
<?php
$this->widget('zii.widgets.CMenu', array(
    'items' => $menu
));
?>
<?php $this->endWidget(); ?>

<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
	<div class="tpanel left"> 
		<div class="toggle btn btn-sm btn-default"><?php echo Yii::t('ui','Show Widget'); ?></div>
		<div><?php Yii::app()->sc->renderSourceBox(); ?></div>
	</div>
</div>

<!-------------------------------------------------------------- SAMPLE "myPortlet - widget" ---------------------------------------------------------------->
<div class="row-left">
<p> <span class="badge badge-inverse">myPortlet - extends CWidget</span> </p>
<?php Yii::app()->sc->setStart(__LINE__);  ?>

<?php 
$this->widget('myPortlet', array(
	'title'=>'title', 
	'cssClass'=>'myPortlet',
	'headerCssClass'=>'myPortlet-header',
	'contentCssClass'=>'myPortlet-content',
	'visible'=>true,
	'htmlOptions'=>'width:200px; height:70px',
	'content'=>"myPortlet extends CWidget", 
)); 
?>

<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<div class="tpanel left"> 
	<div class="toggle btn btn-sm btn-default"><?php echo Yii::t('ui','Show Widget'); ?></div>
	<div><?php Yii::app()->sc->renderSourceBox(); ?></div>
</div>
<div class="tpanel left"> 
	<div class="toggle btn btn-sm btn-default"><?php echo Yii::t('ui','Show Widget Source'); ?></div>
	<div class="scroll2" style="width:auto"><?php $this->render_script('protected\components\MY-X\myPortlet.php'); ?></div>
</div>
</div>

<!---------------------------------------------------------------- SAMPLE "TagTreeMenu" ------------------------------------------------------------------->
<div class="row-left" style="width:200px">
<p><span class="badge badge-inverse">TagTreeMenu( extend myPortlet )</span></p>
<?php Yii::app()->sc->setStart(__LINE__);  ?>

<?php 
$this->widget('TagTreeMenu', array() );
?>

<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<div class="tpanel left"> 
	<div class="toggle btn btn-sm btn-default"><?php echo Yii::t('ui','Show Widget'); ?></div>
	<div><?php Yii::app()->sc->renderSourceBox(); ?></div>
</div>
<div class="tpanel left"> 
	<div class="toggle btn btn-sm btn-default"><?php echo Yii::t('ui','Show Widget Source'); ?></div>
	<div><?php $this->render_script('protected\components\MY-X\TagTreeMenu.php'); ?></div>
</div>
</div>

<!--------------------------------------------------- /my/menuPortlet --------------------------------------------->
<div class="row-left" style="width:300px">
<p> <span class="badge badge-inverse">myMenuPortlet Sample</span> </p>
CSS Options : <code>style.css, style2.css, style3.css </code>

<?php Yii::app()->sc->setStart(__LINE__);  ?>

<?php 
$this->widget('myMenuPortlet', array(
	'title'=>'title', 
	'css'=>'style2.css', //def: style.css - opsi : style2.css, style3.css 
	'menu'=>$menu ) );  
?>

<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
	<div class="tpanel left"> 
		<div class="toggle btn btn-sm btn-default"><?php echo Yii::t('ui','Show Widget'); ?></div>
		<div><?php Yii::app()->sc->renderSourceBox(); ?></div>
	</div>
</div>

<!--------------------------------------------------- /my/menuPortlet --------------------------------------------->
<div class="row-left">
<p> <span class="badge badge-inverse">myCPortlet-extends CPortlet</span> </p>
<?php Yii::app()->sc->setStart(__LINE__);  ?>

<?php 
 //opsi : style.css, style2.css, style3.css 
$this->beginWidget('myCPortlet', array(
	'title'=>'test', 
	'css'=>'style2.css',
) ); 
?>
<div style="width:200px; padding:3px">
sample myCPortlet widget, konsepnya cuma skedar box porlet tempat kontent aja, <br>
ini kepanjangan/ extedn dari CPortlet<br>
beda-nya ada tambahan variable untuk input css file
<p>CSS Availlable : <code>style.css, style2.css, style3.css </code></p>
</div>
<?php $this->endWidget();?>

<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
	<div class="tpanel left"> 
		<div class="toggle btn btn-sm btn-default"><?php echo Yii::t('ui','Show Widget'); ?></div>
		<div><?php Yii::app()->sc->renderSourceBox(); ?></div>
	</div>
	<div class="tpanel left"> 
		<div class="toggle btn btn-sm btn-default"><?php echo Yii::t('ui','myCPortlet Class'); ?></div>
		<div><?php $this->render_script('D:\WEB\HTDOCS\yiiProject\yiiTest\protected\components\MY-X\myCPortlet\myCPortlet.php'); ?></div>
	</div>
</div>

<!------------------------------------------------------- SAMPLE "myPortlet-x" ----------------------------------------------------->
<div class="row-left">
<p> <span class="badge badge-inverse">myPortlet-x - extends CWidget</span></p>

<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>

<?php 
$content='test';
$this->widget('myPortlet_x', array(
	'title'=>'Ini Contoh Title', 
	'content'=>$content, 
	'width'=>'300px',
	'height'=>'100px',
	'background'=>"",	#def : "#FFF"
	)
); 
?>
<!----- ANI PROCESS WAITING ------->
<!--
<div class="detail_loading" style="display:block">
	<div class="x-mask" style="z-index: 18999; width:900px; height: 255px; left: 139px; top: 395px; visibility: true;"></div>
	<div style="z-index: 19000; left: 472px; top: 519px; width: 92px; height: 31px; box-shadow: 0px 0px 4px rgb(136, 136, 136); 
		display: block;"  class="x-css-shadow" role="presentation"></div>
	<div style="left: 470px; top: 519px; z-index: 19001; display: block;" class="x-mask-msg x-layer x-mask-msg-default">
      <div style="position: relative;" class="">
        Loading...
      </div>
	</div> 
</div>
-->

<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
	<div class="tpanel left"> 
		<div class="toggle btn btn-sm btn-default"><?php echo Yii::t('ui','Show Widget'); ?></div>
		<div><?php Yii::app()->sc->renderSourceBox(); ?></div>
	</div>
	<div class="tpanel left"> <!--- load model ------->
		<div class="toggle btn btn-sm btn-default"><?php echo Yii::t('ui','Show Widget Source'); ?></div>
		<div><?php $this->render_script('D:\WEB\HTDOCS\yiiProject\yiiTest\protected\components\MY-X\myPortlet_x.php'); ?></div>
	</div>
</div>


<!----------------------------------------------------------- MY PANEL TASKBAR -------------------------------------------------------->
<div class="row-left">
<p><span class="badge badge-inverse">myPanelbar</span></p>
<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>

<div id="box" class="myBox" style="width:300px; height:100px; overflow:auto">
<?php
$this->widget('myPanelbar', array(
	'selector'=>null,	# if ID null then - using parent object 
	//'class'=>'box', # default - btn btn-sm btn-default-group ( style border, color for group button )
	'title'=>'title', 'content'=>array(1,2,3,4,5,6,7,8,9,10),  # optional aja
)); 
?>

<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
</div>

	<div class="tpanel left"> 
		<div class="toggle btn btn-sm btn-default"><?php echo Yii::t('ui','Show Widget'); ?></div>
		<div><?php Yii::app()->sc->renderSourceBox(); ?></div>
	</div>
</div>

<!----------------------------------------------------------- MY PANEL TASKBAR (with selector) -------------------------------------------------------->
<div class="row-left">
<p><span class="badge badge-inverse">myPanelbar ( with selector ID)</span></p>
<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>

	<?php $this->widget('myPanelbar', array('selector'=>'id1', 'title'=>'', 'content'=>'', ));  ?>
	
	<div class="myBox" id="id1" style="height:100px; width:300px;overflow:auto">
	<?php dump(array(1,2,3,4,5,6,7,8,9,10)); ?>
	</div>
	
	<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>

	<div class="tpanel left"> 
		<div class="toggle btn btn-sm btn-default"><?php echo Yii::t('ui','Show Widget'); ?></div>
		<div><?php Yii::app()->sc->renderSourceBox(); ?></div>
	</div>

	<div class="tpanel left"> <!--- load model ------->
		<div class="toggle btn btn-sm btn-default"><?php echo Yii::t('ui','Show Widget Source'); ?></div>
		<div><?php $this->render_script('D:\WEB\HTDOCS\yiiProject\yiiTest\protected\components\MY-X\myPanelbar.php'); ?></div>
	</div>

</div><!--- row-fluid -->



