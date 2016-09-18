<?php
/* @var $this SiteController */
//cs()->registerCssFile('http://localhost/yii/yii-theme/css/bootstrap.css');
//cs()->registerScriptFile('http://localhost/yii/yii-theme/js/bootstrap.js');

$this->pageTitle=Yii::app()->name . ' - CJUI-yii';
$this->breadcrumbs=array(
	'CJui Elements',
);
?>

<style>
.row-fluid {
    width: 100%;
    *zoom: 1;
}

.row-fluid:before,
.row-fluid:after {
    display: table;
    line-height: 0;
    content: "";
}

.row-fluid:after {
    clear: both;
}

.row-fluid [class*="span"] {
    display: block;
    float: left;
    width: 100%;
    min-height: 30px;
    margin-left: 2.127659574468085%;
    *margin-left: 2.074468085106383%;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}
.row-fluid [class*="span"]:first-child {
    margin-left: 0;
}
.row-fluid .span6 {
    width: 48.93617021276595%;
    *width: 48.88297872340425%;
}
</style>


<?php
$sample_text = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.';
?>

<div class="page-header">
	<h1>CJui elements</h1>
</div>

<div class="row-fluid"> <!-- row-fluid -->
	<!---------------------------------------------------- CJUIACCORDION  ----------------------------------------------------->
  <div class="span6 myBox">
  	<p><span class="badge badge-inverse">CJUIACCORDION</span></p>
    <?php
    $this->widget('zii.widgets.jui.CJuiAccordion', array(
		'panels'=>array(
			'panel 1'=>$sample_text,
			'panel 2'=>$sample_text,
			'panel 3'=>$sample_text,
			'panel 4'=>$sample_text,
			// panel 5 contains the content rendered by a partial view
			//'panel 5'=>$this->renderPartial('_partial',null,true),
		),
		// additional javascript options for the accordion plugin
		'options'=>array(
			'animated'=>'bounceslide',
		),
	));
	?>
  </div>	<!-- span6 -->
  
	 <!---------------------------------------------------- CJUITABS WIDGET----------------------------------------------------->
  <div class="span6 myBox">
  	<p><span class="badge badge-inverse">CJUITABS</span></p>
    <?php
    $this->widget('zii.widgets.jui.CJuiTabs', array(
		'tabs'=>array(
			'StaticTab 1'=>$sample_text,
			'StaticTab 2'=>$sample_text,
			'StaticTab 3'=>array('content'=>$sample_text, 'id'=>'tab3'),
		),
		// additional javascript options for the tabs plugin
		'options'=>array(
			'collapsible'=>true,
		),
	));
	?>
  </div> <!-- span6 -->
  
   <!---------------------------------------------------------- CJuiButton WIDGET-------------------------------------------------------->
  <div class="span6 myBox">
  	<p><span class="badge badge-inverse">CJuiButton</span></p>
   
	<?php
	#SAMPLE STANDART ( no class )
    $this->widget('zii.widgets.jui.CJuiButton', array(
		'name'=>'button',
		'caption'=>'Save',
		'value'=>'asd',
		'onclick'=>new CJavaScriptExpression('function(){alert("Save button has been clicked"); this.blur(); return false;}'),
	));
	#SAMPLE STANDART ( class btn-primary )
	$this->widget('zii.widgets.jui.CJuiButton', array(
		'name'=>'button1',
		'caption'=>'Save',
		'value'=>'asd1',
		'htmlOptions'=>array('class'=>'btn btn-primary'),
		'onclick'=>new CJavaScriptExpression('function(){alert("Save button has been clicked"); this.blur(); return false;}'),
	));
	#SAMPLE STANDART ( class btn-info )
	$this->widget('zii.widgets.jui.CJuiButton', array(
		'name'=>'button2',
		'caption'=>'Save',
		'value'=>'asd2',
		'htmlOptions'=>array('class'=>'btn btn-info'),
		'onclick'=>new CJavaScriptExpression('function(){alert("Save button has been clicked"); this.blur(); return false;}'),
	));
	#SAMPLE STANDART ( class btn-success )
	$this->widget('zii.widgets.jui.CJuiButton', array(
		'name'=>'button3',
		'caption'=>'Save',
		'value'=>'asd3',
		'htmlOptions'=>array('class'=>'btn btn-success'),
		'onclick'=>new CJavaScriptExpression('function(){alert("Save button has been clicked"); this.blur(); return false;}'),
	));
	#SAMPLE STANDART ( class btn-warning )
	$this->widget('zii.widgets.jui.CJuiButton', array(
		'name'=>'button4',
		'caption'=>'Save',
		'value'=>'asd4',
		'htmlOptions'=>array('class'=>'btn btn-warning'),
		'onclick'=>new CJavaScriptExpression('function(){alert("Save button has been clicked"); this.blur(); return false;}'),
	));
	#SAMPLE STANDART ( class btn-danger )
	$this->widget('zii.widgets.jui.CJuiButton', array(
		'name'=>'button5',
		'caption'=>'Save',
		'value'=>'asd5',
		'htmlOptions'=>array('class'=>'btn btn-danger'),
		'onclick'=>new CJavaScriptExpression('function(){alert("Save button has been clicked"); this.blur(); return false;}'),
	));
	?>
  </div> <!-- span6 -->
