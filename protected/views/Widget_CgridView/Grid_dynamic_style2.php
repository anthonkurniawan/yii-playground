<!--<link rel="stylesheet" type="text/css" href="/HTDOCS/yiiProject/yiiTest/css/mygrid_custom/mygrid_skyblue.css" />-->
<?php 
//cs()->registerCssFile(Yii::app()->baseUrl.'/css/mygrid_custom/mygrid_skyblue.css'); 
//echo CHtml::cssFile(Yii::app()->baseUrl.'/css/mygrid_custom/mygrid_skyblue.css') 
//echo $grid_style;
?>

<style> /*reset from bootstrap*/
/*
.grid-view .filters input, .grid-view .filters select
{
  height: 15px;
  width: 80px;
}	*/
</style>


<b> View: <?php //echo $grid_style; ?> </b><br>

<?php $this->breadcrumbs=array('widget'=>array('index'), 'grid dynamic Theme',);?>

<b class="txtHead">CGridView Select Theme styles ( GRID STYLE2 )</b><p>

<!--- DropDown Select Theme with Ajax -----> 
<?php
echo CHtml::dropDownList('grid_style', 5, 
		array(0=>'-Grid Style-', 1=>'Light', 2=>'Skyblue', 3=>'Dhtml Style', 4=>'Custom Style', 5=>'Default'),
		array(
				//'onchange'=>"$.fn.yiiGridView.update('user-grid',{ data:{grid_style: $(this).val() }})",
				'class'=>'change_view',   //call registered class (optional)
				//'prompt'=>'Select View',
				//'empty'=>'test',
				'options'=> array(
					0 =>array('disabled'=>true, 'label'=>'value 1') ),
		));
?>
<?php
echo CHtml::dropDownList('pager_style', 1, 
		array( 0=>'-Pager Style-', 1=>'Default', 2=>'Skyblue', 3=>'Skyblue Smooth' ),
		array(
			'id'=>'pager_style',
			'onchange'=>"$.fn.yiiGridView.update('user-grid', { data:{ pager_style: $(this).val() } } )",
			'options'=> array( 0 =>array('disabled'=>true, 'label'=>'value 1') ),
		));
?>

<?php 
//REGISTER SCRIPT "PAGESIZE DROPDOWN"  	## optional ##
Yii::app()->clientScript->registerScript('change_view',<<<EOD
    $('.change_view').live('change', function() {  								//alert( $(this).val() );
        $.fn.yiiGridView.update('user-grid',{ data:{ grid_style: $(this).val() } } ); 
		$('#grid_style2').text('$grid_style');    			//alert( $('#grid_style2').text() );
    });
EOD
,CClientScript::POS_READY);  // EOD sama dengan "
?>

<?php
// Yii::app()->clientScript->scriptMap = array(
            // 'pager.css' => false,
            // 'styles.css' => false,
        // );
		?>
<div id="myerrordiv">grid style : <?php //echo $grid_style; ?></div>
<?php //$grid_style=Yii::app()->request->baseUrl.'/css/mygrid_custom/mygrid_light.css'; ?>

<?php
$this->widget('ext.bootstrap.widgets.TbButton',array(
'label' => 'Primary',
'type' => 'primary',
'size' => 'large'     // large, small, or mini.
));
$this->widget('bootstrap.widgets.TbButton',array(
'label' => 'Secondary',
'size' => 'small'
));
?>
 
