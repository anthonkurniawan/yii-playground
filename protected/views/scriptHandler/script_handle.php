
<div class="view2">
	<b class="badge">refresh()</b> <code>refresh(integer $seconds, string $url='')</code><br>
	Registers a 'refresh' meta tag. This method can be invoked anywhere in a view. It will register a <code>'refresh' meta tag</code> with CClientScript so 
	that the page can be refreshed in the specified <code>seconds</code>.
	will render <code>Yii::app()->clientScript->registerMetaTag($content,null,'refresh');</code><br>
	<b>Sample :</b><br> 
	<code>echo CHtml::refresh(200); </code> <?php echo CHtml::encode('<meta http-equiv="refresh" content="200" />'); ?><br>
	<?php //echo CHtml::refresh(200); ?>
	<code>echo CHtml::refresh(2, array('site/index')); </code> 
	<?php echo CHtml::encode('<meta http-equiv="refresh" content="2;/yii/yiiTest/index.php/site/index?language=id" />'); ?>
</div>

<div class="view2">
	<b class="badge">script() </b> <code>script(string $text)</code> Encloses the given JavaScript within a script tag.<br>
	<code>echo CHtml::script('alert("test");'); </code><br>
	<?php //echo CHtml::script('alert("test");'); ?>
	<b>will render :</b><br>
	<?php echo CHtml::encode('<script type="text/javascript"> /*<![CDATA[*/alert("test");/*]]>*/ </script>');?>
</div>

<div class="view2">
	<b class="badge">scriptFile()</b> <code>scriptFile(string $url)</code>Includes a JavaScript file..<br>
	<code>echo CHtml::scriptFile( bu().'/js/right_menu.js' ); </code><br>
	<?php //echo CHtml::scriptFile( bu().'/js/right_menu.js' ); ?>
	<b>will render :</b><br>
	<?php echo CHtml::encode('<script type="text/javascript" src="/yii/yiiTest/js/right_menu.js"></script>');?>
</div>

<h3>Cara Register File</h3>

<div class="view2">
	<span class="badge">CSS File</span><br>
	<code>registerCssFile(string $url, string $media='')</code>
	
	<?php $this->beginWidget('CTextHighlighter',array('language'=>'HTML'));  ?> 
	<link rel="stylesheet" type="text/css" href="<? echo bu("/css/screen.css") ?> /> <!--same as-->
	<link rel="stylesheet" type="text/css" href="<? echo Yii::app()->request->baseUrl; ?>/css/screen.css" />
	<!----------- OR ------->
	cs()->registerCssFile("/css/screen.css", "print");  
	<?php $this->endWidget(); ?>  
	<span class="badge">CSS Code</span><br>
	<code>registerCss(string $id, string $css, string $media='')</code>
</div>


<div class="view2">
<b class="badge">Registers a piece of javascript code.</b>
<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP'));  ?> 
#public CClientScript registerScript(string $id, string $script, integer $position=NULL)
$cs = Yii::app()->getClientScript();  
$cs->registerScript(
	'link',        //ID that uniquely identifies this piece of JavaScript code
	"$('#link').click(function(){ alert('test LINK'); });		//click function
	function add() {	alert('test ADD'); } "				//define function
	,CClientScript::POS_END   //the position of the JavaScript code (  POST_END "click_function dan "own  define function" ok )
);

#Valid values include the following: ( IF NOT SET : Defaults to CClientScript::POS_READY.)
// CClientScript::POS_HEAD : the script is inserted in the head section right before the title element.
// CClientScript::POS_BEGIN : the script is inserted at the beginning of the body section.
// CClientScript::POS_END : the script is inserted at the end of the body section.
// CClientScript::POS_LOAD : the script is inserted in the window.onload() function									
// CClientScript::POS_READY : the script is inserted in the jQuery ready function.
<?php $this->endWidget(); ?>
</div>

