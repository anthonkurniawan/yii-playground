<?php 
$this->layout='column2';
$this->pageTitle=Yii::app()->name . ' - Magnific-Popup'; 
$this->breadcrumbs=array('widget/Magnific-Popup',);
$this->renderPartial('/WIDGET/GALLERY/_menu');
?>

<a href="http://dimsemenov.com/plugins/magnific-popup/" target="_blank" class="right">DEMO</a> <br>

<div class="myBox">
<p><span class="badge badge-inverse">Magnific-Popup</span> </p>

<ol>
<li>
<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>

<a class="test-popup-link" href="http://localhost/yii/yiiTest/Beautiful village of Hallstatt - Austria.jpg">Open Picture popup</a> 
<?php $this->widget("ext-coll.UPLOAD_GALLERY.magnific-popup.EMagnificPopup", array('target' => '.test-popup-link')); ?>

<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>
</li>

<li>
YouTube sample:
<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>

<a href="www.youtube.com/watch?v=qObzgUfCl28" id="video">YouTube</a>
<?php
$this->widget("ext-coll.UPLOAD_GALLERY.magnific-popup.EMagnificPopup", array(
'target' => '#video',
'type' => 'iframe',
));
?>

<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>
</li>

<li>
Gallery - One link:
<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>

<a class="test-galery-link" href="http://localhost/yii/yiiTest/Beautiful village of Hallstatt - Austria.jpg">
	<img src="http://localhost/yii/yiiTest/Beautiful village of Hallstatt - Austria.jpg" width="75" height="75" />
</a>
<?php
$this->widget("ext-coll.UPLOAD_GALLERY.magnific-popup.EMagnificPopup", array(
    'target' => '.test-galery-link',
    'options' => array(
        'gallery' => array(
            'enabled' => true,
        ),
        'items' => array(
            array('src' => 'http://localhost/yii/yiiTest/Beautiful village of Hallstatt - Austria.jpg'),
			array('src' => 'http://localhost/yii/yiiTest/city.jpg'),
			array('src' => 'http://localhost/yii/yiiTest/sea.jpg'),
        ),
    ),
));
?>

<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>
</li>

<li>
Galley - Multiple links:
<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>

<?php
$this->beginWidget("ext-coll.UPLOAD_GALLERY.magnific-popup.EGalleryMagnificPopup", array(
    'galleryOptions' => array(
        'preload' => array(0, 3)
    ),
));
?>

<a class="test-galery-link" href="http://localhost/yii/yiiTest/Beautiful village of Hallstatt - Austria.jpg" title="Beautiful village of Hallstatt - Austria">
	<img src="http://localhost/yii/yiiTest/Beautiful village of Hallstatt - Austria.jpg" width="75" height="75" />
</a>
<a class="test-galery-link" href="http://localhost/yii/yiiTest/city.jpg" title="town">
	<img src="http://localhost/yii/yiiTest/city.jpg" width="75" height="75" />
</a>
<a class="test-galery-link" href="http://localhost/yii/yiiTest/sea.jpg" title="sea">
	<img src="http://localhost/yii/yiiTest/sea.jpg" width="75" height="75" />
</a>
<?php $this->endWidget(); ?>

<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>
</li>

</ol>

</div>