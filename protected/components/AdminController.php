<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class AdminController extends Controller
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
	
	#configure themes path and url in the themesManage
	public function init()
    {
        //Yii::app()->themeManager->basePath .= '/biskit';
        //Yii::app()->themeManager->baseUrl .= '/biskit';
        //Yii::app()->theme = 'biskit'; // You can set it there or in config or somewhere else before calling render() method.
		// $this->registerJs();
        // $this->registerCss();
		// $this->initLanguage();	# MOVE TO i18n Controller
    }

	 public function registerJs(){
        //cs()->registerScriptFile(bu().'/js/libs/modernizr-2.6.2.min.js',CClientScript::POS_HEAD);
    }

    public function registerCss(){
       // cs()->registerCssFile(bu() .'/css/main.css');
     }
	 
	#Set Tracking Last visit page url
	public function lastVisit()	{
																//dump(Yii::app()->getRequest());
		$request=Yii::app()->getRequest(); 	//dump($request);
		 if(!$request->getIsAjaxRequest())
			 //$this->setReturnUrl($request->getUrl());
			Yii::app()->user->setReturnUrl($request->getUrl());
	}
	
	/* SAMPLE :
		$this->render_script();  -- print current action controller
		$this->render_script(array('site/index')); -- print action site/index
		$this->render_script('D:\WEB\HTDOCS\yiiProject\yiiTest\console.php');  -- print file 
	*/
	public function render_script($param=null)
	{								//dump($param);
		if(!$param)
		{
			//echo __CLASS__;
			$path_cont = Yii::app()->controllerPath;	
			$cont = get_class( Yii::app()->controller);	//echo $path_cont . '\\' . $cont ."<br>";
			$source = $path_cont . '\\' . $cont .'.php';
			$action =ucwords( Yii::app()->getController()->action->id ); 	//echo 'public function action'.$action;
		
			Yii::app()->sc->collect('php', Yii::app()->sc->getFunctionFromFile(
				'public function action'.$action,
				//'protected/controllers/testFormController.php'
				$source
			), false, true);
		}

		if($param && is_array($param)) 
		{
			$arr = $param[0];
			$arr=(explode('/', $arr));								//print_r($arr);
			$controller = $arr[0] .'Controller.php';			//echo '<br>cont->'. $controller;
			$action = ucwords($arr[1]);						//echo '<br>act-->'. $action;
				
			Yii::app()->sc->collect('php', Yii::app()->sc->getFunctionFromFile(
				'public function action'.$action,
				'protected/controllers/'.$controller
			), false, true);
		}
		elseif($param && is_file($param))
		{
			Yii::app()->sc->collect('php', Yii::app()->sc->getSourceFromFile($param));	
		}
		
		return Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE
	}
	
	# SEE ON "EAjaxJuiDlg" EXT
	public function getControllerRoute()
    {
        if(!empty($this->controllerRoute))
        {
            $route =  $this->controllerRoute;
            if (strpos($route, '/') === false)
                $route = Yii::app()->controller->id . '/' . $route;
        }
        else
            $route = Yii::app()->controller->id;

        return $route;
    }
	
	// public function getAutoComplete($model, $order, $limit=20 )  
	public function actionAutoComplete($limit=20 )  
	{
		if(isset($_GET['term'])&&($keyword=trim($_GET['term']))!==''&&isset($_GET['model']))
		{	
			$model = $_GET['model'];
			$order = $_GET['order'];
			//$model = $this->getModel($model);
			// $suggest=$this->getModel()->{$this->methodName}($keyword, $this->limit, $_GET);  #see 	'class'=>'ext.actions.XSuggestAction',
			// $suggest=$this->getModel($model)->suggestUsername($keyword, $limit, $_GET); #using method class model 'suggestUsername'
			$suggest = $this->suggest($model, $keyword, $order, $limit);
			echo CJSON::encode($suggest);
		}
        else
            echo "PARAMETER KURANG (term, model)";
	}
	
	protected function getModel($model) {
		return CActiveRecord::model($model);
	}
	
	// public function loadModel($id)
	// {
		// $model=TblUserMysql::model()->findByPk($id);
		// if($model===null)
			// throw new CHttpException(404,'The requested page does not exist.');
		// return $model;
	// }
	
	public function suggest($model, $keyword, $order, $limit=20 )  
	{
		$criteria=array(
			'condition'=>$order.' LIKE :keyword',
			'order'=>$order,
			'limit'=>$limit,
			'params'=>array(
				':keyword'=>"$keyword%"
			)
		);

		$models=$this->getModel($model)->findAll($criteria);
		$suggest=array();
		foreach($models as $model) {
			$suggest[] = array(
				'value'=>$model->$order,
				'label'=>$model->$order,
			);
		}
		return $suggest;
	}
	
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			TblUserMysql::model()->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}
	// //--------------------------------------- CODE FROM YII PLAY-GROUND --------------------------------------------//
	// /**
	 // * @var array the portlets of the current page.
	 // */
	// public $leftPortlets=array();
	// public $rightPortlets=array();

	// /**
	 // * @var array the ips of privilege.
	 // */
	// public $ips = array(
		// '127.0.0.1',
		// '::1', // localhost
	// );

	// /**
	 // * initialize
	 // */
	// function init()
	// {
		// parent::init();
		// if (Yii::app()->getRequest()->getParam('printview'))
			// Yii::app()->layout='print';
	// }

	// /**
	 // * @return array behaviors
	 // */
	// public function behaviors()
	// {
		// return array(
			// 'returnable'=>array(
				// 'class'=>'ext.behaviors.XReturnableBehavior',
			// ),
		// );
	// }

	// /**
	 // * @return boolean true if request IP matches given pattern, otherwise false
	 // */
	// public function isIpMatched()
	// {
		// $ip=Yii::app()->request->userHostAddress;

		// foreach($this->ips as $rule)
		// {
			// if($rule==='*' || $rule===$ip || (($pos=strpos($rule,'*'))!==false && !strncmp($ip,$rule,$pos)))
				// return true;
		// }
		// return false;
	// }
	
	/**
	 * Gets RestFul data and decodes its JSON request
	 * @return mixed
	 */
	protected function getInputAsJson()
	{
		return CJSON::decode(file_get_contents('php://input'));
	}

    /**
     * Send raw HTTP response
     * @param int $status HTTP status code
     * @param string $body The body of the HTTP response
     * @param string $contentType Header content-type
     * @return HTTP response
     */
    protected function sendResponse($status = 200, $body = '', $contentType = 'application/json')
    {
        // Set the status
        $statusHeader = 'HTTP/1.1 ' . $status . ' ' . $this->getStatusCodeMessage($status);
        header($statusHeader);
        // Set the content type
        header('Content-type: ' . $contentType);

        echo $body;
        Yii::app()->end();
    }

    /**
     * Return the http status message based on integer status code
     * @param int $status HTTP status code
     * @return string status message
     */
    protected function getStatusCodeMessage($status)
    {
        $codes = array(
            100 => 'Continue',
            101 => 'Switching Protocols',
            200 => 'OK',
            201 => 'Created',
            202 => 'Accepted',
            203 => 'Non-Authoritative Information',
            204 => 'No Content',
            205 => 'Reset Content',
            206 => 'Partial Content',
            300 => 'Multiple Choices',
            301 => 'Moved Permanently',
            302 => 'Found',
            303 => 'See Other',
            304 => 'Not Modified',
            305 => 'Use Proxy',
            306 => '(Unused)',
            307 => 'Temporary Redirect',
            400 => 'Bad Request',
            401 => 'Unauthorized',
            402 => 'Payment Required',
            403 => 'Forbidden',
            404 => 'Not Found',
            405 => 'Method Not Allowed',
            406 => 'Not Acceptable',
            407 => 'Proxy Authentication Required',
            408 => 'Request Timeout',
            409 => 'Conflict',
            410 => 'Gone',
            411 => 'Length Required',
            412 => 'Precondition Failed',
            413 => 'Request Entity Too Large',
            414 => 'Request-URI Too Long',
            415 => 'Unsupported Media Type',
            416 => 'Requested Range Not Satisfiable',
            417 => 'Expectation Failed',
            500 => 'Internal Server Error',
            501 => 'Not Implemented',
            502 => 'Bad Gateway',
            503 => 'Service Unavailable',
            504 => 'Gateway Timeout',
            505 => 'HTTP Version Not Supported',
        );
        return (isset($codes[$status])) ? $codes[$status] : '';
    }
	
	public function downloadfile($filepath){
		if(file_exists($filepath)){
			// Change it based on file extension or type
			$type="application/zip";
			header("Pragma: public");
			header("Content-Type: $type");
			header("Cache-Control: public");
			header("Content-Description: File Transfer");
			header("Content-Disposition: attachment;filename=\"".basename($filepath));
			header('Content-Length: '.filesize($filepath));
			header("Content-Transfer-Encoding: binary");
			header("Expires: 0");
			header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
			ob_clean();
			flush();
			readfile($filepath);
		}
	}
	
	# SAMPLE ENCRYPT / DES
	//define('KEY', 'MYKEYVALUE'); 
	function encrypt($ENTEXT) 
	{ 
		return trim(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, KEY,
			$ENTEXT, MCRYPT_MODE_ECB, mcrypt_create_iv(
			mcrypt_get_iv_size( MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB),
                          MCRYPT_RAND)))); 
	} 
 
	function decrypt($DETEXT) 
	{
		return trim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, KEY,
		base64_decode($DETEXT), MCRYPT_MODE_ECB, 
		mcrypt_create_iv(mcrypt_get_iv_size( 
                       MCRYPT_RIJNDAEL_256,
                      MCRYPT_MODE_ECB), MCRYPT_RAND))); 
	} 
	#sample use
	// $encryptedmessage = encrypt("your message"); 
	// echo decrypt($encryptedmessage);

	# SAMPLE PASSWORD VALIDATION
	public function password_valid(){
		if (!preg_match('~^[a-z0-9]*[0-9][a-z0-9]*$~i',$password)) {
			// $subject is alphanumeric and contains at least 1 number
			$passworderror="Please enter password with digits";
		}
	}
	
	# DELETE FILE ON DIR
	public function file_del_dir(){
		 $dir="folderdirctory/";
		if(file_exists($dir)){
			foreach(glob($dir.'*.*') as $files){
              unlink($files);
			}
		}
	}

	#GENERATE RENDOM PASSWORD GENERATOR
	public function pass_gen(){	
		$length = 10;
		$chars = array_merge(range(0,9), range('a','z'), range('A','Z'));
		shuffle($chars);
		$password = implode(array_slice($chars, 0, $length));
		//echo $password;
	}
	
	# generate dynamic password with numeric, alphanumer
	# You should have to send password type, length like sha1, md5 for password type and numeric value for password length
	function dynamic_password($type='',$length=10){
		$chars = array_merge(range(0,9), range('a','z'), range('A','Z'));
		shuffle($chars);
		$password = implode(array_slice($chars, 0, $length));
		if($type=='md5'){
			$password=md5($password);
		}
		else if($type=='sha1'){
			$password=sha1($password);
		}
		return $password;
	}

	# CONVERT OBJEXT TO ARRAY
	function object_to_array($data) 
	{
		if ((! is_array($data)) and (! is_object($data))) return 'xxx'; //$data;

		$result = array();

		$data = (array) $data;
		foreach ($data as $key => $value) {
			if (is_object($value)) $value = (array) $value;
			if (is_array($value)) 
				$result[$key] = $this->object_to_array($value);
			else
				$result[$key] = $value;
		}
		return $result;
	}
	
	public function refresh_sntaxHL(){
		cs()->scriptMap=array(
			'jquery.js'=>false,
			'shCore.js'=>false,
			'shBrushCss.js'=>false,
			'shBrushPhp.js'=>false,
			'shBrushPlain.js'=>false,
			'shBrushSql.js'=>false,
			'shBrushJScript.js'=>false,
			'shBrushXml.js'=>false,
		);
		cs()->registerScript('sntax', "SyntaxHighlighter.highlight();");
	}
	
	
}
?>
