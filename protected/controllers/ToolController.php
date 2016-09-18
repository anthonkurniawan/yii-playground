<?php
class ToolController extends KelasController   //AdminController
{
	public $layout='//layouts/column2';
	
	public function actions()
	{
		return array(
			'tips'=>array('class'=>'CViewAction',  'basePath'=>''),
			'collect'=>array('class'=>'CViewAction',  'basePath'=>''),
			'cfileHelper'=>array('class'=>'CViewAction',  'basePath'=>''),
		);
	}

	public function actionKelas(){
		$this->render('kelas');
	}
	
	public function actionGetDeclare_class($var){
		# SAMPLE FIND STRING IN ARRAY & OBJECT
		// echo $this->array_preg_search('/useMemcached/', $arr) .'<hr>';
		// echo $this->array_preg_search('resource', $arr) .'<hr>';
		if($var=='class')
			$result = get_declared_classes();
		elseif($var=='interface')
			$result = get_declared_interfaces();	
		else
			$result = get_declared_traits();
			
		print_r($result);
	}
	#------------------------------------------------------ GET KELAS/OBJECT ATTRIBUTES -------------------------------------#
	public function getAllModule(){
		$modules = Yii::app()->modules;
		foreach ($modules as $module=>$val){
			$mod[] =$module;
		}
		return $mod;
	}
	
	public function actionFetchKelas()
	{	
		$kelas = isset($_POST['kelas']) ? $_POST['kelas'] : false;
		if($kelas){		//echo $kelas; die();
			$data = $this->fetchKelas( $kelas );
			# CONVERT TO JSON / OBJ
			echo CJSON::encode( $data );	# MORE DEEPLY --or // echo json_encode($data);
			//Yii::app()->end();
		}
	}
	
	protected function fetchKelas($obj){			
		//$kelas = $_GET['kelas'];  //var_dump( YII::$kelas() );
			//$obj = ($kelas=='app' || $kelas=='getLogger') ? Yii::$kelas() : YII::app()->$kelas;	# EQUAL with "new #kelas"	
		if(! is_object($obj)){
			if(YII::app()->hasComponent($obj))
				$obj = Yii::app()->getComponent($obj);   # OR -- YII::app()->$obj;	- format/Cformatter
			else if( in_array($obj, array('app', 'getLogger')) )
				$obj = YII::$obj();
			else if( in_array($obj, array('modules', 'parentModule', 'components', 'params', 'preload', 'dateFormatter', 'numberFormatter', 'locale')) )
				$obj = YII::app()->$obj;
			else if($obj=='SolrClient')
				$obj = new $obj( YII::app()->getParams()->solr_cfg );
			else if( in_array($obj, $this->getAllModule() ) )
				$obj = YII::app()->getModule($obj);
			else
				$obj = new $obj;
		}
		
		# CHECK OBJECT  # is_a — Checks if the object is of this class or has this class as one of its parents
		$class_name =  is_object($obj) ? get_class($obj) : false;  # $this->data_obj($obj, $class_name);	# klo mo ambil dari fungsi
			
		#CONVERT OBJ TO ARRAY
		if($class_name==='CMemCache')
			$arr = $this->objectToArray($obj);		# pada Cmemcache ada object "Roesource" yg bikin format json nya jd FAIL !
		else
			$arr = (array) $obj ;  //dump($arr); #more deep get vars  # reverse : (object)  print_r($arr);

		# CHECK IF "OBJ" IS CLASS OR ARRAY
		if($class_name){	
			$parent = $this->kelas_parent($obj);	#GET CLASS PARENT

			$class_method  = (array) get_class_methods($obj); 
			$class_method_filter = $this->arrayFilter($class_method, 'get');  # FILTER ARRAY WITH "get" method ASC
			$get_method_val = $this->getVal_method($obj, $class_method_filter);		
																														
			//$ref_class = $this->getRefClass($obj);		
			$ref_method = $this->getRefMethod($obj, $class_method);		
			# $obj_vars = (array) get_object_vars($obj);	dump(get_class_vars($class));
			//$obj_vars = CVarDumper::dumpAsString($obj_vars, 10, true);
		}
		
		return$data = array(
			'class_name'=> ($class_name) ? $class_name : null,
			'parent_label'=>($class_name) ? $parent :null,
			'arr_obj'=> CVarDumper::dumpAsString($obj, 10, true),	#CONVERT TO STRING # OR -- print_r($obj, true),
			'obj'=>$arr, #panel fetch obj
			# 'obj_vars'=>$obj_vars, # equal with : get_class_vars($class) -- 
			 'class_method'=>($class_name) ? $class_method : null,
			'get_method_val'=>($class_name) ? $get_method_val : null,
			 'class_ref_method'=>($class_name) ? $ref_method : null,
		);			//dump($data);
	}
	
	# Tips & Trick -------------------------------------------------------------------------------------------------------------------
	public function actionApi()	
	{
		if (Yii::app()->request->isAjaxRequest) {	
			 cs()->registerScriptFile(Yii::app()->baseUrl . '/js/common.js');
			 cs()->registerScript('sntax', 	"js: SyntaxHighlighter.highlight();");
			 //renderPartial(string $view, array $data=NULL, boolean $return=false, boolean $processOutput=false)
			 $this->renderPartial($_GET["view"], null, false, true);		//ajax request harus set "false", "true"
		}
		else
			$this->render('api');
	}
	
