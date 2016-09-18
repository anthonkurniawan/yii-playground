<?php //$this->layout='column1'; ?>
<?php
$this->pageTitle=Yii::app()->name . ' - My Box';
$this->breadcrumbs=array('Box Standart',);
?>

<?php
// $this->menu=array(
	// array('label'=>'CTreeView Basic', 'url'=>array('CTreeView/tree'), 'linkOptions'=>array('target'=>'_blank')),
	// array('label'=>'CTreeView DB', 'url'=>array('CTreeView/tree_db'), 'linkOptions'=>array('target'=>'_blank')),
// );
?>

<style> /*reset from bootstrap*/

</style>

background-image: url("../img/glyphicons-halflings.png");
    background-position: 14px 14px;
    background-repeat: no-repeat;
<!----------------------------------------------------- CONTENT ------------------------------------------------------>
<b class="badge">Box Standart</b><br>

<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ext_form/ext-form-basic.css" /><p>

	<!--<div id="viewDetail" style="width:200px; height:inherit; height:200px; float:left; border:#03F 1px solid">
    	<?php //echo $this->renderPartial('view', array('model'=>$model)); ?> 
    </div>-->
	<!--- FRAME BOX --->
	<div class="x-panel x-panel-default-framed" style="width:auto; height: 270px; background:#FFF"><!--362px--><!--- frame box -->
		<!--- TOOLBAR HEADER --->
		<div style="-moz-user-select: -moz-none; width:100%; left: -1px; top: -1px;" class="x-docked x-panel-header-default-framed x-panel-header-horizontal">
			<div style="width: 588px; height: 17px;" class="x-box-inner" role="presentation">
				<div class="x-panel-header-text x-panel-header-text-default-framed">Order &amp; Material Details </div>
				<div class="x-tool x-box-item" style="width: 15px; height: 15px; left: 573px; top: 1px; margin: 0px;">
					<img src="data:image/gif;base64,R0lGODlhAQABAID/AMDAwAAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" class="x-tool-collapse-top" role="presentation"/>
				</div>
			</div>
		</div><!--- toolbar content --->
   
		<!----- CONTENT ------>
		<div class="x-panel-body x-panel-body-default-framed" style="padding: 5px 5px 0px; width:auto; left: 0px; top:20px; background:#FFF">
			<div id="reqData" style="float:left; width:300px">klik salah satu row datanya bisa di update disini..</div>
			<div id="gridbox" style="float:left; width:500px; height:200px"></div>
		</div>
    
	</div><!--- frame box -->
    


	
<!--------------------------------------------------------------------------------------------------------------------------------------------------->
<hr>
<b class="badge">Simple Box</b><br>

