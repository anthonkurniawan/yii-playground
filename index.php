<?php
# define ( string $name , mixed $value [, bool $case_insensitive = false ] )
# defined — Checks whether a given named constant exists


defined('YII_TEST') or define('YII_TEST',false);
# defined('LOCAL_DOMAIN') or define('LOCAL_DOMAIN','[localhost or Virtual Host]');
defined('LOCAL_DOMAIN') or define('LOCAL_DOMAIN','localhost');
define('CURRENT_ACTIVE_DOMAIN', $_SERVER['HTTP_HOST']);
defined('APP_DEPLOYED') or define('APP_DEPLOYED', ! (CURRENT_ACTIVE_DOMAIN == LOCAL_DOMAIN));
defined('DS') or define('DS',DIRECTORY_SEPARATOR);

# JIKA TIDAK INGIN ERROR & EXCEPTION HANDLER ( berguna juga saat use REST APP /atau utk ajax reponse )
// const YII_ENABLE_ERROR_HANDLER = false;
// const YII_ENABLE_EXCEPTION_HANDLER = false;

// echo "LOCAL_DOMAIN :" . LOCAL_DOMAIN;
// echo "<br>CURRENT_ACTIVE_DOMAIN :" . CURRENT_ACTIVE_DOMAIN;
// echo "<br>APP_DEPLOYED :"; var_dump(APP_DEPLOYED);


//Local Framework Path
$yii = (!APP_DEPLOYED) ? dirname(__FILE__).DS.'..'.DS.'..'.DS.'FRAMEWORKS'.DS.'yii'.DS .'framework'.DS .'yii.php' :
//Server framework Path
	dirname(__FILE__).DS.'..'.DS.'..'.DS.'frameworks'.DS .'yii'.DS .'FRAMEWORKS'.DS .'yii.php';

// change the following paths if necessary
//$yii=dirname(__FILE__).'/../../YII/yii-1.14/framework/yii.php';

# add helper file
require(dirname(__FILE__).'/protected/helpers/globals.php');
require(dirname(__FILE__).'/protected/helpers/shortcuts.php');
require(dirname(__FILE__).'/protected/helpers/utils.php');

$config=dirname(__FILE__).'/protected/config/main.php';

// remove the following lines when in production mode!!!!!!!!
defined('YII_DEBUG') or define('YII_DEBUG',true);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

require_once($yii);
Yii::createWebApplication($config)->run();
