<style>
pre {margin:0px 0px 0px 0px}
.view2{ width:auto}
.php-hl-main {font-size:10px}
.php-hl-table {font-size:10px}
.html-hl-main  {font-size:11px}
.javascript-hl-main{font-size:10px}
</style>

<?php $this->pageTitle=Yii::app()->name . ' - CtreeView'; ?>

<?php $this->renderPartial('/widget/CtreeView/_menu');?> 

<h1>CTreeView - <?php echo Yii::app()->controller->action->id;?></h1>
<a href="http://localhost/HTDOCS/testing/DIR&FILETREE/jquery.treeview/demo/" target="_blank">Demo Jquery treeview</a>

<div class="view2">
<span class="badge">Sample TreeView</span>

 <?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
 
<script type="text/javascript">
		$(function() {
			//$("#mytree").treeview();
			$("#add").click(function() {
				var branches = $("<li><span class='folder'>New Sublist</span><ul>" + 
					"<li><span class='file'>Item1</span></li>" + 
					"<li><span class='file'>Item2</span></li></ul></li>").appendTo("#mytree");
				$("#mytree").treeview({
					add: branches
				});
				branches = $("<li class='closed'>"+
					"<span class='folder'>New Sublist</span>"+
					"<ul><li><span class='file'>Item1</span></li><li><span class='file'>Item2</span></li></ul></li>").prependTo("#folder21");
				$("#mytree").treeview({
					add: branches
				});
			});
			$("#mytree").bind("contextmenu", function(event) {
				if ($(event.target).is("li") || $(event.target).parents("li").length) {
					$("#mytree").treeview({
						remove: $(event.target).parents("li").filter(":first")
					});
					return false;
				}
			});
		})
</script>

<p>
<div id="sidetreecontrol">
	<a href="?#">Collapse All</a> | <a href="?#">Expand All</a>
	<button id="add">Add!</button>
</div>

<?php 
$this->widget('CTreeView',array(
	'id'=>'mytree',
	'data'=>$data,
	'animated'=>'slow',
	'collapsed'=>true,
	'control'=>"#sidetreecontrol",
	//'persist'=>"location",
	//'toggle'=>"js:alert(this)",  //keluar pas page load??
	'htmlOptions'=>array('class'=>'filetree')
)); 
?>
<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
</p>

<div class="tpanel left"> 
	<div class="toggle btn"><?php echo Yii::t('ui','View Code'); ?></div>
	<div class="scroll"><?php Yii::app()->sc->renderSourceBox(); ?></div>
</div>
<div class="tpanel left">
	<div class="toggle btn"><?php echo Yii::t('ui','CTreeView Widget'); ?></div>
	<div class='scroll'><?php $this->render_script('protected/components/my-x/CTreeView.php'); ?></div>
</div>

<div class="tpanel right"> 
	<b class="toggle btn"><?php echo Yii::t('ui','View Data Result'); ?></b>
	<div class="scroll"><?php dump($data); ?></div>
</div>
<div class="clear"></div>

<?php $this->render_script(array($this->route)); ?>

</div> <!-- div view2 -->

<!--------------------------------------------------------------------- SAMPLE 2 ------------------------------------------------------->
<div class="view2">
<span class="badge">SampleTreeView Async</span>
<p>
 <?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
<?php 
$this->widget('CTreeView',array(
	'url'=>array('treeFill'),
	'animated'=>'slow',
	'htmlOptions'=>array('class'=>'treeview-famfamfam')
)); 
?>
<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox(); ?>
</p>

<div class="tpanel right"> 
	<div class="toggle btn"><?php echo Yii::t('ui','action TreeFill'); ?></div>
	<div class="scroll"><?php $this->render_script(array('treeMenu/TreeFill')); ?></div>
</div>
</div>


<?php $this->renderPartial('/widget/CtreeView/_CTreeView_doc'); ?>