<style>
.x-panel2,.x-plain{ overflow: hidden; position: relative }	
.x-panel-default-framed2
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
	background-color: #dfe9f6;
	
	border-color: #99bce8;
	overflow: hidden; position: relative ;
	/*
	padding: 0!important;
	border-width: 0!important;
	-moz-border-radius: 0;
	-webkit-border-radius: 0;
	-o-border-radius: 0;
	-ms-border-radius: 0;
	-khtml-border-radius: 0;
	border-radius: 0;
	background-color: transparent;
	background-position: 1000404px 1000404px;
	*/
}
.x-panel-header-default-framed2
{
	font-size: 11px;
	border-color: #99bce8;
	border-width: 1px;
	border-style: solid;
	background-image: none;
	background-color: #cbddf3;
	background-image: -webkit-gradient(linear,50% 0,50% 100%,color-stop(0%,#dae7f6),color-stop(45%,#cddef3),color-stop(46%,#abc7ec),color-stop(50%,#abc7ec),color-stop(51%,#b8cfee),color-stop(100%,#cbddf3));
	background-image: -webkit-linear-gradient(top,#dae7f6,#cddef3 45%,#abc7ec 46%,#abc7ec 50%,#b8cfee 51%,#cbddf3);
	background-image: -moz-linear-gradient(top,#dae7f6,#cddef3 45%,#abc7ec 46%,#abc7ec 50%,#b8cfee 51%,#cbddf3);
	background-image: -o-linear-gradient(top,#dae7f6,#cddef3 45%,#abc7ec 46%,#abc7ec 50%,#b8cfee 51%,#cbddf3);
	background-image: -ms-linear-gradient(top,#dae7f6,#cddef3 45%,#abc7ec 46%,#abc7ec 50%,#b8cfee 51%,#cbddf3);
	background-image: linear-gradient(top,#dae7f6,#cddef3 45%,#abc7ec 46%,#abc7ec 50%,#b8cfee 51%,#cbddf3);
	-moz-box-shadow: #f4f8fd 0 1px 0 0 inset;
	-webkit-box-shadow: #f4f8fd 0 1px 0 0 inset;
	-o-box-shadow: #f4f8fd 0 1px 0 0 inset;
	box-shadow: #f4f8fd 0 1px 0 0 inset
}
.x-panel-header-horizontal2
{
	padding: 3px 5px 4px;
	width: 100%;
}

.x-docked2
{
	position: absolute!important;
	z-index: 1
}

.x-box-inner2
{
	border-width: 0;
	position: relative;
	top: -1px;
	
	overflow: hidden;
	zoom: 1;
	position: relative;
	left: 0;
	top: 0;
}

.x-panel-header-text2
{
	user-select: none;
	-o-user-select: none;
	-ms-user-select: none;
	-moz-user-select: -moz-none;
	-webkit-user-select: none;
	cursor: default;
	white-space: nowrap;
	
	cursor: move;
}
.x-panel-header-text-default-framed2
{
	color: #04408c;
	font-size: 11px;
	font-weight: 700;
	font-family: tahoma,arial,verdana,sans-serif;
	line-height: 17px
}

.x-tool2
{
	height: 15px;
	float: left;
	margin: 1px 0 0 0;
	
	margin-right: 3px;
	
	position: relative;
	top: -1px
}
.x-tool2 img     /* ICON CLOSE ON TOP TOOLBAR */
{
	overflow: hidden;
	width: 15px;
	height: 15px;
	cursor: pointer;
	background-color: transparent;
	background-repeat: no-repeat;
	background-image: url("../../css/ext_form/img/tool-sprites.gif"); 
	margin: 0
}

.x-box-item2
{
	position: absolute!important;
	left: 0;
	top: 0
}

.x-tool-collapse-top2 {
	background-position: 0 -255px;
	background-position: -15px -255px;
	background-position: 0 -210px;
	
}

.x-panel-body-default
{
	background: #fff;
	border-color: #99bce8;
	color: #000;
	border-width: 1px;
	border-style: solid
}

.x-panel-body2 {
	overflow: hidden;
	position: relative;
	font-size: 12px;
	
/*	background-color: #eaf1fb;
	border-top: 1px solid #99bce8!important;
	border-bottom: 1px solid #99bce8!important; */
}

.x-panel-body-default-framed2
{
	background: #dfe9f6;
	border-color: #99bce8;
	color: #000;
	border-width: 0;
	border-style: solid
}

.btn_close2{
	background-image: url("../../css/ext_form/img/tool-sprites.gif"); 
/* background-image: url("<?php Yii::app()->baseUrl.'/css/ext_form/img/tool-sprites.gif';?> "); */

display: inline-block;
    width: 14px;
    height: 14px;
    margin-top: 1px;
    *margin-right: .3em;
    line-height: 14px;
    vertical-align: text-top;
    background-position: 14px 14px;
    background-repeat: no-repeat;
}

.btn_close{
	/*display: inline-block;	*/
	
    width: 16px;
    height: 16px;
	
    margin-top: 1px;
    *margin-right: .3em;
    line-height: 14px;
    /*	vertical-align: text-top;	*/
	
	/*	background-color: #eee;
    background-image:  url(<?php Yii::app()->request->baseUrl;?>'../../images/loading/black_loading5.gif'); */
	
	background-image: url("../../css/ext_form/img/tool-sprites.gif"); 
	 background-position: 1px 1px;
    background-repeat: no-repeat;
    opacity: 1;
}

</style>

img : <img class="btn_close"/>	<br>
div : <div class="btn_close"></div>	<br>
span: <span class="btn_close"/> &nbsp;</span> <br>
button: <button class="btn_close"></button> <br>

<?php		
$file = getcwd(). '/css/ext_form/img/tool-sprites.gif';	echo $file;
if($fp = fopen($file,"rb", 0))
{
   $picture = fread($fp,filesize($file));
   fclose($fp);
   $base64 = chunk_split(base64_encode($picture));			#echo $base64;
}
?>


<br>
<div class="x-panel-default-framed2" style="width:700px; height: 150px; background:#FFF"><!--362px--><!--- frame box -->
	<!--- TOOLBAR HEADER --->
	<div style="-moz-user-select: -moz-none; width:100%; left: -1px; top: -1px;" class="x-docked2 x-panel-header-default-framed2 x-panel-header-horizontal2">
		<div style="width: 588px; height: 17px;" class="x-box-inner2" role="presentation">
			<div class="x-panel-header-text2 x-panel-header-text-default-framed2">Order &amp; Material Details </div>
			<div class="x-tool2 x-box-item2" style="width: 15px; height: 15px; left: 473px; top: 1px; margin: 0px;">
				<img src="data:image/gif;base64,R0lGODlhAQABAID/AMDAwAAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" class="x-tool-collapse-top" role="presentation"/>-->
				<!--atau bisa juga-->
				<!--<img src="data:image/gif;base64, <?= $base64?>" style="background-position: -150px -25px;"/>-->
			</div>
		</div>
	</div><!--- toolbar content --->
   
	<!----- CONTENT ------>
	<div class="x-panel-body2 x-panel-body-default-framed2" style="padding: 5px 5px 0px; width:auto; left: 0px; top:20px; background:#FFF">
		<div id="reqData" style="float:left; width:300px">
			ISI CONTENT.. XXXXXXXXXX XXXXXXXXXXXXX XXXXXXXXXXXXXXXX XXXXXXXXXXXXXXXX XXXXXXXXXXXXXXXX XXXXXXXXXXXXXX XXXXXXXXX
		</div>
	</div>
    
</div><!--- frame box -->

<!----- ANI PROCESS WAITING ------->
<!--
<div class="detail_loading" style="display:block">
	<div class="x-mask" style="z-index: 18999; width:900px; height: 255px; left: 139px; top: 395px; visibility: true;"></div>
	<div style="z-index: 19000; left: 472px; top: 519px; width: 92px; height: 31px; box-shadow: 0px 0px 4px rgb(136, 136, 136); display: block;"  class="x-css-shadow" role="presentation"></div>
	<div style="left: 470px; top: 519px; z-index: 19001; display: block;" class="x-mask-msg x-layer x-mask-msg-default">
      <div style="position: relative;" class="">
        Loading...
      </div>
	</div> 
</div>
-->

<!--------------------------------------------------------------------------------------------------------------------------------------------------->
