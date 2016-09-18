<b class="badge">CHtml</b> <br>

<pre class="brush: php;">
	function test() : String
	{
		return 10;
	}
	</pre>
	

	
<div class="view2">
start with <b class="txtHead">echo CHtml::beginForm()</b> <code> beginForm(mixed $action='', string $method='post', array $htmlOptions=array ( ))</code><br>
OR <b class="txtHead">CHtml::form('','post',array('enctype'=>'multipart/form-data')); </b><code>form(mixed $action='', string $method='post', array $htmlOptions=array ( ))</code> <br>
end with <b class="txtHead">echo CHtml::endForm(); </b><br>
</div>

<div class="view2">
	<b class="badge">CHtml::errorSummary</b>
	<?php $model->addError('error', 'ini test errorr..'); ?>
	
	<code>errorSummary(mixed $model, string $header=NULL, string $footer=NULL, array $htmlOptions=array ( ))</code> <br>
	<b class="txtKet2">echo CHtml::errorSummary($model, 'Header error', 'Footer error', array('style'=>'width: 400px'));</b><br>
	<div class="form">
	<?php echo CHtml::errorSummary($model, 'Header error', 'Footer error', array('style'=>'width: 400px')); ?>
	</div>
</div>


<div class="view2">
	<b class="badge">label() </b> <code>label(string $label, string $for, array $htmlOptions=array ( ))</code> <br>
	<b class="txtHead2">echo CHtml::label('label sample' , 'test', array('required'));</b><br>
	<?php echo CHtml::label('label sample' , 'test', array('required')); ?>
</div>

<div class="view2">
	<b class="badge">CHtml::image()</b> <code>image(string $src, string $alt='', array $htmlOptions=array ( ))</code> <br>
	<b class="txtHead2">echo CHtml::image( bu() .'/images/48.jpg', 'gamabar kucing imoeett', array());</b><br>
	<?php echo CHtml::image( bu() .'/images/48.jpg', 'gamabar kucing imoeett', array()); ?>
</div>

<div class="view2">
	<b class="badge">mailto()</b> <code>mailto(string $text, string $email='', array $htmlOptions=array ( ))</code> <br>
	 <code>echo CHtml::mailto('send email', 'tona_atonix@yahoo.com', array ( )) </code> 
	<?php echo CHtml::mailto('send email', 'tona_atonix@yahoo.com', array ( )) ?> <br>
	<code>echo CHtml::mailto(CHtml::image(bu().'/images/email.png'), 'tona_atonix@yahoo.com', array ( )) </code>
	<?php echo CHtml::mailto(CHtml::image(bu().'/images/email.png'), 'tona_atonix@yahoo.com', array ( )); ?> 
</div>

