<?php $this->layout='all_sidemenu';?> 

<?php
$this->pageTitle=Yii::app()->name . ' - SideMenu';
$this->breadcrumbs=array('Side Menu Template',);
?>

<h2>All Side Menu Template</h2>

<?php
$this->menu= array(
	array('label'=>'menu1', 'items'=>array(
		array('label'=>'sub1-menu1', 'url'=>'#'),
		array('label'=>'sub2-menu1', 'url'=>'#'),
	)),
	array('label'=>'menu2', 'url'=>'#', 'visible'=>Yii::app()->user->isGuest),
);
?>

<?php
$this->beginWidget('ext-coll.MENU.sidebar.Sidebar', array('title' => 'Menu', 'collapsed' => true, 'position'=>'left'));
//here you display a cmenu or gridview or any other thing as per your needs.
//or you can simply display contents form variable like below
$this->widget('zii.widgets.CMenu', array(
    'items' => $this->menu
));
$this->endWidget();
?>

<!------------------------------------------------------------------- RIGHT SIDEBAR ---------------------------------------------------------------->
<div class="myBox">
<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
<?php
$this->beginWidget('ext-coll.MENU.rightsidebar.RightSidebar', array('title' => 'Menu', 'collapsed' => true));
$this->widget('zii.widgets.CMenu', array(
    'items' => $this->menu
));

$this->endWidget();
?>
<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<div class="tpanel right">
	<div class="toggle btn"><?php echo Yii::t('ui','View Code'); ?></div>	
	<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>
</div>
<div class="clear"></div>
</div>

<!----------------------------------------- My Custom Portlet1------------------------------------------>
<style>
/*--public $decorationCssClass='portlet-decoration';--*/
.Mydecoration-portlet1{  		/*header*/
	padding: 3px 8px;
	background: #000099; /*biru aj*/
	border-left: 0px solid #6FACCF;
}
/*--Header Title--*/
.Mytitle-portlet1{
	font-size: 12px;
	font-weight: bold;
	padding: 0;
	margin: 0;
	color:#fff; 
}

/*----public $contentCssClass='portlet-content';-----*/
.Mycontent-portlet1 {
	margin: 0px;
	padding: 0px;
	background:#EFFDFF;
}
.Mycontent-portlet1 ul{
	list-style-image:none;
	list-style-position:outside;
	list-style-type:none;
	margin: 0;
	padding: 0;
}
.Mycontent-portlet1 li{padding: 0px;}