<?php
#$this->widget('zii.widgets.grid.CGridView', array(
$this->widget('ext.bootstrap.widgets.TbGridView', array(
//$this->widget('ext.GII.YiiBooster.widgets.TbGridView', array(
    'id'=>'user-grid',
	'dataProvider'=>$model->search_join(),	
	'filter'=>$model,
    'columns'=>array(
		//'title',          // display the 'title' attribute
       // 'category.name',  // display the 'name' attribute of the 'category' relation
       // 'content:html',   // display the 'content' attribute as purified HTML
		##array('name' => 'id', 'value' =>'$data->id', /*'htmlOptions'=>array('style'=>'display:none'), 'headerHtmlOptions'=>array('style'=>'display:none')*/ ),
		array('name' => 'id', 'value' =>'$data->id', 'htmlOptions'=>array('width'=>'20px'), ),
		array('name' => 'username', 'value' =>'$data->username', 'htmlOptions'=>array('width'=>'40px'), ),
		array('name' => 'first_name', 'value' =>'$data->first_name', 'htmlOptions'=>array('width'=>'80px'), ),
		array('name' => 'email', 'value' =>'$data->email', 'htmlOptions'=>array('width'=>'110px'), ),
		array('name' => 'propic_id', 'value' =>'$data->TblDatas["propic_id"]', 'htmlOptions'=>array('width'=>'60px'), ),
		array('name' => 'create_time','value' =>'$data->TblDatas["create_time"]', 'htmlOptions'=>array('width'=>'70px'), ),
		//array('name' => 'ket','value' =>'$data->TblDatas["ket"]', 'htmlOptions'=>array('width'=>'40px'), ),
		//TblPic Attributes
		array('name' => 'filename_ori','value' =>'$data->TblPics["filename_ori"]', 'htmlOptions'=>array('width'=>'90px'), ),
		//array('name' => 'title','value' =>'$data->TblPics["title"]', 'htmlOptions'=>array('width'=>'40px'), ),
		array('name' => 'event','value' =>'$data->Logs["event"]', 'htmlOptions'=>array('width'=>'70px'), ),
		array('name' => 'stamp','value' =>'$data->Logs["stamp"]', 'htmlOptions'=>array('width'=>'60px'), ),
		array(
			'header'=>'Action',
			'template'=>'{view}{update}{delete}', 
			'class'=>'CButtonColumn',
			//'class'=>'CCheckBoxColumn',
			'htmlOptions'=>array('style'=>'width:30px',),
		),
	),
	// 'pager'=>array(   //custom footer <prev next>, defaul: ga perlu diset!!  /*option1 pager2*/
		// #'header'=>$grid_style.$pager_style,
		// // 'firstPageLabel'=>CHtml::image(Yii::app()->request->baseUrl.'/images/tableItem/page-first.gif'), //'&lt;&lt; (<)'
		// // 'prevPageLabel'=>CHtml::image(Yii::app()->request->baseUrl.'/images/tableItem/page-prev.gif'), //CHtml::image(Yii::app()->request->baseUrl.'/images/tableItem/page-prev.gif'),
		// // 'nextPageLabel'=>CHtml::image(Yii::app()->request->baseUrl.'/images/tableItem/page-next.gif'),  //'&gt;(>)'
		// // 'lastPageLabel'=>CHtml::image(Yii::app()->request->baseUrl.'/images/tableItem/page-last.gif'),  //'&gt;&gt;(>>)'
		// // //'footer'=>'test',
		
		// #'cssFile'=>Yii::app()->request->baseUrl.'/css/mygrid_custom/mypager_skyblue_smoth_border.css', //** null (default)
		// #'cssFile'=>Yii::app()->request->baseUrl.'/css/mygrid_custom/mypager_skyblue.css',
		// #'cssFile'=>$pager_style,
		
		// 'maxButtonCount'=>'3',
		// //'htmlOptions'=>''
	// ),  
	
	#'cssFile'=>'', //boleh
	//'cssFile'=> Yii::app()->request->baseUrl.'/css/mygrid_custom/mygrid_light.css', //** null (default)
	//'cssFile'=> Yii::app()->request->baseUrl.'/css/mygrid_custom/mygrid_skyblue.css', //** null (default)
	//'cssFile'=> Yii::app()->request->baseUrl.'/css/mygrid_custom/gridview_dhtml.css', //** null (default)
	//'cssFile'=> Yii::app()->request->baseUrl.'/css/gridview_custom.css', //** null (default)
	
	//'loadingCssClass'=>,  //class name loading
	
	//'baseScriptUrl'=>false,  //default: null, base script URL for all grid view resources (eg javascript, CSS file, images)

	'updateSelector'=>'{page}, {sort}, #mybutton1',  //the HTML elements that may trigger AJAX updates when they are clicked.
	'ajaxUpdateError'=>'function(xhr,ts,et,err){ $("#myerrordiv").text(err); }',   //javascript function that will be invoked if an AJAX update error occurs.
	'afterAjaxUpdate'=>'function(){
		//$style;  //register di atas
		//$("#user-grid").yiiGridView("getSelection");
	}',
	
	#'template'=>"{summary}\n{items}\n{pager}",  //default :  {summary}\n{items}\n{pager}
	#'summaryText'=>Yii::t('zii','Displaying {start}-{end} of 1 result.|Displaying {start}-{end} of {count} results.'), //. $grid_style.$pager_style,   
	//default: Displaying {start}-{end} of 1 result.|Displaying {start}-{end} of {count} results
	
	//'blankDisplay'=>'<b class="txtAtt">test blankDisplay</b>',
	//'nullDisplay'=>'<b class="txtAtt">test nullDisplay</b>',
	//'hasFooter'=>false,
	'hideHeader'=>false,  //default
	//'rowCssClass' => //Defaults to array('odd', 'even').
	'enablePagination'=>true,  //default :true
	'enableSorting'=>true,	//default :true
)); 
?>
<!------------------------------ Content GridView ------------------------------------------>

