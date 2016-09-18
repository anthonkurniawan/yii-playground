<?php $this->layout='column1';?> 
<style>
.container{width:1100px;}
#content { font-size: 65.5%; }
.php-hl-main {font-size:90% }
</style>

<?php 
$this->pageTitle='AR Relational';
$this->breadcrumbs=array('Test DB'=>array('index'),'Data Access Object (DAO)',);
?>

<a href="http://www.yiiframework.com/doc/guide/1.1/id/database.ar" target="_blank" class="txtHead">DIKUMENTASI DAO-Active Record</a> |
<a href="http://localhost/yiidoc/CActiveRecord.html" target="_blank" class="txtHead"> Class CActiveRecord</a><br>

<?php echo CHtml::link('GRID(CActiveDataProvider + CDbCriteria)', array('testDb/testAR_join', 'view'=>'testAR_join'), array('target'=>'_blank')); ?> |
<?php echo CHtml::link('GRID(CActiveDataProvider only)', array('testDb/testAR_join2', 'view'=>'testAR_join2'), array('target'=>'_blank')); ?> |
<?php echo CHtml::link('GRID(CDbCommand + CArrayDataProvider)', array('TestDb/testAR_join_cmd'), array('target'=>'_blank')); ?> |
<?php echo CHtml::link('GRID(CSqlDataProvider)', array('testDb/testAR_Csql', 'view'=>'testAR_Csql'), array('target'=>'_blank')); ?> 

<div class="view2">
<b class="badge">Active Record - Relational</b><br />
<b class="txtHead2">melihat bagaimana menggunakan AR untuk menggabung beberapa tabel database terkait dan mengembalikan hasil data yang telah digabungkan.<br />Untuk menggunakan AR relasional, disarankan untuk mendeklarasi constraint primary key-foreign key pada tabel yang ingin digabungkan(di-join).<br> Contraint ini akan membantu menjaga konsistensi dan integritas data relasional.Untuk menyederhanakan, kita akan menggunakan skema database yang <br>ditampilkan dalam diagram entity-relationship (ER) atau hubungan-entitas berikut untuk memberi gambaran contoh pada bagian ini.</b><br /><br />

<div style="float:left; width:450px; margin:5px">
<img src="../images/ar_relational.png" width="70%" height="70%"/><br />

<b class="txtHead">Query Statistik</b>
Selain query yang dijelaskan di atas, Yii juga mendukung apa yang disebut query statistik (atau query agregasional). Maksud dari query statistik adalah pengambilan informasi agregasional mengenai objek terkait, seperti jumlah komentar untuk setiap tulisan, rata-rata peringkat setiap produk, dll. Query statistik hanya bisa dilakukan untuk obyek terkait dalam <b class="txtHead">HAS_MANY</b> (misalnya sebuah tulisan memiliki banyak komentar) atau <b class="txtHead">MANY_MANY</b> (misalnya tulisan milik banyak kategori dan kategori memiliki banyak tulisan).
<?php $this->beginWidget('CTextHighlighter',array('language'=>'JAVASCRIPT', 'tabSize'=>1));  ?>  
return array(
 //menghitung jumlah komentar milik sebuah post
  'commentCount'=>array(self::STAT,'Comment','postID'), 
 //menghitung jumlah kategori di mana post tersebut berada
  'categoryCount'=>array(self::STAT,'Category','PostCategory(postID,categoryID)'),
);
<?php $this->endWidget(); ?>

<div class="ket">
<b class="txtHead">Dengan deklarasi di atas, kita dapat mengambil sejumlah komentar untuk sebuah tulisan menggunakan ekspresi</b> 
<b class="txtKet">$post->commentCount</b><br />

<b>Sample :</b><br />
<code>TblUserMysql::model()->findByPk(1);</code><br />
Result : <b class="txtKet">echo $user->LogsCount : </b>
<?php 
$user= TblUserMysql::model()->findByPk(1);
echo $user->LogsCount;
?>
</div>
</div>
       
