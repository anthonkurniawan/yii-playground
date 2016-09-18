<?php $this->pageTitle=Yii::app()->name . ' - Excel plugin'; ?>
<?php $this->breadcrumbs=array('Test Excel',);?>


<span class="txtHead">EXCEL</span>
	
<div class="view2">
	<?php echo CHtml::link(Yii::t('ui', 'READ with pure php code'),array('media/read1'),array('target'=>'_blank')); ?> 
	<div class="tpanel right">
		<div class="toggle btn"><?php echo Yii::t('ui','View Controller'); ?></div>
		<?php $this->render_script(array('media/read1')); /* from MediaController*/ ?>
	</div>
</div>

<div class="view2">
	<?php echo CHtml::link('READ2 with *ext.php-excel-reader2.21',array('media/read2'),array('target'=>'_blank')); ?> 
	<div class="tpanel right">
		<div class="toggle btn"><?php echo Yii::t('ui','View Controller'); ?></div>
		<?php $this->render_script(array('media/read2')); /* from MediaController*/ ?>
	</div>
</div>

<div class="view2">
	<?php echo CHtml::link('WRITE with *ext.EExcelView',array('media/write1'),array('target'=>'_blank')); ?> 
	<div class="tpanel right">
		<div class="toggle btn"><?php echo Yii::t('ui','View Controller'); ?></div>
		<?php $this->render_script(array('media/write1')); /* from MediaController*/ ?>
	</div>
</div>

<div class="view2">
	<?php echo CHtml::link('WRITE2 with pure php code',array('media/write2'),array('target'=>'_blank')); ?> 
	<div class="tpanel right">
		<div class="toggle btn"><?php echo Yii::t('ui','View Controller'); ?></div>
		<?php $this->render_script(array('media/write2')); /* from MediaController*/ ?>
	</div>
</div>

<div class="view2">
	<h1>HTML2PDF</h1>
	<?php echo CHtml::link('Convert',array('media/html2pdf')); ?> 
	
</div>

Plugin PDF:
Htmldoc, wkhtmltopdf, TCPDF, DOMPPDF