<div class="view2">
<b class="badge">Registers a javascript file.</b>
<code>#public CClientScript registerScriptFile(string $url, integer $position=NULL)</code><br>
<b>Sample :<b>
<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP'));  ?> 
Yii::app()->clientScript->registerScriptFile(
	Yii::app()->baseUrl . '/components/js/myScript.js',
	CClientScript::POS_END
	);

/*---- OR ---*/
Yii::app()->clientScript
  ->registerScriptFile('/path/to/script/file.js')
  ->registerScriptFile('/path/to/another/script/file.js');
<?php $this->endWidget(); ?>
  </div>

<div class="view2">
<b class="badge">registerCoreScript(string $name)</b><br>
Registers a script package that is listed in <b>packages</b>. <br>
default packag dapat di liat di <code>system.web.js.package.php</code>( D:\WEB\HTDOCS\YII\yii-1.14\framework\web\js) atau bisa juga di cutom/add new pada <code>main.php</code><br>
sample : <code>Yii::app()->clientScript->registerCoreScript('jquery.ui'); </code>
<?php //dump(Yii::import('system.web.js.package.php')); ?>
<?php dump(Yii::app()->clientScript->corePackages ); ?>
</div>

<!----------- contoh register Packages ---------------------->
<div class="view2">
<?php Yii::app()->clientScript->registerPackage('fancy'); ?>

<b class="badge">Registers a script package that is listed in <b class="txtKet">packages.</b> This method is the same as <b class="txtKet">registerCoreScript.</b></b>
<code>registerPackage(string $name)</code>
<a href="http://localhost/yiidoc/CClientScript.html#registerPackage-detail" target="_blank" style="float:right">registerPackage</a><br>
<br>info : http://danaluther.blogspot.com/2012/03/using-packages-with-clientscript.html <br><br>
http://localhost/yiidoc/CClientScript.html#packages-detail
<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP'));  ?> 
# in config/main.php
array(
  'package-name'=>array(
    'basePath'=>'alias of the directory containing the script files',
    'baseUrl'=>'base URL for the script files',
    'js'=>array(),	//list of js files relative to basePath/baseUrl
    'css'=>array(),	//list of css files relative to basePath/baseUrl
    'depends'=>array(),  //list of dependent packages
  ),
  //......
);

#in view
Yii::app()->clientScript->registerPackage('fancy');
<?php $this->endWidget(); ?>  
	<div class="tpanel">
		<div class="toggle btn"><?php echo Yii::t('ui','package array'); ?></div>
		<div class='scroll'><?php dump( Yii::app()->clientScript->packages); ?></div>
	</div>
</div>

<div class="view2">
	<b class="badge">CGoogleApi.</b><br>
	<a href="http://localhost/yiidoc/CGoogleApi.html" target="_blank" style="float:right">CGoogleApi.</a><br />
	CGoogleApi provides helper methods to easily access the Google API loader. (load script from google.api)
	
	<pre>
	<code>init()</code>  Renders the jsapi script file.  CGoogleApi
	<code>load()</code>  Loads the specified API module. CGoogleApi
	<code>register()</code>  Registers the specified API module. CGoogleApi
	</pre>

	<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP'));  ?> 
        echo CGoogleApi::init();
        echo CHtml::script(
                CGoogleApi::load('jquery','1.4.4')/* . "\n" .
                CGoogleApi::load('jquery.ajaxqueue.js') . "\n" .
                CGoogleApi::load('jquery.metadata.js')*/
		); 
	<?php $this->endWidget(); ?>
</div>

<!------------------------------- To avoid including core scripts twice ---------------------------->
<div class="view2">
<b class="badge">To avoid including core scripts twice or disable script</b><br><br>
If your scripts have already been included through an earlier request, use this to avoid including them again:
<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP'));  ?> 
// For jQuery core, Yii switches between the human-readable and minified
// versions based on DEBUG status; so make sure to catch both of them
Yii::app()->clientScript->scriptMap['jquery.js'] = false;
Yii::app()->clientScript->scriptMap['jquery.min.js'] = false;

