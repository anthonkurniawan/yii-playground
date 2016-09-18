
<?php		#code from yii-playground
if(!Yii::app()->request->isAjaxRequest)
{
	$cs=Yii::app()->clientScript;   //OR USE SHOTCUT "cs()"
	//cs()->registerCoreScript('jquery');  //udah di load pada "home" page
	//cs()->registerCoreScript('yii');
	$cs->registerScriptFile(bu('js/common.js'), CClientScript::POS_HEAD);  //include function :
								//$('a[rel*=external]').click, $('.tpanel .toggle'), $('.cpanel :checkbox:not(:checked)'), $('.cpanel :checkbox').click, 
								//$('.spanel select').change, $('.rpanel :radio').click, $(".openhelp").click, $(".clearform").click
}
	//$cs->registerScriptFile(bu('js/jquery-1.8.3.js') );  //just optional ( so far use jquery include by YII )
?> 

<?php  //Yii::app()->bootstrap->init(); #buat aktifin script "bootstrap" ?>

<!-- DEFAULT LAYOUT-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo bu() ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/myStyle.css" />
    <!--<link rel="stylesheet" type="text/css" href="<?php //echo Yii::app()->request->baseUrl; ?>/css/jui/base/jquery-ui.css" />-->
	<!-------------------------------------- CODE FROM YII PLAY-GROUND ---------------------------------------->
	<link rel="shortcut icon" href="<?php echo bu('favicon.ico'); ?>" />
	<link rel="stylesheet" type="text/css" href="<?php //echo bu('css/960.css'); ?>" />
	<link rel="stylesheet" type="text/css" href="<?php //echo bu('css/main.css'); ?>" />
	<link rel="stylesheet" type="text/css" href="<?php //echo bu('css/form.css'); ?>" />
	<!-------------------------------------------------------------------------------------------------------------------------------->
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
<?php //test echo"print_r(Yii::app()->catchAllRequest):"; print_r(Yii::app()->catchAllRequest); ?>
<div class="container" id="page">
	
	<div id="top"></div>
	
	<div id="header">
		<div style="float:right">
		<?php echo CHtml::link('GII',array('gii/default') ); ?>
		<a href="http://localhost/yiidoc/index.html" target="_blank">DOKUMENTASI</a>
		</div>
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
		
	</div><!-- header -->

    <!--------- MENU WITH (ext.widgets.ddmenu.XDropDownMenu) --------->
	<?php $this->renderPartial('/layouts/_mainMenu'); ?>
	
    <!---------------- BREADCUMBS --------------->
	<?php 
		if(isset($this->breadcrumbs)):
			$this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		));
	endif 
	?> 
    
	<!-------------------------------------------------ISI CONTENT----------------------------------------------------->
	<style>
	#content { font-size: 80%; }
	pre {margin:0px 0px 0px 0px; padding: 0; font-size:10px}
	.view2{ width:auto}
	.php-hl-main {font-size:10px}
	.php-hl-table {font-size:10px}
	.html-hl-main  {font-size:11px}
	.javascript-hl-main{font-size:10px}
	
	div .source_box  { font-size: 10px; } /* OVERRIDE SRC-COLLECT highlighter */
	</style>
	
	<?php echo $content; ?>
	
	<!------------------------------------------------ FOOTER -------------------------------------------->
    <div class="clear"></div>
	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

<!-------------------------- ADD SCRIPT JS ------------------------->
<!-- NOTE: BISA DI TULIS SPERTI HTML TAG BIASA <script></script>-->

<!--
<div id="btn_top"></div> 
 <a id="back-to-top" href="#header">Back to Top</a>
 -->
 
</div><!-- page -->

<?php 
#public CClientScript registerScript(string $id, string $script, integer $position=NULL)
// Yii::app()->clientScript->registerScript('tooltip_sample', "
	// //Tooltip-script
	// $('.tooltip').tooltip();
// " );		
?>

