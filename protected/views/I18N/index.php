<?php 
$this->layout='column1';
$this->pageTitle=Yii::app()->name . ' - SwitchLang';
$this->breadcrumbs=array('SwitchLang',);
?>
<style>code{font-size:97%}</style>

<?php dump(Yii::app()->locale->getId()); //dump( Yii::app()->locale->getInstance( Yii::app()->locale->id ));?>
<a href="http://www.yiiframework.com/doc/guide/1.1/en/topics.i18n" class="right">see i18n topic</a> 	

<h2 class="left">Page Translate in 
	<?php echo Yii::app()->locale->getLanguage( Yii::app()->getLanguage() ); ?>
	<?php echo CHtml::image(bu("images/flag/". Yii::app()->getLanguage(). ".gif"));?>
</h2>
<div class="clear"></div>

<b>Page Translate Render : </b> <code><?=__FILE__?></code> (Only id and en_us are avallable)

<div class="myBox">
	<span class="badge badge-inverse">LangSelector</span> using <code>session</code> (get param <code>language</code> query string) <br>
	<?php Yii::app()->sc->setStart(__LINE__);   ?>
	
	<?php 
		$this->widget('LangSelector');
	?>
	
	<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  ?>
	<div class="tpanel right">
		<div class="toggle btn btn-sm btn-primary"><?php echo Yii::t('ui','ViewWidget'); ?></div>
		<div class="scroll"><?php Yii::app()->sc->renderSourceBox(); ?></div>
	</div>
	<div class="clear"></div>
</div>

<div class="myBox">
	<span class="badge badge-inverse">XLangMenu</span> basicly using <b>XUrlManager</b> set on <code>config/main - UrlManager</code> (get param <code>language</code> query string)
	<?php Yii::app()->sc->setStart(__LINE__);   ?>
	
	<?php $this->widget('ext.LANGUAGE.XLangMenu', array(
			'encodeLabel'=>false,
			'items'=>array(
				'id'=>CHtml::image( bu('images/flag/id.png')) .' In Bahasa',
				'en'=>CHtml::image( bu('images/flag/en.gif')) .' In English',
				'en_us'=>CHtml::image( bu('images/flag/en_us.gif')) .' In America',
				'et'=>CHtml::image( bu('images/flag/et.gif')) .' In Eesti', 
				'de'=>CHtml::image( bu('images/flag/deutsch.gif')) .' In deutsch', 
				'fr'=>CHtml::image( bu('images/flag/fr.gif')) .' In French', 
				'it'=>CHtml::image( bu('images/flag/it_it.gif')) .' In Italian', 
				'ja'=>CHtml::image( bu('images/flag/ja.gif')) .' In japanese', 	
				'pl'=>CHtml::image( bu('images/flag/polski.gif')) .' In polski', 
				'ru'=>CHtml::image( bu('images/flag/russian.gif')) .' In russian', 
				'pt'=>CHtml::image( bu('images/flag/portuguese.gif')) .' In portuguese', 
			),
		)); ?>
		
	<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  ?>
	
	<div class="tpanel right">
		<div class="toggle btn btn-sm btn-primary"><?php echo Yii::t('ui','ViewWidget'); ?></div>
		<div class="scroll"><?php Yii::app()->sc->renderSourceBox(); ?></div>
	</div>
	<div class="clear"></div>
</div>

<div class="cmd_line">
		<b class="badge badge-info">Test Translate</b><br><br>
		<code>Yii::t('zii','Are you sure you want to delete this item?') </code> : <?php echo Yii::t('zii','Are you sure you want to delete this item?'); ?><br />
		<code>Yii::t('ajax','Update test') </code> : <?php echo Yii::t('ajax','Update test'); ?><br />
		<code>Yii::t('ui','Data successfully saved!') </code> : <?php echo Yii::t('ui','Data successfully saved!'); ?>
		
		<div class="tpanel right">
		<div class="toggle btn btn-sm btn-primary"><?php echo Yii::t('ui','CPhpMessageSource Object'); ?></div>
		<div class="scroll">
		<?php //dump( new CPhpMessageSource); ?>
		<?php //dump(Yii::app()->getCoreMessages()); ?>
		<?php dump(Yii::app()->getMessages()); ?>
		</div>
	</div>
	<div class="clear"></div>