<div style="float:left; width:550px">
<ul>
  <li><b class="txtKet">BELONGS_TO:</b> jika hubungan antara tabel A dan B adalah satu-ke-banyak, maka B milik A (misal Post milik User);</li>
  <li><b class="txtKet">HAS_MANY:</b> jika hubungan tabel A dan B adalah satu-ke-banyak, maka A memiliki banyak B (misal User memiliki banyak Post);</li>
  <li><b class="txtKet">HAS_ONE:</b> ini kasus khusus pada HAS_MANY di mana A memiliki paling banyak satu B (misal User memiliki paling banyak satu Profile);</li>
  <li><b class="txtKet">MANY_MANY:</b> ini berkaitan dengan hubungan banyak-ke-banyak dalam database. Tabel asosiatif diperlukan untuk memecah hubungan banyak-ke-banyak ke dalam hubungan satu-ke-banyak, karena umumnya DBMS tidak mendukung hubungan banyak-ke-banyak secara langsung. Dalam contoh skema database kita, tbl_post_category yang menjadi tabel asosiatif ini. Dalam terminologi AR, kita dapat menjelaskan MANY_MANY sebagai kombinasi BELONGS_TO dan HAS_MANY. Sebagai contoh, Post milik banyak Category dan Category memiliki banyak Post.</li>
</ul>
<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP', 'tabSize'=>1));  ?> 
pada User model: 
  return array(
            'posts'=>array(self::HAS_MANY, 'Post', 'author_id'),
            'profile'=>array(self::HAS_ONE, 'Profile', 'owner_id'),
        );
        
pada Post model:  
  return array(
            'author'=>array(self::BELONGS_TO, 'User', 'author_id'),
            'categories'=>array(self::MANY_MANY, 'Category',
                'tbl_post_category(post_id, category_id)'),
        );
pada Profile model:  
  return array(
            'author'=>array(self::BELONGS_TO, 'User', 'owner_id'),
        );
<?php $this->endWidget(); ?>
</div>
</div>


<div class="view2">
<b class="badge">Melakukan Query Relasional</b><br />
<ul> 
<li> <b class="txtHead">Lazy Loading</b></li>
<b class="txtHead2">Cara termudah melakukan query relasional adalah dengan membaca properti relasional turunan AR. Jika properti tidak diakses sebelumnya, query relasional akan diinisiasi, yang menggabungkan dua tabel terkait dan filter dengan primary key pada instance dari AR saat ini. Hasil query akan disimpan ke properti sebagai instance kelas AR terkait. <br>Proses ini dikenal sebagai pendekatan <b class="txtHead">lazy loading</b>, contohnya, query relasional dilakukan hanya saat obyek terkait mulai diakses. Contoh di bawah memperlihatkan bagaimana menggunakan pendekatan ini:</b>

<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP', 'tabSize'=>1));  ?> 
// ambil tulisan di mana ID adalah 10
$post=Post::model()->findByPk(10);

// ambil penulis tulisan: query relasional akan dilakukan di sini
$author=$post->author;

//mengembalikan tulisan pengguna yang memiliki status = 1
$posts=$user->posts(array('condition'=>'status=1')); 
<?php $this->endWidget(); ?>

<div class="ket"><b class="txtHead2"> jadi kesimpulannya Lazy Loading akan menjalakan query pertama, misal select TblUserMysql, dn jika ingin dapatkan nilai Tbldatas maka akan menjalankan query ke-2 "$data->Tbldatas" dan seterusnya..</b><br />
<b class="txtAtt">kekurangan : low performance(but it depends how complex your db schema is (how many joins you need) or type/size of the redundant data of the single query.)</b></div>

<li> <b class="badge">Eager Loading (load all data at once in a single query)</b></li>
<b class="txtHead2">properti author dalam setiap instance Post sudah diisi dengan instance User terkait sebelum kita mengakses properti/nilai nya sudah lngsung di join dengan mengunakan <b class="txtHead">"with"</b>  </b>
<div style="float:left; width:600px">
<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP', 'tabSize'=>1));  ?> 
//---basic
$posts=Post::model()->with('author','categories')->findAll();
---atau--
jika ingin costum opsi, misal:
$posts = Post::model()->with(array('comments'=>array('together'=>false)))->findAll();

//--------dgn cara nested
$posts=Post::model()->with(
    'author.profile',
    'author.posts',
    'categories')->findAll();
