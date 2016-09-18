<?php $this->layout="column2"; ?>
<?php $this->renderPartial('cjuiDialog/_menu'); ?>

<link rel="stylesheet" type="text/css" href="<?php //echo Yii::app()->request->baseUrl; ?>/js/jquery-ui/themes/base/jquery.ui.all.css" />
<script type="text/javascript" src="<?php //echo Yii::app()->request->baseUrl; ?>/js/jquery-ui/ui/jquery.effects.core.js"></script>

<?php
$this->pageTitle=Yii::app()->name . ' - Widget'; 
$this->breadcrumbs=array('CJuiDialog',);
?>

<div class="view2">
<b>CjuiDialog sud include dengan :</b><br>
 jquery.ui.core.js, jquery.ui.widget.js, jquery.ui.mouse.js, jquery.ui.position.js, jquery.ui.accordion.js, jquery.ui.autocomplete.js, jquery.ui.button.js, jquery.ui.datepicker.js, jquery.ui.dialog.js, jquery.ui.draggable.js, jquery.ui.droppable.js, jquery.ui.effect.js, jquery.ui.effect-blind.js, jquery.ui.effect-bounce.js, jquery.ui.effect-clip.js, jquery.ui.effect-drop.js, jquery.ui.effect-explode.js, jquery.ui.effect-fade.js, jquery.ui.effect-fold.js, jquery.ui.effect-highlight.js, jquery.ui.effect-pulsate.js, jquery.ui.effect-scale.js, jquery.ui.effect-shake.js, jquery.ui.effect-slide.js, jquery.ui.effect-transfer.js, jquery.ui.menu.js, jquery.ui.progressbar.js, jquery.ui.resizable.js, jquery.ui.selectable.js, jquery.ui.slider.js, jquery.ui.sortable.js, jquery.ui.spinner.js, jquery.ui.tabs.js, jquery.ui.tooltip.js
</div>


<!-------------------------- CONTENT ---------------------------------->
<a href="http://127.0.0.1/yiidoc/CJuiDialog.html" target="_blank"><b class="txtKet">Documentation CjuiDialog</b></a> | 
<a href="http://127.0.0.1/js/jquery/jquery-ui-1.8.23/development-bundle/demos/#dialog|modal-form" target="_blank"><b class="txtKet">Sample From JQUERY-DIALOG</b></a> |
<a href="http://127.0.0.1/js/jquery/jquery-ui-192/development-bundle/docs/dialog.html" target="_blank"><b class="txtKet">Options</b></a>
<br />

<div class="view2">
<!-- custom css for JQUERY-UI ICON-->
<style>.ui-icon-circle-check { background-position: -208px -192px; }</style>
<h2> CjuiDialog Sample 1</h2>

<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'=>'mydialog', //string 	Returns the ID of the widget or generates a new one if requested.
    // additional javascript options for the dialog plugin
    'options'=>array(
        'title'=>'Dialog box 1',
        'autoOpen'=>true,	//def: false
        'modal'=>false, //If true, on dialog ; other items on the page will be disabled, i.e., cantbe interacted with
		'position'=>array('left top'),  //array/string ( Default: { my: "center", at: "center", of: window } )
		'resizable'=>'false', //default : true
		//'show'=>'slow',  //f and how to animate the showing of the dialog. (default: null)
		//'zIndex'=>0, //integer, default: 1000
        'width'=>550,
        //'height'=>470,
		'show'=>"blind", 
		//'hide'=>"string/number",  # explode, swing, drop, blind, slide,  clip, fade, fold, highlight, puff, pulsate, scale, shake, size, bounce,/number of duration
		'hide'=>1000, 
		'overlay'=>array(
			'backgroundColor'=>'#F00',
			//'opacity'=>'0.5'
		),
		'buttons'=>array(
			'OK'=>'js:function(){ $(this).dialog("close"); return false }',
			'Cancel'=>'js:function(){$(this).dialog("close"); }',
		),
				//'[ { text: "Ok", click: function() { $( this ).dialog( "close" ); } ]',
    ),
		#'actionPrefix'=>'' ,//string 	the prefix to the IDs of the actions.
		//'controller'=>'', //CController 	Returns the controller that this widget belongs to.
		#'cssFile'=>'',//mixed 	the theme CSS file name.
		#'htmlOptions'=>array(),//array 	the HTML attributes that should be rendered in the HTML tag representing the JUI widget.
		//'owner'=>'', //CBaseController 	Returns the owner/creator of this widget.
		#'scriptFile'=>'', //mixed, the main JUI JavaScript file.
		#'scriptUrl'=>'', //string, 	the root URL that contains all JUI JavaScript files.
		#'skin'=>'', //mixed, 	the name of the skin to be used by this widget.
		#'tagName'=>'',//string, the name of the container element that contains all panels (def:DIV).		
		#'theme'=>'', //string 	the JUI theme name.
		#'themeUrl'=>'',//string 	the root URL that contains all JUI theme folders.
		//'viewPath'=>'',//string 	Returns the directory containing the view files for this widget.
));

    echo 'dialog content here';
	echo "<p>
				<span class='ui-icon ui-icon-circle-check' style='float:left; margin:0 7px 50px 0;'></span>
				Your files have downloaded successfully into the My Downloads folder.
			</p>
			<p><span class='ui-icon ui-icon-alert' style='float:left; margin:0 7px 20px 0;'></span>
			These items will be permanently deleted and cannot be recovered. Are you sure?</p>";
	
$this->endWidget('zii.widgets.jui.CJuiDialog');
?>

<?php
// the link that may open the dialog
echo CHtml::link('open dialog (Confirmation with Auto open on load)', '#', array(
   'onclick'=>'$("#mydialog").dialog("open"); return false;',
));
?>

<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>
</div>

<b class="badge">Rendered JS</b><br>
<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
<![CDATA[*/
jQuery(function($) {
	jQuery('#mydialog').dialog(
	{
		'title':'Dialog box 1',
		'autoOpen':true,
		'modal':false,
		'position':['left top'],
		'resizable':'false',
		'width':550,
		'show':'blind',
		'hide':1000,
		'overlay':{'backgroundColor':'#F00'},
		'buttons':{
			'OK':function(){ $(this).dialog("close"); return false },
			'Cancel':function(){$(this).dialog("close"); }
		}
	});
});
/*]]>
<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>
<hr>



<h1>Yii CJuiDialog : Animation</h1>
<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>

<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog',array(
    'id'=>'dialog-animation',
    'options'=>array(
        'title'=>'Dialog box - Animation',
        'autoOpen'=>false,
        'show'=>array(
                'effect'=>'blind',	 # explode, swing, drop, blind, slide,  clip, fade, fold, highlight, puff, pulsate, scale, shake, size, bounce,/number of duration
                'duration'=>1000,
            ),
        'hide'=>array(
                'effect'=>'explode',
                'duration'=>500,
            ),            
    ),
));
    echo 'Animation Dialog Content';
$this->endWidget('zii.widgets.jui.CJuiDialog');
/** End Widget **/
echo CHtml::button('Open Dialog', array(
   'onclick'=>'$("#dialog-animation").dialog("open"); return false;',
));
?>

<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>