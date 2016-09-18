<?php $this->layout='column1';?>

<?php
$this->pageTitle=Yii::app()->name . ' - Print Codes'; 
$this->breadcrumbs=array('PrintCodes',);
?>

<b> Sample on <code>AdminController</code> </b> : <br>
$this->render_script();  -- print current action controller<br>
$this->render_script(array('site/index')); -- print action site/index<br>
$this->render_script('D:\WEB\HTDOCS\yiiProject\yiiTest\console.php');  -- print file <br>
		
<!-------------------------------------------------------------- CTextHighlighter --------------------------------------------->
<div class="myBox">
<b class="badge badge-inverse">CTextHighlighter </b> <br>
#USAGE : <code>$this->beginWidget('CTextHighlighter',array('language'=>'PHP'));</code> <br>

<div class="left" style="width:400px; margin-right:20px">
<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>

<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP'));  ?> 
class test {
    public static function discover($event)
    {
		// check all properties of EWebBrowserEvent
        echo $var;
    }
}
<?php $this->endWidget(); ?>

<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
</div>

<div class="left"><?php Yii::app()->sc->renderSourceBox(); ?></div>
<div class="clear"></div>
</div>


<!-------------------------------------------------------------- ScrCollect + syntaxhighlighter --------------------------------------------->
<div class="myBox">	
<b class="badge badge-inverse"> ScrCollect + syntaxhighlighter </b>

<script type="text/javascript">
	SyntaxHighlighter.config.clipboardSwf = '../../css/clipboard.swf';
	SyntaxHighlighter.all();
</script>

<div class="flash-error">
<b>First load <code>on javascript tag</code> : </b><br>
SyntaxHighlighter.config.clipboardSwf = '../../css/clipboard.swf'; <br>
SyntaxHighlighter.all(); <br>

<b>Work with capture current line : </b><br>	
<code>__LINE__ </code> : <?php echo __LINE__; ?> ( current line number of code)
</div>

<!------------------------------------------------------------ With Tag Html------------------------------------------------------->
<h1> Sample Usage : </h1>

	<b class="label label-info"> Sample using HTM Tag</b>
	<code> pre class="brush: php;"</code>
	
	<pre class="brush: php;">
	function test() : String
	{
		return 10;
	}
	</pre>


<hr>
<!------------------------------------------------------------Basic collect php ------------------------------------------------------->
	<b class="label label-info"> Sample Collect scrip ( with start - end )</b> <br>
	
	<div class="left">
<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP'));  ?> 
Yii::app()->sc->setStart(__LINE__); 
// CONTENT........ 
Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));
Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE
<?php $this->endWidget(); ?>
	</div>
	
	<div class="left">
	<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
	............... code ...............
	<!---- PHP Content ---->
	<?php echo "<br>sample php content..<br>"; ?>
	<!------- HTMLcontent ---->
	<h1> sample html content </h1>
	............... code ...............
	
	<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
	</div>
	
	<div class="left">
	<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>
	</div>
	
	<div class="tpanel left">
		<div class="toggle btn btn-sm btn-primary"><?php echo Yii::t('ui','SC class'); ?></div>
		<div class='scroll'><?php dump( Yii::app()->sc); ?></div>
	</div>
	<div class="clear"></div>

<hr>
<!------------------------------------------------------------ Sample collect from File (*any file) ------------------------------------------------------->
	<b class="label label-info"> Sample collect from File (*any file)</b><br>
	
	<div class="left">
	<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP'));  ?> 
$file ='console.php';
Yii::app()->sc->collect('php', Yii::app()->sc->getSourceFromFile($file));
Yii::app()->sc->renderSourceBox();
	<?php $this->endWidget(); ?>
	</div>
	
	<div class="left">
	<?php
	//$file ='protected/controllers/Web_servicesController.php';
	$file ='console.php';
	Yii::app()->sc->collect('php', Yii::app()->sc->getSourceFromFile($file));	
	Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE
	?>
	</div>
	
	<div class="tpanel left">
		<div class="toggle btn btn-sm btn-primary"><?php echo Yii::t('ui','sc class'); ?></div>
		<div class='scroll'><?php dump( Yii::app()->sc); ?></div>
	</div>
	<div class="clear"></div>

<hr>
<!------------------------------------------------------------  Sample collect from function of File ------------------------------------------------------->
	<b class="label label-info"> Sample collect from function of File</b><br>
	
	<code>getFunctionFromFile($fnc_name, $file, $indent=1) </code> Sample :<br>
	
	<div class="left">
	<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP'));  ?> 
Yii::app()->sc->collect('php', Yii::app()->sc->getFunctionFromFile(
	'public function actionIndex',
	'protected/controllers/WidgetController.php'
), false, true);
Yii::app()->sc->renderSourceBox();  // render result
	<?php $this->endWidget(); ?>
	</div>
	
	<div class="left">
	<?php
	Yii::app()->sc->collect('php', Yii::app()->sc->getFunctionFromFile(
			'public function actionIndex',
			'protected/controllers/WidgetController.php'
		), false, true);
		
	Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE
	?>
	</div>
	
	<div class="tpanel left">
		<div class="toggle btn btn-sm btn-primary"><?php echo Yii::t('ui','sc class)'); ?></div>
		<div class='scroll'><?php dump( Yii::app()->sc); ?></div>
	</div>
	<div class="clear"></div>

<!------------------------------------------------------------ Sample collect from File ( Snippet ) ------------------------------------------------------->
<hr>
	<b class="label label-info"> Sample collect from File ( Snippet )</b><br>
	<code>getSnippetFromFile($str_start str, $str_end str, $file, $indent=1 num)</code> <br>
	
	<div class="left">
	<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP'));  ?> 
$file ='console.php';
Yii::app()->sc->collect('php', Yii::app()->sc->getSnippetFromFile('r', ';', $file));
Yii::app()->sc->renderSourceBox(); 
	<?php $this->endWidget(); ?>
	</div>
	
	<div class="left">
	<?php
	$file ='console.php';
	Yii::app()->sc->collect('php', Yii::app()->sc->getSnippetFromFile('error', 'd', $file));
	Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE
	?>
	</div>
	
	<div class="tpanel left">
		<div class="toggle btn btn-sm btn-primary"><?php echo Yii::t('ui','sc class)'); ?></div>
		<div class='scroll'><?php dump( Yii::app()->sc); ?></div>
	</div>
	<div class="clear"></div>

<hr>
<!------------------------------------------------------------ my custom ------------------------------------------------------->
<b class="label label-info">My costom ( render code with "from" - "to" line number of file ) </b><br>
<code>Yii::app()->sc->getSourceToFrom(104, 117, Yii::app()->viewPath ."\\layouts\\main.php");</code>
<?php 
Yii::app()->sc->getSourceToFrom(104, 117, Yii::app()->viewPath ."\\layouts\\main.php");
?>

<div class="flash-warning">
Gw extend ke new method : <br>
<pre>	
$this->render_script();  -- print current action controller
$this->render_script(array('site/index')); -- print action site/index
$this->render_script('D:\WEB\HTDOCS\yiiProject\yiiTest\console.php');  -- print file 
</pre>
</div>

</div><!--myBox-->