<?php //dump($this); ?>
<?php
$content1='
<ul>
	<li> <b>fixed header</b> as you go down on thousand records <code>"fixedHeader" => true</code> 
		<a href="https://github.com/jmosbech/StickyTableHeaders" target="_blank"> - jquery plugin StickyTableHeaders</a></li>
	<li> <b>Sortable Rows</b> (drag row to new position) <code>"sortableRows"=>true </code> 
		and callback func <code>"afterSortableUpdate" =>"js:function(selected){ }"</code> <br>
		The extended grid view provides a mechanism to order the rows and report back through a javascript callback the new position of the data, so you could easily make an <b>AJAX</b> request to the server and update the list.  It also will update the keys position, so you can safely use regular <code>$.fn.yiiGridView functions</code>. </li>
	<li> <b>Selectable Cells</b> This is very useful when you wish to display some feedback information related to the selected cells. 
		( ex :sort area cell to count ) <code>"selectableCells"=>true</code> <span class="label label-info"> Tapi jika di gunakan bareng Sortable Rows perlu di buat smacam SWITCH </span> </li>
	<li> <b>Bulk Actions</b>  - The extended grid allows you to display bulk action buttons on its footer. (ex: del all, view all, etc..) <code>"bulkActions" => array( ) 
		</code> <span class="label label-important">The buttons wont be functional (active) until at least one checkbox element is on its <code>checked</code> state</span>  </li>
	<li>  <strong>by setting the <code> "responsiveTable" => true,</code>  (this is for all extended versions of TbGridView), tables will be automatically converted to suit mobile size. Try it by resizing the browser window and check this first example.</strong> </li>

</ul>';

