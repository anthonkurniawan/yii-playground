<?php $this->beginContent('//layouts/main'); ?>

<div class="container"><!--.container default:{width:950px;margin:0 auto;}-->
	
	<div class="span-23"><!--default :.span-19 {width:750px;}-->
		<div id="content"><!--#content{padding: 20px;}-->
			<?php echo $content; ?> 
		</div><!-- content -->
	</div>
	
	<div class="span-4 last"><!--.span-5 {width:190px;}-->
		<div id="sidebar"><!--#sidebar{padding: 20px 20px 20px 0;}-->
		<?php
			$this->beginWidget('zii.widgets.CPortlet', array(
				'title'=>'Operations',
			));
			
			$this->widget('zii.widgets.CMenu', array(
				'items'=>$this->menu,
				'htmlOptions'=>array('class'=>'operations2'),
			));
			$this->endWidget();
		?>
		</div><!-- sidebar -->
	</div>
	
</div>
<?php $this->endContent(); ?>
