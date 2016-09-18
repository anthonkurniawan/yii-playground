<?php $this->layout='column2';?> 
<?php
$this->pageTitle="Dynamic CListView";
$this->breadcrumbs=array('Dynamic CListView ',);
?>

<?php 
//cs()->registerCssFile( bu('/css/mygrid_custom/mypager_skyblue_smoth_border.css'));
//echo CHtml::cssFile(Yii::app()->baseUrl. '/css/mygrid_custom/mypager_skyblue_smoth_border.css') 
?>


<?php
$this->menu=array(
	array('label'=>'CListView(standart)', 'url'=>array('index'), 'linkOptions'=>array('target'=>'_blank')),
	array('label'=>'CListView(standart)(select query)', 'url'=>array('userMysql/ListUser'),  'linkOptions'=>array('target'=>'_blank')),
	array('label'=>'Npager', 'url'=>array('widget/Npager'), 'linkOptions'=>array('target'=>'blank'), 'linkOptions'=>array('target'=>'_blank') ),
);
?>						
					
<style>
/*.summary { background: red }	*/
.container { width:1000px}
</style>					

<h2>CListView Dynamic View </h2>
<pre>
/**
	 * yiiListView set function.
	 * @param options map settings for the list view. Availablel options are as follows:
	 * - ajaxUpdate: array, IDs of the containers whose content may be updated by ajax response
	 * - ajaxVar: string, the name of the request variable indicating the ID of the element triggering the AJAX request
	 * - ajaxType: string, the type (GET or POST) of the AJAX request
	 * - pagerClass: string, the CSS class for the pager container
	 * - sorterClass: string, the CSS class for the sorter container
	 * - updateSelector: string, the selector for choosing which elements can trigger ajax requests
	 * - beforeAjaxUpdate: function, the function to be called before ajax request is sent
	 * - afterAjaxUpdate: function, the function to be called after ajax response is received
	 */
	 alert( $.fn.yiiListView.defaults.pagerClass 
jQuery('#user-list').yiiListView({
		'ajaxUpdate':['user-list'],
		'ajaxVar':'ajax',
		'pagerClass':'pager',
		'loadingClass':'list-view-loading',
		'sorterClass':'sorter',
		'enableHistory':false
	});
</pre>
<!------------------------------------------ INPUT AJAX DROPDOWN--------------------------------------------->
<?php
echo CHtml::dropDownList('view', '_view', 
		array(''=>'-List Style-', 
			'dynamic_view/_view'=>'Default(1 cols)', 'dynamic_view/_view2'=>'List 2 Column', 'dynamic_view/_view3'=>'Thumb 2cols',  'dynamic_view/_view4'=>'Thumb'
		),
		array(
				//'onchange'=>"$.fn.yiiListView.update('user-list',{ data:{view: $(this).val() }})",
				'class'=>'change_view',   //call registered class (optional)
				//'prompt'=>'Select View',
				//'empty'=>'Select View',
				'options'=> array( ''=>array('disabled'=>true, 'label'=>'value 1') ),
		));
?>

<?php
echo CHtml::dropDownList('pager_style', 1, 
		array( 0=>'-Pager Style-(lom fungsi)', 1=>'Default', 2=>'Skyblue', 3=>'Skyblue Smooth (grid)', 4=>'Custom'  ),
		array(
			'id'=>'pager_style',
			'onchange'=>"$.fn.yiiListView.update('user-list', { data:{ pager_style: $(this).val() } } )",
			'options'=> array( 0 =>array('disabled'=>true, 'label'=>'value 1') ),
		));
?>

<?php
echo CHtml::dropDownList(
	'pageSize',
	Yii::app()->user->getState('pageSize',Yii::app()->params['defaultPageSize']), 
	array(2=>2, 5=>5,10=>10,20=>20),
	array(
		'class'=>'change-pagesize',	#OR : 'onchange'=>"$.fn.yiiGridView.update('user-grid',{ data:{pageSize: $(this).val() }})",
));
?>

<?php echo CHtml::link('refresh', '#', array('id'=>'refresh', 'class'=>'btn')); ?>
<!-------------------------------------- CONTENT LIST VIEW --------------------------------------------->

<div class="view2" id="config_setting"></div>

<?php
Yii::app()->clientScript->registerScript('setting', "
	function setting(){	
		$.fn.yiiListView.settings['user-list'] = {
			ajaxUpdate: [],
			ajaxVar: 'ajax',
			ajaxType: 'GET',
			pagerClass: 'pager',
			loadingClass: 'loading',
			sorterClass: 'sorter'
		};
	}
	
	function config_setting(){			
		var settings = $.fn.yiiListView.settings['user-list'] ;
		var items=[];
		$.each(settings, function(key, val) {	//alert(bebas.readyState); //alert(key);
			items.push('<li>'+ key +' : ' + val + '</li>');		
		});	//alert(items);
		
		 $('<ul/>', {
			'style': 'background: whitesmoke',
			html: items.join('')
		}).appendTo('#config_setting');		
	}

	function test(){
		alert( $.fn.yiiListView.getKey );
		alert( $.fn.yiiListView.getUr );
		alert( $.fn.yiiListView.update );
	}
");
?>

<?php 
//REGISTER SCRIPT "CHANGE STYLE VIEW DROPDOWN"  	## optional ##		$.fn.yiiListView.settings = {};
Yii::app()->clientScript->registerScript('change_view',<<<EOD
   $('.change_view').live('change', function() {		
		config_setting();		test();
        $.fn.yiiListView.update('user-list', { 		
			data:{ view: $(this).val() }
		})
    });
EOD
,CClientScript::POS_READY);  // EOD sama dengan "
?>

<?php #REGISTER SCRIPT "PAGESIZE DROPDOWN"
Yii::app()->clientScript->registerScript('initPageSize',<<<EOD
    $('.change-pagesize').live('change', function() {
        $.fn.yiiListView.update('user-list', { 
			data:{ pageSize: $(this).val() }
		})
    });
EOD
,CClientScript::POS_READY);  // EOD sama dengan " (double quotes)
?>

<?php 
$this->widget('zii.widgets.CListView', array(
	'id'=>"user-list",
	'dataProvider'=>$model,
	//'ajaxUpdate'=>false,
	//'htmlOptions'=>array('style'=>'width:700px',),   
	'htmlOptions'=>array('width'=>'700px',),		//ok sip
	
	'itemView'=>$view, 
	
	'template'=>'{sorter}{pager}{summary}{items}{pager}', // default : {summary}\n{sorter}\n{items}\n{pager}
	//'template'=>'{items}', //** HANYA ITEM
	'pager'=>array(
		'maxButtonCount'=>'7',
	),
	'sortableAttributes'=>array(	// UNTTUK SORTIR FIELD
		'id',
		'username',
		'first_name',
		'role',
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
		// 'cssFile'=>$pager_style,
		'cssFile'=>isset($pager_style) ? Yii::app()->request->baseUrl.'/css/mygrid_custom/mypager_skyblue_smoth_border.css1' : null ,
		
		'maxButtonCount'=>'3',
		//'htmlOptions'=>''
	),  
	'enablePagination'=>true,  //default :true
	'enableSorting'=>true,	//default :true
	'sorterFooter'=>"<b class='txtAtt'> Text Footer </b>". $pager_style, //text, default: empty		XXXXXXXXXXXXX
	//'separator'=>"<b class='txtAtt'> HTML Separator </b>",
	'enableHistory'=>true,	#to persist state of list across page revisits. whether to leverage the {@link https://developer.mozilla.org/en/DOM/window.history DOM history object}.
	//'loadingCssClass'=>'custom-loading',  //class name loading  Defaults to 'list-view-loading'.
	
	//'baseScriptUrl'=>false,  //default: null, base script URL for all grid view resources (eg javascript, CSS file, images)
	#'cssFile'=>Yii::app()->request->baseUrl.'/css/mylist_custom/mypager_skyblue.css', 	//the URL of the CSS ),
	
	//'ajaxUrl'=>array('', //the URL for the AJAX requests should be sent to. CHtml::normalizeUrl() will be called on this property.),
	// 'updateSelector'=>'{page}, {sort}, #refresh'  //the HTML elements that may trigger AJAX updates 
	'updateSelector'=>'#user-list .pager a, #user-list .sorter a, #refresh',
	'afterAjaxUpdate'=>'function(id, data){ alert(data) }',  //function(id, data)
	//'beforeAjaxUpdate'=>'function(id,options){alert(unescape(options.url)) }',  //show url target ajax
)); 
?>


<?php  //cs()->registerCssFile( bu('./css/mypager_skyblue_smoth_border.css'), CClientScript::POS_END ); ?>
<!--------- PRINT ARRAY MODEL ------------->
<div class="tpanel btn">
	<span class="toggle"><?php echo Yii::t('ui','Load Model(print_r($model)'); ?></span>
	<div class="scroll2">
    	<?php dump($model); ?>
	</div>
</div>  

<!-------------------------------------------- RENDERED SCRIPT
<script type="text/javascript" src="/yii/yiiTest/assets/886f2155/listview/jquery.yiilistview.js"></script>
<script type="text/javascript">
/*<![CDATA[*/
jQuery(function($) {
    $('.change_view').live('change', function() {  								//alert( $(this).val() );
        $.fn.yiiListView.update('user-list',{ data:{ view: $(this).val() }})
    });
	
	jQuery('#user-list').yiiListView({
		'ajaxUpdate':['user-list'],
		'ajaxVar':'ajax',
		'pagerClass':'pager',
		'loadingClass':'list-view-loading',
		'sorterClass':'sorter','enableHistory':false
	});
  
  $("#nav li").hover(
		function () {
			if ($(this).hasClass("parent")) {
				$(this).addClass("over");
			}
		},
		function () {
			$(this).removeClass("over");
		}
	);

});
/*]]>*/
</script>
--->

<?php
#public CClientScript registerScript(string $id, string $script, integer $position=NULL)
// Yii::app()->clientScript->registerScript('change_view2', "
	// $('.change_view2').live('change', function() {  						  alert( $(this).val()  );
	// //$('.change_view2').change(function() {							  //alert( $(this).val()  );
	
		// $.ajax({         
            // type: 'GET',
			// url: '/HTDOCS/yiiProject/yiiTest/index.php/widget_ClistView/dynamic_view',
				
            // //data: {id:id},
			// data: {view: $(this).val() },
            // //dataType:'json',
                
			// //traditional:true,
			
			// //success: function() { $.fn.yiiListView.update('user-list',{ data:{ view: $(this).val() }}) }  //ini cth update ke id:Gridview
			// success: function(html) { $.fn.yiiListView.update('user-list'); }  //ini cth update ke id:Gridview
			
			// //'success':function(html){ jQuery('#view_dyn').html(html); $('#view_dyn').addClass('scroll2'); }    //ok test pake render partial
        // });	
		// return false;
	// });
// ");		
?>

<?php
// Yii::app()->clientScript->registerScript('change_view3', "
	// //$('.change_view3').live('change', function() {  						  alert( $(this).val()  );
	// $('.change_view3').change(function() {							  //alert( $(this).val()  );
		// $.fn.yiiListView.update('user-list', {
								// type:'GET',
								// //url:$(this).attr('href'),
								// url: '/HTDOCS/yiiProject/yiiTest/index.php/widget_ClistView/dynamic_view',
								// data: {view: $(this).val() },
								// success:function(data) {
									// $.fn.yiiListView.update('user-list');
									// //afterDelete(th,true,data);
								// },
								// // error:function(XHR) {
									// // return afterDelete(th,false,XHR);
								// // }
							// });
	// });
// ");		
?>	