scriptMap : <?php //dump(Yii::app()->ClientScript);  //scriptMap ?><br>

grid view base :<?php //echo Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('zii.widgets.assets')).'/gridview'; ?><br />
<!------------------------------------------- TEST AJAX ------------------------------------------------->
<button id="mybutton1">test "updateSelector"</button>
<div id="myerrordiv"> -- error sample "ajaxUpdateError" -- </div><p><p>

<!------------------------------------------- SEARCH FORM ------------------------------------------------->
<!-- NOTE: BISA DI TULIS SPERTI HTML TAG BIASA <script></script>-->
<b class="txtAtt">modul adv seacrh diletakan di bawah agar tdak bentrok (id="TblUserMysql_username") dgn funsi autocomplete</b>
<?php 
Yii::app()->clientScript->registerScript('search', "
	$('.search-button').click(function(){
		$('.search-form').toggle();
		return false;
	});
	$('.search-form form').submit(function(){
		$.fn.yiiGridView.update('user-grid', {      //sesuikan id nya denga id gridview
			data: $(this).serialize()
		});
	return false;
	});
");		
?>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>

<div class="search-form" style="display:none">
	<?php $this->renderPartial('partial_file/_search',array(
		'model'=>$model,		//**lempar params model ke 'data_view/_search' **/
	)); ?>
</div>

<!------------------------------------------------------------ CODE VIEW ----------------------------------- ----------------------------->
<div class="tpanel"> <!--- load model ------->
<b class="toggle txtHead"><?php echo Yii::t('ui','View Code'); ?></b>
<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP'));  ?> 
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-grid',
	'dataProvider'=>$model->search(),
	'selectionChanged'=>'selectRow',   //** ON CHANGE SELECT ROW TABLE
	'filter'=>$model,	//form filter/search
	'columns'=>array(
		'id',
		'username',
		'password',
		'email',
		'first_name',
		'role',
		'active',
		//'id:html'=>array('name'=>'id', 'type'=>'raw', 'value'=>'CHtml::checkBox("id",$data->id,array("id"=>"id_".$data->id))'),
		array(
			'class'=>'CButtonColumn',
			'class'=>'CCheckBoxColumn',

		),
	),
)); 
<?php $this->endWidget(); ?>
</div>