//----atau
$posts=Post::model()->findAll(array(
    'with'=>array(
        'author.profile',
        'author.posts',
        'categories',
    )
));
<?php $this->endWidget(); ?>
</div>
<div style="float:left; width:450px">
<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP', 'tabSize'=>1));  ?> 
//--------dengan CDbCriteria::with
$criteria=new CDbCriteria;
$criteria->with=array(
    'author.profile',
    'author.posts',
    'categories',
);
$posts=Post::model()->findAll($criteria);

<?php $this->endWidget(); ?>
</div> <div style="clear:both"></div>

<li><b class="txtHead">Compare</b></li>
  
<div class="scroll" style="float:left; width:500px"><b class="txtHead">LAZY LOADING</b><br />
  	<b class="txtKet">$ar2 = TblUserMysql::model()->findAll();</b>
  	<?php
			//$ar2 = TblUserMysql::model()->findByPk(1);
				$ar2 = TblUserMysql::model()->findAll();
		?>
    <div class="tpanel"> <!--- load model ------->
			<b class="toggle btn" style="float:right"><?php echo Yii::t('ui','Result Foreach'); ?></b>
			<div class="view2">
				<?php 
				//foreach($ar2 as $key=>$value) {  echo $key."&nbsp;,"; } 
				//**foreach($ar2 as $key=>$value) {  echo $value."&nbsp;,"; } echo"<br>";
				//**foreach($ar2->TblDatas as $key=>$value) {  echo $value."&nbsp;,"; }
				foreach($ar2 as $key=>$value) {  print_r($value->attributes);echo"<br>";} 
				//**foreach($ar2 as $key=>$value) {  print_r($value->TblDatas["ket"]); echo"<br>"; }
				?>
   	 	</div>
		</div>
		<pre class="view2"><?php print_r($ar2); ?></pre>
</div>
  
<div class="scroll" style="float:left; width:500px"><b class="txtHead">EAGER LOADING</b><br />
		<b class="txtKet">$ar1 = TblUserMysql::model()->with('TblDatas')->findAll();</b>
    
		<?php $ar1 = TblUserMysql::model()->with('TblDatas')->findAll(); ?>
	 	<div class="tpanel"> <!--- load model ------->
			<b class="toggle btn" style="float:right"><?php echo Yii::t('ui','Result Foreach'); ?></b>
			<div class="view2">
				<?php
				//foreach($ar1 as $key=>$value) {  echo $key."&nbsp;,"; } 
				foreach($ar1 as $key=>$value) {  print_r($value->attributes);echo"<br>";} 
				//**foreach($ar1 as $key=>$value) {  print_r($value->TblDatas); echo"<br>"; }
				//foreach($ar1 as $key=>$value) {  print_r($value->TblDatas2->TblPics2); }
				?>
   	 	</div>
		</div>
	<pre class="view2"><?php print_r($ar1); ?></pre>
</div>	
<div style="clear:both"></div>
  
<div class="ket"> 
<b class="badge">SAMPLE :</b>
<ul>
<li><b class="txtHead">lazy loading approach</b></li>
<ul>
<li type="a"><b class="txtKet">$user=TbluserMysql::model()->findByPk(1);</b></li>
<?php $user=TbluserMysql::model()->findByPk(1); //print_r($user->username); ?>
Result : <b class="txtKet">foreach($user as $key=>$value) { echo $value."&nbsp;,"; }</b> <?php	foreach($user as $key=>$value) { echo $value."&nbsp;,"; } ?>
<br />

<li type="a"><b class="txtKet">$userData=$user->TblDatas;	</b></li>
<?php $userData=$user->TblDatas;	print_r($userData); ?>
Result : <b class="txtKet">foreach($userData as $key=>$value) { echo $value."&nbsp;,"; }</b>
<?php //foreach($userData as $key) { echo $value."&nbsp;,"; }
	// atau.. foreach($user->TblDatas as $key=>$value) { echo $value; }
?>
<br />

<li type="a"><b class="txtKet">foreach($user->TblPics as $key=>$value) { echo $value."&nbsp;,"; }</b></li>
Result :<br />
<?php 
	//$userPic=$user->TblPics;	//atau;
	// foreach($user->TblPics as $key=>$value) { echo $value."&nbsp;,"; }
?><br />

<li type="a"><b class="txtKet">foreach($user->PicsComment as $key=>$value) { echo $value."&nbsp;,"; }</b></li>
Result :
<?php //foreach($user->PicsComment as $key=>$value) { echo $value."&nbsp;,"; } ?><br />	

