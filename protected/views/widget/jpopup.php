<?php //$this->layout='column1'; ?>
<?php
$this->pageTitle=Yii::app()->name . ' - Jpopup';
$this->breadcrumbs=array('jpopup',);
?>

<b class="badge">Jpopup 1.2</b><br>

<a href="http://www.yiiframework.com/extension/jpopup/" target="_blank">Jpopup extendsion</a><br><br>
<div class="view2">
This widget encapsulates the popupWindow JQuery Plugin.
Takes a link (or other HTML element) and will create a popup window
</div>
<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
<?php $this->widget('ext.jpopup_12.JPopupWindow', array(
        'content'=>'open popup',
        'url'=>"http://localhost/",        
        'htmlOptions'=>array('title'=>"yahoo.com"),
        'options'=>array(
            'height'=>500,
            'width'=>800,
            'top'=>50,
            'left'=>50,
        ),
    )); ?><!-- popup -->
<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>
</p>

<p>
Open contact form of a Yii skeleton app
</p>
<p>
<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
    <?php $this->widget('ext.jpopup_12.JPopupWindow', array(
        'tagName'=>'button',
        'content'=>'open contact form',
        'url'=>array('/site/contact'),        
        'options'=>array(
            'height'=>500,
            'width'=>800,
            'centerScreen'=>1,
        ),
    )); ?><!-- popup -->
<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>
</p>



<?php $this->widget('ext.jpopup_12.JPopupWindow'); ?>