<?php $this->layout='column2';?>
<?php
$this->pageTitle=Yii::app()->name . ' JQuery - Jorn Zafferer'; 
$this->breadcrumbs=array('tooltip',);
?>

<?php $this->renderPartial('tooltip/_menu'); ?>

<?php
// $cs=Yii::app()->clientScript;
		  // $cs->registerScriptFile($this->assets.'/jquery.toastmessage.js'); 
Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js//jquery-tooltip/jquery.tooltip.js'); 
//Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/jquery-tooltip/jquery.bgiframe.js'); 
//Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/jquery-tooltip/jquery.dimensions.js');  //GA PAKE GPP
Yii::app()->clientScript->registerCssFile(Yii::app()->request->baseUrl.'/js/jquery-tooltip/jquery.tooltip.css'); 
Yii::app()->clientScript->registerCssFile(Yii::app()->request->baseUrl.'/js/jquery-tooltip/screen.css'); 
?>		  
<!--<link rel="stylesheet" href="../jquery.tooltip.css" />
<link rel="stylesheet" href="screen.css" />-->

<style type="text/css">
.loading {
    background-color: #eee;
    background-image:  url(<?php Yii::app()->request->baseUrl;?>'../../images/loading/black_loading5.gif');
	background-position:  center center;
    background-repeat: no-repeat;
    opacity: 1;
}
div.loading * { opacity: .8; }
</style>

<a href="http://docs.jquery.com/Plugins/Tooltip" target="_blank">Tooltip JQuery-Dokumentasi</a> |
<a href="http://localhost/HTDOCS/TESTING/JQUERY_TESTER/jquery-tooltip/demo/index.html" target="_blank">Demo</a> |
<a href="http://bassistance.de/jquery-plugins/jquery-plugin-tooltip/" target="_blank">Jorn Zafferer jQuery plug-in </a>
<br><br>

<b class="txtTitle">Sample Tooltip ( Test with Jorn Zafferer jQuery plug-in )</b><br>

<!------------------------------------------------------------------------- SAMPLE -------------------------------------------------------------------------------->
<fieldset id="set1">
	<legend>Three elements with tooltips, default settings</legend>
	<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
	<a title="A tooltip with default settings, the href is displayed below the title" href="http://google.de">Link to google</a><br/>
	<label title="A label with a title and default settings, no href here" for="text1">Input something please!</label><br/>
	<input title="Note that the tooltip disappears when clicking the input element" type="text" value="Test" name="action" id="text1"/>
		
	<script type="text/javascript">
	$(function() {
		$('#set1 *').tooltip();
	});
	</script>
	<?php Yii::app()->sc->collect('html', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
	<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>
</fieldset>

<!-------------------------------------------------------------- SAMPLE WITH IMAGE-------------------------------------------------------------------------->
<fieldset>
	<legend>An image with a tooltip</legend>
	<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
	<img class="pic" src="<?php echo bu();?>/images/48.jpg" height="40" title="The src value is displayed below the title" />
	<a href="#" class="pic" src="<?php echo Yii::app()->request->baseUrl; ?>/images/48.jpg"> link</a>

	<script type="text/javascript">
	$(function() {
		$('.pic').tooltip({
			delay: 0,
			showURL: false,
			bodyHandler: function() {
				return $("<img/>").attr("src", this.src);
			}
		});
	});
	</script>
<?php Yii::app()->sc->collect('html', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>
</fieldset>
	

<!-------------------------------------------------------------- SAMPLE WITH AJAX CALL-------------------------------------------------------------------------->
<fieldset>
	<legend>An ajax with a tooltip</legend>
	<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
	<a class="ajax1" href="#" /> test ajax with link</a><br>
	<span class="ajax1" href="/HTDOCS/yiiProject/yiiTest/index.php/ajax/req1">Ajax with Tags (span) </span>.<br>
	<?php  echo CHtml::link('Yii Link',array('/widget_CgridView/view?id=1'), array ('class'=>'ajax2' ) ); ?><br><br>
	
	<script type="text/javascript">
	$('.ajax1').tooltip({
		delay: 0,
		showURL: false,
		bodyHandler: function() {
			var result = $("<span/>").html("<div class='loading'>..</div>"); 	
			$.get("/HTDOCS/yiiProject/yiiTest/index.php/ajax/req1", {id: "myid"}, function(data) {result.html(data);}, "html"); 
			return result; 
		}
	});
	
	$('.ajax2').tooltip({
		delay: 0,
		showURL: false,
		bodyHandler: function() {
			var result = $("<span/>").html("<div class='loading'>..</div>"); 	
			//$('#tooltip').addClass("loading");
			//var result = $("<span/>").addClass("loading");
		
			$.ajax({
				url: $(this).attr("href"),
				//url:'/HTDOCS/yiiProject/yiiTest/index.php/ajax/req1',
				//url:'http://localhost/HTDOCS/yiiProject/yiiTest/index.php/widget_CgridView/view?id=1',
				success: function(html){ result.html(html); }
			});
			return result; 
		}
	});
	</script>
	<?php Yii::app()->sc->collect('html', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
	<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>
</fieldset>


<fieldset>
		<legend>Tooltips with extra classes. Useful for different tooltip styles on a single page.</legend>
		<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
		<b><span id="fancy" title="You are dead, this is hell. - Please note the custom positioning here!" style="color:green">this id "fancy" text, </span>
		<span id="fancy2" title="You are dead, this is hell. - Please note the custom positioning here!" style="color:purple">and this id "fancy2"  text, </span>
		<span id="pretty" title="I am pretty! - I am a very pretty tooltip, I need lot's of attention from buggers like you! Yes!" style="color:orange">and last this id "pretty" text.</span></b>

	<script type="text/javascript">
		$("#fancy, #fancy2").tooltip({
			track: true,
			delay: 0,
			showURL: false,
			fixPNG: true,
			showBody: " - ",
			extraClass: "pretty fancy",
			top: -15,
			left: 5
		});
		
	$('#pretty').tooltip({
		track: true,
		delay: 0,
		showURL: false,
		showBody: " - ",
		extraClass: "pretty",
		fixPNG: true,
		left: -120
	});
	</script>
	<?php Yii::app()->sc->collect('html', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
	<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>
</fieldset>
