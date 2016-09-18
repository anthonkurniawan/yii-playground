<style>.container{width:1100px;}</style>

<?php $this->layout='column2'; ?>
<?php $this->renderPartial('_menu'); ?>
<?php
$this->pageTitle=' - Page Caching'; 
$this->breadcrumbs=array('Cache',);
?>

<h1><small> Caching Page (Penembolokan Halaman)</small> </h1>
<a href="http://www.yiiframework.com/doc/guide/1.1/id/caching.page" target="_blank" style="float:right"> Caching Page </a>
<div class="view2">
Penembolokan halaman merujuk pada caching isi seluruh halaman. Penembolokan halaman bisa terjadi di berbagai tempat. Misalnya, dengan memilih tajuk halaman(page header) yang sesuai, penjelajah klien(client browser) mungkin menembolok halaman yang sedang dilihat untuk jangka waktu tertentu. Aplikasi Web sendiri juga dapat menyimpan isi halaman dalam cache.<br><br>

caching halaman tidak akan berfungsi jika kita hanya memanggil <code>beginCache()</code> dan <code>endCache()</code> dalam layout. Alasannya dikarenakan layout diterapkan dalam metode <code>CController::render()</code> SETELAH tampilan konten dievaluasi.<br><br>

Untuk menembolok seluruh halaman, kita harus melewatkan eksekusi aksi penghasil isi halaman. Kita bisa menggunakan <code>COutputCache</code> sebagai aksi filter untuk menyelesaikan tugas ini.<br><br>
<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP', 'lineNumberStyle'=>'table', 'showLineNumbers'=>1, )); ?>
#set at Controller
public function filters()
{
    return array(
        array(
			'COutputCache + PageCache',	//hanya cache pada action PageCache
            'duration'=>100,
            'varyByParam'=>array('id'),
        ),
    );
}
<?php $this->endWidget(); ?>
<div class="view">
<b class="badge">Tip: </b>Kita dapat menggunakan <code>COutputCache</code> sebagai filter karena kelas tersebut diturunkan dari <code>CFilterWidget</code>, yang artinya <code>COutputCache</code> dapat berupa widget dan juga filter. Sebenarnya, cara kerja widget mirip dengan filter: widget (filter) dimulai sebelum isi yang dilampirkan (aksi) dievaluasi, dan widget (filter) berakhir setelah isi yang dilampirkan (aksi) dievaluasi.</div>
</div>

<div class="tpanel view2"> 
	<div class="toggle btn" style="float:right"><?php echo Yii::t('ui','View app()->controller'); ?></div>
	<?php dump(Yii::app()->controller); ?>
</div>

<div class="view2"> 
<b class="badge">Caching Dynamic Content </b><br>
<a href="http://www.yiiframework.com/doc/guide/1.1/id/caching.dynamic" target="_blank" style="float:right"> Caching Dynamic Content </a><br>
<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP', 'lineNumberStyle'=>'table', 'showLineNumbers'=>1, )); ?>
...konten HTML lain...
if($this->beginCache($id)) { 
	...konten fragmen yang ditembolok...
	$this->renderDynamic($callback); 
		...konten fragmen yang ditembolok...	//bagian yang di render dynamic
$this->endCache(); } 
...konten HTML lain...
<?php $this->endWidget(); ?>
<ul>
<li><code>$callback</code> bisa berupa string yang merujuk ke nama metode dalam kelas controller saat ini atau fungsi global. </li>
<li><code>$callback</code> juga bisa berupa array yang merujuk ke metode kelas.</li> 
<li>Setiap parameter tambahan pada <code>renderDynamic()</code> akan dioper ke callback.</li>
<li>Callback harus mengembalikan/<code>return</code> konten dinamis daripada menampilkannya.</li>
</ul>
</div>