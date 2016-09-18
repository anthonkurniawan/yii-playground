
<?php
$this->breadcrumbs=array('script_test',);
?>

<a href="http://localhost/yiidoc/CJSON.html" target="_blank"> Docs</a><br>

<div class="view2">
<h2>Comparison of <code>CJavaScript::encode</code>, <code>CJavaScript::jsonEncode</code>, <code>CJSON::encode</code></h2>

<div class="left">
<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>

<?php
$options=array('key1'=>true,'key2'=>123,'key3'=>'value');
echo CJavaScript::encode($options)."<br>";
echo CJavaScript::jsonEncode( $options)."<br>";
echo CJSON::encode( $options)."<br>";
?>
</div>

<?php Yii::app()->sc->collect('html', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__)); ?>
<div class="left">
<?php Yii::app()->sc->renderSourceBox(); ?>
</div>
</div>


<h1>CJavaScript  <small>( CJavaScript is a helper class containing JavaScript-related handling functions ) </small></h1>

<div class="view2">
	<span class="badge">encode()</span> Encodes a PHP variable into javascript representation. <br>
	<code>public static string encode(mixed $value, boolean $safe=false)</code>

	<?php $this->beginWidget('CTextHighlighter',array('language'=>'php'));  ?> 
	$options=array('key1'=>true,'key2'=>123,'key3'=>'value');
	echo CJavaScript::encode($options);
	// The following javascript code would be generated:
	// {'key1':true,'key2':123,'key3':'value'}
	<?php $this->endWidget(); ?>  
	Cth :
	<b class="txtKet">CJavaScript::encode( array('key1'=>true,'key2'=>123,'key3'=>'value') ); </b><br>
	Result :
	<?php
	$options=array('key1'=>true,'key2'=>123,'key3'=>'value');
	dump( CJavaScript::encode( array('key1'=>true,'key2'=>123,'key3'=>'value') ) );
	?><br><br>

	<span class="txtAtt"> 
	For highly complex data structures use jsonEncode and jsonDecode to serialize and unserialize.<br>
	If you are encoding user input, make sure $safe is set to true.</span>
</div>

<div class="view2">
	<span class="badge">jsonDecode()</span> Decodes a JSON string. 
	<code>public static string jsonEncode(mixed $data)</code><br><br>
	
	<div class="left">
	Cth :</br>
	<b class="txtKet">$json = '{"a":1,"b":2}';</b><br>
	<b class="txtKet">$json2 = '[ [1145923200000,66.17],[1146009600000,68.15]]';</b></br>
	<b class="txtKet">CJavaScript::jsonDecode( $json ); </b><br>
	Result :<br>
	<?php
	//$json="{'key1':true,'key2':123,'key3':'value'}";
	$json = '{"a":1,"b":2,}';
	dump( CJavaScript::jsonDecode($json) );
	?><br>
	
	<i>Sama dengan :</i><br>
	<b class="txtKet">dump( json_decode($json, true));</b></br>
	<?php
	//$json="{'key1':true, 'key2':123, 'key3':'value'}";
	$json = '{"a":1,"b":2}';
	dump( json_decode($json) );
	?>
	</div>
	
	<div class="left"
	<b class="txtKet">dump( json_decode($json2, true));</b></br>
	<?php
	$json2 = '[ [1145923200000,66.17],[1146009600000,68.15]]';
	dump( json_decode($json2, true) );
	?>
	</div>
</div>

<div class="view2">
	<span class="badge">jsonEncode()</span> Returns the JSON representation of the PHP data.
	<code>public static string jsonEncode(mixed $data)</code><br><br>
	Cth :<br>
	<b class="txtKet">$arr =array('a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5) ;</b><br>
	<b class="txtKet">CJavaScript::jsonEncode("{'key1':true,'key2':123,'key3':'value'}");</b><br>
	Result :
	<?php
	$arr =array('a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5) ;
	dump( CJavaScript::jsonEncode( $arr ) );
	?><br>
	
	<br> <i>sama dengan <code>encode() </code> atau dengan <code>php function</code></i> :<br>
	<b class="txtKet">dump( json_encode($json, true));</b></br>
	Result : <?php dump( json_encode($arr, true)); ?>
	
</div>

<!------------------------------------------------------- CJSON ---------------------------------------------------------->
<a href="http://localhost/yiidoc/CJSON.html" target="_blank"> Docs</a><br>

<h1>CJSON <small>( CJSON converts PHP data to and from JSON format. ) </small></h1>

<div class="view2">
	<span class="badge">decode()</span>  	decodes a JSON string into appropriate variable
	<code>public static mixed decode(string $str, boolean $useArray=true)</code><br><br>
	Cth :
	<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP','tabSize'=>0));  ?>
	$arr={"status":"success","content":"New User successfully created"}
	echo CJSON::decode($arr);
	<?php $this->endWidget(); ?>
	
	Result :
	<p> 
	<?php
	$arr='{"status":"success","content":"New User successfully created"}';
	dump( CJSON::decode($arr) );
	?>
</div>

<div class="view2">
	<span class="badge">encode()</span>  Encodes an arbitrary variable into JSON format
	<code>public static string encode(mixed $var)</code><br><br>
	Cth :
	<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP','tabSize'=>0));  ?>
	$arr=array(
		'status' => 'success',
		'content' => 'New User successfully created',
	);
	echo CJSON::encode($arr);
	<?php $this->endWidget(); ?>
	Result :
	<p> 
	<?php
	$arr=array(
		'status' => 'success',
		'content' => 'New User successfully created',
	);
	echo CJSON::encode($arr);
?>
</div>

<div class="view2">
	<span class="badge">quote()</span> Quotes a javascript string.
	<code>public static string quote(string $js, boolean $forUrl=false)</code><br><br>
	Cth :<br>
	<b class="txtKet"> CJavaScript::quote( "{'key1':true,'key2':123,'key3':'value'}")</b><br>
	Result :
	<p> 
	<?php
	$var = "{'key1':true,'key2':123,'key3':'value'}";
	dump( CJavaScript::quote( $var ) );
	?>
</div>

