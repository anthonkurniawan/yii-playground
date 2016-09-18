<b class="badge">XMLHttpReques & XML DOM Sample</b>
<a class="right" href="https://developer.mozilla.org/en-US/docs/Web/API/XMLHttpRequest" target="_blank">see Docs</a>
<br>
<a href="http://localhost/testing/data_func/XMLHttpRequest/form.html" target="_blank">Http Request with XMLHttpRequest</a> |
<a href="http://localhost/testing/DATA_FUNC/XML_DOM/DOM_PARSER_WRITE_XML_ON_JS.HTML" target="_blank">Dom Parser Basic</a> |
<a href="http://localhost/testing/DATA_FUNC/XML_DOM/LOAD_DOM_XML_BASIC.HTML" target="_blank">Load XML basic</a> | <a href="" target="_blank">X</a> <br>

<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?> 

<br><b>Response header : </b><br>
<div id="xml_response" class="box"> - GET HEADER RESPONSE - </div>   <!--- HEADER CONTENT --->

Source url :
<?php echo CHtml::textField('xml_url', "http://localhost/yii/yiitest/file_cache.txt", array('id'=>'xml_url', 'size'=>'50px')); ?>
<?php 
	echo Chtml::dropDownList('xml_source', 'txt', 
	array(
		'txt'=>'Text file', 
		'db'=>'Database',
		'xml'=>'Xml File'
	), 
	array(
		'id'=>'xml_source',
		'onchange'=>"getSource();",
		'prompt'=>'-source-',
	));
?>
<br>
<button type="button" class="btn" onClick="loadXMLDoc( document.getElementById('xml_url').value )">Fetch</button>

<br><br>
<div class="box">
	<b class="txtDisable">Result (responseText) : </b><br>
	<div id="xml_result_txt"></div>
</div>
<div class="box">
	<b class="txtDisable">Result (responseXML) : </b><br>
	<div id="xml_result_xml"></div>
</div>

<script>
// GET SELECTION OF SOURCE
function getSource(){		
var source = document.getElementById("xml_source").value;		
switch(source) {
	case "db":                    
		url = "http://localhost/testing/DATA_FUNC/DATABASE/mysql_con.php";
		break; 
	case "xml":                    
		url =  "http://localhost/yii/yiitest/sample.xml";
		break; 
	default :
		url = "http://localhost/yii/yiitest/file_cache.txt"
}
								
document.getElementById("xml_url").value = url;
//  loadXMLDoc();
}

// GET xml_result_txt
function loadXMLDoc(url){
	if(window.XMLHttpRequest){  // code for IE7+, Firefox, Chrome, Opera, Safari
  		xmlhttp=new XMLHttpRequest();  
 	}
	//  FOR IE
	else {
  		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");	// code for IE6, IE5
		// new XDomainRequest();	// To do the same in Internet Explorer 8, you’ll need to use the XDomainRequest object in the 
  	}
	
	xmlhttp.onreadystatechange=function() {
  		if(xmlhttp.readyState==4 && xmlhttp.status==200){
			document.getElementById("xml_response").innerHTML=xmlhttp.getAllResponseHeaders();
			document.getElementById("xml_result_txt").innerHTML=xmlhttp.responseText;	 //respon to server (other:responseXml)
			
			if(xmlhttp.getResponseHeader('Content-Type')=='application/xml'){	
				xmlDoc=xmlhttp.responseXML;    //respon to server (other:responseText)

				var txt = "nodeName : " + xmlDoc.documentElement.nodeName +"<br>"+
								"nodeType : " + xmlDoc.documentElement.nodeType +"<br>"+
								"attributes : " + xmlDoc.documentElement.attributes +"<br>";
      			txt = txt +"<table border=1><tr><th>Category</th> <th>Title</th> <th>author</th> </tr>";
				cat=xmlDoc.getElementsByTagName("book");
				x=xmlDoc.getElementsByTagName("title");		//alert(x)
	  			y=xmlDoc.getElementsByTagName("author");		//alert(x)
				
      			for (i=0; i<x.length; i++){
					txt = txt + "<tr>";
					txt = txt + "<td>"+ cat[i].attributes.getNamedItem("category").nodeValue + "</td>";
        			txt = txt + "<td>" + x[i].childNodes[0].nodeValue + "</td>";
					txt = txt + "<td>" + y[i].childNodes[0].nodeValue + "</td>";
					txt = txt + "<tr>";
        		}
				txt=txt +"</table>";
				
      			document.getElementById("xml_result_xml").innerHTML=txt;
			}
			alert("Last-Modified" + xmlhttp.getResponseHeader('Content-Type'));
    	}
 	}
  
	xmlhttp.open("GET", url, true);  //Asynchronous=true
	//xmlhttp.open("GET","gethint.asp?q="+str,true);  (OTHER)
	xmlhttp.send();
}
</script>
<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<hr>
<div class="tpanel btn">
	<span class="toggle"><?php echo Yii::t('ui','View Code'); ?></span>
	<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>
