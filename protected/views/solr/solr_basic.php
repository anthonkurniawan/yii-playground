<style> 
.left{margin-top: 3px; margin-right:3px} 
.res{height:200px; min-width:350px; max-width:1000px; overflow:auto}
</style>

<h1>SOLR BASIC PHP <small>see php manual</small></h1>

dump(curl_init());
		dump( extension_loaded('solr'));
		echo solr_get_version();
	
	
<div class="view2">
<span class="label label-info">Configuration</span>
<div class="clear"></div>

<div class="myBox left">
<?php Yii::app()->sc->setStart(__LINE__); ?>

<?php
$options = array(
	'hostname' => 'localhost',
	'login'    => '',
	'password' => '',
	'port'     => 8983,
);

$client = new SolrClient($options); 
?>

<?php Yii::app()->sc->collect('html', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));   ?>
<?php Yii::app()->sc->renderSourceBox(); ?>
</div>

<div class="myBox left">
 <b>Result : $client</b> <br>
<?php  dump($client); ?>
</div>

<div id="p1" class="myBox left res">
<b>$client->getOptions();  </b>
<?php
$this->widget('myPanelbar', array(
	'selector'=>null,	# if ID null then - using parent object 
	//'class'=>'box', # default - btn-group ( style border, color for group button )
	'title'=>'title', 'content'=>$client->getOptions(),  # optional aja
)); 
?> 
<?php //dump( $client->getOptions()); ?>
</div>

</div>

<div class="view2">
<span class="label label-info">Example #2 Adding a document to the index</span>
<div class="clear"></div>

<div class="myBox left" style="width:300px">
<?php Yii::app()->sc->setStart(__LINE__); ?>

<?php
	$doc = new SolrInputDocument();  
	$doc->addField('id', 1);
	$doc->addField('cat', 'Software');
	$doc->addField('cat', 'Lucene');
	$updateResponse = $client->addDocument($doc);
?>

<?php Yii::app()->sc->collect('html', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));   ?>
<?php Yii::app()->sc->renderSourceBox(); ?>
</div>

<div class="myBox left">
<b>Result : $doc </b><br>
<?php dump($doc); ?>
</div>

<div class="myBox left res">
<b>$updateResponse->getResponse() </b>
<?php $this->widget('myPanelbar', array( 'content'=>$updateResponse->getResponse(), )); ?> 
</div>
</div>
	

<div class="view2">
<span class="label label-info"># Example #3 Merging one document into another document</span>
<div class="clear"></div>

<div class="myBox left">
<?php Yii::app()->sc->setStart(__LINE__); ?>

<?php
$doc = new SolrDocument();
$second_doc = new SolrDocument();

$doc->addField('id', 2);
$doc->features = "PHP Client Side";
$doc->features = "Fast development cycles";

$doc['cat'] = 'Software';
$doc['cat'] = 'Custom Search';
$doc->cat   = 'Information Technology';

$second_doc->addField('cat', 'Lucene Search');
$second_doc->merge($doc, true);
?>

<?php Yii::app()->sc->collect('html', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));   ?>
<?php Yii::app()->sc->renderSourceBox(); ?>
</div>

<div class="myBox left res">
<b>Result : $doc</b> <br>
<?php dump($doc); ?> <br>
<b>Result : $second_doc </b><br>
<?php dump($second_doc); ?>
</div>

<div class="myBox left res">
<b>$second_doc->toArray() </b>
<?php $this->widget('myPanelbar', array( 'content'=>$second_doc->toArray(), )); ?> 
</div>
</div>
		
	
<div class="view2">
<span class="label label-info">Example #4 Searching for documents - SolrObject responses</span>
<div class="clear"></div>

<div class="myBox left">
<?php Yii::app()->sc->setStart(__LINE__); ?>

<?php
$client = new SolrClient($options);
$query = new SolrQuery();

$query->setQuery('lucene');
$query->setStart(0);
$query->setRows(50);
$query->addField('cat')->addField('features')->addField('id')->addField('timestamp');

$query_response = $client->query($query);
$response = $query_response->getResponse();	
?>

<?php Yii::app()->sc->collect('html', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));   ?>
<?php Yii::app()->sc->renderSourceBox(); ?>
</div>

<div class="myBox left">
<b>Result : $client</b> <br>
<?php dump($client); ?> <br>
<b>Result : $query </b><br>
<?php dump($query); ?>
</div>

