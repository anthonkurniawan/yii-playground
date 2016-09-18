<?php $this->pageTitle='CGridView Customs'; ?>
<?php $this->breadcrumbs=array('widget'=>array('index'),'Grid Join Custom', );?>

<!----------------------------------- just shortcut "table Logs" ----------------------------------------->
<?php
echo CHtml::link('View Table Logs', array('logs/admin'),
	array(
		"style"=>"cursor: pointer; text-decoration: none;",
		//'onclick'=> "{ $('.col_hide').show(); }",
		'class'=>'tooltip',
		'title'=>'test',
		'target'=>'_blank',
	)
);
?><br><br>


<style type="text/css">
.container{ width:1200px; }
/*
.grid-view table.items { width:auto; border:1px red solid }
#user-grid { border: 2px solid green }	*/

.grid-view table tr.even .col_hide{ background: #e8e8e8;}
.grid-view table tr.odd .col_hide{ background: #CCCCCC;}

.grid-view table th.col_hide_head2{ 
	background-image:url(<?php Yii::app()->request->baseUrl;?>../images/bg/grid/column-header-bg.gif);
}	

 /*.grid-view .filters select  { width:auto } */
div.loading {
    background-color: #eee;
    background-image:  url(<?php Yii::app()->request->baseUrl;?>'../images/loading/black_loading5.gif');
	background-position:  center center;
    background-repeat: no-repeat;
    opacity: 1;
}
div.loading * { opacity: .8; }
</style>


<b class="txtTitle">CGridView </b> <small>( with JOIN custom + fancyBox, CjuiDialog, add function to gather value column )</small><br />

<!----------------- FLASH MESSAGE ----------------->
<?php if(Yii::app()->user->hasFlash('update')) { ?>
	<!--<div class="flash-success"> <?php //echo Yii::app()->user->getFlash('update'); ?> </div>-->
	
<?php 
		$message =Yii::app()->user->getFlash('update');
		$this->widget('ext.toastMessage.toastMessageWidget',array('message'=>$message,'type'=>'Warning'));
	}
?><!--flash msg-->

<?php if(Yii::app()->user->hasFlash('success')):?>
        <div class="flash-success">
                <?php echo Yii::app()->user->getFlash('success'); ?>
                <?php
                
                Yii::app()->clientScript->registerScript(
                'myHideEffect',
                '$(".flash-success").animate({opacity: 1.0}, 3000).fadeOut("slow");',
                CClientScript::POS_READY
);
?>
</div>
<?php endif; ?>

<!-------------------------- contoh dialog ----------------------------------->		
<?php $this->renderPartial('/Widget_CgridView/_gridJoinDialog'); ?>


<?php
//register script for "afterAjaxUpdate"
$ajax_tooltip="$('.tooltip_ajax').tooltip({
        content:  function() {
            var result = $('<span>').html('<div class=\'loading\'>loading..</div>');     //.ui-tooltip 
            //var result = $('<span/>').html('<div>..</div>'); 	
			
			//$('.ui-tooltip').addClass('loading');    //.ui-tooltip 
            //$.get('/yii/yiiTest/index.php/widget_CgridView/view/1', { id:'myid'}, function(data) { result.html(data); }, 'html'); 
            $.ajax({
                url: $(this).attr('href'),
                //url:'/yii/yiiTest/index.php/widget_CgridView/view/1',
                success: function(html){ result.html(html); }
            });
            return result; 
        }
    });";
	
$toggle_logs="$('#toggle').toggle( 
			function() {		alert( $('table.items').css('width') );  
				//alert('First handler for .toggle() called.');
				$('#toggle').attr('src', '../images/previous2.gif');
				$('th.col_hide').addClass('col_hide_head2');
				$('.col_hide').show('fade'); 
			}, 
			function() {
				//alert('Second handler for .toggle() called.');
				$('#toggle').attr('src', '../../images/next2.gif')
				$('.col_hide').hide('fade'); 
			});";
			
?>

<!------------------------------ SEARCH FORM ------------------------------------------>
<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>

