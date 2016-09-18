<?php 
$this->layout='column2';
$this->pageTitle=Yii::app()->name . ' - YiiPod'; 
$this->breadcrumbs=array('widget/YiiPod',);
?>

<div class="myBox">
<p><span class="badge badge-inverse">Yiippod</span> </p>

Support: FLV, MP4, MOV, 3GP, WEBM, MP3, AAC, OGG, H.263, H.264, RTMP stream, HTTP stream

<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>

<?php
$this->widget('ext-coll.Yiippod.Yiippod', array(
	// 'video'=>"http://www.youtube.com/watch?v=qD2olIdUGd8",  # sample from yputube
	'video'=>Yii::app()->request->baseUrl."/stress.mp3", 
	'id' => 'yiippodplayer',
	'width'=>640,
	'height'=>480,
	'bgcolor'=>'#000'
));
?>

<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox(); ?>
</div>