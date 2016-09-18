
<b class="badge"> Sntax basic sample on Jquery:</b><br>
<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
<!--
$.ajax({
  type: 'GET',
  url: '/* script here */ ', 
  async: true, //default 'true'
  data: /* data here - if any */,
  contentType: "jsonp", // Pay attention to the dataType/contentType
  dataType: 'jsonp', // Pay attention to the dataType/contentType
  success: function (data, status, xhr) { }
  error: function (xhr, status, errorThrown) { }
});
-->
<?php Yii::app()->sc->collect('html', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>
	
<div class="view2">
<b class="badge"> Sample Basic on YII</b><br><br>
<code> ajax(array $options) </code> Generates the JavaScript that initiates an AJAX request.  Sample : 
	<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
	<!--
	$js= CHtml::ajax(
	array(
		'url'=>array('widget_CgridView/create'),
        'data'=> "js:$(this).serialize()",			-- all input form
		# data : { kelas : $(this).attr('value') },	-- get attr vallue
        'type'=>'post',
		'dataType'=>'json',	# NOTICE : jika ingiln output as json (  available :json, xml, html, text, script ( def : html - not to set ),
		'dataType'=>'html',	# default, NOTICE :  jika ingin outpus ah html,baik nya dgn "renderPartial()" dan custom main layout agar tidak pake "header"
        'async'=> true, //default : 'true'
		'crossDomain'=> domain, // (default: false for same-domain requests, true for cross-domain requests)
		'cache'=> true, // (default: true, false for dataType 'script' and 'jsonp'),

		'success'=>"function(data) {
            if (data.status == 'failure'){
                $('#dialog div.dialogContent').html(data.content);
                $('#dialog div.dialogContent form').submit(add);
            }
           else{
                $('#dialog div.dialogContent').html(data.content);
                setTimeout(\"$('#dialog').dialog('close') \",1000);
            }
        } ",
		///'update'=>'.dialogContent',		#pengganti option "success" cuma ga bisa pk kondisi sperti di atas
		'beforeSend' => 'function() {  $(".dialogContent").html("loading.."); }', 
		'beforeSend' => 'function() {  $("#maindiv").addClass("loading"); }',
		'complete' => 'function() { $("#maindiv").removeClass("loading"); }', 
 )); -->
	<?php Yii::app()->sc->collect('html', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
	<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>
	
	<div class="tpanel btn">
	<span class="toggle txtHead"><?php echo Yii::t('ui','Result in Normal JS'); ?></span>
	<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?> 
	<!--<style>
	jQuery.ajax({
		'url': $(this).attr('href'),   // OR
		'url':'/HTDOCS/yiiProject/yiitest/index.php/widget_CgridView/create?language=id',
		'data':$(this).serialize(),
		'type':'post',
		'dataType':'json',
		'success':function(data) {
            if (data.status == 'failure'){
                $('#dialog div.dialogContent').html(data.content);
                $('#dialog div.dialogContent form').submit(add);
            }
           else{
                $('#dialog div.dialogContent').html(data.content);
                setTimeout("$('#dialog').dialog('close') ",1000);
            }
        } ,
		error: function(xhr, status, errorThrown) {	
			$("#result").html("<b>>status :</b> "+ xhr.status + errorThrown + "<br>" + xhr.responseText);	# xhr.statusText sama dgn errorThrown
		},
		'beforeSend':function() {  $("#maindiv").addClass("loading"); },
		'complete':function() { $("#maindiv").removeClass("loading"); },
		'cache':false
	}); 
	</style>-->
	<?php Yii::app()->sc->collect('javascript', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
	<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>
	</div>
</div>
	
<div class="view2">
<b class="badge"> Others Sample</b><br><br>
	
<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?> <!--
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
		'update'=>'#dialog div.dialogContent',  		#basic/simple (no need 'complete config')
		
		#OPTIONAL CONFIG ( update will ingnore )
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
 ); -->
<?php Yii::app()->sc->collect('html', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
	<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>
</div>