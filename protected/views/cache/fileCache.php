<style>.container{width:1100px;}</style>

<?php $this->pageTitle='Cache File'; ?>

<?php $this->layout='column2'; ?>
<?php $this->renderPartial('_menu'); ?>

<b class="badge"> Cache File </b><br>
<b class="txtHead2">Using file Dependency ( ketergantungan diubah jika waktu modifikasi file terakhir diubah./ agar selalu mempebaharui cache file sesuai dengan file original jika file berubah isinya)</b><br>
<code>Yii::app()->cache->set($key='id10', $value, $timeout,  new CFileCacheDependency($filename));</code>
<div class="view2">
<ul>
<li>	Firsts, select file yang mau di simpan dalam <b>cache</b> (SET Cache)</li>
<li>	Kemudian , test load file yg di cache tadi sesuai dengan id yg di create</li>
<li>	Jika tidak ada perubahan (mofification date file nya) maka akan load cache file (GET Cache)</li>
<li>	Jika ada perubahan maka Cache file akan expired dan create yang baru (SET) dan kemudian me-load nya (GET)</li>
</ul>
Note : coba di rubah2 file nya
</div>


<div class="tpanel"> 
<div class="toggle btn"><?php echo Yii::t('ui','View Code'); ?></div>
<?php $this->beginWidget('CTextHighlighter',array('language'=>'JAVASCRIPT', 'lineNumberStyle'=>'table', 'showLineNumbers'=>1, )); ?>
	#KALO GET/SET TO CACHE
		if( isset($_POST['dataCache']) )  {		
			$key = $_POST['key'];
			$filename = $_POST['filename'];
			$data = $_POST['filetxt'];
			
			if ( $cached = $this->getCache($_POST['key']) ) ;
			else  $cached = $this->setCache( $key, $data, $filename);
			echo $cached;									
		}
		
	function getCache($key) {		
        //return ($memcache) ? $memcache->get($key) : false;
		$result = Yii::app()->cache->get($key);	echo $result;
		return $result;
    }
	
	function setCache($key, $value, $filename, $timeout = 1000) {		
		Yii::app()->cache->set($key='id10', $value, $timeout,  new CFileCacheDependency($filename));
		$result = "Set to cache <b>$key</b> for $timeout seconds";		
		return  $result;
    }
<?php $this->endWidget(); ?>
</div>