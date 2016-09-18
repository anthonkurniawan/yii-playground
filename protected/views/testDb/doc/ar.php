
<a href="http://www.yiiframework.com/doc/guide/1.1/id/database.ar" target="_blank" class="txtHead">DIKUMENTASI DAO-Active Record</a> |
<a href="http://localhost/yiidoc/CActiveRecord.html" target="_blank" class="txtHead"> Class CActiveRecord</a>
<br />
<div class="ket">
<b class="txtHead">Active Record<br />
Inheritance 	abstract class <code>CActiveRecord</code> > <code>CModel</code> > <code>CComponent</code></b> <br>
<b class="txtKet"> Biasa di gunakana dalam model class</b>
sample in model : <code> class TblUserMysql extends CActiveRecord </code><br><br>

<b class="txtHead2">Active Record (AR) adalah teknik populer Pemetaan Relasional Objek / Object-Relational Mapping (ORM). Setiap kelas AR mewakili tabel database (atau view) yang atributnya diwakili oleh properti kelas AR,<br /> dan turunan AR mewakili baris pada tabel tersebut. Operasi umum CRUD diimplementasikan sebagai metode AR. Hasilnya, kita dapat mengakses data dengan cara lebih terorientasi-objek.</b><br />
<ul>
<li><b class="txtHead">1. New Record </b></li>
<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP'));  ?> 
$post=new Post;
$post->title='sample post';
$post->content='content for the sample post';
$post->createTime=time();
/*---- atau -----*/
$post->createTime=new CDbExpression('NOW()'); //Atribut dapat menempatkan nilai tipe CDbExpression(INSERT, UPDATE)
// $post->createTime='NOW()'; tidak akan bekerja karena
// 'NOW()' akan dianggap sebagai string
$post->save();
<?php $this->endWidget(); ?>

<li><b class="txtHead">2. Read Record </b></li>
<b class="txtHead2">Untuk membaca data dalam tabel database, kita memanggil salah satu metode find seperti berikut.</b>
<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP'));  ?> 
$post=Post::model()->find($condition,$params);	// cari baris pertama sesuai dengan kondisi yang ditetapkan
$post=Post::model()->findByPk($postID,$condition,$params);	// cari baris dengan primary key yang ditetapkan
$post=Post::model()->findByAttributes($attributes,$condition,$params);	// cari baris dengan nilai atribut yang ditetapkan
$post=Post::model()->findBySql($sql,$params);	// cari baris pertama menggunakan pernyataan SQL yang ditetapkan

// dengan menggunakan CDbCriteria
$criteria=new CDbCriteria;
$criteria->select='title';  // hanya memilih kolom 'title'
$criteria->condition='postID=:postID';
$criteria->params=array(':postID'=>10);
$post=Post::model()->find($criteria); // $params tidak diperlukan

// Atau bisa jg kaya gini
$post=Post::model()->find(array(
    'select'=>'title',
    'condition'=>'postID=:postID',
    'params'=>array(':postID'=>10),
));

//others
$n=Post::model()->count($condition,$params);	// ambil sejumlah baris yang sesuai dengan kondisi yang ditetapkan
$n=Post::model()->countBySql($sql,$params);		// ambil sejumlah baris menggunakan pernyataan SQL yang ditetapkan
$exists=Post::model()->exists($condition,$params);	// periksa apakah ada satu baris yang sesuai denga kondisi yang ditetapkan
<?php $this->endWidget(); ?>

<?php echo CHtml::link('More Test Query', array('TestDb/testQuery', 'view'=>'testQuery'), array('target'=>"_blank") ); ?> |
<?php echo CHtml::link('find() sample', array('TestDb/testQuery', 'view'=>'testQuery'), array('target'=>"_blank") ); ?> |
<?php echo CHtml::link('findByPk(), findByAttributes(), findBySql(), count(), exists(), populateRecord()', array('testDb/find', 'view'=>'_find_other'), array('target'=>'_blank')); ?><br><br>


<li><b class="txtHead">3. Update Record </b></li>
<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP'));  ?> 
$post=Post::model()->findByPk(10);
$post->title='new post title';
$post->save(); // simpan perubahan ke database

//**Dimungkinkan juga untuk mengupdate satu atau beberapa baris dalam sebuah tabel database tanpa memanggilnya lebih dulu
//**$attributes adalah array nilai kolom yang diindeks oleh nama kolom; 
//**$counters adalah array nilai inkremental yang diindeks oleh nama kolom
Post::model()->updateAll($attributes,$condition,$params);	// mutakhirkan baris yang sama seperti kondisi yang ditetapkan
Post::model()->updateByPk($pk,$attributes,$condition,$params);	// mutakhirkan baris yang sama seperti kondisi dan primary key yang ditetapkan
Post::model()->updateCounters($counters,$condition,$params);	// mutakhirkan kolom counter dalam baris yang sesuai dengan kondisi yang ditetapkan
<?php $this->endWidget(); ?>