</div>	<!-- row-fluid -->




<div class="row-fluid">
	<!---------------------------------------------------- CJUI AUTOCOMPLETE WIDGET----------------------------------------------------->
  <div class="span myBox" style="width:300px">
  	<p><span class="badge badge-inverse"> CJUI AUTOCOMPLETE</span></p>
    <p>Type <code>john</code> in the fild to see it at work</p>
    <?php
    $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
		'name'=>'city',
		'source'=>array('John Doe', 'John Murry', 'Ben John', 'Johnny Walker'),
		// additional javascript options for the autocomplete plugin
		'options'=>array(
			'minLength'=>'2',
		),
		'htmlOptions'=>array(
			'style'=>'height:20px;'
		),
	));
	?>
  </div> <!-- span6 -->
  <!---------------------------------------------------- CJuiDatePicker WIDGET----------------------------------------------------->
  <div class="span myBox" style="width:300px">
	<p><span class="badge badge-inverse"> CJuiDatePicker</span></p>
	
   	<p>Click on the element below to see date picker</p>
    <?php
    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
		'name'=>'publishDate',
		// additional javascript options for the date picker plugin
		'options'=>array(
			'showAnim'=>'fold',
		),
		'htmlOptions'=>array(
			'style'=>'height:20px;'
		),
	));
	?>
  </div> <!-- span6 -->

     <!---------------------------------------------------------- CJuiDialog WIDGET-------------------------------------------------------->
  <div class="span myBox" style="width:300px">
  	<p><span class="badge badge-inverse">CJuiDialog</span></p>
    
    <?php
    $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
		'id'=>'mydialog',
		// additional javascript options for the dialog plugin
		'options'=>array(
			'title'=>'Dialog box 1',
			'autoOpen'=>false,
		),
	));

    echo $sample_text;

	$this->endWidget('zii.widgets.jui.CJuiDialog');	// cjuidialog widget

	// the link that may open the dialog
	$dialog_button = '<button type="button" class="btn btn-primary" data-loading-text="Loading...">Open dialog</button>';
	echo CHtml::link($dialog_button, '#', array(
		'onclick'=>'$("#mydialog").dialog("open"); return false;',
	));
	?>
  </div> <!-- span6 -->
</div> <!-- row-fluid -->

