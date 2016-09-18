<?php $this->beginContent('//layouts/main'); ?>

<!----------------------------------------- My Custom Portlet3------------------------------------------>
<style>
/*--public $decorationCssClass='portlet-decoration';--*/

.Mydecoration-portlet-blue{  		/*header*/
	
	/*background: url(<?php echo Yii::app()->request->baseUrl; ?>/images/panel-header/panel-header-default-framed-top-bg.gif); 
	border-left: 0px solid #6FACCF;
	-moz-border-radius: 5px; -webkit-border-radius: 5px; */
	
	-moz-user-select: -moz-none; width: 350px; left: -1px; top: -1px;
	
	padding: 3px 5px 4px; width: 100%; /*x-panel-header-horizontal*/
	position: absolute!important; /*x-docked*/
	
	border-color: #99bce8;/*x-panel-header-default-framed*/
	border-width: 1px;
	border-style: solid;
	background-image: none;
	background-color: #cbddf3;
} 

/*--Header Title--*/
.Mytitle-portlet-blue{
	color: #04408c;
	font-size: 11px;
	font-weight: 700;
	font-family: tahoma,arial,verdana,sans-serif;
	line-height: 17px;
}

/*----public $contentCssClass='portlet-content';-----*/
.Mycontent-portlet-blue {
	margin: 0px 0px 0px 0px;
	padding: 0px 0px 0px 0px;
	/*background:#EFFDFF;   /*content bg color */
	background:#fff;	/*content bg color */
}
.Mycontent-portlet-blue ul{
	list-style-image:none;
	list-style-position:outside;
	list-style-type:none;
	margin: 0;
	padding-top: 30px;
	/*border-top: 1px solid #F4F4F4;*/
}
.Mycontent-portlet-blue li{
	display:block;
	padding: 0px 0px 0px 0px;  /*-- atur utk padding bg hover --*/
	margin:2px 0;
	height:13px;  
	
	font-size: 11px;
	text-decoration: none;
	/*border-bottom: 1px solid #F4F4F4;*/
	border-bottom:1px dotted #b3b3b3; 
}

/*----------------- CLASS OPERATION (CONTENT MENU)-----------------*/
.Myoperations-blue{ list-style-type: none; margin: 0; padding: 0; }
.Myoperations-blue li{padding-bottom: 5px; list-style:none; }
.Myoperations-blue li a{
	display:block; padding:0px 0px 0px 5px;  
	
	text-decoration:none; 
	font: normal 1.1em "Trebuchet MS", "Helvetica", "Arial",  "Verdana", "sans-serif";
	color: #555 ;	
}
.Myoperations-blue li a:visited{color: #555 ;}
.Myoperations-blue li a:hover{
	/*background: #80CFFF;   -----biru muda*/
	/*background:#e60; color:#fff;  /*bg:orange txt:putih */
	
	background:#FFE2C6; color:#000;   /*bg:abu txt:hitam | #f3f3f3 |#e87b10:orange */
	-moz-border-radius: 5px; -webkit-border-radius: 5px; 
}
</style>

<style>
.x-panel{
	background: #fff;
	border-color: #99bce8;
	border-style: solid;
	border-width: 1px;
	border-top-color: #c5c5c5
}
.x-panel{
	overflow: hidden;
	position: relative
}
/*
.x-panel-default-framed
{
	-moz-border-radius: 4px;
	-webkit-border-radius: 4px;
	-o-border-radius: 4px;
	-ms-border-radius: 4px;
	-khtml-border-radius: 4px;
	border-radius: 4px;
	padding: 4px 4px 4px 4px;
	border-width: 1px;
	border-style: solid;
	background-color: #dfe9f6
}*/
</style>

<style>
.container {width:1300px; margin:0 auto; overflow:auto}
</style>

<div class="container"><!--.container {width:950px;margin:0 auto;}-->
	<div style="width:1100px;  float:left;margin:0" ><!--.span-9 {width:350px;}-->
		<div id="content"><!--#content{padding: 20px;}-->
			<?php echo $content; ?>
		</div><!-- content -->
	</div>

	<!--------------------------------------------------------- CUSTOM SIDEBAR MENU3 --------------------------------------------------->
	<div style="float:left; top: auto; width:160px; height:auto; margin:0px 0px 0px 0px; padding:0" class="x-panel x-panel-default-framed"><!--.span-5 {width:190px;} .last {margin-right:0;}-->
		<?php
			$this->beginWidget('zii.widgets.CPortlet', array(
				'title'=>'Operations Custom3',
				'decorationCssClass'=>'Mydecoration-portlet-blue',
				'titleCssClass'=>'Mytitle-portlet-blue',
				'contentCssClass'=>'Mycontent-portlet-blue',
			));
			
			$this->widget('zii.widgets.CMenu', array(
				'items'=>$this->menu,
				'htmlOptions'=>array('class'=>'Myoperations-blue'),
			));
			$this->endWidget();
		?>
	</div>
</div>
<?php $this->endContent(); ?>
