<?php
//dump( Yii::app()->behaviors);
//dump( Yii::app()->preload);
//dump( Yii::app()->parentModule);
//dump( Yii::app()->components);
//dump( Yii::app()->modules);
?>

<?php
$con = new MongoClient( "mongodb://192.168.1.2" ); 
//$db = $con->db_test;  //select db
//$db = $con->selectDB("db_test");
//$collect = $db->testData;     
$collect = $con->db_test->testData;
print_r($collect);
?>