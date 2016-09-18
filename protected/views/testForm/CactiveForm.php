<div class="form">
<div class="view2">
	<b class="badge">CActiveForm Sample</b> <br>
	<a href="http://localhost/yiidoc/CActiveForm.html" target="_blank" style="float:right">CActiveForm</a>
	<ul>
	<li>associated with data models. </li>
	<li>The 'beginWidget' and 'endWidget' call of CActiveForm widget will render the open and close form tags.</li>
	<li>corresponding <code>'active' methods in CHtml</code>.</li>
	</ul>
	<b>CActiveForm supports data validation at three levels: </b>
	<ul>
    <li><b>server-side validation:</b> the validation is performed at server side after the whole page containing the form is submitted. 
		If there is any validation error, CActiveForm will render the error in the page back to user.</li>
    <li><b>AJAX-based validation:</b> when the user enters data into an input field, an AJAX request is triggered which requires server-side validation. 
		The validation result is sent back in AJAX response and the input field changes its appearance accordingly.</li>
    <li><b>client-side validation:</b> when the user enters data into an input field, validation is performed on the client side using JavaScript. 
		No server contact will be made, which reduces the workload on the server. A validator will support client-side validation only if it implements 
		<code>CValidator::clientValidateAttribute</code> and has its <code>CValidator::enableClientValidation</code> property set <code>true</code></li>
	</ul>
	
<?php 			
$form = $this->beginWidget(
    'CActiveForm',
    array(
        'id' => 'TestForm',
        'enableAjaxValidation' =>true,	//ajax base on server ( $this->performAjaxValidation($model); )
		'enableClientValidation'=>true,	//js function
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
		//	'action'=>Yii::app()->createUrl($this->route),
		'action'=>'index', 	#mixed 	the form action URL (see CHtml::normalizeUrl). 	If not set, the current page URL is used.
		'actionPrefix'=>null, 	#default: null, string, the prefix to the IDs of the actions. the prefix to the IDs of the actions. When a widget is declared an action provider in 
											#CController::actions, a prefix can be specified to differentiate its action IDs from others. 
											#The same prefix should then also be used to configure this property when the widget is used in a view of the controller.
		'clientOptions'=> array(),	#array 	the options to be passed to the javascript validation plugin. 
		'errorMessageCssClass'=>'errorMessage', 	#string, Defaults to 'errorMessage' the CSS class name for error messages. 	
		'focus'=>'input:text[value=""]:first',	#mixed, Defaults to null , form element to get initial input focus on page load. 	
							#If set as array, first element should be model and second element should be the attribute. If set as string any jQuery selector can be used 
							// 'focus'=>array($model,'username') - $model->username input filed
							// 'focus'=>'#'.CHtml::activeId($model,'username') - $model->username input field
							// 'focus'=>'#LoginForm_username' - input field with ID LoginForm_username
							// 'focus'=>'input[type="text"]:first' - first input element of type text
							// 'focus'=>'input:visible:enabled:first' - first visible and enabled input element
							// 'focus'=>'input:text[value=""]:first' - first empty input

		'method'=>'post',  #string, default: 'post', 	the form submission method. 	
		'skin'=>'test', 	#mixed, 	Defaults to 'default'. If this is set as false, no skin will be applied to this widget.
		'stateful'=>0, 	#boolean, default: false,  whether to generate a stateful form (See CHtml::statefulForm). 	
		
    )
);
?>

	<div class="tpanel">
		<div class="toggle btn"><?php echo Yii::t('ui','Class CActiveForm'); ?></div>
		<div class="scroll"><?php dump($form);?></div>
	</div>
			
	<?php 
	//errorSummary(mixed $model, string $header=NULL, string $footer=NULL, array $htmlOptions=array ( ))
	echo $form->errorSummary($model); 
	?>
	<span class="note right">Fields with <span class="required">*</span> are required.</span><br>
	<span class="badge">Sample form with Validation :</span><br>
	
	<div class="row left">
		<?php echo $form->labelEx($model,'compare1'); ?>
		<?php echo $form->textField($model,'compare1'); ?>
		<?php echo $form->error($model,'compare1'); ?>
	</div>
	<div class="row left">
		<?php echo CHtml::activeLabelEx($model,'compare2'); ?>
		<?php echo CHtml::activeTextField($model,'compare2'); ?>
		<?php echo CHtml::error($model,'compare2'); ?>
	</div>

	<div class="row left">
		<?php echo $form->labelEx($model, 'Image'); ?>
		<?php echo $form->fileField($model, 'image'); ?>
		<?php echo $form->error($model, 'image'); ?>
	</div>
	
	<?php if(CCaptcha::checkRequirements()): ?>
	<div class="row left">
		<?php echo $form->labelEx($model,'verifyCode'); ?>
		<div>
		<?php $this->widget('CCaptcha'); ?>
		<?php echo $form->textField($model,'verifyCode'); ?>
		</div>
		<div class="hint">Please enter the letters as they are shown in the image above.
		<br/>Letters are not case-sensitive.</div>
		<?php echo $form->error($model,'verifyCode'); ?>
	</div>
	<?php endif; ?>
	
	<div class="row left">
	<?php //echo CHtml::hiddenField('YII_CSRF_TOKEN',Yii::app()->request->csrfToken); ?> <!--- TOKEN-->
	<?php
	//echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', $htmlOpt=array()); 
	echo CHtml::submitButton('Submit');
	?>
	</div>