</div>
	
<!--------------------------------------------- DATA LOCALIZATION --------------------------------------------------->
<?php $this->widget('myPanelbar', array('selector'=>'clocale', 'title'=>'', 'content'=>'', ));  ?>

<div class="myBox" id="clocale" style="height:100px; overflow:auto">

<?php //dump(Yii::app()->dateFormatter); ?>
<?php //dump(Yii::app()->locale); ?>

Current language: <?php echo Yii::app()->getLanguage(); ?> <br>

<span class="badge badge-inverse">CLocale</span> CLocale represents the data relevant to a locale.
<span class="badge badge-info"><?php echo CHtml::link('Locale Object', array('tool/kelas', 'kelas'=>'locale'), array('target'=>'_blank')); ?></span>
<ul>
<li><b>Date short format (<code>Yii::app()->locale->getDateFormat('short')</code>) : </b> <?php echo Yii::app()->locale->getDateFormat('short'); ?> </li>
<li><b>Time medium format  (<code>Yii::app()->locale->getTimeFormat('medium')</code>) : </b> <?php echo Yii::app()->locale->getTimeFormat('medium'); ?></li>
<li><b>Week Day Names(<code>Yii::app()->locale->getWeekDayNames</code>) : </b> <?php dump( Yii::app()->locale->getWeekDayNames() );  ?></li>
<li><b>Week Day Name (<code>Yii::app()->locale->getWeekDayName(2)</code>) : </b> <?php Yii::app()->locale->getWeekDayName(2); ?></li>
<li><b>Local Languages (<code>Yii::app()->locale->getLocaleDisplayName(Yii::app()->locale->id, 'languages')</code>) : </b> <?php echo Yii::app()->locale->getLocaleDisplayName(Yii::app()->locale->id, 'languages') ?> </li>
<li><b>Local Territories (<code>Yii::app()->locale->getLocaleDisplayName(Yii::app()->locale->id, 'territories')</code>) : </b> <?php echo Yii::app()->locale->getTerritory(Yii::app()->locale->id) ?> </li>
<li><b>Local Scripts (<code>Yii::app()->locale->getLocaleDisplayName(Yii::app()->locale->id, 'scripts')</code>) : </b> <?php echo Yii::app()->locale->getScript(Yii::app()->locale->id) ?> </li>
	
<li>
	<div class="tpanel">
		<div class="toggle btn btn-sm btn-primary"><?php echo Yii::t('ui','see all local object'); ?></div>
		<div class="scroll"><?php dump(Yii::app()->locale); ?></div>
	</div>
</li>
</ul>


<span class="badge badge-inverse">CDateFormatter</span>
CDateFormatter provides date/time localization functionalities. 
<ul>
<li><b>Date format  (<code>Yii::app()->dateFormatter->format('yyyy-MM-dd', time())</code>) : </b><?php echo Yii::app()->dateFormatter->format('yyyy-MM-dd', time()); ?> </li>
<li><b>Date &amp; time short (<code>Yii::app()->dateFormatter->formatDateTime(time(), 'short');</code>) : </b> <?php echo Yii::app()->dateFormatter->formatDateTime(time(), 'short'); ?> </li>
<li><b>Date medium  (<code>Yii::app()->dateFormatter->formatDateTime(time(), 'medium', false)</code>)  : </b> <?php echo Yii::app()->dateFormatter->formatDateTime(time(), 'medium', false); ?></li>
<li><b>Time medium  (<code>Yii::app()->dateFormatter->formatDateTime(time(), false, 'medium')</code>) : </b> <?php echo Yii::app()->dateFormatter->formatDateTime(time(), false, 'medium'); ?> </li>
<li><b>Parsed date and time (<code>echo Yii::app()->dateFormatter->format(Yii::app()->locale->getDateFormat('long'), CDateTimeParser::parse('04/06/2010', 'dd/MM/yyyy'))</code>) : </b> 
	<?php echo Yii::app()->dateFormatter->format(Yii::app()->locale->getDateFormat('long'), CDateTimeParser::parse('04/06/2010', 'dd/MM/yyyy')); ?></li>