<div class="view2">
	<b class="badge">CHtml Sample</b> <br>
	<a href="http://localhost/yiidoc/CHtml.html" target="_blank" style="float:right">CHtml</a>
	
	<?php Yii::app()->sc->setStart(__LINE__);   // START COLLECT  ?>
	
	beginForm(mixed $action='', string $method='post', array $htmlOptions=array ( ))<br>
	<?php echo CHtml::beginForm(); ?>
	/*.................. another input......................*/<br>
	input1 :<?php echo CHtml::textField('input1',"value");?><br />
	input2 :<?php echo CHtml::textField('input2',"",array('submit'=>'')); ?> *field with auto submit 	 sintax:(CHtml::textField($name,$value,array('submit'=>''))<br /> 
	will generate :<code> jQuery('body').on('change','#yt0',function(){jQuery.yii.submitForm(this,'',{});return false;}); </code><br>
	/*.................. another input......................*/<br>
	<?php echo CHtml::endForm(); ?>
	
	/* with button submit */
	//public static string submitButton(string $label='submit', array $htmlOpt=array()) ATAU dgn CHtml::button()
	//echo CHtml::button('Submit', array('submit' => array('testform/index'))); 
	
	<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  // GET SOURCE ?>
	<?php Yii::app()->sc->renderSourceBox(); 	//FINISH AND RENDER SOURCE ?>
</div>

<div class="view2">
<b class="badge">Sample with load model</b> <br>
Use : <code>CHtml::activeTextField(CModel $model, string $attribute, array $htmlOptions=array ( ))</code>
Or alternative use <a href="tab1"><code>CActiveForm</code></a><br>
<?php
	$file ='protected/views/testForm/inputBatch.php';
	Yii::app()->sc->collect('php', Yii::app()->sc->getSnippetFromFile('<div class="form">', '</p>', $file));
	Yii::app()->sc->renderSourceBox(); 	//FINISH AND RENDER SOURCE
?>
</div>

<div class="view2">
	<b class="badge">Sample from widget "xupload-0.5.1"</b> <br>
	<div class="tpanel right">
		<div class="toggle btn"><?php echo Yii::t('ui','View File'); ?></div>
		<?php
		// $file ='protected/extensions/xupload-0.5.1/views/form.php';
		// Yii::app()->sc->collect('php', Yii::app()->sc->getSourceFromFile($file));	
		// Yii::app()->sc->renderSourceBox(); 	//FINISH AND RENDER SOURCE
		?>
	</div>
</div>

<div class="view2">
	<b class="badge">radioButtonList()</b> <code>radioButtonList(string $name, string $select, array $data, array $htmlOptions=array ( ))</code><br>

	<?php Yii::app()->sc->setStart(__LINE__);   // START COLLECT  ?>
	<?php
	echo CHtml::radioButtonList( 'cars','4', array(4 => 'GM', 5 => 'FORD'), 
		array(
			'separator' => '', 
			'labelOptions'=>array('style'=>'color: purple')	, //array, specifies the additional HTML attributes to be rendered for every label tag in the list.
			'container'=>'span', 	//string, specifies the radio buttons enclosing tag. Defaults to 'span'. If the value is an empty string, no enclosing tag will be generated
			'onChange'=>CHtml::ajax(array('type'=>'GET', 'url'=>array("testForm/ajax_test"), 'update'=>'#data')),
		)
	);
	?>
		*with custom options and AJAX call <br>
	<div id="data"></div>
	
	<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  // GET SOURCE ?>
	<?php Yii::app()->sc->renderSourceBox(); 	//FINISH AND RENDER SOURCE ?>
</div>

<div class="view2">
	<b class="badge">checkBoxList()</b> <code>checkBoxList(string $name, mixed $select, array $data, array $htmlOptions=array ( ))</code><br>
	<?php $arr= array(0=>'a', 1=>'b'); ?>
	
	<div class="left"> 
	<?php echo CHtml::checkBoxList('checkBoxList', 1, $arr, array());?>
	 <code>echo CHtml::checkBoxList('checkBoxList', 1, $arr, array());</code>
	 </div>
	
	<div class="left">
	<?php Yii::app()->sc->setStart(__LINE__);   // START COLLECT  ?>
	<?php 
	echo CHtml::checkBoxList('checkBoxList', 1, $arr, 
		array(
		//template: string, specifies how each checkbox is rendered. Defaults to "{input} {label}", where "{input}" will be replaced by 
			//the generated check box input tag while "{label}" be replaced by the corresponding check box label.
		'separator'=> '<br>', //string, specifies the string that separates the generated check boxes.
		'checkAll'=>'check all', //string, specifies the label for the "check all" checkbox. If this option is specified, 
			//a 'check all' checkbox will be displayed. Clicking on this checkbox will cause all checkboxes checked or unchecked.
		//'checkAllLast'=> , boolean, specifies whether the 'check all' checkbox should be displayed at the end of the checkbox list. 
			//If this option is not set (default) or is false, the 'check all' checkbox will be displayed at the beginning of the checkbox list.
		'labelOptions'=>array('style'=>'color: green'), //array, specifies the additional HTML attributes to be rendered for every label tag in the list.
		'containe'=>'span', //string, specifies the checkboxes enclosing tag. Defaults to 'span'. If the value is an empty string, no enclosing tag will be generated
		//baseID: string, specifies the base ID prefix to be used for checkboxes in the list.
		)
	);?>
	<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  // GET SOURCE ?>
	<?php Yii::app()->sc->renderSourceBox(); 	//FINISH AND RENDER SOURCE ?>
	</div>
</div>

<div class="view2">
	<b class="badge">listData() </b> <code>listData(array $models, mixed $valueField, mixed $textField, mixed $groupField='')</code><br>
	The generated data can be used in <code>dropDownList</code>, <code>listBox</code>, <code>checkBoxList</code>, 
	<code>radioButtonList</code>, and their active-versions (such as <code>activeDropDownList</code>).<br>
	<b class="badge">dropDownList()</b><code>dropDownList(string $name, string $select, array $data, array $htmlOptions=array ( ))</code><br>
	<b style="float:right"> see $htmlOpt=array() with <a href="http://localhost/yiidoc/CHtml.html#clientChange-detail" target="_blank">clientChange() method </a></b><br>
	
	<div class="left">
	<?php
	 $listData=tblUserMysql::model()->findAll();		//dump( $listData[0]->attributes);
	dump( CHtml::listData($listData,'id','username') );
	?>
	</div>
	
	<div class="left">
	<?php Yii::app()->sc->setStart(__LINE__);   // START COLLECT  ?>
	<?php
	 $model_list=tblUserMysql::model()->findAll();
	 $listData = CHtml::listData($model_list,'id','username');
	 //OR---
	$lisdata2 = CHtml::listData($model_list, 'id', function($model_list) {	
			//dump( $model_list->attributes['username']);
					return CHtml::encode($model_list->attributes['username']);
			});
	?>
	</div>
	
	<div class="left">
	<?php echo CHtml::dropDownList('dropDownList',null, $listData, 
		array( 
			//encode: boolean, specifies whether to encode the values. Defaults to true.
			'prompt'=>'plih donk ah..', //string, specifies the prompt text shown as the first list option.
			//empty: string, specifies the text corresponding to empty selection. Its value is empty.
			'options'=> array(	//array, specifies additional attributes for each OPTION tag.
				'2'=>array('disabled'=>true, 'label'=>'value 1'),
				'3'=>array('label'=>'value 2'),
			),
			#clientChange() support
			'submit'=>'',
			//params: array, name-value pairs that should be submitted together with the form. This is only used when 'submit' option is specified.
			'csrf'=>1, //boolean, whether a CSRF token should be automatically included in 'params' when 
			//return: boolean, the return value of the javascript. 
				//Defaults to false, meaning that the execution of javascript would not cause the default behavior of the event.
			'confirm'=> 'yakin loee..?', //string, specifies the message that should show in a pop-up confirmation dialog.
			//ajax: array, specifies the AJAX options (see ajax).
			//live: boolean, whether the event handler should be delegated or directly bound. If not set, liveEvents will be used.
		) 
	); ?>
	
	<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  // GET SOURCE ?>
	<?php Yii::app()->sc->renderSourceBox(); 	//FINISH AND RENDER SOURCE ?>
	</div>
	
</div>

<div class="view2">
	<b class="badge">listOptions() </b> <code>listOptions(mixed $selection, array $listData, array &$htmlOptions)</code><br>
	<div class="left">
	<?php Yii::app()->sc->setStart(__LINE__);   // START COLLECT  ?>
	<?php
	 $model_list=tblUserMysql::model()->findAll();
	 $listData = CHtml::listData($model_list,'id','username');
	 $html_opt = array( 
				//'encode'=>1 // boolean, Defaults to true.
				//empty: string, specifies the text  empty select
				'prompt'=>'-select-',
				'options'=>array(
					3=>array('disabled'=>true, 'label'=>'value 1'),
					2=>array('label'=>'value 2'),
				),
			);
	?>
	<?php echo CHtml::listOptions( array(2 => 'kodoqkuww'), $listData, $html_opt ); ?> 
	</div>
	
	<div class="left">
		<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  // GET SOURCE ?>
		<?php Yii::app()->sc->renderSourceBox(); 	//FINISH AND RENDER SOURCE ?>
	</div>
</div>

<div class="view2">
	<b class="badge">CMaskedTextField</b><br>
	<a href="http://localhost/yiidoc/CMaskedTextField.html#charMap-detail" target="_blank" style="float:right">CMaskedTextField</a><br />
	CMaskedTextField generates a masked text field. 
	The masked text field is implemented based on the jQuery masked input plugin (see <a href="http://digitalbush.com/projects/masked-input-plugin">http://digitalbush.com/projects/masked-input-plugin</a>).
	<ul>
	<li>mask property </li>
		the input mask (e.g. '99/99/9999' for date input). The following characters are predefined:
		<ul>
		<li>a: represents an alpha character (A-Z,a-z).</li>
		<li>9: represents a numeric character (0-9).</li>
		<li>*: represents an alphanumeric character (A-Z,a-z,0-9).</li>
		<li>?: anything listed after '?' within the mask is considered optional user input.</li>
		</ul>
		Additional characters can be defined by specifying the <a href="CMaskedTextField.html#charMap">charMap</a> property.
	<li>charMap property </li>
		the mapping between mask characters and the corresponding patterns. For example, array('~'=>'[+-]') specifies that the '~' character expects '+' or '-' input. Defaults to null, meaning using the map as described in mask.
	</ul>
	
	<br><b>Sample :</b><br>
	<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
	<?php
	$this->widget('CMaskedTextField',array(
		//'model'=>$model,
		//'attribute'=>'date',
		'name'=>'date',
		'mask'=>'99.99.9999',
		'htmlOptions'=>array(
			'style'=>'width:80px;'
		),
	));
	?>
	
	<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
	<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>
</div>
