<?php $this->beginContent('test_unit.views.layouts.main'); ?>
<div class="container"><!--.container {width:950px;margin:0 auto;}-->
	<div class="span-17"><!--.span-9 {width:350px;}-->
		<div id="content" ><!--#content{padding: 20px;}-->
			<?php echo $content; ?>
		</div><!-- content -->
	</div>

	<div class="span-5 last">
		<div id="sidebar">
		<?php
			$this->beginWidget('zii.widgets.CPortlet', array(
				'title'=>'Operations',
			));
			$this->widget('zii.widgets.CMenu', array(
				'items'=>$this->menu,
				'htmlOptions'=>array('class'=>'operations'),
			));
			$this->endWidget();
		?>
		</div><!-- sidebar -->
	</div>
</div>
<?php $this->endContent(); ?>