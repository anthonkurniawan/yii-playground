<!--<script type="text/javascript" src="http://localhost/html5/angular-test/app/lib/jquery-2.0.0.js"></script> -->
<script type="text/javascript" src="http://localhost/js/jquery/jquery-ui-192/js/jquery-ui-1.9.2.custom.min.js"></script> <!--- need sortable method -->

<a href="http://e-da.net/demo/" target="_blank" class="right">Demo Site</a>

<style>
.bs-docs-example {
position: relative;
margin: 15px 0;
padding: 39px 19px 14px;
background-color: #fff;
border: 1px solid #ddd;
-webkit-border-radius: 4px;
-moz-border-radius: 4px;
border-radius: 4px;
}

.bs-docs-example:after {
content: "Example";
position: absolute;
top: -1px;
left: -1px;
padding: 3px 7px;
font-size: 12px;
font-weight: bold;
background-color: #f5f5f5;
border: 1px solid #ddd;
color: #9da0a4;
-webkit-border-radius: 4px 0 4px 0;
-moz-border-radius: 4px 0 4px 0;
border-radius: 4px 0 4px 0;
}
</style>
<!--
<div class="bs-docs-example" style="background-color: #f5f5f5;">
        <div class="row-fluid">
            <div id="clonnable-fields-widget-yw1" class="clonnable-fields-widget"><div class="hidden-template" style="display:none;"><div><div class="span1"><div class="span12 clonnable-field-1" name="template_Mayor[0][id]" data-groupname="Mayor" data-attribute="id" data-widgetname="yw1">Row 0</div></div><div class="span2"><input class="span12 clonnable-field-2" maxlength="128" name="template_Mayor[0][city]" id="yw1_Mayor_0_city" data-groupname="Mayor" data-attribute="city" data-widgetname="yw1" autocomplete="off" aria-autocomplete="list" aria-haspopup="true" type="text" value=""></div><div class="span3"><input class="span12 clonnable-field-3" maxlength="128" name="template_Mayor[0][mayor_name]" id="yw1_Mayor_0_mayor_name" data-groupname="Mayor" data-attribute="mayor_name" data-widgetname="yw1" type="text" value=""></div><div class="span2"><select class="span12 clonnable-field-4" maxlength="128" name="template_Mayor[0][gender_id]" id="yw1_Mayor_0_gender_id" data-groupname="Mayor" data-attribute="gender_id" data-widgetname="yw1">
