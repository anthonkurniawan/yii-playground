
<a href="http://www.yiiframework.com/doc/guide/1.1/id/database.migration" target="_blank" style="float:right">Database Migration</a>
<div class="view2">
struktur database selalu berkembang seiring kita mengembangkan dan merawat aplikasi database-driven. Misalnya, ketika saat pengembangan, kita ingin menambah sebuah tabel baru, atau setelah aplikasi sudah rampung, kita mungkin menyadari perlu menambah sebuah indeks pada sebuah kolom. Sangatlah penting untuk selalu menjaga track dari perubahan strutktural database ini (yang disebut dengan migration (migrasi) seperti halnya yang kita lakukan pada source code. <br><br>
Yii menyediakan fungsi migrasi database yang bisa menjaga histori migrasi database, mengaplikasikan migrasi baru ataupun mengembalikannya.<br><br>

yiic migrate create <name>
</div>

<div class="view2">
<b class="badge">Installasi </b><br>
<code> dalam migrasi menggunakan console php. ( config pada php.ini dalam console pastikan mendukung php_pdo ext </code><br>
<code> configurasi db connection pada config/console.php</code>
</div>

<pre>
D:\web\yiiProject\Yii-login\protected>yiic help migrate
USAGE
  <code>yiic migrate [action] [parameter]</code>

<b class="badge">DESCRIPTION</b>
  This command provides support for database migrations. 
  The optional <code>action</code> parameter specifies which specific migration task to perform.
  It can take these values: 
  <code>create</code>, <code>up</code>, <code>down</code>, <code>to</code>, <code>history</code>, <code>new</code>, <code>mark</code>. ( If the <code>action</code> parameter is not given, it defaults to <code>up</code> )

</pre>

<b class="badge">EXAMPLES</b>
<ul>
 <li><code> yiic migrate</code>  Applies ALL new migrations. This is equivalent to <code>yiic migrate up</code>. </li>
 <li><code> yiic migrate create create_new_table</code>  Creates a new migration named <code>create_user_table</code>.</li>
 <li><code> yiic migrate up 3</code>   Applies the next 3 new migrations.</li>mengaplikasikan 3 migrasi baru. Dengan mengubah nilai 3 akan mengubah jumlah migrasi yang diaplikasikan.
 <li><code> yiic migrate down</code>  Reverts(kembalikan ke semula) the last applied migration. <br><br>
	Method <code>up()</code> harus mengandung code yang mengimplementasikan migrasi database aktual. (cth : craete table test )
	<br>method <code>down()</code> bisa berisi code yang me-revert apa yang telah dilakukan up().  (cth : drop table test ) </li><br>
 <li><code> yiic migrate down 3</code>  Reverts(kembalikan ke semula) the last 3 applied migrations. (revert 3 migration)</li>
 <li><code> yiic migrate to 101129_185401</code>  Migrates up or down to version <code>101129_185401</code> (time_stamp).</li>
 <li><code> yiic migrate mark 101129_185401</code>  Modifies the migration history up or down to version<code>101129_185401</code>.
   No actual migration will be performed.</li>
 <li><code> yiic migrate history</code>   Shows all previously applied migration information.</li>
 <li><code> yiic migrate history 10</code>  Shows the last 10 applied migrations.</li>
 <li><code> yiic migrate new</code>  Shows all new migrations.</li>
 <li><code> yiic migrate new 10</code> Shows the next 10 migrations that have not been applied.</li>
 <li><code> yiic migrate redo [step]</code>  Mengulangi Migrasi</li> maksudnya melakukan revert kemudian mengaplikasikan migrasi tertentu. 
 dengan parameter opsional <code>step</code> menunjukkan berapa banyak migrasi yang ingin diulangi. Nilai default-nya 1, yang artinya mengulangi migrasi terakhir.
 
 </ul>
 
<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP', 'lineNumberStyle'=>'table')); ?>
 #Contoh :
1. yiic migrate create test
2. will produce "m130316_140540_test.php" in folder migration/
#edit sesuai kebutuhan
class m130316_140540_test extends CDbMigration
{
    public function up()		# if wanna DB transaction support  "safeUp()"	
    {	#create table test
        $this->createTable('tbl_test', array(
            'id' => 'pk',
            'title' => 'string NOT NULL',
            'content' => 'text',
        ));
    }
 
    public function down()		# if wanna DB transaction support "safeDown() "
    {
        $this->dropTable('tbl_test');
    }
	
	#To use plan SQL in migrations, you can do something like this:
	// public function up() {
		// Yii::app()->db->createCommand('alter table example add column email varchar(255);')->execute();
	// }
	
	#Changing column to be primary key
	#To create primary key, when table is already existing and don't have already PK defined, call following statemet:
	#where "type" is a column type, e.g. string, int, etc.
	$this->alterColumn('{{table_name}}','column_name','type PRIMARY KEY');
}

#untuk meng-aplikasikan ke dalam DB, "yiic migrate akan mencari berdasarkan waktu yg terkini. 
sesuai dengan nama file yg baru saja di buat dgn format "time.nama file.php"
Option : yiic migrate [action] [parameter]  (jika parameter tdk di set maka default adalah "up"
3. "yiic migrate" atau sama dengan "yiic migrate up" (akan menjalankan file pada fungsi "up()" )

4. yiic migrate down ( akan menjalankan file pada fungsi "down()" )

#update struktur DB
1. buat migrate create yang baru dan tambahkan fungsi "up()" sesui kebutuhan
2. saat di jalankan "yii migrate otomatis akan melihat/mnjalankan file baru yg baru di create"
-->
<?php $this->endWidget(); ?>
 
 CDbMigration::insert 
 
<div class="view2">
<b class="badge">Transactional Migrations</b><br>
Ketika melakukan migrasi DB yang kompleks, kita umumnya ingin memastikan apakah setiap migrasi cukup berhasil <br>
atau gagal sebagai kesatuan sehingga perawatan database bisa tetap konsisten dan integritas.<br><br>

Ketika Yii melakukan migrasi, maka Yii akan memulai DB transaction dan memanggil <code>safeUp()</code> atau <code>safeDown()</code>. 
Jika terdapat error <br>DB yang terjadi di <code>safeUp()</code> atau <code>safeDown()</code>, maka transaksi akan di-rollback, sehingga memastikan database tetap dalam keadaan baik.<br><br>

<b class="txtAtt">Catatan:</b> Tidak semua DBMS mendukung transaction. Dan beberapa query DB tidak dapat dimasukkan ke transaction. <br>
Dalam hal ini, Anda tetap harus mengimplementasikan <code>up()</code> dan <code>down()</code>. Untuk MySQL, beberapa statement bisa menyebabkan implicit commit.

<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP', 'lineNumberStyle'=>'table')); ?>
class m130316_140540_test extends CDbMigration
{
   public function up()	
    {
        $transaction=$this->getDbConnection()->beginTransaction();
        try
        {
            $this->createTable('tbl_news', array(
                'id' => 'pk',
                'title' => 'string NOT NULL',
                'content' => 'text',
            ));
            $transaction->commit();
        }
        catch(Exception $e)
        {
            echo "Exception: ".$e->getMessage()."\n";
            $transaction->rollBack();
            return false;
        }
    }
 
    // ...similar code for down()		
}
<?php $this->endWidget(); ?>
</div>

<div class="view2">
<b class="badge">Mengkustomisasi Perintah Migrasi</b><br>
<b>Opsi Command Line</b><br>

Perintah migrasi datang dari empat opsi yang dapaat ditentukan di command line:<br>
<ul>
    <li><b>interactive: boolean,</b></li> menentukan apakah migrasi dilakukan dengan cara interaktif. Secara default bernilai true, yang artinya user akan ditanya <br>terlebih dahulu ketika melakukan migrasi tertentu. Anda dapat set nilainya menjadi false sehingga migrasi dapat dilakukan di belakang layar.
    <li><b>migrationPath: string,</b></li> menentukan direktori yang menampung seluruh file kelas migrasi. Harus diisi dengan bentuk path alias, <br>dan direktori bersangkutan harus ada. Jika tidak ditentukan, maka akan digunakan sub-direktori migrations di dalam base path aplikasi.
    <li><b>migrationTable: string,</b></li> menentukan nama tabel database yang digunakan untuk menyimpan informasi histori migrasi. Secara default bernilai tbl_migration. <br>Struktur tabelnya yakni version varchar(255) primary key, apply_time integer.
    <li><b>connectionID: string,</b> menentukan ID pada komponen database aplikasi. Nilai default adala 'db'.</li>
    <li><b>templateFile: string,</b></li> menentukan jalur ke file yang ditunjukkan sebagai template code untuk men-generate kelas migrasi. Harus diisi dalam format path alias<br> (misalnya application.migrations.template). Jika tidak diisi, maka template internal yang akan digunakan. Di dalam template, token {ClassName} akan digantikan oleh nama kelas migrasi yang sesungguhnya.
</ul>

 <b>Snytax :</b> <code>yiic migrate up --option1=value1 --option2=value2 ...</code><br>
 <b>Sample :</b> <code>yiic migrate up --migrationPath=ext.forum.migrations</code><br>
 Misalnya kita ingin migrasi module forum yang file-file migrasinya terletak di direktori module migrations
</div>

<div class="view2">
<b class="badge">Mengatur Perintah Secara Global</b><br>
Opsi command line memungkinkan kita melakukan konfiguras secara on-the-fly, namun kadangkala kita mungkin ingin mengatur command untuk selamanya. <br>Misalnya :<br> kita ingin menggunakan tabel yang berbeda untuk menyimpan histori migrasi,<br> atau kita ingin menggunakan sebuah template migrasi yang sudah kita desain.<br> Kita dapat melakukannya dengan mengubah <code>konfigurasi console</code> aplikasi dengan begini,
<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP', 'lineNumberStyle'=>'table')); ?>
#pada console.php
return array(
    ......
    'commandMap'=>array(
        'migrate'=>array(
            'class'=>'system.cli.commands.MigrateCommand',
            'migrationPath'=>'application.migrations',
            'migrationTable'=>'tbl_migration',
            'connectionID'=>'db',
            'templateFile'=>'application.migrations.template',
        ),
        ......
    ),
    ......
);
//Sekarang jika kita jalankan perintah migrate, konfigurasi di atas akan berefek tanpa kita harus menulis perintah opsi setiap saat lagi.
<?php $this->endWidget(); ?>
</div>

