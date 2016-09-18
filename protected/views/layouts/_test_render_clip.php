<?php $this->beginContent('//layouts/main'); ?>

<div class="container"><!--.container default:{width:950px;margin:0 auto;}-->
	
	<div class="span-19"><!--default :.span-19 {width:750px;}-->
		<div id="content"><!--#content{padding: 20px;}-->
			<?php echo $content; ?> 
		</div><!-- content -->
	</div>
	
	<div class="span-5 last">
		<div id="sidebar">
			
			<?php echo $this->clips['sidebar']; ?> <b># RENDER CLIP <?php echo __FILE__?> </b> <!-- use CClipWidget -->
			
		</div><!-- sidebar -->
	</div>
	
</div>

<?php $this->endContent(); ?>

