<style>
.container{width:1100px;}
#content { font-size: 80%; }
.php-hl-main {font-size:90%}
pre{ margin: 0px; padding: 0px }
</style>

<?php 
$this->pageTitle='Query Builder';
$this->breadcrumbs=array('Test DB'=>array('queryBuilder'), );
?>

<a href="http://www.yiiframework.com/doc/guide/1.1/id/database.query-builder" target="_blank" class="txtHead" style="float:right">Query Builder YII docs</a><br />
<div class="view2">
<ul>
<li><b class="badge">Penggunaan Query Builder
	<a href="http://www.yiiframework.com/doc/guide/1.1/id/database.query-builder" target="_blank">Query Builder</a></b></li> 
  
<b class="txtHead2">
	Yii Query Builder menyediakan cara berorientasi objek dalam menulis statement SQL. Fitur ini membantu pengembang untuk menggunakan property dan method kelas untuk 
	menentukan bagian-bagian  dari statement SQLyang kemudian menggabungkannya menjasi sebuah statement SQL yang valid yang bisa dieksekusi lebih lanjut oleh method DAO 
	seperti yang dideskripsikan di Data Access Objects.<br><br>
	Query Builder sangat cocok digunakan ketika Anda memerlukan menggabungkan sebuah statement SQL secara prosedural,atau berdasarkan suatu kondisi logis dalam aplikasi Anda. <br><br> </b>
	
<b class="textHead">Berikut akan ditampilkan penggunaan umum dari Query Builder untuk membangun sebuah statement SQL SELECT: </b>
<?php $this->beginWidget('CTextHighlighter',array('language'=>'php'));  ?> 
//cth query builder
 $user = Yii::app()->db->createCommand()
	->select('username, email') //menentukan bagian SELECT pada query default '*'
	->from('tbl_user_mysql t')	//menentukan bagian FROM pada query
	->join('tbl_data t2', 't.id=t2.id')  //menambah pecahan query inner join($table, $conditions, $params=array())
	->where('active=:active', array(':active'=>1))  //more1 conditon ('id=:id1 or id=:id2', array(':id1'=>1, ':id2'=>2))
    
	->selectDistinct()	//menentukan bagian SELECT pada query serta mengaktifkan flag DISTINCT
	->leftJoin()		//menambah pecahan left query left outer join
	->rightJoin()		//menambah pecahan query right outer join
	->crossJoin()		//menambah pecahan query cross join
	->naturalJoin()		//menambah pecahan query natural join
	->order('t.id')	//menentukan bagian ORDER BY pada query
	->group('t.id');		//menentukan bagian GROUP BY pada query
	->having()		//menentukan bagian HAVING pada query
	->limit(1);		//menentukan bagian LIMIT pada query
	->offset()		//menentukan bagian OFFSET pada query
	->union();		//menentukan bagian UNION pada query
		
	->queryRow(); //ambil hanya 1 baris data
	->query();	//jalankan query
	->execute(); //exec query
	->text; //ambil SQL Statement
<?php $this->endWidget(); ?>

	<div class="tpanel"> <!--- load model ------->
		<b class="toggle txtHead" style="float:right"><?php echo Yii::t('ui','More Query Builder'); ?></b>
		<div>><?php echo $this->renderPartial('doc/_queryBuilder'); ?></div>
	</div>

</ul>
</div>

<div class="view2">
<ul>
<li><span class="badge">Membangun Beberapa Query</span>
<b class="txtHead2">Sebuah instance CDbCommand dapat dipakai ulang beberapa kali untuk membuat beberapa query. Namun, sebelum membuat query baru, harus memanggil method CDbCommand::reset() terlebih dahulu untuk menghapus query sebelumnya. Misalnya:</b>
<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP'));  ?> 
$command = Yii::app()->db->createCommand();
$users = $command->select('*')->from('tbl_users')->queryAll();
$command->reset();  // clean up the previous query
$posts = $command->select('*')->from('tbl_posts')->queryAll();
<?php $this->endWidget(); ?> </li>
</ul>
</div>

<div class="view2">
<ul>
<li><span class="badge">Membuat Query Manipulasi Data (INSERT, UPDATE, DELETE) </span></li>
<ul><li class="txtKet">insert($table, $columns)</li>
<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP'));  ?> 
// INSERT INTO `tbl_user` (`name`, `email`) VALUES (:name, :email)
$command->insert('tbl_user', array(
    'name'=>'Tester',
    'email'=>'tester@example.com',
));
<?php $this->endWidget(); ?>

<li class="txtKet">update($table, $columns, $conditions='', $params=array())</li>
<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP'));  ?> 
// UPDATE `tbl_user` SET `name`=:name WHERE id=:id
$command->update('tbl_user', array(
    'name'=>'Tester',
), 'id=:id', array(':id'=>1));
<?php $this->endWidget(); ?>

<li class="txtKet">delete($table, $conditions='', $params=array())</li>
<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP'));  ?>
// DELETE FROM `tbl_user` WHERE id=:id
$command->delete('tbl_user', 'id=:id', array(':id'=>1));
<?php $this->endWidget(); ?>
</ul>

</ul>
</div>

