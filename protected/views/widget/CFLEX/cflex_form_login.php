<?php $this->layout='column1';?> 
<?php $this->pageTitle='CFlex'; ?>

<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>

<?php 
$this->widget('CFlexWidget',array(
	// 'baseUrl'=>Yii::app()->baseUrl.'/flex/bin',
	'baseUrl'=>'http://localhost/yii/demos/phonebook/flex/bin',
	'name'=>'phonebook',
	'width'=>'800',
	'height'=>'300',
	'align'=>'left',
	'flashVars'=>array(
		'wsdl'=>$this->createUrl('phonebook'),
	))); 
?>

<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>

<div class="clear"></div>

<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>

<!----------------------------------------- RENDERED SCRIPT  -------------------------------------------------------->
<div class="tpanel">
	<div class="toggle btn"><?php echo Yii::t('ui','View Remdered Script'); ?></div>
	<div>
	<?php $this->beginWidget('CTextHighlighter',array('language'=>'HTML')); ?>

	<?php $this->endWidget(); ?>
</div>
</div>