<h1>FontSizer</h1>

<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>

<?php $this->widget('application.extensions.fontsizer.Sizer'); ?>

  <?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
  
  <?php Yii::app()->sc->renderSourceBox(); ?>