<style type="text/css">
	.container { width: 1100px }
	.span-19{ width:900px } 
	fieldset {border:1px solid gray; padding:3px;}
	.auth { display : none }
	.ui-tooltip {
		font-size: 12px;
		padding:0px;
		max-width: 1000px;
	}
  </style>

<b class="label label-success">sample Http request :</b>
<?php
echo CHtml::radioButtonList('http',1, array(1 => 'Test Data Request', 2 => 'REST-CLIENT Request'), 
	array(
		'id'=>'http',
		'separator' => '', 
		'labelOptions'=>array('style'=>'color: purple')	, //array, specifies the additional HTML attributes to be rendered for every label tag in the list.
		'container'=>'span', 	//string, specifies the radio buttons enclosing tag. Defaults to 'span'. If the value is an empty string, no enclosing tag will be generated
		// 'onChange'=>CHtml::ajax(array('type'=>'GET', 'url'=>array("testForm/ajax_test"), 'update'=>'#data')),
		'onChange'=>"
			reset();
			if($(this).val()=='1'){
				$('#url').val('http://localhost/yii/yiitest/ajax/Ajax_getUser');
				$('#selectWhat').show();
			}
			else{
				$('#url').val('http://localhost/blog.com/starship_rest/api/rest/6');
				$('#selectWhat').hide();
				$('#userId').hide();
			}
			",
		'style'=>'margin-left:20px;'
	)
);
?>

<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?> 

<div class="myBox">
  <?php echo CHtml::beginForm(); ?>
  <?php echo CHtml::label('url :', 'url'); ?>
  <?php echo CHtml::textField('url', 'http://localhost/yii/yiitest/ajax/Ajax_getUser', array('id' => 'url', 'size' => '100px')); ?>
	
  <?php
  echo Chtml::dropDownList('select', 'all', array('all' => 'All', 'single' => 'single'), array(
      'id' => 'selectWhat',
      'onchange' => "js: if( $(this).val() =='single' ) { $(userId).show();} else { $(userId).val('all'); $(userId).hide(); }",
      'prompt' => '- pk -',
	  //'disabled'=>'disabled'
  ));
  ?>
  <?php echo CHtml::textField('ID', null, array('id' => 'userId', 'placeholder' => '-select id-', 'style' => 'width:70px; display:none')); ?>
  <br>
  Method :
<?php
echo Chtml::dropDownList('method', 'GET', 
	array('POST' => 'POST', 'GET' => 'GET', 'PUT'=>'PUT', 'DELETE'=>'DELETE', 'OPTIONS'=>'OPTIONS', 'PATCH'=>'PATCH', 'COPY'=>'COPY', 'HEAD'=>'HEAD', 'LINK'=>'LINK', 'UNLINK'=>'UNLINK', 'PURGE'=>'PURGE'), 
	array(
		'id' => 'method',
		'onchange' => "fetch()",
		//'class'=>'change_view',   //call registered class (optional)
		//'prompt'=>'Select View',
		//'empty'=>'test',
		'options' => array(0 => array('disabled' => true, 'label' => 'value 1')),
		 'style'=>'width: 65px',
	));
