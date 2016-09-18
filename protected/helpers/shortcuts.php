<?php

//FIREPHP
function fb($object,$label=null,$type=null,$options=null){
$firephp = FirePHP::getInstance(true);
    switch ($type){
        case 'warn':return $firephp->warn($object,$label,$options);break;
        case 'error':return $firephp->error($object,$label,$options);break;
        case 'info':return $firephp->info($object,$label,$options);break;
        default :return $firephp->log($object,$label,$options);
    }
}


function fb_trace($label){
    $firephp = FirePHP::getInstance(true);
    return $firephp->trace($label);
}


/**
 * This is the shortcut to Yii::app()->clientScript->registerCssFile
 */
function regCssFile($files, $url = 'css', $addBaseUrl = true)
{
	if (!is_array($files))
		$files = array($files);
	foreach ($files as $file)
	{
		$file = ($addBaseUrl) ? bu($url) . '/' . $file . '.css' : $url . '/' . $file . '.css';
		cs()->registerCssFile($file);
	}
}


/**
 * This is the shotcut to Yii::app()->clientScript->registerCoreScript
 */
function regCoreFile($files)
{
	if (!is_array($files))
		$files = array($files);
	foreach ($files as $file)
		cs()->registerCoreScript($file);
}

/**
 * Generates an image tag.
 * @param string $url the image URL
 * @param string $alt the alt text for the image. Images should have the alt attribute, so at least an empty one is rendered.
 * @param integer the width of the image. If null, the width attribute will not be rendered.
 * @param integer the height of the image. If null, the height attribute will not be rendered.
 * @param array additional HTML attributes (see {@link tag}).
 * @return string the generated image tag
 */
function img($url, $alt = '', $width = null, $height = null, $htmlOptions = array())
{
	$htmlOptions['src'] = $url;
	if ($alt !== null)
		$htmlOptions['alt'] = $alt;
	else
		$htmlOptions['alt'] = '';
	if ($width !== null)
		$htmlOptions['width'] = $width;
	if ($height !== null)
		$htmlOptions['height'] = $height;
	return CHtml::tag('img', $htmlOptions);
}


function frontbu($url=null)
{
    static $baseUrl;
    if ($baseUrl===null)
        $baseUrl=str_replace('back','',Yii::app()->getRequest()->getBaseUrl());
    return $url===null ? $baseUrl : $baseUrl.'/'.ltrim($url,'/');
}

function backbu($url=null)
{
    static $baseUrl;
    if ($baseUrl===null)
        $baseUrl=str_replace('front','back',Yii::app()->getRequest()->getBaseUrl());
    return $url===null ? $baseUrl : $baseUrl.'/'.ltrim($url,'/');
}


//returns setting strictly
function setting($key){
    return Yii::app()->settings->$key;
}

//returns setting fallbacks to parameter with same key if it exists in backend_params.php  and frontend_params.php
function setting_param($key) {
    return ( Yii::app()->settings->$key)?Yii::app()->settings->$key:
        ( isset(Yii::app()->params[$key])?Yii::app()->params[$key]:null);
}

function lang()
{
  return Yii::app()->language;
}


/**
 * This is the shortcut to CHtmlPurifier::purify().
 */
function ph($text)
{
	static $purifier;
	if ($purifier === null)
		$purifier = new CHtmlPurifier;
	return $purifier->purify($text);
}

/**
 * Converts a markdown text into purified HTML
 */
function mh($text)
{
	static $parser;
	if ($parser === null)
		$parser = new MarkdownParser;
	return $parser->safeTransform($text);
}

/**
 * This is the shortcut to Yii::app()->db
 * @return CDbConnection
 */
function db()
{
	return Yii::app()->db;
}

/**
 * This is the shortcut to Yii::app()->getRequest
 * @return CHttpRequest object
 */
function r()
{
	return Yii::app()->getRequest();
}

/**	xxxxxxxxxx
 * This is the shortcut to Yii::app()->user->checkAccess().
 */
function allow($operation, $params = array(), $allowCaching = true)
{
	return Yii::app()->user->checkAccess($operation, $params, $allowCaching);
}

/**	XXXXXXXXXXX
 * Ensures the current user is allowed to perform the specified operation.
 * An exception will be thrown if not.
 * This is similar to {@link access} except that it does not return value.
 */
function ensureAllow($operation, $params = array(), $allowCaching = true)
{
	if (!Yii::app()->user->checkAccess($operation, $params, $allowCaching))
		throw new CHttpException(403, Yii::t('error','You are not allowed to perform this operation.'));
	return true;
}


  /**
 * Shortcut for json_encode
 * NOTE: json_encode exists in PHP > 5.2, so it's safe to use it directly without checking
 * @param array $json the PHP array to be encoded into json array
 * @param int $opts Bitmask consisting of JSON_HEX_QUOT, JSON_HEX_TAG, JSON_HEX_AMP, JSON_HEX_APOS, JSON_FORCE_OBJECT.
 */
function je($json, $opts=null)
{
	//return function_exists('json_encode')? json_encode($json) : CJSON::encode($json);
	return json_encode($json, $opts);
}

/**
 * Shortcut for json_decode
 * NOTE: json_encode exists in PHP > 5.2, so it's safe to use it directly without checking
 * @param string $json the PHP array to be decoded into json array
 * @param bool $assoc when true, returned objects will be converted into associative arrays.
 * @param int $depth User specified recursion depth.
 * @param int $opts Bitmask of JSON decode options. 
 *	Currently only JSON_BIGINT_AS_STRING is supported 
 *	(default is to cast large integers as floats)
 */
function jd($json, $assoc=null, $depth=512, $opts=0)
{
	return json_decode($json, $assoc, $depth);
}

  

