
<style> /*reset from bootstrap*/
.grid-view .filters input, .grid-view .filters select
{
  height: 15px;
  width: 80px;
}
</style>
<?php
/* @var $this LogsController */
/* @var $model Logs */

$this->breadcrumbs=array('Logs'=>array('index'), 'Manage',);

$this->menu=array(
	array('label'=>'List Logs', 'url'=>array('index')),
	array('label'=>'Create Logs', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('logs-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div class="txtHead">
<p>CDbCommand gagal menjalankan statementSQL: SQLSTATE[42S22]: 
Column not found: 1054 Unknown column 'date' in 'where clause'. The SQL statement executed was: 
SELECT COUNT(*) FROM `logs` `t` WHERE date BETWEEN :ycp0 AND :ycp1 
(D:\framework\db\CDbCommand.php:541)</p><pre>#0 D:\framework\db\CDbCommand.php(432): 
</div>

<h1>Manage Logs</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
<!------------------------ SELECT ROW ------------------------->
<script type="text/javascript">
	function selectRow(target_id) {  
		var id =$.fn.yiiGridView.getSelection(target_id);	   alert(id);	
	}
</script>

<!----------------------------------------------- CONTENT TABLE ----------------------------------------------------------->
<?php 
// this is the date picker
$dateisOn = $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                                    'model'=>$model,
                                    //'name' => 'stamp[date_first]',
									'attribute'=>'date_first',
                                    'language' => 'en',
                                    //'value' => $model->date_first,
                                    // additional javascript options for the date picker plugin
                                    'options'=>array(
                                        'showAnim'=>'fold',
                                        'dateFormat'=>'yy-mm-dd',
                                        'changeMonth' => 'true',
                                        'changeYear'=>'true',
                                        'constrainInput' => 'false',
                                    ),
                                    'htmlOptions'=>array( 'style'=>'height:20px;width:70px;', 'id'=>'event_date_first'),
// DONT FORGET TO ADD TRUE this will create the datepicker return as string
                                ),true) . ' To ' . 
					$this->widget('zii.widgets.jui.CJuiDatePicker', array(
                                    'model'=>$model,
                                    //'name' => 'stamp[date_last]',
									'attribute'=>'date_last',
                                    'language' => 'en',
                                    //'value' => $model->date_last,
                                    // additional javascript options for the date picker plugin
                                    'options'=>array(
                                        'showAnim'=>'fold',
                                        'dateFormat'=>'yy-mm-dd',
                                        'changeMonth' => 'true',
                                        'changeYear'=>'true',
                                        'constrainInput' => 'false',
                                    ),
                                    'htmlOptions'=>array( 'style'=>'height:20px;width:70px', 'id'=>'event_date_last'),
// DONT FORGET TO ADD TRUE this will create the datepicker return as string
                                ),true);

?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'logs-grid',
	'dataProvider'=>$model->search(),
	'selectionChanged'=>'selectRow',   //** ON CHANGE SELECT ROW TABLE
	'cssFile'=> Yii::app()->request->baseUrl.'/css/mygrid_custom/mygrid_skyblue.css', //** null (default) 
	'baseScriptUrl'=>null, 
	'filter'=>$model,
	'htmlOptions'=>array('style'=>'width:800px',),
	//'template'=>'{summary}{items}{pager}', /*option1 pager1 */
	'pager'=>array(   //custom footer <prev next>, defaul: ga perlu diset!!  /*option1 pager2*/
		//'header'=>'',
		'firstPageLabel'=>CHtml::image(Yii::app()->request->baseUrl.'/images/tableItem/page-first.gif'), //'&lt;&lt; (<)'
		'prevPageLabel'=>CHtml::image(Yii::app()->request->baseUrl.'/images/tableItem/page-prev.gif'), //CHtml::image(Yii::app()->request->baseUrl.'/images/tableItem/page-prev.gif'),
		'nextPageLabel'=>CHtml::image(Yii::app()->request->baseUrl.'/images/tableItem/page-next.gif'),  //'&gt;(>)'
		'lastPageLabel'=>CHtml::image(Yii::app()->request->baseUrl.'/images/tableItem/page-last.gif'),  //'&gt;&gt;(>>)'
		//'footer'=>'test',
		'cssFile'=>Yii::app()->request->baseUrl.'/css/mygrid_custom/mypager_skyblue_smoth_border.css', //** null (default)
		'maxButtonCount'=>'3',
		//'htmlOptions'=>''
	), 
	'columns'=>array(
		 array('name'=>'index', 'value'=>'$data->index','htmlOptions'=>array('width'=>'auto'),),
		 array('name'=>'id_user', 'value'=>'$data->id_user','htmlOptions'=>array('width'=>'auto'),),
		 array('name'=>'stamp', 'value'=>'$data->stamp','htmlOptions'=>array('width'=>'auto'),),
		
		array(
                'name'=>'stamp',
				'value'=>'$data->stamp', 'htmlOptions'=>array('width'=>'165px'),
                'filter'=>$dateisOn
        ), 

		array('name'=>'event', 'value'=>'$data->event','htmlOptions'=>array('width'=>'auto'),),
		array(
			'class'=>'CButtonColumn',
			//'class'=>'CCheckBoxColumn',
		),
	),
	'afterAjaxUpdate'=>"function(){
		jQuery('#event_date_first').datepicker(jQuery.extend({showMonthAfterYear:false}, jQuery.datepicker.regional['id'], {'showAnim':'fold','dateFormat':'yy-mm-dd','changeMonth':'true','showButtonPanel':'true','changeYear':'true','constrainInput':'false'}));
		
		jQuery('#event_date_last').datepicker(jQuery.extend({showMonthAfterYear:false}, jQuery.datepicker.regional['id'], {'showAnim':'fold','dateFormat':'yy-mm-dd','changeMonth':'true','showButtonPanel':'true','changeYear':'true','constrainInput':'false'}));
	}",
)); ?>
