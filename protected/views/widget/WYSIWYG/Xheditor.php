<?php 
$this->layout='column2';
$this->pageTitle=Yii::app()->name . ' - XHeditor'; 
$this->breadcrumbs=array('groupgridview',);
$this->renderPartial('WYSIWYG/_menu');
?>

<div class="myBox">
<p><b class="badge badge-inverse">Basic</b></p>

<?php Yii::app()->sc->setStart(__LINE__);  ?>

<?php $this->widget('ext-coll.WYSIWYG_EDITOR.xheditor.XHeditor',array(
	'language'=>'en', // en, zh-cn, zh-tw, ru
	'config'=>array(
		'id'=>'xh1',
		'name'=>'xh',
		'skin'=>'o2007silver', // default, nostyle, o2007blue, o2007silver, vista
		'tools'=>'mini', // mini, simple, mfull, full or from XHeditor::$_tools, tool names are case sensitive
		'width'=>'100%',
		'height'=>'100px',
		//see XHeditor::$_configurableAttributes for more
	),
	'contentValue'=>'Enter your text here', // default value displayed in textarea/wysiwyg editor field
	'htmlOptions'=>array('rows'=>5, 'cols'=>10), // to be applied to textarea
)); 
?>

<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  ?>
<?php Yii::app()->sc->renderSourceBox(); ?>
</div>


<!------------------------------------------------------------------------------------------------------------------------------------------------->
<div class="myBox">
<p><b class="badge badge-inverse">Advandce</b></p>

<?php Yii::app()->sc->setStart(__LINE__);  ?>

<?php
$this->widget('ext-coll.WYSIWYG_EDITOR.xheditor.XHeditor',array(
   // 'model'=>$model,
	'modelAttribute'=>'attribute',
    'config'=>array(
        'id'=>'xheditor_1',
        'tools'=>'mfull', // mini, simple, mfull, full or from XHeditor::$_tools, tool names are case sensitive
        'skin'=>'o2007blue', // default, nostyle, o2007blue, o2007silver, vista
        'width'=>'700px',
        'height'=>'100px',
       // 'loadCSS'=>XHtml::cssUrl('editor.css'),
        'upImgUrl'=>$this->createUrl('request/uploadFile'), // NB! Access restricted by IP        'upImgExt'=>'jpg,jpeg,gif,png',
    ),
));
?>

<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  ?>
<?php Yii::app()->sc->renderSourceBox(); ?>
</div>


<!------------------------------------------------------------------------------------------------------------------------------------------------->
<div class="myBox">
<p><b class="badge badge-inverse">With Model</b></p>

<?php Yii::app()->sc->setStart(__LINE__);  ?>

<?php
$model = new TblUserMysql;

$this->widget('ext-coll.WYSIWYG_EDITOR.xheditor.XHeditor',array(
	'model'=>$model,
	'modelAttribute'=>'username',
	'showModelAttributeValue'=>false, // defaults to true, displays the value of $modelInstance->attribute in the textarea
	'config'=>array(
		 'skin'=>'vista', // default, nostyle, o2007blue, o2007silver, vista
		'tools'=>'full', // mini, simple, mfull, full or from XHeditor::$_tools
		'width'=>'300',
		 'height'=>'100px',
	),
));
;
?>

<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  ?>
<?php Yii::app()->sc->renderSourceBox(); ?>
</div>