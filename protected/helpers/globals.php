<?php
#Use shortcut functions to reduce typing 
#CUSTOM ISI FILE SESUAI DENGAN KEBUTUHAN!!

/**
 * This is the shortcut to DIRECTORY_SEPARATOR
 */
defined('DS') or define('DS',DIRECTORY_SEPARATOR);
 
/**
 * This is the shortcut to Yii::app()
 */
function app()
{
    return Yii::app();
}
 
/**
 * This is the shortcut to Yii::app()->clientScript
 */
function cs()
{
    // You could also call the client script instance via Yii::app()->clientScript
    // But this is faster
    return Yii::app()->getClientScript();
}
 
/**
 * This is the shortcut to Yii::app()->user.
 res : array user data
 */
function user() 
{
    return Yii::app()->getUser();
}
 
/**
 * This is the shortcut to Yii::app()->createUrl()
 sample : url('site/index', array('data'=>1))
 */
function url($route,$params=array(),$ampersand='&')
{
    return Yii::app()->createUrl($route,$params,$ampersand);
}
 
/**
 * This is the shortcut to CHtml::encode
 */
 function h($text, $limit = 0)
{
	if ($limit && strlen($text) > $limit && ($pos = strrpos(substr($text, 0, $limit), ' ')) !== false)
		$text = substr($text, 0, $pos) . ' ...';
	return htmlspecialchars($text, ENT_QUOTES, Yii::app()->charset);
}

// function h($text)
// {
    // return htmlspecialchars($text,ENT_QUOTES,Yii::app()->charset);
// }
 
/**
 * This is the shortcut to CHtml::link()
 */
function l($text, $url = '#', $htmlOptions = array()) 
{
    return CHtml::link($text, $url, $htmlOptions);
}
 
/**
 * This is the shortcut to Yii::t() with default category = 'stay'
 */
function t($message, $category = 'stay', $params = array(), $source = null, $language = null) 
{
    return Yii::t($category, $message, $params, $source, $language);
}
 
/**
 * This is the shortcut to Yii::app()->request->baseUrl
 * If the parameter is given, it will be returned and prefixed with the app baseUrl.
 */
function bu($url=null) 
{
    static $baseUrl;
    if ($baseUrl===null)
        $baseUrl=Yii::app()->getRequest()->getBaseUrl();
    return $url===null ? $baseUrl : $baseUrl.'/'.ltrim($url,'/');
}
 
/**
 * Returns the named application parameter.
 * This is the shortcut to Yii::app()->params[$name].
 */
function param($name) 
{
    return Yii::app()->params[$name];
}

//-------------------------------------------------------- ADDING FROM USER CONTRIBUTES --------------------------------------------
#Additional SESIONS shortcut functions
#the following additional session shortcut functions.

function sess($key = null, $value = null)
{
	if (!empty ($key) && !empty ($value)) {
		return Yii::app()->session[$key] = $value;
	}
	elseif (!empty ($key)) {
		return Yii::app()->session[$key];
	}
	else {
		return Yii::app()->session;
	}
}
 
function getSessArr() {
	return sess()->toArray();
}
 
function getSessId() {
	return sess()->sessionID;
}
 
function regenSessId() {
	return sess()->regenerateId();
}
 
function printSess() 
{
	echo '<pre>';
	foreach (getSessArr() as $key => $value) {
		echo '  '.$key .' -> '.$value.'<br/>';
	}
	echo '</pre>';
}
 
function removeSess($key) {
	return sess()->remove($key);
}
 
function destroySess() {
	return sess()->destroy();
}


/**
 * Displays a variable.
 * This method achieves the similar functionality as var_dump and print_r
 * but is more robust when handling complex objects such as Yii controllers.
 * @param mixed variable to be dumped
 * @param integer maximum depth that the dumper should go into the variable. Defaults to 10.
 * @param boolean whether the result should be syntax-highlighted
 */
function dump($target, $depth=10, $highlight = true)
{
	echo CVarDumper::dumpAsString($target, $depth, $highlight);
}
// function dump($var) {
        // CVarDumper::dump($var, 10, true);
        // return $var;
// }
 
/**
 * Shortcut to Yii::trace()
 * @param mixed $x the message to trace
 * @return mixed the argument passed in
 * @param bool $export to var_export the value of $x
 */
function trace($x, $export = false) {
        Yii::trace($export ? var_export($x, true) : $x);
        return $x;
}

/**
 * @return CAuthManager Yii::app()->authManager
 */
function aut_mgr() {
    return Yii::app()->getAuthManager();
}

/**
 * Sets or gets user state. getter if $val is null. setter otherwise
 * @param string $key state store key
 * @param null $val key for the stored data
 * @return mixed the stored data
 */
function state($key, $val = null) {
        if ($val === null)
                return Yii::app()->getUser()->getState($key);
        else
                return Yii::app()->getUser()->getState($key, $val);
}

/**
 * Quotes a string value for use in a query.
 * @param string $s string to be quoted
 * @return string the properly quoted string
 * @see http://www.php.net/manual/en/function.PDO-quote.php
 */
function q($s) {
        return Yii::app()->db->quoteValue($s);
}

/**
 * @param string $str subject of test for integerness
 * @return bool true if argument is an integer string
 */
function intStr($str) {
        return !!preg_match('/^\d+$/', $str);
}
?>