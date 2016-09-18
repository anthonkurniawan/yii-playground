
<?php //$this->renderPartial('_menu'); ?>
<?php
$this->pageTitle=Yii::app()->name . ' - Web Services'; 
$this->breadcrumbs=array('Web Services',);
?>

<style>
pre {margin:0px 0px 0px 0px}
.view2{ width:auto}
.php-hl-main {font-size:10px}
.php-hl-table {font-size:10px}
.html-hl-main  {font-size:11px}
.javascript-hl-main{font-size:10px}
</style>

<h1><small> Web Services </small> </h1>
<a href="http://www.yiiframework.com/doc/guide/1.1/en/topics.webservice" target="_blank" style="float:right"> Web Services on YII </a>
<div class="view2">
Layanan Web adalah sistem software yang didesain untuk mendukung interaksi interoperable mesin-ke-mesin melalui sebuah jaringan. <br>
Dalam konteks aplikasi Web, ia biasanya merujuk ke satu set API yang dapat diakses melalui Internet dan menjalankan layanan di hosting sitem remote. <br>
Sebagai contoh, klien berbasis-Flex dapat memanggil fungsi yang diimplementasikan pada sisi server yang menjalankan aplikasi berbasis-PHP. <br>
Layanan Web bergantung pada SOAP sebagai lapisan dasar tumpukan protokol komunikasinya.<br>
<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP', 'lineNumberStyle'=>'table', 'showLineNumbers'=>1, )); ?>
#set at controller
public function actions()
    {
        return array(
            'quote'=>array(
                'class'=>'CWebServiceAction',
				'classMap'=>array(
                    'Post'=>'Post',  // atau cukup 'Post'
				),
            ),
        );
    }
	
	/**
     * @param string the symbol of the stock
     * @return float the stock price
     * @soap
     */
	 #http://hostname/path/to/index.php?r=stock/quote
	 #Secara default, CWebServiceAction menganggap controller saat ini adalah penyedia layanan. 
	 #Itulah mengapa kita mendefinisikan metode getPrice di dalam kelas StockController.
    public function getPrice($symbol)
    {
        $prices=array('IBM'=>100, 'GOOGLE'=>350);
        return isset($prices[$symbol])?$prices[$symbol]:0;
        //...return stock price for $symbol
    }
<?php $this->endWidget(); ?>


<b class="badge">DATA TYPES </b>
When declaring class methods and properties to be remotely accessible, we need to specify the data types of the input and output parameters. 
The following primitive data types can be used:
<ul>
	<li>str/string: maps to xsd:string; </li>
    <li>int/integer: maps to xsd:int;</li>
    <li>float/double: maps to xsd:float;</li>
    <li>bool/boolean: maps to xsd:boolean;</li>
    <li>date: maps to xsd:date;</li>
    <li>time: maps to xsd:time;</li>
    <li>datetime: maps to xsd:dateTime;</li>
    <li>array: maps to xsd:string;</li>
    <li>object: maps to xsd:struct;</li>
    <li>mixed: maps to xsd:anyType.</li>
</ul>

<div class="view">
<b>user contributions :</b><br>
hosting not supporting SOAP
If your host is not supporting SOAP, you can use a controller instead.
You can use an action for each function and encpsulate the result with json:
<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP', 'lineNumberStyle'=>'table', )); ?>
/**
     * @param string the symbol of the stock
     * @return float the stock price
     */
    public function actionGetPrice($symbol)
    {
        CJSON::encode($symbol);
    }
<?php $this->endWidget(); ?>
This is an acceptable workaround. Of corse there are no type check, and the result is not in xml but a JSON encoded, 
but this system at least allow 2 application to collaborate.
</div>


</div>