<option value="0">unset</option>
<option value="1">male</option>
<option value="2">female</option>
</select></div><div class="span2"><input class="span12 clonnable-field-5" name="template_Mayor[0][votes]" id="yw1_Mayor_0_votes" data-groupname="Mayor" data-attribute="votes" data-widgetname="yw1" type="number" value=""></div><div class="span1"><div class="toggle-button clonnable-field-6"><input name="template_Mayor[0][pass]" id="yw1_Mayor_0_pass" data-groupname="Mayor" data-attribute="pass" data-widgetname="yw1" type="checkbox" value="1"></div></div><a class="pull-right remove-cloned-row" href="#delete-row"><i class="icon-remove"></i></a><div class="clonnable-field-status" style="clear: both;"></div></div><div class="cloned-row-dividers"><hr></div></div><div class="field-labels"><div class="span1"><label for="">#</label></div><div class="span2"><label data-toggle="popover" title="" data-content="Try to enter city name. Example: Moscow" data-trigger="hover" data-placement="top" for="" class="required" data-original-title="Bootstrap Typeahead field">City <span class="required">*</span></label></div><div class="span3"><label data-toggle="popover" title="" data-content="Enter mayor's name (plain text)" data-trigger="hover" data-placement="top" for="" data-original-title="Simple text field">Mayor's name</label></div><div class="span2"><label data-toggle="popover" title="" data-content="Select gender from the list" data-trigger="hover" data-placement="top" for="" data-original-title="Select2 field">Gender</label></div><div class="span2"><label data-toggle="popover" title="" data-content="Enter votes quantity" data-trigger="hover" data-placement="top" for="" data-original-title="Number field">Votes</label></div><div class="span1"><label data-toggle="popover" title="" data-content="Check or uncheck person." data-trigger="hover" data-placement="top" for="" data-original-title="Toggle Button field">Pass</label></div></div><div class="field-rows ui-sortable" style="clear: both;"><div class="cloned-row"><div><div class="span1"><div class="span12 clonnable-field-1" name="Mayor[1][id]" data-groupname="Mayor" data-attribute="id" data-widgetname="yw1">Row 1</div></div><div class="span2"><input class="span12 clonnable-field-2" maxlength="128" name="Mayor[1][city]" id="yw1_Mayor_1_city" data-groupname="Mayor" data-attribute="city" data-widgetname="yw1" autocomplete="off" aria-autocomplete="list" aria-haspopup="true" type="text" value=""></div><div class="span3"><input class="span12 clonnable-field-3" maxlength="128" name="Mayor[1][mayor_name]" id="yw1_Mayor_1_mayor_name" data-groupname="Mayor" data-attribute="mayor_name" data-widgetname="yw1" type="text" value=""></div><div class="span2"><div class="select2-container span12 clonnable-field-4" id="s2id_yw1_Mayor_1_gender_id"><a href="javascript:void(0)" onclick="return false;" class="select2-choice" tabindex="-1">   <span class="select2-chosen">unset</span><abbr class="select2-search-choice-close"></abbr>   <span class="select2-arrow"><b></b></span></a><input class="select2-focusser select2-offscreen" type="text" id="s2id_autogen1"><div class="select2-drop select2-display-none select2-with-searchbox">   <div class="select2-search">       <input type="text" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" class="select2-input">   </div>   <ul class="select2-results">   </ul></div></div><select class="span12 clonnable-field-4 select2-offscreen" maxlength="128" name="Mayor[1][gender_id]" id="yw1_Mayor_1_gender_id" data-groupname="Mayor" data-attribute="gender_id" data-widgetname="yw1" tabindex="-1">
<option value="0">unset</option>
<option value="1">male</option>
<option value="2">female</option>
</select></div><div class="span2"><input class="span12 clonnable-field-5" name="Mayor[1][votes]" id="yw1_Mayor_1_votes" data-groupname="Mayor" data-attribute="votes" data-widgetname="yw1" type="number" value=""></div><div class="span1"><div class="toggle-button clonnable-field-6" style="width: 70px; height: 29px;"><div style="left: -50%; width: 105px;"><input name="Mayor[1][pass]" id="yw1_Mayor_1_pass" data-groupname="Mayor" data-attribute="pass" data-widgetname="yw1" type="checkbox" value="1"><span class="labelLeft primary" style="width: 35px; height: 29px; line-height: 29px;">Yes</span><label for="yw1_Mayor_1_pass" style="width: 35px; height: 29px;"></label><span class="labelRight" style="width: 35px; height: 29px; line-height: 29px;">No</span></div></div></div><a class="pull-right remove-cloned-row" href="#delete-row"><i class="icon-remove"></i></a><div class="clonnable-field-status" style="clear: both;"></div></div><div class="cloned-row-dividers"><hr></div></div></div><a class="clone-row" href="#clone-row"><i class="icon-plus"></i> Add person to list</a></div>        </div>
    </div>
-->
<div class="clear"></div>

<div class="bs-docs-example pull-left" style="background-color: #f5f5f5;  width:350px">
<div class="row-fluid">
Sample 1 ( with new model ): <code>$model=new TblUserMysql;	</code>

<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>

<?php
$model=new TblUserMysql;	
	
$this->widget (
      'ext.clonnableFields.ClonnableFields',
      array (
         // 'models'=>tblUserMysql->TblData, //required, one to many model relation or array
		// 'models'=>array('TblUserMysql'), 
		  'models'=>array($model), 
          'rowGroupName'=>'Mayors', //required, all fields will be with this key number
          'startRows'=>2, //optional, default: 1 - The number of rows at widget start
          'labelsMode'=>2, //optional, default: 1 - (0 - never, 1 - always, 2 - only if rows exist)
          'fields'=>array( //required
              array(
                  'label'=>array(
                      'title'=>'Username',
                  ),
                  'field'=>array(
                      'class'=>'TemplateTextField',
                      'attribute'=>'username',
                  ),
              ),
          ),
      ));
  ?>
  
  <?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
	<!--
	<div class="tpanel">
		<div class="toggle btn"><?php //echo Yii::t('ui','sc class'); ?></div>
		<div class='scroll'><?php //Yii::app()->sc->renderSourceBox(); ?></div>
	</div>	-->
	
	<div class="pull-right">
		<span class="badge badge-info" onClick="js:$(this).siblings().slideToggle(); ">show code</span>
		<!--<span class="pull-right" onClick="js:$(this).siblings().slideToggle(); ">show code</span> -->
		<div style="display:none"><?php Yii::app()->sc->renderSourceBox(); ?></div>
	</div>
	
  </div>
  </div>
  
  

