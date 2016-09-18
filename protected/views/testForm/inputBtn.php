
<code>echo CHtml::beginForm( array('/media/export'), 'post', array( )); </code><br>
<?php //echo CHtml::beginForm(); ?>
<?php echo CHtml::beginForm( array('/media/export'), 'post', array( )); ?>

<div class="view2">
	<b class="badge"> imageButton()</b> <code>imageButton(string $src, array $htmlOptions=array ( ))</code><br>
	<b class="txtHead2">echo CHtml::imageButton( bu() .'/images/48.jpg',  array());</b><br>
	<?php echo CHtml::imageButton( bu() .'/images/48.jpg',  array()); ?>
</div>

<div class="view2">
	<b class="badge"> linkButton()</b> <code>linkButton(string $label='submit', array $htmlOptions=array ( ))</code><br>
	<b class="txtHead2">echo CHtml::linkButton('submit button link', array());</b><br>
	<?php echo CHtml::linkButton('submit button link', array()); ?>
</div>	

<div class="view2">
	<b class="badge">resetButton() </b> <code>resetButton(string $label='reset', array $htmlOptions=array ( ))</code><br>
	
	<?php echo CHtml::resetButton('reset', array() ); ?>
	<?php echo CHtml::textField('input1');?> <code> echo CHtml::resetButton('reset', array() );</code><br>
	
	<?php echo CHtml::button('button() with submit', array('submit' => array('/media/export'))); ?> 
	<code>echo CHtml::button('button() with submit', array('submit' => array('/media/export')));</code></br>
	<?php echo CHtml::submitButton('submitButton()', array());?>
	<code>echo CHtml::submitButton('submitButton()', array());</code>
</div>

<div class="view2">
	<b class="badge">checkBox()</b><code>checkBox(string $name, boolean $checked=false, array $htmlOptions=array ( ))</code><br>
	*Sample with HtmlOptions() "submit", "csrf", "confirm"
	<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>	
	<?php 	
		echo CHtml::checkBox('checkBox', true,
		array(
			'submit'=>'',
			//params: array, name-value pairs that should be submitted together with the form. This is only used when 'submit' option is specified.
			'csrf'=>1, //boolean, whether a CSRF token should be automatically included in 'params' when 
			//return: boolean, the return value of the javascript. Defaults to false, meaning that the execution of javascript would not cause the default behavior of the event.
			'confirm'=> 'yakin loee..?', //string, specifies the message that should show in a pop-up confirmation dialog.
			//ajax: array, specifies the AJAX options (see ajax).
			//live: boolean, whether the event handler should be delegated or directly bound. If not set, liveEvents will be used.
			)
	); ?>
	<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
	<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>	
</div>

<div class="view2">
<b class="badge"> Sample Export to file ( userlist data )</b><br>

<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
<!------ the form ----->
<div class="form">
	<div class="row left">
	<?php echo CHtml::label('fileType',false);  //label(string $label, string $for, array $htmlOptions=array ( )) ?>
	<?php echo CHtml::listBox('fileType', 'xls',  array('Excel5'=>'Xls', 'Excel2007'=>'Xlsx', 'PDF'=>'Pdf', 'CSV'=>'Csv', 'HTML'=>'Html' )); ?>
	</div>
	
	<div class="row left">
	<?php echo CHtml::label('page size',false); ?>
	<?php
	echo CHtml::dropDownList('pageSize',   //name input
		10,	//selected default
        array(10=>10,20=>20,50=>50),		//select option
        array('onchange'=>"$.fn.yiiGridView.update('lectivo-grid',{ data:{pageSize: $(this).val() }})",)
    );
	?>
</div>

<div class="row left">
	<?php echo CHtml::button('button() with submit', array('submit' => array('/media/export'))); ?> 
</div>

<div class="row left">
<?php echo CHtml::submitButton('submitButton()', array());?>
</div>

<div class="row left">
<?php
	echo CHtml::ajaxButton('ajaxButton',  
		array('/media/export'),  
		array(
			'type'=>'POST',
			//'update'=>'#req1', 
			//'data'=>function() { $("#type").serialize();},
			'beforeSend' => 'function() {  $("#export").addClass("loading"); }',
			'complete' => 'function() { $("#export").removeClass("loading"); }', 
		)
	);  
?>
$htmlOpt=array() with <a href="http://127.0.0.1/yiidoc/CHtml.html#clientChange-detail" target="_blank">clientChange() method </a>
</div>

</div>
</div> <!-- view2-->

<?php echo CHtml::endForm(); ?>

<!------ SAMPLE AJAX JS script ----->
<?php	
Yii::app()->clientScript->registerScript('export', "
	$('#exp_btn').click(function(){	//alert('test');
		var type='CSV';
		$.ajax({         
            type:'GET',
			url: '/HTDOCS/yiiProject/yiiTest/index.php/media/export',
            data: {id:1},
           // dataType:'json',
			//traditional:true,
			
			//'success':function(html){ jQuery('#viewSelectCont').html(html) }    //ok test pake render partial
			// 'success' :function(data) {
				// if (data.status == 'failure'){
					// $('#dialog div.dialogContent').html(data.content);
					// //$('#dialog div.dialogContent form').submit(add);
				// }
				// else{
					// $('#dialog div.dialogContent').html(data.content);
					// setTimeout(\"$('#dialog').dialog('close') \",1000);
				// }
			// }
        });
		return false;
	});"
);		
?>

<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>
