<?php
// require  __DIR__.'/../../../../NOSQL/predis10/autoload.php';	

class SolrController extends KelasController
{
	public function actionIndex()
	{
		$this->render('index');
	}

	// -----------------------------------------------------------
	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'solr'=>array('class'=>'CViewAction',  'basePath'=>''),  
			'solr_basic'=>array('class'=>'CViewAction',  'basePath'=>''),  
			'SolrPhpClient'=>array('class'=>'CViewAction',  'basePath'=>''), 
			'yiisolr'=>array('class'=>'CViewAction',  'basePath'=>''),
		);
	}
	
	public function actionTestSolr(){
		dump(curl_init());
		dump( extension_loaded('solr'));
		echo solr_get_version();
	}
	
	#------------------ YII-SOLR
	public function actionGetSpellSolr(){
		//$doc =Yii::app()->solr;	//dump($doc);
		// $doc = $doc->setClient( SolrClient::SEARCH_SERVLET_TYPE, 'spell' );		
		// $arr = array
        // (
            // 'hostname' => 'localhost',
            // 'port' => 8983,
           // // 'path' => 'spell'
        // );
		// $doc = $doc->setClientOptions( $arr);
		//$doc->resetClient();
		//$doc->client->setServlet(SolrClient::SEARCH_SERVLET_TYPE, 'spell' );	dump($doc->client->getOptions());
		
		$criteria = new ASolrCriteria;		//dump($criteria);
		$criteria->query = 'vide';
		$criteria->set('spellcheck','true');
		$pages=array('pageSize'=>15);
		$dataprovider = new ASolrDataProvider(ASolrDocument::model(),array('criteria'=>$criteria,'pagination'=>$pages));
		//dump($dataprovider);

		$suggestions = array();
		$terms = array();
		if ($dataprovider != null)
		{
			$facets = $dataprovider->getQueryFacets();	dump($facets);
			$resp = $dataprovider->getSolrQueryResponse()->getSolrObject();	dump($resp);
			
			// if (isset($resp['spellcheck']))
			// {
				// if (isset($resp['spellcheck']['suggestions']))
				// {
					// foreach ($resp['spellcheck']['suggestions'] as $thisSuggest)
					// {
					// if (is_object($thisSuggest) && get_class($thisSuggest) == 'SolrObject')
						// {
							// if (isset($thisSuggest['suggestion']) && is_array($thisSuggest['suggestion']))
							// {
								// foreach($thisSuggest['suggestion'] as $thisTerm){	dump($thisTerm);
									// //$terms[$thisTerm]=1;
								// }
							// }
						// }
					// }
				// }
			// }
		}
		foreach($terms as $termKey=>$val){
			// Solr adds negated or added terms to suggestions if they don't match case
			if (!preg_match('/\b'.$termKey.'\b/i',$originalQueryString)) {
				$suggestions[] = CHtml::link($termKey,'/index.php/mysearchcontroller?q='.urlencode($termKey));
			}
		}
		dump($suggestions);
	}
	
	public function actionSolrQuery() {
		if (isset($_POST['solr_query'])) {	
			$criteria = new ASolrCriteria;  
			$criteria->query = $_POST['solr_query']; // lucene query syntax
			
			//$criteria->setServlet(SolrClient::SEARCH_SERVLET_TYPE, 'spell');
			dump($criteria);
			$docs = ASolrDocument::model()->findAll($criteria); 
			
			//dump(is_object($docs));
			dump($docs);
		}
		
		// if (Yii::app()->getRequest()->getIsAjaxRequest()) { 	# OR iYii::app()->request->isAjaxRequest 
	
			// $this->renderPartial('_codesource');
		// } 
		//$this->render('yiisolr');
	}
	
	# SOLR ACTION
	public function actionGetSolr($q=null, $start=0, $row=50, $field=array(), $option=null){  
		if(!empty($_REQUEST['q'])){ 
			$q = $_REQUEST['q'];
			$options = YII::app()->getParams()->solr_cfg;
			$client = new SolrClient($options);			//dump( $this->fetchKelas($client) );
			$query = new SolrQuery();

			# UPDATE MODE ( default : "select" )
			if(isset($_REQUEST['search'])){
				$client->setServlet(SolrClient::SEARCH_SERVLET_TYPE, $_REQUEST['search']);
		
			# CHECK IF MODE SEARCH IS "TERMS"
				if($_REQUEST['search']=='terms'){
					$query->setTermsField( $_REQUEST['term_fl'] );
					$query->setTermsPrefix($q);
				}
			}
			
			
			// $query->setQuery('lucene');
			$query->setQuery($q);
			$query->setStart( $start );
			$query->setRows( $row );
															
			//$query->addField('cat')->addField('features')->addField('id')->addField('timestamp');
			//$query->addField('cat');
	
			$query_response = $client->query($query);
			$response = $query_response->getResponse();
			// dump($client->threads()); echo "<hr>";
			// dump($client->query($query)); echo "<hr>";
		
			// $data['result'] = $response;		'arr_obj'=> CVarDumper::dumpAsString($obj, 10, true),
			$data['result'] = CVarDumper::dumpAsString($response, 10, true);	//echo CJSON::encode($data); die();
			// $data['query_res'] = $query_response;
		
			if(isset($_REQUEST['show_class'])){
				$data['client'] =  $this->fetchKelas($client);
				$data['query'] = $this->fetchKelas($query);
			}
		
			if (Yii::app()->getRequest()->getIsAjaxRequest())  	# OR iYii::app()->request->isAjaxRequest 
				echo CJSON::encode($data);
			else 
				dump($data);
		}
	}
	
	public function actionAutoComplete_solr($q=null, $start=0, $row=50, $field=array(), $option=null){  
		if(!empty($_REQUEST['term'])){ 
			$options = YII::app()->getParams()->solr_cfg;
			$client = new SolrClient($options);			
			$query = new SolrQuery();

			# UPDATE MODE ( default : "select" )
			$client->setServlet(SolrClient::SEARCH_SERVLET_TYPE, 'spell');
		
			# CHECK IF MODE SEARCH IS "TERMS"
			$query->setTermsField( $_REQUEST['term_fl'] );
			$query->setTermsPrefix($_REQUEST['term']);

			//$query->setQuery($term);
			$query->setStart( $start );
			$query->setRows( $row );

			$query_response = $client->query($query);
			$response = $query_response->getResponse();		//print_r( $response);
																								
			if( count( (array ) $response->terms->name) !=0){
				$data=array();
				foreach($response->terms->name as $key=>$val){
					$data[] = array('label'=>$key, 'value'=>$key);
				}
			}
			else {
				$data[] = array('label'=>'dont exist', 'value'=>'dont exist');
			}
			echo CJSON::encode($data);
		}
	}
	
}