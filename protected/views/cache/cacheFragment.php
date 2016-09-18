<style>.container{width:1100px;}</style>

<?php $this->layout='column2'; ?>
<?php $this->pageTitle='Cache Fragment'; ?>

<?php $this->renderPartial('_menu'); ?>

<h1><small> Caching Fragment</small> </h1>
<a href="http://www.yiiframework.com/doc/guide/1.1/id/caching.fragment" target="_blank" style="float:right"> Caching Fragment </a>
<div class="view2">
Caching fragmen merujuk pada melakukan caching pada sebuah bagian halaman. Sebagai contoh, jika halaman menampilkan ringkasan penjualan tahunan berbentuk tabel, 
kita dapat menyimpan tabel ini pada cache guna mengeliminasi waktu yang dibutuhkan dalam membuatnya untuk setiap permintaan. <br><br>

Untuk menggunakan caching fragmen, kita memanggil <code>CController::beginCache()</code> dan <code>CController::endCache()</code> 
dalam skrip dalam <code>controller</code> atau <code>view</code>.  see <a href="http://localhost/yiidoc/COutputCache.html" target="_blank"> COutputCache </a>

<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP', 'lineNumberStyle'=>'table', 'showLineNumbers'=>1, )); ?>
 #kalo ga di set durasi=60, #Jika nilai durasi dalam bentuk negatif, cache akan di-disable
if($this->beginCache($id, array('duration'=>3600))) {
...konten yang di-cache...
$this->endCache(); } 
...konten HTML lain...
<?php $this->endWidget(); ?>
Dalam contoh di atas, jika beginCache() mengembalikan false, konten yang di-cache akan disisipkan secara otomatis; sebaliknya, konten di dalam pernyataan-if yang akan dijalankan dan di-cache saat endCache() dipanggil.
</div>