<li><b>Date &amp; time custom medium format (<code>Yii::app()->dateFormatter->formatDateTime(time(), 'medium', 'medium')</code>)  : </b> <?php echo Yii::app()->dateFormatter->formatDateTime(time(), 'medium', 'medium'); ?></li>
<li><b>Date &amp; time custom short format  (<code>Yii::app()->dateFormatter->formatDateTime(time(), 'short', 'short')</code>) : </b> <?php echo Yii::app()->dateFormatter->formatDateTime(time(), 'short', 'short'); ?></li>
<li><b>Date &amp; time custom long format (<code>Yii::app()->dateFormatter->formatDateTime(time(), 'long', 'long')</code>) : </b> <?php echo Yii::app()->dateFormatter->formatDateTime(time(), 'long', 'long'); ?></li>
</ul>

<span class="badge badge-inverse">CNumberFormatter</span>
 <?php echo Yii::app()->dateFormatter->format(time(), 'short'); ?>

<b>Number - CNumber</b> <br>
<code>format(string $pattern, mixed $value, string $currency=NULL)</code> Formats a number based on a format. This is the method that does actual number formatting.<br>
<ul>
<li><b>Format Patern</b> (<code>Yii::app()->numberFormatter->format('#,##0.00', '0123456789') </code>) <?php echo Yii::app()->numberFormatter->format('#,##0.00', '0123456789'); ?> </li>
<li><b>Format Patern With Currency</b> (<code>Yii::app()->numberFormatter->format('#,#,#0.00', '10000', 'USD'); </code>) <?php echo Yii::app()->numberFormatter->format('#,#,#0.00', '10000', 'USD'); ?> </li>		
<li><b>Format Currency</b> (<code>Yii::app()->numberFormatter->formatCurrency('1000000', 'IDR')</code>) <?php echo Yii::app()->numberFormatter->formatCurrency('1000000', 'IDR'); ?></li>
	<small>'AUD', 'BRL', 'CAD', 'CNY', 'EUR' , 'GBP', 'HKD', 'ILS', 'INR', 'JPY', 'KRW', 'MXN', 'NZD', 'THB', 'TWD', 'USD', 'VND', 'XAF', XCD', 'XOF', 'XPF', 'IDR'</small>
<li><b>Format Number</b> (<code>Yii::app()->numberFormatter->formatCurrency('1000000', 'USD'); </code>) <?php echo Yii::app()->numberFormatter->formatCurrency('1000000', 'USD'); ?> </li>
<li><b>Format Decimal</b> (<code>Yii::app()->numberFormatter->formatDecimal('1000'); </code>) <?php echo Yii::app()->numberFormatter->formatDecimal('1000'); ?> </li>
<li><b>Format Percent</b> (<code>Yii::app()->numberFormatter->formatPercentage(1000); </code>) <?php echo Yii::app()->numberFormatter->formatPercentage(1000); ?> </li>
</ul>
</div>

		
<?php $this->widget('myPanelbar', array('selector'=>'langBox', 'title'=>'', 'content'=>'', ));  ?>

<div class="myBox" id="langBox" style="height:100px; overflow:auto">
<p>
<span class="badge badge-inverse">CPhpMessageSource  - system.i18n </span> 
<span class="badge badge-info"><?php echo CHtml::link('Messages Object', array('tool/kelas', 'kelas'=>'messages'), array('target'=>'_blank')); ?></span>
</p>

<b>CMessageSource</b> is the base class for message translation repository classes. <br>
<p>
A message source is an application component that provides message <b>internationalization (i18n)</b>.
It stores messages translated in different languages and provides these translated versions when requested. 
</p>
<p>
And the corresponding message file is assumed to be <code>'BasePath/messages/LanguageID/categoryName.php'</code>, where <u>'BasePath' refers to the directory that contains 
the extension class file</u>.<br> When using <code>Yii::t()</code> to translate an extension message, the category name should be set as <code>'Xyz.categoryName'</code>.
</p>
	
