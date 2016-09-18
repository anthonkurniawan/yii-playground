<?php $this->layout="column1"; ?>
<?php $this->renderPartial('cjuiDialog/_menu'); ?>
 <style>.php-hl-main ,.javascript-hl-main{ font-size: 70%}</style>
 
<?php
$this->pageTitle=Yii::app()->name . ' - Dialog HighCharts'; 
$this->breadcrumbs=array('CJuiDialog_highcharts',);
?>

<a href="http://127.0.0.1/yiidoc/CJuiDialog.html" target="_blank"><b class="txtKet">Documentation CjuiDialog</b></a> | 
<a href="http://127.0.0.1/js/jquey/jquery-ui-1.8.23/development-bundle/demos/#dialog|modal-form" target="_blank"><b class="txtKet">Sample From JQUERY-DIALOG</b></a> |
<a href="http://127.0.0.1/js/jquery/jquery-ui-192/development-bundle/docs/dialog.html" target="_blank"><b class="txtKet">Options</b></a>
<br />

<div class="view2">
<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>

<?php
// the link that may open the dialog
echo CHtml::link('test dialog', '#', array('onclick'=>'$("#dialog").dialog("open"); return false;', ));
?>

<!------------------- SAMPLE: CREATE DIALOG WITH CJUIDIALOG ------------------------>
<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog', array( // the dialog
    'id'=>'dialog',
    'options'=>array(
        //'title'=>'Dialog Content',
        'autoOpen'=>false,
        'modal'=>true,
		//'height'=>470,		auto
		'width'=>'600px',
		'buttons'=>array(
			'Ok'=>'js:function() { $(this).dialog("close"); return false }'
			//'OK'=>'js:function(){ $("#dialog").dialog("close"); $(this).dialog( "destroy" );  }',
			//'Cancel'=>'js:function(){$(this).dialog("close"); }',
		),
		//'show'=>"swing", 	//swing, drop, blind, slide,  clip, fade, fold, highlight, puff, pulsate, scale, shake, size, bounce,/number of duration
		'hide'=>500, 
    ),
));?>

<div class="dialogContent"></div>
<?php $this->endWidget();?>

<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
	
<div class="tpanel right">
	<div class="toggle btn"><?php echo Yii::t('ui','View Code'); ?></div>
	<div><?php Yii::app()->sc->renderSourceBox();?></div>
</div>
</div>


 <!--------------------------------------------------------------------- with ajax link (RECOMENDED)------------------------------------------------------------------->
<div class="view2">
<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
<?php
echo CHtml::ajaxLink(
	'Using ajaxLink( Recommended )',        
	array('CjuiDialog_ajax'),  // or with params - array('/widget_CgridView/view', 'id'=>'1', ), 
	array(    
		// 'type'=>'POST', //default: GET - not to set
		'dataType'=>'html',   #json, xml, html ( def : html - not to set )
		//'cache'=>false,  #default : false - not set
		'beforeSend' => 'function() {  
			$("#dialog").dialog({"title" : "Highcharts Dialog" } );
			$("#dialog").dialog("open");
			$("#dialog div.dialogContent").html("Loading..")
		}',
		'update'=>'#dialog div.dialogContent',  
		
		// 'complete' => 'function() { $("#req1").removeClass("loading"); }', 			
		// 'complete' => 'function(html, i) { 	$("#dialog div.dialogContent").html(html.responseText);  }', 			
		// 'complete'=> "function(xhr, responseText) { // xhr, on complete
			// $('#dialog div.dialogContent').html(xhr.responseText); 
			
			// // alert(xhr.responseText); 	//update element with received data respon (dari simple_ajax_ipload.php)
			// //alert(xhr);	alert(responseText);
				
				// //result output result  (optional)
				// var items=[];
				// $.each(xhr, function(key, val) {			//alert(bebas.readyState); //alert(key);
					// items.push('<li><b>'+ key +' :</b> ' + val + '</li>');				
				// });	

				// $('#result').html('<ul>' + items + '</ul>');
				// //$('#result').append( '<ul>' + items + '</ul>');		//same above
        // }",
	)
	#Note, if you specify the 'success' option, the "update/replace" options will be ignored.
	//array('success'=>'function(html){ $("#dialog div.dialogContent").html(html) }' ),  // $("#req1").addClass("loading");   $('#dialog div.dialogContent').html(data);
 );
 ?>
 <div id="result" style="overflow:auto"></div>
 
 <div class="tpanel right">
	<div class="toggle btn"><?php echo Yii::t('ui','View Code'); ?></div>
	<div><?php Yii::app()->sc->renderSourceBox();?></div>