</div>

<hr>
<!----------------------------------------------- NOTE ---------------------------------------------------->
<div  class="view2">
<pre>
<b>Note:</b>
To send a request to a server, we use the open() and send() methods of the XMLHttpRequest object:
	xmlhttp.open("GET","xmlhttp_info.txt",true);
	xmlhttp.send();
    
<b>Method</b>
<b>open(method,url,async)</b>
Specifies the type of request, the URL, and if the request should be handled asynchronously or not.
method: the type of request: GET or POST
url: the location of the file on the server
async: true (asynchronous) or false (synchronous)

<b>send(string)</b> 	
Sends the request off to the server. string: Only used for POST requests

<b>GET or POST?</b>
GET is simpler and faster than POST, and can be used in most cases.

However, always use POST requests when:
    A cached file is not an option (update a file or database on the server)
    Sending a large amount of data to the server (POST has no size limitations)
    Sending user input (which can contain unknown characters), POST is more robust and secure than GET

<b>Asynchronous - True or False?</b>
Sending asynchronously requests is a huge improvement for web developers. 
Many of the tasks performed on the server are very time consuming.

By sending asynchronously, the JavaScript does not have to wait for the server response, but can instead:
    execute other scripts while waiting for server response
    deal with the response when the response ready

<i>When using async=true</i>, specify a function to execute when the response is ready in the <b><u>onreadystatechange</u></b> event:

-The onreadystatechange event is triggered every time the readyState changes.
-The readyState property holds the status of the XMLHttpRequest.
	<li><b>Property :</b>
	
    <u>onreadystatechange :</u>
	Stores a function (or the name of a function) to be called automatically each time the readyState property changes
	
    readyState Holds the <u>status</u> of the XMLHttpRequest. Changes from 0 to 4 :
	0: request not initialized
	1: server connection established
	2: request received
	3: processing request
	4: request finished and response is ready  <strong>( status-> 	200: "OK", 404: Page not found)</strong></li>
		
<i style="color:#F00">Remember that the JavaScript will NOT continue to execute, until the server response is ready.
 If the server is busy or slow, the application will hang or stop.</i>

<b>Note:</b> When you use async=false, do NOT write an onreadystatechange function - just put the code after the send() statement
<B>XMLHttpRequest Object Methods</B>
Method 	Description
<u>abort()</u> 	Cancels the current request
<u>getAllResponseHeaders()</u> 	Returns header information
<u>getResponseHeader()</u> 	Returns specific header information

<u>open(method,url,async,uname,pswd)</u> Specifies the type of request, the URL, if the request should be handled asynchronously or not, 
and other optional attributes of a request
	method: the type of request: GET or POST
	url: the location of the file on the server
	async: true (asynchronous) or false (synchronous)
    
<u>send(string)</u> send(string) Sends the request off to the server. string: Only used for POST requests
<u>setRequestHeader()</u> Adds a label/value pair to the header to be sent

<b style="color:#F00"> PENANGANAN ERROR </b>
xmlDoc.parseError.errorCode;
xmlDoc.parseError.reason;
xmlDoc.parseError.line;

/*** GET DATA METHOD
    x.nodeName - the name of x
    x.nodeValue - the value of x
    x.parentNode - the parent node of x
    x.childNodes - the child nodes of x
    x.attributes - the attributes nodes of x
**********************************/  alert(xmlDoc.getElementsByTagName("bookstore")[0].nodeName);

/*** MANIPULASI DATA METHOD
    x.getElementsByTagName(name) - get all elements with a specified tag name
    x.appendChild(node) - insert a child node to x
    x.removeChild(node) - remove a child node from x
**********************************/ 
</pre>
</div>