<li type="a"><b class="txtKet">foreach($user->Logs as $key=>$value) { echo $value."&nbsp;,"; }</b></li>
Result :
<?php //foreach($user->Logs as $key=>$value) { echo $value."&nbsp;,"; } ?><br />	
<br />
<!--<div class="view2"><?php //print_r($user); ?></div>-->

<?php echo CHtml::link('More sample', array('testDb/ar_relational_sample', 'view'=>'ar_relational_sample'), array('target'=>'_blank')); ?>
</ul>
</div>

<li><span class="badge">3. Melakukan query relasional tanpa mengambil model bersangkutan</span>
<b class="txtHead2">Terkadang kita perlu melakukan query dengan menggunakan relasi tetapi tidak ingin <br>mengambil model bersangkutan. Misalnya, kita memiliki User yang memposting beberapa Post. Post dapat dipublikasi tetapi juga dapat dalam status draft.<br> Status ini ditentukan oleh field published pada model post. Sekarang kita ingin mengambil semua user yang telah mempublikasikan post dan kita sendiri tidak tertarik <br>pada post-post mereka. Maka, kita dapat mengambilnya dengan cara demikian:<b><br>

<div class="ket">
<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP', 'tabSize'=>1));  ?> 
$users=User::model()->with(array(
    'posts'=>array(
        //kita tidak ingin men-select post
        'select'=>false,
        // tetapi hanya ingin mengambil user yang telah publikasi post
        'joinType'=>'INNER JOIN',
        'condition'=>'posts.published=1',
        'order'=>'posts.create_time ASC' //menimpa param order secara dinamis
    ),
))->findAll();
<?php $this->endWidget(); ?>

<?php
$users=TblUserMysql::model()->with(array(
    'TblDatas'=>array(
        //kita tidak ingin men-select Tbldatas
        'select'=>false,
        // tetapi hanya ingin mengambil user yang telah publikasi post
        'joinType'=>'INNER JOIN',
        'condition'=>'TblDatas.propic_id <>"" ',
    ),
))->findAll();
?>
<b class="txtKet">foreach($users as $key=>$value) { print_r($value->attributes); }</b>
<?php foreach($users as $key=>$value) { print_r($value->attributes); echo"<br>"; } ?><br /><br />	

<b class="txtKet">foreach($users as $key=>$value) { print_r($value->TblDatas->attributes); }</b>
<?php foreach($users as $key=>$value) { print_r($value->TblDatas->attributes); echo"<br>"; } ?><br />	
</div>
</ul>
</div>

<div class="view2"> <b class="badge">Query Relasional dengan Named Scope</b>
<ul>
<b class="txtHead2">Query relasional juga dapat dilakukan dengan kombinasi named scope. Named scope pada tabel relasional datang dengan dua bentuk. Dalam bentuk pertama, <br>named scope diterapkan ke model utama. Dalam bentuk kedua, named scope diterapkan ke model terkait.</b>

<div class="ket">
<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP', 'tabSize'=>1));  ?> 
$posts=Post::model()->published()->recently()->with('comments')->findAll();
$posts=Post::model()->with('comments:recently:approved')->findAll();

// atau kalau mulai dari 1.1.7
$posts=Post::model()->with(array(
    'comments'=>array(
        'scopes'=>array('recently','approved')
    ),
))->findAll();
// or semenjak 1.1.7
$posts=Post::model()->findAll(array(
    'with'=>array(
        'comments'=>array(
            'scopes'=>array('recently','approved')
        ),
    ),
));

//dalam opsi with pada aturan relasional yang dideklarasikan dalam "CActiveRecord::relations()"
public function relations()
    {
        return array(
            'posts'=>array(self::HAS_MANY, 'Post', 'author_id',
                'with'=>'comments:approved'),
        );
    }
<?php $this->endWidget(); ?> 
</div>
</ul>
</div>