</div>
</div>
 
 
 
 <!--------------------------------------------------------------- link & js ajax function ------------------------------------------------------------------>
 <!--																				!!!!		BELOM DI SELESAKANNN !!
<div class="view2">		<b class="txtAtt"> LOM BISA</b><br>
<?php //Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
<?php 
// echo CHtml::link('Using Link & js ajax func ', 
	// //array('CjuiDialog_ajax'),  //sudah di set dalam "add() function"
	// '#',		//with empty url
	// array(
		// 'style'=>'cursor: pointer; text-decoration: underline;',
		// 'onclick'=>'{			
			// //url= $(this).attr("href");     //ini buat cari url dari link(buat update)           
		
			// //$("#dialog").dialog({"autoOpen":false,"modal":true,"width":"auto","buttons":{"Cancel":function(){$(this).dialog("close"); }}}); //define option here
			// $("#dialog").dialog({"title":"Chart Dialog" } );
			// $("#dialog").dialog("open");
			// //add();		//HINDARI DENGAN PEMAKAIAN SPERTI INI, LEBIH BAIK PAKE "REGISTER SCRIPT "click function"
			// return false;
		// }',
		// 'id'=>'link'		//buat "onclick function"
	// )
// );
?>


<?php 
// $js= CHtml::ajax(
	// array(
		// 'url'=>array('CjuiDialog_ajax'),
        // 'data'=> "js:$(this).serialize()",
        // //'type'=>'post',
        // 'dataType'=>'html',
		// //'success'=>'function(html){ $("#dialog div.dialogContent").html(html) }'
        // 'success'=>"function(data) {
			 // $('#dialog div.dialogContent').html(data);
			 
           // // if (data.status == 'failure'){
               // // $('#dialog div.dialogContent').html(data.content);
          // //  }
           // //else{
          // //      $('#dialog div.dialogContent').html(data.content);
            // //    setTimeout(\"$('#dialog').dialog('close') \",1000);
          // //  }
        // } ",
		// //'beforeSend' => 'function() {  $(".dialogContent").html("loading.."); }',  //atau bisa juga dgn "tulis di div contentnya
		// // 'beforeSend' => 'function() {  
			// // $("#dialog").dialog({"title":"Create new User" } );
			// // $("#dialog").dialog("open");
		// // }',
		// //'beforeSend' => 'function() {  $("#maindiv").addClass("loading"); }',
		// //'complete' => 'function() { $("#maindiv").removeClass("loading"); }', 
 // )); 
?> 

<?php
// $cs = Yii::app()->getClientScript();  
// $cs->registerScript(
	// 'link',        //ID that uniquely identifies this piece of JavaScript code
	// "
	// $('#link').click(function(){  $js; return false; });	
	
	// /* function add() {	$js; return false; 	}  */
	// "
	// ,CClientScript::POS_END          //the position of the JavaScript code
// );
?>

 <div class="tpanel right">
	<div class="toggle btn"><?php //echo Yii::t('ui','View Code'); ?></div>
	<div><?php //Yii::app()->sc->renderSourceBox();?></div>
</div> 

	<div class="toggle btn"><?php// echo Yii::t('ui','View Registered Scripts'); ?></div>
<?php //$this->beginWidget('CTextHighlighter',array('language'=>'JAVASCRIPT','tabSize'=>1  )); ?>
	<?php //print_r($cs->scripts); ?>
<?php //$this->endWidget(); ?>

</div>
---->
 
 <!------------------------------------------------------------------ VIEW REGISTERED SCRIPTS ---------------------------------------------------------------------------------->
<div class="tpanel view2"> 
	<div class="tpanel left">
		<div class="toggle btn"><?php echo Yii::t('ui','View ajax controller'); ?></div>
		<div><?php $this->render_script( array('widget/CjuiDialog_ajax') ); ?></div>
	</div>
 </div>