<?php $this->layout="column2"; ?>
<?php $this->renderPartial('cjuiDialog/_menu'); ?>

<?php
$this->pageTitle=Yii::app()->name . ' - Dialog basic input'; 
$this->breadcrumbs=array('CJuiDialog_custom',);
?>

<a href="http://127.0.0.1/yiidoc/CJuiDialog.html" target="_blank"><b class="txtKet">Documentation CjuiDialog</b></a> | 
<a href="http://127.0.0.1/js/jquery/jquery-ui-1.8.23/development-bundle/demos/#dialog|modal-form" target="_blank"><b class="txtKet">Sample From JQUERY-DIALOG</b></a> |
<a href="http://127.0.0.1/js/jquery/jquery-ui-192/development-bundle/docs/dialog.html" target="_blank"><b class="txtKet">Options</b></a>
<br />


<div class="view2">
<h2> Input dialog with Javascript callback </h2>
<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
<?php
    $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
        'id'=>'mydialog',
        'options'=>array(
            'title'=>'Add New Item',
           	'width'=>400,
			'height'=>200,
			'show'=>"blind",
			'hide'=>"explode",
			'autoOpen'=>false,
			'resizable'=>false,
            'modal'=>true,
			'overlay'=>array(
				'backgroundColor'=>'#000',
				'opacity'=>'0.5'
			),
            'buttons'=>array(
                'Add Item'=>'js:addItem',
                'Cancel'=>'js:function(){ $(this).dialog("close");}',
            ),
        ),
    ));
	//#load this
    //echo '<div class="dialog_input"><input type="text" id="item-name-input" name="item-name"/></div>';	//--ORI
	echo '<div class="dialog_input"> <input type="text" id="item-name-input" name="item-name"/> </div>';	
	
    $this->endWidget('zii.widgets.jui.CJuiDialog');
?>

<?php  echo CHtml::link('open dialog', '#', array(  'onclick'=>'$("#mydialog").dialog("open"); return false;',  )); ?>
<!--
<form method="post">
	<input name="username" type="text" />
</form>  -->
</div>


<script>
function addItem(){
    $(this).dialog("close");
     alert( $("#item-name-input").val() + " has been added");
}
	
$(function() {
	/*Triggered when the dialog is created. */
	//$( "#dialog-form"  ).dialog({ create: function( event, ui ) { alert('dialog di bukaaaa..');  } });
	/*Bind an event listener to the dialogcreate event: */
	$("#dialog-form").on( "dialogcreate", function( event, ui ) { alert('Trigger dialogcreate..'); } );
	 
	/*confirmasi if close dialog */
	$( "#mydialog" ).on( "dialogbeforeclose", function( event, ui ) {		
				alert('Trigger dialogbeforeclose..'); 
	} );
	
	/*fungsi jika dialog di close*/
	// $( "#dialog-form" ).dialog({
		// close: function( event, ui ) { alert('taaaatahhhh..hh..'); }
	// });
	
/*listen saat dialog close */
	$( "#mydialog" ).on( "dialogclose", function( event, ui ) { alert('Trigger dialogclose.');  } );
	
/*Triggered while the dialog is being dragged.*/
	$("#dialog-form").on( "dialogdrag", function( event, ui ) { alert('Trigger dialogdrag..'); }  );
} );
</script>
<?php Yii::app()->sc->collect('html', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>