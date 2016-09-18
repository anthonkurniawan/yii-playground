<?php 
$this->layout='column2';
$this->pageTitle=Yii::app()->name . ' - TinyMce'; 
$this->breadcrumbs=array('groupgridview',);
$this->renderPartial('WYSIWYG/_menu');
?>

<h1 class="left">TinyMCE</h1>
<?php echo CHtml::link('see implementation on blog', 'http://127.0.0.1/blog.com/', array('class'=>'right')); ?>
<div class="clear"></div>


<div class="myBox">
<p><b class="badge badge-inverse">TinyMce</b></p>

<?php Yii::app()->sc->setStart(__LINE__);  ?>

<?php
	$model = new TblUserMysql;
	
	$this->widget('ext-coll.WYSIWYG_EDITOR.yii-tinymce.TinyMce', array(
		'id'=>'test1',
		'model' => $model,
		'attribute' => "username",
	));
?>

<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  ?>

<div class="tpanel  right">
	<div class="toggle btn btn-sm btn-primary"><?php echo Yii::t('ui','Widget Code'); ?></div>
	<?php Yii::app()->sc->renderSourceBox();  ?>
</div>
<div class="clear"></div>
</div>

<!--------------------------------------------------------------------------------------------------------------------------------->
<div class="myBox">
<p><b class="badge badge-inverse">TinyMce + insert media (advandce)</b></p>

<?php Yii::app()->sc->setStart(__LINE__);  ?>

<?php
	$this->widget('TinyMce', array(
		'model' => $model,
		'id'=>'test2',
		'attribute' => "username",
		'compressorRoute' => 'image/tinyMceCompressor',
		//'spellcheckerUrl' => 'http://speller.yandex.net/services/tinyspell',
		'spellcheckerUrl' => 'image/tinyMceSpellchecker',
		'fileManager' => array(
			'class' => 'ext-coll.UPLOAD_GALLERY.yii-elfinder.TinyMceElFinder',
			'connectorRoute' => 'image/elFinderConnector',	# ImageController
		),
		'htmlOptions'=>array('style'=>'height:200px'),
	));
?>

<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  ?>

<div class="tpanel  right">
	<div class="toggle btn btn-sm btn-primary"><?php echo Yii::t('ui','Widget Code'); ?></div>
	<?php Yii::app()->sc->renderSourceBox();  ?>
</div>
<div class="tpanel  right">
	<div class="toggle btn btn-sm btn-primary"><?php echo Yii::t('ui','Controller Code'); ?></div>
	<div style="width:600px">
	<?php
	Yii::app()->sc->collect('php', Yii::app()->sc->getFunctionFromFile(
			'public function action',
			'protected/controllers/ImageController.php'
		), false, true);
		
	Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE
	?>
	</div>
</div>
<div class="clear"></div>
</div>


Recently I have written my own widget for TinyMce and for elFinder with possibility of integrating them. Also I have written separate actions for TinyMce compessor and for spellchecker plugin. So i think that my code looks more cleaner than something like tinymceelfinder extension, that has similar functionality.



<div class="tpanel flash-error" style="overflow:auto">

	set your <code>config/main.php</code>   'ext-coll.WYSIWYG_EDITOR.yii-tinymce.*',
	
	<div class="tpanel ">
		<div class="toggle btn btn-sm btn-primary">View ReadMe</div>
		<pre>
		<?php
		$readme = Yii::getPathOfAlias('ext-coll.WYSIWYG_EDITOR.yii-tinymce');  
		$this->renderFile($readme.'/readme.md'); 	
		?>
		</pre>
	</div>
</div>