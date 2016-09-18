
<?php
$this->pageTitle=Yii::app()->name . ' - Widget'; 
$this->breadcrumbs=array('RSS',);
?>

<!-------------------------- CONTENT ---------------------------------->
<a href="http://www.yiiframework.com/extension/efeed/" target="_blank"> Yii-extensions</a>

<div class="view2">
<?php echo CHtml::link('YiiFeedWidget', array('Rss/FeedWidget'), array('target'=>'_blank')); ?>
<?php $this->render_script(array('Rss/FeedWidget')); ?>
</div>

<div class="view2">
<?php echo CHtml::link('efeed 1.0', array('Rss/efeed1_0'), array('target'=>'_blank')); ?>
<?php $this->render_script(array('Rss/efeed1_0')); ?>
</div>

<div class="view2">
<?php echo CHtml::link('efeed 2.0', array('Rss/efeed2_0'), array('target'=>'_blank')); ?>
<?php $this->render_script(array('Rss/efeed2_0')); ?>
</div>

<div class="view2">
<?php echo CHtml::link('efeed atom', array('Rss/efeed_atom'), array('target'=>'_blank')); ?>
<?php $this->render_script(array('Rss/efeed_atom')); ?>
</div>