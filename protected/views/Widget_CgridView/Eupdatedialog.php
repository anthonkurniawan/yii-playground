<style>.container{ width:1100px; }</style>

<?php $this->breadcrumbs=array('widget'=>array('index'), 'gridDefault', ); ?>

<a href="http://www.yiiframework.com/extension/eupdatedialog/" style="float:right">Source eupdatedialog</a> <br>
<b class="txtTitle">GridView with "Create Dialog"</b><br>

<!----------------- FLASH MESSAGE (FUNGSSI INI HANYA BISA STELAH SUBMIT )----------------->
<?php if(Yii::app()->user->hasFlash('flashMessage')) { ?>
	<div class="flash-success"> <?php echo Yii::app()->user->getFlash('flashMessage'); ?> </div>
	
<?php 
		$message =Yii::app()->user->getFlash('flashMessage');
		$this->widget('ext.toastMessage.toastMessageWidget',array('message'=>$message,'type'=>'Warning'));
	}
?><!--flash msg-->


<?php 
echo CHtml::link('Create User(with EupdateDialog)', array('Widget_CgridView/create_eupdateDialog'),
	 array( 'class' => 'update-dialog-open-link', 'data-update-dialog-title' => Yii::t( 'app', 'Create a new User' ),
));
?><br />
<div class="ket">
	<ul><li>jika klik langsung maka ajax request</li> <li>jika klik new tab maka HTTP GET request</li></ul>
</div>
<!----------------------------------- WIDGET "EUpdateDialog" DIALOG --------------------------------------------->
<?php //$this->widget( 'ext.EUpdateDialog.EUpdateDialog' ); #DEFAULT MIN ?>
<?php  # WITH CUSTOM
//$widgetUpdate = "js:function(){}";
$this->widget('ext.EUpdateDialog.EUpdateDialog', array(
  'options' => array(
    //'successCallback' => $widgetUpdate,
    //'deletedCallback' => $widgetUpdate,
  ),
	'dialogOptions' => array(
		'width'=>'auto',
		'autoOpen'=> false,
		//'position'=>'center', //string/array
		//'position'=>array('left top'), 
		//'show'=>"blind", //swing, drop, blind, slide,  clip, fade, fold, highlight, puff, pulsate, scale, shake, size, bounce,/number of duration
		'buttons'=>array(
			//'OK'=>'js:function(){ $("#dialog-form").dialog("close"); return false }',
			'Cancel'=>'js:function(){$(this).dialog("close"); }',
		),
	),
  //'preload' => array( Yii::app()->request->baseUrl . '/js/wymeditor.js' ),
));
?>

<!---------------------------------------- WIDGET CGRIDVIEW -------------------------------------------------------->
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-grid',
	'dataProvider'=>$model->search_join(),	
	'filter'=>$model,
	'htmlOptions'=>array('style'=>'width:950px; overflow:auto'),
	'columns'=>array(
		'id','username', 'password', 'email', 'first_name',
		//contoh: dengan custom
		array('name'=>'propic_id', 'value' =>'$data->TblDatas["propic_id"]', 'htmlOptions'=>array('width'=>'40px'), ),
		array('name'=>'create_time','value' =>'$data->TblDatas["create_time"]', 'htmlOptions'=>array('width'=>'40px'), ),
		array('name'=>'ket','value' =>'$data->TblDatas["ket"]', 'htmlOptions'=>array('width'=>'40px'), ),
		//TblPic Attributes
		array('name'=>'filename_ori','value' =>'$data->TblPics["filename_ori"]', 'htmlOptions'=>array('width'=>'40px'), ),
		array('name'=>'title','value'=>'$data->TblPics["title"]', 'htmlOptions'=>array('width'=>'40px'), ),
		array('name'=>'event','value'=>'$data->Logs["event"]', 'htmlOptions'=>array('width'=>'40px'), ),
		array('name'=>'stamp','value'=>'$data->Logs["stamp"]', 'htmlOptions'=>array('width'=>'40px'), ),
		array('name'=>'username','type'=>'raw','value'=>'CHtml::hiddenField("userid",$data->username, array("id"=>"userid"))', ),
		array(
			'class' => 'CButtonColumn',
			'template'=>'{view}{update}{delete}', 
			'buttons' => array(
				// View button
				'view' => array(
					'click' => 'updateDialogOpen',
					'url' => 'Yii::app()->createUrl("/Widget_CgridView/view_eupdateDialog", array( "id" => $data->id ) )',
					'options' => array(
						'data-update-dialog-title' => Yii::t( 'app', 'Preview User' ), 
						//'view'=>'test',
						),
				),
				// Update button
				'update' => array(
					'click' => 'updateDialogOpen',
					//'url'=>'$this->grid->controller->createUrl("widget_CgridView/updateJoin", array("id"=>$data->id,))',
					'url' => 'Yii::app()->createUrl("/Widget_CgridView/update_eupdateDialog", array( "id" => $data->id ) )',
					'options'=>array( 
						'data-update-dialog-title' => Yii::t( 'app', 'Update User' ), 
						),
				),
				'delete' => array(
					'click'=>'js:function() { $("#mydialog").data("url", $(this).attr("href") ).dialog("open");  $("#username_d").text( $("#userid").val() ); return false; }',
					//'click'=>'js:function() { $("#mydialog").data({ id: "abc" }).dialog("open"); return false; }',
					//'options' => array('id'=>'$data->id'),
					//'url' => 'Yii::app()->createUrl("Widget_CgridView/delete_eupdateDialog", array( "id" => $data->id ) )',
				),
				// Delete button
				/*'delete' => array(
					'click' => 'updateDialogOpen',
					'url' => 'Yii::app()->createUrl("Widget_CgridView/delete_eupdateDialog", array( "id" => $data->id ) )',
					'options' => array( 'data-update-dialog-title' => Yii::t( 'app', 'Delete confirmation' ), ),
				),*/
				
				/*'delete2' => array(
					'label'=>'del with "eupdateDialog"',
					'click'=>'updateDialogOpen',
				),*/
			),
		),
	),
));
?>