<div class="row-fluid">
  <div class="myBox span6" style="width:300px">
	<span class="badge badge-inverse">CJuiSelectable</span>
	<style>
	ol li, ul li{border:1px solid blue; padding:3px; margin:2px}
	#feedback { font-size: 1.4em; border: 1px solid red }
	#selectable .ui-selecting { background: #FECA40; }
	#selectable .ui-selected { background: #F39814; color: white; }
	#selectable { list-style-type: none; margin: 0; padding: 0; width: 60%; }
	#selectable li { margin: 3px; padding: 0.4em;  }
	</style>
	
	<p id="feedback">
		<span>You've selected:</span> <span id="select-result">none</span>.
	</p>

  <?php
	$this->widget('zii.widgets.jui.CJuiSelectable',array(
		'items'=>array(
			'id1'=>'Item 1',
			'id2'=>'Item 2',
			'id3'=>'Item 3',
		),
		'id'=>'selectable',
		// additional javascript options for the selectable plugin
		'options'=>array(
			//'delay'=>'300',
			'stop'=>'js:function() {									//alert("xxxx");
				var result = $( "#select-result" ).empty();
				$( ".ui-selected", this ).each(function() {
					var index = $( "#selectable li" ).index( this );
					result.append( " #" + ( index + 1 ) );
				});
			}',
		),
	));
	?>

  </div> <!-- span6 -->  
  
