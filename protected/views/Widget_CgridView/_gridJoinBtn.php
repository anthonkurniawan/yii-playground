<div class="view2">


<!----------------------------------------------------------------- BUTTON TOOLS ------------------------------------------------------------------------->
<button id="refresh">Resfresh</button> <!-- grid. updateSelecto -->

<?php echo CHtml::Button('Delete All',  array('id'=>'delAll'));  //added clik function JS delAll ?>

<?php echo CHtml::Button('View Selected',  array('id'=>'viewSelected')); ?>

<?php echo CHtml::Button('View Seleted Dialog',  array('id'=>'viewSelected_D')); ?>

<div id="viewSelectCont"> ..result render partial view selected id..</div>


<!--------------------------------- FUNCTION VIEW SELECTED/All------------------------------->
<script type="text/javascript">
	function selectRow(target_id) {   //alert(target_id);
		var id =$.fn.yiiGridView.getSelection(target_id);	   //alert("select id" + id);
	}
</script>

<!----------------------------------- TOGGLE COL GRID FUNCTION JS ------------------------------------->
<?php
Yii::app()->clientScript->registerScript('log_toggle', "
	function toggle_col(){	//alert( $('#toggle').attr('src') );
		//$('#toggle').attr('src')
		$('.col_hide').fadeToggle('fast'); 
		//$('th .col_hide_head').addClass('col_hide_head2');
		$('th.col_hide').addClass('col_hide_head2');
		return false;
	};
	function toggle_close(){
		$('.col_hide').fadeToggle('fast'); 
	}
");
?>

<!----------------------------------------- VIEW FUNCTION JS ------------------------------------------------>
<?php 
#public CClientScript registerScript(string $id, string $script, integer $position=NULL)
Yii::app()->clientScript->registerScript('viewSelected', "
	$('#viewSelected').click(function(){
		var id =$.fn.yiiGridView.getSelection('user-grid');    //alert ( id );    alert( parseInt(id) );
		if (id.length!==0) 
		{ 
		$.ajax({         
            type: 'GET',
			url: '/yii/yiiTest/index.php/widget_CgridView/viewSelected',
            data: {id:id},  //lempar params
            //dataType:'json',
			//traditional:true,
				
			//success: function() { $.fn.yiiGridView.updateGrid('user-grid'); }  //ini cth update ke id:Gridview
			'success':function(html){ jQuery('#viewSelectCont').html(html); $('#viewSelectCont').addClass('scroll2'); }    //ok test pake render partial
        });
		} else { alert('no row selected'); }
		return false;
	});
");		
?>

<?php 
#public CClientScript registerScript(string $id, string $script, integer $position=NULL)
Yii::app()->clientScript->registerScript('viewSelected_D', "
	$('#viewSelected_D').click(function(){
		var id =$.fn.yiiGridView.getSelection('user-grid');    //alert ( id );    alert( parseInt(id) );
		
		$('#dialog').dialog({'title':'View Selected User' } );
		$('#dialog').dialog('open');
		
		$.ajax({         
            type: 'GET',
			url: '/yii/yiiTest/index.php/widget_CgridView/viewSelected_D',
            data: {id:id},
            dataType:'json',
			//traditional:true,
			//'success':function(html){ jQuery('#viewSelectCont').html(html) }    //ok test pake render partial
			'success' :function(data) {
				if (data.status == 'failure'){
					$('#dialog div.dialogContent').html(data.content);
					//$('#dialog div.dialogContent form').submit(add);
				}
				else{
					$('#dialog div.dialogContent').html(data.content);
					setTimeout(\"$('#dialog').dialog('close') \",1000);
				}
			}
        });
		return false;
	});
");		
?>

<!----------------------------------------- DELETE FUNCTION JS ------------------------------------------------>
<?php
Yii::app()->clientScript->registerScript('initGridEvents',<<<EOD
    $('#delAll').click(function() {  //alert( $(".delete").attr("href") );
         var ids=$.fn.yiiGridView.getSelection('user-grid');    
		
        if (ids.length!==0) 
		{   													alert("jumlah ada:"+ ids.length );  
			for (x in ids) {								alert("foreach id" + ids[x] );		
				var url = '/yii/yiiTest/index.php/widget_CgridView/delete/';		//cth URL define di JS		
				var urls=url+ids[x];   alert('urls->' + urls);
				
				$.fn.yiiGridView.update("user-grid", {  
					type:"POST",
					url:urls,
					success:function(data) {
						$.fn.yiiGridView.update("user-grid");
						//afterDelete(th,true,data);
					},
					// error:function(XHR) {
						// return afterDelete(th,false,XHR);
					// }
				});
			}
        }
    });
EOD
,CClientScript::POS_READY);
?>
</div>


<!----------------------------------------------------------------------- SUBMIT  XLS,PDF, CSV,HTML	------------------------------------------------------------------------->
<b class="txtAtt">Export msh problem di ajax ( type file ga kepilih )</b> <br>

<div class="view2" id="export" style="width:auto">
<?php echo CHtml::dropDownList('fileType', 'xls',  array('Excel5'=>'Xls', 'Excel2007'=>'Xlsx', 'PDF'=>'Pdf', 'CSV'=>'Csv', 'HTML'=>'Html' ), array('id'=>'type')/*array('submit'=>'')*/ ); ?>

<?php
	echo CHtml::ajaxButton('Export with ajax',  
		array('/media/export'),  
		array(
			'type'=>'POST',
			//'update'=>'#req1', 
			//'data'=>'function() { $("#export").serialize();}',
			'beforeSend' => 'function() {  $("#export").addClass("loading"); }',
			'complete' => 'function() { $("#export").removeClass("loading"); }', 
		)
	);  
?>
jQuery('body').on('click','#yt14',function(){
	jQuery.ajax({
		'type':'POST',
		'beforeSend':function() {  $("#export").addClass("loading"); },
		'complete':function() { $("#export").removeClass("loading"); },
		'url':'/yii/yiiTest/index.php/media/export?language=id',
		'cache':false,
		'data':jQuery(this).parents("form").serialize()
	});
	return false;});


<?php	
//imageButton(string $src, array $htmlOptions=array ( ))
echo CHtml::imageButton( Yii::app()->request->baseUrl.'/images/icons/xls_icon.gif', array('id'=>'exp_btn' ) );
?>

<a href="/yii/yiiTest/index.php/media/index" target="_blank">Other sample xls</a> <br />
</div>

<?php
Yii::app()->clientScript->registerScript('export', "
	$('#exp_btn').click(function(){			//alert($('#ftype').val());
		var type = $('#type').val();
		$.ajax({         
            type : 'POST',	
			url : '/yii/yiiTest/index.php/media/export',
            data : {ftype:type},		//lempar param
			beforeSend : function() { $(\"#export\").addClass(\"loading\"); },
			complete : function() { $(\"#export\").removeClass(\"loading\"); }
			//'success':function(html){ $('#export').html('test') }    
			
			// 'success' :function(data) {
				// if (data.status == 'failure'){
					// $('#dialog div.dialogContent').html(data.content);
					// //$('#dialog div.dialogContent form').submit(add);
				// }
				// else{
					// $('#dialog div.dialogContent').html(data.content);
					// setTimeout(\"$('#dialog').dialog('close') \",1000);
				// }
			// }
        });
		//return false;
	});"
);
?>