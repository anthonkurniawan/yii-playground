
<?php
$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Create',
);
/**----------------------------- MENU --------------------------------------**/
$this->menu=array(
	array('label'=>'List user', 'url'=>array('index')),
	array('label'=>'Manage user', 'url'=>array('admin')),
);

?>

<div class="tpanel left">
	<div class="toggle btn"><?php echo Yii::t('ui','View Controller'); ?></div>
	<?php $this->render_script(); /* from AdminController*/ ?>
</div>

<div class="clear"></div>

<?php
	//$file ='protected/controllers/Web_servicesController.php';
	
	Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE
	?>
	
<br>

<!------------ CONTENT---------->
<h1>Create user(?r=userMysql/create)</h1>
<?php echo $this->renderPartial('/userMysql/_form', array('model'=>$model)); ?>