<div class="myBox left res">
<b>$client->query($query)</b>
<?php $this->widget('myPanelbar', array( 'content'=>$query_response, )); ?> 
</div>

<div class="myBox left res">
<b>$query_response->getResponse();	</b>
<?php $this->widget('myPanelbar', array( 'content'=>$response, )); ?> 
</div>
</div>


<div class="view2">
<span class="label label-info">Example #5 Searching for documents - SolrDocument responses</span>
<div class="clear"></div>

<div class="myBox left">
<?php Yii::app()->sc->setStart(__LINE__); ?>

<?php
$query_response->setParseMode(SolrQueryResponse::PARSE_SOLR_DOC);
$response = $query_response->getResponse();
?>

<?php Yii::app()->sc->collect('html', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));   ?>
<?php Yii::app()->sc->renderSourceBox(); ?>
</div>

<div class="myBox left res">
<b>$query_response->getResponse() </b>
<?php $this->widget('myPanelbar', array( 'content'=>$response, )); ?> 
</div>
</div>


<div class="view2">
<span class="label label-info">Example #6 Simple TermsComponent example - basic</span>
 http://localhost:8983/solr/terms?terms.fl=name&terms.prefix=at
<div class="clear"></div>

<div class="myBox left">
<?php Yii::app()->sc->setStart(__LINE__); ?>

<?php
$query = new SolrQuery();
$query->setTerms(true);
$query->setTermsField('cat');
$updateResponse = $client->query($query);
$response = $updateResponse->getResponse();
?>

<?php Yii::app()->sc->collect('html', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));   ?>
<?php Yii::app()->sc->renderSourceBox(); ?>
</div>

<div class="myBox left res">
<b>$updateResponse->getResponse()</b>
<?php $this->widget('myPanelbar', array( 'content'=>$response, )); ?> 
</div>
</div>

		
<div class="view2">
<span class="label label-info">Example #7 Simple TermsComponent example - using a prefix</span>
<div class="clear"></div>

<div class="myBox left">
<?php Yii::app()->sc->setStart(__LINE__); ?>

<?php
$query = new SolrQuery();
$query->setTerms(true);
/* Return only terms starting with $prefix */
$prefix = 'c';
$query->setTermsField('cat')->setTermsPrefix($prefix);
$updateResponse = $client->query($query);
$response = $updateResponse->getResponse();
?>

<?php Yii::app()->sc->collect('html', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));   ?>
<?php Yii::app()->sc->renderSourceBox(); ?>
</div>

<div class="myBox left res">
<b>$updateResponse->getResponse()</b>
<?php $this->widget('myPanelbar', array( 'content'=>$response, )); ?> 
</div>
</div>


<div class="view2">
<span class="label label-info">Example #8 Simple TermsComponent example - specifying a minimum frequency</span>
<div class="clear"></div>

<div class="myBox left">
<?php Yii::app()->sc->setStart(__LINE__); ?>

<?php
$query = new SolrQuery();
$query->setTerms(true);
/* Return only terms starting with $prefix */
$prefix = 'c';
/* Return only terms with a frequency of 2 or greater */
$min_frequency = 2;
$query->setTermsField('cat')->setTermsPrefix($prefix)->setTermsMinCount($min_frequency);
$updateResponse = $client->query($query);
$response = $updateResponse->getResponse();
?>

<?php Yii::app()->sc->collect('html', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));   ?>
<?php Yii::app()->sc->renderSourceBox(); ?>
</div>

<div class="myBox left res">
<b>$updateResponse->getResponse()</b>
<?php $this->widget('myPanelbar', array( 'content'=>$response, )); ?> 
</div>
</div>


<div class="view2">
<span class="label label-info"> Example #9 Simple Facet Example</span>
<div class="clear"></div>

<div class="myBox left">
<?php Yii::app()->sc->setStart(__LINE__); ?>

<?php
$query = new SolrQuery('*:*');
$query->setFacet(true);
$query->addFacetField('cat')->addFacetField('name')->setFacetMinCount(2);
$updateResponse = $client->query($query);
$response_array = $updateResponse->getResponse();
$facet_data = $response_array->facet_counts->facet_fields;
?>

<?php Yii::app()->sc->collect('html', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));   ?>
<?php Yii::app()->sc->renderSourceBox(); ?>
</div>

