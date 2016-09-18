<!--------------------->
layout: rightbar.php
<!--------------------->
<?php //$this->beginContent(); ?>
<?php $this->beginContent('//layouts/Xportlet/mainXportlet'); ?>

<?php if(Yii::app()->layout=='print'): ?>

	<?php echo $content; ?>

<?php else: ?>

	<div class="container_16">
		<div class="grid_13 alpha">
			<?php $this->widget('zii.widgets.CBreadcrumbs', array('links'=>$this->breadcrumbs)); ?>
			<?php echo $content; ?>
		</div>
		<div class="grid_3 omega"> test :$this->rightPortlets
			<?php foreach($this->rightPortlets as $class=>$properties) $this->widget($class,$properties); ?>
		</div>
	</div>

	<div class="clear"></div>

	<?php endif; ?>

<!--------------------->
<b class="txtRed">layout: rightbar.php</b>
<!--------------------->

<?php $this->endContent(); ?>