<div class="view2">
<b class="badge">Sample pada View</b><br>
	<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
	<?php $id = 'id2'; ?>
	<?php if($this->beginCache($id)) { ?>
		<h1>...konten yang di-cache pada view ... with id = <?=$id; ?></h1>
	<?php $this->endCache(); } ?>		
		<h1>...konten HTML lain...</h1>
	
	<code>$this->getCacheKey();</code> <?php //$this->getCacheKey('id2'); ?>
	<code>$this->getCache('id2');</code> <?php $this->getCache('id2'); ?>
	<code>$this->getCache('id2');</code> <?php $this->getCache('id2'); ?>
	
	<?php Yii::app()->sc->collect('html', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
	<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>
</div>

<div class="tpanel view2"> 
	<b class="badge">Sample pada Controller (cache/get_fragment)</b><br>
	<div class="toggle btn" style="float:right"><?php echo Yii::t('ui','View Sample at Cotroller'); ?></div>
	<div>
		<?php echo CHtml::ajaxButton('Sample', array('cache/get_fragment'), array('update'=>'#sample_fragment') ); ?>
		<div id="sample_fragment"></div>
	</div>
</div>

<div class="view2">
<b class="badge">Cache dependency</b><br>
bisa berupa obyek yang mengimplementasi <a href="http://localhost/yiidoc/ICacheDependency.html" target="_blank">ICacheDependency</a> atau array konfigurasi yang dapat dipakai guna menghasilkan obyek dependensi.

<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP', 'lineNumberStyle'=>'table', 'showLineNumbers'=>1, )); ?>
#Contoh : with dependency "lastModified"
...konten HTML lain...
if($this->beginCache($id, array('dependency'=>array(
		//'class'=>'CDbCacheDependency',
        'class'=>'system.caching.dependencies.CDbCacheDependency',
        'sql'=>'SELECT MAX(lastModified) FROM Post')))) { ?>
...konten yang ditembolokan...
$this->endCache(); } 
...konten HTML lain...
<?php $this->endWidget(); ?>
</div>


<div class="view2">
Kadang-kadang, perlu untuk mematikan output caching hanya untuk jenis permintaan tertentu. <br>
Sebagai contoh, kita hanya ingin cache <code>form</code> saat awal ia diminta, setiap tampilan selanjutnya terhadap formulir tidak harus di-cache karena mengandung input pengguna. We can set requestTypes to be array('GET') to accomplish this task.
<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP', 'lineNumberStyle'=>'table', 'showLineNumbers'=>1, )); ?>
if($this->beginCache($id, array('requestTypes'=>array('GET')))) {
	//...konten yang di-cache...
$this->endCache(); } 
<?php $this->endWidget(); ?>

<b class="badge">Variations</b><br>
The content fetched from cache may be variated with respect to some parameters. COutputCache supports four kinds of variations: 
<ul>
	<li>requestTypes :</li> list of request types (e.g. GET, POST) for which the cache should be enabled only. Defaults to null, meaning all request types.
    <li><b>varyByRoute: </b></li>dengan menyetel opsi ini menjadi true, konten yang di-cache kan divariasikan berdasarkan rute. Oleh karena itu, setiap kombinasi controller dan aksi yang diminta akan memiliki konten di-cache terpisah. #Defaults to true.
    <li><b>varyBySession: </b></li>dengan menyetel opsi ini menjadi true, kita bisa membuat konten di-cache divariasikan berdasarkan ID sesi. Oleh karena itu, setiap sesi pengguna dapat melihat konten secara berbeda dan semuanya dilayani dari cache. #Defaults to false.
    <li><b>varyByParam: </b></li>dengan menyetel opsi ini menjadi array nama, kita dapat membuat konten ditembolok divariasikan berdasarkan nilai yang ditetapkan parameter GET. Sebagai contoh, jika halaman menampilkan konten tulisan berdasarkan parameter GET id, kita bisa menetapkan varyByParam menjadi array('id') dengan demikian kita dapat men-cache konten untuk setiap tulisan. Tanpa variasi seperti ini, kita hanya bisa men-cache satu tulisan.
    <li><b>varyByExpression: </b></li>dengan menyetel opsi ini menjadi ekspresi PHP, kita dapat membuat isi cache bervariasi sesuai dengan hasil ekspresi PHP.
</ul>
</div>

<div class="view2">
<b class="badge">Nested Caching</b><br>
Men-Cache frament luar juga fragment di dalam-nya. misal: komentar2
<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP', 'lineNumberStyle'=>'table', 'showLineNumbers'=>1, )); ?>
...konten HTML lain...
 if($this->beginCache($id1)) { 
	...konten lebih luar di-cache...
     if($this->beginCache($id2)) { 
		...konten lebih dalam di-cache...
     $this->endCache(); } 
	...konten lebih luar di-cache...
 $this->endCache(); } 
...konten HTML lain...
<?php $this->endWidget();  ?>
Opsi cache yang berbeda dapat disetel untuk pengulangan caching. Sebagai contoh, 
<ul>
<li>cache yang lebih dalam dan cache yang lebih luar dalam contoh di atas dapat disetel dengan nilai durasi yang berbeda. </li>
<li>Saat data di-cache masuk cache yang lebih luar tidak valid, cache yang lebih dalam yang masih bisa menyediakan fragmen dalam yang valid. </li>
<li>Akan tetapi, tidak dapat dilakukan sebaliknya. Jika cache yang luar berisi data yang benar, maka akan selalu menyediakan duplikat yang di-cache, meskipun konten cache yang dalam sudah kadaluarsa.</li>
</ul>

<div class="view">
<b>user contributions : </b>Caching parent and child<br><br>
The statement about caching parent and child can be a bit hard to understand. I know I read the phrase 4 times..
To sum it up. If your child cache expires, make sure your parent cache expires as well.
<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP', 'lineNumberStyle'=>'table', 'showLineNumbers'=>1, )); ?>
if(parent.isCached) {
	getCache();	//your child cache is in this cache. it does not get reloaded even if it expires
}

#on the other hand
if(!parent.isCached)
{
    createCache() //will pass through the content 
    //-> find the child cache and 
    if(child.isCached)
        getCache()
    else
        createCache()
}
//so if your parent expires, your child may still be cached in which case only the parent is reloaded.
//if your child expires, make sure your parent expires if you want the child reloaded. 
//or it will reload the child from the parent cache even if the child has expired.
<?php $this->endWidget();  ?>
</div>
</div>