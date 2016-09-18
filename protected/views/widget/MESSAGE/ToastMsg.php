
<?php
$this->pageTitle=Yii::app()->name . ' - ToastMsg'; 
$this->breadcrumbs=array('toastMessage',);
?>


<a href="https://github.com/akquinet/jquery-toastmessage-plugin/wiki">Documentation</a><br />

<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
<!-------------------------- CONTENT ---------------------------------->
//we have four types of message type : Success, Info, Warning and Error<br />
<?php
$message = "this is yii at work";
 //$this->widget('ext.toastMessage.toastMessageWidget',array('message'=>$message,'type'=>'Success'));
 ?>
 
 <?php $this->widget('ext.toastMessage.toastMessageWidget',array('message'=>$message,'type'=>'Warning')); ?>
 <?php $this->widget('ext.toastMessage.toastMessageWidget',array('message'=>$message,'type'=>'Error')); ?>
 <?php //$this->widget('ext.toastMessage.toastMessageWidget',array('message'=>$message,'type'=>'Info')); ?>
 
 <?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>