<div class="myBox span6" style="width:300px">
<p><span class="badge badge-inverse">CJuiSortable </span></p>
<style>ul.ui-sortable li{ background: #F39814; color: white;}</style>

<?php
$this->widget('zii.widgets.jui.CJuiSortable',array(
    'items'=>array(
        'id1'=>'Item 1',
        'id2'=>'Item 2',
        'id3'=>'Item 3',
    ),
    // additional javascript options for the JUI Sortable plugin
    'options'=>array(
        'delay'=>'300',
    ),
));
?>
</div>

<div class="myBox span6" style="width:300px; height:150px">
<p><span class="badge badge-inverse">CJuiDraggable </span></p>
<style>.ui-draggable{ background: #F39814; color: white; border: 1px solid black}</style>

<?php
$this->beginWidget('zii.widgets.jui.CJuiDraggable',array(
    // additional javascript options for the draggable plugin
    'options'=>array(
        'scope'=>'myScope',
    ),
));
    echo 'Your draggable content here';

$this->endWidget();
?>
</div>

</div>

<div class="row-fluid">
   <!---------------------------------------------------------- CJuiProgressBar WIDGET-------------------------------------------------------->
  <div class="span6 myBox">
  	<p><span class="badge badge-inverse">CJuiProgressBar </span></p>
	
    <p>Standard progress bar</p>
    <p><code> with no styles defined</code></p>
    <?php
    $this->widget('zii.widgets.jui.CJuiProgressBar', array(
		'value'=>30,
	));
	?>
	
    <p>Striped progress bar</p>
    <p><code>'htmlOptions'=>array('class'=>'progress-striped'),</code></p>
    
    <?php
    $this->widget('zii.widgets.jui.CJuiProgressBar', array(
		'value'=>40,
		'htmlOptions'=>array('class'=>'progress progress-striped'),
	));
	?>
	
    <p>Striped scrolling progress bar</p>
    <p><code>'htmlOptions'=>array('class'=>'progress-striped active'),</code></p>
    <?php
    $this->widget('zii.widgets.jui.CJuiProgressBar', array(
		'value'=>50,
		'htmlOptions'=>array('class'=>'progress-striped active'),
	));
	?>
	
    <p>Different colors to chose from</p>
    <p><code>'htmlOptions'=>array('class'=>'progress-info'),</code></p>
    <?php
    $this->widget('zii.widgets.jui.CJuiProgressBar', array(
		'value'=>60,
		'htmlOptions'=>array('class'=>'progress-info'),
	));
	?>
	
    <p><code>'htmlOptions'=>array('class'=>'progress-success')</code></p>
    <?php
    $this->widget('zii.widgets.jui.CJuiProgressBar', array(
		'value'=>70,
		'htmlOptions'=>array('class'=>'progress-success'),
	));
	?>
	
    <p><code>'htmlOptions'=>array('class'=>'progress-warning'),</code></p>
    <?php
    $this->widget('zii.widgets.jui.CJuiProgressBar', array(
		'value'=>80,
		'htmlOptions'=>array('class'=>'progress-warning'),
	));
	?>
	
    <p><code>'htmlOptions'=>array('class'=>'progress-danger'),</code></p>
    <?php
    $this->widget('zii.widgets.jui.CJuiProgressBar', array(
		'value'=>90,
		'htmlOptions'=>array('class'=>'progress-danger'),
	));
	?>
	
    <p><code>'htmlOptions'=>array('class'=>'progress-info progress-striped'),</code></p>
    <?php
    $this->widget('zii.widgets.jui.CJuiProgressBar', array(
		'value'=>90,
		'htmlOptions'=>array('class'=>'progress-info progress-striped'),
	));
	?>
	
    <p><code>'htmlOptions'=>array('class'=>'progress-success progress-striped'),</code></p>
    <?php
    $this->widget('zii.widgets.jui.CJuiProgressBar', array(
		'value'=>80,
		'htmlOptions'=>array('class'=>'progress-success progress-striped'),
	));
	?>
	
    <p><code>'htmlOptions'=>array('class'=>'progress-warning progress-striped'),</code></p>
    <?php
    $this->widget('zii.widgets.jui.CJuiProgressBar', array(
		'value'=>70,
		'htmlOptions'=>array('class'=>'progress-warning progress-striped'),
	));
	?>
	
    <p><code>'htmlOptions'=>array('class'=>'progress-danger progress-striped'),</code></p>
    <?php
    $this->widget('zii.widgets.jui.CJuiProgressBar', array(
		'value'=>60,
		'htmlOptions'=>array('class'=>'progress-danger progress-striped'),
	));
	?>
  </div> <!-- span6 -->
  
     <!---------------------------------------------------------- CJuiSlider WIDGET-------------------------------------------------------->
  <div class="span6 myBox">
	<p><span class="badge badge-inverse">CJuiSlider </span></p>
	
	<div class="left">	
    <p><code> with no style defined</code></p>
    <?php
    $this->widget('zii.widgets.jui.CJuiSlider', array(
		'value'=>30,
	));
	?>
    
    <p><code>.progress-info</code></p>
    <?php
    $this->widget('zii.widgets.jui.CJuiSlider', array(
		'value'=>40,
		'htmlOptions'=>array('class'=>'progress-info'),
	));
	?>
	
    <p><code>.progress-success</code></p>
    <?php
    $this->widget('zii.widgets.jui.CJuiSlider', array(
		'value'=>30,
		'htmlOptions'=>array('class'=>'progress-success'),
	));
	?>
	
    <p><code>.progress-warning</code></p>
    <?php
    $this->widget('zii.widgets.jui.CJuiSlider', array(
		'value'=>20,
		'htmlOptions'=>array('class'=>'progress-warning'),
	));
	?>
	
    <p><code>.progress-danger</code></p>
    <?php
    $this->widget('zii.widgets.jui.CJuiSlider', array(
		'value'=>30,
		'htmlOptions'=>array('class'=>'progress-danger'),
	));
	?>
    
    <p><code>.progress-striped</code></p>
    <?php
    $this->widget('zii.widgets.jui.CJuiSlider', array(
		'value'=>30,
		'options'=>array(
			'min'=>10,
			'max'=>100,
		),
		'htmlOptions'=>array('class'=>'progress-striped'),
	));
	?>
	</div>
	
	<div class="left" style="margin-left:20px">
	<p><code>.progress vertical</code></p>
	
	<?php
    $this->widget('zii.widgets.jui.CJuiSlider', array(
		'value'=>30,
		'options'=>array(
			'orientation'=> "vertical",
			'min'=>10,
			'max'=>100,
		),
		'htmlOptions'=>array('class'=>'progress-striped'),
	));
	?>
	</div>
  </div> <!-- span6 -->


  <div class="myBox span6">
	<p><span class="badge badge-inverse">CJuiSlider-Input </span></p>
  <?php
	$this->widget('zii.widgets.jui.CJuiSliderInput',array(
		'name'=>'rate',
		'value'=>37,
		// additional javascript options for the slider plugin
		'options'=>array(
			'min'=>10,
			'max'=>50,
		),
		'htmlOptions'=>array(
			'style'=>'height:20px;',
		),
	));
	?>
	</div>
</div> <!-- row-fluid -->