<li><b class="txtHead">4. Delete Record </b></li>
<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP'));  ?> 
$post=Post::model()->findByPk(10); // menganggap ada tulisan yang memiliki ID = 10
$post->delete(); // hapus baris dari tabel database

Post::model()->deleteAll($condition,$params);
Post::model()->deleteByPk($pk,$condition,$params);
<?php $this->endWidget(); ?>

<li><b class="txtHead"> Membandingkan Record </b></li>
<b class="txtHead2">Seperti baris tabel, turunan AR secara unik diidentifikasi dengan nilai primary key. Oleh karena itu, untuk membandingkan dua instance AR, kita perlu membandingkan nilai primary key-nya,<br /> menganggap keduanya milik kelas AR yang sama. Cara paling sederhana adalah dengan memanggil</b> <b class="txtKet">CActiveRecord::equals().</b>

<li><b class="txtHead"> Kustomisasi </b><br />
<b class="txtHead2">CActiveRecord menyediakan beberapa metode penampungan yang dapat di-overide dalam anak kelas untuk mengkustomisasi alur kerjanya.</b>
<ul>
    <li><b class="txtKet">beforeValidate dan afterValidate</b>: ini dipanggil sebelum dan sesudah validasi dilakukan.</li>
    <li><b class="txtKet">beforeSave dan afterSave</b>: ini dipanggil sebelum dan sesudah penyimpanan instance AR.</li>
    <li><b class="txtKet">beforeDelete dan afterDelete</b>: ini dipanggil sebelum dan sesudah instance AR dihapus.</li>
    <li><b class="txtKet">afterConstruct</b>: ini dipanggil untuk setiap instance AR yang dibuat menggunakan operator new.</li>
    <li><b class="txtKet">beforeFind</b>: ini dipanggil sebelum pencari AR dipakai untuk melakukan query (misal find(), findAll()).</li>
    <li><b class="txtKet">afterFind</b>: ini dipanggil untuk setiap instance AR yang dibuat sebagai hasil dari query.</li>
</ul>

<li><b class="txtHead">Menggunakan Transaksi dengan AR </b><br />
<b class="txtHead2">Setiap instance AR berisi properti bernama dbConnection yang merupakan turunan dari CDbConnection.<br /> Kita dapat menggunakan fitur transaksi yang disediakan oleh Yii DAO jika diinginkan saat bekerja dengan AR:</b>
<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP'));  ?> 
$model=Post::model();
$transaction=$model->dbConnection->beginTransaction();
try
{
    // cari dan simpan adalah dua langkah yang bisa diintervensi oleh permintaan lain
    // oleh karenanya kita menggunakan transaksi untuk memastikan konsistensi dan integritas
    $post=$model->findByPk(10);
    $post->title='new post title';
    $post->save();
    $transaction->commit();
}
catch(Exception $e)
{
    $transaction->rollBack();
}
<?php $this->endWidget(); ?>

<li><b class="txtHead">Named Scope</b><br />
Sebuah named scope mewakili kriteria query bernama yang dapat digabung dengan named scope lain dan diterapkan ke query active record.<br /><br />
Named scope dideklarasikan terutama dalam metode <b class="txtKet">CActiveRecord::scopes()</b> sebagai pasangan nama-kriteria. Kode berikut mendeklarasikan tiga named scope, published dan recently, dalam kelas model Post
<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP'));  ?> 
class Post extends CActiveRecord
{
    public function scopes()
    {
        return array(
            'published'=>array(
                'condition'=>'status=1',
            ),
            'recently'=>array(
                'order'=>'createTime DESC',
                'limit'=>5,
            ),
        );
    }
}
<?php $this->endWidget(); ?>
<b class="txtHead2">Setiap named scope dideklarasikan sebagai sebuah array yang dipakai untuk menginisialisasi instance CDbCriteria. Sebagai contoh, named scope recently menetapkan bahwa properti order adalah createTime DESC<br /> dan properti limit adalah 5 yang diterjemahkan ke dalam sebuah kriteria query yang harus menghasilkan paling banyak 5 tulisan terbaru.<br/><br />

