
<?php 
$this->layout='column2';
$this->pageTitle=Yii::app()->name . ' - MongoDB'; 
$this->breadcrumbs=array('mongo',);
//$this->renderPartial('WYSIWYG/_menu');
?>

<h1>MongoDB</h1>

<div class="myBox">
<p><span class="badge badge-inverse">Use PHP Driver </span></p>
Note : php driver must be installed  <code>php_mongo*.dll</code> (see php manual for more documentations)<br>

<?php Yii::app()->sc->setStart(__LINE__);  ?>
<?php /*
# CREATE NEW CONNECTION
//$con = new MongoClient(); // connects to localhost:27017
 $con = new MongoClient( "mongodb://192.168.1.2" ); // connect to a remote host (default port: 27017)
//$con = new MongoClient( "mongodb://example.com:65432" ); // connect to a remote host at a given port
//$con = new MongoClient("mongodb://192.168.1.2", array("username" => 'tona', "password" => 'tona'));

$db = $con->db_test;  //select db
$collect = $db->testData;    

# INSERT NEW DATA/DOCUMENT
$document = array( "title" => "XKCD", "online" => true );
$collect->insert($document);

# GET CURSOR COLLECTION
$cursor = $collect->find();   //print_r($cursor);

# ITERATE THROUGH THE RESULT
foreach ($cursor as $document) {
    //echo $document["name"] . "\n";
	echo "<pre>"; print_r( $document); echo "</pre>";
}
*/
?>

<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  ?>
<?php Yii::app()->sc->renderSourceBox(); ?>
</div>

<div class="myBox">
<span class="badge badge-inverse">Use MongoYii Extension </span> 
<a href="http://localhost/yii/yiitest/tool/kelas?kelas=mongoYii" target="_blank" class="right">see kelas object</a>
<div class="clear"></div>
Its wrapper for <code>mongo php driver</code> <br>
<b>Source Code : </b>https://github.com/fromYukki/Yii-MongoDB-Driver <br>
<b>Documentations : </b>http://www.sammaye.com/MongoYii/ <br>

<ol>
<li>Setting :</li>
<?php Yii::app()->sc->setStart(__LINE__);  ?><!---
'mongoYii' => array(
	'class' => 'EMongoClient',
	'server' => 'mongodb://192.168.1.2:27017',
	'db' => 'db_test'
),

'import'=>array(
	..........
	'application.extensions.MongoYii.*',
	'application.extensions.MongoYii.validators.*',
	'application.extensions.MongoYii.behaviors.*',
	'application.extensions.MongoYii.util.*'
-->
<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  ?>
<?php Yii::app()->sc->renderSourceBox(); ?>
<li>Call client component</li>
	<code>Yii::app()->mongodb->getSomething(); </code> <br>
	If you wish to call a function on the MongoClient or Mongo class you will need to retrieve the connection object like so: <br>
	<code>Yii::app()->mongodb->getConnection()->getSomething();</code>
<li>Using MongoDB without Active Record</li>
	You can call the database directly at any time using the same implemented methods as you would using the driver normally. As an example, to query the database:
	<code> Yii::app()->mongodb->collection->find(array('name' => 'sammaye')); </code>
</ol>


<?php Yii::app()->sc->setStart(__LINE__);  ?>
<?php
/*
$con = Yii::app()->mongoYii;
$cursor = $con->testData->find();
//$con->testData->find(array('name'=>'tona'));   dump($con);

foreach ($cursor as $document) {
    //echo $document["title"] . "\n";
	echo "<pre>"; print_r( $document); echo "</pre>";
}
*/
?>
<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  ?>
<?php Yii::app()->sc->renderSourceBox(); ?>
</div>
http://localhost/yii/MongoYii-demo
<div class="myBox">
<span class="badge badge-inverse">Use Yii-MongoDB-Driver </span> 
<a href="http://localhost/yii/yiitest/tool/kelas?kelas=mongoDb" target="_blank" class="right">see kelas object</a>
<div class="clear"></div>
Its wrapper for <code>mongo php driver</code> <br>
<b>Source Code : </b>https://github.com/fromYukki/Yii-MongoDB-Driver <br>
<b>Documentations : </b>https://github.com/fromYukki/Yii-MongoDB-Driver/wiki/Basic-usage-ActiveRecord<br>

<ol>
<li>Setting :</li>
<?php Yii::app()->sc->setStart(__LINE__);  ?><!---
'mongoDb' => array(
	'class' => 'ext-coll.NOSQL.Yii-MongoDB-Driver-master.src.YMongoClient',	
	'server' => 'mongodb://192.168.1.2:27017',
	'dbName' => 'db_test',
),
-->
<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  ?>
<?php Yii::app()->sc->renderSourceBox(); ?>
<?php
// $con = Yii::app()->mongoDb;
// $cursor = $con->testData->find();
// //$con->testData->find(array('name'=>'tona'));   dump($con);

// foreach ($cursor as $document) {
    // //echo $document["title"] . "\n";
	// echo "<pre>"; print_r( $document); echo "</pre>";
// }
?>
</div>