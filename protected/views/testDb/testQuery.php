<?php $this->layout='column1';?> 
<?php $this->pageTitle=Yii::app()->name . ' - Sample Query'; ?>
<?php $this->breadcrumbs=array('Test DB'=>array('index'),'Test Query',);?>
<style>.container{width:1100px;} </style>

<style>
#myAccordion {
	padding: 10px;
	/*width: 350px;*/
	/*height: 600px; */
}
</style>
	
<?php
$this->widget('zii.widgets.jui.CJuiAccordion',array(
	'id'=>'myAccordion',
    'panels'=>array(
		//'panel 0'=>'content for panel 1',
		# panel 3 contains the content rendered by a partial view
		'find($condition,$params)'=>$this->renderPartial('sample/_find',null,true),
		//'<span>find($condition,$params)</span>'=>array('ajax'=>array('','view'=>'_find'), ),
		'findAll(mixed $condition="", array $params=array ( ))'=>$this->renderPartial('sample/_findAll',null,true),
		'findByPk(), findByAttributes(), findBySql(), count(), exists(), populateRecord()'=>$this->renderPartial('sample/_find_other',null,true),
		'CDbCriteria'=>$this->renderPartial('sample/_CdbCriteria',null,true),
		'CActiveDataProvider'=>$this->renderPartial('sample/_CActiveDataProvider',null,true),
		'createCommand'=>$this->renderPartial('sample/_createCommand',null,true),
		'ListData with find() and findAll()'=>$this->renderPartial('sample/_listData',null,true),
		'Transaction'=>$this->renderPartial('sample/_transaction',null,true),
		'Compare CActiveRecord model'=>$this->renderPartial('sample/class_aktif_record',null,true),
		'MYCActiveRecord function'=>$this->renderPartial('sample/_MYCActiveRecord',null,true),
    ),
    // additional javascript options for the accordion plugin
    'options'=>array(
        'animated'=>'bounceslide',
		'heightStyle'=> 'content',		//auto height
		//'heightStyle'=>'fill',
		//'autoHeight'=>false,
		//'style'=>array('min-height'=>'100px', 'max-height'=>'900px'),
		// 'collapsible'=>true,
        // 'selected'=>5,
    ),
    'htmlOptions'=>array(
       // 'style'=>'width:500px; overflow:auto'
    ),
));
?>
<div class="clear"></div>

<!--
<script>
	$(function() {
		$( "#accordion" ).accordion({
			heightStyle: "content"
		});
	});
</script>
-->


