<?php $this->layout="column2"; ?>
<?php $this->renderPartial('cjui/_menu'); ?>


<h1>Yii CJuiDatePicker: Default</h1>

<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
 <script>
  $(function() {    
    $( "#anim" ).change(function() {
      $( "#datepicker" ).datepicker( "option", "showAnim", $( this ).val() );
    });
  });
  </script>
  <p>Animations:<br>
	<select id="anim">
		<option value="show">Show (default) => show</option>
		<option value="slideDown">Slide down => slideDown</option>
		<option value="fadeIn">Fade in => fadeIn</option>
		<option value="blind">Blind (UI Effect) => blind</option>
		<option value="bounce">Bounce (UI Effect) => bounce</option>
		<option value="clip">Clip (UI Effect) => clip</option>
		<option value="drop">Drop (UI Effect) => drop</option>
		<option value="fold">Fold (UI Effect) => fold</option>
		<option value="slide">Slide (UI Effect) => slide</option>
		<option value="">None</option>
	</select>
</p>
<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>


<h1>Yii CJuiDatePicker: Default</h1>
<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>

<?php
$this->widget('zii.widgets.jui.CJuiDatePicker',array(
    'name'=>'datepicker',
    // additional javascript options for the date picker plugin
    'options'=>array(
        'showAnim'=>'slide',//'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
    ),
    'htmlOptions'=>array(
        'style'=>'height:20px;background-color:green;color:white;',
    ),
));
?>
<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>
<hr>


<h1>Yii CJuiDatePicker: Inline</h1>
<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>

<?php
$this->widget('zii.widgets.jui.CJuiDatePicker',array(
    'name'=>'datepicker-Inline',
    'flat'=>true,//remove to hide the datepicker
    'options'=>array(
        'showAnim'=>'slide',//'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
    ),
    'htmlOptions'=>array(
        'style'=>''
    ),
));
?>

<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>
<hr>


<h1>Yii CJuiDatePicker: Show/Select Other Month Dates</h1>
<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>

<?php
$this->widget('zii.widgets.jui.CJuiDatePicker',array(
    'name'=>'datepicker-other-month',
    'flat'=>true,//remove to hide the datepicker
    'options'=>array(
        'showAnim'=>'slide',//'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
        'showOtherMonths'=>true,// Show Other month in jquery
        'selectOtherMonths'=>true,// Select Other month in jquery
    ),
    'htmlOptions'=>array(
        'style'=>''
    ),
));
?>

<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>
<hr>


<h1>Yii CJuiDatePicker: Display Button Bar(showButtonPanel)</h1>
<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>

<?php
$this->widget('zii.widgets.jui.CJuiDatePicker',array(
    'name'=>'datepicker-showButtonPanel',
    'value'=>date('d-m-Y'),    
    'options'=>array(
        'showAnim'=>'slide',//'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
        'showButtonPanel'=>true,
    ),
    'htmlOptions'=>array(
        'style'=>''
    ),
));
?>

<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>
<hr>


<h1>Yii CJuiDatePicker: Display Month & Year Menus</h1>
<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>

<?php
$this->widget('zii.widgets.jui.CJuiDatePicker',array(
    'name'=>'datepicker-month-year-menu',
    'flat'=>true,//remove to hide the datepicker
    'options'=>array(
	    'dateFormat' => 'yy-mm-dd',
        'showAnim'=>'slide',//'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
        'changeMonth'=>true,
        'changeYear'=>true,
        'yearRange'=>'2000:2099',
        'minDate' => '2000-01-01',      // minimum date
        'maxDate' => '2099-12-31',      // maximum date
    ),
    'htmlOptions'=>array(
        'style'=>''
    ),
));
?>

<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>
<hr>


<h1>Yii CJuiDatePicker: Display Multiple Months</h1>
<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>

<?php
$this->widget('zii.widgets.jui.CJuiDatePicker',array(
    'name'=>'datepicker-multiple-month',
    'flat'=>true,//remove to hide the datepicker
    'options'=>array(        
        'numberOfMonths'=>2,
        'showButtonPanel'=>true,
    ),
    'htmlOptions'=>array(
        'style'=>''
    ),
));
?>
<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>
<hr>


<h1>Yii CJuiDatePicker: Date Format</h1>
<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>

<script>
  $(function() {
    $( "#date-format" ).change(function() {
      $( "#datepicker-date-format" ).datepicker( "option", "dateFormat", $( this ).val() );
    });
  });
  </script>
<p>Format options:<br />
  <select id="date-format">
    <option value="mm/dd/yy">Default - mm/dd/yy</option>
    <option value="yy-mm-dd">ISO 8601 - yy-mm-dd</option>
    <option value="d M, y">Short - d M, y</option>
    <option value="d MM, y">Medium - d MM, y</option>
    <option value="DD, d MM, yy">Full - DD, d MM, yy</option>
    <option value="'day' d 'of' MM 'in the year' yy">With text - 'day' d 'of' MM 'in the year' yy</option>
  </select>
</p>
<?php
$this->widget('zii.widgets.jui.CJuiDatePicker',array(
    'name'=>'datepicker-date-format',    
    'value'=>date('d/m/Y'),
    'options'=>array(        
        'showButtonPanel'=>true,
        'dateFormat'=>'mm/dd/yy',//Date format 'mm/dd/yy','yy-mm-dd','d M, y','d MM, y','DD, d MM, yy'
    ),
    'htmlOptions'=>array(
        'style'=>''
    ),
));
?>
<hr>

<h1>Yii CJuiDatePicker: Date Range</h1>
<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>

<?php
$this->widget('zii.widgets.jui.CJuiDatePicker',array(
    'name'=>'datepicker-min-max',    
    'value'=>date('d-m-Y'),
    'options'=>array(        
        'showButtonPanel'=>true,
        'minDate'=>-5,
        'maxDate'=>"+1M +5D",
    ),
    'htmlOptions'=>array(
        'style'=>''
    ),
));
?>

