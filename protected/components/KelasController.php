<?php
class KelasController extends Controller
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	//public $layout='//layouts/column1';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	# Menu Xportlet
	public $leftPortlets=array();
	public $rightPortlets=array();
	public $sidePortlets=array();
	
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
	
	public function kelas_parent($obj=null, $data=array())
	{
		$parent = get_parent_class($obj);			

		while(class_exists($parent) &&! in_array($parent, $data) ){	# cek class is exist & tidak ada nama yg sama
			//array_push($data, $parent);
			$data[] = $parent;	//echo "<b>".$parent."</b>";
			$data = self::kelas_parent($parent, $data);  //exit();
		}		
		//$str = implode(",", $data );			echo $str;

		return $data;
	}
	
	function arrayFilter($arr, $str){
		foreach($arr as $key=>$val){		
			if (strpos($val, $str) !== false)
				$arr_filter[] = $val;
			else
				$other[] = $val;
		}
		return array_merge($arr_filter, $other);
	}
	
	public function getVal_method($obj, $method){	
		$data = array();
		
		foreach($method as $key=>$val){
			$ref = new ReflectionMethod($obj, $val);
			
			if (strpos($val, 'get') !== false && $ref->getNumberOfRequiredParameters()==0)	{      //echo $val; dump($obj->$val());  echo "<hr>";
				//$arr_filter[] = array($val=>$obj->$val() );
				try {
					$value =  $obj->$val(); 	 
					if(gettype($value)=='object' &&  get_class($value)=='Memcache') 		//dump();
						$value = $this->objectToArray($value);
					
				} catch(Exception $e) {
					$value =  $e->getMessage();
				}
	
				$data[$key]['method'] = $val;
				$data[$key]['value'] = $value;
				$data[$key]['class'] =  $ref->class;
			}
			else
				$other[] = $val;
		}	
		 return $data;
	}
	
	function getRefClass($obj){
		$class = new ReflectionClass($obj);                       //dump($class);
		$classM = $class->getMethods();    //dump($classM);
		return $classM;
	}
	
	function getRefMethod($obj, $method){	
		if(is_array($method)){
			foreach($method as $key=>$val){		
				$ref = new ReflectionMethod ($obj, $val);  //dump($ref);
				$data[$key] = (array)$ref;
				$data[$key]['params'] =  implode(",", $ref->getParameters()); // covert array to string
				$data[$key]['param_req'] = $ref->getNumberOfRequiredParameters();
				$data[$key]['param_num'] = $ref->getNumberOfParameters();
				$data[$key]['doc'] = $ref->getDocComment();
				// //echo $ref->class ."<br>";
				// //echo $ref->getShortName()."<br>";
				//dump( is_array( $ref->getParameters() ));
			}
		}
		//$ref = new ReflectionMethod ($obj, $val);  dump($ref);
		return $data;
	}

}
?>