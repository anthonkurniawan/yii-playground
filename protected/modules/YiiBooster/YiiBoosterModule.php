<?php
Yii::setPathOfAlias( 'bootstrap',  __DIR__.'/../../../../YII-EXTENSIONS/yiibooster-211');	

class YiiBoosterModule extends CWebModule
{																									
	#--------- CARA 1 ( TAPI MASIH GUNAKAN CONFIG "main.php" pada "yiiTest")
	// public $preload=array('YiiBooster');  #jalankan component "yiiBooster"
        
	// protected function preinit()
	// {
		// $this->setComponents(array(
			// 'YiiBooster'=>array(
				// //'class'=>'admin.extensions.bootstrap.components.Bootstrap', /* assuming you extracted bootstrap under extensions */
				// 'class'=>'ext.gii.YiiBooster.components.Bootstrap', // assuming you extracted bootstrap under extensions
				// //'responsiveCss'=>true, // or true if you want it to be responsive (i.e. change as screen becomes bigger and smaller)
				// //'coreCss'=>true,
				// //'yiiCss'=>true,
				// //'enableJS'=>true,
			// ),
		// ));
		// // $this->setImport(array(									//# LOAD IMPOR DARI DIREKTORI ( modules/Admin )
			// // 'Admin.models.*',
			// // 'Admin.components.*',
		// // )); 
          
		// $this->layout = '/layouts/main2';     //# ATAU BISA DGN ( public function beforeControllerAction($controller, $action) )
		 // //dump($this);
	// }
		
		 /* -- OR -- */
		private $_assetsUrl;
		 
		public function init()
		{
			// this method is called when the module is being created
			// you may place code here to customize the module or the application
		
			parent::init();
	
			Yii::app()->name='YiiBooster';
		
			$this->configure(array(
				'preload'=>array('bootstrap', 'urlManager'),
				'components'=>array(
					'bootstrap'=>array(
						// 'class'=>'ext.gii.YiiBooster.components.Bootstrap',
						//'class'=>'ext.yiibooster-211.components.bootstrap',
						'class'=>'bootstrap.components.bootstrap',
						'coreCss'=>true,	//( bootstrap.css ) : true
						'responsiveCss'=>true, //( bootstrap-responsive.min.css )  :false
						'yiiCss'=>true,	//( bootstrap-yii.css ) : true
						'jqueryCss'=>true, //( jquery-ui-bootstrap.css ) : true
						'enableBootboxJS'=>true,  //( bootstrap.bootbox.min.js ) : true
						'enableJS'=>true,	//$this->registerCoreScripts()	: true
					),
					
					'user'=>array(
						//'class' => 'tambahInfoUser',
						// enable cookie-based authentication
						'allowAutoLogin'=>false,	#kalo pake "remmember me" harus set true (disimpan dlm cookies)
						'authTimeout'=>30,	//3600	//timeout in seconds after which user is logged out if inactive. If this property is not set, the user will be logged out after the current session expires (c.f. CHttpSession::timeout).
						'loginUrl'=>array('default/login'),
					),
					
					// #SESSION CONFIG
					'session' => array (
						'autoStart'=>true, 	#which defaults to true (i.e., always start sessions)
						'sessionName' => 'yii-login',
						'cookieMode' => 'only',	#values of none, allow, and only, equating to: don’t use cookies, use cookies if possible, and only use cookies; #defaults to allow
						#'savePath' => '../tmp_cookies',	#The save path, is where the session data is stored on the server.
															#Note: untuk pake auto logoff jangan di set( coz ga akan bisa masuk login kalo ga di cek "rememmber me")
												//hanging the save path to a directory within your own site can be a security improvement, Alternatively, you can store the session data in a database		#'/path/to/new/directory',
												
						//'cookieParams'=>, 	#for adjusting the session cookie’s arguments, such as its lifetime, path, domain, and HTTPS-only
						//'gCProbability'=>, 	#for setting the probability of garbage collection being performance, with a default of 1, as in a 1% chance
						//'timeout'=>60, 	#for setting after how many seconds a session is considered idle, which defaults to 1440
					),
					
					// uncomment the following to enable URLs in path-format
					'urlManager'=>array(
						'class'=>'CUrlManager',
						'urlFormat'=>'path',
						'rules'=>array(
							'<controller:\w+>/<id:\d+>'=>'<controller>/view',
							'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
							'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
						),
					),
					
				)
			));
			$this->preloadComponents();  #jalankan component "yiiBooster"
			
			
		}
		
		# BISA JUGA GUNAKAN FUNGSI INI UNTUK CONTROL ROUTE NYA
		public function beforeControllerAction($controller, $action)
		{
			if(parent::beforeControllerAction($controller, $action))
			{
				// this method is called before any module controller action is performed
				// you may place customized code here
				$route=$controller->id.'//'.$action->id;
				$controller->layout = 'main';		#set layout "main" pada component
				return true;
			}
			else
				return false;
		}
		
		//----------------------------------------------- COPY FROM GII MODULE ( KALO MO PUBLISH FILE DARI SINI) -----------------------------------------------------//
	// public function getAssetsUrl()
	// {
		// if($this->_assetsUrl===null)
			// $this->_assetsUrl=Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('YiiBooster.assets'));
		// return $this->_assetsUrl;
	// }
	// /*** @param string $value the base URL that contains all published asset files of gii. **/
	// public function setAssetsUrl($value)
	// {
		// $this->_assetsUrl=$value;
	// }
	
}
