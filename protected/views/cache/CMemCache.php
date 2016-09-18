<style>.container{width:1100px;}</style>

<?php $this->layout='column2'; ?>

<?php $this->pageTitle='CMemCache'; ?>

<?php $this->breadcrumbs=array( 'Test Form'=>array('index'), 'CACHE',);?>
<?php $this->renderPartial('_menu'); ?>

 <div class="tpanel">
	<span class="toggle btn btn-sm btn-primary"><?php echo Yii::t('ui','Load array CACHE'); ?></span>
	<pre class="txtSmall scroll_custom" style="height:200px; width:600px">
<?php print_r(Yii::app()->cache); ?>
    </pre>
</div>

<div class="flash-success"> <?php echo $status; ?> </div>

<?php //echo CHtml::beginForm(); ?>
<?php echo CHtml::form('','post',array('enctype'=>'multipart/form-data')); ?>

<div class="myBox">
<span class="badge badge-inverse">Pair Cache Test</span> <br>
Key : <?php echo CHtml::textField( 'p_key', $p_key  ); ?> &nbsp;
Value : <?php echo CHtml::textField( 'p_val', $p_val, array('size'=>80)  ); ?>
<?php echo CHtml::submitButton('Save Cache', array('name'=>'save_p_cache')); ?>
</div>

<div class="myBox">
<div class="left">
<span class="badge badge-inverse">File Cache Test</span> <br>
Open File : <?php echo CHtml::fileField('file', "", array('onChange'=>'this.form.submit()' ) ); ?><br>
File Name : <?php echo CHtml::textField( 'filename', $filename  ); ?> <br>
</div>
<div class="left">
<?php echo CHtml::textArea( 'filetxt', $data , array('rows'=>'5', 'cols'=>'65') ); ?><br>
<?php echo CHtml::submitButton('Save to File', array('name'=>'saveFile', 'style'=>'margin-right:30px')); ?>
Key :<?php echo CHtml::textField( 'key_file', $key, array('size'=>5)  ); ?>
<?php echo CHtml::Button('Save to Cache', array('type'=>'submit', 'name'=>'saveCache') ); ?>
</div> 
<div class="clear"></div>
</div>


<div class="view2">
<h2>Load Data Cache</h2>
Key :<?php echo CHtml::textField( 'key_load', $key  ); ?>
<?php echo CHtml::submitButton('Load Cache',	array('name'=>'loadCache')); ?>

<?php echo CHtml::endForm(); ?>

<div class="cmd_line">
	<?php echo $cached; ?>
</div>
</div>

<div class="scroll"><?php dump(Yii::app()->cache); ?></div>


<div class="view2">
<?php
$id = 'id1';
$value ='value1 view CMemCache';

Yii::app()->cache->set($id, $value);
$result = Yii::app()->cache->get($id); 			
?>
#test : <code>Yii::app()->cache->get($id);</code> = <?php //dump($result); ?> <br>

<FORM method="post" action="">
key : <INPUT name="key" type="text" value="<?= isset($_POST['key']) ? $_POST['key']  : null ;?>">
value : <INPUT name="val" type="text" value="<?= isset($_POST['val']) ? $_POST['val']  : null ;?>">
<button type="submit">Query</button>
</FORM>

<?php
function getCache($key) {				echo "<b>GET CACHE key--></b>".$key ."<br>";
        //return ($memcache) ? $memcache->get($key) : false;
		return Yii::app()->cache->get($key);
    }
	
function setCache($key, $value) {				echo "<b>SET CACHE key--></b>".$key ."<br>";
        //return ($memcache) ? $memcache->get($key) : false;
		return Yii::app()->cache->set($key, $value, $timeout=0 );
    }
	
