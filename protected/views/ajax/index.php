
<?php if( Yii::app()->request->isAjaxRequest ) {  echo "test: ini dari ajax request"; ?>  
<style>
.form{ font-size: 62.5%; }
</style>
<?php } ?>	

<?php $this->layout='column2';?>
<style type="text/css">
table { border:1px solid;}
td{ border:1px solid; border-bottom:0; border-left:0 }
.span-5 { float: right; width:170px }
/*
.container { width: 1200px }
.span-19{ width:950px } 

div.loading {
    background-color: #eee;
    background-image:  url(<?php Yii::app()->request->baseUrl;?>'../../images/loading/loading_gear.gif');
	background-position:  center center;
    background-repeat: no-repeat;
    opacity: 1;
}
div.loading * {
    opacity: .8;
}	*/
</style>

<div id="maindiv">
<?php
$this->pageTitle=Yii::app()->name . ' - Ajax Basic'; 
$this->breadcrumbs=array('Ajax Basic',);
?>

<?php
$this->menu=array(
	array('label'=>'GridView with Ajax', 'url'=>array('admin_ajax'), 'linkOptions'=>array('target'=>'_blank'),),
	array('label'=>'GridView Ajax(CJSON)',  'url'=>array('admin_ajax2'), 'linkOptions'=>array('target'=>'_blank'),),
	array('label'=>'Tooltip with Ajax', 'url'=>array('tooltip'), 'linkOptions'=>array('target'=>'_blank'),),
);
?>

<b class="txtTitle">Sample Ajax</b><br>	
<a href="http://localhost/yiidoc/CHtml.html#ajax-detail" target="_blank">YII-Ajax doc</a> |
<a href=" http://api.jquery.com/category/ajax/" target="_blank">Ajax JQuery-Dokumentasi</a> |
<a href="http://localhost/yiidocCHtml.html#ajaxButton-detail" target="_blank">Ajax Yii-Dokumentasi</a> |
<a href="http://localhost/yii/yii_playground2/index.php?r=AjaxModule/ajax/ajaxRequest" target="_blank">Sample Yii-PlayGround</a> |
<a href="http://ajaxload.info/" target="_blank">Download Ajax Load Indicator</a><br>
 <br>

 <?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>

<?php
$this->widget('zii.widgets.jui.CJuiTabs', array(
    'tabs'=>array(
		//'Request Sample'=>array( 'content'=>$this->renderPartial('_req_sample',null,true), 'id'=>'tab0' ),
		'<span>Request Sample</span>'=>array('ajax'=>array('','view'=>'_req_sample'), 'id'=>'tab0'),
		'<span>Ajax()</span>'=>array('ajax'=>array('','view'=>'_ajax_jq'), 'id'=>'tab1'),
		'<span>Ajax Btn/Link</span>'=>array('ajax'=>array('','view'=>'_ajax_btn_link'), 'id'=>'tab2'),
		'<span>Ajax Submit Btn</span>'=>array('ajax'=>array('','view'=>'_ajax_submit'), 'id'=>'tab3'),
		'<span>$.ajax()</span>'=>array('ajax'=>array('','view'=>'_ajax'), 'id'=>'tab4'),
		'<span>XMLHttpReques & XML DOM</span>'=>array('ajax'=>array('','view'=>'_XMLHttpRequest_XML'), 'id'=>'tab5'),
		'<span>$.getJSON()</span>'=>array('ajax'=>array('','view'=>'_getjson'), 'id'=>'tab6'),
		'$.get'=>array('content'=>"<code>$.get('/testing/chart/Highcharts-3.0.1/examples/line-ajax/analytics_ori.csv, function (csv) { }</code>", 'id'=>'tab3'),

    ),
    // additional javascript options for the tabs plugin
    'options'=>array(
        'collapsible'=>true,
        'selected'=>0,
    ),
    'htmlOptions'=>array(
        'style'=>'width:900px; overflow:auto'
    ),
));
?>


</div><!--maindiv-->