/*----------------- CLASS OPERATION (CONTENT MENU)-----------------*/
.Myoperations1 { list-style-type: none; margin: 0; padding: 0; }
.Myoperations1 li{padding-bottom: 2px; list-style:none; }
.Myoperations1 li a{
	line-height: 15px; font: bold 11px Arial;
	text-decoration:none; 
	display:block; padding:2px 2px 2px 10px;  
	color: #0066A4;
}
.Myoperations1 li a:visited{color: #0066A4;}
.Myoperations1 li a:hover{
	/*background: #80CFFF;*/
	color:#fff; background:#e60;
}
</style>

<div class="myBox">
<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
<div class="span-4 last"><!--.span-5 {width:190px;} .last {margin-right:0;}-->
	<div id="sidebar" style="padding:0; border:1px solid #89d; margin-top:.5em;"><!--#sidebar{padding: 20px 20px 20px 0;}-->
		<?php
			$this->beginWidget('zii.widgets.CPortlet', array(
				'title'=>'Operations Custom1',
				'decorationCssClass'=>'Mydecoration-portlet1',
				'titleCssClass'=>'Mytitle-portlet1',
				'contentCssClass'=>'Mycontent-portlet1',
			));
			
			$this->widget('zii.widgets.CMenu', array(
				'items'=>$this->menu,
				'htmlOptions'=>array('class'=>'Myoperations1'),
			));
			
			$this->endWidget();
		?>
	</div><!-- sidebar -->
</div>

<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<div class="tpanel right">
	<div class="toggle btn"><?php echo Yii::t('ui','View Code'); ?></div>	
	<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>
</div>
<div class="clear"></div>
</div>

<!--------------------------------------------------------- CUSTOM SIDEBAR MENU2 --------------------------------------------------->
<div class="myBox">
<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
<style>
/*--public $decorationCssClass='portlet-decoration';--*/
.Mydecoration-portlet2{  		/*header*/
	padding: 3px 8px;

	/*background: #000099; /*biru aj*/
	/*background: #555;  /*abu gelap*/

	/*border-left: 1px solid #eee;*/	
	border-left: 0px solid #6FACCF;
	-moz-border-radius: 5px; -webkit-border-radius: 5px;
}
/*--Header Title--*/
.Mytitle-portlet2{
	font-size: 12px;
	font-weight: bold;
	padding: 0;
	margin: 0;
			
	/*color:#fff; /* title color */
	color: #e87b10; /* title color */
}

/*----public $contentCssClass='portlet-content';-----*/
.Mycontent-portlet2 {
	margin: 0px;
	padding: 0px;
	
	/*background:#EFFDFF;   /*content bg color */
	background:#fff;	/*content bg color */
}
.Mycontent-portlet2 ul{
	list-style-image:none;
	list-style-position:outside;
	list-style-type:none;
	margin: 0;
	padding: 0;
	
	/*border-top: 1px solid #F4F4F4;*/
}
.Mycontent-portlet2 li{
	display:block;
	padding: 0px 0px 4px 0px;  /*-- atur utk padding bg hover */
	margin:2px 0;
	height:13px;  
	
	font-size: 11px;
	text-decoration: none;
	border-bottom: 1px solid #F1e1e1; /*#F4F4F4*/
}

/*----------------- CLASS OPERATION (CONTENT MENU)-----------------*/
.Myoperations2 { list-style-type: none; margin: 0; padding: 0; }
.Myoperations2 li{padding-bottom: 5px; list-style:none; }
.Myoperations2 li a{
	line-height: 15px; 
	display:block; padding:0px 4px 2px 10px;  
	
	text-decoration:none; 
	/*font: bold 11px Arial;*/
	font: normal 1.1em "Trebuchet MS", "Helvetica", "Arial",  "Verdana", "sans-serif";
	color: #555 ;	
	
}
.Myoperations2 li a:visited{color: #555 ;}
.Myoperations2 li a:hover{
	/*background: #80CFFF;   -----biru muda*/
	/*background:#e60; color:#fff;  /*bg:orange txt:putih */
	background: #f3f3f3; color:#000;   /*bg:abu txt:hitam */
	-moz-border-radius: 5px; -webkit-border-radius: 5px;
}
</style>

<div style="float:left; width:150px; margin:10px 0px 0px 20px; border-left: 1px solid #eee;"><!--.span-5 {width:190px;} .last {margin-right:0;}-->
	<?php
	$this->beginWidget('zii.widgets.CPortlet', array(
			'title'=>'Operations Custom2',
			'decorationCssClass'=>'Mydecoration-portlet2',
			'titleCssClass'=>'Mytitle-portlet2',
			'contentCssClass'=>'Mycontent-portlet2',
	));
			
	$this->widget('zii.widgets.CMenu', array(
		'items'=>$this->menu,
		'htmlOptions'=>array('class'=>'Myoperations2'),
	));
			
	$this->endWidget();
	?>
</div>
<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<div class="tpanel right">
	<div class="toggle btn"><?php echo Yii::t('ui','View Code'); ?></div>	
	<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>
</div>
<div class="clear"></div>
</div>


<div class="myBox">
<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>


<!----------------------------------------- My Custom Portlet3------------------------------------------>
<style>
/*--public $decorationCssClass='portlet-decoration';--*/
.Mydecoration-portlet3{  		/*header*/
	padding: 3px 9px;
	/*background: #000099; /*biru aj*/
	/*background: #555;  /*abu gelap*/
	background: url(<?php echo Yii::app()->request->baseUrl; ?>/images/img_porlet_menu/portlet_left.gif) no-repeat left; 
	
	/*border-left: 1px solid #eee;*/	
	border-left: 0px solid #6FACCF;
	-moz-border-radius: 5px; -webkit-border-radius: 5px;
}
/*--Header Title--*/
.Mytitle-portlet3{
	font-size: 12px;
	font-weight: bold;
	padding: 0;
	margin: 0px 0px;
	
	height:18px;
	color:#fff; /* title color */
	background: url(<?php echo Yii::app()->request->baseUrl; ?>/images/img_porlet_menu/portlet_right.gif) repeat-x left center; 
}

/*----public $contentCssClass='portlet-content';-----*/
.Mycontent-portlet3 {
	margin: 0px;
	padding: 0px;
	
	/*background:#EFFDFF;   /*content bg color */
	background:#fff;	/*content bg color */

}
.Mycontent-portlet3 ul{
	list-style-image:none;
	list-style-position:outside;
	list-style-type:none;
	margin: 0;
	padding: 0;
	
	/*border-top: 1px solid #F4F4F4;*/
}
.Mycontent-portlet3 li{
	display:block;
	padding: 4px 0px 4px 0px;  /*-- atur utk padding bg hover --*/
	margin:2px 0;
	height:13px;  
	
	font-size: 11px;
	text-decoration: none;
	/*border-bottom: 1px solid #F4F4F4;*/
	border-bottom:1px dotted #b3b3b3; 
}

/*----------------- CLASS OPERATION (CONTENT MENU)-----------------*/
.Myoperations3 { list-style-type: none; margin: 0; padding: 0; }
.Myoperations3 li{padding-bottom: 5px; list-style:none; }
.Myoperations3 li a{
	line-height: 15px; 
	display:block; padding:0px 4px 2px 10px;  
	
	text-decoration:none; 
	/*font: bold 11px Arial;*/
	font: normal 1.1em "Trebuchet MS", "Helvetica", "Arial",  "Verdana", "sans-serif";
	color: #555 ;	
	
}
.Myoperations3 li a:visited{color: #555 ;}
.Myoperations3 li a:hover{
	/*background: #80CFFF;   -----biru muda*/
	/*background:#e60; color:#fff;  /*bg:orange txt:putih */
	
	background:#FFE2C6; color:#000;   /*bg:abu txt:hitam | #f3f3f3 |#e87b10:orange */
	-moz-border-radius: 5px; -webkit-border-radius: 5px; 
}
</style>

<div style="float:left; width:150px; margin:10px 0px 0px 20px;"><!--.span-5 {width:190px;} .last {margin-right:0;}-->
	<?php
	$this->beginWidget('zii.widgets.CPortlet', array(
		'title'=>'Operations Custom3',
		'decorationCssClass'=>'Mydecoration-portlet3',
		'titleCssClass'=>'Mytitle-portlet3',
		'contentCssClass'=>'Mycontent-portlet3',
	));
			
	$this->widget('zii.widgets.CMenu', array(
		'items'=>$this->menu,
		'htmlOptions'=>array('class'=>'Myoperations3'),
	));
	$this->endWidget();
	?>
</div>
	

<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<div class="tpanel right">
	<div class="toggle btn"><?php echo Yii::t('ui','View Code'); ?></div>	
	<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>
</div>
<div class="clear"></div>
</div>

  <!---------------------------------------------------------------- Side Flyout -------------------------------------------------------------->
<li> <a href="http://localhost/testing/DESIGN_INTERFACE/FORM_MENU/flyout/flyout/flyout.html" target="_blank">Side menu Flyout</a> </li>