<div class="view2">
<ul>
<li><span class="badge">3. Mengambil SQL Statement </span><br />
Selain menjalankan query yang dibuat oleh Query Builder, kita juga dapat menarik statement SQL bersangkutan. Untuk melakukannya gunakan fungsi CDbCommand::getText().</li>
<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP'));  ?> 
$sql = Yii::app()->db->createCommand()
    ->select('*')
    ->from('tbl_user')
    ->text;
    echo $sql; result : SELECT * FROM `tbl_user` 
    
<?php $this->endWidget(); ?>

Jika terdapat parameter tertentu yang terikat pada query, mereka dapat diambil melalui properti CDbCommand::params.
	<div class="tpanel"> <!--- load model ------->
		<b class="toggle txtHead" style="float:right;"><?php echo Yii::t('ui','Sample add Query Builder, Get Params, show result'); ?></b>
		<div class="view2"><?php echo $this->renderPartial('doc/_queryBuildSample'); ?></div>
	</div>
</ul>
</div>

<div class="view2">
<ul>
<li> <span class="badge">4. Mengambil Hasil Query</span <br />
Setelah <code>CDbCommand::query()</code> membuat instance CDbDataReader, Anda bisa mengambil baris data yang dihasilkan oleh pemanggilan <br /><b class="txtKet">CDbDataReader::read()</b> secara berulang. Ia juga dapat menggunakan CDbDataReader dalam konsrruksi bahasa PHP foreach untuk mengambil baris demi baris.</li>

<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP'));  ?> 
$dataReader=$command->query();
// memanggil read() secara terus menerus sampai ia mengembalikan false
while(($row=$dataReader->read())!==false) { ... }
foreach($dataReader as $row) { ... } // menggunakan foreach untuk menelusuri setiap baris data
$rows=$dataReader->readAll(); // mengambil seluruh baris sekaligus dalam satu array tunggal
<?php $this->endWidget(); ?>
</ul>

<b> Sample :</b><br>
<div class="ket">
<span class="badge"> SAMPLE createCommand()</span>

<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP', 'tabSize'=>1));  ?> 
$users = Yii::app()->db->createCommand()
    ->select('username, email')
    ->from('tbl_user_mysql')
    ->where('active=:active', array(':active'=>'1'))
    ->query();
		
foreach($users as $user) { print_r($user); echo"<br>"; }
echo"<pre class='res'>"; print_r($users); echo"</pre>";
<?php $this->endWidget(); ?>

<b> Result: </b><br>
<?php
$users = Yii::app()->db->createCommand()
    ->select('username, email')
    ->from('tbl_user_mysql')
    ->where('active=:active', array(':active'=>'1'))
    ->query();
		
foreach($users as $user) { print_r($user); echo"<br>"; }	echo"<br> dump( users);";
dump($users);
?>
</div>

<div class="ket">
<ul>
<li><b class="txtHead">$cmd = Yii::app()->db->createCommand('select * from tbl_data'); </b> :</li>
<?php $cmd = Yii::app()->db->createCommand('select * from tbl_data'); //dump($cmd ); ?>

<br><br><li><b class="txtHead">$cmd->execute(); <code>execute(array $params=array ( ))</code> return integer</b><br>
result : Executes the SQL statement. This method is meant only for executing non-query SQL statement. No result set will be returned. <br>//cuma dapatkan jumlah nya saja (lebih cocok jalankan SQL non-query "UPDATE, INSET, DELETE") </li>
<?php $result = $cmd->execute(); 		dump($result);	?>

<br><br><br><li><b class="txtHead">$cmd->query(); <code>query(array $params=array ( ))</code> {return} 	CDbDataReader </b><br>
result : //Executes the SQL statement and returns query result. <br>This method is for executing an SQL query that returns result set. </li>
<?php $result = $cmd->query();		dump($result); ?>		

<br><br><li><b class="txtHead">$cmd->queryRow(); <code> queryRow(boolean $fetchAssociative=true, array $params=array ( ))</code> {return} 	mixed</b> <br> result :  //reult last 1 row data </li>
<?php $result = $cmd->queryRow();		dump($result); ?>

<br><br><li><b class="txtHead">$cmd->queryColumn(); <code> queryColumn( array $params=array ( ))</code>{return} 	array</b> <br> result :  //Executes the SQL statement and returns the first column of the result. <br>This is a convenient method of query when only the first column of data is needed. Note, the column returned will contain the first element in each row of result.</li>
<?php $result = $cmd->queryColumn(); ?>	
<div class="scroll2" style="height:200px"> <?php dump($result); ?> </div>

<br><br><li><b class="txtHead">$cmd->queryScalar(); <code> queryScalar(array $params=array ( ))</code>{return} 	mixed</b> <br> result :  //Executes the SQL statement and returns the value of the first column in the first row of data. <br>This is a convenient method of query when only a single scalar value is needed (e.g. obtaining the count of the records).</li>
<?php $result = $cmd->queryScalar();		dump($result); ?>

<br><br><li><b class="txtHead">$cmd->queryAll(); <code>queryAll(boolean $fetchAssociative=true, array $params=array ( ))</code> {return} 	array</b><br> result :  //Executes the SQL statement and returns all rows. </li>
<?php $result = $cmd->queryAll(); ?>
<div class="scroll2" style="height:200px"> <?php dump($result);	?></div>
</ul>
</div>

</div>
