<?php
$this->layout='null';
$this->pageTitle=Yii::app()->name . ' - JSupersized'; 
//$this->renderPartial('/WIDGET/GALLERY/_menu');
?>

<?php
$this->widget('ext-coll.UPLOAD_GALLERY.jSupersized.JSupersized', array(
   'titlePage' => 'My Fullscreen SlideShow',
   'slides' => array(
       array('image' => Yii::app()->request->baseUrl . '/Beautiful village of Hallstatt - Austria.jpg', 'title' => ''),
       array('image' => Yii::app()->request->baseUrl . '/city.jpg', 'title' => ''),
       array('image' => Yii::app()->request->baseUrl . '/sea.jpg', 'title' => '')
   )));
 ?>