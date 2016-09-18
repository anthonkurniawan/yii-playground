<?php $this->layout='column1';?> 
<?php $this->pageTitle=Yii::app()->name . ' - RBAC'; ?>
<style>.container{width:1100px;} </style>

<style>
#myAccordion {
	padding: 10px;
	/*width: 350px;*/
	/*height: 600px; */
}
.action_ajax{ text-decoration: none }
</style>

<div class="myBox" style="display: table; width:100%">
<div class="left">
<b>Access </b> :
<?php //echo CHtml::link('Access Guest', array('authTest/guest'), array('class'=>'action', 'onClick'=>'js: action1( $(this).attr("href") );')); ?>
<?php echo CHtml::link('Guest', array('authTest/guest_act'), array('class'=>'action_ajax btn btn-sm btn-primary')); ?>		
<?php echo CHtml::link('Authenticated', array('authTest/authenticated_act'), array('class'=>'action_ajax btn btn-sm btn-primary')); ?>	
<?php echo CHtml::link('Administrator', array('authTest/admin_act'), array('class'=>'action_ajax btn btn-sm btn-primary', 'style'=>'margin-right:10px')); ?>	
<?php echo CHtml::link('User-A', array('authTest/userA_act'), array('class'=>'action_ajax btn btn-sm btn-primary')); ?>	
<?php echo CHtml::link('User-B', array('authTest/userB_act'), array('class'=>'action_ajax btn btn-sm btn-primary')); ?>	
<?php echo CHtml::link('Poweruser', array('authTest/poweruser_act'), array('class'=>'action_ajax btn btn-sm btn-primary')); ?>	
</div>

<div id="loading" class="left loading spin-load3" style="display:none">&nbsp;</div>
<div id="result" class="cmd_line left" style="width:100%;min-width:300px; max-width:500px; min-height:35px; margin-left:10px"></div>
</div>

<div class="clear"></div>
<div class="clear"></div>
<div class="tpanel">
	<span class="toggle btn btn-sm btn-default right"><?php echo Yii::t('ui','Show AuthManager'); ?></span>
	<div style="height:200px; overflow:auto"><?php dump(Yii::app()->authManager); ?></div>
</div>

<h2>Autthorization, Access Rules and  RBAC </h2>
<?php
$this->widget('zii.widgets.jui.CJuiAccordion',array(
	'id'=>'myAccordion',
    'panels'=>array(
		//'panel 0'=>'content for panel 1',
		# panel 3 contains the content rendered by a partial view
		'<span class="badge badge-info">User identity & Login</pan>'=>$this->renderPartial('_user_identity',null,true),
		'<span class="badge badge-info">Access Controll</span>'=>$this->renderPartial('_access_controll',null,true),
		'<span class="badge badge-info">RBAC( role-based-access-control )</span>'=>$this->renderPartial('_rbac',null,true),
		//'<span>find($condition,$params)</span>'=>array('ajax'=>array('','view'=>'_find'), ),
		'<span class="badge badge-info">CDbAuthManager</span>'=>$this->renderPartial('_CDbAuthManager',null,true),
		'<span class="badge badge-info">CPhpAuthManager</span>'=>$this->renderPartial('_CPhpAuthManager',null,true),
		'<span class="badge badge-info">Simple RBAC ( without AuthManager ) </span>'=>$this->renderPartial('_simple_rbac',null,true),
    ),
    // additional javascript options for the accordion plugin
    'options'=>array(
        'animated'=>'bounceslide',
		'heightStyle'=> 'content',		//auto height
		//'heightStyle'=>'fill',
		//'autoHeight'=>false,
		//'style'=>array('min-height'=>'100px', 'max-height'=>'900px'),
		 'collapsible'=>true,
         'active'=>2,
    ),
    'htmlOptions'=>array(
       // 'style'=>'width:500px; overflow:auto'
    ),
));
?>
<div class="clear"></div>

<!--
<script>
	$(function() {
		$( "#accordion" ).accordion({
			heightStyle: "content"
		});
	});
</script>
-->
<?php
// $cs = Yii::app()->getClientScript();  
// $cs->registerScript('test_auth',       
    // "function action1(url){		alert(url);
		// prevent.default();
		// avoid(0);
		// $.ajax({
			// type: 'GET',
			// url: url,
			// success: function (data, status, xhr) { },
			// error: function (xhr, status, errorThrown) { },
		// }); 
	// }"                //define function
    // ,CClientScript::POS_HEAD   //the position of the JavaScript code (  POST_END "click_function dan "own  define function" ok )
// );
?>


<?php
$cs = Yii::app()->getClientScript();  
$cs->registerScript('authTest',    "
	$('body').on('click', '.action_ajax', function(){	
		$.ajax({
			type: 'GET',
			url: $(this).attr('href'),
			cache: false,
			beforesend: function(xhr){  
				$('#result').html('');
				$('#loading').show(); 
			},
			success: function (data, status, xhr) { 	// alert(data);  
				$('#result').html( data );
			},
			error: function (xhr, status, errorThrown) {	//alert(xhr);
				$('#result').html( xhr.responseText +' ( '+ status +' '+xhr.status+' - '+ errorThrown+')' );
			},
			complete: function(){ $('.loading').hide() }
		}); 
		return false;
	});"
    ,CClientScript::POS_END   //the position of the JavaScript code (  POST_END "click_function dan "own  define function" ok )
);
?>