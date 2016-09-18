<?php 
$this->pageTitle="CGrid Resize";
$this->breadcrumbs=array(
	'widget'=>array('index'),
	'gridResize',
);
?>
<style>
.grid-view .filters input{ width:auto; } 
.container{ width: 1000px; }
</style>


<b class="txtTitle">colResizable sample</b><br>
<a href="http://quocity.com/colresizable/" target="_blank" class="tooltip" title="test">Dokumentasi</a> |
<a href="http://localhost/HTDOCS/testing/JQUERY_TESTER/colResizable-1.3/demo1/demo.html" target="_blank">demo</a> |
<a href="http://localhost/HTDOCS/testing/JQUERY_TESTER/colResizable-1.3/demo1/test.html" target="_blank">demo with input column</a> 
<br><br>

<b class="txtHead">CGridView harus di modif utk bisa resize column filter "table" (default ada dalam "thead") ->rubah ke "Tbody"  atau bisa tanpa merubah tapi di letakan dalam "Tfooter" </b><p>


<!-- Resize Script-->
<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>

<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/colResizable-1.3.min.js'); ?>
<script type="text/javascript">
	$(function(){	
		$("table").colResizable();
		// $("table").colResizable({
			// //liveDrag:true, 
			// // gripInnerHtml:"<div class='grip'></div>", 
			// // draggingClass:"dragging", 
			// // onResize:onSampleResized
		// });
	});	
</script>

<div class="grid-view">
<table class="items">
	<thead>
		<tr> <th>header</th> <th>header</th> </tr>
	</thead>
	<tbody>
		<tr class='filters'> <td><input name="TblUserMysql[id]" type="text" /></td> <td><input name="TblUserMysql[id]" type="text" /></td> </tr>			
		<tr> <td>cell</td> <td>cell</td> </tr>			
		<tr> <td>cell</td> <td>cell</td> </tr>		
	</tbody>
 </table>
 </div>
 
	<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>

	<div class="tpanel left">
		<div class="toggle btn"><?php echo Yii::t('ui','View code'); ?></div>
		<div class='scroll'><?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?></div>
	</div>
	
	<div class="clear"></div>
<!------------------------------------------ SAMPLE WITH CGRIDVIEW  YII -------------------------------------------->	
 <b class="txtTitle">CgridView with colResizable</b>

<?php 
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-grid',
	'dataProvider'=>$model->search_join(),	
	'filter'=>$model,
	'filterPosition'=>'header',	//header, body, footer
	//'htmlOptions'=>array('style'=>'width:900px; overflow:auto'),
	'columns'=>array(
		//Kolom harus ditentukan dalam format "Name:Type:Label", dengan "Type" dan "Label" bersifat opsional. 
		'id','username', 'password', 'email', 'TblDatas.ket',	//!!BISA DENGAN CARA GINI
		array(
			'header'=>'Action',
			'template'=>'{view}{delete}', 
			'class'=>'CButtonColumn',
			//'class'=>'CCheckBoxColumn',
			'htmlOptions'=>array('style'=>'width:100px',),
		),
	),
)); 
?>

<!------------------------------------------- SEARCH FORM ------------------------------------------------->
<?php 
Yii::app()->clientScript->registerScript('search', "
	$('.search-button').click(function(){
		$('.search-form').toggle();
		return false;
	});
	$('.search-form form').submit(function(){
		$.fn.yiiGridView.update('user-grid', {      //sesuikan id nya denga id gridview
			data: $(this).serialize()
		});
	return false;
	});
");		
?>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>

<div class="search-form" style="display:none">
	<?php $this->renderPartial('partial_file/_search',array(
		'model'=>$model,		//**lempar params model ke 'data_view/_search' **/
	)); ?>
</div>

