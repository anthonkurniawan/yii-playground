<?php

// This is the configuration for yiic console application.
// Any writable CConsoleApplication properties can be configured here.
//Yii::setPathOfAlias( 'ext-coll',  __DIR__.'/../../../YII-EXTENSIONS');	//dump( realpath(__DIR__.'/../../../YII-EXTENSIONS'));  die();

return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'My Console Application',

	'import'=>array(
		'application.models.*',
		'application.components.*',
	),
	
	// preloading 'log' component
	//'preload'=>array('log'),

	// application components
	'components'=>array(
		// 'db'=>array(
			// 'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		// ),
		'db'=>array(
			// ** MySQL database
			'connectionString' => 'mysql:host=localhost;dbname=yiiTest',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
			//'class'=>'CDbConnection', //** tidak di set pun tdak ada (default)
		),
		'nodeSocket' => array(
            'class' => 'application.extensions.yii-node-socket.lib.php.NodeSocket',  
            //'class' => 'application.extensions.yii-node-socket.lib.php.NodeSocketCommand',
			'host' => 'localhost',  // default is 127.0.0.1, can be ip or domain name, without http
			'port' => 3001      // default is 3001, should be integer
		),
		// 'log'=>array(
			// 'class'=>'CLogRouter',
			// 'routes'=>array(
				// array(
					// 'class'=>'CFileLogRoute',
					// 'levels'=>'error, warning',
				// ),
			// ),
		// ),
	),
	
	#Tip: Dengan mengkonfigurasi CConsoleApplication::commandMap, seseorang juga dapat memiliki kelas command 
	#dengan konvensi penamaan yang berbedan dan terletak di direktori yang berbeda.
	// 'commandMap'=> array(
		// 'migrate'=> array(
			// 'class'=>'system.cli.commands.MigrateCommand',
			// 'interactive'=> false,		//interactive=0 rather than --interactive=false
		// ),
	// ),

	// 'commandMap'=>array(
        // 'migrate'=>array(
            // 'class'=>'system.cli.commands.MigrateCommand',
            // 'migrationPath'=>'application.migrations',
            // 'migrationTable'=>'tbl_migration',
            // 'connectionID'=>'db',
           // // 'templateFile'=>'application.migrations.template',
        // ),
	// ),
	'commandMap' => array(
		'node-socket' => 'application.extensions.yii-node-socket.lib.php.NodeSocketCommand'
	)
);