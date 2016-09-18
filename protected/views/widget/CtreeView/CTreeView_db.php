<?php $this->pageTitle=Yii::app()->name . ' - Tree Data DB'; ?>

<?php $this->renderPartial('/widget/CtreeView/_menu');?> 

<h1>CTreeView with DB</h1>

<div class="view2">
<span class="badge">Sample TreeView</span>
<p>
 <?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
<?php 
$this->widget('CTreeView',array(
	'data'=>$data,
	'animated'=>'slow',
	'collapsed'=>true,
	'htmlOptions'=>array('class'=>'treeview-gray')
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
</div>

<div class="view2">
<span class="badge">SampleTreeView Async</span>
<p>
 <?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
<?php 
$this->widget('CTreeView',array(
	'url'=>array('treeFill'),
	'animated'=>'slow',
	'htmlOptions'=>array('class'=>'treeview-red')
)); 
?>
</p>

<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox(); ?>
</p>

<div class="tpanel right"> 
	<div class="toggle btn"><?php echo Yii::t('ui','action TreeFill'); ?></div>
	<div class="scroll"><?php $this->render_script(array('treeMenu/TreeFill')); ?></div>
</div>
</div>


<?php $this->renderPartial('/widget/CtreeView/_CTreeView_doc'); ?>
