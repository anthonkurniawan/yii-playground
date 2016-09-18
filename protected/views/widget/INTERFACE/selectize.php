<?php
$this->pageTitle=Yii::app()->name . ' - Selectize';
$this->breadcrumbs=array('widget/selectize',);
?>
   

<!--------------------------------------------------------------------------------------------------------->

<style>
.row{ float:left; min-width:150px; margin-right:10px }
</style>

<h1 class="left">Selectize.js</h1>
<a class="left" href="http://localhost/yii/yii-extensions/yii-selectize/vendors/selectize.js/examples/" target="_blank"> DEMOS</a>
<div class="clear"></div>

<div class="flash-error">
RESOURCE : http://brianreavis.github.io/selectize.js/
<pre>
Selectize is an extensible jQuery-based custom &lt;select&gt; UI control. It's useful for tagging, contact lists, country selectors, and so on. It clocks in at around ~7kb (gzipped). The goal is to provide a solid & usable experience with a clean and powerful API.
- [Demos](http://brianreavis.github.io/selectize.js/)
- [Changelog](https://github.com/brianreavis/selectize.js/releases)
- [Examples](examples/)
- [Usage Documentation](docs/usage.md)
- [API Documentation](docs/api.md)
- [Plugin Documentation](docs/plugins.md)
</pre>
</div>


<div class="row-fluid">

<div class="row">
<p><span class="label label-info">single selection: without active record </span> </p>

<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>

<?php
$this->widget('ext-coll.yii-selectize.YiiSelectize', array(
    'name' => 'test2',
    'value' => 'world', // the selected item
    'data' => array(
        'hello' => 'Hello',
        'world' => 'World',
    ),
));
?>
 
<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>
</div>

<!------------------------------------------------------------------------------------------------------------------------------------------>
<div class="row">
<p><span class="label label-info">With Active record</span> </p>

<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>

<?php
$model = new TblUserMysql;
  
$this->widget('ext-coll.yii-selectize.YiiSelectize', array(
    'model' => $model,
    'attribute' => 'username',
    'data' => array(
        'hello' => 'Hello',
        'world' => 'World',
    ),
    'useWithBootstrap' => false,
//    'cssTheme' => 'bootstrap2', // uncomment to use v2 theme instead of v3
    'fullWidth' => false,
));
?>
 
<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>
</div>
</div><!--- row-fluid-->


<div class="row-fluid">
<div class="row">
<p><span class="label label-info">multiple selection (tagging) </span> </p>

<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>

<?php
$this->widget('ext-coll.yii-selectize.YiiSelectize', array(
    'name' => 'test4',
    'value' => 'world',
    'data' => array(
        'hello' => 'Hello',
        'world' => 'World',
    ),
    'selectedValues' => array('hello', 'world'),
    'fullWidth' => false,
    'htmlOptions' => array(
        'style' => 'width: 50%',
    ),
    'multiple' => true,
));
?>
 
<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>
</div>


<!------------------------------------------------------------------------------------------------------------------------------------------>
<div class="row">
<p><span class="label label-info">using events callbacks </span> </p>

<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>

<?php
$this->widget('ext-coll.yii-selectize.YiiSelectize', array(
    'model' => $model,
    'attribute' => 'username',
    'data' => array(
        'hello' => 'Hello',
        'world' => 'World',
    ),
    'callbacks' => array(
        'onChange' => 'myOnChangeTest',
        'onOptionAdd' => 'newTagAdded',
    ),
));
?>
 
<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>
</div>
</div><!--- row-fluid-->

<script>
function myOnChangeTest(value) {			alert('bol');
    console.log(value);
}
 
function newTagAdded(value, $item) {
    console.log('new item: ' + value);
    console.log($item);
}
</script>