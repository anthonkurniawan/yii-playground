<?php $this->layout='column1';?> 
<style>
.container {width:1100px; }
</style>

<?php $this->pageTitle=' Api System.Utils'; ?>

<?php echo CHtml::link('view in new tab', array('cek/utils', 'view'=>'utils'), array('class'=>'right', 'target'=>'_blank') ); ?> <br>

SAMPLE TO DIRECT LINK <a href="#CFileHelper">CFileHelper</a> <br>

<div class="view2">
<b class="badge"> on PHP function</b><br>
<pre>
//string money_format ( string $format , float $number ) 
setlocale(LC_MONETARY, 'en_US');
echo money_format('%i', '30000');
echo number_format(3000000.00);
</pre>
</div>

<div class="view2" id="CFormatter">		
	<b class="badge"> CFormatter </b><br>
	<a href="http://localhost/yiidoc/CFormatter.html" target="_blank" style="float:right"> CFormatter </a><br />
	commonly used data formatting methods based, which is registered by CApplication by default.to replace to local setting see <a href="#CLocalizedFormatter">CLocalizedFormatter</a><br>
	
	<div class="tpanel">
	<div class="toggle btn right"><?php echo Yii::t('ui','CFormatter  array'); ?></div>
		<div class="scroll2"><?php dump( Yii::app()->format); ?></div>
	</div>
	
	<b> Sample :</b><br>
	<code> Yii::app()->format->boolean(1); </code> : <?php echo Yii::app()->format->boolean(1); ?> <br>
	<code> Yii::app()->format->dateFormat;</code> : <?php	echo Yii::app()->format->dateFormat; ?> <br>
	<code> Yii::app()->format->date('2007-10-01');</code> : <?php echo Yii::app()->format->date('2007-10-01'); ?> <br>
	<code> Yii::app()->format->formatDate( date('d/m/Y') );</code> : <?php echo Yii::app()->format->formatDate( date('d/m/Y') ); ?> <br>

	<div class="tpanel">
	<div class="toggle btn right"><?php echo Yii::t('ui','See Options'); ?></div>
	<div>
	<br><b>Currently, the following types are recognizable:</b><br>
	<ul>
	<li>raw: the attribute value will not be changed at all.</li>
	<li>text: the attribute value will be HTML-encoded when rendering.</li>
	<li>ntext: the <a href="http://localhost/yiidoc/CFormatter.html#formatNtext" target="_blank">formatNtext</a> method will be called to format the attribute value as a HTML-encoded plain text with newlines converted as the HTML &lt;br /&gt; or &lt;p&gt;&lt;/p&gt; tags.</li>
	<li>html: the attribute value will be purified and then returned.</li>
	<li>date: the <a href="http://localhost/yiidoc/CFormatter.html#formatDate" target="_blank">formatDate</a> method will be called to format the attribute value as a date.</li>
	<li>time: the <a href="http://localhost/yiidoc/CFormatter.html#formatTime" target="_blank">formatTime</a> method will be called to format the attribute value as a time.</li>
	<li>datetime: the <a href="http://localhost/yiidoc/CFormatter.html#formatDatetime" target="_blank">formatDatetime</a> method will be called to format the attribute value as a date with time.</li>
	<li>boolean: the <a href="http://localhost/yiidoc/CFormatter.html#formatBoolean" target="_blank">formatBoolean</a> method will be called to format the attribute value as a boolean display.</li>
	<li>number: the <a href="http://localhost/yiidoc/CFormatter.html#formatNumber" target="_blank">formatNumber</a> method will be called to format the attribute value as a number display.</li>
	<li>email: the <a href="http://localhost/yiidoc/CFormatter.html#formatEmail" target="_blank">formatEmail</a> method will be called to format the attribute value as a mailto link.</li>
	<li>image: the <a href="http://localhost/yiidoc/CFormatter.html#formatImage" target="_blank">formatImage</a> method will be called to format the attribute value as an image tag where the attribute value is the image URL.</li>
	<li>url: the <a href="http://localhost/yiidoc/CFormatter.html#formatUrl" target="_blank">formatUrl</a> method will be called to format the attribute value as a hyperlink where the attribute value is the URL.</li>
	<li>size: the <a href="http://localhost/yiidoc/CFormatter.html#formatSize" target="_blank">formatSize</a> method will be called to format the attribute value, interpreted as a number of bytes, as a size in human readable form.</li>
	</ul>
	</div>
	</div>