</div>

<div class="view2">	
	<b class="badge"> List input</b><br>
	
	<?php $arr= array(0=>'a', 1=>'b'); ?>
	
	<ul>
	<div class="left">
	<li><code>textField($model, str $attr, array $htmlOpt=array())</code> </li> 
		$htmlOpt=array() with <a href="http://localhost/yiidoc/CHtml.html#clientChange-detail" target="_blank">clientChange() method </a><br>
		<?php echo $form->textField($model, 'textField'); ?>
	<li><code>numberField($model, str $attr, array $htmlOpt=array())</code></li>  
		$htmlOpt=array() with <a href="http://localhost/yiidoc/CHtml.html#clientChange-detail" target="_blank">clientChange() method </a><br>
		<?php echo $form->numberField($model, 'numberField'); ?>
		
	<li><code>fileField($model, str $attr, array $htmlOpt=array())</code></li> 
		<?php echo $form->fileField($model, 'fileField'); ?>
	<li><code>textArea($model, str $attr, array $htmlOpt=array())</code></li> 
		$htmlOpt=array() with <a href="http://localhost/yiidoc/CHtml.html#clientChange-detail" target="_blank">clientChange() method </a><br>
		<?php echo $form->textArea($model, 'textArea', array('rows'=>6, 'cols'=>50)); ?>
	</div>
	
	<div class="left">
	<li> <code>activeId($model, str $attribute)</code>Generates input field ID for a model attr.</li>
		<code>CHtml::activeId($model,'username') </code> : <?php echo CHtml::activeId($model,'username'); ?> 
	<li><code>dateField($model, str $attr, array $htmlOpt=array())</code></li> 
	$htmlOpt=array() with <a href="http://localhost/yiidoc/CHtml.html#clientChange-detail" target="_blank">clientChange() method </a><br>
		<?php echo $form->dateField($model, 'dateField'); ?>
	<li><code>emailField($model, str $attr, array $htmlOpt=array())</code></li> 
		<?php echo $form->emailField($model, 'emailField', array('size'=>30,'maxlength'=>50)); ?>

	<li><code>rangeField($model, str $attr, array $htmlOpt=array())</code></li>  
		$htmlOpt=array() with <a href="http://localhost/yiidoc/CHtml.html#clientChange-detail" target="_blank">clientChange() method </a><br>
		<?php echo $form->rangeField($model, '[]rangeField' , array('size'=>10)); ?>
	<li><code>rangeField($model, str $attr, array $htmlOpt=array())</code></li>  
		<?php echo $form->rangeField($model, '[]rangeField',  array('size'=>10)); ?>
		
	<li><code>label($model, str $attr, array $htmlOpt=array())</code></li>  
		<?php echo $form->label($model, 'label'); ?>
	<li><code>labelEx($model, str $attr, array $htmlOpt=array())</code></li>  
		<?php echo $form->labelEx($model, 'labelEx'); ?>
	<li><code>hiddenField($model, str $attr, array $htmlOpt=array())</code></li>  
		<?php echo $form->hiddenField($model, 'hiddenField'); ?>
	</div>
	
	<div class="clear"></div>
	
	<div class="left">
		
	<li><code>checkBox($model, str $attr, array $htmlOpt=array())</code></li>
		$htmlOpt=array() with <a href="http://localhost/yiidoc/CHtml.html#clientChange-detail" target="_blank">clientChange() method </a><br>
		<?php //echo $form->checkBox($model, 'checkBox'); ?>
		
		<?php 	//array("submit"=>array('delete', 'id'=>$data->ID), 'confirm' => 'Are you sure?')
		echo $form->checkBox($model, 'checkBox',
			array(
			'submit'=>'',
			//params: array, name-value pairs that should be submitted together with the form. This is only used when 'submit' option is specified.
			'csrf'=>1, #boolean, whether a CSRF token should be automatically included in 'params' when 
			//return: boolean, the return value of the javascript. Defaults to false, meaning that the execution of javascript would not cause the default behavior of the event.
			'confirm'=> 'yakin loee..?', //string, specifies the message that should show in a pop-up confirmation dialog.
			//ajax: array, specifies the AJAX options (see ajax).
			//live: boolean, whether the event handler should be delegated or directly bound. If not set, liveEvents will be used.
			)
		); ?>
		
	<li><code>checkBoxList($model, str $attr, array $data, array $htmlOpt=array())</code></li> 
		<?php echo $form->checkBoxList($model, 'checkBoxList', array(0=>'a', 1=>'b' )); ?>
		
	<li><code>radioButton($model, str $attr, array $htmlOpt=array())</code></li>  
		$htmlOpt=array() with <a href="http://localhost/yiidoc/CHtml.html#clientChange-detail" target="_blank">clientChange() method </a><br>
		<?php echo $form->radioButton($model, 'radioButton'); ?>
		
	<li><code>radioButtonList($model, str $attr, array $data, $htmlOpt=array())</code></li>  
		<?php echo $form->radioButtonList($model, 'radioButtonList', $arr); ?>
	</div>
	
	<div class="left">
	<li><code>dropDownList($model, str $attr, array $data, array $htmlOpt=array())</code></li> 
		$htmlOpt=array() with <a href="http://localhost/yiidoc/CHtml.html#clientChange-detail" target="_blank">clientChange() method </a><br>
		<?php echo $form->dropDownList($model, 'dropDownList', $arr); ?>
		
	<li><code>listBox($model, str $attr, array $data, array $htmlOpt=array())</code></li>  
		$htmlOpt=array() with <a href="http://localhost/yiidoc/CHtml.html#clientChange-detail" target="_blank">clientChange() method </a><br>
		<div class="left"><?php echo $form->listBox($model, 'listBox', array(0=>'a', 1=>'b', 2=>'c'), array()); ?></div>
		<div class="left">echo $form->listBox($model, 'listBox', array(0=>'a', 1=>'b', 2=>'c'), array()); </div> 
		
	<li><code>Another Sample with option "disable","prompt" and "label'=>'value 1"</code></li>  
		<div class="left">
		<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
		<?php 
		echo $form->listBox($model, 'listBox', 
			array(0, 1, 2),  
			array( 
				//'encode'=>1 // boolean, Defaults to true.
				//empty: string, specifies the text  empty select
				'prompt'=>'-select-',
				'options'=>array(
					1=>array('disabled'=>true, 'label'=>'value 1'),
					2=>array('label'=>'value 2'),
				),
			) 
		); 
		?>
		<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
		</div>
		<div class="left"><?php Yii::app()->sc->renderSourceBox();?></div>
	</div>
	
	<div class="left">
		<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>	
		<?php 
		echo $form->checkBoxList($model, Yii::t('ui','checkBoxList'), array(0=>'a', 1=>'b' ),
			array(
			//template: string, specifies how each checkbox is rendered. Defaults to "{input} {label}", where "{input}" will be replaced by 
				//the generated check box input tag while "{label}" be replaced by the corresponding check box label.
			'separator'=> '<span>', //string, specifies the string that separates the generated check boxes.
			'checkAll'=>'check all', //string, specifies the label for the "check all" checkbox. If this option is specified, 
				//a 'check all' checkbox will be displayed. Clicking on this checkbox will cause all checkboxes checked or unchecked.
			//'checkAllLast'=> , boolean, specifies whether the 'check all' checkbox should be displayed at the end of the checkbox list. 
				//If this option is not set (default) or is false, the 'check all' checkbox will be displayed at the beginning of the checkbox list.
			'labelOptions'=>array('style'=>'color: green'), //array, specifies the additional HTML attributes to be rendered for every label tag in the list.
			'container'=>'span', //string, specifies the checkboxes enclosing tag. Defaults to 'span'. If the value is an empty string, no enclosing tag will be generated
			//baseID: string, specifies the base ID prefix to be used for checkboxes in the list.
			)
		); ?>
		</div>
		
		<div class="left">
		<li><code>Another Sample checkBoxList with option "separator","checkAll", "labelOptions", "container"</code></li>
		<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
		<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>
		</div>
	
	</ul>
	</div>

<?php  $this->endWidget(); ?>
</div>