$content2='<span class="muted">poor programmers building a sub-grid that will display the summary and forcing us to loop through the data provider once more, slowing down our app. The grid makes use of the following components for different displays: </span>
<pre style="padding: 5px; margin: 0px 0px; font-size: 11px;  line-height: 10px; width:700px">
"extendedSummary" => array(
     "title" => "Text Title",      //the extended summary title
     "columns" => array(	 //the "columns" that will be displayed at the extended summary
         "id" => array(  	//colum name "id"
             "class" => "TbSumOperation",  //what is the type of TbOperation we are going to display
             "label" => "Sum of Ids"     //label is name of label of the resulted value (ie Sum of Ids:)
         ),
         "results" => array(   //column name "results"
             "class" => "TbPercentOfTypeGooglePieOperation", // the type of TbOperation
             "label" => "How Many Of Each? ", // the label of the operation
             "types" => array(               // TbPercentOfTypeGooglePieOperation "types" attributes
                 "0" => array("label" => "zeros"),   // a value of "0" will be labelled "zeros"
                 "1" => array("label" => "ones"),    // a value of "1" will be labelled "ones"
			 )
		)
	),
"extendedSummaryOptions" => array(		 #HTML attributes 
	"class" => "well pull-right",
	"style" => "width:300px"
), 
</pre>


<ul>
<li>TbSumOperation - <span class="muted">Will display the sum of an specific column </span> <code> "class" => "TbSumOperation",</code> </li>
<li>TbCountOfTypeOperation - <span class="muted"> Displays the number of times a type of value appears in the specified column cell (ie. total of zeros, total of ones). </span>  <code>"class"=>"TbCountOfTypeOperation"</code> </li>
<li>TbPercentOfTypeOperation - <span class="muted">Displays the percent number of times a type of value appears in the specified column cell (ie. percent of zeros, percent of ones) </span> <code>TbPercentOfTypeOperation</code></li>
<li>
	TbPercentOfTypeEasyPieOperation - <span class="muted">Displays the percent number of times a type of value appears in the specified column cell on pie charts. 
	The handling of its display is taken care by the nice <code>TbPercentOfTypeEasyPieOperation</code> <a href="https://github.com/rendro/easy-pie-chart" target="_blank"> jquery plugin  easy-pie-chart</a>.  </span>
	<pre style="padding: 5px; margin: 0px 0px; font-size: 11px;  line-height: 10px; width:860px">
	$chartCssClass = "bootstrap-operation-easy-pie-chart";
	
	$chartOptions = array(
		"barColor" => "#ef1e25", // The color of the curcular bar. You can pass either a css valid color string like rgb,
		// rgba hex or string colors. But you can also pass a function that accepts the current
		// percentage as a value to return a dynamically generated color.
		"trackColor" => "#f2f2f2", // The color of the track for the bar, false to disable rendering.
		"scaleColor" => "#dfe0e0", // The color of the scale lines, false to disable rendering.
		"lineCap" => "round", // Defines how the ending of the bar line looks like. Possible values are: butt, round and square.
		"lineWidth" => 5, // Width of the bar line in px.
		"size" => 80, // Size of the pie chart in px. It will always be a square.
		"animate" => false, // Time in milliseconds for a eased animation of the bar growing, or false to deactivate.
		"onStart" => "js:$.noop", // Callback function that is called at the start of any animation (only if animate is not false).
		"onStop" => "js:$.noop" // Callback function that is called at the end of any animation (only if animate is not false).
	); 
	</pre>
</li>
<li>TbPercentOfTypeGooglePieOperation - <span class="muted">Well, you guessed right. It is the same operation as TbPercentOfTypeEasyPieOperation but with 
	the difference that this pie is more powerful as it can render a single pie to display the summary results. <code>TbPercentOfTypeGooglePieOperation</code>
	<span class="label label-important"> must connect to internet (need jsapi form google.com)</span> 
</span></li>

</ul>

<span class="badge badge-inverse">Note :</span>  when using charts you may need to check browser compatibility. As you know, most of these plugins do use canvas for their rendering. 
';

$content3=' The Grid/Chart switcher ( switch view between  "grid" n "chart" ) <br><span class="muted"> provide an easy to configure chart display, where the data is automatically extracted from its dataProvider. with plugin from <a href="http://www.highcharts.com/" target="_blank">Higcharts JS</a> </span>
enable by set <code>"chartOptions" => array();</code>. <br>
<pre style="padding: 5px; margin: 0px 0px; font-size: 11px;  line-height: 10px; width:300px; display:block" class="pull-left">
"chartOptions" => array(
  "data" => array(
   "series" => array(
     array(
      "name" => "Hours worked",
	   "attribute" => "catID"
	 )
   )
  ),
  "config" => array(
  "chart"=>array( "width"=>800 )
)), </pre>
<div class="pull-right" style="width:600px; display:inline">
The chartOptions  property is a configurable chart array with three elements: 
<ul>
<li><code>data</code>, whichwill contain the series attribute of Highcharts JS </li>
<li><code>config</code>, will hold the rest of the <a href="http://api.highcharts.com/highcharts" target="_blank">chart configuration options</a> </li>
<li><code>htmlOptions</code>, the HTML tag attributes of the chart container.</li>
</ul>
</div>
<span class="badge badge-warning">Important!</span> the style and data-config attributes of the container will be overrided, as they are required for the correct functionality of the chart. <br> <div class="clearfix"></div>
<span class="badge badge-warning">Important:</span> Highcharts JS is not open source for commercial products. We have include this chart library as we thought is one of the best around. We will update the library to support more charts in future releases. ';

$content4='
<div class="well well-small"> 
The TbGroupGridView widget
</div>


<ul>
<li>
	TbImageColumn - <code>"class"=>"bootstrap.widgets.TbImageColumn"</code> <span class="muted">Display an image on your grid. In order to display an image related to the data provider of the grid, you set its <code>imagePathExpression</code>. The expression string will have the following variables passed to it: <b>$row</b> (the row number), <b>$data</b> (the data module of the row) and <b>$this</b> (the column object). </span>
</li>
<li>
	TbRelationalColumn - <code>"class"=>"bootstrap.widgets.TbRelationalColumn"</code> <span class="muted">Display relational data or extra info from an ajax call into a dynamically created sub-row. <b>Important:</b> Do not use this type of column to display a link. It is recommended to work with css classes instead to change the style of its contents. </span
</li>
<li>TbTotalSumColumn -  <code>"class"=>"bootstrap.widgets.TbTotalSumColumn" </code> <span class="muted"> for sum up and there is no need to display it on a summary. </span></li>
<li> TbToggleColumn - <code> "class"=>"bootstrap.widgets.TbToggleColumn"</code> <span class="muted">  Allows to modify the value of column ( has two states: yes-no, true-false, 1-0, yin-yan, etc.). The widget works in conjunction with an action that will receive the <code>id</code> and the <code>attribute</code> parameters. YiiBooster comes with an action ready to use for that purpose: <code>TbToggleAction.</code> </span></li>
<li>TbPickerColumn - <code> "class"=>"bootstrap.widgets.TbPickerColumn"</code> <span class="muted">  to create a column that will display a picker element (kaya tootip kyna) extends from the tooltip</span>  (!! still BUGS !!)</li>
<li>
	TbJEditableColumn -<code>"class"=>"bootstrap.widgets.TbJEditableColumn"</code> <span class="muted">	( Edit/update rows from grid )<br> require: jquery.jeditable.js. <br>how to work : The javascript will always submit the row id plus editable that holds the grid id </span>
	<pre style="padding: 5px; margin: 0px 0px; font-size: 11px;  line-height: 10px; width:700px">
	array(
	 "name"=>"price",
	  "header"=>"price(TbJEditableColumn)",
	  "headerHtmlOptions" => array("style" => "width:50px"),
	  "class"=>"bootstrap.widgets.TbJEditableColumn",
	  "jEditableOptions" => array(
	    "type" => "text",  #Option : text, select, textarea, time, masked, bdatepicker, bcolorpicker
	    // very important to get the attribute to update on the server!
	    "submitdata" => array("attribute"=>"price"),
	    "cssclass" => "form",
	    "width" => "80px"
	   )
	),
	</pre>
</li>

</ul>
';
?>

<?php
$this->widget('bootstrap.widgets.TbTabs', array(
	'type'=>'tabs', // 'tabs' or 'pills'
	'stacked'=>false, //true like table right menu, false: default tab
	'placement'=>'above',  //above - default, right, bellow, or left
	'htmlOptions' => array('style'=>'width:950px; height:300px;  overflow-y: auto', 'class'=>'pull-left' ),
	'tabs'=>array(
		array('label'=>'Overview', 'content'=>$content1, 'active'=>true ),
		array('label'=>'Extended Summary', 'content'=>$content2,  'active'=>false, ),
		array('label'=>'The Grid/Chart switcher', 'content'=>$content3, 'active'=>false,),
		array('label'=>'Additional Columns', 'content'=>$content4, 'active'=>false, 'itemOptions'=>array('class'=>'disabled')), // for gray links and no hover effects
		// array('label' => 'DropDown', 'items' => array(
			// array('label' => 'Item1', 'content' => 'Item1 Content'),
			// array('label' => 'Item2', 'content' => 'Item2 Content')
		// )),
	),
));
?>

