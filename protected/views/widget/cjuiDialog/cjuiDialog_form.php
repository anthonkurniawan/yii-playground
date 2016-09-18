<?php
$this->pageTitle=Yii::app()->name . ' - Widget'; 
$this->breadcrumbs=array('CJuiDialog Form',);
?>

<style>
	.container { width:1050px}
		body { font-size: 62.5%; }
		label, input { display:block; }
		input.text { margin-bottom:12px; width:95%; padding: .4em; }
		fieldset { padding:0; border:0; margin-top:25px; }
		h1 { font-size: 1.2em; margin: .6em 0; }
		div#users-contain { width: 350px; margin: 20px 0; }
		div#users-contain table { margin: 1em 0; border-collapse: collapse; width: 100%; }
		div#users-contain table td, div#users-contain table th { border: 1px solid #eee; padding: .6em 10px; text-align: left; }
		.ui-dialog .ui-state-error { padding: .3em; }
		.validateTips { border: 1px solid transparent; padding: 0.3em; }
</style>

<a href="http://localhost/HTDOCS/yii-1.12/yii-docs-1.1.12/api/CJuiDialog.html" target="_blank"><b class="txtKet">Documentation CjuiDialog</b></a> | 
<a href="http://localhost/HTDOCS/TESTING/JQUERY_TESTER/jquery-ui-1.8.23/development-bundle/demos/#dialog|modal-form" target="_blank"><b class="txtKet">Sample From JQUERY-DIALOG</b></a> |
<a href="http://localhost/HTDOCS/TESTING/JQUERY_TESTER/jquery-ui-192/development-bundle/docs/dialog.html" target="_blank"><b class="txtKet">Options</b></a>
<br />


<div class="view2" style="width:580px; float:right">
<b>CjuiDialog sud include dengan :</b><br>
 jquery.ui.core.js, jquery.ui.widget.js, jquery.ui.mouse.js, jquery.ui.position.js, jquery.ui.accordion.js, jquery.ui.autocomplete.js, jquery.ui.button.js, jquery.ui.datepicker.js, jquery.ui.dialog.js, jquery.ui.draggable.js, jquery.ui.droppable.js, jquery.ui.effect.js, jquery.ui.effect-blind.js, jquery.ui.effect-bounce.js, jquery.ui.effect-clip.js, jquery.ui.effect-drop.js, jquery.ui.effect-explode.js, jquery.ui.effect-fade.js, jquery.ui.effect-fold.js, jquery.ui.effect-highlight.js, jquery.ui.effect-pulsate.js, jquery.ui.effect-scale.js, jquery.ui.effect-shake.js, jquery.ui.effect-slide.js, jquery.ui.effect-transfer.js, jquery.ui.menu.js, jquery.ui.progressbar.js, jquery.ui.resizable.js, jquery.ui.selectable.js, jquery.ui.slider.js, jquery.ui.sortable.js, jquery.ui.spinner.js, jquery.ui.tabs.js, jquery.ui.tooltip.js
</div>

<div class="view2" style="width:400px; float:left">
<h2> CjuiDialog Sample 2 (dialog form)</h2>
<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'=>'dialog-form', //string 	Returns the ID of the widget or generates a new one if requested.
    // additional javascript options for the dialog plugin
    'options'=>array(
        'title'=>'Dialog box form',
        'autoOpen'=>false,	//def: false
        'modal'=>true,
        'width'=>550,
			'buttons'=>array(
				'Create an account'=>'js:function(){		
					var bValid = true;							 //alert("test"); //alert(allFields);  
					allFields.removeClass( "ui-state-error" );

					bValid = bValid && checkLength( name, "username", 3, 16 );
					bValid = bValid && checkLength( email, "email", 6, 80 );
					bValid = bValid && checkLength( password, "password", 5, 16 );
					
					bValid = bValid && checkRegexp( name, /^[a-z]([0-9a-z_])+$/i, "Username may consist of a-z, 0-9, underscores, begin with a letter." );
					bValid = bValid && checkRegexp( password, /^([0-9a-zA-Z])+$/, "Password field only allow : a-z 0-9" );
					
					// From jquery.validate.js (by joern), contributed by Scott Gonzalez: http://projects.scottsplayground.com/email_address_validation/
					//bValid = bValid && checkRegexp( email, );
					
					if ( bValid ) {
						$( "#users tbody" ).append( "<tr>" +
							"<td>" + name.val() + "</td>" + 
							"<td>" + email.val() + "</td>" + 
							"<td>" + password.val() + "</td>" +
						"</tr>" ); 
						
						//$( "#dialog-form" ).empty();		//kalo diset ini form nya malah ikut ilang smua (kcuali box & butto)
						//$( "#dialog-form" ).reset();
						$("form :input").val(""); //sip
						
						$( this ).dialog( "close" );	
					}	
				}',	
				'Cancel'=> 'js:function(){ $( this ).dialog( "close" ); alert("cancel...");}',
        ),
		'close'=>' function() {	
				allFields.val( "" ).removeClass( "ui-state-error" );   alert("close");
			}'
    ),
));
?>

<div id="dialog-form" title="Create new user">
    <p class="validateTips">All form fields are required.</p>
	<form>
	<fieldset>
		<label for="name">Name</label>
		<input type="text" name="name" id="name" class="text ui-widget-content ui-corner-all" />
		<label for="email">Email</label>
		<input type="text" name="email" id="email" value="" class="text ui-widget-content ui-corner-all" />
		<label for="password">Password</label>
		<input type="password" name="password" id="password" value="" class="text ui-widget-content ui-corner-all" />
	</fieldset>
	</form>		
