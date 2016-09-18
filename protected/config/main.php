<?php
Yii::setPathOfAlias( 'ext-coll',  __DIR__.'/../../../yii-extensions');	//dump( realpath(__DIR__.'/../../../YII-EXTENSIONS'));  die();
Yii::setPathOfAlias('ptl',dirname(__FILE__).'/../views/widget/Xportlets');  //BUAT Xportlet
Yii::setPathOfAlias('predis', __DIR__.'/../../../../NOSQL/predis10/src'); 

return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'YII-PLAYGROUND',
	'language'=>'id',  //SET DEFAULT LANG ( for switclang menu)
	'defaultController'=>'site', 

	'preload'=>array(
		'log',				 // preloading 'log' component
		//'bootstrap', 	//# preload the bootstrap component
	),  
	
	//'theme'=>'biskit', // biskit is sub directory name under theme directory
	
	// autoloading model and component classes
	'import'=>array(
		'application.extensions.*',  	
		'application.models.*',				
		//'application.message.message.models.*',
		'application.components.*',		//import all file on folder 'components'
		'application.components.mypredis.*',
		'application.extensions.TConsoleRunner.*',
		'application.extensions.SEARCH_ENGINE.solr.*',
		'application.extensions.SEARCH_ENGINE.YiiSolr-phpnode.*',
		//'application.extensions.tools.metadata.*',
		'application.models.test_ar.*',
		'application.extensions.jtogglecolumn.*',  //ext jtogglecolumn
		'ext.EDataTables.*', 
		'ext.e-xgen0_2.giix-components.*',  //Giix
		'ext.GII.giix-components.*', // giix components
		'ext.GII.gtc.vendors.*',
		//'ext.GII.YiiBooster.components.Bootstrap.*',
		//'application.extensions.OpenFlashChart2Widget.OpenFlashChart2Loader',
		'ext.booster.*',
		#MY-PORTLET
		'application.components.my-x.*',
		'application.components.my-x.myCPortlet.*',
		'application.components.my-x.myMenuPortlet.*',
		'ext-coll.UPLOAD_GALLERY.yii-image.*',
		'ext-coll.UPLOAD_GALLERY.yii-gallery-manager.*',
        'ext-coll.UPLOAD_GALLERY.yii-gallery-manager.models.*',
		'ext-coll.UPLOAD_GALLERY.galleria.*',
		'ext-coll.WYSIWYG_EDITOR.yii-tinymce.*',
		#MONGO-YII
		'ext-coll..NOSQL.MongoYii.*',
		'ext-coll.NOSQL.MongoYii.validators.*',
		'ext-coll.NOSQL.MongoYii.behaviors.*',
		'ext-coll.NOSQL.MongoYii.util.*'
	),

	'modules'=>array(
		// TOOLS GENERATOR(CONTOH UNTUK GENERATE TAMPILAN "DATA USER")
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'belang',
			'ipFilters'=>array('127.0.0.1','::1'), // If removed, Gii defaults to localhost only. Edit carefully to taste. 'ipFilters'=>array(...a list of IPs...),
      // 'newFileMode'=>0666,
      // 'newDirMode'=>0777,
			'generatorPaths'=>array(				/** DEFAULT GA DI SET **/
				'application.gii', 
				'ext.GII.giix191.giix-core',	
				'ext.bootstrap.gii',	//#FROM YII-BOOTSTRAP
				//'ext.GII.YiiBooster.gii',	
				//'ext.GII.gtc',	
				//'ext.e-xgen0_2.giix-core', // giix generators
			), 
		),
		'test_unit'=>array(
			'class'=>'application.modules.test_unit.test_unitModule',
			'generatorPaths'=>array(				/** DEFAULT GA DI SET **/
				'application.modules.test_unit', 
			),
		),
		// 'userGroups'=>array(
			// 'accessCode'=>'belang',
			// // 'salt'=>'Type your salt here',
		// ),
		# FOR MODULE MESSAGE
		// 'message' => array(
            // 'userModel' => 'TblUserMysql',
            // 'getNameMethod' => 'getFullName',
            // 'getSuggestMethod' => 'getSuggest',
        // ),
		'Bootstrap',   //add module yii-bootstrap  (!!ga boleh sama hruf besa/kecil dgn ext bootstrap nya!!)
		'Foundation',    //add module yii-foundation
		'YiiBooster',    //add module YiiBooster
		'notifications'=>array(
			'class' => 'application.modules.notifications.notificationsModule',	
		),
		//'notifications',
		# DATABSE MODULE
		'backup'=>array(
			'class' => 'application.modules.backup1_3.backupModule',	
			'path'=>Yii::app()->basePath .'_backupDB/',	# directory store db
		),
		'jbackup'=>array(
			'path' => Yii::app()->basePath .'_backupDB/', //Directory where backups are saved
			'layout' => '//layouts/column2', //2-column layout to display the options
			'filter' => 'accessControl', //filter or filters to the controller
			'bootstrap' => false, //if you want the module use bootstrap components
			'download' => true, // if you want the option to download
			'restore' => true, // if you want the option to restore
			'database' => true, //whether to make backup of the database or not
			//directory to consider for backup, must be made array key => value array ($ alias => $ directory)
			'directoryBackup'=>array( 
				'folder/'=> __DIR__.'/../../folder/',
			),
			//directory sebe not take into account when the backup
			'excludeDirectoryBackup'=>array(
				__DIR__.'/../../folder/folder2/',
			),
			//files sebe not take into account when the backup
			'excludeFileBackup'=>array(
				__DIR__.'/../../folder/folder1/cfile.png',
			),
			//directory where the backup should be done default Yii::getPathOfAlias('webroot')
			'directoryRestoreBackup'=>__DIR__.'/../../' 
		),
	),

	'components'=>array(

		'user'=>array(	
			'class' => 'tambahInfoUser', //* gw tambah class 'tambahInfoUser' turunan dari (class CWebUser)
			//'class'=>'userGroups.components.WebUserGroups',
			// enable cookie-based authentication
			'allowAutoLogin'=>false,	
			'authTimeout'=>3600,
			'loginUrl'=>array('site/login'),
		),	
		
		# CHttpSession - menyediakan fungsionalitas terkait sesi. -------------------------------------------------------------------
		'session' => array (
			'autoStart'=>true, 	#which defaults to true (i.e., always start sessions)
			'sessionName' => 'yiiPlay',
		),
		# Creates session on DB 
		// 'session' => array(
			// 'class' => 'system.web.CDbHttpSession',
			// 'connectionID' => 'db',
         // ),
		# Sample Session on cache
		 // 'session' => array(
			// 'class' => 'CCacheHttpSession',
		// ),

		#You can configure more properties of every server, including: host, port, persistent, weight, timeout, retryInterval, status. 
		#See http://www.php.net/manual/en/function.memcache-addserver.php for more details. 
		'cache'=>array(
			//'class'=>'CDbCache',	//CMemCache
			'class'=>'CMemCache',
			'servers'=>array(
                array(
                    'host'=>'localhost',	//'127.0.0.1
                    'port'=>11211,
                    'weight'=>60,
                ),
			),
		),
		
		# CRedisCache implements a cache application component based on redis. -- http://redis.io/
		# advanced key-value store. It is often referred to as a data structure server since keys can contain strings, hashes, lists, sets and sorted sets.
		# CRedisCache needs to be configured with hostname, port and database of the server to connect to. By default CRedisCache assumes there is a redis server running on localhost at port 6379 and uses the database number 0. 
		# CRedisCache also supports the AUTH command of redis. When the server needs authentication, you can set the password property to authenticate with the server after connect. 
		// 'cache'=>array(
            // 'class'=>'CRedisCache',
            // 'hostname'=>'192.168.1.2',
            // 'port'=>6379,
            // 'database'=>0,
        // ),
		
		# Auth RBACVIA "authManager" using AUTH FILE. see to config : http://www.yiiframework.com/wiki/65
		'authManager'=>array(
			'class'=>'PhpAuthManager',  # create new class to extend "CPhpAuthManager" to Assigns an authorization item to a user.
			'defaultRoles'=> array('guest') ,  #default role. Everyone who is not the admins, moderators and nick - guests. 
			//'authFile' => 'path'                  // only if necessary
			
			# USING CDbAuthManager ( BASE ON db )
			// 'class'=>'CDbAuthManager',
            // 'connectionID'=>'db',
			// 'defaultRoles'=>array('authenticated', 'guest'),
        ),
		
		// uncomment the following to enable URLs in path-format
		'urlManager'=>array(
			'class' => 'ext.language.XUrlManager',
			'urlFormat'=>'path',
			'showScriptName'=>false,
			//'appendParams'=>false,
			'rules'=>array(                    //?language=id
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
				'site/page/<view:\w+>' => 'site/page/',
				
				#MODULE
				'gii'=>'gii',
				'gii/<controller:\w+>'=>'gii/<controller>',
				'gii/<controller:\w+>/<action:\w+>'=>'gii/<controller>/<action>',
				
				'Bootstrap'=>'Bootstrap',
				'YiiBooster'=>'YiiBooster',
				//'YiiBooster/<controller:\w+>'=>'YiiBooster/<controller>',
				'test_unit'=>'test_unit',
				'Foundation'=>'Foundation',
				//'userGroups'=>'userGroups',
				'notifications'=>'notifications',
				'backup'=>'backup',				
			),
		),
		#REGISTER PACKAGES OF SCRIPTS
		# By default, the core script packages are specified in 'framework/web/js/packages.php'.
		'clientScript'=>array(
			'packages' => array(
				'fancy'=>array(
					//'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',  //alias of the directory containing the script files
					//'basePath'=> 'path.to.my.library', 
					'baseUrl'=> 'js/',   //base URL for the script files   (pass a baseUrl because we don't need to publish )
					'css' => array( 'fancybox/jquery.fancybox.css' ),
					'js' => array( 'fancybox/jquery.fancybox.js' ),
				),
				'sntaxHL'=>array(
					'basePath'=> 'ext.syntaxhighlighter.source', 
					//'baseUrl'=> 'js/',   //base URL for the script files   (pass a baseUrl because we don't need to publish )
					'js' => array( 'src/shCore.js', 'scripts/shBrushCss.js', 'scripts/shBrushPhp.js', 'scripts/shBrushPlain.js', 'scripts/shBrushSql.js', 'scripts/shBrushJScript.js', 'scripts/shBrushXml.js'),
					'css' => array( 'styles/shCore.css', 'styles/shThemeDefault.css' ),
			),
			/*	'YiiBooster'=>array(
					'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',  //alias of the directory containing the script files
					//'basePath'=> 'path.to.my.library', 
					'baseUrl'=> 'js/',   //base URL for the script files   (pass a baseUrl because we don't need to publish )
					'css' => array( 'fancybox/jquery.fancybox.css' ),
					'js' => array( 'fancybox/jquery.fancybox.js' ),
				), */
			/*	'bootstrap'=>array(
					//'basePath'=> 'path.to.my.library',   //alias of the directory containing the script files
					#'baseUrl'=> Yii::getPathOfAlias('bootstrap.assets').'/',   //base URL for the script files   (pass a baseUrl because we don't need to publish )
					'baseUrl'=>'test', //'/extensions.bootstrap/assets',
					'css' => array( 'css/bootstrap.css' ),  //, 'bootstrap-yii.css', 'jquery-ui-bootstrap.css
					'js' => array( 'fancybox/jquery.fancybox.js' ),
				),	*/
			),
		),
		
		# ERROR HANDLER CONFIG -------------------------------
		'errorHandler'=>array(
            'errorAction'=>'site/error',
        ),
		
		# CHttpRequest - menyediakan informasi terkait dengan request penggguna.
		'request'=>array(
            'enableCsrfValidation'=>false,  //**CSRF SECURITY
			'enableCookieValidation'=>true,	 //**Cookie Attack Prevention \B6
		),
		
		// DB CONFIG
		'db'=>array(
		  'connectionString' => 'mysql:host=localhost;dbname=yiitest',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => 'belang',
			'charset' => 'utf8',
			'tablePrefix' => 'tbl_',
		),
	
		// ** sqlite Database
		'db2'=>array(		//** tambah database baru
		    'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',		
			'class'=>'CDbConnection',
		),	
		// ** sqlite Database
		'db3'=>array(		//** tambah database baru
		  'connectionString' => 'mysql:host=localhost;dbname=warehouse',	
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => 'belang',
			'charset' => 'utf8',
			'class'=>'CDbConnection',
		),	
		// ** PDO MSSQL Database (!! Yii uses PHP PDO drivers to connect to different databases !!)
		/*  - download PDO MS EXT
			- Install the Microsoft SQL Server 2008 R2 Native Client
            - Please read: System Requirements (Microsoft Drivers for PHP for SQL Server)
            - read the manual, copy .dll to PHP Ext Dir, and enable this EXT in php.ini.

			example:
				PHP 5.3.5 use: [php_pdo_sqlsrv_53_ts_vc6.dll] [php_sqlsrv_53_ts_vc6.dll]
				PHP 5.3.6 use: [php_pdo_sqlsrv_53_ts_vc9.dll] [php_sqlsrv_53_ts_vc9.dll]
				Note: If you are using WAMP use the thread safe (ts) version */
		'db_pdo_sql'=>array(
			'connectionString' => 'sqlsrv:Server=localhost;Database=AdventureWorksDW2008', 		
			'username' => 'sa',
			'password' => 'belang',
			'charset' => 'GB2312',
			'tablePrefix' => 'tbl_'
			//'class'=>'tambahDB',
			'class'=>'CDbConnection',
		),		
		'mongoDb' => array(
			'class' => 'ext-coll.NOSQL.Yii-MongoDB-Driver-master.src.YMongoClient',	
			'server' => 'mongodb://192.168.1.2:27017',
			'dbName' => 'db_test',
		),
		'mongoYii' => array(
			'class' => 'EMongoClient',
			'server' => 'mongodb://192.168.1.2:27017',
			'db' => 'db_test'
		),
		'nodeSocket' => array(
			'class' => 'application.extensions.yii-node-socket.lib.php.NodeSocket',
			'host' => 'localhost',  // default is 127.0.0.1, can be ip or domain name, without http
			'port' => 3001      // default is 3001, should be integer
		),
		#LOG CONFIG
		#Within the log component section, I enable CWebLogRoute. This is a wonderfully useful debugging tool that adds tons of details to each rendered page. 
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				// array(
					// 'class'=>'CFileLogRoute',
					// 'levels'=>'error, warning',
				// ),
				// uncomment the following to show log messages on web pages (hasil nya akan ada di bawah page )
				array(
					'class'=>'CWebLogRoute',
					'levels'=>'error, warning',   # Defaults to empty, meaning all levels.
				),	
			),
		),
		
		'curl' => array(
			'class' => 'ext.HTTP_REQUEST.yii-curl.Curl',
			//'options' => array(/* additional curl options */),		# JIKA GUNAKAN OPTION DI SINI ( bisa jg di lakukan custom "setOption()" per request aj )
		),
		
		# IMAGE EXTENSION ---------------------------------
		'image' => array(
            'class' => 'CImageComponent',
            'driver' => 'GD',
			 // ImageMagick setup path
            //'params'=>array('directory'=>'D:/Program Files/ImageMagick-6.4.8-Q16'),
        ),
		
		# TAMBAHAN MODULE BY EXTENTIONS ---------------------------------------------------------------------------------
		'predis' => array(
			'class' => 'application.components.mypredis.myPredis',
			'clientOptions' => array(
				'host'     => '192.168.1.2',
				'port'     => 6379,
				'database' => 15
			)
		),
		
		'solarium' => array(
			'class' => 'ext.SEARCH_ENGINE.YiiSolarium.solarium',
			'clientOptions' => array(
				'endpoint' => array(
					'localhost' => array(
						'host' => 'localhost',
						// 'port' => '8089',
					    'port'=>8983,
						'path' => '/solr',
					)
				)
			)
		),
 
		'userSearch'=>array(
            'class'=>'CSolrComponent',
            'host'=>'localhost',
            'port'=>8983,
            // 'indexPath'=>'/solr/user'
			 'indexPath'=>'/solr'
        ),
      'commentSearch'=>array(
            'class'=>'CSolrComponent',
            'host'=>'localhost',
            'port'=>8983,
            'indexPath'=>'/solr/comment'
        ),
		
		# implement dari php ext --need libxml, curl, PECL ) see PHP MANUAL
		// 'solr' => array(
		// //	"class" => "packages.solr.ASolrConnection",
			// 'class'=>'ext.SEARCH_ENGINE.YiiSolr-phpnode.ASolrConnection',
			// "clientOptions" => array(
				// "hostname" => "localhost",
				// "port" => 8983,
				// //"path"=>'solr', //ga usah di set dah default
			// ),
		// ),
		
		# TEST SPELLING
		'solr' => array(
			'class'=>'ext.SEARCH_ENGINE.YiiSolr-phpnode.SolrSpellingConnection',
			"clientOptions" => array(
				"hostname" => "localhost",
				"port" => 8983,
			),
			'servlet_type'=>SolrClient::SEARCH_SERVLET_TYPE,
			'servlet_path'=>'spell'
		),
	
		 'mailer' => array(
            'class' => 'application.extensions.mailer.EMailer',
        ),
		'excel'=>array(
                  'class'=>'application.extensions.EXCEL_PDF.PHPExcel',   //Yii::app()->excel;
				  //'class'=>'PHPExcel',
         ),
	/*	'bootstrap'=>array(											//#FROM YII-BOOTSTRAP
			'class'=>'ext.bootstrap.components.bootstrap', // assuming you extracted bootstrap under extensions
			'coreCss'=>true,	//( bootstrap.css ) : true
			'responsiveCss'=>true, //( bootstrap-responsive.min.css )  :false
			'yiiCss'=>true,	//( bootstrap-yii.css ) : true
			'jqueryCss'=>true, //( jquery-ui-bootstrap.css ) : true
			'enableBootboxJS'=>true,  //( bootstrap.bootbox.min.js ) : true
			'enableJS'=>true,	//$this->registerCoreScripts()	: true
		),  */
		'booster' => array(
			//'class' => 'aliased.path.to.booster.directory.and.inside.it.Bootstrap.class'
			'class' => 'ext.yiibooster-211.components.bootstrap',
		),
		'bootstrap' => array(
			//'class' => 'aliased.path.to.booster.directory.and.inside.it.Bootstrap.class'
			// 'class' => 'ext.yii-bootstrap-210.components.bootstrap',
			'class' => 'ext-coll.yiibooster-211.components.bootstrap',
		),
		//ext browser 0.1
		'browser' => array(
			'class' => 'ext.BROWSER_INFO.CBrowserComponent',
		),
		 'counter' => array(
            'class' => 'UserCounter',
        ),
		'sc'=>array(
			'class' => 'application.components.SrcCollect',
		),
		'metadata'=>array('class'=>'application.components.Metadata'),
		
		# Once installing a view renderer as a 'viewRenderer' application component, the normal view rendering process will be intercepted by the renderer. 
		# The renderer will first parse the source view file and then render the the resulting view file. 
		# Parsing results are saved as temporary files that may be stored under the application runtime directory or together with the source view file.
		# NOTE : default not to set, default view rendering logic implemented in CBaseController.- class IViewRenderer
		'viewRenderer' => array(
			'class' => 'CPhpViewRenderer'
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		'uploadDir'=>'upload/',
		'fromEmail' => 'blaquecry@gmail.com',
        'replyEmail' => 'blaquecry@gmail.com',
        'myEmail'=>'blaquecry@gmail.com',
        'gmail_password'=>'valentine',
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
		'defaultPageSize'=>5, //set default fo pagesize cgridview
		'solr_cfg' => array(
			'hostname' => 'localhost',
			'login'    => '',
			'password' => '',
			'port' => 8983,
			//'wt'=>'json',		# if not set -- default is "xml"
		),
	),
	// 'params'=>require(dirname(__FILE__).'/params.php'),
	
	// add for (yii-feed-widget)
	'controllerMap'=>array(
		'YiiFeedWidget' => 'ext.FEED.yii-feed-widget.YiiFeedWidgetController'
	),
	
);
