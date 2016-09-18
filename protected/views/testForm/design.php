<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>

<div style='height:50px; width:100px; border:1px black solid; 
    background-image:url(<?= bu('images/icons/close.gif'); ?>), url(<?= bu('images/bg/grid/column-header-bg.gif'); ?>);
    background-repeat: no-repeat, repeat-x;background-position: right top; '> 
	<b style="color:white"> content..</b> 
</div>

<?php Yii::app()->sc->collect('html', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>

