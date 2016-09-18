<?php //$this->beginContent(); ?>
<?php $this->beginContent('//layouts/Xportlet/mainXportlet'); ?>

<?php if(Yii::app()->layout=='print'): ?>

	<?php echo $content; ?>
	
<?php else: ?>

	<div class="container_16">
		<div class="grid_3 alpha"> <b class="txtRed">test : $this->leftPortlets </b>
			<?php 
			foreach($this->leftPortlets as $class=>$properties) {		//dump( $class) ; dump($properties); echo "<hr>"; 
				$this->widget($class,$properties); 
			}
			?>
		</div>
		<div class="grid_13 omega">
			<?php $this->widget('zii.widgets.CBreadcrumbs', array('links'=>$this->breadcrumbs)); ?>
			<?php echo $content; ?>
		</div>
	</div>
	<div class="clear"></div>

<?php endif; ?>

<?php $this->endContent(); ?>