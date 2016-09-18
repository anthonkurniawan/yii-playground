<?php $this->layout='_test_render_clip';?> 
<?php $this->pageTitle='CClipWidget'; ?>


<!----------- START CLIP -------->
<?php $this->beginWidget('system.web.widgets.CClipWidget', array('id'=>'sidebar')); ?>

<div class="myBox">
	<b class="txtAtt">Some non-common output</b>
	<?php echo "SOME REUSE CLIP( CAN USE ON EVERWHERE )"; ?> <br>
	<b class="txtAtt">Some more non-common output</b>
</div>

<?php $this->endWidget();?>
<!----------- END CILIP ---------->

<b># RENDER CLIP ON THIS PAGE</b>
<?php 
echo $this->clips['sidebar']; 
?>



<?php $this->render_script(__FILE__);?>