?> &nbsp;

  Data Type :
  <?php
  echo Chtml::dropDownList('dataType', 'all', array('html' => 'html', 'json' => 'json', 'xml' => 'xml', 'jsonp' => 'jsonp', 'text' => 'text', 'script' => 'script', '*/*'=>'*/*'), array(
		'id' => 'dataType',
		'onchange' => "fetch()",
		'class'=>'tooltip',   //call registered class (optional)
		'title'=>'The type of data that you\'re expecting back from the server. If none is speci fied, jQuery will  try to infer it based on the <code>MIME</code> type of the response'
  ));
  ?> &nbsp;&nbsp;
  
  Async :  <?php echo CHtml::checkBox('async', true, array('id'=>'async', 'class'=>'tooltip', 'title'=>'By defaul t, al l  requests are sent asynchronously (i .e. this is set to  true  by default).<br> 
  If you need synchronous requests, set this option to  <code>false</code>.<br> <b>Cross-domain requests</b> and  <code>dataType : "jsonp"</code> requests do not support synchronous operation.<br>
  <b>Note that</b> synchronous requests may temporarily lock the browser, disabling any actions while the request is active.' )); ?><i class="txtDisable">(Remote Address:127.0.0.1:80)</i> &nbsp; &nbsp;
  Cache :  
  <?php echo CHtml::checkBox('cache', true, array('id'=>'cache', 'class'=>'tooltip', 'title'=>'If set to <code>false</code>, it will  force requested pages not to be cached by the browse.<br>
  <b>Note:</b>  Setting cache to false will  only work correctly with <code>HEAD and GET</code> requests. It works by appending <code>"_={timestamp}"</code> to the <code>GET</code> parameters.<br> The parameter is not needed for other types of requests,
except in <b>IE8</b> when a <code>POST</code> is made to a URL that has al ready been requested by a <code>GET</code>.')); ?>  &nbsp;
	
	<div class="view" style="padding-top:4px; padding-left:4px">
   <?php
	echo Chtml::dropDownList('domain', 'local', array('local' => 'local domain', 'crossD' => 'cross domain'), array(
      'id' => 'domain',
      'onchange' => "	//  items.replace(',', '');
					js: var url = $('#url').val();		
					if( $(this).val() =='local' ) 
						$('#url').val( url.replace('127.0.0.1', 'localhost') ); 
					else {
						$('#url').val( url.replace('localhost', '127.0.0.1') ); 
						$('#contentType').val('application/x-www-form-urlencoded; charset=UTF-8');
					}",
		'class'=>'tooltip', 
		'title'=>'<b>crossDomain</b> (default: <code>false</code> for same-domain, <code>true</code> for cross-domain requests)<br>
			If you wish to force a crossDomain request (such as JSONP) on the same domain, set the value of <code>crossDomain</code> to <code>true</code>.<br>
			This allows, for example, server-side redirection to another domain',
		'prompt' => '-Test domain-', 'style'=>'width: 115px',
	));
	?> 
    Credential : <?php echo CHtml::checkBox('cren', false, array('id'=>'cren', 'style'=>'margin-right: 15px')); ?>

	ContentType : 
	<?php echo CHtml::textField('contentType',  null, array('id' => 'contentType', 'placeholder' => '-Content Type-', 'size'=>'80px', 'class'=>'tooltip', 
	'title'=>'When sending data to the server, use this content type. Default is <code>"application/x-www-formurlencoded; charset=UTF-8"</code>,which is fine for most cases.<br>
	<br>If you explicitly pass in a <code>content-type</code> to <code>$.ajax()</code>, then it is always sent to the server (even if no data is sent).<br>
	The W3C <code>XMLHttpRequest</code> specification dictates that the charset is always <code>UTF-8;</code> specifying another charset will not force the browser to change the encodin')); ?> <br>
	Add Header : 
	<?php 
	echo CHtml::checkBox('addHeader', false, array(
	'id'=>'addHeader', 
	'onChange'=>'$("#headers").show(); 
		if( $(this).is(":checked")){ 
			//$("#headers").val("{\'X_REST_CORS\': \'Yes\'}"); 
			$(".auth").show();
		}
		else {
			$(".auth").hide();
			$("#headers").hide();  
			$("#headers").val(""); 
		}'
	)); 
	?>
  
  <?php echo CHtml::textField('headers', null, array('id' => 'headers', 'placeholder' => '{ key : value }', 'size'=>'85px', 'style' => 'display:none', 'class'=>'tooltip', 
  'title'=>'An object of additional  header key/value pai rs to send along with requests using the <code>XMLHttpRequest</code> transport.<br> 
  The header <code>X-requested-With: XMLHttpRequest</code>  is always added, but its default <code>XMLHttpRequest</code> value can be changed here.<br> Values in the headers setting can also be
overwritten from within the <code>beforeSend</code> function')); ?>
  <span class="badge badge-info cursor auth" onClick="$('#headers').val($('#headers').val() +'\'X_REST_CORS\': \'Yes\','); $('#method').val('OPTIONS');">Auth CORS</span>  
  <span class="badge badge-info cursor auth" onClick="$('#headers').val($('#headers').val() +'\'X_REST_USERNAME\' : \'admin\', \'X_REST_PASSWORD\' : \'admin\',');">Auth HTTP_X</span>  

  </div>
  
  <?php echo Chtml::button('Fetch', array('onClick' => 'fetch()', 'class'=>'btn btn-sm btn-primary left')); ?>  
  <div id="load" class="left loading box-load" style="display:none; margin-left: 10px; margin-top:5px">&nbsp;&nbsp;</div>

  <?php echo CHtml::endForm(); ?>

  <!------------- result --------------->
  <div class="clear"></div>
  
  <fieldset>
    <legend>Result</legend>
    <small class="label blue">Ajax setting : </small><br>
    <span id="ket" class="txtKet"></span> <br>
    <b class="label blue">Request Url: </b><br>
    <span id="req" class="txtKet"></span> <br>

    <b class="label blue">Response  </b> <br>
    <b class="txtHead2"> XHR :</b> <span id="xhr"></span> <br>
    <b class="txtHead2"> Data TYpe :</b><span id="result_type"></span> <br>
    <b class="txtHead2"> Data</b> <i class="disable">(ResponseText)</i><b> :</b> <br> <span id="result_data_txt"></span> <br>
    <b class="txtHead2"> Data </b><i class="disable">(ResponseXML)</i> <b>:</b> <br> <span id="result_data_xml"></span> 
  </fieldset>
</div>

<script>
	function reset(){
		$('#req').text('');
		$('#xhr').text('');
		$('#reult_type').text('');
		$('#result_data_txt').text('');		 
		$('#result_data_xml').text('');
	}
	
  function fetch() {	
	// JSON.parse(str);  -OR  eval("(function(){return " + str + ";})()")  # parse to json
	// JSON.stringify( obj )   -- json to string
	var data = ($('#http_0').is(':checked')) ?  {'id' : (!$('#userId').val()) ? 'all' : $('#userId').val(),  'tipe': $('#dataType').val()} : {}; 
	var ajax_setting = {  
		'url' : $('#url').val(),
		'data' : data, 
		'method' : $('#method').val(),
		'userID' : (!$('#userId').val()) ? 'all' : $('#userId').val(),
		'dataType' : $('#dataType').val(),
		'contentType' : $('#contentType').val(),
		'cren' : $('#cren').is(':checked'),		
		'async' : $('#async').is(':checked'),		
		'cache' : $('#cache').is(':checked'),		
		'headers' : eval("(function(){return {" + $('#headers').val() + "};})()"),
		'domain' : ($('#domain').val() == 'crossD') ? domain = true : domain = false,
		'userame' : 'admin',  // LOMM NGEPEK
		'password': 'admin',
	}
	var ket="";
	$.each(ajax_setting, function(key, val){  ket += ' <b>'+ key +' : </b> '+ val });	
	$('#ket').html(ket);

	 ajax( ajax_setting);
  }

  //function ajax(url, method, data, Dtype, Ctype, domain) {
	function ajax( set ) {
    $.ajax({
		// accepts (default: depends on DataType)
		type: set.method, // Note: Other HTTP request methods, such as PUT and DELETE, can also be used here, but they are not supported by all browsers.
		url: set.url, // (default: The current page)
		xhrFields: { withCredentials: set.cren }, // A n object of fieldName-fieldV alue pai rs to set on the native  X H R   ( XMLHttpRequest )  object. For
			//example, you can use i t to set withCredentials to  true  for cross-domain requests i f needed.
		// data: { id: set.userID,  tipe: set.dataType }, //Type: PlainObject or String ( If value is an Array, jQuery serializes multiple values with same key based on the value of the traditional setting)
		data: set.data,
		dataType: set.dataType, // #json, xml, html, text, script ( def : html - not to set ),  jsonp Pay attention to the dataType/contentType
		async: set.async, //default : 'true'
		crossDomain: set.domain, // (default: false for same-domain requests, true for cross-domain requests)
		cache: set.cache, // (default: true, false for dataType 'script' and 'jsonp'),
		contentType : set.contentType, //(Type: String ,Pay attention to the dataType/contentType (default: 'application/x-www-form-urlencoded; charset=UTF-8')
		// converters (default: {"* text": window.String, "text html": true, "text json": jQuery.parseJSON, "text xml": jQuery.parseXML}) -Type: PlainObject
		// username: set.username, // Type: String -A username to be used with XMLHttpRequest in response to an HTTP access authentication request.
		// password: set.password,
		// headers: {
			// 'X_REST_CORS': 'Yes',
			// //"x-proom-credentials": $.session.get("authheader"),
		// },
		headers : set.headers,   //eval("(function(){return " + $('#headers').val() + ";})()"),		//$('#headers').val(),
		beforeSend: function(xhr) {
			// xhr.setRequestHeader(  'X_REST_CORS', 'Yes');   // OR USING headers : { key : value }
			reset();
			$('#load').show();
		}, // Type: Function( jqXHR jqXHR, PlainObject settings )
      success: function(data, status, xhr) {	// Type: Function( PlainObject data, String textStatus, jqXHR jqXHR )
        // $.each( xhr, function(x,y){ alert("x :"+x +" y : "+y) });
        $('#result_data_txt').text(data + status);
        $('#result_type').text(typeof data);
       
	   if (xhr.getResponseHeader('Content-Type') == 'text/xml') {
          xmlDoc = xhr.responseXML;
          // alert(xmlDoc);
          var txt = "nodeName : " + xmlDoc.documentElement.nodeName + "<br>"+
					" jumlah :"+xmlDoc.documentElement.nodeName.length+"<br>" +
					"nodeType : " + xmlDoc.documentElement.nodeType + "<br>" +
					"attributes : " + xmlDoc.documentElement.attributes + "<br>";

			txt = txt +"<table border=1><tr><th>id</th> <th>username</th> <th>email</th> <th>role</th> </tr>";
				$(xmlDoc).find('userlist > user').each(function(x,y){
					txt = txt + "<tr>";
        			txt = txt + "<td>" + $(this).find('id').text() + "</td>";
					txt = txt + "<td>" + $(this).find('username').text() + "</td>";
					txt = txt + "<td>" + $(this).find('email').text() + "</td>";
					txt = txt + "<td>" + $(this).find('role').text() + "</td>";
					txt = txt + "<tr>";
				});
				txt=txt +"</table>";
				
          $('#result_data_xml').html(txt);
        }
      },
      error: function(xhr, status, errorThrown) {	//Type: Function( jqXHR jqXHR, String textStatus, String errorThrown )
        // $('#result_data_txt').text( xhr.readyState + xhr.setRequestHeader + xhr.getAllResponseHeaders + 
        // xhr.getResponseHeader + xhr.overrideMimeType + xhr.abort + xhr.state + xhr.always + xhr.then + xhr.promise + xhr.pipe +  xhr.done +
        // xhr.fail + xhr. progress + xhr.success + xhr.error + xhr.complete + xhr.statusCode + xhr.responseText + xhr.status + xhr.statusText);
        $('#result_data_txt').text(status + errorThrown);
        $('#result_type').text(typeof status);
      },
      complete: function(xhr) {	//Type: Function( jqXHR jqXHR, String textStatus )
		$('#load').hide();
        $('#req').text(this.url);
        var obj_res = [];
        $.each(xhr, function(x, y) {
          if ($.inArray(x, ['readyState', 'status', 'statusText']) !== -1)		//'responseText'
            obj_res.push(x + ": " + y);
        });
        $('#xhr').text(obj_res);
		$('#fetch_obj').html( fetch_obj(xhr, 'fetch_obj', ['getResponseHeader'], null) );
      },
      
      timeout: 10000, //Set a timeout (in mi l l iseconds) for the request.
      // traditional : Type: Boolean (Set this to true if you wish to use the traditional style of param serialization. )
      statusCode: {
        404: function() {
          alert("page not found");
        }
      },
    
    });
  }
</script>

<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE  ?>

<div class="tpanel btn">
  <span class="toggle"><?php echo Yii::t('ui', 'View Code'); ?></span>
<?php Yii::app()->sc->renderSourceBox();  #FINISH AND RENDER SOURCE  ?>
</div>

<div class="ket">
  "jsonp": Loads in a JSON block using JSONP. Adds an extra "?callback=?" to the end of your URL to specify the callback. <br>
  Disables caching by appending a query string parameter, "_=[TIMESTAMP]", to the URL unless the cache option is set to true.
</div>

<!--------- fetch result object -------->
<div id="fetch_obj"></div>

<div class="view2">
	<span class="badge">Cross Preflighted requests - https://developer.mozilla.org/en-US/docs/Web/HTTP/Access_control_CORS</span>
	<ul>
	<li>Jika methods other than <code>GET, HEAD or POST</code></li>
	Also, if <code>POST</code> is used to send request data with a <code>Content-Type</code> other than 
	<code>application/x-www-form-urlencoded, multipart/form-data, or text/plain</code>, <b>Contoh : </b>
	if the POST request sends an XML payload to the server using <code>application/xml</code> or <code>text/xml</code>, then the request is <code>preflighted</code>.
	<li>It sets <b>custom headers</b> in the request (e.g. the request uses a header such as <code>X-PINGOTHER</code>)</li>
	<li>OPTIONS is an HTTP/1.1 method that is used to determine further information from servers, and is an idempotent method, meaning that it can't be used to change the resource.</li>
	<li>Access-Control-Max-Age gives the value in seconds for how long the response to the preflight request can be cached for without sending another preflight request.</li>
	</ul>
	Sample if using WithCredential :
	<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>  <!--
	if (origin != null) {
		resp.setHeader("Access-Control-Allow-Origin", origin);
	} else {
	resp.setHeader("Access-Control-Allow-Origin", "*");
	}
	--><?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE  ?>
	<?php Yii::app()->sc->renderSourceBox();  #FINISH AND RENDER SOURCE  ?>
</ul>
</div>