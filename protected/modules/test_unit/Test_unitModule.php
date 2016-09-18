<?php

class Test_unitModule extends CWebModule
{
	public $password;
	public $ipFilters=array('127.0.0.1','::1');
	public $generatorPaths=array('application.modules.test_unit');
	private $_assetsUrl;
	
	//public $preload=array('bootstrap');
	 
	//protected function preinit() 
	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application
		
		parent::init();
	
		Yii::app()->name='Unit Testing';
		
		# public void setComponents(array $components, boolean $merge=true)
		Yii::app()->setComponents(
			array(
				'errorHandler'=>array(
					'class'=>'CErrorHandler',
					'errorAction'=>$this->getId().'/default/error',
				),
				'user'=>array(
					'class'=>'CWebUser',
					'stateKeyPrefix'=>'gii',
					'loginUrl'=>Yii::app()->createUrl($this->getId().'/default/login'),
				),
				'widgetFactory' => array(
					'class'=>'CWidgetFactory',
					'widgets' => array()
				),
				'bootstrap'=>array(
						'class'=>'ext.bootstrap.components.Bootstrap', // assuming you extracted bootstrap under extensions
						'responsiveCss'=>true, // or true if you want it to be responsive (i.e. change as screen becomes bigger and smaller)
						'coreCss'=>true,
						'yiiCss'=>true,
						'enableJS'=>true,
				),
				'YiiBooster'=>array(
						'class'=>'ext.GII.YiiBooster.components.YiiBooster', // assuming you extracted bootstrap under extensions
						'responsiveCss'=>true, // or true if you want it to be responsive (i.e. change as screen becomes bigger and smaller)
						'coreCss'=>true,
						'yiiCss'=>true,
						'enableJS'=>true,
				),
				'db'=>array(
					'connectionString' => 'mysql:host=localhost;dbname=blog',
					'emulatePrepare' => true,
					'username' => 'root',
					'password' => '',
					'charset' => 'utf8',
					'tablePrefix' => 'tbl_',
				),
				 // 'urlManager'=>array(
					// 'urlFormat'=>'path',
					// 'rules'=>array(
						// /*'<controller:\w+>/<id:\d+>'=>'<controller>/view',
						// '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
						// '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',*/
						// 'gii'=>'gii',
						// 'gii/<controller:\w+>'=>'gii/<controller>',
						// 'gii/<controller:\w+>/<action:\w+>'=>'gii/<controller>/<action>',
					// ),
				// ),
				'mailer' => array(
					'class' => 'EMailer',
					'Host' => 'your.smtp.host',
					'Port' => 465,
					'SMTPAuth' => true,
					'SMTPSecure' => 'ssl',
					'Username' => 'mail account name',
					'Password' => 'mail account password',
					'SMTPAuth' => true,
					'ContentType' => 'text/html',
					'From'     => 'webmaster.myhost.com',
					'FromName' => 'MyHost Webmaster',
					'CharSet'  => 'UTF-8',
				),
			), 
			true);
		
		# IMPORT FROM MAIN APP
		$this->setImport(array(
			'ext.bootstrap.*',
			'ext.bootstrap.widgets.*',
			'test_unit.models.*',
			'test_unit.components.*',
			'ext.MODELS.*',
			'ext.mailer.*',
			'ext.MODELS.interfaces.*',	// FOR MAILER
		));
		
		// import the module-level models and components
		//set module GII
		$this->setModules(array(
			'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'belang',
			'ipFilters'=>array('127.0.0.1','::1'),		// If removed, Gii defaults to localhost only. Edit carefully to taste.
			// 'ipFilters'=>array(...a list of IPs...),
            // 'newFileMode'=>0666,
            // 'newDirMode'=>0777,
			'generatorPaths'=>array(				/** DEFAULT GA DI SET **/
				'application.gii', 
				'ext.Bootstrap.gii',	//#FROM YII-BOOTSTRAP
				'ext.YiiBooster.gii',	
				'ext.e-xgen0_2.giix-core', // giix generators
				), 
			),
		));
		
		//$this->setComponents(array(
			// 'urlManager'=>array(
				// 'urlFormat'=>'path',
				// 'rules'=>array(
					// /*'<controller:\w+>/<id:\d+>'=>'<controller>/view',
					// '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
					// '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',*/
					// 'gii'=>'gii',
					// 'gii/<controller:\w+>'=>'gii/<controller>',
					// 'gii/<controller:\w+>/<action:\w+>'=>'gii/<controller>/<action>',
				// ),
			// ),
	///	));

	}

	
	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
			// this method is called before any module controller action is performed
			// you may place customized code here
			$route=$controller->id.'/'.$action->id;
			// if(!$this->allowIp(Yii::app()->request->userHostAddress) && $route!=='default/error')
				// throw new CHttpException(403,"You are not allowed to access this page.");
				
			// $publicPages=array(
				// 'default/login',
				// 'default/error',
			// );
			
			// if($this->password!==false && Yii::app()->user->isGuest && !in_array($route,$publicPages))
				// Yii::app()->user->loginRequired();
			// else
				return true;	//minimall /default
		}
		else
			return false;
	}
	
	//----------------------------------------------- COPY FROM GII MODULE -----------------------------------------------------//
	public function getAssetsUrl()
	{
		if($this->_assetsUrl===null)
			$this->_assetsUrl=Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('unit_test.assets'));
		return $this->_assetsUrl;
	}

	/*** @param string $value the base URL that contains all published asset files of gii. **/
	public function setAssetsUrl($value)
	{
		$this->_assetsUrl=$value;
	}
	
	/**
	 * Checks to see if the user IP is allowed by {@link ipFilters}.
	 * @param string $ip the user IP
	 * @return boolean whether the user IP is allowed by {@link ipFilters}.
	 */
	protected function allowIp($ip)
	{
		if(empty($this->ipFilters))
			return true;
		foreach($this->ipFilters as $filter)
		{
			if($filter==='*' || $filter===$ip || (($pos=strpos($filter,'*'))!==false && !strncmp($ip,$filter,$pos)))
				return true;
		}
		return false;
	}
}
