<code>ajaxSubmitButton() </code>
	sample :<br> 
	<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?> 
	<?php echo CHtml::beginForm(); ?>
		<?php echo CHtml::label('Input text', 'input_text'); ?>
		<?php echo CHtml::textField('input_text', date('H:i:s')); ?>
		<?php 
		echo CHtml::ajaxSubmitButton('Submit request req3', 
			array('ajax/req3'), 
			array('update'=>'#req3',), 
			array('type'=>'submit',) 
		); ?>
	<?php echo CHtml::endForm(); ?>
    
	<div id="req3">...result..</div><br>

	<!---------------------------------------- equal with
	$('body').on('ccodeck','#yt3',function(){
		jQuery.ajax({
			'type':'POST',
			'url':'/HTDOCS/yiiProject/yiiTest/index.php/ajax/req3?language=id',
			'cache':false,
			'data':jQuery(this).parents("form").seriacodeze(),  #input from from
			'success':function(html){ jQuery("#req3").html(html) }
			});
			return false;
		}); -->
	<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
	<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>
	
	Prevent multiple post
To prevent the ajaxsubmitbutton from doing multiple post, add the ?beforeSend? option to your code:
<?php /*
	echo CHtml::ajaxSubmitButton('Save',
              array('formWorkHoursDays'),
                  array(
                      'success'=>'function(html) { alert(html); }',
                      'beforeSend'=>'function(){
                             $(\'body\').undelegate(\'#submitMe\', \'click\'); }', 
						),
                  array('id'=>'submitMe', 'name'=>'submitMe', 'class'=>'submitButton')
               );		*/
?>    

<b class="badge">sample Get User by ID :</b><br> 
	<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?> 
	<?php echo CHtml::beginForm(); ?>
		<?php echo CHtml::label('id', 'id'); ?>
		<?php echo CHtml::textField('id'); ?>
		<?php 
		echo CHtml::ajaxSubmitButton('Submit request req3', 
			array('ajax/Ajax_getUser'), 
			array('update'=>'#Ajax_getUser',), 
			array('type'=>'submit',) 
		); ?>
	<?php echo CHtml::endForm(); ?>
    
	<div id="Ajax_getUser">...result..</div><br>
	
	<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
	<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>