<div class="search-form" style="display:none; width:500px"> <!----- !! INI IF PAKE AUTOCOMPLETE JS WIDGET INCLUDE GRID WIDGET HARUS DI TARUH DI BAWAH-->
	<?php $this->renderPartial('/Widget_CgridView/partial_file/_search',array(
		'model'=>$model,		//**lempar params model ke 'data_view/_search' **/
	)); ?>
</div>

<div id="myerrordiv" class="view2" style="width:500px;"> -- Content if error "ajaxUpdateError" -- </div>
<?php //dump($model->search_join()) ?>
<!------------------------ DATA CgridView --------------------------------------->
<?php 
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-grid',
	'dataProvider'=>$model->search_join(),	
	//'cssFile'=> Yii::app()->request->baseUrl.'/css/mygrid_custom/mygrid_skyblue.css', //** null (default)
	//'baseScriptUrl'=>null, 
	//'htmlOptions'=>array('style'=>'width:700px'),
	'filter'=>$model,	#the model instance that keeps the user-entered filter data.
	'selectionChanged'=>'selectRow',   //** ON CHANGE SELECT ROW TABLE
	//'htmlOptions'=>array('style'=>'width:700px; overflow:auto'),
	'pager'=>array(   //custom footer <prev next>, defaul: ga perlu diset!!
		'header'=>'',
		'firstPageLabel'=>'&lt;&lt;',
		'prevPageLabel'=>'&lt;',
		'nextPageLabel'=>'&gt;',
		'lastPageLabel'=>'&gt;&gt;',
	),
	'selectableRows'=>2, // 0:  rows cannot be selected, 1: only one row can be selected, 2: All row can
	'columns'=>array(
		//'title',          // display the 'title' attribute
		// 'category.name',  // display the 'name' attribute of the 'category' relation
		// 'content:html',   // display the 'content' attribute as purified HTML
	   
		#Kolom harus ditentukan dalam format "Name:Type:Label", dengan "Type" dan "Label" bersifat opsional. 
		//**array('name'=>'username', 'type'=>'raw','value'=>array($this,'encode_user'),), //call the method 'renderAddress' from the model
		//'id','username','password','email','first_name',  //**contoh: tidak di custom/default
		array(		//contoh: dengan custom
            'name' => 'id', 'type'=>'raw', 'value'=>'$data->id','htmlOptions'=>array('width'=>'45px'),
        ),
		//array( 'name'=>'username', 'value'=>'$data->username','htmlOptions'=>array('width'=>'50px'),),
		//'username',
		array(		
			'name'=>'username <small><i>(auto comp)</i></small>',  //<-- this must be defined so the ajax filter to show up
			'type'=>'raw',  #'raw', 'text', 'ntext', 'number',html, date, time, datetime, boolean, email, image, url
			'value'=>'$data->username',
			//'value'=>'CHtml::link($data->username, array("testForm/view&id=$data->id"))',
			'filter'=>$this->widget('zii.widgets.jui.CJuiAutoComplete',array(	##the model instance that keeps the user-entered filter data.
				'id'=>CHtml::activeId($model,'username').'_autocomplete',
                'model'=>$model,
				'htmlOptions'=>array('style'=>'width:60px'),
				'attribute'=>'username',
				//'source'=>$this->createUrl('request/suggestUsername'), #suggestUsername($keyword, $limit=20) @"TblUserMysql - model"
				'source'=>$this->createUrl('autoComplete',['model'=>'TblUserMysql', 'order'=>'username']), #suggest($keyword, $order, $limit=20 )  @"MYCActiverecord -model"
				'options'=>array(      //jika ga di set nilai nya = jumlah yg diketik misal "adm" bukan "admin"
					'focus'=>"js:function(event, ui) {
						// $('#".CHtml::activeId($model,'username')."').val(ui.item.value);
                        $(this).val(ui.item.value);
					}"
				),	
				
			),true), 
			'htmlOptions'=>array('width'=>'50px' ),  
			'headerHtmlOptions'=>array('class'=>'tooltip', 'title'=>"$('#".CHtml::activeId($model,'username')."')" ),
		),
		// array(    //--------------- CONTOH DROP DOWN
			// 'filter'=>CHtml::dropDownList( '$data', 'active',
				// array( 0=>0, 1=>1)
				// array('onchange'=>"$.fn.yiiGridView.update('lectivo-grid',{ data:{pageSize: $(this).val() }})",)
			// ),
			// 'value'=>'$data->active',
        // ),
		array(
			'name'=>'active',
			'value'=>'$data->active',
			//'filter'=>$model->getList_distinct('role'),
			'filter'=>array(0=>'unactive', 1=>'active'),	#the model instance that keeps the user-entered filter data.
			'htmlOptions'=>array('width'=>'80px'),
		), 
		array(
			'name'=>'role',
			'value'=>'$data->role',
			//'filter'=>$model->getList_distinct('role'),
			'filter'=>array(0=>0, 1=>1),	#the model instance that keeps the user-entered filter data.
			'htmlOptions'=>array('width'=>'40px'),
		), 
		array(
			'name'=>'create_time',
			//'value' =>'$data->TblDatas[create_time"]',	//'date("M j, Y", $model->create_time)',
			'filter'=>$this->widget('zii.widgets.jui.CJuiDatePicker', array(
                'model'=>$model,
                'attribute'=>'create_time',
                'language'=>'en',
                'htmlOptions'=>array('style'=>'width: 70px;', 'id'=>'create_date'),
                    'options' => array(
                        'dateFormat' => 'yy-mm-dd',
                        'changeYear' => true,
                        'showOn' => 'button',
                        'buttonImage' =>Yii::app()->request->baseUrl.'/images/date.png',
                        'buttonImageOnly' => true
                    )
				), true
			),
			'htmlOptions'=>array('style'=>'width:100px', ),
		), 
		array(					
			'name'=>'ket',
			//'value' =>'TblData::model()->FindByPk($data->id)["ket"]', //cara kalo relational nya ga di set
			//'value' =>'TblData::model()->userKet($data->id)', //ga pake relational & pake fungsi
			'value'=>'$data->TblDatas["ket"]', //with relational
			'htmlOptions'=>array('style'=>'width:50px', ),
		), 
		array(	
			'name'=>'filename_ori',
			//'value' =>'TblData::pic_des($data->id)',   //PAKE FUNGSI DI CLASS "tbldata"
		   //'value' =>'tblPic::model()->pic_des(1)',   //PAKE FUNGSI DI CLASS "tbldata"
		   'type'=>'raw',
			'value'=>'($data->TblPics["filename_ori"]) ? $data->TblPics["filename_ori"] : " <center>-</center>"  ', //with relational
			'htmlOptions'=>array('style'=>'width:50px', ),
        ), 
		array(				
			'name'=>'propic_id',
			'type'=>'raw',
			'value'=>'isset($data->TblDatas["propic_id"]) ? "<b class=\"badge\">". $data->TblDatas["propic_id"] . "</b>" : "<center>-</center>" ', //with relational
			'htmlOptions'=>array('style'=>'width:30px'),
			'footer'=>'test footer',
			'headerHtmlOptions'=>array( 'class'=>'tooltip', 'title'=>'klo value=html tag format, maka set type nya = raw'),
		), 
		array(			
			//'value' =>'link(string $text, mixed $url="#", array $htmlOptions=array ( ))',
			'header'=>'view <small>(fancy)</small>',
			'name'=>'propic_id',
			'type'=>'raw',   //harus diset ke raw 
			'value'=>'CHtml::link( 
				CHtml::image(Yii::app()->baseUrl."/upload/".$data->TblPics["filename_ori"], $alt=$data->TblPics["filename_ori"], 
					array( "width"=>"30","height"=>"30","title"=>$data->TblPics["filename_ori"] )),			#title
				array("Widget_CgridView/picView", "file"=>$data->TblPics["filename_ori"], "layout"=>"fancy"), 	#url
				array("class"=>"fancy fancybox.iframe tooltip" ) 
			)', 	#options link
			'htmlOptions'=>array('style'=>'width:30px', ),
		),
		
		//** TESTING PAKE "CLinkColumn" (KURANG OPTIMAL MASIH ERROR DI FANCY) !!!
		// array(
			// 'header'=>'CLinkColumn',
             // 'class'=>'CLinkColumn',
             // //'label'=>'Link test', //** label hanya input string aj
			 // 'labelExpression'=>'$data->TblPics["filename_ori"]',  //** labelExpression-->dapat input php code
			// // 'url'=>array('Widget_CgridView/picView','id2'=>1),  //** url hanya input string aj  || array('testform/index', 'param1'=>'value1')
			 // 'htmlOptions'=>array('class'=>'fancy fancybox.iframe', 'style'=>'width:90px', ),
			 // 'urlExpression'=>'"index.php?r=Widget_CgridView/picView?id2=".TblData::model()->FindByPk(36)->propic_id."&layout=fancy "',
			// //'imageUrl'=>Yii::app()->baseUrl.'/upload/'.TblData::model()->FindByPk($data->id)->propic_id,   
			  
        // ),
		//Panel Logs Columns
		array(
			'header'=>CHtml::image( Yii::app()->request->baseUrl.'/images/next2.gif', 'next2.gif',   
				array('width'=>'', 'style'=>'cursor:pointer', 'id'=>'toggle', 'class'=>'tooltip', 'title'=>'show logs', /*'onclick'=>'toggle_col()'*/ )),  /*OR */
				//array('width'=>'', 'style'=>'', 'class'=>'tooltip', 'title'=>'show logs', 'onclick'=>'$(\'.col_hide\').fadeToggle("fast"); $(this).toggle();')), 
			'name' =>'Logs.logs', 
			'value' =>'',  
			'htmlOptions'=>array('style'=>'background:#e8e8e8', 'class'=>'', 'width'=>'10px'), 
			'headerHtmlOptions'=>array('class'=>'','width'=>'10px', 'style'=>'background:url(Yii::app()->request->baseUrl /../images/bg/grid/column-header-bg.gif);' ,) 
		),  //XXXX

		array(
			'header'=>CHtml::image(Yii::app()->request->baseUrl.'/images/icons/close.gif', '', array('style'=>'cursor:pointer;float:left', 'onclick'=>'$(".close1").hide();')). 'Event', 
			'name' => 'stamp',
			'value' =>'$data->Logs["event"]',
			'htmlOptions'=>array('style'=>'display:none;', 'class'=>'col_hide close1', 'width'=>'80px'), 
			'headerHtmlOptions'=>array('class'=>'col_hide close1', 'style'=>'display:none;' ,  )
		), 
		
		array(
			'header'=>CHtml::image(Yii::app()->request->baseUrl.'/images/icons/close.gif', '', array('style'=>'cursor:pointer;float:left', 'onclick'=>'$(".close2").hide();')). 'Event<small>(Stamp)</small>', 
			'name' => 'stamp',
			'value' =>'$data->Logs["stamp"]',
			'htmlOptions'=>array('style'=>'display:none', 'class'=>'col_hide close2', 'width'=>'120px'), 
			'headerHtmlOptions'=>array('style'=>'display:none',  'class'=>'col_hide close2')
		),
		
		array(
			'header'=>CHtml::image(Yii::app()->request->baseUrl.'/images/icons/close.gif', '', array('style'=>'cursor:pointer;float:left', 'onclick'=>'$(".close3").hide();')).'Logs <small>(wif render partial)</small>',
			'name'=>'Logs.Logs',
            'type'=>'raw', //because of using html-code from the rendered view
			//'value'=>'Logs::model()->findByPk($data->id)->index',    //test
			'value'=>array($this,'LogsData'), //call this controller method for each row
			'htmlOptions'=>array('style'=>'display:none', 'class'=>'col_hide close3', 'width'=>'150px'), 
			'headerHtmlOptions'=>array('style'=>'display:none',  'class'=>'col_hide close3'),
		),
		array(
			'header'=>'Logs <small>(Dialog)</small>',
			'name'=>'Logs.Logs',
            'type'=>'raw', //because of using html-code from the rendered view
			'value'=>array($this,'LogsDialog'), //call this controller method for each row
			'htmlOptions'=>array('style'=>'width:40px; text-align:center', ),
		),
		array(
			'header'=>'Logs <small>(Tolltip)</small>',
			'name'=>'Logs.Logs',
            'type'=>'raw', //because of using html-code from the rendered view
			'value'=>array($this,'LogsTooltip'), //call this controller method for each row
			'htmlOptions'=>array('style'=>'width:40px; text-align:center', ),
		),
		array(
			'class'=>'CLinkColumn',
			'header'=>Yii::t('ui','Email'),
			'imageUrl'=>bu('images/email.png'),
			'labelExpression'=>'$data->email',
			'urlExpression'=>'"mailto://".$data->email',
			'htmlOptions'=>array('style'=>'text-align:center; width:50px', ),
			//'filter'=>'test',
		),
		//action "pagesize" dropdown
		/*array(
			'class'=>'CButtonColumn',
			'header'=>CHtml::dropDownList('pageSize',$pageSize,array(20=>20,50=>50,100=>100),array(
				// change 'user-grid' to the actual id of your grid!!
				'onchange'=>"$.fn.yiiGridView.update('user-grid',{ data:{pageSize: $(this).val() }})",
			)),
		),*/
		array(
			'class'=>'CButtonColumn',
			'header'=>'Action <br>'. 
				CHtml::dropDownList('pageSize',Yii::app()->user->getState('pageSize',Yii::app()->params['defaultPageSize']), array(5=>5,10=>10,20=>20),array(
				'class'=>'change-pagesize',	#OR : 'onchange'=>"$.fn.yiiGridView.update('user-grid',{ data:{pageSize: $(this).val() }})",
			)),
			'template'=>'{view}{view2}{update}{update_dialog}{delete}',  //!!KALO MO CUSTOM TAMBAHIN BUTTON HARUS DI SET DISINI
			'afterDelete'=>'function(link,success,data){ if(success) alert("Delete completed successfuly"); }',
			'deleteConfirmation'=>true,  //default: true
			
			//**CUSTOM BUTTON -----------------
			'buttons'=>array(
			/*	'add'=>array(
					'label'=>'$STRING',     //Text label of the button. atau bisa di set di 'option->title'
					'url'=>'...',       //A PHP expression for generating the URL of the button.
					'imageUrl'=>Yii::app()->request->baseUrl.'/images/gr-plus.png', //Image URL of the button., //Image URL of the button.
					'options'=>array('title'=>'Text shown...','class'=>'view fancybox.iframe'), //HTML options for the button tag.
					'click'=>'...',     //A JS function to be invoked when the button is clicked.
					'visible'=>'...',   //A PHP expression for determining whether the button is visible.
					'url'=>'"index.php?r=testForm/pic&id=".TblData::model()->FindByPk($data->id)->pic."&layout=fancy"', // klo tambah parameter lain misal:"asDialog"=>1,"gridId"=>$this->grid->id
					//'click'=>'function(){$("#cru-frame").attr("src",$(this).attr("href")); $("#cru-dialog").dialog("open");  return false;}',
					//'visible'=>'($data->id===null)?false:true;'
				),  */
				'view'=>array(
						'label'=>'',    
						'options'=>array('title'=>'View with Fancbox','class'=>'fancy fancybox.iframe tooltip'), 
						'url'=>'$this->grid->controller->createUrl("widget_CgridView/view", array("id"=>$data->id,"layout"=>"fancy"))', 
						),
				'view2'=>array(
						'label'=>'View with Dialog box(trigger dari action controller (view)', 
						'imageUrl'=>bu('images/view2.png'), //Image URL of the button.
						'url'=>'Yii::app()->createUrl("widget_CgridView/view", array("id"=>$data->id,"asDialog"=>1))',
						'options'=>array(  
							'ajax'=>array(		// ajax post will use 'url' specified above 
								'type'=>'POST',  //klo ini di set masalaha dengan token CSRF 
								'url'=>"js:$(this).attr('href')", 
								'update'=>'.dialogContent',
							),
						),
					),
				'update'=>array(
						'label'=>'',  
						'options'=>array('title'=>'Update with Fancbox', 'class'=>'fancy fancybox.iframe tooltip'), //HTML options for the button tag.
						'url'=>'$this->grid->controller->createUrl("widget_CgridView/updateJoin", array("id"=>$data->id,"layout"=>"fancy"))', 
						'visible'=>'($data->id===null)?false:true;',
					),	
				'update_dialog'=>array(
						'label'=>"Update Dialog",  
						'imageUrl'=>bu('images/update.png'), //Image URL of the button.
						//'url'=>'$this->grid->controller->createUrl("widget_CgridView/updateJoin", array("id"=>$data->id, "asDialog"=>1))', 
						'url'=>'Yii::app()->createUrl("widget_CgridView/updateJoin", array("id"=>$data->id,"asDialog"=>1))',
						'visible'=>'($data->id===null)?false:true;',
						'options'=>array(  
							'onclick'=>'{
								url= $(this).attr("href");     //ini buat cari url dari link(buat update)   						
								add(url);  
								$("#dialog").dialog({"width": "800px"});
								return false;
							}',
							#CARA 2
							// 'ajax'=>array(		// ajax post will use 'url' specified above 
								// 'type'=>'POST',  //klo ini di set masalaha dengan token CSRF 
								// 'url'=>"js:$(this).attr('href')", 
								// 'data'=> "js:$(this).serialize()",
								// 'dataType'=>'json',
								// 'success'=>"function(data) {
									// if (data.status == 'failure'){
										// $('#dialog div.dialogContent').html(data.content);
										// $('#dialog div.dialogContent form').submit( add );
									// }
									// else{
										// $('#dialog div.dialogContent').html(data.content);
										// $.fn.yiiGridView.update('user-grid');	//refresh table
										// setTimeout(\"$('#dialog').dialog('close') \",1000);
									// }
								// } ",
								// 'beforeSend' => 'function() {  $(".dialogContent").html("loading.."); }',
							// ),
						),
				  ),	
				'delete'=>array( 
						'url'=>'$this->grid->controller->createUrl("/widget_CgridView/delete", array("id"=>$data->id,))',
						'click'=>'js:function(){ 	//alert("test"); 
							if(!confirm("Apakah anda yakin ingin menghapus item ini?")) return false;
							//var th=this;										alert("th"+ th); 
							//var afterDelete=function(){};		alert($(this).attr("href") );
							$.fn.yiiGridView.update("user-grid", {
								type:"POST",
								url:$(this).attr("href"),
								success:function(data) {
									$.fn.yiiGridView.update("user-grid");
									//afterDelete(th,true,data);
								},
								// error:function(XHR) {
									// return afterDelete(th,false,XHR);
								// }
							});
							return false;
						}',
				  ),	
			),
			'htmlOptions'=>array('style'=>'width:80px', 'class'=>'tooltip'),
		),
		//---CheckList Column
		array(
			'class'=>'CCheckBoxColumn',
			'id'=>'rows_to_delete'
		),
	),
	'template'=>"{summary}\n{items}\n{pager}",  //default :  {summary}\n{items}\n{pager}
	'summaryText'=>Yii::t('zii','Displaying {start}-{end} of 1 result.|Displaying {start}-{end} of {count} results.'),   
	//default: Displaying {start}-{end} of 1 result.|Displaying {start}-{end} of {count} results
	'nullDisplay'=>'>',  #only used by CDataColumn to render null data values.
	'blankDisplay'=>'',	#'<b class="txtAtt">test blankDisplay</b>', the text to be displayed in an empty grid cell
	//'nullDisplay'=>'<b class="txtAtt">test nullDisplay</b>',
	//'hasFooter'=>false,
	'hideHeader'=>false,  //default
	'enablePagination'=>true,  //default :true
	'enableSorting'=>true,	//default :true
	
	'rowCssClass'=>array('odd', 'even'),  #default : array('odd', 'even')
	#jika tidak di set autocomplete hanya bisa 1kali
	'afterAjaxUpdate'=>"function(){
		jQuery('#".CHtml::activeId($model,'username')."_autocomplete').autocomplete({
			'delay':300,
			'minLength':2,
			'source':'".$this->createUrl('autoComplete',['model'=>'TblUserMysql'])."',
			'focus':function(event, ui) {
				$(this).val(ui.item.value);
			}
		});
		
		jQuery('#create_date').datepicker({'dateFormat': 'yy-mm-dd'});
		
		$('.tooltip').tooltip();
		
		$ajax_tooltip;  //register di atas
		
		$toggle_logs; //register di atas;
	}",
	'updateSelector'=>'{page}, {sort}, #refresh',  //test
	'ajaxUpdateError'=>'function(xhr,ts,et,err){ $("#myerrordiv").text(err); }',   //test
	//'afterAjaxUpdate'=>"function(id, data);",
	//'beforeAjaxUpdate'=>'function(id,options){alert(unescape(options.url)); }',  //show url target ajax
));
 ?>


