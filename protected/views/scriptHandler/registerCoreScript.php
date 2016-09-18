pada contoh gw aplikasikan <code>tooltip</code> nya JUI JQUERY dmn file script yg dibutuhkan adalah :<br>
D:\WEB\HTDOCS\yii-1.13\framework\web\js\source\jui\css\base\jquery-ui.css<br>
D:\WEB\HTDOCS\yii-1.13\framework\web\js\source\jui\js\jquery-ui.min.js<br><br>
pada kerja nya kedua file tersebut sudah di publish terlebih dahulu di dalam <code>folder assets</code> saat aplikasi default YII load pertama kali.<br>
berikut utk mengetahui alamat folder scriptfile yg sudah di publish :<br>
<code>Yii::app()->ClientScript->CoreScript;</code>:<?php echo Yii::app()->clientScript->coreScriptUrl; ?><br>
<code>Yii::app()->getClientScript()->getCoreScriptUrl().'/jui/css'</code> : <?php echo Yii::app()->getClientScript()->getCoreScriptUrl().'/jui/css'; ?><br><br>

<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
<!-------- JS  REGISTER on package ( see main.php and package.php )---------->
<?php //Yii::app()->clientScript->registerCoreScript('jquery.ui'); ?>
<!-------- CSS REGISTER --------->
<?php 
// $cs = Yii::app()->getClientScript();
// $path = $cs->getCoreScriptUrl().'/jui/css/base/';
// // $cs->registerCssFile( $path.'jquery.ui.tooltip.css'); 
// $cs->registerCssFile( $path.'jquery-ui.css'); 
?>

<?php 
#public CClientScript registerScript(string $id, string $script, integer $position=NULL)
// Yii::app()->clientScript->registerScript('tooltip', "
	// $('.tooltip').tooltip();
// ");		
?>
<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>

<?php echo CHtml::link('see at new window', array('scriptHandler/registerCoreScript'), array('target'=>'_blank'));?>


<p><a class="tooltip" title="A tooltip with default settings, the href is displayed below the title" href="http://google.de">Tooltip sample Link</a><p>

<ul>
<li> Sample Register Script on View</li>
<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>

<li> Sample Register Script on Controller</li>
<?php $this->render_script( array('scriptHandler/RegisterCoreScript') ); ?>
</ul>

