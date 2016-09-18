<?php $this->layout='column1';?> 
<?php $this->pageTitle='CFlex'; ?>

	<b class="badge">CFlexWidget</b><br>
	<a href="http://localhost/yiidoc/CFlexWidget.html" target="_blank" style="float:right">CFlexWidget</a><br />
	CFlexWidget embeds a Flex 3.x application into a page.<br>
	To use CFlexWidget, set name to be the Flex application name (without the .swf suffix), and set baseUrl to be URL (without the ending slash) of the directory containing the SWF file of the Flex application.<br><br>

	<?php //echo CHtml::link('sample Flex with Login Form', array('widget/cflex_login_form', 'view'=>'cflex_login_form') ); ?>
	<?php echo CHtml::link('sample Flex with Login Form', 'http://localhost/yii/demos/phonebook', array('target'=>'_blank') ); ?>

<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>

<?php 
$this->widget('CFlexWidget',array(
	'baseUrl'=>Yii::app()->baseUrl.'/swf_sample',
	//'baseUrl'=>'http://localhost/yii/demos/phonebook/flex/bin',
	'name'=>'header',
	'width'=>'800',
	'height'=>'300',
	'align'=>'left',
	'flashVars'=>array(
		'wsdl'=>$this->createUrl('phonebook'),
	))); 
?>

<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>

<div class="clear"></div>

<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>

<!----------------------------------------- RENDERED SCRIPT  -------------------------------------------------------->
<div class="tpanel">
	<div class="toggle btn"><?php echo Yii::t('ui','View Remdered Script'); ?></div>
	<div>
<?php $this->beginWidget('CTextHighlighter',array('language'=>'HTML')); ?>

<script type="text/javascript" src="/yii/yiiTest/swf_sample/AC_OETags.js"></script>
<script type="text/javascript" src="/yii/yiiTest/swf_sample/history/history.js"></script>

<script type="text/javascript">
/*<![CDATA[*/
// Version check for the Flash Player that has the ability to start Player Product Install (6.0r65)
var hasProductInstall = DetectFlashVer(6, 0, 65);

// Version check based upon the values defined in globals
var hasRequestedVersion = DetectFlashVer(9, 0, 0);

// Check to see if a player with Flash Product Install is available and the version does not meet the requirements for playback
if ( hasProductInstall && !hasRequestedVersion ) {
	// MMdoctitle is the stored document.title value used by the installation process to close the window that started the process
	// This is necessary in order to close browser windows that are still utilizing the older version of the player after installation has completed
	// DO NOT MODIFY THE FOLLOWING FOUR LINES
	// Location visited after installation is complete if installation is required
	var MMPlayerType = (isIE == true) ? "ActiveX" : "PlugIn";
	var MMredirectURL = window.location;
	document.title = document.title.slice(0, 47) + " - Flash Player Installation";
	var MMdoctitle = document.title;

	AC_FL_RunContent(
		"src", "/yii/yiiTest/swf_sample/playerProductInstall",
		"FlashVars", "MMredirectURL="+MMredirectURL+'&MMplayerType='+MMPlayerType+'&MMdoctitle='+MMdoctitle+"",
		"width", "800",
		"height", "300",
		"align", "left",
		"id", "header",
		"quality", "high",
		"bgcolor", "#FFFFFF",
		"name", "header",
		"allowScriptAccess","sameDomain",
		"allowFullScreen","",
		"type", "application/x-shockwave-flash",
		"pluginspage", "http://www.adobe.com/go/getflashplayer"
	);
} else if (hasRequestedVersion) {
	// if we've detected an acceptable version
	// embed the Flash Content SWF when all tests are passed
	AC_FL_RunContent(
		"src", "/yii/yiiTest/swf_sample/header",
		"width", "800",
		"height", "300",
		"align", "left",
		"id", "header",
		"quality", "high",
		"bgcolor", "#FFFFFF",
		"name", "header",
		"flashvars","wsdl=%2Fyii%2FyiiTest%2Findex.php%2Fwidget%2Fphonebook%3Flanguage%3Did",
		"allowScriptAccess","sameDomain",
		"allowFullScreen","",
		"type", "application/x-shockwave-flash",
		"pluginspage", "http://www.adobe.com/go/getflashplayer"
	);
} else {  // flash is too old or we can't detect the plugin
	var alternateContent = 'Konten ini memerlukan <a href=\"http://www.adobe.com/go/getflash/\">Adobe Flash Player<\/a>.';
	document.write(alternateContent);  // insert non-flash content
}
/*]]>*/
</script>
<noscript>
	<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000"
		id="header"
		width="800"
		height="300"
		codebase="http://fpdownload.macromedia.com/get/flashplayer/current/swflash.cab">
			<param name="movie" value="/yii/yiiTest/swf_sample/header.swf" />
			<param name="quality" value="high" />
			<param name="bgcolor" value="#FFFFFF" />
			<param name="flashVars" value="wsdl=%2Fyii%2FyiiTest%2Findex.php%2Fwidget%2Fphonebook%3Flanguage%3Did" />
			<param name="allowScriptAccess" value="sameDomain" />
			<param name="allowFullScreen" value="" />
			<embed src="/yii/yiiTest/swf_sample/header.swf"
				quality="high"
				bgcolor="#FFFFFF"
				width="800"
				height="300"
				name="header"
				align="left"
				play="true"
				loop="false"
				quality="high"
				allowScriptAccess="sameDomain"
				allowFullScreen=""
				type="application/x-shockwave-flash"
				pluginspage="http://www.adobe.com/go/getflashplayer">
			</embed>
	</object>
</noscript>
	<?php $this->endWidget(); ?>
</div>
</div>