<div class="view2"> <b class="badge">Opsi Query Relasional</b>
<ul>
    <li><b class="txtKet">select :</b></li> daftar kolom yang dipilih untuk kelas AR terkait. Standarnya adalah '*', yang artinya semua kolom. Nama-nama kolom yang direferensi dalam opsi ini tidak boleh ambigu.
    <li><b class="txtKet">condition :</b></li> klausul WHERE. Default-nya kosong. Nama kolom yang direferensikan di opsi ini juga tidak boleh ambigu.
    <li><b class="txtKet">params :</b></li> parameter yang diikat ke pernyataan SQL yang dibuat. Ini harus berupa array (larik) pasangan name-value.
    <li><b class="txtKet">on :</b></li> klausul ON. Kondisi yang ditetapkan di sini akan ditambahkan ke kondisi penggabungan menggunakan operator AND. Nama kolom direferensikan dalam opsi ini tidak boleh ambigu. Opsi ini tidak berlaku pada relasi MANY_MANY.
    <li><b class="txtKet">order :</b></li> klausul ORDER BY. Default-nya kosong. Nama kolom yang digunakan di sini tidak boleh ambigu.
    <li><b class="txtKet">with :</b></li> daftar dari child (turunan) objek terkait yang harus diambil bersama dengan objek ini. Harap berhati-hati, salah menggunakan opsi ini akan mengakibatkan pengulangan tanpa akhir.
    <li><b class="txtKet">joinType :</b></li> jenis gabungan untuk relasi ini. Standarnya LEFT OUTER JOIN.
    <li><b class="txtKet">alias :</b></li> alias untuk tabel terkait dengan hubungan ini. Default-nya null, yang berarti alias tabel sama dengan nama relasi.
    <li><b class="txtKet">together :</b></li> menentukan apakah tabel yang terkait dengan hubungan ini harus dipaksa untuk bergabung bersama dengan tabel primer dan tabel lainnya. Opsi ini hanya berarti untuk relasi HAS_MANY dan MANY_MANY. Jika opsi ini disetel false, setiap relasi yang berelasi HAS_MANY atau MANY_MANY akan digabungkan dengan tabel utama dalam query SQL yang terpisah, yang artinya dapat meningkatkan performa keseluruhan karena duplikasi pada data yang dihasilkan akan lebih sedikit. Jika opsi ini di-set true, maka tabel yang diasosiasi akan selalu di-join dengan tabel primer dalam satu query, walaupun jika tabel primer tersebut terpaginasi (paginated). Jika opsi ini tidak di-set, maka tabel yang terasosiasi akan di-join dengan tabel primer ke dalam query SQL tunggal hanya ketika tabel primer tidak terpaginasi. Untuk info selengkapnya, silahkan melihat bagian "Relational Query Performance".

    <li><b class="txtKet">join :</b></li> klausul JOIN ekstra. Secara default kosong. Opsi ini sudah ada semenjak versi 1.1.3
    <li><b class="txtKet">group :</b></li> klausul GROUP BY. Default-nya kosong. Nama kolom yang direferensi ke dalam opsi ini tidak boleh ambigu.
    <li><b class="txtKet">having :</b></li> klausul HAVING. Default-nya kosong. Nama kolom yang direferensi dalam opsi tidak boleh ambigu.
    <li><b class="txtKet">index :</b></li> nama kolom yang nilainya harus dipakai sebagai key (kunci) array yang menyimpan obyek terkait. Tanpa menyetel opsi ini, array obyek terkait akan menggunakan indeks integer berbasis-nol. Opsi ini hanya bisa disetel untuk relasi HAS_MANY dan MANY_MANY.
    <li><b class="txtKet">scopes :</b></li> nama scope yang ingin diaplikasikan. Jika ingin satu scope dapat digunakan seperti 'scopes'=>'scopeName'. Dan jika lebih dari satu scope maka dapat digunakan seperti 'scopes'=>array('scopeName1','scopeName2'). Opsi ini sudah ada mulai dari versi 1.1.9.

<br /><b class="txtHead"> Sebagai tambahan, opsi berikut tersedia untuk relasi tertentu selama lazy loading: </b>

   <li><b class="txtKet">limit :</b></li> batas baris yang dipilih. Opsi ini TIDAK berlaku pada relasi BELONGS_TO.
    <li><b class="txtKet">offset :</b></li> offset baris yang dipilih. opsi ini TIDAK berlaku pada relasi BELONGS_TO.
    <li><b class="txtKet">through :</b></li> Nama dari relasi model yang digunakan sebagai penghubung ketika mengambil data relasi.
</ul>
</div>
