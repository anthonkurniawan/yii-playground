<!--
<script type="text/javascript">
function add() {			
	$('#dialog').dialog('open');
	/*if(!url) var url = 'http:localhost/yii/yiiTest/index.php/widget_CgridView/createxx';*/ //alert("url :" + url);
    jQuery.ajax({'url':url,'data':$(this).serialize(),'type':'post','dataType':'json','success':function(data) {
            if (data.status == 'failure'){
				$('#dialog').dialog({'title':  data.title } );
                $('#dialog div.dialogContent').html(data.content);
                $('#dialog div.dialogContent form').submit( add );
            }
           else{
                $('#dialog div.dialogContent').html(data.content);
				$.fn.yiiGridView.update('user-grid');	//refresh table
                setTimeout("$('#dialog').dialog('close') ",1000);
            }
        } ,'beforeSend':function() {  $(".dialogContent").html("loading.."); },'cache':false});;
    return false; 
}

$( "#dialog" ).on( "dialogbeforeclose", function( event, ui ) {  $("#dialog div.dialogContent").empty(); } );
//$( "#dialog" ).on( "dialogcreate", function( event, ui ) { alert("test"); } );  //pas page loading sudah alert
</script>

<script type="text/javascript">
/*<![CDATA[*/
jQuery(function($) {

	jQuery('#dialog').dialog({'autoOpen':false,'modal':true,'width':'500px','buttons':{'Cancel':function() { $(this).dialog( "destroy" ); $(this).dialog("close");  }}});

	jQuery('#TblUserMysql_username').autocomplete({'focus':function(event, ui) {
						$('#TblUserMysql_username').val(ui.item.value);
					},'source':'/yii/yiiTest/index.php/request/suggest?language=id'});
					
	jQuery('#create_date').datepicker({'dateFormat':'yy-mm-dd','changeYear':true,'showOn':'button','buttonImage':'../../images/date.png','buttonImageOnly':true});

	jQuery(document).on('click','#user-grid a.delete',function(){ 	//alert("test"); 
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
						});
						
	jQuery('#user-grid').yiiGridView({
		'ajaxUpdate':['user-grid'],
		'ajaxVar':'ajax',
		'pagerClass':'pager',
		'loadingClass':'grid-view-loading',
		'filterClass':'filters',
		'tableClass':'items',
		'selectableRows':2,
		'enableHistory':false,
		'updateSelector':'{page}, {sort}, #refresh','filterSelector':'{filter}','pageVar':'TblUserMysql_page','beforeAjaxUpdate':function(id,options){alert(unescape(options.url)); alert("test"); },'afterAjaxUpdate':function(){
		jQuery('#TblUserMysql_username').autocomplete({
			'delay':300,
			'minLength':2,
			'source':'/yii/yiiTest/index.php/request/suggestUsername?language=id',
			'focus':function(event, ui) {
				$('#TblUserMysql_username').val(ui.item.value);
			}
		});
		
		jQuery('#create_date').datepicker({'dateFormat': 'yy-mm-dd'});
		
		$('.tooltip').tooltip();
		
		$('.tooltip_ajax').tooltip({
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
    });;  //register di atas
		
		$('#toggle').toggle( 
			function() {		alert( $('table.items').css('width') );  
				//alert('First handler for .toggle() called.');
				$('#toggle').attr('src', '../../images/previous2.gif')
				$('th.col_hide').addClass('col_hide_head2');
				$('.col_hide').show('fade'); 
				
			}, 
			function() {
				//alert('Second handler for .toggle() called.');
				$('#toggle').attr('src', '../../images/next2.gif')
				$('.col_hide').hide('fade'); 
			});; //register di atas;
		//$('.close1').hide();
		//$('.close2').hide();
		
		
	},'ajaxUpdateError':function(xhr,ts,et,err){ $("#myerrordiv").text(err); },'selectionChanged':selectRow});
	
jQuery('#logs').yiiGridView({'ajaxUpdate':['logs'],'ajaxVar':'ajax','pagerClass':'pager','loadingClass':'grid-view-loading','filterClass':'filters','tableClass':'items','selectableRows':1,'enableHistory':false,'updateSelector':'{page}, {sort}','filterSelector':'{filter}'});

jQuery('body').on('click','#yt0',function(){{ $("#dialog").dialog("open"); } ;jQuery.ajax({'url':'/yii/yiiTest/index.php/widget_CgridView/LogsData2/1?language=id','cache':false,'success':function(html){jQuery("#dialog div.dialogContent").html(html)}});return false;});

//view dialog
jQuery('body').on('click','#yt1',function(){jQuery.ajax({'type':'POST','url':$(this).attr('href'),'cache':false,'data':jQuery(this).parents("form").serialize(),'success':function(html){jQuery(".dialogContent").html(html)}});return false;});

//updateJoin Dialog
jQuery('body').on('click','#yt2',function(){
	{
	url= $(this).attr("href");    		
	add(url);   //PAKE FUNGSI REPLACE CARA #2 (RECOMMENDED)
	// $("#dialog").dialog({"title":  url } );
	// $("#dialog").dialog("open");
	return false;
	};
	
	//CARA #2	
	jQuery.ajax({
		'type':'POST',
		'url':$(this).attr('href'),
		'data':$(this).serialize(),
		'dataType':'json',
		'success':function(data) {
			if (data.status == 'failure'){
				$('#dialog div.dialogContent').html(data.content);
				$('#dialog div.dialogContent form').submit( add );
			}
			else{
				$('#dialog div.dialogContent').html(data.content);
				$.fn.yiiGridView.update('user-grid');	//refresh table
				setTimeout("$('#dialog').dialog('close') ",1000);
			}
		} ,
		'beforeSend':function() {  $(".dialogContent").html("loading.."); },'cache':false});return false;
});
								
jQuery('body').on('click','#yt3',function(){{ $("#dialog").dialog("open"); } ;jQuery.ajax({'url':'/yii/yiiTest/index.php/widget_CgridView/LogsData2/20?language=id','cache':false,'success':function(html){jQuery("#dialog div.dialogContent").html(html)}});return false;});
jQuery('body').on('click','#yt4',function(){jQuery.ajax({'type':'POST','url':$(this).attr('href'),'cache':false,'data':jQuery(this).parents("form").serialize(),'success':function(html){jQuery(".dialogContent").html(html)}});return false;});
jQuery('body').on('click','#yt5',function(){{
								url= $(this).attr("href");     //ini buat cari url dari link(buat update)   						
								add(url);   //add(url);
								// $("#dialog").dialog({"title":  url } );
								// $("#dialog").dialog("open");
								return false;
							};jQuery.ajax({'type':'POST','url':$(this).attr('href'),'data':$(this).serialize(),'dataType':'json','success':function(data) {
									if (data.status == 'failure'){
										$('#dialog div.dialogContent').html(data.content);
										$('#dialog div.dialogContent form').submit( add );
									}
									else{
										$('#dialog div.dialogContent').html(data.content);
										$.fn.yiiGridView.update('user-grid');	//refresh table
										setTimeout("$('#dialog').dialog('close') ",1000);
									}
								} ,'beforeSend':function() {  $(".dialogContent").html("loading.."); },'cache':false});return false;});
jQuery('body').on('click','#yt6',function(){{ $("#dialog").dialog("open"); } ;jQuery.ajax({'url':'/yii/yiiTest/index.php/widget_CgridView/LogsData2/21?language=id','cache':false,'success':function(html){jQuery("#dialog div.dialogContent").html(html)}});return false;});
jQuery('body').on('click','#yt7',function(){jQuery.ajax({'type':'POST','url':$(this).attr('href'),'cache':false,'data':jQuery(this).parents("form").serialize(),'success':function(html){jQuery(".dialogContent").html(html)}});return false;});
jQuery('body').on('click','#yt8',function(){{
								url= $(this).attr("href");     //ini buat cari url dari link(buat update)   						
								add(url);   //add(url);
								// $("#dialog").dialog({"title":  url } );
								// $("#dialog").dialog("open");
								return false;
							};jQuery.ajax({'type':'POST','url':$(this).attr('href'),'data':$(this).serialize(),'dataType':'json','success':function(data) {
									if (data.status == 'failure'){
										$('#dialog div.dialogContent').html(data.content);
										$('#dialog div.dialogContent form').submit( add );
									}
									else{
										$('#dialog div.dialogContent').html(data.content);
										$.fn.yiiGridView.update('user-grid');	//refresh table
										setTimeout("$('#dialog').dialog('close') ",1000);
									}
								} ,'beforeSend':function() {  $(".dialogContent").html("loading.."); },'cache':false});return false;});
jQuery('body').on('click','#yt9',function(){{ $("#dialog").dialog("open"); } ;jQuery.ajax({'url':'/yii/yiiTest/index.php/widget_CgridView/LogsData2/22?language=id','cache':false,'success':function(html){jQuery("#dialog div.dialogContent").html(html)}});return false;});
jQuery('body').on('click','#yt10',function(){jQuery.ajax({'type':'POST','url':$(this).attr('href'),'cache':false,'data':jQuery(this).parents("form").serialize(),'success':function(html){jQuery(".dialogContent").html(html)}});return false;});
jQuery('body').on('click','#yt11',function(){{
								url= $(this).attr("href");     //ini buat cari url dari link(buat update)   						
								add(url);   //add(url);
								// $("#dialog").dialog({"title":  url } );
								// $("#dialog").dialog("open");
								return false;
							};jQuery.ajax({'type':'POST','url':$(this).attr('href'),'data':$(this).serialize(),'dataType':'json','success':function(data) {
									if (data.status == 'failure'){
										$('#dialog div.dialogContent').html(data.content);
										$('#dialog div.dialogContent form').submit( add );
									}
									else{
										$('#dialog div.dialogContent').html(data.content);
										$.fn.yiiGridView.update('user-grid');	//refresh table
										setTimeout("$('#dialog').dialog('close') ",1000);
									}
								} ,'beforeSend':function() {  $(".dialogContent").html("loading.."); },'cache':false});return false;});
jQuery('body').on('click','#yt12',function(){{ $("#dialog").dialog("open"); } ;jQuery.ajax({'url':'/yii/yiiTest/index.php/widget_CgridView/LogsData2/23?language=id','cache':false,'success':function(html){jQuery("#dialog div.dialogContent").html(html)}});return false;});
jQuery('body').on('click','#yt13',function(){jQuery.ajax({'type':'POST','url':$(this).attr('href'),'cache':false,'data':jQuery(this).parents("form").serialize(),'success':function(html){jQuery(".dialogContent").html(html)}});return false;});
jQuery('body').on('click','#yt14',function(){{
								url= $(this).attr("href");     //ini buat cari url dari link(buat update)   						
								add(url);   //add(url);
								// $("#dialog").dialog({"title":  url } );
								// $("#dialog").dialog("open");
								return false;
							};jQuery.ajax({'type':'POST','url':$(this).attr('href'),'data':$(this).serialize(),'dataType':'json','success':function(data) {
									if (data.status == 'failure'){
										$('#dialog div.dialogContent').html(data.content);
										$('#dialog div.dialogContent form').submit( add );
									}
									else{
										$('#dialog div.dialogContent').html(data.content);
										$.fn.yiiGridView.update('user-grid');	//refresh table
										setTimeout("$('#dialog').dialog('close') ",1000);
									}
								} ,'beforeSend':function() {  $(".dialogContent").html("loading.."); },'cache':false});return false;});

$('.fancy').fancybox({
	afterClose: function() {
		parent.location.reload(true);
	},
	'transitionIn'	:	'elastic',//none
	'transitionOut'	:	'elastic',
	'speedIn'		:	600, 
	'speedOut'		:	200, 
	'overlayShow'	:	false,
	'autoDimensions': false,
	'width'         : 250,
	'height'        : 300,//auto
});
$('.fancy2').fancybox({
	afterClose: function() {},
	'transitionIn'	:	'elastic',//none
	'transitionOut'	:	'elastic',
	'speedIn'		:	600, 
	'speedOut'		:	200, 
	'overlayShow'	:	false,
	'autoDimensions': false,
	'width'         : 250,
	'height'        : 300,//auto
});


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
	
	//Tooltip-script
	$('.tooltip').tooltip();
	
	//$( '#dialog-form' ).on( 'dialogclose', function( event, ui ) { alert('taaaatahhhh..hh..');  } );
	
	//FUNGSI UTK ( Zafferer jQuery plug-in )
	/*$('.tooltip_ajax').tooltip({
		delay: 0,
		showURL: false,
		bodyHandler: function() {
			var result = $('<span/>').html('<div>..</div>'); 	
		
			$.ajax({
				url: $(this).attr('href'),
				//url:'/yii/yiiTest/index.php/ajax/req1',
				//url:'http://localhost/yii/yiiTest/index.php/widget_CgridView/view?id=1',
				success: function(html){ result.html(html); }
			});
			return result; 
		}
	});   */
	
	$('.tooltip_ajax').tooltip({
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
    });;	//register di atas;
	$('#toggle').toggle( 
			function() {		alert( $('table.items').css('width') );  
				//alert('First handler for .toggle() called.');
				$('#toggle').attr('src', '../../images/previous2.gif')
				$('th.col_hide').addClass('col_hide_head2');
				$('.col_hide').show('fade'); 
				
			}, 
			function() {
				//alert('Second handler for .toggle() called.');
				$('#toggle').attr('src', '../../images/next2.gif')
				$('.col_hide').hide('fade'); 
			});; //register di atas;

    $('.change-pagesize').live('change', function() {
        $.fn.yiiGridView.update('user-grid',{ data:{ pageSize: $(this).val() }})
    });

	$('#viewSelected').click(function(){
		var id =$.fn.yiiGridView.getSelection('user-grid');    //alert ( id );    alert( parseInt(id) );
		if (id.length!==0) 
		{  
		$.ajax({         
            type: 'GET',
			//url: '/yii/yiiTest/index.php/widget_CgridView/viewSelected/1?language=id',
			url: '/yii/yiiTest/index.php/widget_CgridView/viewSelected',
				
            data: {id:id},
			//data: {id:1, x:2},
			//data:$(this).serialize(),
            //dataType:'json',
                
			//traditional:true,
				
			//success: function() { $.fn.yiiGridView.updateGrid('user-grid'); }  //ini cth update ke id:Gridview
			'success':function(html){ jQuery('#viewSelectCont').html(html); $('#viewSelectCont').addClass('scroll2'); }    //ok test pake render partial
        });
		} else { alert('no row selected'); }
		return false;
	});


	$('#viewSelected_D').click(function(){
		var id =$.fn.yiiGridView.getSelection('user-grid');    //alert ( id );    alert( parseInt(id) );
		
		$('#dialog').dialog({'title':'View Selected User' } );
		$('#dialog').dialog('open');
		
		$.ajax({         
            type: 'GET',
			//url: '/yii/yiiTest/index.php/widget_CgridView/viewSelected_D/1?language=id',
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
					setTimeout("$('#dialog').dialog('close') ",1000);
				}
			}
        });
		return false;
	});

    $('#delAll').click(function() {  //alert( $(".delete").attr("href") );
         var ids=$.fn.yiiGridView.getSelection('user-grid');    
		
        if (ids.length!==0) 
		{   																		alert("jumlah ada:"+ ids.length );  
            //$.ajax.({         -------- INI VIA AJAX(LOM COBA) --------
                // type: 'POST',
				//url: '/yii/yiiTest/index.php/widget_CgridView/delete/200?language=id',
                //data: {ids: id},
                //dataType: 'json',
                // success: function() {
                    // $.fn.yiiGridView.updateGrid('user-grid');
                // }
            //});
			
			for (x in ids) {								alert("foreach id" + ids[x] );		
				var url = '/yii/yiiTest/index.php/widget_CgridView/delete/';		//cth URL define di JS		
				
				var urls=url+ids[x];   alert('urls->' + urls);
				//var urls='/yii/yiiTest/index.php/widget_CgridView/delete/200?language=id'+ids[x];   	--- ini test pake /yii/yiiTest/index.php/widget_CgridView/delete/200?language=id yg di define sbelum JS;
				
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
jQuery('body').on('click','#yt19',function(){jQuery.ajax({'type':'POST','beforeSend':function() {  $("#export").addClass("loading"); },'complete':function() { $("#export").removeClass("loading"); },'url':'/yii/yiiTest/index.php/media/export?language=id','cache':false,'data':jQuery(this).parents("form").serialize()});return false;});

	$('#exp_btn').click(function(){			//alert($('#ftype').val());
		var type = $('#type').val();
		$.ajax({         
            type : 'POST',
			url : '/yii/yiiTest/index.php/media/export',
            data : {ftype:type},
           // dataType:'json',
			//traditional :true,
			beforeSend : function() { $("#export").addClass("loading"); },
			complete : function() { $("#export").removeClass("loading"); }
			//'success':function(html){ $('#export').html('test') }    
			
			// 'success' :function(data) {
				// if (data.status == 'failure'){
					// $('#dialog div.dialogContent').html(data.content);
					// //$('#dialog div.dialogContent form').submit(add);
				// }
				// else{
					// $('#dialog div.dialogContent').html(data.content);
					// setTimeout("$('#dialog').dialog('close') ",1000);
				// }
			// }
        });
		return false;
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
-->