<!------------------------ FETCH OBJECT JS ------------------------>
<script>
	$(".btn").click(function(){ $(this).toggleClass('active'); });
	$('#btn_top').click(function() {	alert("test");
        $('html,body').animate({scrollTop: $("#container").offset().top},'slow');
    });
	
	
	function fetch_obj(obj, id_tag, arr_except, items) {	//alert(id_tag + 'id :' + obj.$id);
		if(! items) var items=[];
		var x =1;
		
		$.each( obj, function(key, val) {			//alert(key);
			var kelas = id_tag + x;											
			
			if( typeof val =='function'){		//alert(key);
				 if($.inArray( key, arr_except ) == -1) {  
					//items.push( '<li> <b>' + key + ' :</b> ' + obj[key]() + '<b class="txtDisable">('  + typeof val +')</b> </li>' );
					if( obj[key]()=='[object Object]') { 	
						items.push( '<li class=\'txtHead  txtCursor\' onClick=$(\".'+kelas+'\").slideToggle(); > ('+ x +')' + key + ' : ' + obj[key]() + 
							'<b class="txtDisable">('  + typeof val +') </b></li> <ul class='+kelas+' style=\'display:none\'>' );
						getObject( obj[key](), items, x, id_tag );			//alert('isArray!'); 
						//fetch_obj( obj[key](), null, id_tag );
						items.push('</ul>');
					}
					else { items.push( '<li> <b>' + key + ' :</b> ' + obj[key]() + ' <b class="txtDisable">('  + typeof val +')</b></li>' ); }
				}
			}
			else if( typeof val=='object'  && ! $.isEmptyObject(val) ){  	
				items.push( '<li class=\'txtHead  txtCursor\' onClick=$(\".'+kelas+'\").slideToggle(); >  ('+ x +')' + key + ' : ' + 
							'<b class="txtDisable">('  + typeof val +') </b></li> <ul class='+kelas+' style=\'display:none\'>' );
				// getObject( val, items, x, id_tag ); 
				fetch_obj( val, kelas, null, items); 			
				 items.push('</ul>');
			}
			else { items.push( '<li> <b>' + key + ' :</b> ' + val + ' <b class="txtDisable">('  + typeof val +')</b></li>' ); }
			x++;
		});
		// items = items.toString();
		// items = items.replace(',', '');   alert(items);
		items = items.join("");   //alert(items);
		
		panel = panelBtn_fixed('panel_'+id_tag, id_tag);
		return panel + '<div class="clear"></div> <ul id=\"panel_'+id_tag+'\" style="margin:0px; overflow:auto; height:100px; ">' + items +'</ul>';
	}
	
	function getObject( obj, id_tag, items ) {		 //alert($.isEmptyObject(obj));
		if( $.isEmptyObject(obj) ) {		//alert('test'+obj + typeof obj);
			return "empty";
		}
		if(! items) var items=[];
		var items=[];
		var i =1;

		//items.push('<ul>');	
		$.each( obj, function(key, val) {	//alert(key);
			var kelas = id_tag + '-' + i;

			 if( typeof val=='object'  && ! $.isEmptyObject(val) ){  			
				items.push(' <li onClick=$(\".'+kelas+'\").slideToggle(\"slow\");><span class=\'txtHead  txtCursor\'>  ('+ kelas +') ' + key +' : </span><i style=\"color:green\">' + val + '</i> ('  + typeof val +')</li>' +
					'<ul class='+kelas+' style=\'display:none\'>' );		//$.each( val, function(x, y) { alert(x + y); }); //alert($.isEmptyObject(val));
				items.push( getObject( val, kelas, items ) );
				items.push('</ul>');
			}
			else {  
				items.push( '<li> <b>' + key + '('  + typeof key +')</b> :</b> ' + val + '<b class="txtDisable"> ('  + typeof val +')</b></li>'  );  
			}
			i++;
		});		
		//items.push('</ul>');
		items = items.join(""); 
		return items;
	}
	
	function getObj_table(obj, id_tag){ 	//alert(obj.length);
		var obj_filter = getFilter(obj, 'get');
		
		var items = [];
		items.push('<table>');
		$.each( obj_filter, function(key, val) {
			items.push('<tr><td>' + val + '</td></tr>');
		});
		items.push('</table>');
		// items = items.replace(/,/g, '');
		items = items.join("");  // join array to string || remove "comma ,"
		//return items;
		panel = panelBtn_float(id_tag, '100px', true);	
		$('#'+id_tag).html( '<b class="badge badge-inverse" onClick="js:$(this).siblings().slideToggle();">'+ id_tag +'</b>'+ panel +'<ul>' + items + '</ul> </div>');
	}
	
	
	function getObj_table_method(obj, id_tag, label, cols, css){ 	//alert(obj.length);
		var items = [];
		var id_tag_attr = 'panel_'+id_tag;
		
		items.push('<table class=\"'+css+'\">');
		if(cols) 
			$.each(cols, function(key, col) {	
				 if( typeof col==='object' )
					items.push('<th width='+col.width+' onClick="$(\'.td-'+key+'\').css({\'white-space\': \'nowrap\'});">'+ col.name +'</th>');
				 else
					items.push('<th onClick="$(\'.td-'+key+'\').css({\'white-space\': \'nowrap\'});">'+ col +'</th>');
			});	
			
		$.each( obj, function(key, val) {	
			items.push('<tr>');
			if(cols){
				var i =1;
				var obj_class = 'col'+i+'-'+key;
				//var data=null;
				
				$.each(cols, function(x, col) {	//alert(col);
					data = (typeof col =='object') ? col.name : col;	//alert(data);
					
					 if( typeof val[data]==='object' ){
						items.push(
							(! $.isEmptyObject(val[data])) ?
						'<td class=\"td-'+x+'\"> <ul style=\"list-style-type:square\"><li class=\'txtHead  txtCursor\' onClick=$(\".'+obj_class+'\").slideToggle(\"slow\");>'+ (val[data].toString()).substr( 0, 20) + '... <b class="txtDisable">('+typeof val[data]+')</b></li>'+
							'<ul class=\"'+obj_class+'\" style=\'display:none;list-style-type:decimal\'> '+ getObject( val[data], obj_class ) + '</ul></ul>'+
						'</td>' : 
						'<td>('+typeof val[data]+') -- null </td>'
						);
					 }
					 else{
						items.push( (val[data]=="") ? '<td style=\"text-align: center\"> - </td>' : '<td class=\"td-'+x+'\">' + (val[data].toString()).replace(/Parameter/g,'' ) + '</td>');
					 }
					i++;
				});
			}
			else
				items.push('<td>' + val + '</td>');
			items.push('</tr>');
		});
		
		items.push('</table>');
		// items = items.replace(/,/g, '');
		items = items.join("");  // join array to string || remove "comma ,"
		//return items;
		panel = panelBtn_fixed(id_tag_attr, label);
		//$('#'+id_tag).html( panel + '<div class="clear"></div> <div id=\"'+id_tag_attr+'\" style="overflow:auto; height:100px; ">' + items +'</div>' );
		return panel + '<div class="clear"></div> <div id=\"'+id_tag_attr+'\" style="height:100px; ">' + items +'</div>';
	}
	
	
	/*-------------------- OBJ TO JUI TABS ( used on SORL ) ------------------*/
	function getObj_tabs(tab_id, tab_item){ 	//alert( obj); //alert(obj.length);
		var tabs = $('#'+tab_id);		
		var tab_nav = $('.ui-tabs-nav');	
		var tab_idx = tab_nav.find('li').length;		//alert(tab_idx);
		
		if(typeof tab_item=='object'){
			var tab_head = [];
			var tab_cont =[];
			var tab_item_id = tab_id;
			
			$.each( tab_item, function(key, val) {	//alert(key + val);
				tab_head.push('<li><a href=\"#'+ tab_id+'_'+key+tab_idx+'\" title=\"#'+ tab_id+'_'+key+tab_idx+'\">'+ key+' ('+tab_idx+')</a><span class=\"ui-icon ui-icon-close\">Remove Tab</span></li>');
				if(typeof val=='object')
					tab_cont.push('<div id=\"'+ tab_id+'_'+key+tab_idx+'\">'+ kelas_detail(val, tab_id+'_'+key+tab_idx) +'</div>');
				else
					tab_cont.push('<div id=\"'+ tab_id+'_'+key+tab_idx+'\">'+val +'</div>');
				
				tab_idx++;
			});
		}
		tabs.find('ul').append( tab_head );
		tab_nav.after( tab_cont ); 
		tabs.tabs( "refresh" );
		tabs.show();							
	}
	
	
	function clearTab(tab_id){
		var tabs = $('#'+tab_id);
		var count_item = tabs.find('ul.ui-tabs-nav').find('li.ui-state-default').length;	//alert(count_item);
		if(count_item!=0){	alert(count_item);
			var panelID = tabs.find('li.ui-state-default').remove();		
			tabs.find('div').remove();
			tabs.tabs( "refresh" );
		}
	}
	
	
	// close icon: removing the tab on click
	$( "#tabs span.ui-icon-close" ).live( "click", function() {
		var panelId = $( this ).closest( "li" ).remove().attr( "aria-controls" );	//alert(panelId);
		$( "#" + panelId ).remove();
		//tabs.tabs( "refresh" );
	});
		
	/* FECT KELAS PROPERTIES ( seperti pegunaan pada tools kelas yii) */
	function kelas_detail(data, tab_id){	
		var str ='';
		var label_parent = label_badge(data.parent_label);	//alert(typeof label_parent);
		label_parent = (label_parent) ? label_parent.toString().replace(/,/g, '') : "";		//remove comma ','
		var label_class = '<div class=\"badge badge-inverse\"> <a href=\"http://localhost/yiidoc/'+ data.class_name + '.html\" target=_blank>' + data.class_name + '</a></div>';
		//panel.html( label_class + label_parent );
		
		var panelBtn = panelBtn_float('res_obj'+tab_id, '100px', true);	// panelBtn_float(id_tag, height, panelOff)
		//res_arr.html( panelBtn + data.arr_obj); 
		
		var res_obj = fetch_obj(data.obj, 'tree_obj'+tab_id, null, null);
		
		// /* -- fetch obj get method to table -- sntax: getObj_table_method(obj, str-tagID, str-label, arr-cols, str-classCss ) --*/
		var class_method = getObj_table_method( data.class_method, 'class_method'+tab_id, 'Method');
					
		/* get table for get method & result */
		var get_method_val = getObj_table_method( data.get_method_val, 'get_method_val'+tab_id, 'Value get-method', ['method','value','class'], 'dataGrid');
		
		/* get table for all method */
		//var cols = ['name', 'param_req', 'param_num', 'params', 'doc', 'class'];
		var cols = [{'name':'name', 'width':'80px'}, {name:'param_req' ,'width':'80px'}, {name:'param_num' ,'width':'80px'}, {name:'params' ,'width':'200px'}, {name:'doc' ,'width':'400px'}, {name:'class' ,'width': '100px'}];
		var class_ref_method = getObj_table_method( data.class_ref_method, 'class_ref_method'+tab_id, 'Refrection of Class Method', cols, 'dataGrid tbl_resize');
		
		str = '<div id=\"panel_class\">'+label_class + label_parent+'</div>' +
				 panelBtn +
				'<div id=\"res_obj'+tab_id+'\" class=\"myBox\" style=\"margin-bottom:2px\">'+ data.arr_obj +'</div>'+
				'<table class="tbl_resize" border:1><tr>'+
				'<td width=250> <div id=\"tree_obj'+tab_id+'\" class=\"myBox\"  style=\" margin-right:2px;overflow-x:hidden; overflow-y: auto;\">'+res_obj+'</div></td>'+
				'<td width=150> <div id=\"class_method'+tab_id+'\" class=\"myBox\" style=\"margin-right:2px;overflow-x:hidden; overflow-y: auto;\">'+class_method+'</div></td>'+
				'<td><div id="get_method_val'+tab_id+'\" class="myBox" style="margin-right:2px;overflow-x:hidden; overflow-y: auto;">'+get_method_val+'</div></td>'+
				'</tr></table>'+
				'<div id="class_ref_method'+tab_id+'\" class=\"myBox\" style="margin-top:2px; overflow-x:hidden; overflow-y: auto;">'+class_ref_method+'</div>';	
		return str;
	}
	
	
	function panelBtn_fixed(id_tag_attr, label){	
		var panel =  '<div class="badge badge-inverse left" onClick="$(\'#'+id_tag_attr+'\').slideToggle();">'+ label +'</div>'+
				'<div class="btn-group right" style="padding:0px;">'+
				'<div class="icon_max btn btn-default" title="Maximize" onClick="$(\'#'+id_tag_attr+'\').animate({height:\'100%\'}, \'slow\');"></div>'+
				'<div class="icon_min btn btn-default" title="Miximize" onClick="$(\'#'+id_tag_attr+'\').css({\'height\': \'100px\', \'overflow\':\'auto\'});"></div>'+
				'<div class="icon_close btn btn-default" title="close" onClick=" $(\'#'+id_tag_attr+'\').slideUp(); $(\'#toggle-'+id_tag_attr+'\').show(1000);"></div>'+
				'</div>';
		return panel;
	}	
	
	/* PANEL BUTTON FOR HEADER */
	function panelBtn_float(id_tag, height, panelOff){	
		var par = "#"+id_tag;  
		var box_btn = ($('#'+id_tag_attr).width()) ? $('#'+id_tag_attr).width() : 80;		//alert($(par).width());
		//var margin_right = ($('body').width()) - ($(par).parent().width());	//alert(margin_right); alert($(par).parent().width() );	//alert( $(par).parent().width() );
		var margin_left = ($(par).width()) ? ($(par).width() - box_btn)+'px' : '98%';  		//alert( box_btn );//alert( $('#'+id_tag).width() );
		var id_tag_attr = 'panel_'+id_tag;
		
		$(par).css({'height' : height, 'overflow' : 'auto'});

		var panel = '<div  id="'+id_tag_attr+'" class="btn-group right" style="position: absolute; margin-left:' + margin_left+ ';">'+
				'<div class="task_'+id_tag_attr+' icon_max btn btn-default" title="Maximize" onClick="$(\'#'+id_tag+'\').animate({height:\'100%\'}, \'slow\');"></div>'+
				'<div class="task_'+id_tag_attr+' icon_min btn btn-default" title="Miximize" onClick="$(\'#'+id_tag+'\').css({\'height\': \'100px\', \'overflow\':\'auto\'}).scrollTop($(\'#'+id_tag+'\').height());"></div>'+
				//'<div class="icon_close btn btn-default" title="close" onClick="$(\'#'+id_tag+'\').slideUp(); $(\'#toggle-'+id_tag_attr+'\').show(1000);"></div>'+
				'<div class="task_'+id_tag_attr+' icon_close btn btn-default" title="close" onClick="$(\'#'+id_tag_attr+'_toggle\').show(); $(\'.task_'+id_tag_attr+'\').slideUp(); $(\'#'+id_tag_attr+'\').css({\'position\': \'relative\'}); $(\'#'+id_tag+'\').slideUp();"></div>'+
				'<div id="'+id_tag_attr+'_toggle" class="icon_on btn btn-default" title="Show" onClick="$(\'#'+id_tag+'\').slideToggle(); $(this).hide(); $(\'.task_'+id_tag_attr+'\').show(); $(\'#'+id_tag_attr+'\').css({\'position\': \'absolute\'});" style="display:none"></div>'+
				'</div>';
		if(!panelOff)
			$(par).before(panel);
		else
			return panel;
	}

	function label_badge(obj){	//alert(obj);
		if( ! $.isEmptyObject(obj)) {  
		var labels=[];
		$.each(obj, function(key, val){ 
			// labels.push('<div class=parent_label left></div>');  
			labels.push(' &#9002;&#9002; ');
			labels.push('<div class=\"label label-info\"> <a href=\"http://localhost/yiidoc/'+ val + '.html\" target=_blank>' + val + '</a></div>'); 
		});
		return labels;
	}}
	
	/* ARRAY FILTER STRING GIVEN  with string.indexOf(searchvalue,start) -- start is optional*/
	function getFilter(obj, str){
		var arr_get_method =[];
		var arr_other=[];
		
		$.each( obj, function(key, val) {
			if(val.indexOf(str)==0)
				arr_get_method.push(val);
			else
				arr_other.push(val);
		});
		
		arr = $.merge( arr_get_method, arr_other ); 	// MERGE ARRAY
		return arr; 
	}
	
	/* jquery.smoothscroll.js */
	$(document).ready(function() {
  function filterPath(string) {
  return string
    .replace(/^\//,'')
    .replace(/(index|default).[a-zA-Z]{3,4}$/,'')
    .replace(/\/$/,'');
  }
  var locationPath = filterPath(location.pathname);
  var scrollElem = scrollableElement('html', 'body');

  $('a[href*=#]').each(function() {
    var thisPath = filterPath(this.pathname) || locationPath;
    if (  locationPath == thisPath
    && (location.hostname == this.hostname || !this.hostname)
    && this.hash.replace(/#/,'') ) {
      var $target = $(this.hash), target = this.hash;
      if (target) {
        var targetOffset = $target.offset().top;
        $(this).click(function(event) {
          event.preventDefault();
          $(scrollElem).animate({scrollTop: targetOffset}, 400, function() {
            location.hash = target;
          });
        });
      }
    }
  });

  // use the first element that is "scrollable"
  function scrollableElement(els) {
    for (var i = 0, argLength = arguments.length; i <argLength; i++) {
      var el = arguments[i],
          $scrollElement = $(el);
      if ($scrollElement.scrollTop()> 0) {
        return el;
      } else {
        $scrollElement.scrollTop(1);
        var isScrollable = $scrollElement.scrollTop()> 0;
        $scrollElement.scrollTop(0);
        if (isScrollable) {
          return el;
        }
      }
    }
    return [];
  }

});
</script>

</body>
</html>