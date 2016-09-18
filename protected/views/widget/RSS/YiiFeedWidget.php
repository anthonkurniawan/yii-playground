<?php $this->layout='column2';?>

<?php
$this->pageTitle=Yii::app()->name . ' - Widget'; 
$this->breadcrumbs=array('CFileBrowser',);
?>
<?php
$this->menu=array(
	array('label'=>'YiiFeedWidget', 'url'=>array('Rss/FeedWidget'), 'linkOptions'=>array('target'=>'_blank'), ),
	array('label'=>'efeed 1.0', 'url'=>array('Rss/efeed1_0'), 'linkOptions'=>array('target'=>'_blank'), ),
	array('label'=>'efeed 2.0', 'url'=>array('Rss/efeed2_0'), 'linkOptions'=>array('target'=>'_blank'), ),
	array('label'=>'efeed atom', 'url'=>array('Rss/efeed_atom'), 'linkOptions'=>array('target'=>'_blank'), ),
);
?>

<!-------------------------- CONTENT ---------------------------------->
<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
<?php
$this->widget(
   'ext.rss.yii-feed-widget.YiiFeedWidget',
   //array('url'=>'http://www.mysite.com/feed','limit'=>3)
   array('url'=>'http://www.nasa.gov/rss/','limit'=>3)
);
?>
<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>