Named scope dipakai sebagai pembeda pada pemanggilan metode find. Beberapa named scope dapat dikaitkan bersamaan dan menghasilkan set yang lebih terbatas.<br /> Sebagai contoh, untuk mencari tulisan terbaru yang diterbitkan, kita menggunakan kode berikut:
<b class="txtKet">$posts=Post::model()->published()->recently()->findAll();</b><br />
<b class="txtAtt">Catatan: Named scope hanya bisa dipakai dengan metode tingkat-kelas. Yakni, metode harus dipanggil menggunakan ClassName::model().</b><br />

<b class="txtHead">Hal yg sama bisa di lakukan dgn buat fungsi baru</b>
<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP'));  ?> 
public function recently($limit=5)
{
    $this->getDbCriteria()->mergeWith(array(
        'order'=>'createTime DESC',
        'limit'=>$limit,
    ));
    return $this;
}

//Selanjutnya, kita bisa menggunakan pernyataan berikut untuk mengambil 3 tulisan terbaru yang diterbitkan:
$posts=Post::model()->published()->recently(3)->findAll();
<?php $this->endWidget(); ?>

<li><b class="txtHead">Parameterisasi Named Scope</b></li>
<b class="txtHead2">Named scope dapat diparameterkan. Sebagai contoh, kita mungkin ingin mengkustomisasi sejumlah tulisan dengan named scope recently. Untuk melakukannya, daripada mendeklarasikan named scope dalam metode CActiveRecord::scopes,<br /> kita dapat mendefinisikan sebuah metode baru yang namanya sama seperti named scope tadi:
<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP'));  ?> 
public function recently($limit=5)
{
    $this->getDbCriteria()->mergeWith(array(
        'order'=>'createTime DESC',
        'limit'=>$limit,
    ));
    return $this;
}

//**Selanjutnya, kita bisa menggunakan pernyataan berikut untuk mengambil 3 tulisan terbaru yang diterbitkan:
$posts=Post::model()->published()->recently(3)->findAll();
<?php $this->endWidget(); ?>

<div class="view2">
<b class="txtHead">Contoh</b>
<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP'));  ?> 
$scope=TblUserMysql::model()->actively()->rolely(1)->findAll(); 
foreach($scope as $key=>$value) { print_r($value->attributes); }
<?php $this->endWidget(); ?>
<b class="txtHead">Hasil</b><br />
<?php 
	$scope=TblUserMysql::model()->actively()->rolely(1)->findAll(); 
	//print_r($scope);
	foreach($scope as $key=>$value) { print_r($value->attributes); }
?>
</div>

<li><b class="txtHead">Default Scope</b></li>
<b class="txtHead2">Kelas model dapat memiliki default scope yang akan diterapkan untuk semua query (termasuk yang relasional) berkenaan dengan model. <br>
Sebagai contoh, website yang mendukung multi bahasa mungkin hanya ingin menampilkan konten yang ditetapkan oleh pengguna saat ini. Karena di sana ada banyak query atas konten situs, kita dapat mendefinisikan default scope guna memecahkan masalah ini. Untuk melakukannya, kita meng-override metode CActiveRecord::defaultScope seperti berikut: </b>
<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP'));  ?> 
class Content extends CActiveRecord
{
    public function defaultScope()
    {
        return array(
            'condition'=>"language='".Yii::app()->language."'",
        );
    }
}

//**Sekarang, jika metode di bawah ini dipanggil, Yii akan secara otomatis menggunakan kriteria query seperti didefinisikan di atas:
$contents=Content::model()->findAll();
<?php $this->endWidget(); ?>
<b class="txtAtt">Note: Default scope dan named scope hanya berlaku pada query SELECT. Mereka akan mengabaikan query INSERT, UPDATE, dan DELETE. Juga, ketika mendeklarasikan scope (baik default maupun named), kelas AR tidak dapat digunakan untuk membuat query DB di dalam method yang mendeklarasikan scope.</b>
</ul>
</div>

<div class="ket">
Tip: Karena AR mengijinkan kita untuk melakukan operasi database tanpa menulis sejumlah pernyataan SQL, seringkali kita ingin mengetahui pernyataan SQL apa yang dijalankan oleh AR. Ini bisa dilakukan dengan menghidupkan fitur pencatatan atau <a href="http://www.yiiframework.com/doc/guide/1.1/id/topics.logging" target="_blank">Logging</a> pada Yii. Sebagai contoh, kita dapat menghidupkan <a href="http://localhost/yiidoc/CWebLogRoute.html" target="_blank">CWebLogRoute</a> dalam konfigurasi aplikasi, dan kita akan melihat pernyataan SQL yang dijalankan untuk ditampilkan di akhir setiap halaman Web. Kita dapat menyetel "CDbConnection::enableParamLogging" menjadi true dalam konfigurasi aplikasi agar nilai parameter yang diikat ke pernyataan SQL juga dicatat.
</div>

