<?php 
$this->layout='column2';
$this->pageTitle=Yii::app()->name . ' - Elfinder'; 
$this->breadcrumbs=array('widget/yiiImage',);
$this->renderPartial('/WIDGET/FILE/menu');
?>
<style> .span-23{width:1000px}</style>


<!----------------------------------------------------------------- CMultiFileUpload with MODEL ---------------------------------------------------------------->
<div class="myBox">
<span class="badge badge-inverse">Elfinder</span>
ServerFileInput - use this widget to choose file on server using ElFinder pop-up

<?php Yii::app()->sc->setStart(__LINE__);  ?>

<?php //echo CHtml::form($this->createUrl('widget/loadImage'), 'post', array('enctype'=>'multipart/form-data')); ?>
<?php echo CHtml::form(); ?>

	<?php
	$model = new GalleryPhoto;	//dump($model); die();
	$this->widget('ext-coll.UPLOAD_GALLERY.yii-elfinder.ServerFileInput', array(
		'model' => $model,
		'attribute' => 'file_name',
		'connectorRoute' => 'image/elFinderConnector',
	));
	?>
	<?php echo CHtml::submitButton('submit'); ?>
	
<?php echo CHtml::endForm(); ?>

<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  ?>

<!------------------------------------------------- POST VARS ------------------------------------------->
<div class="cmd_line">
	<b>POST variable : </b> <br>
	<?php if($_POST) dump($_POST); ?>
</div>

<div class="tpanel  right">
	<div class="toggle btn btn-sm btn-primary"><?php echo Yii::t('ui','Widget Code'); ?></div>
	<?php Yii::app()->sc->renderSourceBox();  ?>
</div>
<div class="clear"></div>
</div>


<div class="myBox">
<p><span class="badge badge-inverse">ElFinderWidget use this widget to manage files</span></p>
<?php Yii::app()->sc->setStart(__LINE__);  ?>

<?php
$this->widget('ext-coll.UPLOAD_GALLERY.yii-elfinder..ElFinderWidget', array(
	'connectorRoute' => 'image/elFinderConnector',
));
?>

<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  ?>

<div class="tpanel  right">
	<div class="toggle btn btn-sm btn-primary"><?php echo Yii::t('ui','Widget Code'); ?></div>
	<?php Yii::app()->sc->renderSourceBox();  ?>
</div>
<div class="clear"></div>
</div>


<div class="flash-error">
Create controller for connector action, and configure it params ( gw taro di <code>ImageController/elFinderConnector</code>)

<?php Yii::app()->sc->setStart(__LINE__);  ?> <!--
'elFinderConnector' => array(
	'class' => 'ext-coll.UPLOAD_GALLERY.yii-elfinder.ElFinderConnectorAction',
	# SEE ON "yii-elfinder.php.connector.php"
	'settings' => array(
		'root' => Yii::getPathOfAlias('webroot') . '/upload/',
		'URL' => Yii::app()->baseUrl . '/upload/',
		'rootAlias' => 'Home',
		'mimeDetect' => 'none',
		'tmbDir' =>'_elfinder_thumb',
		
		'uploadAllow'   => array('images/*'),
		'uploadDeny'    => array('all'),
		'uploadOrder'   => 'deny,allow'
		'disabled'     => array(),      // list of not allowed commands
		'dotFiles'     => false,        // display dot files
		'dirSize'      => true,         // count total directories sizes
		'fileMode'     => 0666,         // new files mode
		'dirMode'      => 0777,         // new folders mode
		'mimeDetect'   => 'internal',       // files mimetypes detection method (finfo, mime_content_type, linux (file -ib), bsd (file -Ib), internal (by extensions))
		'uploadAllow'  => array(),      // mimetypes which allowed to upload
		'uploadDeny'   => array(),      // mimetypes which not allowed to upload
		'uploadOrder'  => 'deny,allow', // order to proccess uploadAllow and uploadAllow options
		'imgLib'       => 'mogrify',       // image manipulation library (imagick, mogrify, gd)
		'tmbDir'       => '.tmb',       // directory name for image thumbnails. Set to "" to avoid thumbnails generation
		'tmbCleanProb' => 1,            // how frequiently clean thumbnails dir (0 - never, 100 - every init request)
		'tmbAtOnce'    => 5,            // number of thumbnails to generate per request
		'tmbSize'      => 48,           // images thumbnails size (px)
		'fileURL'      => true,         // display file URL in "get info"
		'dateFormat'   => 'j M Y H:i',  // file modification date format
		'logger'       => null,         // object logger
		'defaults'     => array(        // default permisions
			'read'   => true,
			'write'  => true,
			'rm'     => true
		),
		'perms'        => array(),      // individual folders/files permisions    
		'debug'        => true,         // send debug to client
		'archiveMimes' => array(),      // allowed archive's mimetypes to create. Leave empty for all available types.
		'archivers'    => array()       // info about archivers to use. See example below. Leave empty for auto detect
		'archivers' => array(
			'create' => array(
				'application/x-gzip' => array(
					'cmd' => 'tar',
					'argc' => '-czf',
					'ext'  => 'tar.gz'
				)
			),
			'extract' => array(
				'application/x-gzip' => array(
					'cmd'  => 'tar',
					'argc' => '-xzf',
					'ext'  => 'tar.gz'
				),
				'application/x-bzip2' => array(
					'cmd'  => 'tar',
					'argc' => '-xjf',
					'ext'  => 'tar.bz'
				)
			)
		)
	)
),
-->
<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  ?>
<?php Yii::app()->sc->renderSourceBox(); ?>
			
</div>

