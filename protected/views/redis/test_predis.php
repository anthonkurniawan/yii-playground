<?php 
$this->layout='column1';
$this->pageTitle=Yii::app()->name . ' - Predis'; 
$this->breadcrumbs=array('redis/predis',);
//$this->renderPartial('WYSIWYG/_menu');
?>

<style>
.ui-autocomplete-loading {
	background: white url('<?php echo Yii::app()->homeUrl; ?>/images/loading/wheel-load1.gif') right center no-repeat;
}
pre .json{
   padding: 10px 20px;
   margin: 20px; 
   color: aquamarine;
  }
.json-key {
   color: white;
}
.json-value {
   color: lightblue;
}
.json-string {
   color: lightgreen;
}
</style>

<h1>Predis</h1>
<?php  
//dump($client); 			
$cmd_list = array(
	'console'=>'console', 'set'=>'set', 'mset'=>'mset',
	'hash'=>'Hashes', 'hset'=>'hset/hmset', 'hget'=>'hget/hmget', 'hgetall'=>'hgetall/hvals',
	'lists'=>'Lists', 'lpush'=>'lpush', 'rpush'=>'rpush', 'lrange'=>'lrange',
	'sets'=>'Sets', 'sadd'=>'sadd', 'scard'=>'scard', 'smembers'=>'smembers', 
	'sorted_set'=>'Sorted Set', 'zadd'=>'zadd',  'zrange'=>'zrange',
	'keyss'=>'Keys', 'keys'=>'get keys(pattern)', 'del'=>'del', 'exists'=>'exists', 'type'=>'type', 'dump'=>'dump',
);
?>

 <div class="myBox">
	<?php echo CHtml::beginForm(); ?>
	<span class="badge badge-inverse" onclick="$(this).siblings().toggle();"> Create Keys </span>
	<label for="db_select">Select Datasase :  </label><?php echo CHtml::textField('db_select', $client['database'], array('id'=>'db_select', 'size'=>5)); ?> 
	<span style="margin-left:10px"> <b>Host :</b> <?=$client['host']; ?></span>  <span style="margin-left:10px"> <b>Port :</b> <?=$client['port']; ?></span> <br>
	
	<div class="left">
	<label for="command">Command :  </label>
	<?php echo CHtml::dropDownList('command', 'con', $cmd_list, 
		array(
			'id'=>'command', 'onchange'=>'load();',
			'options'=>array('hash'=>array('disabled'=>true), 'keyss'=>array('disabled'=>true), 'lists'=>array('disabled'=>true), 'sets'=>array('disabled'=>true), 'sorted_set'=>array('disabled'=>true),)
		)
	); ?> 
	</div>
	<div id="summary_create" class="view2 left" style="background-color:blue; font-weight:bold; color:white; width:auto; padding:3px; margin:5px 0; display:none"></div>
	<div class="clear"></div>
	
	<!--------- CONSOLE --------->
	<div class="console left">
		<b>Type Command to redis : </b><?php echo CHtml::textField('console', null, array('size'=>100, 'placeholder'=>'type command here', 'class'=>'value')); ?>
	</div>
	
	<!--------- STRING --------->
	<div class="set no_dis">
	<?php echo CHtml::textField('redis[key]', null, array('placeholder'=>'Key name', 'class'=>'key')); ?>
	<?php echo CHtml::textField('redis[value]', null, array('placeholder'=>'Value of key', 'class'=>'value')); ?>	
	<b>XX/NX : </b><?php echo CHtml::dropDownList('redis[nx_xx]', 'XX', array('XX'=>'XX', 'NX'=>'NX'), array('id'=>'nx_xx', 'class'=>'xx')); ?> (not exist/exists)
	<b style='margin-left:10px'>TTL/PTTL : </b><?php echo CHtml::checkBox('set_ttl', false, array('id'=>'set_ttl', 'class'=>'ex px')); ?>
	<?php echo CHtml::dropDownList('redis[ttl]', null, array('EX'=>'EX', 'PX'=>'PX'), array('id'=>'ex_px', 'onchange'=>'setTtl( $(this).val() );')); ?> 
	<?php echo CHtml::textField('redis[ex_px_ttl]', null, array('size'=>10, 'id'=>'ex_px_ttl', 'class'=>'no_dis')); ?>
	</div>
	
	<div class="mset no_dis" id="mset-con">
	<input name='redis[key]' type='text' placeholder='Key' class="key"/> 
	<input name='redis[value]' type='text' placeholder='Value' class="value"/>
	<button onClick='addNew("mset"); return false' class="value">add</button>
	</div>

	<!--------- HASH --------->
	<div class="hset hmset no_dis" id="hmset-con">
	<?php echo CHtml::textField('hset[key]', null, array('size'=>10,'placeholder'=>'Key', 'class'=>'key')); ?>  
	<b class="key">Use PK : </b> <?php echo CHtml::checkBox('hset[pk]', true, array('class'=>'key')); ?> 
	(auto insert | like table name+pk, so formated will be <code class="key">"key:pk"</code> )<br class="key">
	<?php echo CHtml::textField('hset[field]', null, array('placeholder'=>'Field', 'class'=>'field')); ?>
	<?php echo CHtml::textField('hset[value]', null, array('placeholder'=>'Value', 'class'=>'value')); ?>
	<button onClick='addNew("hmset"); return false' class="value">add new set</button><br>
	</div>

	<div class="hget hmget no_dis" id="hget-con">
	<?php echo CHtml::textField('hget[key]', null, array('size'=>30,'placeholder'=>'Key', 'class'=>'key')); ?> <br class="key">
	<?php echo CHtml::textField('hget[field]', null, array('placeholder'=>'Field', 'class'=>'field')); ?>
	<button onClick='addNew("hget"); return false' class="field">add field</button>
	</div>
	
	<div class="hgetall hvals no_dis" id="hget-con">
	<?php echo CHtml::textField('hget[key]', null, array('size'=>30, 'placeholder'=>'Key', 'class'=>'key')); ?> 
	<b class="key"> Value Only: </b> <?php echo CHtml::checkBox('hvals', false,  array('class'=>'key')); ?> (HVALS)
	</div>
	
	<!----------LISTS--------> 
	<div class="lpush rpush lrange no_dis" id="lists-con">
		<?php echo CHtml::textField('lists[key]', null, array('size'=>30, 'placeholder'=>'Key', 'class'=>'key')); ?> <br class="value">
		<?php echo CHtml::textField('lists[val]', null, array('size'=>30, 'placeholder'=>'Value', 'class'=>'value')); ?> 
		<button onClick='addNew("lists"); return false' class="value">add</button> <br class="value">
	
		<?php echo CHtml::textField('lists[start]', null, array('size'=>2, 'placeholder'=>'Start', 'class'=>'start')); ?> 
		<?php echo CHtml::textField('lists[stop]', null, array('size'=>2, 'placeholder'=>'Stop', 'class'=>'stop')); ?> 
		<br><i class="stop">* -1 last index, -2 is the penultimate element of the list</i>
	</div>
	
	<!----------SETS-------->
	<div class="sadd scard smembers no_dis" id="sets-con">
		<?php echo CHtml::textField('sets[key]', null, array('size'=>30, 'placeholder'=>'Key', 'class'=>'key')); ?> <br class="key">
		<?php echo CHtml::textField('sets[val]', null, array('size'=>30, 'placeholder'=>'Member', 'class'=>'member')); ?> 
		<button onClick='addNew("sets"); return false' class="member">add</button>
	</div>
	
	<!----------SORTED SETS-------->
	<div class="zadd zrange no_dis" id="sorted_set-con">
		<?php echo CHtml::textField('sets[key]', null, array( 'placeholder'=>'Key', 'size'=>30,  'class'=>'key')); ?> <br class="key">
		<?php echo CHtml::textField('sets[score]', null, array( 'placeholder'=>'Score', 'size'=>20, 'class'=>'score')); ?> 
		<?php echo CHtml::textField('sets[member]', null, array( 'placeholder'=>'Member', 'size'=>30, 'class'=>'member')); ?> 
		<button onClick="addNew('sorted_set'); return false" class="member">add</button>
		
		<?php echo CHtml::textField('sets[start]', null, array('size'=>2, 'placeholder'=>'Start', 'class'=>'start')); ?> 
		<?php echo CHtml::textField('sets[stop]', null, array('size'=>2, 'placeholder'=>'Stop', 'class'=>'stop', 'style'=>'margin-right:10px')); ?> 
		<?php echo CHtml::checkBox('sets[WITHSCORES]', false,  array('class'=>'WITHSCORES', 'onchange'=>'withscores($(this));')); ?> <b class="WITHSCORES"> [WITHSCORES]: </b> 
	</div>
	<!----------KEYS-------->
	<div class="keys exists del type dump no_dis" id="keys-con">
		<?php echo CHtml::textField('sets[key]', null, array('size'=>20, 'placeholder'=>'Key', 'class'=>'key')); ?> 
		<?php echo CHtml::textField('sets[pattern]', null, array('size'=>20, 'placeholder'=>'Pattern', 'class'=>'pattern')); ?> 
		
		<button onClick="addNew('keys'); return false" class="key">add</button>
	</div>
	
	<?php echo Chtml::button('Submit', array('id'=>'submit', 'class'=>'btn btn-xs btn-primary left', 'onClick'=>'send(); return false;')); ?> 
	<?php echo CHtml::endForm(); ?>
	<div class="clear"></div>
	Count : <span id="index">1</span>
	<i class="right">Patern Available : ? * [ae] match aphabet  </i>
 </div>
 
 <div id="result" class="cmd_line no_dis"></div>
 
 <!---------------------------------------------- EXISTING KEYS ON REDIS -------------------------------------------------->
 <?php echo Chtml::button('Show all keys', array('onClick'=>'fetch("sets");', 'class'=>'')); ?> <br>
 