<div class="myBox left res">
<b>$client->query($query);</b>
<?php $this->widget('myPanelbar', array( 'content'=>$updateResponse, )); ?> 
</div>

<div class="myBox left res">
<b>$updateResponse->getResponse();</b>
<?php $this->widget('myPanelbar', array( 'content'=>$response_array, )); ?> 
</div>

<div class="myBox left res">
<b>$response_array->facet_counts->facet_fields;</b>
<?php $this->widget('myPanelbar', array( 'content'=>$facet_data, )); ?> 
</div>
</div>
		

<div class="view2">
<span class="label label-info">Example #10 Simple Facet Example - with optional field override for mincount</span>
<div class="clear"></div>

<div class="myBox left">
<?php Yii::app()->sc->setStart(__LINE__); ?>

<?php
$client = new SolrClient($options);
$query = new SolrQuery('*:*');
$query->setFacet(true);
$query->addFacetField('cat')->addFacetField('name')->setFacetMinCount(2)->setFacetMinCount(4, 'name');
$updateResponse = $client->query($query);
$response_array = $updateResponse->getResponse();
$facet_data = $response_array->facet_counts->facet_fields;
?>

<?php Yii::app()->sc->collect('html', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));   ?>
<?php Yii::app()->sc->renderSourceBox(); ?>
</div>

<div class="myBox left res">
<b>$response_array->facet_counts->facet_fields;</b>
<?php $this->widget('myPanelbar', array( 'content'=>$facet_data, )); ?> 
</div>
</div>


<div class="view2">
<span class="label label-info">Example #11 Connecting to SSL-Enabled Server</span> <br>

<?php Yii::app()->sc->setStart(__LINE__); ?>

<?php
/* Domain name of the Solr server */
define('SOLR_SERVER_HOSTNAME', 'localhost');

/* Whether or not to run in secure mode */
define('SOLR_SECURE', true);

/* HTTP Port to connection */
define('SOLR_SERVER_PORT', ((SOLR_SECURE) ? 8443 : 8983));

/* HTTP Basic Authentication Username */
define('SOLR_SERVER_USERNAME', '');

/* HTTP Basic Authentication password */
define('SOLR_SERVER_PASSWORD', '');

/* HTTP connection timeout */
/* This is maximum time in seconds allowed for the http data transfer operation. Default value is 30 seconds */
define('SOLR_SERVER_TIMEOUT', 10);

/* File name to a PEM-formatted private key + private certificate (concatenated in that order) */
define('SOLR_SSL_CERT', 'certs/combo.pem');

/* File name to a PEM-formatted private certificate only */
define('SOLR_SSL_CERT_ONLY', 'certs/solr.crt');

/* File name to a PEM-formatted private key */
define('SOLR_SSL_KEY', 'certs/solr.key');

/* Password for PEM-formatted private key file */
define('SOLR_SSL_KEYPASSWORD', 'StrongAndSecurePassword');

/* Name of file holding one or more CA certificates to verify peer with*/
define('SOLR_SSL_CAINFO', 'certs/cacert.crt');

/* Name of directory holding multiple CA certificates to verify peer with */
define('SOLR_SSL_CAPATH', 'certs/');

/*
$options = array
(
    'hostname' => SOLR_SERVER_HOSTNAME,
    'login'    => SOLR_SERVER_USERNAME,
    'password' => SOLR_SERVER_PASSWORD,
    // 'port'     => SOLR_SERVER_PORT,
	'port'     => 8983,
    'timeout'  => SOLR_SERVER_TIMEOUT,
    //'secure'   => SOLR_SECURE,
    // 'ssl_cert' => SOLR_SSL_CERT_ONLY,
    // 'ssl_key'  => SOLR_SSL_KEY,
   // 'ssl_keypassword' => SOLR_SSL_KEYPASSWORD,
  // 'ssl_cainfo' => SOLR_SSL_CAINFO,
);

$client = new SolrClient($options);
$query = new SolrQuery('*:*');
$query->setFacet(true);
$query->addFacetField('cat')->addFacetField('name')->setFacetMinCount(2)->setFacetMinCount(4, 'name');
$updateResponse = $client->query($query);
$response_array = $updateResponse->getResponse();
$facet_data = $response_array->facet_counts->facet_fields;
dump($facet_data);
*/
?>

<?php Yii::app()->sc->collect('html', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));   ?>
<?php Yii::app()->sc->renderSourceBox(); ?>

</div>

