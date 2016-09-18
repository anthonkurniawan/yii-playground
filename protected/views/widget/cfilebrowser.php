<?php $this->layout='column2';?>

<?php
$this->pageTitle=Yii::app()->name . ' - Tree Cfile Browser'; 
$this->breadcrumbs=array('CFileBrowser',);
?>
<?php $this->renderPartial('/widget/CtreeView/_menu');?> 
 
 <h1><?php echo Yii::app()->controller->action->id;?></h1>
 <?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
 
<div id="filebrowser" style="width:200px; border:1px solid whitesmoke; float:left"></div>

<?php 
$this->widget('ext.cfilebrowser.CFileBrowserWidget',
	array(
		//'root'=>'/var/',
		'root'=>'/xampp/',
		//'script'=>array('site/index'),
		'script'=>array('widget/FileBrowser'),
		'folderEvent'=>'click',
		'expandSpeed'=>1000,
		'collapseSpeed'=>1000,
		'multiFolder'=>true,
		'loadMessage'=>'File Browser Is Loading...hang on a sec',
		'expandEasing'=>'easeOutBounce',   //bouncing
       	'collapseEasing'=>'easeOutBounce',
		'callbackFunction'=>'alert("I selected " + f)'
));	
?>

<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>

<div style="float:left; width:500px; margin-left:1px">
<a href="http://www.yiiframework.com/extension/cfilebrowserwidget/" target="_blank" on><b>Extension</b></a> |
<a href="http://www.abeautifulsite.net/blog/2008/03/jquery-file-tree/" target="_blank"><b>more info</b></a> |
<a href="http://mbraak.github.com/jqTree/" target="_blank"><b>Other TreeView Plugin(jqtree)</b></a> |
<a href="http://localhost/HTDOCS/TESTING/JQUERY_TESTER/jquery.treeview/demo/" target="_blank"><b>Other TreeView Plugin(jzaefferer)</b></a><br><br>

<div class="ket" style="padding:10px">
<b class="txtTitle">Options :</b><br>
<b class="txtHead">script</b> - (required) The connector. You must specify as an array e.g. 'array("site/filebrowser")'<br>
<b class="txtHead">root </b>- The location to start from (default: '/')<br>
<b class="txtHead">folderEvent </b>- The event to expand a folder (default: 'click')<br>
<b class="txtHead">expandSpeed </b>- Time in miliseconds (default: 500)<br>
<b class="txtHead">collapseSpeed </b>- Time in miliseconds (default: 500)<br>
<b class="txtHead">callbackMethod </b>- Where 'f' is the file selected<br>
<b class="txtHead">expandEasing </b>- (optional)The easing method<br>
<b class="txtHead">collapseEasing </b>- (optional) The easing method<br>
<b class="txtHead">loadMessage </b>- (optional) Specify your own message<br>
<b class="txtHead">containerID </b>- (optional) Specify your own div id (default: 'filebrowser')<br>
<b class="txtHead">cssFile </b>- (optional) Specify your own CSS file or set as false for none
</div>
</div>
<div class="clear"></div>

<!-------------------------------------------------------------------- CODE VIEW --------------------------------------------------------------------->
<div class="tpanel left">
	<div class="toggle btn"><?php echo Yii::t('ui','Code View'); ?></div>
	<div class='scroll'><?php Yii::app()->sc->renderSourceBox(); ?></div>
</div>

<div class="tpanel left">
	<div class="toggle btn"><?php echo Yii::t('ui','Code Ajax Call'); ?></div>
	<div class='scroll'><?php $this->render_script(array('widget/FileBrowser')); ?></div>
</div>


 <?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
<!--
<script src="<?php //echo Yii::app()->request->baseUrl; ?>/js/treeJS/jqueryFileTree.js" type="text/javascript" charset="utf-8"></script>
<script src="<?php //echo Yii::app()->request->baseUrl; ?>/js/treeJS/jquery.easing.js" type="text/javascript" charset="utf-8"></script>
<link rel="stylesheet" href="<?php //echo Yii::app()->request->baseUrl; ?>/js/treeJS/jqueryFileTree.css" type="text/css">
<script type="text/javascript">
//<![CDATA[		
jQuery(document).ready(function() { //alert('test');
        jQuery('#filebrowser').fileTree({
                root: 'xampp/',
				//root:'/yii-1.12/yiiTest/',
                //script:'/index.php?r=site/filebrowser',
				script:'filebrowser2',   
                folderEvent:'click',
                expandSpeed:1000,
                collapseSpeed:1000,
                multiFolder:true,
                loadMessage:'File Browser Is Loading...hang on a sec',
                expandEasing:'easeOutBounce',
                collapseEasing:'easeOutBounce'
        }, function(f){
                alert("I selected " + f);
        });
});		
//]]>>
</script>-->
<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>

<div class="tpanel left">
	<div class="toggle btn"><?php echo Yii::t('ui','Rendered Script'); ?></div>
	<div class='scroll'><?php Yii::app()->sc->renderSourceBox(); ?></div>
</div>