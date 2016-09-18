<?php $this->layout='column1'; ?>
<?php
$this->pageTitle=Yii::app()->name . ' - XEditableWidget';
$this->breadcrumbs=array('widget/XEditableWidget',);			
?>


<div class="myBox">
	<b class="badge badge-inverse"> XEditableWidget</b><br>
	
	<div class="left">
	<?php Yii::app()->sc->setStart(__LINE__);  ?>

	<?php
	$model = TblUserMysql::model()->findByPk(1);	//dump($model->username);  //die();
	?>
	
	<b>Username :</b>
	<?php
	$this->widget('ext-coll.INTERFACE.jeditable.XEditableWidget', array(
		'model'=> $model, 
		'id'=>'test1',
		'attribute'=>'username',
		'htmlOptions'=>array(),
		'jeditable_type' => 'text', # Default input types are text, textarea or select.
	));
	?>
	* Click text to edit
	
	<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  ?>
	</div>
	
	<div class="right">
	<?php Yii::app()->sc->renderSourceBox(); ?>
	</div>
	<div class="clear"></div>
</div>

<div class="flash-error">
<pre>
This widget encapsulates the [Jeditable](http://www.appelsiini.net/projects/jeditable)
 * library in a CInputWidget, so the widget can be used in CForm definitions and views.
 *
 * The saveurl parameter expected by Jeditable (the first parameter to the editable call)
 * defaults to $_SERVER['REQUEST_URI'] if not provided in the config of the widget.
 *
 * Three Jeditable parameters have changed names to avoid collision with CInputWidget attributes:
 * id renamed to jeditable_id
 * name renamed to jeditable_name
 * type renamed to jeditable_type
 *
 * The jeditable_id parameter which contains the id defaults to 'attribute' so as not to collide
 * with the $_GET parameter, which usually decides which record you're editing.
 
  * Further documentation and examples of usage can be found at the [Jeditable home page]
 * (http://www.appelsiini.net/projects/jeditable). Remember to use jeditable_id, jeditable_name
 * and jeditable_type wherever it uses id, name or type in the examples.
 </pre>
 </div>