
<div class="view2">
<b class="badge">Data Access Objects (DAO) atau Objek Akses</b> <b class="txtHead2">Data menyediakan API generik untuk mengakses data yang disimpan dalam sistem manajemen database (DBMS) yang berbeda.<br /> Hasilnya, Lapisan DBMS dapat diubah ke yang lain yang berbeda tanpa memerlukan perubahan kode yang menggunakan DAO untuk mengakses data.<br /><br />

Yii DAO dibangun di atas PHP Data Objects (PDO) yang merupakan extension yang menyediakan akses data gabungan untuk beberapa DBMS populer, seperti MySQL, PostgreSQL. Oleh karena itu, untuk menggunakan Yii DAO, extension PDO dan driver database PDO tertentu (misalnya PDO_MYSQL) harus sudah terinstal.</b><br />
<b class="txtHead">Yii DAO terdiri dari empat kelas utama sebagai berikut :</b>
<ul>
	<li><a href="http://localhost/yiidoc/CDbConnection.html" target="_blank">CDbConnection</a>: 
  represents a connection to a database.</li>
  <li><a href="http://localhost/yiidoc/CDbCommand.html" target="_blank">CDbCommand</a>: 
  represents an SQL statement to execute against a database.</li>
  <li><a href="http://localhost/yiidoc/CDbDataReader.html" target="_blank">CDbDataReader</a>: 
  represents a forward-only stream of rows from a query result set.</li>
  <li><a href="http://localhost/yiidoc/CDbTransaction.html" target="_blank">CDbTransaction</a>: 
  represents a DB transaction.</li> 
In the following, we introduce the usage of Yii DAO in different scenarios.<br /><br />
</ul>
</div>

<div class="view2">
<ul>
<li><b class="badge">Menggunakan Prefiks Tabel</b></li>
<b class="txtHead2">Yii menyediakan dukungan terintegrasi untuk menggunakan prefiks tabel. Prefiks tabel merupakan sebuah string yang dipasang di depan nama tabel yang sedang terkoneksi ke database.<br /> Kebanyakan digunakan pada lingkungan shared-hosting yang mana berbagai aplikasi saling pakai sebuah database dan menggunakan prefiks tabel yang berbeda untuk saling membedakan.<br /> Misalnya, satu aplikasi bisa menggunakan tbl_ sebagai prefiks sedangkan aplikasi yang lain bisa saja menggunakan yii_<br /><br />

Untuk menggunakan prefiks tabel, mengkonfigurasi properti CdbConnection::tablePrefix menjadi sesuai dengan prefiks tabel yang diinginkan.<br /> Kemudia, dalam statement SQL gunakan {{NamaTabel}} untuk merujuk nama tabel, di mana NamaTabel adalah nama table tanpa prefik.<br /> Misalnya, jika database terdapat sebuah tabel bernama tbl_user di mana tbl_ dikonfigurasi sebagai prefiks tabel, maka kita dapat menggunakan kode berikut untukquery user.</b>
<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP'));  ?> 
$sql='SELECT * FROM {{user}}';
$users=$connection->createCommand($sql)->queryAll();
<?php $this->endWidget(); ?>
</ul>
</div>


<div class="view2">
<ul>
<li> <b class="badge">Menggunakan Transaksi </b></li>
<b class="txtHead2">Ketika aplikasi menjalankan beberapa query, setiap pembacaan dan/atau penulisan informasi dalam database, penting untuk memastikan bahwa database <br />tidak tertinggal dengan hanya beberapa query yang dihasilkan. Transaksi diwakili oleh instance <a href="http://localhost/yiidoc/CDbTransaction.html" target="_blank">CDbTransaction</a> dalam Yii, dapat diinisiasi dalam hal:</b>

<ul><li>Mulai transaksi.</li>
<li>Jalankan query satu demi satu. Setiap pemutakhiran pada database tidak terlihat bagi dunia luar.</li>
<li>Lakukan transaksi. Pemutakhiran menjadi terlihat jika transaksi berhasil.</li>
<li>Jika salah satu query gagal, seluruh transaksi dibatalkan.</li></ul>

<b class="txtHead">Alur kerja di atas dapat diimplementasikan menggunakan kode berikut:</b><br />
<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP'));  ?> 
//*To use transaction, do like the following:
$transaction=$connection->beginTransaction();
try
{
   $connection->createCommand($sql1)->execute();
   $connection->createCommand($sql2)->execute();
   //.... other SQL executions
   $transaction->commit();
}
catch(Exception $e)
{
   $transaction->rollback();
}
<?php $this->endWidget(); ?>
</ul>
</div>


