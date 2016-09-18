<style>

</style>
<?php $this->layout='column2';?> 
<?php $this->pageTitle='Yii-curl'; ?>
<?php
$this->menu=array(
	array('label'=>'yii-curl', 'url'=>array('widget/yii_curl', 'view'=>'yii_curl')),	
	array('label'=>'EHttpClient', 'url'=>array('widget/EHttpClient', 'view'=>'EHttpClient')),			
	array('label'=>'Guzzle', 'url'=>'http://localhost/guzzle',  'linkOptions'=>array('target'=>'_blank')),	
);
?>

<span class="label lable-info">Example 1 - Getting my twitter statuses</span><br>

<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
<?php
Yii::import('ext.HTTP_REQUEST.EHttpClient.*');
 
# get my twitter status
// $client = new EHttpClient('http://twitter.com/statuses/user_timeline/tonydspaniard.xml', array(
    // 'maxredirects' => 0,
    // 'timeout'      => 30));
 
// $response = $client->request();								dump($response);
 
// if($response->isSuccessful())
    // echo '<pre>' . htmlentities($response->getBody()) .'</pre>';
// else
    // echo $response->getRawBody();
?>
<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>

<span class="label lable-info">Example 2 - Performing a Full Page Google Search Now, using EHttpClientAdapterCurl</span><br>
<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
<?php
// $client = new EHttpClient('http://www.google.es/search', array(
    // 'maxredirects' => 3,
    // 'timeout'      => 30,
    // 'adapter'      => 'EHttpClientAdapterCurl'));
 
// $client->setParameterGet(array('hl'=>'es', 'q'=>'manolo'));
 
// $response = $client->request();							dump($response);
 
// if($response->isSuccessful())
   // echo $response->getBody();
// else
   // $response->getRawBody();
 ?>
 <?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>
   
   
<span class="label lable-info">Example 3 - Downloading using stream </span><br>
<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
<?php
// $uri = EUri::factory('http://www.ip2nation.com/ip2nation/Download/');
 
// $temp_dir = realpath(sys_get_temp_dir()). DIRECTORY_SEPARATOR;
 
// $temp_file = tempnam($temp_dir, 'TEST');		echo $temp_dir;  echo "<br>".$temp_file;
 
// $config = array('adapter'=>'EHttpClientAdapterCurl', 'timeout'=>'60');
 
// $client = new EHttpClient($uri, $config);
// $client->setStream();
 
// $response = $client->request('GET');		dump($response);
 
// if($response->isSuccessful()){
   // // copy stream to temporary file... 
   // copy( $response->getStreamName(), $temp_file );
   // // other work with temporary file (ie decompress, decrypt, etc...)
// }
// else
   // $response->getRawBody();
 ?>
 <?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>



<div class="myBox" style="overflow: auto">
<h2>sample</h2>

<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
<?php
$url = 'http://127.0.0.1/yiitest/ajax/Ajax_getUser';  # cross domain
$url = 'http://127.0.0.1/blog.com/starship_rest/api/rest/3'; # REST 

$client = new EHttpClient( $url, array(
    'maxredirects' => 0,
    'timeout'      => 30));

 $client->setParameterGet(array('id'=>'1', 'tipe'=>'json'));
 $client->setAuth('admin', 'admin', EHttpClient::AUTH_BASIC);	# WITH AUTH BASIC
 
$response = $client->request();								dump($response);
 
if($response->isSuccessful()){
    echo '<pre>' . htmlentities($response->getBody()) .'</pre>';
	//echo $response->getHeader();
}
else
    echo $response->getRawBody();
?>
 <?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>

</div>