// if(isset($_POST['key'])) 
// {																	echo "<p>Request ID :". $_POST['key']."<br>";
	// //$sql = "SELECT * FROM product WHERE productID=1";
	// // $sql = "SELECT * FROM product WHERE productID =$_POST[id]";
	// // $data=mysql_query_cache2($sql);										echo "<h1>Result :</h1><pre>"; print_r( $data); echo"</pre>";
	
	// // Yii::app()->cache->set($id, $_POST['id'] );
	// // $result = Yii::app()->cache->get($id); 	
	
																				// //echo "Request ID :". Yii::app()->cache->get( $_POST['key'] );
																				// //if( Yii::app()->cache->get( $_POST['key']) !=null ) 		//{ echo "ada"; } else { echo "ga ada"; }
																			// if( $result = getCache(  $_POST['key'] ) )
																					// echo $result;
																			// else
																				// $result = setCache( $_POST['key'], $_POST['val']);
																				
																			// //echo $result;
	
// }
?>

<?php //echo "test--->". Yii::app()->cache->set('id3', "test file", 1000, new CFileCacheDependency('FileName')); ?>
<p>
<?php //dump(Yii::app()->cache); ?><br>
</div>

<b class="badge">CMemCache</b><br>		
<a href="http://www.yiiframework.com/doc/guide/1.1/id/caching.overview" target="_blank"> Cache Yii-guide </a> |
<a href="http://localhost/yiidoc/CMemCache.html" target="_blank"> CMemCache docs </a> |
<a href="http://www.php.net/manual/en/book.memcache.php" target="_blank"> memCache PHP manual </a> |
<a href="http://slettnes.org/doc/mysql/ha-overview.html#ha-memcached" target="_blank"> Using MySQL with memcached</a> <br>

<ul>
<li>CMemCache implements a cache application component based on <code>memcached</code>. </li>
<li>CMemCache can be configured with a list of memcache servers by settings its servers property. By default, CMemCache assumes there is a memcache server running on localhost at port 11211. </li>
<li>CMemCache can also be used with <code>memcached</code>. To do so, set useMemcached to be true.</li>
</ul>
<b class="txtAtt">Note : CMemCache need php memcache</b>

<div class="view2">
Data caching sebenarnya berhubungan dengan penyimpanan beberapa variabel PHP dalam cache dan mengambilnya kemudian dari cache. Untuk keperluan ini, basis komponen cache <code>CCache</code> menyediakan dua metode yang dipakai dari waktu ke waktu: <code>set()</code> dan <code>get()</code>.<br>

<b>CCache</b>
 - menyediakan fungsionalitas caching data. Catatan, Anda harus menetapkan kelas sebenarnya (misal CMemCache, CDbCache). Jika tidak, null akan dikembalikan saat Anda mengakses komponen ini.
 </div>
<?php $this->beginWidget('CTextHighlighter',array('language'=>'JAVASCRIPT', 'lineNumberStyle'=>'table', 'showLineNumbers'=>1, )); ?>
## SAMPLE CACHE DATA ##
Yii::app()->cache->set($id, $value);	#set cache tanpa periode waktu

Yii::app()->cache->set($id, $value, 30);	#perlihara nilai dalam cache paling lama 30 detik.

$value=Yii::app()->cache->get($id);
if($value===false)
{
    // buat ulang $value karena tidak ditemukan dalam cache
    // dan simpan dalam cache untuk dipakai nanti:
    // Yii::app()->cache->set($id,$value);
}

#Tip: Karena CCache mengimplementasikan ArrayAccess, 
#komponen cache bisa dipakai layaknya sebuah. Berikut adalah beberapa contoh:
    $cache=Yii::app()->cache;
    $cache['var1']=$value1;  // sama dengan: $cache->set('var1',$value1);
    $value2=$cache['var2'];  // sama dengan: $value2=$cache->get('var2');
<?php $this->endWidget(); ?> 

<div class="view2">
Beberapa penyimpanan cache, seperti MemCache, APC, mendukung pengambilan beberapa nilai yang ditembolok dalam mode tumpak(batch), ini dapat mengurangi beban terkait pada pengambilan data cache. Terdapat metode bernama <code>mget()</code> disediakan guna mengeksploitasi fitur ini. Dalam hal penyimpanan cache lapisan bawah tidak mendukung fitur ini, <code>mget()</code> masih tetap akan mensimulasikannya.<br>

