
<div class="view2">
<ul>
<li><b class="badge">1. Membuat Koneksi Database </b></li>
<b class="txtHead2">Untuk membuat koneksi database, buat instance CDbConnection dan mengaktifkannya. Format DSN tergantung pada driver PDO database yang digunakan. ecara umum, <br />DSN terdiri dari nama driver PDO, diikuti oleh titik dua, diikuti oleh sintaks koneksi spesifik-driver.Lihat <a href="http://www.php.net/manual/en/pdo.construct.php" target="_blank">Dokumentasi PDO </a>untuk informasi lebih lengkap. Di bawah ini adalah daftar format DSN yang umum dipakai:</b>

<ul><li>SQLite: sqlite:/path/to/dbfile</li>
<li>MySQL: mysql:host=localhost;dbname=testdb</li>
<li>PostgreSQL: pgsql:host=localhost;port=5432;dbname=testdb</li>
<li>SQL Server: mssql:host=localhost;dbname=testdb</li>
<li>Oracle: oci:dbname=//localhost:1521/testdb</li></ul>
</ul>

<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP'));  ?> 
	$connection=new CDbConnection($dsn,$username,$password);
	// melakukan koneksi. Anda dapat mencoba try...catch exception yang mungkin
	$connection->active=true;
	......
	$connection->active=false;  // tutup koneksi
<?php $this->endWidget(); ?>
</div>

<div class="view2">
<ul>
<li><b class="badge">2. Menjalankan Pernyataan SQL </b></li>
<b class="txtHead2">Setelah koneksi database terlaksana, pernyataan SQL dapat dijalankan menggunakan CDbCommand.<br /> Membuat instance CDbCommand dengan memanggil <span class="txtKet">CDbConnection::createCommand()</span> dengan pernyataan SQL yang ditetapkan<br />
Pernyataan SQL dijalankan via CDbCommand dalam dua cara berikut:</b><br />

<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP'));  ?> 
$connection=Yii::app()->db;   // asumsi bahwa Anda memiliki koneksi "db" yang terkonfigurasi
// $connection=new CDbConnection($dsn,$username,$password); // Jika tidak, Anda bisa membuat sebuah koneksi secara eksplisit
$command=$connection->createCommand($sql);
/*--- atau ---*/
$row = Yii::app()->db->createCommand(array(
    'select' => array('id', 'username'), //$command->select = array('id', 'username');
    'from' => 'tbl_user',
    'where' => 'id=:id',
    'params' => array(':id'=>1),
))->queryRow();
    
$command->text=$newSQL; // jika diperlukan, statement SQL dapat diupdate sebagai berikut
//---------------------------------------------------------------------------------//
//*After the DB connection is established, one can execute an SQL statement like the following:
$command=$connection->createCommand($sqlStatement);
$command->execute();   // a non-query SQL statement execution

//or execute an SQL query and fetch the result set
$reader=$command->query();

//each $row is an array representing a row of data
foreach($reader as $row) ...
<?php $this->endWidget(); ?>

    <ul><li><b class="txtHead2">execute():</b> melakukan pernyataan SQL non-query, seperti INSERT, UPDATE and DELETE. Jika berhasil, mengembalikan sejumlah baris yang dipengaruhi oleh eksekusi</li>

    <li><b class="txtHead2"> query():</b> melakukan pernyataan SQL yang mengembalikan baris data, seperti SELECT. Jika berhasil,mengembalikan instance CDbDataReader yang<br /> dapat ditelusuri baris data yang dihasilkan. Untuk kenyamanan, satu set metode queryXXX() juga diimplementasikan yang secara langsung mengembalikan hasil query.</li></ul>
    
<b class="txtHead2">Exception akan dimunculkan jika kesalahan terjadi selama eksekusi pernyataan SQL.</b>
<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP'));  ?> 
$rowCount=$command->execute();   // jalankan SQL non-query "UPDATE, INSET, DELETE"
$dataReader=$command->query();   // jalankan query SQL lalu ambil data dgn kaya gini "foreach($users as $user)"
<?php $this->endWidget(); ?>

<li><b class="badge">OUTPUT :</b></li>
<ul>
<li class="txtKet">$rows=$command->query() </li>
SHOW RESULT : 	Arry CDbDataReader Object 
  
<pre class="res">
 // query dan kembalikan seluruh baris SHOW RESULT
SHOW RESULT:
Array
(
    [0] => Array
        (
            [username] => admin
            [email] => admin@admin12345
        )

    [1] => Array
        (
            [username] => kodoqkuww
            [email] => kodq@kod000q
        )
)
</pre>

<li class="toggle txtHead">$row=$command->queryRow(); ?></li>
<pre class="res">
SHOW RESULT:
Array
(
    [username] => admin
    [email] => admin@admin12345
)
</pre>

<li class="toggle txtHead">$column=$command->queryColumn(); ?></li>
<pre class="res">
// query dan kembalikan kolom pertama SHOW RESULT
SHOW RESULT:
Array
(
    [0] => admin
    [1] => kodoqkuww
)
</pre>

 
<li class="txtKet">$value=$command->queryScalar();  // query dan kembalikan field pertama dalam baris pertama</li>
	SHOW RESULT : admin
</ul>

<b class="txtAtt">Catatan: Tidak seperti query(), semua metode queryXXX() mengembalikan data secara langsung.<br /> Sebagai contoh, queryRow() mengembalikan array yang mewakili baris pertama pada hasil query.</b>
</ul>
</div>

<!-------------------- SAMPLE ------------------->
<?php echo $this->renderPartial('doc/_koneksi'); ?>