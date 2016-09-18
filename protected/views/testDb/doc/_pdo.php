<span class="label label-info">Sample using PDO php </span>

<div class="view2">
<pre>
attribute
One of the PDO::ATTR_* constants. The constants that apply to database connections are as follows: 

•PDO::ATTR_AUTOCOMMIT
•PDO::ATTR_CASE
•PDO::ATTR_CLIENT_VERSION
•PDO::ATTR_CONNECTION_STATUS
•PDO::ATTR_DRIVER_NAME
•PDO::ATTR_ERRMODE
•PDO::ATTR_ORACLE_NULLS
•PDO::ATTR_PERSISTENT
•PDO::ATTR_PREFETCH
•PDO::ATTR_SERVER_INFO
•PDO::ATTR_SERVER_VERSION
•PDO::ATTR_TIMEOUT
</pre>

<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>

<?php
echo  PDO::ATTR_SERVER_INFO;
echo YII::app()->db->getAttribute(PDO::ATTR_SERVER_INFO);
?>

Sample :
<?php
$conn = new PDO( 'mysql:host=localhost;dbname=yiiTest', 'root', '');
$attributes = array(
    "AUTOCOMMIT", "ERRMODE", "CASE", "CLIENT_VERSION", "CONNECTION_STATUS", "DRIVER_NAME",
    "ORACLE_NULLS", "PERSISTENT", "PREFETCH", "SERVER_INFO", "SERVER_VERSION","TIMEOUT"
);

foreach ($attributes as $val) {
	try {
		//$value =  $conn->getAttribute(constant("PDO::ATTR_$val"));
		$value = YII::app()->db->getAttribute(constant("PDO::ATTR_$val"));
	} catch(Exception $e) {
		$value =  $e->getMessage();
	}
	
	$data["PDO::ATTR_$val"] = $value;
}

dump($data);
?> 

<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>
</div>