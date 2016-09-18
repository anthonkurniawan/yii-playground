<style>.container{width:1100px;}</style>

<?php $this->layout='column2'; ?>
<?php $this->pageTitle='Cache Query'; ?>
<?php $this->breadcrumbs=array( 'Test Form'=>array('index'), 'CACHE',);?>
<?php $this->renderPartial('_menu'); ?>

<h1><small> Cache Query</small> </h1>
Query Chacing dibuat di atas data caching, digunakan untuk menyimpan hasil query DB ke dalam cache sehingga menghemat waktu eksekusi query DB jika query yang sama diminta di masa mendatang, sehingga bisa langsung diambil dari cache.<br>

<b>Terdapat 2 metode:</b>
<ul>
<li>Menggunakan Query Caching dengan DAO</li>
<li>Menggunakan Query Caching dengan ActiveRecord</li>
</ul>

<b class="badge"> Mengaktifkan Query Caching</b>
<ul>
<li>Enabling Query Caching <code>CDbConnection::queryCacheID</code> merujuk ke ID component</li>
aplikasi cache yang valid (secara default ke cache).
</ul>

<div class="view2">
<b class="badge">Menggunakan Query Caching dengan DAO</b><br>
Untuk menggunakan query caching, kita memanggil method <code>CDbConnection::cache()</code> / <code>Yii::app()->db->cache()</code> ketika melakukan query DB. <br>Berikut contohnya:

<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP', 'lineNumberStyle'=>'table', 'showLineNumbers'=>1, )); ?>
#Menggunakan Query Caching dengan DAO ( CDbConnection::cache() / Yii::app()->db->cache() )
$sql = 'SELECT * FROM tbl_post LIMIT 20';
$dependency = new CDbCacheDependency('SELECT MAX(update_time) FROM tbl_post');
$rows = Yii::app()->db->cache(1000, $dependency)->createCommand($sql)->queryAll();

#Jika cache berisi sebuah entri yang diindeks oleh statement SQL.
#Jika entri belum kadaluarsa (krang dari 1000 deik semenjak disimpan ke cache)
#jika ketergantungannya tidak berubah (nilai maksimal update_time sama ketika hasil query disimpan ke cache.

/**Jika ketiga kondisi itu terpenuhi, maka hasil cache akan dikembalikan dari cache. 
Kalau tidak, maka statement SQL akan dikirim ke server DB untuk dijalankan, 
dan hasil bersangkutan akan disimpan ke cache.	*/
<?php $this->endWidget(); ?>

<div class="tpanel"> 
	<div class="toggle btn" style="float:right"><?php echo Yii::t('ui','View Sample'); ?></div>
	<div>
		<?php echo CHtml::ajaxButton('Sample', array('cache/queryCache_dao'), array('update'=>'#sample_dao') ); ?>
		<div id="sample_dao"></div>
	</div>
</div>
 
</div>

<div class="view2">
<b class="badge">Menggunakan Query Caching dengan ActiveRecord</b> <code>CActiveRecord::cache()</code><br><br>
Method cache() di sini secara esensinya adalah shortcut untuk CDbConnection::cache(). Secara internal, ketika mengeksekusi statement SQL yang dihasilkan oleh ActiveRecord.<br> <b>Sample: </b><br>
<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP', 'lineNumberStyle'=>'table', 'showLineNumbers'=>1, )); ?>
$dependency = new CDbCacheDependency('SELECT MAX(update_time) FROM tbl_user_mysql');
$posts = Post::model()->cache(1000, $dependency)->findAll();

$posts = Post::model()->cache(1000, $dependency)->with('tbl_data')->findAll(); // with relational AR query
<?php $this->endWidget(); ?>

<b class="badge">Untuk menhindari query table relasi hanya 1 table saja yang di cache.</b><br>
ketika melakukan query AR relasi, ada kemungkinan beberapa query SQL akan dijalankan (silahkan cek di log messages). <br>
Misalnya, untuk relasi antara Post dan Comment yang HAS_MANY, maka code berikut akan mengeksekusi dua query:
<ul>
<li> Pertama select post sebanyak 20 </li>
<li>Kemudian select comment untuk post yang di-select sebelumnya. </li>
<code>$posts = Post::model()->cache(1000, $dependency)->with('comments')->findAll(array( 'limit'=>20, )); </code>
 maka hanya query DB pertama yang di-cache.<br><br>
 
 Supaya kedua-dua query DB di-cache, kita harus memberikan parameter ekstra berapa banyak query DB yang akan di-cache berikutnya:<br>
 <code>$posts = Post::model()->cache(1000, $dependency, 2)->with('comments')->findAll( array('limit'=>20, ) );</code>
</ul>

<div class="tpanel"> 
	<div class="toggle btn" style="float:right"><?php echo Yii::t('ui','View Sample'); ?></div>
	<div>
		<?php echo CHtml::ajaxButton('Sample', array('cache/queryCache_ar'), array('update'=>'#sample_ar') ); ?>
		<div id="sample_ar"></div>
	</div>
</div>
</div>

<div class="view2">
<b class="badge">Batasan</b><br>
Query caching tidak bekerja pada hasil query yang mengandung pengatur resource. Misalnya, ketika menggunakan kolom jenis BLOB di beberapa DBMS, 
hasil query akan mengembalikan resource handle untuk kolom data.<br><br>
Beberapa simpanan caching memiliki limitasi pada ukurannya. Misalnya, memcache membatasi ukuran setiap entri hanya 1MB.
 Oleh karenanya, jika ukuran query melebihi batasan ini, maka caching akan gagal.
 </div>