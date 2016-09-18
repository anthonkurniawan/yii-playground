<?php $this->layout='column1'; ?>
<?php
$this->pageTitle=Yii::app()->name . ' - browser';
$this->breadcrumbs=array('browser',);			
?>
 
<div class="myBox">
	<b class="badge badge-inverse">Browser 0.1</b><br>

	<a href="http://www.yiiframework.com/extension/BROWSER_INFO/" target="_blank">browser extendsion</a><br><br>
	simple wraper for the Browser Class, which is included.  Check the Browser Class often for new browsers or platforms. <br>
	
	<pre style="font-size:10px" class="left">
	<b>config/main.php</b>
	'components'=>array(
		..................................
		'browser' => array(
			<code>'class' => 'ext.BROWSER_INFO.CBrowserComponent',</code>
		),
	</pre>

	<div class="tpanel right">
		<div class="toggle btn btn-sm btn-primary"><?php echo Yii::t('ui','myBox File Browser class'); ?></div>
		<div><?php $this->render_script('protected/extensions/BROWSER_INFO/Browser.php'); ?></div>
	</div>
	<div class="tpanel right">
		<div class="toggle btn btn-sm btn-primary"><?php echo Yii::t('ui','myBox File CBrowserComponent class'); ?></div>
		<div class='scroll'><?php $this->render_script('protected/extensions/BROWSER_INFO/CBrowserComponent.php'); ?></div>
	</div>
	<div class="tpanel right">
		<div class="toggle btn btn-sm btn-primary"><?php echo Yii::t('ui','Browser Class'); ?></div>
		<div class='scroll'><?php dump(Yii::app()->browser); ?></div>
	</div>
	<div class="clear"></div>
	
	<b>Sample Usage :</b><br>
	<code>Yii::app()->browser->getBrowser() :</code><?php echo Yii::app()->browser->getBrowser(); ?> <br>
	<code>Yii::app()->browser->getPlatform() :</code> <?php echo Yii::app()->browser->getPlatform(); ?><br>
</div>


<!------------------------------------------------------------------------- EwebBrowser --------------------------------------------------------------->
<div class="myBox">
	<b class="badge badge-inverse"> EwebBrowser </b><br>
	Hampir sama dgn browser0.1 ext tapi berbeda dgn ini yg di bungkus pada "extends CComponent"<br>

	<div class="left">
	<?php Yii::app()->sc->setStart(__LINE__);  ?>
	<?php 
	Yii::import('ext.BROWSER_INFO.EWebBrowser');
	
	$b = new EWebBrowser();
	//echo '__toString<br>';
	echo $b;
	echo '<h3>Api class : </h3>';
	echo 'user agent: '.$b->userAgent.'<br>';
	echo 'platform: '.$b->platform.'<br>';
	echo 'version: '.$b->version .'<br>';
	echo 'browser: '.$b->browser.'<br>';
	echo 'is Chrome? '.($b->browser == EWebBrowser::BROWSER_CHROME?'YES':'NO');
	?>
	<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
	</div>
	
	<div class="left">
	<?php Yii::app()->sc->renderSourceBox(); ?>
	</div>
	
	<div class="tpanel right">
		<div class="toggle btn btn-sm btn-primary"><?php echo Yii::t('ui','EwebBrowser Class'); ?></div>
		<div class='scroll'><?php $this->render_script('protectedextensions/browser_info/EWebBrowser.php'); ?></div>
	</div>
	<div class="clear"></div>
	
<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP'));  ?> 
#f you wish to rather use an event approach, do the following (assuming you have a class with static method 'discover'):
// the class handling the browser discovery
class ETest {
    //put your code here
    public static function discover($event)
    {
                // check all properties of EWebBrowserEvent
                echo $event->browser_name. '<br/>';
                echo $event->agent. '<br/>';
                echo $event->version . '<br/>';
                echo $event->platform . '<br/>';
                echo $event->os . '<br/>';
    }
}
 
// now on creation it will call the static method above
$b = new EWebBrowser(null, array('ETest','discover'));
<?php $this->endWidget(); ?>
</div>

<!------------------------------------------------------------------------- myBrowser --------------------------------------------------------------->
<div class="myBox">
	<b class="badge badge-inverse"> Using class myBrowser on component</b><br>
	<code>Yii::import('myBrowser');  </code> ( di import dulu file yg terletak pada dir "component" /atau ga usah coz dah di set pada config/main.php)<br><br>
	
	<code>myBrowser::detect() </code><br>
	<?php 
	//Yii::import('myBrowser'); klo sudah di dlm dir component sudah di import pada config/main.php
	dump(  myBrowser::detect() ); 
	?>
	
	<div class="tpanel right">
		<div class="toggle btn btn-sm btn-primary"><?php echo Yii::t('ui','myBrowser Class'); ?></div>
		<div class='scroll'>
		<?php
		Yii::app()->sc->collect('php', Yii::app()->sc->getFunctionFromFile(
			'class myBrowser',
			'protected/components/myBrowser.php'
		), false, true);
		
		Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE
		?>
		</div>
	</div>
	<div class="clear"></div>
</div>

