<?php $this->layout='column1' ; //column2_custom_full'; ?>
<?php $this->pageTitle=Yii::app()->name . ' - Cek Class'; ?>
<?php //$this->breadcrumbs=array('cekCek Class',); ?>

<style>
div.left_menu, div.right_menu{
	top:0px;
	width: auto;
}
div.left_menu a, div.right_menu a{ text-decoration: none; }
div.left_menu li span, div.right_menu li span{ font-weight: bold; cursor: pointer }
div.left_menu li, div.right_menu li{ list-style-type: none; border-top: 1px solid #F1e1e1;		 /*#F4F4F4*/}
div.left_menu li ul li, div.right_menu li ul li{ list-style-type: disc; }
li.selected {color:red}
li.selected a{color:red}

.container{min-width:900px; max-width:1200px} .span-23{ width:1040px } .span-5{ width:150px; float: right}
.box1 { height:100px; min-width:200px; max-width:500px; overflow-x:hidden; overflow-y: scroll;}
.box1, .box2 { margin-right:2px; }
.label {cursor: pointer}

.bol1{ color : green; diaplay:none}
</style>
<?php 
//dump(Yii::app()); 
?>

<?php 
$components = Yii::app()->getComponents(false);	//dump($components); 

foreach($components as $key=>$value){
	$arr[] = array(
		'key'=>$key, 
		'label'=>$label = is_object($value) ? get_class($value) : $value['class'],
		'ext'=> ( ! strpos($label, '.') ) ? false : true
	);
}
//dump($arr);

# BUILD MENU LINK
$link = array(
	'yii-base'=>array(
		'label'=>'YII Base', 
		'items'=>array(
			array('label'=>'Yii::getLogger()', 'url'=>'#', 'linkOptions'=>array('onClick'=>'js:getClass("getLogger")')),
			'yii-app'=>array(
				'label'=>'Yii::app()', 'url'=>'#',  'linkOptions'=>array('onClick'=>'js:getClass("app")'), 'items'=>array(
					'yii-class'=>array('label'=>'YII Components - Yii::app()', 'linkOptions'=>array('onclick'=>'js:$(this).siblings().slideToggle();'), 'submenuOptions'=>array('style'=>'display:none') ),
					'ext-class'=>array('label'=>'Ext. Components', 'linkOptions'=>array('onclick'=>'js:$(this).siblings().slideToggle();'), 'submenuOptions'=>array('style'=>'display:none') ),
				)),
		),
	),
);

foreach($arr as $key=>$value){		//echo $key; dump($value);
	//$link[]= array('label'=>$value['label'], 'url'=>'#', 'linkOptions'=>array('onClick'=>"js:getClass('{$value['key']}')") );
	if(! $value['ext'])
		$link['yii-base']['items']['yii-app']['items']['yii-class']['items'][] = array('label'=>"{$value['label']} ({$value['key']})", 'url'=>'#', 'linkOptions'=>array('onClick'=>"js:getClass('{$value['key']}')"));
	else
		$link['yii-base']['items']['yii-app']['items']['ext-class']['items'][] = array('label'=>"{$value['label']} ({$value['key']})", 'url'=>'#', 'linkOptions'=>array('onClick'=>"js:getClass('{$value['key']}')") );
}

array_multisort($link['yii-base']['items']['yii-app']['items']['yii-class']['items'], SORT_ASC);
//dump($link);			
?>


<?php
$this->beginWidget('ext-coll.menu.rightsidebar.RightSidebar', array('title' => 'Menu', 'position'=>'left', 'collapsed' => false));
//$this->beginWidget('ext-coll.MENU.sidebar.Sidebar', array('title' => 'Menu', 'position' => 'left'));
$this->widget('zii.widgets.CMenu', array(
    'items' => $link
));
$this->endWidget();
?>


<div class="view2" style="margin:0px 0px 10px">
<b>Created Module : </b>
<?php
$modules = $this->getAllModule();
foreach ($modules as $module){
	echo CHtml::link($module,  '#', array('class'=>'kelas label label-info',  'onClick'=>"js:getClass('{$module}')", 'style'=>'margin-right:5px'));
}
?>
<b style="margin-left:10px">All Declared Class : </b>
<?php echo CHtml::link('Declared Class',  '#', array('class'=>'kelas label label-warning',  'onClick'=>"js:decClass('class')", 'style'=>'margin-right:5px'));?>
<?php echo CHtml::link('Declared Interfaces',  '#', array('class'=>'kelas label label-importan',  'onClick'=>"js:decClass('interface')", 'style'=>'margin-right:5px'));?>
<?php echo CHtml::link('Declared Traits',  '#', array('class'=>'kelas label label-success',  'onClick'=>"js:decClass('traits')", 'style'=>'margin-right:5px'));?>
</div>

<!----------------------------------------------------------------- MAIN RESULT -------------------------------------------------->
<div id="dec_class"></div>
<div id="panel_class"></div> <!-- panel label class -->
<div id="res_arr" style="margin:0;margin-bottom:2px"></div> <!--- box dump obj --->
<div class="clear"></div>

<div id="res_obj" class="box2 left" style="min-width:300px; max-width:300px;"></div>
<div id="class_method" class="box2 left" style="width:100%; min-width:105px; max-width:175px; overflow-x:hidden; overflow-y: auto"></div>
<div id="get_method_val" class="box2 left" style="min-width:400px; max-width:590px;  overflow-x:hidden; overflow-y: auto;"></div>

<div style="clear:left"></div>

<div id="class_ref_method" style="margin-top:2px; overflow-x:hidden; overflow-y: auto"></div>


<script>
// GET QUERY PARAM IF EXIST
$("body").ready( function(){
	//alert('x');
	//console.log( jQuery.param() );
	var param = getQueryParam();		console.log(param);
	if(param.kelas)
		getClass(param.kelas);
}); 

function getQueryParam() {
	var args = new Object( );
    var query = location.search.substring(1);     // Get query string
    var pairs = query.split("&");                 // Break at ampersand
    for(var i = 0; i < pairs.length; i++) {
        var pos = pairs[i].indexOf('=');          // Look for "name=value"
        if (pos == -1) continue;                  // If not found, skip
        var argname = pairs[i].substring(0,pos);  // Extract the name
        var value = pairs[i].substring(pos+1);    // Extract the value
        value = decodeURIComponent(value);        // Decode it, if needed
        args[argname] = value;                    // Store as a property
    }
    return args;                                  // Return the object

  };
</script>

 <?php 
$cs = Yii::app()->getClientScript();  
# GET SUB CLASS
$cs->registerScript('label',
	"function label_badge(obj){	//alert(obj);
		if( ! $.isEmptyObject(obj)) {  
		var labels=[];
		$.each(obj, function(key, val){ 
			// labels.push('<div class=parent_label left></div>');  
			labels.push(' &#9002;&#9002; ');
			labels.push('<div class=\"label label-success\"> <a href=\"http://localhost/yiidoc/'+ val + '.html\" target=_blank>' + val + '</a></div>'); 
		});
		return labels;
	}}"
);

