<?php $this->layout='column1' ; //column2_custom_full'; ?>

<?php $this->pageTitle=Yii::app()->name . ' - Metadata'; ?>
<?php $this->breadcrumbs=array('Show Class with Metadata',); ?>

<?php
//$test = YII::import('application.components.Metadata');
//dump( new $test );
?>

<div class=" left">
<div class="label label-success">Get All Controller</div> 
<br>Sample : <code>Yii::app()->metadata->getControllers();</code>
	<?php $this->widget('myPanelbar', array('selector'=>'id1', 'title'=>'', 'content'=>'', ));  ?>
	
	<div class="myBox" id="id1" style="height:200px; overflow:auto">
	<?php
	$controllers = Yii::app()->metadata->getControllers(); #You can specify module name as parameter
	dump($controllers); #Get list of application controllers
   ?>
	</div>
</div>

<!---------------------------------- Get Controller of Module----------------------------------------->
<div class=" left">
<div class="label label-success">Get Controller of Module</div>
<br>Sample : <code>Yii::app()->metadata->getControllers('gii');</code>
	<?php $this->widget('myPanelbar', array('selector'=>'id9', 'title'=>'', 'content'=>'', ));  ?>
	
	<div class="myBox" id="id9" style="height:200px; overflow:auto">
	<?php
	$controllers = Yii::app()->metadata->getControllers('gii'); #You can specify module name as parameter
	dump($controllers); #Get list of application controllers
   ?>
	</div>
</div>

<!---------------------------------- Get All Method on Class Controller ----------------------------------------->
<div class=" left">
<div class="label label-success">Get All Method on Class Controller</div>
<br>Sample : <code>Yii::app()->metadata->getActions('siteController');</code>
	<?php $this->widget('myPanelbar', array('selector'=>'id2', 'title'=>'', 'content'=>'', ));  ?>
	<div class="myBox" id="id2" style="height:200px; overflow:auto">
	<?php
	$user_actions = Yii::app()->metadata->getActions('siteController');
	dump($user_actions); #Get actions of 'UserController'
   ?>
	</div>
</div>

<!---------------------------------- Get All Controller with Action methodr ----------------------------------------->
<div class=" left">
<div class="label label-success">Get All Controller with Action method</div>
<br>Sample : <code>Yii::app()->metadata->getControllersActions();</code>
	<?php $this->widget('myPanelbar', array('selector'=>'id3', 'title'=>'', 'content'=>'', ));  ?>
	<div class="myBox" id="id3" style="height:200px; overflow:auto">
	<?php
	$controllersWithActions = Yii::app()->metadata->getControllersActions(); #if no $module param, controllers&actions of application will returned
	dump($controllersWithActions); #Get controllers and their actions of module 'user'
   ?>
	</div>
</div>

<!---------------------------------- Get All Modules ----------------------------------------->
<div class=" left">
<div class="label label-success">Get All Module</div>
<br>Sample : <code>Yii::app()->metadata->getModules();</code>
	<?php $this->widget('myPanelbar', array('selector'=>'id4', 'title'=>'', 'content'=>'', ));  ?>
	<div class="myBox" id="id4" style="height:200px; overflow:auto">
	<?php
	$modules = Yii::app()->metadata->getModules();
	dump($modules);
   ?>
	</div>
</div>

<!---------------------------------- Get spesified module with action method ----------------------------------------->
<div class=" left">
<div class="label label-success">Get Module with method</div>
<br>Sample : <code>Yii::app()->metadata->getControllersActions('test_unit')</code>
	<?php $this->widget('myPanelbar', array('selector'=>'id5', 'title'=>'', 'content'=>'', ));  ?>
	<div class="myBox" id="id5" style="height:200px; overflow:auto">
	<?php
	$controllersWithActions = Yii::app()->metadata->getControllersActions('test_unit'); #if no $module param, controllers&actions of application will returned
	dump($controllersWithActions); #Get controllers and their actions of module 'user'
   ?>
	</div>
</div>

<!---------------------------------- Get All Models----------------------------------------->
<div class=" left">
<div class="label label-success">Get Models</div>
<br>Sample : <code>Yii::app()->metadata->getModels();</code>
	<?php $this->widget('myPanelbar', array('selector'=>'id6', 'title'=>'', 'content'=>'', ));  ?>
	<div class="myBox" id="id6" style="height:200px; overflow:auto">
	<?php
	$models = Yii::app()->metadata->getModels(); #You can specify module name as parameter
	dump($models); #Get list of models application 
   ?>
	</div>
</div>  

<!---------------------------------- Get All Models----------------------------------------->
<div class=" left">
<div class="label label-success">Get Models</div>
<br>Sample : <code>Yii::app()->metadata->getAll();</code>
	<?php $this->widget('myPanelbar', array('selector'=>'id7', 'title'=>'', 'content'=>'', ));  ?>
	<div class="myBox" id="id7" style="height:200px; overflow:auto">
	<?php
	$models = Yii::app()->metadata->getAll(); #You can specify module name as parameter
	dump($models); #Get list of models application 
   ?>
	</div>
</div>  

<!------------
HARUS DI RESET REGISTER CLIENTSCRIPT NYA COZ SAAT "getAll" saat acccess bootstrap 
meng-init register All script nya aotomatis 
-->
<?php YII::app()->clientscript->reset(); ?>
<?php // dump( YII::app()->clientscript); ?>