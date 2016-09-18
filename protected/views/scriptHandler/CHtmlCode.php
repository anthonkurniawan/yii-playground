
<?php 
	$html_en =  htmlspecialchars("<a href='test'>Test</a>"); 
	$html_de = CHtml::encode("&lt;a href=&#039;test&#039;&gt;Test&lt;/a&gt;"); 
?>

<div class="view2">
	<b class="badge">CHtml::encode</b> <code>encode(string $text)</code> - <b class="txtKet">return htmlspecialchars($text,ENT_QUOTES,Yii::app()->charset);</b><br>
	<code>echo CHtml::encode("<?=$html_en?>");</code>
	<?php echo CHtml::encode($html_en); ?>  --OR use shorcut <code>echo h("<?=$html_en?>")</code> <br><br>
	<code>echo Yii::app()->charset;</code>
	<?php echo Yii::app()->charset; ?> ( Capplication charset - default : UTF8 )<br>
	
	<b class="badge">htmlspecialchars</b>  — Convert special characters to HTML entities<br>
	<code>echo htmlspecialchars("<?=$html_en?>");</code>
	<?php echo htmlspecialchars($html_en); ?><br>
	
	<code>echo htmlspecialchars("<?=$html_en?>", ENT_QUOTES); </code>
	<?php echo htmlspecialchars($html_en, ENT_QUOTES); ?>

	<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP', 'tabSize'=>1));  ?> 
	The translations performed are: 
	'&' (ampersand) becomes '&amp;' 
	'"' (double quote) becomes '&quot;' when ENT_NOQUOTES is not set. 
	"'" (single quote) becomes '&#039;' only when ENT_QUOTES is set. 
	'<' (less than) becomes '&lt;' 
	'>' (greater than) becomes '&gt;' 
	
	ENT_COMPAT Will convert double-quotes and leave single-quotes alone.  ( DEFAULT )
	ENT_QUOTES Will convert both double and single quotes. 
	ENT_NOQUOTES Will leave both double and single quotes unconverted. 
	ENT_HTML401 Handle code as HTML 4.01.  
	ENT_XML1 Handle code as XML 1.  
	ENT_XHTML Handle code as XHTML.  
	ENT_HTML5 Handle code as HTML 5.  
	<?php $this->endWidget(); ?>	
</div>

<div class="view2">
	<b class="badge">CHtml::decode</b> <code>decode(string $text)</code> - <b class="txtKet">return htmlspecialchars_decode($text,ENT_QUOTES);</b><br>
	<code>echo CHtml::decode("<?=$html_de?>") </code>
	<?php echo CHtml::decode($html_de); ?> <br><br>
	
	<b class="badge">htmlspecialchars_decode</b> — Convert special HTML entities back to characters <br>
	<?php $html_this = CHtml::encode("<p>this -&gt; &quot; &quot;</p>\n"); ?>
	
	<code>echo htmlspecialchars_decode("<?=$html_this?>");</code> 
	<?php echo htmlspecialchars_decode($html_this);?>
</div>

<div class="view2">
	<b class="badge">CHtml::encodeArray</b> <code>encodeArray(array $data)</code> <br>
	 
	Encodes special characters in an array of strings into HTML entities. <br>
	<code> dump( CHtml::encodeArray( array(0=>"<?=$html_en?>", 1=>"<?=$html_en?>" ) ) );</code><br>
	<?php dump( CHtml::encodeArray( array(0=>"<a href='test'>Test</a>", 1=>"<a href='test'>Test</a>" ) ) ); ?> <br>
</div>


