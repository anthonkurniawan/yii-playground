<style>.php-hl-main {font-size:90% }</style>

<div class="view2">
<b class="badge">Testing :</b>

<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP', 'tabSize'=>1));  ?> 
$connection=new CDbConnection('mysql:host=localhost;dbname=yiitest','root','');
$connection->active=true;

$sqlStatement="select * from tbl_user_mysql where role=1 and active=1";
$command=$connection->createCommand($sqlStatement);

//$command->execute();   // a non-query SQL statement execution
//or execute an SQL query and fetch the result set
$reader=$command->query(); print_r($reader);

//foreach($reader as $row2) { print_r($row2); }  //tamoilan hasil langsung
$rows=$reader->readAll();  print_r($rows); //ambil data
<?php $this->endWidget(); ?>

<?php
//$connection=new CDbConnection('mssql:host=localhost;dbname=NORTHWIND','sa','belang9'); // // Mssql driver on windows hosts  linux-dbliv
$connection=new CDbConnection('mysql:host=localhost;dbname=yiitest','root','');
$connection->active=true;
//print_r($connection);

$sqlStatement="select * from tbl_user_mysql where role=1 and active=1";
$command=$connection->createCommand($sqlStatement);

//$command->execute();   // a non-query SQL statement execution
//or execute an SQL query and fetch the result set
$reader=$command->query(); //dump($reader); echo"<br><br>";

//foreach($reader as $row2) { print_r($row2); }  //tamoilan hasil langsung
$rows=$reader->readAll(); // dump($rows); //ambil data
?>

	<div class="ket">
		<b> Result :</b><br>
		<code>$reader=$command->query(); </code> <?php dump($reader); ?><br><br>
		<div class="scroll2"> <code>$rows=$reader->readAll();</code>  <?php  dump($rows); //ambil data ?> </div>
	</div>
</div>

<div class="view2">
<b class="badge"> Active Records (AR) - Others</b><br />
<ul>
<li>Post::model()->count($condition,$params); // ambil sejumlah baris yang sesuai dengan kondisi yang ditetapkan</li>
<?php echo TblUserMysql::model()->count(); ?>
<li>countByAttributes($attributes,$condition='',$params=array())</li>
<?php //echo TblUserMysql::model()->countByAttributes('id','id=:id',array(':id'=>1)); ?>
<li>countBySql($sql,$params=array())</li>
<?php //echo TblUserMysql::model()->countBySql(); ?>
<li>Post::model()->updateAll($attributes,$condition,$params)</li>
<?php 
//public boolean update(array $attributes=NULL)
//*Post::model()->update();
// mutakhirkan baris yang sama seperti kondisi yang ditetapkan
//*Post::model()->updateAll($attributes,$condition,$params);
// mutakhirkan baris yang sama seperti kondisi dan primary key yang ditetapkan
//*Post::model()->updateByPk($pk,$attributes,$condition,$params);
// mutakhirkan kolom counter dalam baris yang sesuai dengan kondisi yang ditetapkan
//*Post::model()->updateCounters($counters,$condition,$params);
?>

</div>