<div class="myBox">
	<div id="command-con" class="no_dis">
		<b class="badge badge-inverse">Alter Key</b> 
	
		<div class="btn btn-group btn-group-xs" id="btn-command-con"></div> <div class="clear"></div>

		<pre id="key_detail" style="background-color:purple; border:1px solid black; font-size:14px"></pre>
	
		<div class="left"> <input type="text" id="key"/> </div>
		<div id="param" class="left"></div>
		<div id="summary" class="view2 right" style="background-color:blue; font-weight:bold; color:white; width:auto; padding:3px; margin:5px 0; display:none"></div>
	
		<input type="hidden" id="alter_cmd"/>
	</div>

	<input type="text" id="input_list" class="no_dis"/>
	<div id="table_keys"></id>
 </div>
 
 <script>
$(function() {		
	load();
	
	$("#set_ttl").change(function(){
		if( $(this).is(':checked') ){
			$("#ex_px").attr('disabled', false);
			setTtl('EX');
		}
		else {
			$("#ex_px").attr('disabled', true);
			$("#ex_px_ttl").hide(100).attr('disabled', true);
		}
	});

});

if (!library)
   var library = {};

library.json = {
   replacer: function(match, pIndent, pKey, pVal, pEnd) {
      var key = '<span class=json-key>';
      var val = '<span class=json-value>';
      var str = '<span class=json-string>';
      var r = pIndent || '';
      if (pKey)
         r = r + key + pKey.replace(/[": ]/g, '') + '</span>: ';
      if (pVal)
         r = r + (pVal[0] == '"' ? str : val) + pVal + '</span>';
      return r + (pEnd || '');
      },
   prettyPrint: function(obj) {
      var jsonLine = /^( *)("[\w]+": )?("[^"]*"|[\w.+-]*)?([,[{])?$/mg;
      return JSON.stringify(obj, null, 3)
         .replace(/&/g, '&amp;').replace(/\\"/g, '&quot;')
         .replace(/</g, '&lt;').replace(/>/g, '&gt;')
         .replace(jsonLine, library.json.replacer);
      }
};

function load(){		//alert( $(this).val() );		
	var commands = {console:'console', set:'string', mset:'string', hset:'hash', hget:'hash', hgetall:'hash', lpush:'list', rpush:'list',lrange:'list', 
								sadd:'set',scard:'set',smembers:'set', zadd:'zset', zrange:'zset', keys:'generic', del:'generic', exists:'generic', type:'generic', dump:'generic'}		
	var $val = $("#command").val();			console.log('val :', $val); 
	var group = commands[$val];	 console.log('group : ', group);
	var cmd_detail = getCommand_list( group, $val.toUpperCase() ); 	console.log( 'cmd detail : ', cmd_detail );
		
	$.each(commands, function(cmd, group){		//alert(cmd);
		$("."+cmd).hide().children().hide(100).attr('disabled', true).val(''); 	 // disable set input
	});
		
	var kelas =[];
	$.each(cmd_detail, function(key, val){ kelas.push( '.'+key) } );   
	kelas = kelas.toString();		 console.log( typeof kelas, kelas);
		
	$("."+$val).show(100).children(kelas).show(100).attr('disabled', false);  
	$("#summary_create").show(100).text( cmd_detail.summary);
}
	
function setTtl(el){			//alert( typeof el + el);
	var placeholder = (el=='EX') ?  'in seconds' : 'in milliseconds';
	$("#ex_px_ttl").show(100).attr({'disabled':false, 'placeholder': placeholder});
}

function withscores(el){			//alert( typeof el + el);
	if( el.is(':checked') )
		el.val('WITHSCORES');
}

function addNew(el){ 				//alert(el); 
	var id = parseInt($("#index").text()) + 1;  //alert(id);
	if(el=='mset')
		con = "<br><input name='redis[key"+id+"]' type='text' placeholder='key' class='key'/> <input name='redis[val"+id+"]' type='text' placeholder='value' class='value'/>";
	else if(el=='hmset')
		 con = "<br> <input name='hset[field"+id+"]' type='text' placeholder='field' class='field'/> <input name='hset[val"+id+"]' type='text' placeholder='value' class='value'/>";
	else if(el=='hget')
		 con = "<br><input name='hget[field"+id+"]' type='text' class='field' placeholder='field' style='margin-right:10px'/>";
	else if(el=='lists')
		 con = "<br> <input name='lists[val"+id+"]' type='text' class='value' placeholder='value' size=30 style='margin-right:10px'/>";
	else if(el=='sets')
		 con = "<br> <input name='sets[val"+id+"]' type='text' size=30 class='member' placeholder='member' style='margin-right:10px'/>";
	else if(el=='sorted_set')
		 con = "<br>  <input name='sets[score"+id+"]' type='text' size=20 class='score' placeholder='score'/> <input name='sets[member"+id+"]' type='text' size=30 class='member' placeholder='member'/>";
	else if(el=='keys')
		 con = "<br> <input name='sets[val"+id+"]' type='text' size=30 class='member' placeholder='key' style='margin-right:10px'/>";
		 
	$("#"+el+"-con").append(con);
	$("#index").text(id);
}

function addNew_alt(el){
	var id = parseInt($("#index").text()) + 1;  //alert(id);
	var input_rsv = $("#input_list");
	var input_set = input_rsv.val().split(',');		// get existing input set
	input_set.push(el+id);					//add new input set console.log( input_set);
	input_rsv.show(100).val( input_set);
	con = "<input type='text' id='"+el+id+"' placeholder="+el+" />";
		
	$("#addNew").before(con);
	$("#index").text(id);
}

function getTable(data){			//alert(data);
	var items = [];
		items.push('<table class="dataGrid"><tr><th>Key</th><th>TTL</th><th>PTTL</th><th>Type</th><th>Values</th><th>del</th></tr>');
		$.each( data, function(key, val) {
			items.push('<tr><td><a href="#" onClick="js: alter(\''+val.key+'\', \''+val.type+'\');">' + val.key + '</a></td><td>' + val.ttl + '</td><td>' + val.pttl + '</td>'+
			'<td>' + val.type + '</td><td>' + JSON.stringify(val.values) + '</td><td><a href="#" onClick="delKey(\''+val.key+'\');">del</a></td></tr>');
		});
		items.push('</table>');
		// items = items.replace(/,/g, '');
		return items.join("");  // join array to string || remove "comma ,"
}

function alter(key, type){		console.log(key, type);
	$("#command-con").show(100);
	$("#key").val(key);
	tmp = getCommandBtn(key, type);
	$("#btn-command-con").html(tmp);
	getKeyDetail( key);
}

function getCommandBtn(key, type){	//alert(type);
	btn_cmd = getCommand_list(type);		console.log(btn_cmd);
	var btn_set = [];
	$.each( btn_cmd, function(key, val) {  
		if(!val.isCreate)
			btn_set.push('<span class="btn btn-default" onClick="setCommand(\''+key+'\', \''+type+'\')">'+key+'</span>');
	});		
	return btn_set;
}

function setCommand(key, type){		alert('set cmmand : ' + key +'type :' +type);
	$("#alter_cmd").val(key);
	
	obj_cmd = getCommand_list(type);		//console.log(obj_cmd[cmd]);
	var add='';  // add button if param can multiple input
	var input_set = [];
	$.each( obj_cmd[key], function(key, val) {  
		if(key!='summary'){												//console.log(val);
			//if(key=='key') $("#key").attr('readonly', val);
			if(val=='array')  { add = "<button id=addNew onClick=addNew_alt('"+key+"'); style='margin-right:5px'>add "+key+"</button>"; }
			input_set.push(key);
		}
		else  $("#summary").show(100).html(val);    
	});			console.log(input_set);
	
	$("#input_list").val(input_set);
	
	var input_tpl =[];
	$.each( input_set, function(key, val) {
		if(val!='key') input_tpl.push('<input type="text" id="'+val+'" placeholder="'+val+'" />');
	});  
	input_tpl.push(add);
	input_tpl.push('<button class="btn btn-xs btn-primary" onClick="send(true);">Send</button>');
	
	$("#param").html(input_tpl);
}

function delKey(key){
	request('/yii/yiitest/redis/api?command=del', 'POST', {sets:key}, 'json');
}

function getKeyDetail(key){
	$.getJSON('getDataKeys?key='+key, function(data){ 	//console.log(data); 
		$('#key_detail').html( library.json.prettyPrint(data) );
	});
 }
 
function send(alter){
	if(alter){										
		var key = $("#key").val();
		data = {};
		var params = $("#input_list").val().split(',');  // ambil hiden set input di jaadika array
		$.each( params, function(key, val) { data[val] = $("#"+val).val()  });  console.log(data);  // ambil masing2 set input value
		url = '/yii/yiitest/redis/api?command='+$("#alter_cmd").val();;
		dataType = 'json';
	}
	else{	
		url = '/yii/yiitest/redis/send';
		data = $('form').serialize();		//console.log(data);
		dataType = 'html';
	}
	header = {}; 
	request(url, 'POST', data, dataType, header);
	
	getKeyDetail( key);
}

function request(url, method, data, dataType, header){	//alert('request->'+ url + method + header+data);
		var result = $('#result');
		$.ajax({
			type: (method) ? method : 'GET', //'GET',
			url: url,
			headers : header,
			async: true, //default 'true'
			//crossDomain: true,
			//data: JSON.stringify(data), /* data here - if any */
			data: data,
			//contentType : 'text/plain; charset=UTF-8', //(Type: String ,Pay attention to the dataType/contentType (default: 'application/x-www-form-urlencoded; charset=UTF-8')
			dataType: dataType, //'jsonp', // Pay attention to the dataType/contentType
			beforeSend: function(xhr) {
				result.hide();
				$('#loader').show();
			}, 
			success: function (data, status, xhr) { 
				result.show(100);					//console.log("RESULT", data);  console.log(status, xhr);
				if(dataType=='json') {		//replace(/"([^"]*)"/g, "''$1''");
					result.html( 
						//JSON.stringify(data.cmdline).replace(/"/g, '') +"<br>"+JSON.stringify(data.data)
						library.json.prettyPrint(data)
					).delay(5000).slideUp('fast', function () { $(this).remove(); }); 
					//result.html(data);
				}else 
					result.html( data).delay(5000).slideUp('fast', function () { $(this).remove(); }); 
				fetch();
				//$('.result').html( JSON.stringify(JSON.parse(data), null, 4) );   // 4 or '\t'
			},
			error: function (xhr, status, errorThrown) { 
				result.html('<pre>'+ xhr.responseText + '</pre>'); 
			},
			complete: function(xhr, status){	
				//alert('xx');
			}
		});
}
		
function getCommand_list(type, cmd){
	var command= {
		"console" : { "CONSOLE": {value:'', summary:"Type your command"} },
		"string" : { 
			"APPEND" : {key:true, value: true, summary : "Append a value to key"}, // element ID : readonly ATTR
			"BITCOUNT" : {key:true, start: false, end:false, summary : "Count set bits in a string"},
			"BITOP" : {key:true, operation:false, destkey:false, summary : "Perform bitwise operations between strings"},
			"BITPOS" : {key:true, bit:false,start:false, end:false, summary : "Find first bit set or clear in a string"},
			"DECR" : {key:true, summary : "Decrement the interger value of a key by one"},
			"DECRBY" : {key:true, decrement:false, summary : "Decrement the interger value of a key by the given number"},
			"GET" : {key:false, summary : "Get the value of a key"},
			"GETBIT" : {key:true, offset:false, summary : "Return the bit value at offset in the string value stored at key"},
			"GETRANGE" : {key:true, start:false, end:false, summary : "Get a substring of the string stored at a key"},
			"GETSET" : {key:true, value:false, summary : "Set the sstring value of a key and return its old value"},
			"INCR" : {key:true, summary : "Increment the interger value of a key by one"},
			"INCRBY" : {key:true, increment:false, summary : "Increment the interger value of a key by the given amount"},
			"INCRBYFLOAT" : {key:true, increment:false, summary : "Increment the float value of a key by the given amount"},
			"MGET" : {key:'array', summary : "Get the values of all the given keys"},
			"MSET" : {isCreate: true, key:'array', value:'array', summary : "Set multiple keys to multiple values"},
			"MSETNX" : {key:true, value:false, summary : "Set multiple keys to multiple values, only if none of the keys exists"},
			"PSETEX" : {key:true, milliseconds:false, value:false, summary : "Set the value and expiration in milliseconds of a key"},
			"SET" : {isCreate: true, key:true, value:false,ex:'', xx:'', summary : "Set the string value of a key"},
			"SETBIT" : {key:true, offset:false, value:false, summary : "Sets or clears the bit at offset in the string value stored at key"},
			"SETEX" : {key:true, seconds:false, value:false, summary : "Set the value and expiration of a key"},
			"SETNX" : {key:true, value:false, summary : "Set the value of a key, only if the key does not exist"},
			"SETRANGE" : {key:true, offset:false, value:false, summary : "Overwrite part of a sring at key starting at the specified offset"},
			"STRLEN" : {key:true, summary : "Get the lenght of the value stored in a key"},
		},
		"hash" : { 
			"HDEL" : {key:true, field:"array", summary : "Delete one or more hash fileds"},
			"HEXISTS" : {key:'', field:'', summary : "Determine if a hash field exists"},
			"HGET" : {key:'', field:'', summary : "Get the value of a hash field"},
			"HGETALL" : {key:'', summary : "Get all the fields and values in a hash"},
			"HINCRBY" : {key:'', field:'', increment:'', summary : " Increment the integer value of a hash field by the given number"},
			"HINCRBYFLOAT" : {key:'', field:'', increment:'', summary : "Increment the float value of a hash field by the given amount"},
			"HKEYS" : {key:'', summary : "Get all the fields in a hash"},
			"HLEN" : {key:'', summary : "Get the number of fields in a hash"},
			"HMGET" : {key:'',field:"array", summary : "Get the values of all the given hash fields"},
			"HMSET" : {isCreate: true, key:'',field:'', value:'',  summary : "Set multiple hash fields to multiple values [field value ...]"},
			"HSCAN" : {key:true, cursor:'',  "MATCH_pattern":'', "count":'', summary : "Incrementally iterate hash fields and associated values"},
			"HSET" : {isCreate: true, key:'', field:'', value:'', summary : "Set the string value of a hash field"},
			"HSETNX" : {key:'', field:'', value:'', summary : "Set the value of a hash field, only if the field does not exist"},
			"HVALS" : {key:'', summary : "Get all the values in a hash"},
		},
		"list" : { 
		  "BLPOP" : { key:'array', timeout:'', summary: "Remove and get the first element in a list, or block until one is available"},
		  "BRPOP" : { key:'array', timeout:'', summary: "Remove and get the last element in a list, or block until one is available"},
		  "BRPOPLPUSH" : { source:'', destination:'', timeout:'', summary: "Pop a value from a list, push it to another list and return it; or block until one is available"},
		  "LINDEX" : { key:'', index:'', summary: "Get an element from a list by its index"},
		  "LINSERT" : { key:'', BEFORE_or_AFTER:'',  pivot:'', value:'', summary:"Insert an element before or after another element in a list"},
		  "LLEN" : { key:'', summary:"Get the length of a list"},
		  "LPOP" : { key:'', summary:"Remove and get the first element in a list"},
		  "LPUSH" : {isCreate: true, key:'', value:'array', summary:"Prepend one or multiple values to a list"},
		  "LPUSHX" : { key:'', value:'', summary:"Prepend a value to a list, only if the list exists"},
		  "LRANGE" : { key:'', start:'', stop:'', summary:"Get a range of elements from a list"},
		  "LREM" : { key:'', count:'', value:'', summary:"Remove elements from a list"},
		  "LSET" : { key:'', index:'', value:'', summary:"Set the value of an element in a list by its index"},
		  "LTRIM" : { key:'', start:'', stop:'', summary:"Trim a list to the specified range"},
		  "RPOP" : { key:'', summary:"Remove and get the last element in a list"},
		  "RPOPLPUSH" : { source:'', destination:'', summary:"Remove the last element in a list, append it to another list and return it"},
		  "RPUSH" : {isCreate: true, key:'', value:'array', summary:"Append one or multiple values to a list"},
		  "RPUSHX" : { key:'', value:'', summary:"Append a value to a list, only if the list exists"},
		},
		"set" : { 
		  "SADD" : {isCreate: true, key:'',  member:'array', summary: "Add one or more members to a set"},
		  "SCARD" : { key:'', summary: "Get the number of members in a set"},
		  "SDIFF" : { key:'array', summary: "Subtract multiple sets"},
		  "SDIFFSTORE" : { destination:'',  key:'array', summary: "Subtract multiple sets and store the resulting set in a key"},
		  "SINTER" : { key:'array', summary: "Intersect multiple sets"},
		  "SINTERSTORE" : { destination:'',  key:'array', summary: "Intersect multiple sets and store the resulting set in a key"},
		  "SISMEMBER" : { key:'',  member:'', summary: "Determine if a given value is a member of a set"},
		  "SMEMBERS" : { key:'', summary: "Get all the members in a set"},
		  "SMOVE" : { source:'', destination:'',  member:'', summary: "Move a member from one set to another"},
		  "SPOP" : { key:'', summary: "Remove and return a random member from a set"},
		  "SRANDMEMBER" : { key:'',  count_optional:'', summary: "Get one or multiple random members from a set | count is optional"},
		  "SREM" : { key:'',  member:'array', summary: "Remove one or more members from a set"},
		  //"SSCAN" : { key:'',  cursor [MATCH pattern] [COUNT count], summary: "Incrementally iterate Set elements"},
		  "SUNION" : { key:'array', summary: "Add multiple sets"},
		  "SUNIONSTORE" : { destination:'',  key:'array', summary: "Add multiple sets and store the resulting set in a key"},
		},
		"zset" : { 
		  "ZADD" : {isCreate: true, key:'', score:'', member:'',  summary: "[score member ...], Add one or more members to a sorted set, or update its score if it already exists"},
		  "ZCARD" : { key:'', summary: "Get the number of members in a sorted set"},
		  "ZCOUNT" : { key:'',min:'',  max:'', summary: "Count the members in a sorted set with scores within the given values"},
		  "ZINCRBY" : { key:'', increment:'', member:'', summary: "Increment the score of a member in a sorted set"},
		// "ZINTERSTORE" : { destination:'', numkeys:'', key:'array', [WEIGHTS weight] [AGGREGATE SUM|MIN|MAX], summary: "Intersect multiple sorted sets and store the resulting sorted set in a new key"},
		  "ZLEXCOUNT" : { key:'', min:'',  max:'', summary: "Count the number of members in a sorted set between a given lexicographical range"},
		  "ZRANGE" : { key:'', start:'', stop:'', WITHSCORES:'', summary: "Return a range of members in a sorted set, by index"},
		  //"ZRANGEBYLEX" : { key:'', min:'',  max [LIMIT offset count], summary: "Return a range of members in a sorted set, by lexicographical range"},
		//  "ZRANGEBYSCORE" : { key:'', min:'',  max [WITHSCORES] [LIMIT offset count], summary: "Return a range of members in a sorted set, by score"},
		  "ZRANK" : { key:'', member:'', summary: "Determine the index of a member in a sorted set"},
		  "ZREM" : { key:'', member:'array', summary: "Remove one or more members from a sorted set"},
		  "ZREMRANGEBYLEX" : { key:'', min:'',  max:'', summary: "Remove all members in a sorted set between the given lexicographicalrange"},
		  "ZREMRANGEBYRANK" : { key:'', start:'', stop:'', summary: "Remove all members in a sorted set within the given indexes"},
		  "ZREMRANGEBYSCORE" : { key:'', min:'',  max:'', summary: "Remove all members in a sorted set within the given scores"},
		 // "ZREVRANGE" : { key:'', start:'', stop:'', [WITHSCORES], summary: "Return a range of members in a sorted set, by index, with scores ordered from high to low"},
		 // "ZREVRANGEBYSCORE" : { key:'', max min:'',  [WITHSCORES] [LIMIT offset count], summary: "Return a range of members in a sorted set, by score, with scores ordered from high to low"},
		  "ZREVRANK" : { key:'', member:'', summary: "Determine the index of a member in a sorted set, with scores orderedfrom high to low"},
		 // "ZSCAN" : { key:'', cursor [MATCH pattern] [COUNT count], summary: "Incrementally iterate sorted sets elements and associated scores"},
		  "ZSCORE" : { key:'', member:'', summary: "Get the score associated with the given member in a sorted set"},
		 // "ZUNIONSTORE" : { destination:'', numkeys:'', key:'array', [WEIGHTS weight] [AGGREGATE SUM|MIN|MAX], summary: "Add multiple sorted sets and store the resulting sorted set in a newkey"},
		},
		"generic" :{
		  "DEL" : { key:'array', summary: "Delete a key"},
		  "DUMP" : { key:'', summary: "Return a serialized version of the value stored at the specified key."},
		  "EXISTS" : { key:'', summary: "Determine if a key exists"},
		  "EXPIRE" : { key:'',  seconds:'', summary: "Set a key's time to live in seconds"},
		  "EXPIREAT" : { key:'',  timestamp:'', summary: "Set the expiration for a key as a UNIX timestamp"},
		  "KEYS" : { pattern:'', summary: "Find all keys matching the given pattern"},
		 // "MIGRATE" : { host:'', port:'', key:'',  destination-db timeout [COPY] [REPLACE], summary: "Atomically transfer a key from a Redis instance to another one."},
		  "MOVE" : { key:'',  db:'', summary: "Move a key to another database"},
		//  "OBJECT" : { subcommand [arguments [arguments ...]] summary: "Inspect the internals of Redis objects"},
		  "PERSIST" : { key:'',  summary: "Remove the expiration from a key"},
		  "PEXPIRE" : { key:'',  milliseconds:'', summary: "Set a key's time to live in milliseconds"},
		  "PEXPIREAT" : { key:'',  milliseconds_timestamp:'', summary: "Set the expiration for a key as a UNIX timestamp specified in milliseconds"},
		  "PTTL" : { key:'', summary: "Get the time to live for a key in milliseconds"},
		  "RANDOMKEY" : { summary: "Return a random key from the keyspace"},
		  "RENAME" : { key:'',  newkey:'', summary: "Rename a key"},
		  "RENAMENX" : { key:'',  newkey:'', summary: "Rename a key, only if the new key does not exist"},
		  "RESTORE" : { key:'',  ttl:'', serialized_value:'', summary: "Create a key using the provided serialized value, previously obtainedusing DUMP."},
		  //"SCAN" : { cursor [MATCH pattern] [COUNT count] summary: "Incrementally iterate the keys space"},
		  //"SORT" : { key:'',  [BY pattern] [LIMIT offset count] [GET pattern [GET pattern ...]] [ASC|DESC] [ALPHA] [STORE destination] summary: "Sort the elements in a list, set or sorted set"},
		  "TTL" : { key:'',  summary: "Get the time to live for a key"},
		  "TYPE" : { key:'',  summary: "Determine the type stored at key"},
		},
	}
									//	console.log(command[type]);
	if(cmd)
		return command[type][cmd];
	else return command[type];
}
</script>

<?php
$cs = Yii::app()->getClientScript();  
//$cs->registerScriptFile('jquery-ui.min.js');
 
$cs->registerScript('log', 'function log( message ) {
	$( "<div>" ).text( message ).prependTo( "#log" );
	$( "#log" ).scrollTop( 0 );
}'); 

$cs->registerScript('load_all_keys',
"function fetch(){ 	
	$.getJSON('getAllKeys', function(data){ 	//console.log(data); 
		$('#table_keys').html( getTable(data) );
	});
	
}"              
,CClientScript::POS_END   # Defaults to CClientScript::POS_READY.
);
?>

 <?php
/*
$single_server = array(
    'host'     => '192.168.1.2',
    'port'     => 6379,
    'database' => 15
);

$client = new Predis\Client($single_server);
dump($client);
*/

//$client =  Yii::app()->predis->client;

#OLNY SUPPORT "pipeline" on "multi" using from nikolas
// $response = $client->pipeline()->set('foo', 'bar')->get('foo')->execute(); dump($response);
// Executes a pipeline inside a given callable block:  
// $response = $client->pipeline(function ($pipe) {
    // for ($i = 0; $i < 10; $i++) {
        // $pipe->set("key:$i", str_pad($i, 4, '0', 0));
        // $pipe->get("key:$i");
    // }
// });	dump($response);
//$response = $client->pipeline()->set('foo', 'bar')->get('foo')->execute(); dump($response);

# Create NEW COMMAND
// $client->getProfile()->defineCommand('newcmd', 'MyPredis_newCmd');
// $newCmd = $client->newcmd();	dump($newCmd);

# Sript Command
// $client->getProfile()->defineCommand('test_script', 'MyPredis_scriptCmd');
// $res = $client->test_script('random_values1', mt_rand());  dump($res);

// dump( $client->select(1) );
// $set = $client->set('foo', 'bar');  echo $set;
?>

<?php
//dump(Yii::app()->predis);

// $info = $client->info();  dump($info);
// $dbSize = $client->dbSize(); dump($dbSize); 
// //$client->set('foo', 'bar');
// $response = $client->get('foo');   dump($response);
// $pipeline = $client->pipeline();	dump($pipeline);
?>

<div class="flash-error">
<b>Source : https://github.com/nrk/predis </b><br>
 * Predis is a flexible and feature-complete Redis client library for PHP >= 5.3. <br>
 * By default Predis does not require any additional C extension, but it can be optionally paired with phpiredis to lower the overhead of serializing and parsing the Redis protocol. <br>
 * Predis can be used with <b>HHVM >= 2.3.0</b>, but there are no guarantees you will not run into unexpected issues (especially when the JIT compiler is enabled via Eval.Jit = true) due to HHVM being still under heavy development, thus unstable and not yet 100% compatible with PHP.
<p> 
<b>Loading the library</b>
<?php Yii::app()->sc->setStart(__LINE__);  ?> <!--
// Prepend a base path if Predis is not available in your "include_path".
require 'Predis/Autoloader.php';
// or
Predis\Autoloader::register();

#Connecting
// Named array of connection parameters:
$client = new Predis\Client([
    'scheme' => 'tcp',
    'host'   => '10.0.0.1',
    'port'   => 6379,
]);

# multiple
$client = new Predis\Client(
array(
    array(
	   'host'     => '192.168.1.2',
       'port'     => 6379,
       'database' => 15,
       'alias'    => 'first',
    ),
    array(
       'host'     => '127.0.0.1',
       'port'     => 6380,
       'database' => 15,
       'alias'    => 'second',
    ),
));

// Same set of parameters, but using an URI string:
$client = new Predis\Client('tcp://10.0.0.1:6379');

#multiple
$client = new Predis\Client([
    'tcp://10.0.0.1?alias=first-node',
    ['host' => '10.0.0.2', 'alias' => 'second-node'],
]);

# With various options
$client = new \Predis\Client(
    $connection_parameters,
    ['profile' => '2.8', 'prefix' => 'sample:']
);
-->
<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  ?>
<?php Yii::app()->sc->renderSourceBox(); ?>
<b> on YII ge pake class wrapper <code>myRedis</code> look at Components dir </b>
</p> 
</div>