#GET DECLARED CLASS
$cs->registerScript('dec_class',
	"function decClass(val){	//alert(val);
		$.ajax({
			url: '/yii/yiitest/tool/getDeclare_class',
			data : {var : val},
			beforeSend :function(){
				$('#dec_class').html('<div class=\'loading\'>loading..</div>') 
			},
			success: function(data){ 
				console.log(data);
				panelBtn_float('dec_class', '100px', false);
				$('#dec_class').addClass('myBox').html('<span class=badge badge-inverse>Declared Classes</span> <pre>'+ data +'</pre>');
			}
		});
	}" ,CClientScript::POS_END  
);

# GET RESULT
$cs->registerScript(
    'link',        //ID that uniquely identifies this piece of JavaScript code
    // "$('.kelas').click(function(){ 	// alert( $(this).attr('value') ); 
	  "function getClass(val){ 	//alert(val);
		var res_arr = $('#res_arr');
		var panel = $('#panel_class');
		var panelBtn = panelBtn_float('res_arr', '200px', false);	// panelBtn_float(id_tag, height, panelOff)
		var obj_tree = $('#res_obj');
		var class_method = $('#class_method');
		var class_ref_method = $('#class_ref_method');
		var get_method_val = $('#get_method_val');
		var list_box = [res_arr, obj_tree, class_method, class_ref_method, get_method_val];
		
		 $.ajax({
                url: '/yii/yiitest/tool/fetchKelas',
				type: 'POST',
				dataType: 'json',
				data : { kelas : val },
				beforeSend :function(){
					panel.html('');
					$.each(list_box, function(x, box){ 
						box.css({'padding': '5px'});
						box.html('<div class=\'loading\'>loading..</div>') 
					});
				},
				success: function(data){ 	 console.log('sucess', data);  //alert(data.parent_label);
					res_arr.addClass('myBox');
					obj_tree.addClass('myBox');
					$.each(list_box, function(x, box){ box.addClass('myBox') });
					
					if(data.class_name !== null){
						//class_method.addClass('myBox');
						//class_ref_method.addClass('myBox');
						//get_method_val.addClass('myBox');
						
						var label_parent = label_badge(data.parent_label);	//alert(typeof label_parent);
						label_parent = (label_parent) ? label_parent.toString().replace(/,/g, '') : null;		//remove comma ','
						var label_class = '<div class=\"badge badge-inverse\"> <a href=\"http://localhost/yiidoc/'+ data.class_name + '.html\" target=_blank>' + data.class_name + '</a></div>';
						panel.html( label_class + label_parent );
					
						// var n=str.indexOf('string');
						//getObj_table( data.class_method, 'class_method');
						/* -- fetch obj get method to table -- sntax: getObj_table_method(obj, str-tagID, str-label, arr-cols, str-classCss ) --*/
						class_method.html( getObj_table_method( data.class_method, 'class_method', 'Class Method') );
						//obj_tree.html( fetch_obj(data.obj, 'res_obj', null, null) );	
						//class_method.html( fetch_obj(data.class_method, 'class_method', 'Class Method') );	
						
						/* get table for all method */
						var cols = ['name', 'param_req', 'param_num', 'params', 'doc', 'class'];
						class_ref_method.html( getObj_table_method( data.class_ref_method, 'class_ref_method', 'Refrection of Class Method', cols, 'dataGrid') );
					
						/* get table for get method & result */
						get_method_val.html( getObj_table_method( data.get_method_val, 'get_method_val', 'Value get-method', ['method','value','class'], 'dataGrid') );
					}
					else {
						var list_box_class = [class_method, class_ref_method, get_method_val];
						$.each(list_box_class, function(x, box){ box.html('tidak ada data') });
					}
					
					//res_arr.before( panelBtn );
					res_arr.html(data.arr_obj); 

					obj_tree.html( fetch_obj(data.obj, 'res_obj', null, null) );			// jQuery.parseJSON('response from server')
				},
				error: function(xhr, status, errorThrown) {	//Type: Function( jqXHR jqXHR, String textStatus, String errorThrown )
					// $('#result_data_txt').text( xhr.readyState + xhr.setRequestHeader + xhr.getAllResponseHeaders + 
					console.log('error ', xhr);
					$('#res_arr').html( '<b class=txtAtt>' + status +' : '+ xhr.responseText + '</b>');
				},
            });
           // return res_arr; 
	}"	
	//});"                //define function
    ,CClientScript::POS_END   # Defaults to CClientScript::POS_READY.
);
?>