</div>

<div class="view2" id="CLocalizedFormatter">
	<b class="badge"> CLocalizedFormatter </b><br>
	<a href="http://localhost/yiidoc/CLocalizedFormatter.html" target="_blank" style="float:right"> CLocalizedFormatter </a><br />
	provides a set of commonly used data formatting methods based on the current locale settings.<br>
	It provides the same functionality as <a href="#CFormatter">CFormatter</a>, but overrides all the settings for <code>booleanFormat</code>, <code>datetimeFormat</code> and <code>numberFormat</code> with the values for the current locale.
	<br>It uses <code>CApplication::locale</code> by default but you can set a custom locale by using <code>setLocale-method</code>.<br><br>
	
	To replace the application component 'format' (<code>CFormatter</code> which is registered by CApplication by default ) <b>set config main.php :</b> <br>
	<pre> <code>
	'components'=>array(
		#used data formatting methods based on the current locale settings. 
		'format' => array( 'class' => 'CLocalizedFormatter', ), 	</code>
	</pre>
	
	<div class="tpanel">
	<div class="toggle btn right"><?php echo Yii::t('ui','CLocale array'); ?></div>
		<div class="scroll2"><?php dump( Yii::app()->locale); ?></div>
	</div>
</div>

<div class="view2">
	<b class="badge">CDateTimeParser</b> <br>
	
	<div class="left" style="width:600px">
	<a href="http://localhost/yiidoc/CDateTimeParser.html" target="_blank" style="float:right">CDateTimeParser</a><br />
	CDateTimeParser converts a date/time string to a UNIX timestamp according to the specified pattern. <br>To format a timestamp to a date string, please use
	<a href="http://localhost/yiidoc/CDateFormatter.html" target="_blank">CDateFormatter</a> <br><br>
	
	<b> Sample :</b><br>
	<?php 
		$date = date('d-m-Y'); //echo $date;
		//echo strtotime('21/10/2008'), "\n";
	?>
	
	<code> $timestamp=CDateTimeParser::parse('21/10/2008','dd/MM/yyyy'); </code> ( Converts a date string to a timestamp. )<br>
	<?php echo CDateTimeParser::parse('01/08/2013','dd/MM/yyyy'); ?> <br><br>
	
	<code>$date = date('d-m-Y'); </code>  ( tidak termasuk time ) <br>
	<code>CDateTimeParser::parse($date,'dd-MM-yyyy');</code> ( patern "pemisah" harus sama "/", "-" )<br>
	<?php echo CDateTimeParser::parse($date,'dd-MM-yyyy'); ?> <br><br>
	
	<div class="tpanel">
	<div class="toggle btn"><?php echo Yii::t('ui','DateFormatter Class'); ?></div>
		<div class="scroll2"><?php dump( Yii::app()->getDateFormatter());  ?> </div>
	</div>
	
	</div>
	
	<div class="left" style="width:400px">
	<pre>
	Pattern |      Description
	----------------------------------------------------
	d       | Day of month 1 to 31, no padding
	dd      | Day of month 01 to 31, zero leading
	M       | Month digit 1 to 12, no padding
	MM      | Month digit 01 to 12, zero leading
	MMM     | Abbreviation representation of month 
	MMMM    | Full name representation 
	yy      | 2 year digit, e.g., 96, 05
	yyyy    | 4 year digit, e.g., 2005
	h       | Hour in 0 to 23, no padding
	hh      | Hour in 00 to 23, zero leading
	H       | Hour in 0 to 23, no padding
	HH      | Hour in 00 to 23, zero leading
	m       | Minutes in 0 to 59, no padding
	mm      | Minutes in 00 to 59, zero leading
	s       | Seconds in 0 to 59, no padding
	ss      | Seconds in 00 to 59, zero leading
	a       | AM or PM, case-insensitive 
	?       | matches any character (wildcard)
	----------------------------------------------------
	</pre>
	</div>
</div>

<div class="view2" id="CFileHelper">
	<b class="badge">CFileHelper</b> <br>
	<a href="http://localhost/yiidoc/CFileHelper.html" target="_blank" style="float:right">CFileHelper</a><br />
	
	<ul>
	<li><b>copyDirectory(string $src, string $dst, array $options=array ( )) </b></li>
	
	<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
	<?php /*
		$source = '/testing/file_func/temp'; //bisa juga dgn langsung alamat dir  $source = 'D:\WEB\HTDOCS\TESTING\COUNT';
		$dest = 'd:\web\test_copyDir';
	
		CFileHelper::copyDirectory($source, $dest, array( 
			'fileTypes'=>array('txt', 'jpg'),	#array, list of file name suffix (without dot). Only files with these suffixes will be copied.
			'exclude'=>array('bak', 'exe'),  #array, list of directory and file exclusions. Each exclusion can be either a name or a path.
			//'level'=> -1, # -1, means copying all directories and files under the directory, default: -1 
							   # 0 means copying only the files DIRECTLY under the directory; level N means copying those directories that are within N 
			//'newDirMode'=>0777,  # the permission to be set for newly copied directories (defaults to 0777);
			//'newFileMode' =>	#the permission to be set for newly copied files (defaults to the current environment setting).
		));
		*/
	?>
	<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
	<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>
	
	<li><b>findFiles(string $dir, array $options=array ( ))</b></li>
	Returns the files found under the specified directory and subdirectories.

	 <?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
	 <?php
		$dir = realpath(Yii::app()->basePath.'/../images'); //echo $dir; die();
		
		$find = CFileHelper::findFiles($dir, array( 
			'fileTypes'=>array('txt', 'jpg', 'zip', 'pdf'),	#array, list of file name suffix (without dot). Only files with these suffixes will be copied.
			'exclude'=>array('bak', 'exe'),  #array, list of directory and file exclusions. Each exclusion can be either a name or a path.
			'level'=> -1, # -1, means searching for all directories and files under the directory; , default: -1 
		) );		//print_r($find); die();
		
		echo "<b>RESULT : </b><br>"; dump($find);
	 ?>
	 <?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
	<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>
	
	<li><b>getExtension(string $path)</b></li>
	Returns the extension name of a file path. For example, the path "path/to/something.php" would return "php".<br>
	<code>$file = '/web/testing/file_func/temp/file.txt'; </code><br><br>
	<code>echo CFileHelper::getExtension($file); </code><br>
	
	 <?php  
		$file = realpath(Yii::app()->basePath.'/../js/jquery-1.8.3.js'); 
		echo "<b>RESULT : </b>". CFileHelper::getExtension($file); 
	 ?>
	 
	 
	 <li><b>getMimeType(string $file, string $magicFile=NULL, boolean $checkExtension=true)</b></li>
	 <code>$mime = CFileHelper::getMimeType($file);</code><br>
	 <?php
		$mime = CFileHelper::getMimeType($file);
		echo "<b>RESULT : </b>". $mime;
	 ?>
	 
</div>

<div class="view2">
	<b class="badge"> CMarkdown & CMarkdownParser </b><br>
	<a href="http://localhost/yiidoc/CMarkdownParser.html" target="_blank" style="float:right"> CMarkdownParser </a><br />

	CMarkdownParser is a wrapper of <a href="http://michelf.com/projects/php-markdown/extra/">MarkdownExtra_Parser</a><br/><br/>
	CMarkdownParser extends MarkdownExtra_Parser by using Text_Highlighter to highlight code blocks with specific language syntax.
	<b>In particular, if a code block starts with the following :</b> 
	<code>[language]</code> The syntax for the specified language will be used to highlight
	code block. The languages supported include (case-insensitive):
	ABAP, CPP, CSS, DIFF, DTD, HTML, JAVA, JAVASCRIPT, MYSQL, PERL, PHP, PYTHON, RUBY, SQL, XML <br/><br/>
	You can also specify options to be passed to the syntax highlighter. For example:
	<code>[php showLineNumbers=1]</code> which will show line numbers in each line of the code block. <br/><br/>
	For details about the standard markdown syntax, please check the following:
	<a href="http://daringfireball.net/projects/markdown/syntax">official markdown syntax</a> |
	<a href="http://michelf.com/projects/php-markdown/extra/">markdown extra syntax</a> <br><br>

	You can use this class as typical widget: <code>$this->beginWidget('CMarkdown'); </code><br><br>
	
<div class="left">
<b class="badge"> CMarkdown sample</b><br>

<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
<?php	$this->beginWidget('CMarkdown', array('purifyOutput'=>false)); ?>
<b>test tag html</b>
~~~
[php]
$echo $var . "this is php code";
~~~
<?php $this->endWidget(); ?>
<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>
<hr>

<b>or directly:</b><br>
<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
<?php
$text = '~~~
[php]
$echo $var . "this is php code sample2";
~~~';
$md = new CMarkdown;
echo $md->transform($text);
?>
<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>

</div>

<div class="left view">
<b class="badge">CMarkdownParser usage examples</b><br>
<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
<?php
$parser = new CMarkdownParser;
$contents = $parser->safeTransform($text);
echo $contents;
?>
<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>

<b class="badge">Sample in "blog"</b> ( hasil dari content di filter dengan panjang char 200)
 <?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP', 'tabSize'=>1));  ?> 
	$this->beginWidget('CMarkdown', array('purifyOutput'=>true)); 

	if(isset($full_view)) { 
					echo $data->content;
				}
				else {
					$content = substr($data->content, 1, 200); 	//echo $content. "<br>";
					$match = strpos($content, '~~~'); 		//echo "bol--->".$match;
					if($match) $content=$content . "\n~~~ \n<i>read more for continue..</i>"; 
					echo $content;
				}

 $this->endWidget();
<?php $this->endWidget(); ?>
</div>		

</div>

<div class="view2">
	<b class="badge">CHtmlPurifier</b><br>
	<a href="http://localhost/yiidoc/CHtmlPurifier.html" target="_blank" style="float:right">CHtmlPurifier</a><br />
	
	CHtmlPurifier is wrapper of <a href="http://htmlpurifier.org">HTML Purifier</a>.<br/>
	CHtmlPurifier removes all malicious code (better known as XSS) with a thoroughly audited, secure yet permissive whitelist. 
	It will also make sure the resulting code is standard-compliant. <br/>
	CHtmlPurifier can be used as either a widget or a controller filter.<br/>
	Note: since HTML Purifier is a big package, its performance is not very good. 
	You should consider either caching the purification result or purifying the user input before saving to database. <br/><br/>
	
	Sample Usage as a class:<br>
	<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
	<?php
	$text ="admin or 1=1 <script>alert(this)</script>";
	$p = new CHtmlPurifier();
	$p->options = array('URI.AllowedSchemes'=>array(
		'http' => true,
		'https' => true,
	));
	$result = $p->purify($text);
	echo $result;
	?>
	<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
	<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>

	Usage as validation rule:
	<code>array('text','filter','filter'=&gt;array($obj=new CHtmlPurifier(),'purify')), </code>
	
</div>

<div class="view2">
	<b class="badge">CPasswordHelper</b><br>
	<a href="http://localhost/yiidoc/CPasswordHelper.html" target="_blank" style="float:right">CPasswordHelper</a><br />
	CPasswordHelper provides a simple API for secure password hashing and verification. <br>
	CPasswordHelper uses the Blowfish hash algorithm available in many PHP runtime environments through the PHP crypt() built-in function.<br>
	
	For more information about password hashing, crypt() and Blowfish, please read the Yii Wiki article
	<a href="http://www.yiiframework.com/wiki/425/use-crypt-for-password-storage/">Use crypt() for password storage</a>. and the
	PHP RFC <a href="http://wiki.php.net/rfc/password_hash">Adding simple password hashing API</a>.

	<div class="left">
	<b> Sample :</b><br>
	<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
	<?php
	$password = 'demo';
	$hash = CPasswordHelper::hashPassword($password);
	echo $hash;
	?>
	<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
	<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>
	</div>
	
	<div class="left view">
	<b>To verify a password, fetch the user's saved hash from the database (into $hash) and:</b>
	<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP', 'tabSize'=>1));  ?> 
	if (CPasswordHelper::verifyPassword($password, $hash))
		// password is good
	else
		// password is bad
	<?php $this->endWidget(); ?>
	</div>
</div>

<div class="view2">
	<b class="badge">CPropertyValue</b><br>
	<a href="http://localhost/yiidoc/CPropertyValue.html" target="_blank" style="float:right">CPropertyValue</a><br />
	CPropertyValue is a helper class that provides static methods to convert component property values to specific types. <br>
	 commonly used in component setter methods to ensure the new property value is of the specific type<br>
	 
	<b>Properties can be of the following types with specific type conversion rules:</b>
	<ul>
	<li>string: a boolean value will be converted to 'true' or 'false'.</li>
	<li>boolean: string 'true' (case-insensitive) will be converted to true,
           string 'false' (case-insensitive) will be converted to false.</li>
	<li>integer</li>
	<li>float</li>
	<li>array: string starting with '(' and ending with ')' will be considered as
         as an array expression and will be evaluated. Otherwise, an array
         with the value to be ensured is returned.</li>
	<li>object</li>
	<li>enum: enumerable type, represented by an array of strings.</li>
	</ul>
	<p>
	<b> public method :</b><br>
	<code>ensureArray(), ensureBoolean(), ensureEnum(), ensureFloat(), ensureInteger(), ensureObject(), ensureString()</code></p>
	
	 <code> $input_str = "1a"</code><br>
	 <code> $input_arr = "a, b, c"</code><br>
	 
	 <code> CPropertyValue::ensureBoolean($input_str);</code> <?php echo CPropertyValue::ensureBoolean('a1'); ?> <br>
	 <code> CPropertyValue::ensureArray($input_arr)</code> <?php dump( CPropertyValue::ensureArray('a,b,1') ); ?> <br>

	 <pre>
	/* sample using method 
	public function setPropertyName($value)
	{
    $value=CPropertyValue::ensureBoolean($value);
    // $value is now of boolean type
	}	*/
	</pre>
	
	
	<b class="badge"> Method ensureArray()</b>
	<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP'));  ?> 
	public static function ensureArray($value)
	{
		if(is_string($value))
		{
			$value = trim($value);
			$len = strlen($value);
			if ($len >= 2 && $value[0] == '(' && $value[$len-1] == ')')
			{
				eval('$array=array'.$value.';');
				return $array;
			}
			else
				return $len>0?array($value):array();
		}
		else
			return (array)$value;
	}
	<?php $this->endWidget(); ?>

</div>

<?php 
	// $time=new CTimestamp;
	// echo $time->getTimestamp(1) ;
?>

<div class="view2">
	<b class="badge">CVarDumper</b><br>
	<a href="http://localhost/yiidoc/CVarDumper.html" target="_blank" style="float:right">CVarDumper</a><br />
	CVarDumper is intended to replace the buggy PHP function var_dump and print_r.<br>
<div class="left">	
<code>dump(mixed $var, integer $depth=10, boolean $highlight=false)</code><br>
<code>dumpAsString(mixed $var, integer $depth=10, boolean $highlight=false)</code>
<ul>
<li>$depth = maximum depth that the dumper should go into the variable. Defaults to 10.</li>
<li>$highlight = boolean 	whether the result should be syntax-highlighted</li>
</ul>
<b> Sample :</b><br><br>
<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
<?php
$arr1 = array(1,2);
CVarDumper::dump($arr1);		
?>
<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>
</div>

<div class="left">
<b class="textHead2">CVarDumper::dump($arr1, 10, true);</b><br><?php CVarDumper::dump($arr1, 10, true); ?><br>
<b class="textHead2">CVarDumper::dumpAsString( $this->getRemoteAddr() );</b><br> <?php echo CVarDumper::dumpAsString( $this->getRemoteAddr() ); ?><br>
<b class="textHead2">CVarDumper::dumpAsString($this->getRemoteAddr(), 10, true);</b><br> <?php echo CVarDumper::dumpAsString($this->getRemoteAddr(), 10, true); ?><br>
</div>

</div>



<div class="view2">
	<b class="badge"> </b><br>
	<a href=" " target="_blank" style="float:right"> </a><br />
	
</div>

<div class="view2">
	<b class="badge"> </b><br>
	<a href=" " target="_blank" style="float:right"> </a><br />
	
</div>
