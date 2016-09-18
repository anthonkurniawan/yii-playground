<?php
$this->pageTitle=Yii::app()->name . ' - ' . Yii::t('ui', 'New Data User');
$this->breadcrumbs=array(Yii::t('ui','New User'), );
?>

<h2><?php echo Yii::t('ui', 'Create New Data User'); ?></h2>

<?php echo $this->renderPartial('partial_file/_form', array('model'=>$model, 'model2'=>$model2, 'model3'=>$model3, )); ?>