<div class="bs-docs-example pull-left" style="background-color: #f5f5f5; margin-left:10px;">
<div class="row-fluid">  
Sample 2 ( with load model ):  <code>$model2=TblUserMysql::model()->findByPk(1);</code>

<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>

<?php
$model2=TblUserMysql::model()->findByPk(1);	

$this->widget (
      'ext.clonnableFields.ClonnableFields',
      array (
		  'models'=>array($model2), 
          'rowGroupName'=>'Mayors', //required, all fields will be with this key number
          'startRows'=>2, //optional, default: 1 - The number of rows at widget start
          'labelsMode'=>2, //optional, default: 1 - (0 - never, 1 - always, 2 - only if rows exist)
          'fields'=>array( //required
              array (
                  'label'=>array(
                      'title'=>'Username',
                  ),
                  'field'=>array(
                      'class'=>'TemplateTextField',
                      'attribute'=>'username',
                  ),
              ),
          ),
      ));
  ?>
  
   <?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
	<div class="pull-right">
		<span class="badge badge-info" onClick="js:$(this).siblings().slideToggle(); ">show code</span>
		<!--<span class="pull-right" onClick="js:$(this).siblings().slideToggle(); ">show code</span> -->
		<div style="display:none"><?php Yii::app()->sc->renderSourceBox(); ?></div>
	</div>
	
 </div>
 </div>
 
 <div class="clear"></div>
 
Sample 3 ( complex )

<div class="bs-docs-example" style="background-color: #f5f5f5;">
<div class="row-fluid">

<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>

<?php
Yii::app()->bootstrap->init(); 

