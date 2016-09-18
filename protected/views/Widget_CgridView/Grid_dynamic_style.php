<!--<link rel="stylesheet" type="text/css" href="/HTDOCS/yiiProject/yiiTest/css/mygrid_custom/mygrid_skyblue.css" />-->
<?php 
//cs()->registerCssFile(Yii::app()->baseUrl.'/css/mygrid_custom/mygrid_skyblue.css'); 
//echo CHtml::cssFile(Yii::app()->baseUrl.'/css/mygrid_custom/mygrid_skyblue.css') 
?>

<?php 
$this->pageTitle="Dynamic CGridView";
$this->breadcrumbs=array('widget'=>array('index'), 'grid dynamic Theme',); 
?>

<b class="txtHead">CGridView Select Theme styles</b><p>

<!--- DropDown Select Theme with Ajax -----> 
<?php
echo CHtml::dropDownList('grid_style', 5, 
		array(0=>'-Grid Style-', 1=>'Light', 2=>'Skyblue', 3=>'Dhtml Style', 4=>'Custom Style', 5=>'Default', 6=>'skyblue2'),
		array(
				//'onchange'=>"$.fn.yiiGridView.update('user-grid',{ data:{grid_style: $(this).val() }})",
				'id'=>'grid_style',   //call registered class (optional)
				'class'=>'select_style',  
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
			'class'=>'select_style',  
			'onchange'=>"$.fn.yiiGridView.update('user-grid', { data:{ pager_style: $(this).val() } } )",
			'options'=> array( 0 =>array('disabled'=>true, 'label'=>'value 1') ),
		));
?>

<?php 
//REGISTER SCRIPT "GRID & PAGER STYLE DROPDOWN"  	
$style="
	$('#grid_style').live('change', function() {  								//alert( $(this).val() );
		$.fn.yiiGridView.update('user-grid',{ data:{ grid_style: $(this).val() } } ); 
	});";

Yii::app()->clientScript->registerScript('grid_style', $style  /*CClientScript::POS_READY*/ );  // EOD sama dengan "
?>

<!------------------------------ DATA LIST ------------------------------------------>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-grid',
	'dataProvider'=>$model->search_join(),	
	'filter'=>$model,
	//'htmlOptions'=>array('style'=>'width:700px',),
	'columns'=>array(
		//'title',          // display the 'title' attribute
       // 'category.name',  // display the 'name' attribute of the 'category' relation
       // 'content:html',   // display the 'content' attribute as purified HTML
		##array('name' => 'id', 'value' =>'$data->id', /*'htmlOptions'=>array('style'=>'display:none'), 'headerHtmlOptions'=>array('style'=>'display:none')*/ ),
		array(
			'header'=>'user id',
			'name' => 'id', 
			'value' =>'$data->id',
			'htmlOptions'=>array('width'=>'20px'), 
			'footer'=>'text footer',
		),
		array('name' => 'username', 'value' =>'$data->username', 'htmlOptions'=>array('width'=>'40px'), ),
		array('name' => 'first_name', 'value' =>'$data->first_name', 'htmlOptions'=>array('width'=>'80px'), ),
		array('name' => 'email', 'value' =>'$data->email', 'htmlOptions'=>array('width'=>'110px'), ),
		array('name' => 'propic_id', 'value' =>'$data->TblDatas["propic_id"]', 'htmlOptions'=>array('width'=>'60px'), ),
		//array('name' => 'create_time','value' =>'$data->TblDatas["create_time"]', 'htmlOptions'=>array('width'=>'70px'), ),
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
	'pager'=>array(   //custom footer <prev next>, defaul: ga perlu diset!!  /*option1 pager2*/
		#'header'=>$grid_style.$pager_style,
		// 'firstPageLabel'=>CHtml::image(Yii::app()->request->baseUrl.'/images/tableItem/page-first.gif'), //'&lt;&lt; (<)'
		// 'prevPageLabel'=>CHtml::image(Yii::app()->request->baseUrl.'/images/tableItem/page-prev.gif'), //CHtml::image(Yii::app()->request->baseUrl.'/images/tableItem/page-prev.gif'),
		// 'nextPageLabel'=>CHtml::image(Yii::app()->request->baseUrl.'/images/tableItem/page-next.gif'),  //'&gt;(>)'
		// 'lastPageLabel'=>CHtml::image(Yii::app()->request->baseUrl.'/images/tableItem/page-last.gif'),  //'&gt;&gt;(>>)'
		// //'footer'=>'test',
		
		#'cssFile'=>Yii::app()->request->baseUrl.'/css/mygrid_custom/mypager_skyblue_smoth_border.css', //** null (default)
		#'cssFile'=>Yii::app()->request->baseUrl.'/css/mygrid_custom/mypager_skyblue.css',
		#'cssFile'=>$pager_style,
		
		'maxButtonCount'=>'3',
		//'htmlOptions'=>''
	),  
	
	#'cssFile'=>'', //boleh
	//'cssFile'=> Yii::app()->request->baseUrl.'/css/mygrid_custom/mygrid_light.css', //** null (default)
	//'cssFile'=> Yii::app()->request->baseUrl.'/css/mygrid_custom/mygrid_skyblue.css', //** null (default)
	//'cssFile'=> Yii::app()->request->baseUrl.'/css/mygrid_custom/gridview_dhtml.css', //** null (default)
	//'cssFile'=> Yii::app()->request->baseUrl.'/css/gridview_custom.css', //** null (default)
	
	//'loadingCssClass'=>,  //class name loading
	
	//'baseScriptUrl'=>false,  //default: null, base script URL for all grid view resources (eg javascript, CSS file, images)
	//'updateSelector'=>'{page}, {sort}, ',  //the HTML elements that may trigger AJAX updates when they are clicked.
	'afterAjaxUpdate'=>'function(){
		//$style;  //register di atas
	}',
	
	'template'=>"{summary}\n{items}\n{pager}",  //default :  {summary}\n{items}\n{pager}
	'summaryText'=>Yii::t('zii','Displaying {start}-{end} of 1 result.|Displaying {start}-{end} of {count} results.') . $grid_style.$pager_style,   
	//default: Displaying {start}-{end} of 1 result.|Displaying {start}-{end} of {count} results
	
	//'blankDisplay'=>'<b class="txtAtt">test blankDisplay</b>',
	//'nullDisplay'=>'<b class="txtAtt">test nullDisplay</b>',
	//'hasFooter'=>false,
	'hideHeader'=>false,  //default
	//'rowCssClass' => //Defaults to array('odd', 'even').
	'enablePagination'=>true,  //default :true
	'enableSorting'=>true,	//default :true
)); ?>


<?php
// Yii::app()->clientScript->scriptMap = array(
            // 'pager.css' => false,
            // 'styles.css' => false,
        // );
		?>
		
<div id="myerrordiv">grid style : <?php echo $grid_style; ?></div>

<!------------------------------------------- SEARCH FORM ------------------------------------------------->
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
		'model'=>$model,		
	)); ?>
</div>

