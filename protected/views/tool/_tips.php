<?php $this->layout='column1';?> 
<style>
.container {width:1100px; }
</style>

<?php $this->pageTitle=Yii::app()->name . ' - Tips & trick'; ?>

<?php echo CHtml::link('view in new tab', array('cek/tips', 'view'=>'tips'), array('class'=>'right', 'target'=>'_blank') ); ?> <br>

<div class="view" style="padding:5px">
	<b class="txtTitle">Virtual Attributes get / set  defined with get/set functions (in CComponent)</b><br>
	http://www.yiiframework.com/wiki/167/understanding-virtual-attributes-and-get-set-methods/
	
	<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?> <!--
	private var $_fullname;
 
	public function getFullName(){
		if(isset($this->_fullname)) {
			return $this->_fullname;
		}
 
		$this->_fullname = $this->firstname . " " . $this->lastname;
		return $this->_fullname;
	}
   
   # in a view somewhere
	echo $form->dropDownList($model, 'personid',
		CHtml::listData( Person::model()->findAll(), 'id', 'fullname' )
	);
	-->
	<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
	<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>
	
	Note that the get/set functions can be called directly as functions (but requiring the usual function-call parentheses):

	<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?> <!--
	$x = $model->fullname;
	$x = $model->getFullname();        // same thing
 
	$model->active = 1;
	$model->setActive(1);              // same thing
	-->
	<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
	<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>
	
	Note that Yii uses get/set functions very heavily internally, so when reviewing the class references, <br>
	any function beginning with "set" or "get" can generally be used as an attribute.
	
	<b>Other sample<b> <br>
	<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?> <!--

    /* Private variable that stores time in unix timestamp format */

    protected $_updateTime;

    public function rules() {
        $rules = parent::rules();
        return CMap::mergeArray($rules, array(
                    array('updateTime', 'numerical', 'integerOnly' => true, 'on' => 'view,list,update'),
        ));
    }

    /* Connects our _updateTime to the active record's update_time field */
    public function attributeMap() {
        return array(
            'updateTime' => 'update_time'
        );
    }

    /** Getter for updateTime */
    public function getUpdateTime(){
        if ($this->scenario=="update"){
            // the input is coming from user and is returned back to active record
            return date('Y-m-d H:i', $this->_updateTime);
        } else {
            // api time is represented as unix timestamp
            return $this->_updateTime;
        }
    }

    /* Setter for updateTime */
    public function setUpdateTime($value){
        if (is_int($value)){
            // Field is already stored as a timestamp
            $this->_updateTime = $value;
        } else {
            // Field is a datetime string, so convert it to a timestamp
            $this->_updateTime = strtotime($value);
        }
    }
}
```
-->
<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>
	
Notice that there is no `updateTime` attribute defined in the class. The user input value is stored into the private `_updateTime` variable.
	
</div>


<div class="view" style="padding:5px">
	<b class="txtTitle">Pengalamatan URL</b><br>
	<ul>
	<li>realpath(dirname(__FILE__) . '/..') : <?php dump( realpath(dirname(__FILE__) . '/..') ); ?>
	<li>YII_PATH : <?php dump( YII_PATH );?></li>
	<li>DIRECTORY_SEPARATOR. 'to folder' : <?php dump( DIRECTORY_SEPARATOR.'to folder' );?></li>
	<li>__DIR__  : <?php dump( __DIR__ );?></li>
	<li>fungsi current file : __FILE__ : <?php dump(  __FILE__ ); ?></li>
	<li>dirname(__FILE__) : <?php dump( dirname(__FILE__) ) ; ?></li>
	<li>dirname(__FILE__).'/../to/path' : <?php dump( dirname(__FILE__).'/../to/path') ; ?></li>
	<li> getcwd() <?php dump( getcwd() ) ?></li>
	
	<li> $this->createUrl('index') : <?php dump($this->createUrl('index') ); ?> </li>
	<li>Yii::app()->request->baseUrl : <?php dump( Yii::app()->request->baseUrl ); ?></li>
	<li>grid view base : <?php dump( Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('zii.widgets.assets')).'/gridview' ); ?></li>
	<li>$this->getLayoutFile('main') : <?php dump( $this->getLayoutFile('main') ); ?></li>
	
	<li>Yii::getPathOfAlias('bootstrap') : <?php dump( Yii::getPathOfAlias('bootstrap') ); ?></li>
	<li>Yii::getPathOfAlias('bootstrap.assets') : <?php dump( Yii::getPathOfAlias('bootstrap.assets') ); ?>

	<?php dump( preg_replace('/\s+/', '.', 'test') ); ?>
	</ul>
	
	<div class="tpanel">
	<div class="toggle btn"><?php echo Yii::t('ui','View ( dump($_SERVER) )'); ?></div>
		<?php dump( $_SERVER ); ?>
	</div>
		
</div>

<div class="view2">
sqlite<br>

If you're like me and have never used sqlite before...

>sqlite3 /wwwroot/blog/protected/data/blog.db
SQLite version 3.4.2
Enter ".help" for instructions
sqlite> .read /wwwroot/yii/demos/blog/protected/data/schema.sqlite.sql
sqlite> .quit
</div>


<div class="view2">
<b> Develope VS Production</b><br>
You'll want debugging enabled when developing a site, but disabled once live. To disable debuggin, remove or comment out that line. I normally just comment it out,<br> so that I can re-enabled debugging later. Or you can change it to something like this, so that you can add debugging to a page on the fly:<br>
<code>if (isset($_GET['debug'])) define('YII_DEBUG', true);</code><br>
If you do that, then to debug any page on the fly, change the URL from, for example, <code>www.example.com/index.php/site/contact to www.example.com/index.php/site/contact/debug/true.</code>

<p>
The next line of code dictates how many levels of "call stack"are shown in a message log:
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

The "call stack"is a history of what files, functions, etc., are included, invoked, and so forth. With a framework, the simple loading of the home page could easily involve a dozen actions. In order to limit the logged (i.e., recorded) data to the most recent, useful information, the call stack is limited by that line to just the most recent three actions.
</p>
</div>

<div class="view2">
<b class="badge">choose cookie-based or session-based??</b><br>
 I use sessions when security is more of an issue or you need to store more data. I use cookies when less data needs to be stored <br>or the data needs to be stored for longer time periods. I couldn't speak to the performance concerns in detail except that cookies require the data to be sent back<br> and forth with each request, which can impact the network performance.<br>
 
 <?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP', 'tabSize'=>1));  ?> 
 Yii::app()->session['var'] = 'value';
 echo Yii::app()->session['var']; // Prints "value"
 cara unset session : <br>
 cth :unset(Yii::app()->session['index']);

 #If your site will not be using sessions at all, you would want to disable them by adding of protected/config/main.php:
'session' => array (
    'autoStart' => false,
),

#If you are using sessions, for security purposes, you may want to change the session's name, always require cookies, and change the save path:
'session' => array (
    'sessionName' => 'Site Access',
    'cookieMode' => 'only',
    'savePath' => '/path/to/new/directory',
),

/*The save path, in case you're not familiar with it, is where the session data is stored on the server. By default, this is a temporary directory, 
globally readable and writable. Every site running on the sever, if there are many (and shared hosting plans can have dozens on a single server), 
share this same directory. This means that any site on the server can read any other site's stored session data. For this reason, changing the save
 path to a directory within your own site can be a security improvement. Alternatively, you can store the session data in a database. 
 To do that, add this code to the "components"section of protected/config/main.php: */
 
'session' => array (
    'class' => 'system.web.CDbHttpSession',
    'connectionID' => 'db',
    'sessionTableName' => 'actual_table_name',
),

Finally, when the user logs out, you may want to formally eradicate the session. 
To do so, call Yii::app()->session->clear() to remove all of the session variables. 
Then call Yii::app()->session->destroy() to get rid of the actual data stored on the server.
 <?php $this->endWidget(); ?>	
</div>

 <div class="view2">
 <b class="badge">configurations-for-different-environments</b><br>
 http://www.hollowdevelopers.com/2011/05/14/yii-framework-separate-configurations-for-different-environments/<br>
 Another method for differentiating environments is to edit the index.php file. Based on a PHP server variable, a different configuration file can be used.
<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP', 'tabSize'=>1));  ?> 
switch ($_SERVER['SERVER_NAME']) {
    case "development":
        $config=dirname(__FILE__).'/protected/config/development.php';
        break;
    default:
        $config=dirname(__FILE__).'/protected/config/production.php';
        break;
}

To make things easier, you can just include the variables that will differ in your development/production configuration files. 
A third file can be used to hold all shared variables. For instance, your shared configuration file can look like:

return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'Application Name',
	............
);

Then, each of the environment-specific variables can go into the development or production.php configuration files.
 return CMap::mergeArray(
        require(dirname(__FILE__) . '/shared.php'),
<?php $this->endWidget(); ?>	
</div>

<div class="view2">
<b>Way to Forcing Login for All Pages in Yii </b><br>
http://www.larryullman.com/2010/07/20/forcing-login-for-all-pages-in-yii/ <br>

<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP', 'tabSize'=>1));  ?> 
#add on main.php#
'behaviors' => array(
    'onBeginRequest' => array(
        'class' => 'application.components.HarusLogin'
    )
),
By placing this within the primary array, it applies to the application as a whole, as opposed to a specific component or module. This code associates 
one class with the onBeginRequest behavior. This is to say that every time a request is made, an instance of the RequireLogin class should be created.

#create a file called "HarusLogin.php" and store it in the protected/components directory#
#That file needs to define the RequireLogin class, which should be an extension of the Yii CBehavior class#
class RequireLogin extends CBehavior
{
	#This method will receive the application as an argument
	#The attachEventHandler() function attaches to the application an event handler, saying that when the onBeginRequest event occurs, 
	#this class's handleBeginRequest() method should be called
	public function attach($owner)
	{
		$owner->attachEventHandler('onBeginRequest', array($this, 'handleBeginRequest'));
	}
	
	public function handleBeginRequest($event)
	{
		#the condition checks if the user is a guest, which is to say they aren't logged in, and that $_GET['r'] does not have a value of site/login
		if (Yii::app()->user->isGuest && !in_array($_GET['r'],array('site/login'))) {
			Yii::app()->user->loginRequired();
		}
		
		#If you wanted to allow access to other pages, just add those values to the array: #
		//if (Yii::app()->user->isGuest && ( !isset($_GET['r']) || $_GET['r'] != 'site/login') )
		if (Yii::app()->user->isGuest && !in_array($_GET['r'],array('site/login', 'site/index', 'site/contact'))) {
			Yii::app()->user->loginRequired();
		}
	}
}
<?php $this->endWidget(); ?>

<b>Noted :</b>
<ul>
<li> in_array($_GET['r'],array('site/login'))) won't work when urlManager is enabled </li>
<li>if you have path urls the line needs to be:
if (Yii::app()->user->isGuest && !in_array($_SERVER['REQUEST_URI'],array('/site/login'))) </li>
<li>By default Yii doesn't store host information in returnUrl function (it stores only "/some/path" without "http://company.website.com". (i.e. http://company.website.com/some/path).
<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP', 'tabSize'=>1));  ?> 
class WebUser extends CWebUser {

    // some code here

    public function loginRequired() {
        $app=Yii::app();
        $request=$app->getRequest();

        if(!$request->getIsAjaxRequest())
            $this->setReturnUrl($request->hostInfo.'/'.$request->pathInfo); <----- here

        if(($url=$this->loginUrl)!==null) {
            if(is_array($url)) {
                $route=isset($url[0]) ? $url[0] : $app->defaultController;
                $url=$app->createUrl($route,array_splice($url,1));
            }
            $request->redirect($url);
        }
        else
            throw new CHttpException(403,Yii::t('yii','Login Required'));
    }
}
<?php $this->endWidget(); ?>
</li>

</ul>
</div>


<div class="view" style="padding:5px">
<b class="txtTitle">Contoh Create Direktori</b>
	<div class="tpanel">
	<div class="toggle"><?php echo Yii::t('ui','View code'); ?></div>
	<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP')); ?>
	 //Create the folder and give permissions if it doesnt exists
	if( !is_dir( $path ) ) {
                mkdir( $path );
                chmod( $path, 0777 );
            }
			
	 //Now lets create the corresponding models and move the files
            foreach( $userImages as $image ) {
                if( is_file( $image["path"] ) ) {
                    if( rename( $image["path"], $path.$image["filename"] ) ) {
                        chmod( $path.$image["filename"], 0777 );
                        $img = new Image( );
                        $img->size = $image["size"];
                        $img->mime = $image["mime"];
                        $img->name = $image["name"];
                        $img->source = "/images/uploads/{$this->id}/".$image["filename"];
                        $img->somemodel_id = $this->id;
                        if( !$img->save( ) ) {
                            //Its always good to log something
                            Yii::log( "Could not save Image:\n".CVarDumper::dumpAsString( 
                                $img->getErrors( ) ), CLogger::LEVEL_ERROR );
                            //this exception will rollback the transaction
                            throw new Exception( 'Could not save Image');
                        }
                    }
                } else {
                    //You can also throw an execption here to rollback the transaction
                    Yii::log( $image["path"]." is not a file", CLogger::LEVEL_WARNING );
                }
		
		#controller (fadepreciation.php)
		if(isset($_POST['FaDepreciation']))
        {
            //Assign our safe attributes
            $model->attributes=$_POST['FaDepreciation'];
            //Start a transaction in case something goes wrong
            $transaction = Yii::app( )->db->beginTransaction( );
            try {
                //Save the model to the database
                if($model->save()){
                    $transaction->commit();
                    $this->redirect(array('view','id'=>$model->id));
                }
            } catch(Exception $e) {
                $transaction->rollback( );
                Yii::app( )->handleException( $e );
            }
            if($model->save())
                $this->redirect(array('view','id'=>$model->id));
        }
		<?php $this->endWidget(); ?>
		</div>
</div>

<div class="view" style="padding:5px">
	<b class="txtTitle">Use shortcut functions to reduce typing</b><br>
	<a href="http://www.yiiframework.com/wiki/31/" target="_blank" style="float:right">Dokumentasi Use shorctcut global.php</a><br />

	We may save the definition to these shortcut functions in a file named <b class="txtKet">globals.php</b> under the protected directory.<br>
	Then, in the entry script <b class="txtKet">index.php</b>, we include the file at the beginning:<br>
	<b class="txtKet">
	require('path/to/globals.php');<br>
	require('path/to/yii.php');<br>......</br></b>
	Now, we can use these global functions anywhere in our application code. For example, to access the current user, <br>we can use <b class="txtKet">user()</b>, instead of the lengthy <b class="txtKet">Yii::app()->user.</b>
</div>

Sample :<br>
<div class="ket txtHead"><b class="txtKet">array Yii::app()->user : <br></b> 
<?php  print_r( Yii::app()->user ); ?>
</div>

<pre class="txtAtt">
Note: Do not use these shortcut functions in components that you intend to release as reusable extensions. 
Doing so would make your components unusable if the shortcut functions used are not defined in a different application. 
Also pay attention if the shortcut functions cause conflict with third-party libraries used in the application.
</pre>

<div class="ket"><b class="txtHead"> PENGUNAAN : SESSIONS (using on global function in global.php):<br></b> 
<ul>
<li><b class="txtKet">sess(); OR return Yii::app()->session; </b></li> <?php CVarDumper::dump( sess(), 10, true); ?>
<li><b class="txtKet">getSessArr(); OR return sess()->toArray(); </b></li> <?php CVarDumper::dump( getSessArr(), 10, true); ?>
<li><b class="txtKet">getSessId(); OR return sess()->sessionID; </b></li> <?php CVarDumper::dump( getSessId(), 10, true); ?>
<li><b class="txtKet">regenSessId() ; OR return sess()->regenerateId();</b></li> <?php CVarDumper::dump( regenSessId(), 10, true); ?>
<li><b class="txtKet">removeSess($key); OR return sess()->remove($key); </b></li> 
<li><b class="txtKet">destroySess(); OR return sess()->destroy(); </b></li> 
</div>

<div class="view2">
Sample get Browser using php function :
<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>

<?php
echo $_SERVER['HTTP_USER_AGENT'] . "\n\n";
$browser = get_browser($_SERVER['HTTP_USER_AGENT']);
dump($browser);
?>

<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>
</div>