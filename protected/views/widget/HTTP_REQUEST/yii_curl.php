<?php $this->layout='column2';?> 
<?php $this->pageTitle='Yii-curl'; ?>
<?php
$this->menu=array(
	array('label'=>'yii-curl', 'url'=>array('widget/yii_curl', 'view'=>'yii_curl')),	
	array('label'=>'EHttpClient', 'url'=>array('widget/EHttpClient', 'view'=>'EHttpClient')),			
);
?>

<b class="label label-info">Yii-Curl</b><br>
	
<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
<!--
## Setup instructions

* Place Curl.php or git clone into protected/extensions/curl folder of your project
* in main.php, or console.php add the following to 'components':

	'curl' => array(
		'class' => 'ext.curl.Curl',
		'options' => array(/* additional curl options */),
	),
```

## Usage
* to GET a page with default params

	$output = Yii::app()->curl->get($url, $params);
	// output will contain the result of the query
	// $params - query that'll be appended to the url
```


* to POST data to a page

	$output = Yii::app()->curl->post($url, $data);
	// $data - data that will be POSTed

* to PUT data 

	$output = Yii::app()->curl->put($url, $data, $params);
	// $data - data that will be sent in the body of the PUT
```
* to DELETE 

	$output = Yii::app()->curl->delete($url, $params);
	// $params - query that'll be appended to the url
```

* to set options before GET or POST

	$output = Yii::app()->curl->setOption($name, $value)->get($url, $params);
	// $name & $value - CURL options
	$output = Yii::app()->curl->setOptions(array($name => $value))->get($get, $params);
	// pass key value pairs containing the CURL options
	
use setOption or setOptions
you can setOption before getting the url

Yii::app()->curl->setOption(CURLOPT_COOKIE, 'cookie_one=value; cookie_two=value')->get(url);
or
Yii::app()->curl->setOptions(array(CURLOPT_COOKIE => 'cookie_one=value; cookie_two=value'))->get(url);
sample :
Used this instead $auth = array('Authorization:'.$token);
$output = Yii::app()->curl->setOption(CURLOPT_HTTPHEADER, $auth)->get($url);

-->
<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>




<?php
$url = 'http://localhost/yiitest/ajax/Ajax_getUser';
$params = array('id'=>1, 'tipe'=>'html');

$curl = Yii::app()->curl;
$curl->get($url, $params);

dump($curl->getHeaders());
dump($curl);

?>