$model3 =new TblUserMysql;	

  $this->widget (
        'ext.clonnableFields.ClonnableFields',
        array (
            'models'=>array($model3), //required, one to many model relation or array
            'rowGroupName'=>'Mayors', //required, all fields will be with this key number
            'startRows'=>1, //optional, default: 1 - The number of rows at widget start
            'labelsMode'=>2, //optional, default: 1 - (0 - never, 1 - always, 2 - only if rows exist)
            'addButtonLabel' => '<i class="icon-plus"></i> Add person to list', //optionall, default: "Add"
            'removeButtonLabel' => '<i class="icon-remove"></i>', //optional, default: "Remove"
            'removeButtonHtmlOptions' => array('class'=>'pull-right'), //optional
            'fields'=>array( //required
                //---------first field------------------------
                array(
                    'label'=>array( //optional
                        'title'=>'#',
                    ),
                    'field'=>array(
                        'class'=>'TemplateAutonumerationField', //required
                        'attribute'=>'id', //required, model attribute or field name
                        'params'=>array( //optional, default: '{num}'
                            'template'=>'Row {num}',
                        ),
                        'htmlOptions'=>array('class'=>'span12'), //optional - field options
                    ),
                    'fieldHtmlOptions' => array('class'=>'span1'), //optional - field block options
                ),
                //---------second field------------------------
                array(
                    'label'=>array(
                        'title'=>'Username',
                        'htmlOptions'=>array('required'=>true, 'data-toggle' => 'popover', 'title'=>'Bootstrap Typeahead field', 'data-content' => 'Try to enter username name. Example: Moscow', 'data-trigger' => 'hover', 'data-placement' => 'top'),
                    ),
                    'field'=>array(
                        'class'=>'TemplateTypeaheadField',
                        'attribute'=>'username', //required, model attribute or field name
                        'htmlOptions'=>array('class'=>'span12', 'maxlength'=>'128'), //optional
                        'data'=>array('Moscow', 'New York', 'London', 'Paris', 'Tokio', 'Bangkok', 'Beijing'),
                        'params'=>array( //optionally, Bootstrap Typeahead parameters
                            'items'=>10, //optionally, default 5 - max founded items in the list
                            'minLength'=>1, //optionally, default 1 - min simbols to start search
                            'highlightWrong'=>true //optionally, default: false - Highlight entered value, if not in a list, bool or array('styleWrong'=>'color:xxx', 'styleOk'=>'color:xxx')
                        ),
                    ),
                    'fieldHtmlOptions' => array('class'=>'span2'),
                ),
                //---------third field------------------------
                array(
                    'label'=>array(
                        'title'=>'Password',
                        'htmlOptions'=>array('data-toggle' => 'popover', 'title'=>'Simple text field', 'data-content' => 'Enter mayor\'s name (plain text)', 'data-trigger' => 'hover', 'data-placement' => 'top'),
                    ),
                    'field'=>array(
                        'class'=>'TemplateTextField',
                        'attribute'=>'password', //required, model attribute or field name
                        'htmlOptions'=>array('class'=>'span12', 'maxlength'=>'128'),
                    ),
                    'fieldHtmlOptions' => array('class'=>'span3'),
                ),
                //---------fourth field------------------------
                array(
                    'label'=>array(
                        'title'=>'Active',
                        'htmlOptions'=>array('data-toggle' => 'popover', 'title'=>'Select2 field', 'data-content' => 'Select gender from the list', 'data-trigger' => 'hover', 'data-placement' => 'top'),
                    ),
                    'field'=>array( //required
                        'class'=>'TemplateSelect2Field', //required.
                        'attribute'=>'active', //required, model attribute or field name
                        'htmlOptions'=>array('class'=>'span12', 'maxlength'=>'128'), //optional
                        'data'=>array('0'=>'unset', '1'=>'male', '2'=>'female'),
                        'params'=>array( //optional
                            'asDropDownList'=>true,
                        ),
                    ),
                    'fieldHtmlOptions' => array('class'=>'span2'),
                ),
                //---------fifth field------------------------
                array(
                    'label'=>array(
                        'title'=>'Votes',
                        'htmlOptions'=>array('data-toggle' => 'popover', 'title'=>'Number field', 'data-content' => 'Enter votes quantity', 'data-trigger' => 'hover', 'data-placement' => 'top'),
                    ),
                    'field'=>array(
                        'class'=>'TemplateNumberField',
                        'attribute'=>'quantity',
                        'htmlOptions'=>array('class'=>'span12'),
                    ),
                    'fieldHtmlOptions' => array('class'=>'span2'),
                ),
               // ---------sixth field------------------------
                array(
                    'label'=>array(
                        'title'=>'Pass',
                        'htmlOptions'=>array('data-toggle' => 'popover', 'title'=>'Toggle Button field','data-content' => 'Check or uncheck person.', 'data-trigger' => 'hover', 'data-placement' => 'top'),
                    ),
                    'field'=>array(
                        'class'=>'TemplateToggleButtonField',
                        'attribute'=>'password',
                        'start_value'=>1,
                        'params'=>array(
                            'width'=>70,
                            'height'=>29,
                            'label'=>array('enabled'=>'Yes', 'disabled'=>'No'),
                        ),
                    ),
                    'fieldHtmlOptions' => array('class'=>'span1'),
                ),
            ),
        )
    );
	?>
	
	<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
	<div class="pull-right">
		<span class="badge badge-info" onClick="js:$(this).siblings().slideToggle(); ">show code</span>
		<!--<span class="pull-right" onClick="js:$(this).siblings().slideToggle(); ">show code</span> -->
		<div style="display:none"><?php Yii::app()->sc->renderSourceBox(); ?></div>
	</div>
</div>
</div>

<!--
Sample 4 : $model=new TblUserMysql;	

<div class="bs-docs-example" style="background-color: #f5f5f5;">
<div class="row-fluid">
<?php
// $this->widget ('ext.clonnableFields.ClonnableFields',
	// array (
		// 'models'=>$model3, //required, one to many model relation or array
		// 'rowGroupName'=>'Mayors', //required, all fields will be with this key number
		// 'startRows'=>'3', //optional, default: 1 - The number of rows at widget start
		// 'labelsMode'=>2, //optional, default: 1 - (0 - never, 1 - always, 2 - only if rows exist)
		// 'fields'=>array( //required
			// array(
				// 'label'=>array(
					// 'title'=>'Username',
				// ),
				// 'field'=>array(
					// // 'class'=>'TemplateTextField',
					// 'class'=>'TemplateFineUploaderField',
					// 'attribute'=>'mayor_name',
				// ),
			// ),
		// ),
	// )
// );    
?>