<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'=>'mydialog', //string 	Returns the ID of the widget or generates a new one if requested.
    'options'=>array(
        'title'=>'Dialog box 1',
        'autoOpen'=>false,	//def: false
        'modal'=>false, //If true, on dialog ; other items on the page will be disabled, i.e., cantbe interacted with
        'width'=>'auto',
				'show'=>"blind",
				//'hide'=>"string/number",  //swing, drop, blind, slide,  clip, fade, fold, highlight, puff, pulsate, scale, shake, size, bounce,/number of duration
				//'hide'=>1000, 
				'buttons'=>array(
					'Cancel'=>'js:function() { $(this).dialog("close"); }',
					
					//'OK'=>'js:function(){ $("#dialog-form").dialog("close"); return false }',  yiiGridView("getUrl"),("getSelection"),row,column
					'OK'=>'js:function del(){ 				
							//if(!confirm("Apakah anda yakin ingin menghapus item ini?")) return false;				
							//var th=$("a.delete").attr("href");	    		
							//var th =$.fn.yiiGridView.("getUrl");	   			
							var th = $("#mydialog").data("url"); 	  //alert(th);
							
							var afterDelete=function(){};						
							$.fn.yiiGridView.update("user-grid", {
								type:"POST",
								//url:$(this).attr("href"),
								url:th,  										//disini action delete
								success:function(data) { 												 alert("test");
									$.fn.yiiGridView.update("user-grid");
									afterDelete(th,true,data);
									//status:"success boo";
              		//content=> $this->messages["success"],
								},
								error:function(XHR) {
									return afterDelete(th,false,XHR);
								}
							});
							$(this).dialog("close");
							return false;
					}',
				),
		),
));
	 if(isset($_GET['url'])) echo $_GET['url'];
	echo "<span class='ui-icon ui-icon-alert' style='float:left; margin:0 7px 20px 0;'></span>
				These user <b id='username_d' style='color:red'></b>  will be permanently deleted and cannot be recovered. Are you sure?";
					
$this->endWidget('zii.widgets.jui.CJuiDialog');
?>


<!----------------------------------------------------------- PRINT CODE --------------------------------------------------------------->
<div class="tpanel" width="50%">
	<span class="toggle"><?php echo Yii::t('ui','View Code'); ?></span>
	<div>
	<?php $this->beginWidget('CTextHighlighter',array('language'=>'JAVASCRIPT','showLineNumbers'=>1,'tabSize'=>0,'lineNumberStyle'=>'table' )); ?>	
	jQuery( '.update-dialog-open-link' ).live( 'click', updateDialogOpen );

jQuery(function($) {
	jQuery('#update-dialog').dialog({'autoOpen':false,'modal':true,'width':'auto','buttons':{'Cancel':function(){$(this).dialog("close"); }}});
	
	$(document).on('click','#user-grid a.view',updateDialogOpen);
	$(document).on('click','#user-grid a.update',updateDialogOpen);
	$(document).on('click','#user-grid a.delete',function() { 
		$("#mydialog").data("url", $(this).attr("href") ).dialog("open");  $("#username_d").text( $("#userid").val() ); return false; 
	});
	
	jQuery('#user-grid').yiiGridView({
		'ajaxUpdate':['user-grid'],
		'ajaxVar':'ajax',
		'pagerClass':'pager',
		'loadingClass':'grid-view-loading',
		'filterClass':'filters',
		'tableClass':'items',
		'selectableRows':1,
		'enableHistory':false,
		'updateSelector':'{page}, {sort}',
		'pageVar':'TblUserMysql_page'
	});
	
	jQuery('#mydialog').dialog({
		'title':'Dialog box 1',
		'autoOpen':false,
		'modal':false,
		'width':'auto',
		'show':'blind',
		'buttons':{
			'Cancel':function() { $(this).dialog("close"); },
			'OK':function del() { 				
				//if(!confirm("Apakah anda yakin ingin menghapus item ini?")) return false;				
				//var th=$("a.delete").attr("href");	    		
				//var th =$.fn.yiiGridView.("getUrl");	   			
				var th = $("#mydialog").data("url"); 	  //alert(th);
							
				var afterDelete=function(){};						
				$.fn.yiiGridView.update("user-grid", {
					type:"POST",
					//url:$(this).attr("href"),
					url:th,  										//disini action delete
					success:function(data) { 												 alert("test");
						$.fn.yiiGridView.update("user-grid");
						afterDelete(th,true,data);
						//status:"success boo";
						//content=> $this->messages["success"],
					},
					error:function(XHR) { return afterDelete(th,false,XHR); }
				});
				$(this).dialog("close");
				return false;
			}
		}
	});
	
	$("#nav li").hover(
		function () { if ($(this).hasClass("parent")) { $(this).addClass("over"); } },
		function () { $(this).removeClass("over"); }
	);
	
 });
	<?php $this->endWidget(); ?>		
	</div>
</div>

<div class="view txtSmall">
	<ul><li>View file: <tt><?php echo __FILE__; ?></tt></li>
	<li>Layout file: <tt><?php echo $this->getLayoutFile('main'); ?></tt></li></ul>
</div>