/* --- OR --- */
$cs=Yii::app()->clientScript;
$cs->scriptMap=array(
	'jquery.js'=>false,
	'jquery.min.js'=>false,
);
//script map is not for renderning files 
<?php $this->endWidget(); ?>  

If you have views that are being rendered both independently and as HTML fragments to be included with AJAX, 
you can wrap this inside if (<code>Yii::app()->request->isAjaxRequest</code>) to cover all bases.<br><br>
<b class="badge">Cara disable script/css file</b><br><br>
<code>Yii::app()->getClientScript()->scriptMap=array('jquery.js'=>false, 'styles.css'=>false); </code><br>
<code>YII::app()->clientscript->packages['bootstrap.js']=false;	</code><br>
<code>YII::app()->clientscript->scriptMap = array('jquery-ui.min.js'=>false, 'jquery-ui.css'=>false);</code><br>
<code>YII::app()->clientscript->packages = array('bootstrap.js'=>false, 'bootstrap-yii'=>false,  );</code><br>
<code>YII::app()->clientscript->reset();</code><br>
</div>

<!------------------------------- To avoid including jQuery scripts twice (JS solution) ---------------------------->
<div class="view2">
<b class="badge">To avoid including jQuery scripts twice (JS solution)</b><br><br>
There's also the possibility of preventing scripts from being included twice on the client side. This is not directly supported and slightly more cumbersome, 
<br>but in practice it works fine and it does not require you to know on the server side what's going on at the client side (i.e. which scripts have been already included).

<br>The idea is to get the HTML from the server and simply strip out the <code> "script" tags with regular expression replace</code>. <br>
The important point is you can detect if jQuery core scripts and plugins have already been loaded (because they create $ or properties on it) and do this conditionally:

<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP'));  ?> 
function stripExistingScripts(html) {
    var map = {
        "jquery.js": "$",
        "jquery.min.js": "$",
        "jquery-ui.min.js": "$.ui",
        "jquery.yiiactiveform.js": "$.fn.yiiactiveform",
        "jquery.yiigridview.js": "$.fn.yiiGridView",
        "jquery.ba-bbq.js": "$.bbq"
    };

    for (var scriptName in map) {
        var target = map[scriptName];
        if (isDefined(target)) {
            var regexp = new RegExp('<script.*src=".*' +
                                    scriptName.replace('.', '\\.') +
                                    '".*</script>', 'i');
            html = html.replace(regexp, '');
        }
    }
    return html;
}
<?php $this->endWidget(); ?>  

Theres a map of filenames and objects that will have been defined if the corresponding script has already been included; 
pass your incoming HTML through thiss functionn and it will check for and remove <code> "script" </code> tags that correspond to previously loaded scripts.<br>

The helper function isDefined is this:
<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP'));  ?> 
function isDefined(path) {
    var target = window;
    var parts = path.split('.');

    while(parts.length) {
        var branch = parts.shift();
        if (typeof target[branch] === 'undefined') {
            return false;
        }
        target = target[branch];
    }
    return true;
}
<?php $this->endWidget(); ?>  
</div>

<!------------------------------- To avoid attaching event handlers twice ---------------------------->
<div class="view2">
<b class="badge">To avoid attaching event handlers twice</b><br><br>
You can simply use a Javascript object to remember if you have already attached the handler; if yes, do not attach it again. For example (view code):

<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP'));  ?> 
Yii::app()->clientScript->registerScript("view-script","
  window.myCustomState = window.myCustomState || {}; // initialize if not exists
  if (!window.myCustomState.liveClickHandlerAttached) {
    window.myCustomState.liveClickHandlerAttached = true;
    $('.link').live('click',function(){
       alert('test');
    })
  }
");
<?php $this->endWidget(); ?>  

</div>