<p> 
<b> Syntax : </b><code>t(string $category, string $message, array $params=array ( ), string $source=NULL, string $language=NULL)</code> <br>
<b> Example : </b> <br>
	<code>Yii::t('ui','Data successfully saved!', array(), null, 'et') </code> : <?php echo Yii::t('ui','Data successfully saved!', array(), null, 'et'); ?><br />
	<code>Yii::t('zii', 'Path alias "{alias}" is redefined.',array('{alias}'=>$alias))</code>  : <?php echo Yii::t('zii', 'Path alias "{alias}" is redefined.',array('{alias}'=>'nilai param')); ?><br>
<b> With choice format : </b> <br>
	<code>Yii::t('app', 'n==1#one book|n>1#many books', array(1))</code> : <?php echo Yii::t('app', 'n==1#one book|n>1#many books', array(1)); ?>	<br>
	<code>Yii::t('test', 'cucumber|cucumbers', 1)</code> : <?php echo Yii::t('test', 'cucumber|cucumbers', 1); ?>	<br>
	<code>Yii::t('test', '{n} cucumber|{n} cucumbers', 1)</code> : <?php echo Yii::t('test', '{n} cucumber|{n} cucumbers', 1); ?> <br>
</p>

<p><span class="badge badge-inverse">CChoiceFormat</span></p>
Yii supports choice format, which is also known as plural forms. <u>Choice format refers to choosing a translation according to a given number value</u>. <br>
<b>For example,</b> in English, the word 'book' may either take a singular form or a plural form depending on the number of books, while in other languages, 
the word may not use different forms (such as in Chinese).<br> 
Choice format solves this problem in a simple yet effective way. The candidate messages are given as a string in the following format :
<code>'expr1#message1|expr2#message2|expr3#message3'</code>

<p>
<b>Example : </b> <br>
	<code>echo CChoiceFormat::format('n==1#one|n==2#two|n>2#others', 2); </code> <?php echo CChoiceFormat::format('n==1#one|n==2#two|n>2#others', 2); ?>
</p>

<p><span class="badge badge-inverse">File Translation</span> </p>
File translation is accomplished by calling CApplication::findLocalizedFile(). Given the path of a file to be translated, the method will look for a file with the same name 
under the LocaleID subdirectory. If found, the file path will be returned; otherwise, the original file path will be returned.
<p>
When calling one of the render methods in a controller or widget, the view files will be translated automatically. <br>
<b>For example</b>, if the target language is <code>id</code> while the source language is <code>en_us</code>, 
rendering a view named edit would resulting in searching for the <u>view file</u> <code>protected/views/ControllerID/zh_cn/edit.php</code>. 
If the file is found, this translated version will be used for rendering.
</p>
</div>

<?php $this->widget('myPanelbar', array('selector'=>'i18nBox', 'title'=>'', 'content'=>'', ));  ?>

<div class="flash-error" id="i18nBox" style="height:100px; overflow:auto">
	<b>To enable CPhpMessageSource</b>
	<ul>
	<li>run command at console <code> yiic message config/messages.php </code> (see for modif file)</li> 
	<li>Check/update <code>config/messages.php</code></li>
	<li>Check/Update directory message, default on <code>protected\messages</code></li>
	<li>For widget <code>XLangMenu</code> Add Config/main.php for urlManager : </li>
	<?php Yii::app()->sc->setStart(__LINE__);   ?> <!--
	'urlManager'=>array(
			'class' => 'ext.language.XUrlManager',
		-->
	<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  ?>
	<?php Yii::app()->sc->renderSourceBox(); ?>
	</ul>
	
	<ul>Note :
	<li>standard way to use translation in module, in the module <code>init()</code> function: <li>
	<?php Yii::app()->sc->setStart(__LINE__);   ?> <!--
	Yii::app()->setComponents(array(
		'messages' => array(
			'class'=>'CPhpMessageSource',
			'basePath'=>'protected/modules/www/messages',
		),
	));
	-->
	<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  ?>
	<?php Yii::app()->sc->renderSourceBox(); ?>
	</ul>	
</div>