<!-------------- SCRIPT REGISTER -------------->
<?php 	#fancyBox Script
Yii::app()->clientScript->registerPackage('fancy'); 
#public CClientScript registerScript(string $id, string $script, integer $position=NULL)
Yii::app()->clientScript->registerScript('fancy', "
$('.fancy').fancybox({
	afterClose: function() {
		//parent.location.reload(true);
	},
	'transitionIn'	:	'elastic',//none
	'transitionOut'	:	'elastic',
	'speedIn'		:	600, 
	'speedOut'		:	200, 
	'overlayShow'	:	false,
	'autoDimensions': false,
	'width'         : 500,
	//'height'        : 500,
});
");		
?>

<?php 	#Search Script
Yii::app()->clientScript->registerScript('search', "
	$('.search-button').click(function(){
		$('.search-form').toggle();
		return false;
	});
	$('.search-form form').submit(function(){
		$.fn.yiiGridView.update('user-grid', {
			data: $(this).serialize()
		});
	return false;
	});
");		
?>

<?php 	#Tooltip Script
Yii::app()->clientScript->registerScript('tooltip', "
	$('.tooltip').tooltip();
	$ajax_tooltip;	//register di atas;
	$toggle_logs; //register di atas;
");		
?>

<?php #REGISTER SCRIPT "PAGESIZE DROPDOWN"
Yii::app()->clientScript->registerScript('initPageSize',<<<EOD
    $('.change-pagesize').live('change', function() {
        $.fn.yiiGridView.update('user-grid',{ data:{ pageSize: $(this).val() }})
    });
EOD
,CClientScript::POS_READY);  // EOD sama dengan " (double quotes)
?>


<!---------------------------------------------------- PAGE BUTTON MODULE ------------------------------------------------>		
<?php $this->renderPartial('/Widget_CgridView/_gridJoinBtn'); ?>



<!--------------------- KETERANGAN --------------------------->
<div class="ket" style="width:800px;"> 
	<b class="txtHead">Note :</b><br />
	<ul>
	<li>grid view base :<?php echo Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('zii.widgets.assets')).'/gridview'; ?><br /></li>
	<li><b>'dataProvider'=>$model1->search(),</b>  merupakan default template.<br />
	dapat juga langsung di define sdr dengan <b>new CDbCriteria; </b> </li><br />

	<li><b>DropDown dgn gunakan ( CHtml::listData )</li> Contoh: </b><br />
    <ul><li><b>print_r($model->getList_all() ) :</b> <?php print_r($model->getList_all() ); ?> </li>
    <i class="txtKet"> Turunan kelas dari TblUserMysql::model()->getgetList_all(), use $model->getList_all atau $model->getgetList_all sama aj </i><br /><br />
    
    <li><b>print_r($model->distinct) :</b> <?php print_r($model->getList_distinct('role')); ?> </li></ul>
    
    </ul>
</div>