<!------------------------------------------------------------ NOTE -------------------------------------------------------->
<hr>
<ul>
<li>Lihat Varibale on the page <code>$this</code></li>
<div class="tpanel"> <!--- load model ------->
	<div class="toggle btn"><?php echo Yii::t('ui','<code>View( dump($this) )</code>'); ?></div>
	<div class="scroll2"><?php dump($this); ?></div>
</div>
<li>Lihat Controller Path : <code>Yii::app()->controllerPath</code> : <?php echo Yii::app()->controllerPath; ?> </li>
<li>Lihat Current Route : <code>$this->route;</code> : <?php echo $this->route;?> </li>
<li>Lihat varibale semua Menu on the page :<code>Yii::app()->controller->menu</code> <li>
<div class="tpanel"> 
	<div class="toggle btn"><?php echo Yii::t('ui','<code>Lihat semua menu</code>'); ?></div>
	<div class="scroll2"><?php dump(Yii::app()->controller->menu); ?></div>
</div>

<li>Lihat Controller <code>Yii::app()->controller->id</code> <?php echo Yii::app()->controller->id."</b>" ?> </li>
<li>sample <code>Yii::import()</code><li> Sample :
<div class="tpanel"> <!--- load model ------->
	<div class="toggle btn"><?php echo Yii::t('ui','<code>Yii::import("system.web.widgets.CWidget");</code>'); ?></div>
	<div class="scroll2">
	<?php 
	//Yii::import(CInputWidget); 
	// Yii::import('zii.widgets.CPortlet');		dump(new CPortlet);
	Yii::import('system.web.widgets.CWidget');
	dump(new CWidget);
	?>
	</div>
</div>

</ul>
