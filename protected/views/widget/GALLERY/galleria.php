<?php 
$this->layout='column2';
$this->pageTitle='Galleria';
$this->renderPartial('/WIDGET/GALLERY/_menu');
?>

<div class="myBox">
<p><span class="badge badge-inverse">Galleria</span></p>

<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>

<?php 
$files = $this->findFiles('upload/');
if($files) :
	foreach($files as $filename) : 
?>
	<?php //$this->beginWidget('Galleria');?>
	<?php 
		$this->beginWidget('Galleria', array(
		//'themeName' => 'folio',//classic by default
		//'plugins' => array('history', 'flickr', 'picasa'),//history by default
		'options' => array(//galleria options
			'transition' => 'fade',
			'debug' => true,
		)
	));
	?>
	<?php echo CHtml::image( bu($filename), $filename, array('height'=>30)); ?>
	<?php $this->endWidget();?>
<?php endforeach; ?>
<?php endif; ?>

<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
</div>

<!------------------------------------------------------ CODE ------------------------------------------------------------->
<div class="tpanel right">
	<div class="toggle btn btn-sm btn-primary"><?php echo Yii::t('ui','Widget Code'); ?></div>
	<div><?php Yii::app()->sc->renderSourceBox();  ?></div>
</div>
<div class="clear"></div>

<div class="flash-error">
<ul>
<li>Pada contoh di atas tdk use <code>model</code>, hanya menggunakan <code>scandir('upload/');</code> file image existing. </li>
<li>Untuk use <code>model</code> buat dulu table model nya(ntar aja klo butuh), trus buat input utk upload fille(kaya CMultiUpload) trus save ke model.</li>
<li>lalu add <code>behavior</code></li>
<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?><!--
	public function behaviors()
	{
		return array(
			'galleria' => array(
				'class' => 'ext-coll.UPLOAD_GALLERY.galleria.GalleriaBehavior',
				'image' => 'file_name', //required, will be image name of src
				'imagePrefix' => '_',//optional, not required
				'description' => 'description',//optional, not required
				'title' => 'name',//optional, not required
			),
		);
	}
	-->
<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox();  ?>

<li>dan utntuk widget nya sperti ini : </li>
<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?><!--
 $photos = new CActiveDataProvider('GalleryPhoto');	

$this->widget('Galleria', array(
	'dataProvider' => $photos,
	'imagePrefixSeparator' => '-',//if set 'imagePrefix' => '' in behaviors; separate - imagePrefix{Separator}image
	'srcPrefix' => bu('upload/gallery/'),
	//'srcPrefixThumb' => '/upload/gallery/thumb/',
	#'themeName' => 'folio',//classic by default
	#'plugins' => array('history', 'flickr', 'picasa'),//history by default
	'options' => array(//galleria options
		'transition' => 'fade',
		'debug' => true,
	)
));
-->
<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox();  ?>
</div>