</div>	

<script>
		// a workaround for a flaw in the demo system (http://dev.jqueryui.com/ticket/4375), ignore!
		//$( "#dialog:ui-dialog" ).dialog( "destroy" );
		//$( "#dialog-form" ).dialog( "destroy" );
		
		var name = $( "#name" ),
			email = $( "#email" ),
			password = $( "#password" ),
			allFields = $( [] ).add( name ).add( email ).add( password ),
			tips = $( ".validateTips" );

		function updateTips( t ) {
			tips
				.text( t )
				.addClass( "ui-state-highlight" );
			setTimeout(function() {
				tips.removeClass( "ui-state-highlight", 1500 );
			}, 500 );
		}

		function checkLength( o, n, min, max ) {
			if ( o.val().length > max || o.val().length < min ) {
				o.addClass( "ui-state-error" );
				updateTips( "Length of " + n + " must be between " +
					min + " and " + max + "." );
				return false;
			} else {
				return true;
			}
		}

		function checkRegexp( o, regexp, n ) {
			if ( !( regexp.test( o.val() ) ) ) {
				o.addClass( "ui-state-error" );
				updateTips( n );
				return false;
			} else {
				return true;
			}
		}
</script>
<?php $this->endWidget('zii.widgets.jui.CJuiDialog'); ?>

<br />
<div id="users-contain" class="ui-widget">
	<h1>Existing Users:</h1>
	<table id="users" class="ui-widget ui-widget-content">
		<thead>
			<tr class="ui-widget-header ">
				<th>Name</th>
				<th>Email</th>
				<th>Password</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>John Doe</td>
				<td>john.doe@example.com</td>
				<td>johndoe1</td>
			</tr>
		</tbody>
	</table>
</div>
<button id="create-user">Create new user</button>
</div>

<div class="clear"></div>

<script>
	$(function() {	
	//$(document).ready(function() {
		$( "#dialog:ui-dialog" ).dialog( "destroy" );
		$( "#create-user" )
			.button()
			.click(function() {  
				//$( "#dialog-form" ).dialog( "destroy" );
				$( "#dialog-form" ).dialog( "open" ); 	
				//$( "#dialog-form" ).reset();
			});
	});
</script>

<!------------------------------------------------------------------ VIEW CODE ------------------------------------------------------------------>
<?php Yii::app()->sc->collect('html', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>

<div class="tpanel left">
	<div class="toggle btn"><?php echo Yii::t('ui','View Code'); ?></div>
	<div class='scroll'><?php Yii::app()->sc->renderSourceBox(); ?></div>
</div>

<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
<!--
<![CDATA[*/
jQuery(function($) {
	jQuery('#dialog-form').dialog(
	{
	'title':'Dialog box form',
	'autoOpen':false,
	'modal':true,
	'width':550,
	'buttons':{
		'Create an account':function(){		
			var bValid = true;							 //alert("test"); //alert(allFields);  
			allFields.removeClass( "ui-state-error" );

			bValid = bValid && checkLength( name, "username", 3, 16 );
			bValid = bValid && checkLength( email, "email", 6, 80 );
			bValid = bValid && checkLength( password, "password", 5, 16 );
					
			bValid = bValid && checkRegexp( name, /^[a-z]([0-9a-z_])+$/i, "Username may consist of a-z, 0-9, underscores, begin with a letter." );
			bValid = bValid && checkRegexp( password, /^([0-9a-zA-Z])+$/, "Password field only allow : a-z 0-9" );
					
			// From jquery.validate.js (by joern), contributed by Scott Gonzalez: http://projects.scottsplayground.com/email_address_validation/
			//bValid = bValid && checkRegexp( email, );
					
			if ( bValid ) {
				$( "#users tbody" ).append( "<tr>" +
					"<td>" + name.val() + "</td>" + 
					"<td>" + email.val() + "</td>" + 
					"<td>" + password.val() + "</td>" +
					"</tr>" 
				); 
						
				//$( "#dialog-form" ).empty();		//kalo diset ini form nya malah ikut ilang smua (kcuali box & butto)
				//$( "#dialog-form" ).reset();
				$("form :input").val(""); //sip
						
				$( this ).dialog( "close" );	
			}	
		},
		'Cancel':function(){ $( this ).dialog( "close" ); alert("cancel...");}
	},
	'close':' function() { \t\r\n\t\t\t\tallFields.val( \"\" ).removeClass( \"ui-state-error\" );   alert(\"close\");\r\n\t\t\t }'
	});
});
/*]]>
-->
<?php Yii::app()->sc->collect('javascript', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>

<div class="tpanel left">
	<div class="toggle btn"><?php echo Yii::t('ui','Rendered JS'); ?></div>
	<div class='scroll'><?php Yii::app()->sc->renderSourceBox(); ?></div>
</div>


<div class="view2">
<b class="baadge">EMAIL ADDRESS VALIDATION</b><br>

<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
<![CDATA[*/
checkRegexp( 
	email, /^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+
	(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?
	(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|
	[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|
	(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*
	([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|
	[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*
	([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i, "eg. ui@jquery.com" 
);
/*]]>
<?php Yii::app()->sc->collect('javascript', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox(); ?>
</div>
				