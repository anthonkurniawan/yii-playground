<code>ajax()</code> <code>ajaxButton()</code>  <code>ajaxSubmitButton() </code>
<div class="view">
	<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?> <!--
	echo CHtml::ajaxLink(
		$label,  #string    (it will NOT be HTML-encoded.)
		$url, 	#array(),	 If empty, it is assumed to be the current URL.
		$ajaxOptions, #array()  
			//'update'=>'#req1': string, the selector HTML tobe replaced by the AJAX request result.
			//'replace'=>'selector' string, the selector target tobe replaced by the AJAX request result.
		$htmlOptions, #array()
	);
	/*---------- sample use ------------*/
	echo CHtml::ajaxLink(
		'Test  ',        
		array('ajax/req1'),  // or with params - array('/widget_CgridView/view', 'id'=>'1', ), 
		array(				
			'type'=>'POST',	//default: GET - not to set
			'dataType'=>'html',   #json, xml, html ( def : html - not to set )
			'cache'=>false,		#default : false - not set
			'update'=>'#req1', 	
			'error'=> 'function(xhr, status, errorThrown) {  
				$("#result").html("<b>>status :</b> "+ xhr.status + errorThrown + "<br>" + xhr.responseText);	# xhr.statusText sama dgn errorThrown
			}',
			'beforeSend' => 'function() {  $("#req1").addClass("loading"); }',
			'complete' => 'function() { $("#req1").removeClass("loading"); }', 
		),
		#Note, if you specify the 'success' option, the "update/replace" options will be ignored.
		#array('success'=>'function(html){ $("#req1").html(html) }' ),		// $("#req1").addClass("loading");
		array('style'=>'font-size:20px')	
	);
	---------------- equal with ----------------
	jQuery(function($) {
	$('body').on('click','#yt0',function(){
		jQuery.ajax({
			'beforeSend':function() {  $("#maindiv").addClass("loading"); },
			'complete':function() { $("#maindiv").removeClass("loading"); },
			'url':'/HTDOCS/yiiProject/yiiTest/index.php/ajax/req1?language=id',
			'cache':false,
			'success':function(html){ jQuery("#req1").html(html) },
			'data':jQuery(this).parents("form").serialize(),   (if option 'type'=>'' di set)
		});
		return false;
	});-->
	<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
	<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>
	
	sample :<br>
	<code>CHtml::ajaxLink('Test  ', array('ajax/req1'), array(...) ); </code> 
	<?php
	echo CHtml::ajaxLink(
		'Test  ',          // the link body (it will NOT be HTML-encoded.)
		array('ajax/req1'), // array() $url, the URL for the AJAX request. If empty, it is assumed to be the current URL.
		array(					 // array() $ajaxOptions
			'type'=>'GET',	//default: GET - not to set
			'dataType'=>'html',   //json, xml, html ( def : html - not to set )
			'cache'=>false,		//default : false - not set
			'update'=>'#req1', 	//string, specifies the selector whose HTML content should be replaced by the AJAX request result.
			'beforeSend' => 'function() {  $("#req1").addClass("loading"); }',
			'complete' => 'function() { $("#req1").removeClass("loading"); }', 
		),
		//Note, if you specify the 'success' option, the "update/replace" options will be ignored.
		//array('success'=>'function(html){ $("#req1").html(html) }' ),		// $("#req1").addClass("loading");
		array('style'=>'font-size:20px')	 // array()  $htmlOptions 
	);
	?><br>
	
	<code>CHtml::ajaxButton('View user', array('/widget_CgridView/view', 'id'=>'1',  ), array(...) ); </code>
	<?php 
		echo CHtml::ajaxButton('View user', array('/widget_CgridView/view', 'id'=>'1',  ),  
		array(
			'update'=>'#req1',
			'beforeSend' => 'function() {  $("#maindiv").addClass("loading"); }',
			'complete' => 'function() { $("#maindiv").removeClass("loading"); }', 
			) ); 
	?><br>
			
	<div id="req1">...result..</div>
</div>