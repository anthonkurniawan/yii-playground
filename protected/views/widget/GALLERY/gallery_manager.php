<?php 
$this->layout='column2';
$this->pageTitle=Yii::app()->name . ' - Gallery Manager'; 
$this->breadcrumbs=array('widget/yiiImage',);
$this->renderPartial('/WIDGET/GALLERY/_menu');
?>

<style>
.container{width:1100px}
.span-23{width:850px}
</style>

<span class="badge badge-inverse">Gallery Manager</span> 

<div class="form-width">

<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>

	<?php Yii::app()->clientScript->registerCssFile('http://localhost/yii/yii-extensions/yiibooster-211/assets/bootstrap/css/bootstrap.min.css'); ?>
	<?php Yii::app()->clientScript->registerScriptFile('http://localhost/yii/yii-extensions/yiibooster-211/assets/bootstrap/js/bootstrap.min.js'); ?>

	<div class="row">
	<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'TblUserMysql',
	'enableAjaxValidation'=>true,   //jika "true" maka akan submit via ajax tanpa validasi
	'enableClientValidation'=>true,
	'focus'=>'input:text[value=""]:first',
	)); ?>
	</div>
	
	 <div class="row bootstrap">
	<?php echo CHtml::activeHiddenField($model, 'gallery_id')?>
	<?php
	if ($model->galleryBehavior->getGallery() === null) {
		echo '<p>Before add photos, you need to save at least once</p>';
		echo CHtml::submitButton('Create Gallery' ); 
	} else {
		$this->widget('GalleryManager', array(
			'gallery' => $model->galleryBehavior->getGallery(),
			// 'controllerRoute'=>'imageApi'
			'controllerRoute'=>'myGallery' # MyGalleryController extend GalleryController
		));
	}
	?>
	</div>
											
<?php $this->endWidget(); ?>
 
 <?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__)); ?>


<!-------------------------------------------------- CODES ------------------------------------------->
<div class="tpanel  right">
	<div class="toggle btn btn-sm btn-primary"><?php echo Yii::t('ui','View Code'); ?></div>
	<?php Yii::app()->sc->renderSourceBox();  ?>
</div>
<div class="tpanel  right">
	<div class="toggle btn btn-sm btn-primary"><?php echo Yii::t('ui','View Gallery Behavior Object'); ?></div>
	<div class="scroll"><?php dump($model->galleryBehavior); ?></div>
</div>
<div class="clear"></div>
</div>


<!-------------------------------------------------- PREVIEW ------------------------------------------->
<div class="myBox">
<p><span class="badge badge-inverse">Preview Gallery Manager</span> </p>

<?php $photos = $model->galleryBehavior->getGalleryPhotos(); ?>
<?php if (count($photos)): ?>
	<div>
		<?php foreach ($photos as $photo): ?>		<?php //dump($photo); ?>
			<?php echo CHtml::link(CHtml::image($photo->getUrl('small')), $photo->getUrl('medium'), array('target' => '_blank')); ?>
			<?php //echo $photo->getPreview(); ?>
		<?php endforeach; ?>
	</div>
<?php endif; ?>
</div>


<?php		
 // $models = TblUserMysql::model()->findAll();
        // foreach($models as $model) $model->galleryBehavior->changeConfig();
?>

<div class="flash-error">
<ul>
	<li><b>Depedencies :</b> <code>bootstrap.min.css</code> <code>bootstrap.min.js</code> ge pake dari <b>yiibooster-211 ext</b></li>
	<li><b>Install : </b></li>
		<ol>
		<li>in <code>config/main.php</code> add import :</li>
			<code>'ext-coll.GALLERY.yii-gallery-manager.*',</code><br>
			<code>'ext-coll.GALLERY.yii-gallery-manager.models.*',</code>
		<li>import sql / migration file yg terdapat pada ext.</li>
		<li><b>Update Model :</b></li>
			- add new field <code>gallery_id</code> utk nanti nya akan lookup ke table <b>gallery</b>(pada contoh gw pake TblUserMysql)<br>
			- add <code>behavior</code> pada model yg akan di <b>attach</b><br>
		<li>Add Widget : <code>$this->widget('GalleryManager', array(</code> ( see on code)</li>
		</ol>

	<li><b>How its works : </b></li>
		<ol>
		<li>widget ini pertama2 akan cek apakah pada model yg di attach sudah ada data pada gallery_id apa belum</li>
		<li>pada  table user existing</li> 
		jika belum ada <code>gallery_id</code> maka buat <b>update dulu</b>, nanti saat save akan ter-update otomatis "galley_id" nya, dan create new data row pada <b>table gallery</b>
		<li>pada  saat create new user, otomatis akan masukan <code>gallery_id</code> dan sama sperti yg di atas</li> 
		</ol>
</ul>
</div>