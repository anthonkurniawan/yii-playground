<!--<style>.container{width:1000px}</style>-->
<?php $this->layout="column2"; ?>
 
<?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'links'=>array('CJui Bootstrap'=>'Cjui_index', ''),
    ));
?>
<style>.loading{ background:url(../../images/tableItem/loading.gif) no-repeat;}</style>

<span class="label label-success">Success</span>
<span class="label">Success</span>

<!--<div class="detail_loading">jui_content</div><br>-->
<!------------- script JS --------------->
<?php 
// $js= CHtml::ajax(
	// array(
		// 'url'=>array('widget_CgridView/create'),
        // 'data'=> "js:$(this).serialize()",
        // 'type'=>'post',
        // 'dataType'=>'json',
        // 'success'=>"function(data) {
            // if (data.status == 'failure'){
                // $('#dialog div.dialogContent').html(data.content);
                // $('#dialog div.dialogContent form').submit(add);
            // }
           // else{
                // $('#dialog div.dialogContent').html(data.content);
                // setTimeout(\"$('#dialog').dialog('close') \",1000);
            // }
        // } ",
		// 'beforeSend' => 'function() {  $(".dialogContent").html("loading.."); }',  //atau bisa juga dgn "tulis di div contentnya
		// //'beforeSend' => 'function() {  $("#maindiv").addClass("loading"); }',
		// //'complete' => 'function() { $("#maindiv").removeClass("loading"); }', 
 // )); 
?> 

<!--<script type="text/javascript">
function add() {
    <?php //echo $js?>;
    return false; 
}
</script>-->
<?php 
Yii::app()->clientScript->registerScript('ajax_cjui', "
	$('.ajax_cjui').click(function(){			alert( this );
		
		$.ajax({       
			//url: '/yii/yiijui_content/index.php/widget_CgridView/viewSelected/1?language=id',
			url:this,
            type: 'GET',  //default 'GET'
			//dataType: 'json',
			
           // data: {id:this},
			//traditional:true,
			// cache:false,
			
			//success: function() { $.fn.yiiGridView.updateGrid('user-grid'); }  //ini cth update ke id:Gridview
			// 'success':function(html){ jQuery('#req1').html(html) }
			'success':function(html){ jQuery('#jui_content').html(html); $('#viewSelectCont').addClass('scroll2'); },
			
			beforeSend:function() {  jQuery('#jui_content').html('loading..');  }
			//beforeSend:function() {  jQuery('#jui_content').addClass('loading'); }
			//complete:function() { $(#maindiv).removeClass(loading); }
        });
		return false;
	});
",  CClientScript::POS_END);		
?>

<!---------------------- Side Menu (CPortlet) -------------------------->
<?php
$this->menu=array(
	array('label'=>'CJuiAccordion', 'url'=>array('widget/cjui_index', 'widget'=>'CJuiAccordion'), 'linkOptions'=>array('class'=>'ajax_cjui',  ) ),
	array('label'=>'CJuiAutoComplete', 'url'=>array('widget/cjui_index', 'widget'=>'CJuiAutoComplete'), 'linkOptions'=>array('class'=>'ajax_cjui',  ) ),
	array('label'=>'CJuiButton', 'url'=>array('widget/cjui_index', 'widget'=>'CJuiButton'), 'linkOptions'=>array('class'=>'ajax_cjui',  ) ),
	array('label'=>'CJuiDatePicker', 'url'=>array('widget/cjui_index', 'widget'=>'CJuiDatePicker'), 'linkOptions'=>array('class'=>'ajax_cjui',  ) ),
	array('label'=>'CJuiDialog', 'url'=>array('widget/cjui_index', 'widget'=>'CJuiDialog'), 'linkOptions'=>array('class'=>'ajax_cjui',  ) ),
	array('label'=>'CJuiProgressBar', 'url'=>array('widget/cjui_index', 'widget'=>'CJuiProgressBar'), 'linkOptions'=>array('class'=>'ajax_cjui',  ) ),  
	array('label'=>'CJuiSlider', 'url'=>array('widget/cjui_index', 'widget'=>'CJuiSlider'), 'linkOptions'=>array('class'=>'ajax_cjui',  ) ),  
	array('label'=>'CJuiTabs', 'url'=>array('widget/cjui_index', 'widget'=>'CJuiTabs'), 'linkOptions'=>array('class'=>'ajax_cjui',  ) ),  
    array('label'=>'Login', 'url'=>array('default/logi_modal'), 'visible'=>Yii::app()->user->isGuest),
);
?>


<div class="page-header">
<h1> JQuery UI Bootstrap <small>A Bootstrap-themed kickstart for JQuery UI</small></h1>
</div>

<!--------------------- CONTENT ------------------------>
<div id="jui_content" class="well well-small">.....................</div>
<?php 
$js= CHtml::ajax(
	array(
		'url'=>array('widget_CgridView/create'),
        'data'=> "js:$(this).serialize()",
        'type'=>'post',
        'dataType'=>'json',
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
		'beforeSend' => 'function() {  $(".dialogContent").html("loading.."); }',  //atau bisa juga dgn "tulis di div contentnya
		'beforeSend' => 'function() {  $("#maindiv").addClass("loading"); }',
		'complete' => 'function() { $("#maindiv").removeClass("loading"); }', 
 )); 
 
 dump($js);
?> 
