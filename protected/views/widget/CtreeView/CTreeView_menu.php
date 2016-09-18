<style>pre{margin: 0px 0px 0px 0px; font-size:10px}</style>

<?php $this->layout='column2'; ?>
<?php $this->pageTitle=Yii::app()->name . ' - Tree Menu'; ?>

<?php $this->renderPartial('CtreeView/_menu');?>

<div class="view2">
	<ul>
	 <li>text: string, required, the HTML text associated with this node.</li>
	 <li>expanded: boolean, optional, whether the tree view node is expanded.</li>
	 <li>id: string, optional, the ID identifying the node. This is used
	   in dynamic loading of tree view (see {@link url}).</li>
	 <li>hasChildren: boolean, optional, defaults to false, whether clicking on this
	   node should trigger dynamic loading of more tree view nodes from server.
	   The {@link url} property must be set in order to make this effective.</li>
	 <li>children: array, optional, child nodes of this node.</li>
	 <li>htmlOptions: array, additional HTML attributes (see {@link CHtml::tag}).
	   This option has been available since version 1.1.7.</li>
	</ul> 
</div>

<code>widgetController</code>-><code>treeMenuAction</code>
<pre>
public function actions(){
	return array(
		'treeMenu'=>array( 'class'=>'application.controllers.CTreeView_actions.treeMenuAction'),
</pre>
<div class="tpanel right"> 
	<div class="toggle btn"><?php echo Yii::t('ui','treeMenuAction'); ?></div>
	<div class="scroll"><?php $this->render_script('protected/controllers/CTreeView_actions/treeMenuAction.php'); ?></div>
</div>
<div class="clear"></div>

<h1>CTreeView Menu</h1>

<div class="view2">
<span class="badge">Sample TreeView</span>
<p>
 <?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
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
</p>
</div>
<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox(); ?>

<!--
<div class="view2">
<span class="badge">SampleTreeView Async</span>
<p>
<?php 
// $this->widget('CTreeView',array(
	// 'url'=>array('treeFill'),
	// 'animated'=>'slow',
	// 'htmlOptions'=>array('class'=>'treeview-red')
// )); 
?>
</p>
</div>-->

<div class="tpanel right"> 
	<b class="toggle btn"><?php echo Yii::t('ui','View Data Result'); ?></b>
	<div class="scroll"><?php dump($data); ?></div>
</div>

<div class="tpanel left">
	<div class="toggle btn"><?php echo Yii::t('ui','CTreeView Widget'); ?></div>
	<div class='scroll'><?php $this->render_script('protected/components/my-x/CTreeView.php'); ?></div>
</div>
<div class="clear"></div>

<!--------------------------------------------------------------------- Sample Create Other Widget---------------------------------------------------------------->
<h2>Sample TagTreeMenu (gw jadiin widget menu) :</h2>
Widget ini merupakan extended dari <code>CTreeView</code> Widget<br>

 <?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
 
<?php 	
$this->widget('TagTreeMenu', array(
	//'maxTags'=>Yii::app()->params['TagTreeMenuCount'],	#lempar params
	//'test'=>'test',
)); 
?>

<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox(); ?>

<div class="tpanel left">
	<div class="toggle btn"><?php echo Yii::t('ui','TagTreeMenu Widget'); ?></div>
	<div class='scroll'><?php $this->render_script('protected/components/my-x/TagTreeMenu.php'); ?></div>
</div>





