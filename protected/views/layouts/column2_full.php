<?php $this->beginContent('//layouts/main'); ?>
<style>
.container {width:100%; margin:0 auto;}
</style>

<div class="container"><!--.container default:{width:950px;margin:0 auto;} style="width:100%; margin:0 auto;"-->
	<div style="width:1050px;  float:left;margin:0" ><!--default :.span-19 {width:750px; float:left;margin-right:10px;} -->
		<div id="content"><!--#content{padding: 20px;}-->
			<?php echo $content; ?> 
		</div><!-- content -->
	</div>
	<div style="width:auto; float:left;margin-right:10px; margin:0px; padding:0px"><!--default: .span-5 {width:190px;} style="width:190px"-->
		<div id="sidebar"><!--#sidebar{padding: 20px 20px 20px 0;}-->
		<?php
			$this->beginWidget('zii.widgets.CPortlet', array(
				'title'=>'Operations1',
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
