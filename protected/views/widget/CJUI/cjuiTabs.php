<?php $this->layout="column2"; ?>
<?php $this->renderPartial('cjui/_menu'); ?>

<?php
$this->pageTitle=Yii::app()->name . ' - CjuiTabs'; 
$this->breadcrumbs=array('CjuiTabs',);
?>

<style>.container{ width:1070px } .span-5{ float: right}</style>

<a href="http://localhost/yiidoc/CJuiTabs.html" target="_blank" class="txtHead">YII-Docs </a>|
<a href="http://localhost/js/jquery/jquery-ui-1.8.23/development-bundle/docs/tabs.html" target="_blank" class="txtHead"> Options </a><br />

<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
With JQuery :
<script>
	$(function() {
	//$(document).ready(function() {			
		$( "#tabs" ).tabs({ spinner: "<em>Retrieving data...</em>" });
		var spinner = $( "#tabs" ).tabs( "option", "spinner" );		alert(spinner);
		
		$( "#tabs" ).tabs({
			ajaxOptions: {
				//complete: function() { $("#tabs").removeClass("loading"); }, 
				//update: function(data) { alert(data); },
				error: function( xhr, status, index, anchor ) {
					$( anchor.hash ).html(
						"Couldn't load this tab. We'll try to fix this as soon as possible. " +
						"If this wouldn't be a demo." );
				}
			},
			spinner: "Retrieving data...",
			load: function(event, ui) {		//$(ui.panel).html("loading..");   
													alert( ui );
													alert( $(this).attr('id') );
												//	 $("#tabs").addClass("loading");
				$(ui.panel).delegate('a', 'click', function(event) {		alert( $(ui.panel) );   //alert( $(this).attr('id') );
					//$(ui.panel).load(this.href);
					//event.preventDefault();
				});
			}
		});		
	});
</script>
	
<script>
	$(function() {	
		$("#tabs").tabs({ 
			spinner: "<em>Retrieving data...</em>",
			// ajaxOptions: {
				// cache:false,
				// dataType:'html',
				// complete: function() {  alert('testtttttttttttt'); },
				// beforeSend :function() { SyntaxHighlighter.all(); }
               // // update: function(data) { alert(data); },
				// //'success':function(html){ 'test' },
				// // error: function( xhr, status, index, anchor ) {
                   // // $( anchor.hash ).html(
	                        // // "Couldn't load this tab. We'll try to fix this as soon as possible. " +
                      // // "If this wouldn't be a demo." );
	                // // }
	            // },
		});
	});
</script>

With YII CJuiTabs :
<?php
$this->widget('zii.widgets.jui.CJuiTabs', array(
	'id'=>'tabs',
    'tabs'=>array(
		'<span>StaticTab</span>'=>'Content for tab 1',
        '<span>StaticTab2</span>'=>array('content'=>'Content for tab 2', 'id'=>'tab2'),
		'Render Part content'=>array( 'content'=>$this->renderPartial('cjui/_partial',null,true), 'id'=>'tab3' ),
		'<span>Ajax (render view)</span>'=>array('ajax'=>array('','view'=>'_partial_for_ajax_sample'), 'id'=>'tab4'),
		'<span>Ajax (render action)</span>'=>array('ajax'=>array('ajax/GetUser','view'=>''), 'id'=>'tab5'),
		'Other ajax'=>array('ajax'=>$this->createAbsoluteUrl('ajax/GetUser')),
    ),
    'options'=>array(
        'collapsible'=>true,
        'selected'=>0,
		'icons'=>array(
            "header"=>"ui-icon-plus",//ui-icon-circle-arrow-e
             "headerSelected"=>"ui-icon-circle-arrow-s",//ui-icon-circle-arrow-s, ui-icon-minus
        ),
    ),
    'htmlOptions'=>array(
		'style'=>'width:780px; overflow:auto'
    ),
));
?>

<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>
<hr>


<h1>Dynamic Yii CJui Tabs Menu With Color </h1>
<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>

<?php
$tablist=array("Red","Green","Blue");
foreach($tablist as $tabs){
    $css='';
		if($tabs=='Red'){$css='color:red;';}
		else if($tabs=='Green'){$css='color:green;';}
		else if($tabs=='Blue'){$css='color:blue';}	
		$tabarray["<span id='tab-$tabs' style='$css'>$tabs</span>"]="$tabs Color";
}
?>
<?php
$this->widget('zii.widgets.jui.CJuiTabs',array(
    'tabs'=>$tabarray,
    // additional javascript options for the accordion plugin
    'options' => array(
        'collapsible' => true,        
    ),
    'id'=>'MyTab-Menu1'
));
?>

<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>
<br />


<h1>Yii CJui Tabs Mouse Over Event </h1>
<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>

 <?php
$this->widget('zii.widgets.jui.CJuiTabs',array(
    'tabs'=>$tabarray,
    // additional javascript options for the accordion plugin
    'options' => array(         
        'event'=>'mouseover',
    ),
    'id'=>'MyTab-Menu-Mouse'
));
?>

<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>