	function array_preg_search($needle, $haystack) {
        if (!is_scalar($needle)) { return null; }
        if (!is_array($haystack)) { return null; }
        foreach ($haystack as $key => $val) {		
			if( is_array($val)){  echo "LOOP ARRAY<HR>";
				self::array_preg_search($needle, $val); 
			}
			if( is_object($val)){  echo "LOOP OBJ<HR>";
				//var_dump(property_exists($obj, 'connection')); 
				$conv = $this->objectToArray($val);
				self::array_preg_search($needle, $conv); 
			}
			else	
			echo "Search : ". $needle ."<br>";
			echo "key : " . $key ." type : ".gettype($key)."<br> value : "; dump( $val); echo is_object($val)." type : ".gettype($val)."<hr>";	
			if($needle === $key || $needle === $val) { echo "FOUND !<hr>"; }
			//if(is_object($val)) //echo get_object_vars($val); return true;
            // if ( preg_match($needle, $val) ) {
                // return $key;
            // }
        }
        return false;
    }
	
	function objectToArray($data){
		if ((! is_array($data)) and (! is_object($data))) return ‘xxx’; //$data;

		$result = array();

		$data = (array) $data;
		foreach ($data as $key => $value) {
			if (is_object($value)) $value = (array) $value;
			if (is_array($value)){
				$result[$key] = $this->objectToArray($value); 
			}else{
				$result[$key] = (gettype($value) !== 'resource') ? $value : (string) $value;	//"{Resource #}"; 		#gettype -- chec type value
			}
		}
		return $result;
	}
	
	function data_obj($obj, $class){
		$data = array();
		// array_push($data, $declared_classes);		dump($data);
		$data['declared_class'] = get_declared_classes();
		$data['declared_traits'] = get_declared_traits();		
			
		dump(get_object_vars($obj));	# equal with : dump(get_class_vars($class));
		
		# USING REFLECTION CLASS ( GET ALL ABOUT CLASS METHOD
		$obj = YII::getLogger();
		$ref = new ReflectionMethod ($obj, 'getEventHandlers');  dump($ref);
		$params = $ref->getParameters();  dump($params);
		echo $ref->class ."<br>";
		echo $ref->getShortName()."<br>";
		dump($ref->getNumberOfRequiredParameters());
		dump($ref->getNumberOfParameters());
		dump($ref->getDocComment());
		
		#TEST FROM FORUM
		$declaredClasses = get_declared_classes();
		foreach (glob(Yii::getPathOfAlias('application.controllers') . "/*Controller.php") as $controller)
		{
			$class = basename($controller, ".php");
			if (!in_array($class, $declaredClasses))
			Yii::import("application.controllers." . $class, true);
    
			//if you want to use reflection
			$reflection = new ReflectionClass($class); 
			$methods = $reflection->getMethods();
			//uncomment this if you want to get the class methods with more details
			//print_r($methods);
   
			//uncomment this if you want to get the class methods
			//print_r(get_class_methods($class));
		}

		//you should see a list of all Controllers/Models
		print_r(get_declared_classes());
	
	}
	
	
	
	/** 
 * Russell, 2012-11-10: Shared functionality useed in index.php and 
 * codetester.php.
 * Side-affect, can't use browser's back button to get old results as
 * a re-post will have a different nonce so will block
 */
function get_nonce() {
    $nonce = isset($_SESSION['nonce'])?$_SESSION['nonce']: hash('sha512', $this->get_random_string());
    $_SESSION['nonce'] = $nonce;
    return $nonce;
}
function remove_nonce() {
    unset($_SESSION['nonce']); //Remove the nonce from being used again!
}

function verify_nonce() {
    $nonce = $this->get_nonce();  // Fetch the nonce from the last request
    $this->remove_nonce(); // clear it so it can't be used again now we have it locally
    session_regenerate_id(true); // replace old session, stops session fixation    
    // only verify if nonce is sent and matches what is expected
    return (isset($_POST['nonce']) AND $_POST['nonce'] == $nonce);
}

function get_random_string() 
{
  $random_string = array();
  for($index=0; $index<32; $index++)
  {
    //ascii chars 32 - 126 are printable (127 is DEL)
    $random_string[] = chr( mt_rand(32,126));
  }
  return  implode($random_string);
}

	public function actionCodeTest(){
		$source = Yii::app()->viewPath.'\tool\_codesource.php'; 
        // get existing code
		$cont = file_exists($source) ? trim(file_get_contents($source)) : null;
		// if (isset($_POST['to']) AND $_POST['to'] == "interpretcode") {	
			// file_put_contents($source, 
          // $this->verify_nonce() ? $_POST['sourcecode'] : 'Detected an invalid submit, maybe an exploit attempt (o2326570).');
		// }

		if (isset($_POST['sourcecode'])) {	
			file_put_contents($source, $_POST['sourcecode'] );
		}
		
		if (Yii::app()->getRequest()->getIsAjaxRequest()) { 	# OR iYii::app()->request->isAjaxRequest 
			$this->renderPartial('_codesource');
		} 
		else 
		$this->render('codeTest', array('content'=>$cont));
	}
	
	// public function onError(){
			// echo "test";dump( YII::app()->getErrorHandler() );
			// parent::onError();
	// }
	// public function onException(){
		// echo "sssssss";
	// }
	
	// public function handleError(){
			// echo "test";dump( YII::app()->getErrorHandler() );
			// parent::handleError();
	// }
	
	// public function actionError()
	// {
		// //if($error=Yii::app()->errorHandler->error)  
		// echo "bol";
        // //$this->render('error', $error1);
	// }


/*
Request pengguna terhadap controller dan action tertentu sesuai dengan aturan route. Route dibentuk dengan menggabungkan 
ID controller dan ID action yang dipisahkan dengan garis miring. Sebagai contoh, route post/edit merujuk ke PostController dan action edit. 
Dan secara default, URL http://hostname/index.php?r=post/edit akan meminta controller post dan action edit.
- Catatan: Secara default, route bersifat case-sensitive.
*/
}
