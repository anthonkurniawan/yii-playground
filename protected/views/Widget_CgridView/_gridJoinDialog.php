<!------------------- SAMPLE: CREATE DIALOG WITH CJUIDIALOG ------------------------>
<?php  echo CHtml::link('Create User', array('Widget_CgridView/create'), array('target'=>'_blank'));?> | 

<?php 
echo CHtml::link('Create User- Dialog + file Upload', 
	array('Widget_CgridView/create'),
	array(		
		'style'=>'cursor: pointer; text-decoration: underline;',
		'onclick'=>'{	
			url= $(this).attr("href");     //ini buat cari url dari link(buat update)           
			add(url);   
			$("#dialog").dialog({"width": "500px"});
			
			//$("#dialog").dialog({"autoOpen":false,"modal":true,"width":"auto","buttons":{"Cancel":function(){$(this).dialog("close"); }}}); //define option here
			//$("#dialog").dialog({"title":"Create new User" } );
			//$("#dialog").dialog("open");		//move to function "add"
			return false;
		}',
	)
);
?><br>

<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog', array( // the dialog
    'id'=>'dialog',
    'options'=>array(
        'autoOpen'=>false,
        'modal'=>true,
		'width'=>'600px',
		//'show'=>"blind",
		//'hide'=>"explode",
		'buttons'=>array(
			'OK'=>'js:function(){ kirim();  }',
			'Cancel'=>'js:function(){$(this).dialog("close"); }',
		),
    ),
));?>

<div class="dialogContent">Loading..</div>

<?php $this->endWidget();?>

<!------------- script JS --------------->
<?php 
$js= CHtml::ajax(
	array(
		//'url'=>'http://localhost/yii/yiiTest/index.php/widget_CgridView/create',	#1
		#'url'=>array('widget_CgridView/create'),	#2
		'url'=>'js:url',	#optional get "url"
        'data'=> "js:$(this).serialize()",
        'type'=>'post',
        'dataType'=>'json',
		//'update'=>'.dialogContent',		//prefer below
        'success'=>"function(data) {
            if (data.status == 'failure'){
				$('#dialog').dialog({'title':  data.title } );
                $('#dialog div.dialogContent').html(data.content);
                //$('#dialog div.dialogContent form').submit( add );	//for looping function 'add' (WITHOUT 'query.form.js')
            }
           else{
                $('#dialog div.dialogContent').html(data.content);
				$.fn.yiiGridView.update('user-grid');	//refresh table
                setTimeout(\"$('#dialog').dialog('close') \",1000);
            }
        } ",
		'beforeSend' => 'function() {  $(".dialogContent").html("loading.."); }',  //atau bisa juga dgn "tulis di div contentnya
		//'beforeSend' => 'function() {  $("#maindiv").addClass("loading"); }',
		//'complete' => 'function() { $("#maindiv").removeClass("loading"); }', 
 )); 
?> 

<script type="text/javascript">
function add() {			
	$('#dialog').dialog('open');
	/*if(!url) var url = 'http:localhost/yii/yiiTest/index.php/widget_CgridView/createxx';*/ //alert("url :" + url);
    <?php echo $js?>;
    return false; 
}

$( "#dialog" ).on( "dialogbeforeclose", function( event, ui ) {  $("#dialog div.dialogContent").empty();  } );
//$( "#dialog" ).on( "dialogcreate", function( event, ui ) { alert("test"); } );  //pas page loading sudah alert
</script>



