<style> .container{ width:1100px } </style>
<?php //dump(Yii::getPathOfAlias('bootstrap') ); ?>
<?php //Yii::app()->clientScript->registerPackage('bootstrap'); ?>
<?php //Yii::app()->getClientScript()->scriptMap=array('jquery-ui-bootstrap.css'=>false);  ?>

<div class="tpanel"> <!--- load model ------->
<b class="toggle txtHead"><?php echo Yii::t('ui','View getClientScript '); ?></b>
<div class="scroll txtSmall"> <?php dump(Yii::app()->getClientScript() ); ?></div>
</div>


<?php
$this->breadcrumbs=array('Users'=>array('index'),'Manage',);

$this->menu=array(
	array('label'=>'List user', 'url'=>array('index')),
	array('label'=>'List user(select query)', 'url'=>array('ListUser')),
	array('label'=>'Create user', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){         
	$('.search-form').toggle();
	return false;
});											
$('.search-form form').submit(function(){		 //alert( $(this).serialize());  //--> $(this) = $('.search-form form')
	$.fn.yiiGridView.update('user-grid', {   
		data: $(this).serialize()  //--->  string text( r=userMysql%2Fadmin&TblUserMysql%5Bid%5D=1&.....)
		//data:'r=userMysql/admin&TblUserMysql%5Bid%5D=1'  //ajax=user-grid2id=2r=userMysql/admin
		//data:'TblUserMysql[id]=1'
	});
	return false;
});
");
?>

<b class="txt>CGridView Default sample</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<script type="text/javascript">
	function selectRow(target_id) {  
		var id =$.fn.yiiGridView.getSelection(target_id);	   alert(id);	
	}
		
</script>

<!-------------------------------------------------------- BOOTSTRAP ----------------------------------- ----------------------------->
<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php 
$this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'user-grid',
	'type'=>'bordered',  #striped, bordered, condensed' , atau mixed
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'username',
		'password',
		'email',
		'first_name',
		'role',
		'active',
		array(
			'htmlOptions' => array('nowrap'=>'nowrap'),
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'viewButtonUrl'=>null,
			'updateButtonUrl'=>null,
			'deleteButtonUrl'=>null,
		),
	),
)); 
?>
<!------------------------------------------------------------ YII-BOOTSTRAP TABLE--------------------------------------------------------------->
<?php
    // $this->widget('bootstrap.widgets.TbExtendedGridView', array(
		// 'filter'=>$model,
		// 'type'=>'striped bordered',
		// 'dataProvider'=>$model->search(),
		// 'template' => "{items}\n{extendedSummary}",
		// #'columns' => $gridColumns,
		// 'columns'=>array(
			// 'id',
			// 'username',
			// 'password',
			// 'email',
			// 'first_name',
			// 'role',
			// 'active',
		// ),
		// 'chartOptions' => array(
			// 'data' => array(
				// 'series' => array(
					// array(
						// 'name' => 'Hours worked',
						// 'attribute' => 'hours'
					// )
				// )
			// ),
			// 'config' => array(
				// 'chart'=>array(
					// 'width'=>800
				// )
			// )
		// ),
    // ));
?>

<!------------------------------------------------------------ PRINT ARRAY RESULT ----------------------------------- ----------------------------->
<div class="tpanel2"> <!--- load model ------->
<b class="toggle2 txtHead"><?php echo Yii::t('ui','View Array Result'); ?></b>
<pre class="scroll txtSmall"> <?php print_r($model->search()); ?></pre>
</div>

<div class="view txtSmall">
<ul><li>View file: <tt><?php echo __FILE__; ?></tt></li>
<li>Layout file: <tt><?php echo $this->getLayoutFile('main'); ?></tt></li></ul>
</div>

<script>
// show and hide
$('.tpanel2 .toggle2').click(function() {
	$(this).next().slideToggle()
	return false;
})
.next().hide(); 
</script>
<!-------------------------------------------------------- CODE VIEW ----------------------------------- ----------------------------->
<div class="tpanel"> <!--- load model ------->
<b class="toggle txtHead"><?php echo Yii::t('ui','View Code'); ?></b>
<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP'));  ?> 
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-grid',
	'dataProvider'=>$model->search(),
	'selectionChanged'=>'selectRow',   //** ON CHANGE SELECT ROW TABLE
	'filter'=>$model,	//form filter/search
	'columns'=>array(
		'id',
		'username',
		'password',
		'email',
		'first_name',
		'role',
		'active',
		//'id:html'=>array('name'=>'id', 'type'=>'raw', 'value'=>'CHtml::checkBox("id",$data->id,array("id"=>"id_".$data->id))'),
		array(
			'class'=>'CButtonColumn',
			'class'=>'CCheckBoxColumn',

		),
	),
)); 
<?php $this->endWidget(); ?>
</div>