<div class="view">
<code> mget(array $ids)</code><br>
Retrieves multiple values from cache with the specified keys. Some caches (such as memcache, apc) allow retrieving multiple cached values at one time, which may improve the performance since it reduces the communication cost. In case a cache does not support this feature natively, it will be simulated by this method.
</div>

<p><span class="txtAtt">Note, by definition, cache does not ensure the existence of a value even if it does not expire. Cache is not meant to be a persistent storage.</span></p>
</div>

<div class="view2">
<b>CCache implements the interface ICache with the following methods:</b>
<ul>
   <li><b>get</b> : retrieve the value with a key (if any) from cache </li>
   <li><b>set </b>: store the value with a key into cache </li> ( If the cache already contains such a key, the existing value and expiration time will be replaced with the new ones. )
   <li><b>add</b> : store the value only if cache does not have this key</li> ( Nothing will be done if the cache already contains the key. )
   <li><b>delete</b> : delete the value with the specified key from cache</li>
   <li><b>flush</b> : delete all values from cache</li> (  Be careful of performing this operation if the cache is shared by multiple applications. )
</ul>

<b>Child classes must implement the following methods:</b>
<ul>
    <li><b>getValue</b></li> Retrieves a value from cache with a specified key. This method should be implemented by child classes to retrieve the data from specific cache storage. The uniqueness and dependency are handled in <code>get()</code> already. So only the implementation of data retrieval is needed.
    <li><b>setValue </b></li> Stores a value identified by a key in cache. This method should be implemented by child classes to store the data in specific cache storage. The uniqueness and dependency are handled in set() already. So only the implementation of data storage is needed. 
    <li><b>addValue</b></li> Stores a value identified by a key into cache if the cache does not contain this key. This method should be implemented by child classes to store the data in specific cache storage. The uniqueness and dependency are handled in add() already. So only the implementation of data storage is needed.
    <li><b>deleteValue</b></li>
    <li><b>getValues (optional)</b></li>
    <li><b>flushValues (optional)</b></li>
    <li><b>serializer (optional)</b></li>
</ul>
</div>

<div class="view2">
whether to md5-hash the cache key for normalization purposes. Defaults to true.<br>
Setting this property to false makes sure the cache key will not be tampered when calling the relevant methods get(), set(), add() and delete(). <br>
This is useful if a Yii application as well as an external application need to access the same cache pool (also see description of keyPrefix regarding this use case).<br> However, without normalization you should make sure the affected cache backend does support the structure (charset, length, etc.) of all the provided cache keys, otherwise there might be unexpected behavior.
</div>

<div class="view2">
<span class="badge">Di bawah ini adalah ringkasan ketergantungan cache yang tersedia: </span>
<ul>
    <li>CFileCacheDependency: ketergantungan diubah jika waktu modifikasi file terakhir diubah.</li>
    <li>CDirectoryCacheDependency: ketergantungan diubah jika file di bawah direktori dan subdirektorinya berubah.</li>
    <li>CDbCacheDependency: ketergantungan diubah jika hasil kueri pernyataan SQL yang ditetapkan berubah.</li>
    <li>CGlobalStateCacheDependency: ketergantungan diubah jika nilai kondisi global yang ditetapkan berubah. Kondisi global adalah variabel yang persisten pada beberapa permintaan dan beberapa sesi dalam aplikasi. Ketergantungan ini didefinisikan melalui CApplication::setGlobalState().</li>
    <li>CChainedCacheDependency: ketergantungan diubah jika salah satu rantai berubah.</li>
   <li> CExpressionDependency: ketergantungan berubah jika hasil yang ditetapkan ekspresi PHP diubah.</li>
</ul>
</div>
<?php //$this->renderPartial('_cache_docs'); ?>