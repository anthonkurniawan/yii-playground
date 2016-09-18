<?php
// require  __DIR__.'/../../../../NOSQL/predis10/autoload.php';	

class RedisController extends Controller
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
			'predis'=>array('class'=>'CViewAction',  'basePath'=>''),
		);
	}
	
	public function getClient(){
		return Yii::app()->predis->client;
	}
	
	public function actionTestPredis(){
		$client = Yii::app()->predis->clientOptions;
		$this->render('test_predis', array('client'=>$client));
	}
	
	public function actionSend(){		//print_r($_POST);	
		$client = Yii::app()->predis->client;
		// $res = $client->set('foo', 'bar');
		// $res = $client->$cmd('foo', 'bar');
		// $res = $client->$cmd( 'foo', 'bar', 'nx', 'ex', 10 );
		$client = $this->client;
		$cmd = strtoupper($_POST['command']);
		
		if(isset($_POST['redis'])){
			$data =  $_POST['redis'];
			$cmdline = $cmd ." ". implode(' ', $data );	
		}
		elseif(isset($_POST['get'])){			
			$data = explode(' ', trim($_POST['get']['key']) );  
			if(count($data) > 1)	$cmd ="MGET";		# jika lebih dr 1 call "mget"
			$cmdline = $cmd ." ". implode(' ', $data);	
		}
		elseif(isset($_POST['hset'])){
			$data =  $_POST['hset'];		//print_r($data);  
			if(count($data) > 4)	$cmd ="HMSET";		
			if(isset($_POST['hset']['pk'])){
				$data = array();
				$data['key_id'] = $_POST['hset']['key'] .":" . $client->incr("next_user_id");
				foreach($_POST['hset'] as $key=>$val){
					if( ! in_array($key,  array("key", "pk") ) )
						$data[] = $val;
				}
			}              print_r($data);  //die();
			$cmdline = $cmd ." ". implode(' ', $data );	
		}
		elseif(isset($_POST['hget'])){		
			$data = $_POST['hget']; 
			if(count($data) > 2)	$cmd ="HMGET";	
			elseif(isset($_POST['hvals'])) $cmd = "HVALS"; 
			$cmdline = $cmd ." ". implode(' ', $data);	
		}
		elseif(isset($_POST['keys'])){			
			$data = explode(' ', trim($_POST['keys']) );  
			$cmdline = $cmd ." ". implode(' ', $data);	
		}
		elseif(isset($_POST['lists'])){			
			$data = $_POST['lists'];	 
			$cmdline = $cmd ." ". implode(' ', $data);	
		}
		elseif(isset($_POST['sets'])){			
			$data = $_POST['sets'];	 
			$cmdline = $cmd ." ". implode(' ', $data);	
		}
		elseif(isset($_POST['console'])){
			$cmdline = $_POST['console'];	
			$data = explode(' ', $cmdline);  	//print_r($data);  
			$cmd = array_shift($data);		//echo $cmd; print_r($data);
		}
		
		try {
			$res = call_user_func_array( array($client, $cmd), $data );
		} catch (Exception $e) {
			$res = 'Caught exception: '.  $e->getMessage(). "\n";  
		}

		echo "> " .$cmdline . "<br>";
		if(is_array($res)){ 
			echo "<pre>"; print_r($res); echo "</pre>"; }
		else
			echo $res;
	}
	
	public function actionApi(){
		$client = $this->client;
		$cmd = $_GET['command'];
		$data = $_POST;		//echo $cmd; print_r($data);  die();
		$res['cmdline'] = $cmd ." ". implode(' ', $_POST);	
		try {
			$res['data'] = call_user_func_array( array($client, $cmd), $data );
		} catch (Exception $e) {
			$res['data'] = 'Caught exception: '.  $e->getMessage(). "\n";  
		}
		
		echo CJSON::encode($res);
	}
	
	public function actionGetDataKeys($key){
		$type = $this->client->type($key);
		$res = $this->getValues($type, $key);
		echo CJSON::encode($res);
	}
	
	public function actionGetAllKeys()
	{
		$keys = $this->client->keys("*");    //print_r($keys);
		foreach($keys as $key=>$val){
			$type = (string) $this->client->type($val);
			$values = $this->getValues($type, $val); 
			$data[] = array(
				'type'=>$type,
				'key'=>$val,
				'values'=>$values,
				'ttl'=>$this->client->ttl($val),
				'pttl'=>$this->client->pttl($val),
			);
		}
		array_multisort($data, SORT_ASC);
		//ksort($data);
		//echo "<pre>"; print_r($data); echo "</pre>";
		if( Yii::app()->request->isAjaxRequest ) { 
			echo CJSON::encode($data);
		}
		else{
		echo "<table class='dataGrid'>";
		echo "<tr><td>Key</td><td>Type</td><td>TTL</td><td>PTTL</td><td>Values</td></tr>";
		foreach($data as $k=>$v){
			$values = CJSON::encode($v['values']);
			echo"<tr><td>{$v['key']}</td><td>{$v['type']}</td><td>{$v['ttl']}</td><td>{$v['pttl']}</td><td>{$values}</td></tr>";
		}
		echo "</table>";
		}
	}
	
	protected function getValues($type, $val){		//echo $val ."<hr>";
		switch($type){
			case 'string'; return $this->client->get($val); break;
			case 'hash';  return $this->client->hgetall($val); break;
			case 'list';  return $this->client->lrange($val, 0, -1); break;
			case 'set';  return $this->client->smembers($val); break;
			case 'zset';  return $this->client->zrange($val, 0, -1, 'WITHSCORES'); break;
		}
	}
	
	public function redis_version()
	{
		$info = Yii::app()->predis->client->info();
		if (isset($info['Server']['redis_version'])) 
			return $info['Server']['redis_version'];
		elseif (isset($info['redis_version'])) 
			return $info['redis_version'];
		else 
			return 'unknown version';
	}
}