<div class="view2">
<ul>
<li><b class="badge">Mengikat Parameter.</b></li> 
<b class="txtHead2">Untuk menghindari serangan injeksi SQL dan meningkatkan kinerja pelaksanaan pernyataan SQL secara terus menerus, Anda dapat "menyiapkan" sebuah pernyataan SQL<br /> dengan opsional penampung parameter yang akan diganti dengan parameter sebenarnya selama proses pengikatan parameter.<br />
Penampung parameter dapat bernama (disajikan sebagai token unik) ataupun tidak bernama (disajikan sebagai tanda tanya).<br /> Panggil <span class="txtKet">CDbCommand::bindParam() atau CDbCommand::bindValue()</span> untuk mengganti penampung ini dengan parameter sebenarnya. <br />Parameter tidak harus bertanda kutip: lapisan driver database melakukan ini bagi Anda. Pengikatan parameter harus dikerjakan sebelum pernyataan SQL dijalankan.
</b>

<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP'));  ?> 
$sql="INSERT INTO tbl_user (username, email) VALUES(:username,:email)"; // SQL dengan dua penampung ":username" and ":email"
$command=$connection->createCommand($sql);
$command->bindParam(":username",$username,PDO::PARAM_STR); // ganti penampung ":username" dengan nilai username sebenarnya
$command->bindParam(":email",$email,PDO::PARAM_STR);	// ganti penampung ":email" dengan nilai email sebenarnya
$command->execute();

// sisipkan baris lain dengan set baru parameter
$command->bindParam(":username",$username2,PDO::PARAM_STR);
$command->bindParam(":email",$email2,PDO::PARAM_STR);
$command->execute();
//--------------------------------------------------------------------------//
//*One can do prepared SQL execution and bind parameters to the prepared SQL:
$command=$connection->createCommand($sqlStatement);
$command->bindParam($name1,$value1);
$command->bindParam($name2,$value2);
$command->execute();

#SAMPLE :
$user_id =1;
$date = date('y-m-d');
$sql = "UPDATE {$this->visitorTableName} SET last_activity=:last_activity WHERE user_id=:user_id";
Yii::app()->db->createCommand($sql)->bindValue(':user_id', $user_id)->bindValue(':last_activity', $date)->execute();
<?php $this->endWidget(); ?>

<b class="txtAtt">Metode bindParam() dan bindValue() sangat mirip. Perbedaannya hanyalah bahwa bidParam mengikat parameter dengan referensi variabel PHP sedangkan bindValue dengan nilai.<br /> Untuk parameter yang mewakili memori blok besar data, bindParam dipilih dengan pertimbangan kinerja.<br /> Untuk lebih jelasnya mengenai pengikatan parameter, lihat dokumentasi PHP relevan.</b>
</ul>
</div>

<div class="view2">
<ul>
<li><b class="badge"> Mengikat Kolom.</b></li> 
<b class="txtHead2">Ketika mengambil hasil query, Anda dapat mengikat kolom ke variabel PHP dengan demikian hasil akan dipopulasi secara otomatis dengan data terbaru setiap kali baris diambil.</b>
<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP'));  ?> 
$sql="SELECT username, email FROM tbl_user";
$dataReader=$connection->createCommand($sql)->query();
$dataReader->bindColumn(1,$username);	// ikat kolom ke-1 (username) ke variabel $username
$dataReader->bindColumn(2,$email);	// ikat kolom ke-2 (email) ke variabel $email
while($dataReader->read()!==false)
{
    // $username dan $email berisi username dan email pada baris saat ini
}
<?php $this->endWidget(); ?>
</ul>
</div>

<div class="view2">
<span class="badge">Sample SQL execution and bind parameters to the prepared SQL</span>
<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP'));  ?> 
$connection=new CDbConnection('mysql:host=localhost;dbname=yiitest','root','');
$name1='role'; $value1='1';
$name2='active'; $value2='1';

$sqlStatement="select * from tbl_user_mysql";
$command2=$connection->createCommand($sqlStatement);
$command2->bindParam($name1,$value1);
$command2->bindParam($name2,$value2);

//$command2->execute();
$reader=$command2->query(); //print_r($reader);
foreach($reader as $row2) { dump($row2); }
<?php $this->endWidget(); ?>

<b>Result :</b><br>
<?php
$connection=new CDbConnection('mysql:host=localhost;dbname=yiitest','root','');
//*One can do prepared SQL execution and bind parameters to the prepared SQL:
$name1='role'; $value1='1';
$name2='active'; $value2='1';

$sqlStatement="select * from tbl_user_mysql";
$command2=$connection->createCommand($sqlStatement);
$command2->bindParam($name1,$value1);
$command2->bindParam($name2,$value2);

//$command2->execute();
$reader=$command2->query(); //print_r($reader);
?>
<div class="scroll"><?php foreach($reader as $row2) { dump($row2); } ?></div>

</div>