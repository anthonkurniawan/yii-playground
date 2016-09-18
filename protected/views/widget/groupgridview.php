<?php $this->layout='column2';?>

<?php
$this->pageTitle=Yii::app()->name . ' - Widget'; 
$this->breadcrumbs=array('groupgridview',);
?>

<?php $this->renderPartial('_menuGrid'); ?>

<b class="badge"> GroupGridView</b><br>

<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>

<style>
 /* grid border CUSTOM */
    .grid-view table.items th, .grid-view table.items td {
        border: 1px solid gray !important;
    } 
    /* disable selected for merged cells */     
    .grid-view td.merge {
       background: none repeat scroll 0 0 #F8F8F8; 
    }
</style>

<a href="http://groupgridview.demopage.ru" target="_blank">DEMO</a>

<!-------------------------- CONTENT ---------------------------------->
<?php
$dp = new CActiveDataProvider('products', array(
	'sort'=>array(
		/* 'attributes'=>array( 'catID', ),   *****MERGE SORT 1 ROW *****
		'defaultOrder' => 'catID',  */
		 'attributes' => array(   /****MERGE SORT 2 ROW *****/
			'catID' => array(
				'asc' => 'catID ASC, item ASC',
				'desc' => 'catID DESC, item ASC',
			)
		),
		'defaultOrder' => 'catID, item',  
	),
	'pagination' => array(
		'pagesize' => 10,
	),
)); 
?>

<?php
 $this->widget('ext.GRID.groupgridview_13.GroupGridView', array(
      'id' => 'grid1',
      'dataProvider' => $dp,
	 // 'filter'=>$dp,	//form filter/search
      //'mergeColumns' => array('catID'),  
	  'mergeColumns' => array('catID','item'), 
	  'htmlOptions'=>array('style'=>'width:700px',),
      'columns' => array(
         'proID', 'catID','item','price', 'supID', 'type','modelID','itemDesc','weight','createDate','modifiedDate', 
	  	  array(
			'class'=>'CButtonColumn',
			//'class' =>'CLinkColumn',
			//'class'=>'CCheckBoxColumn',
		  ),  
	   ),  
    ));
?>

<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
	
	<div class="tpanel left">
		<div class="toggle btn"><?php echo Yii::t('ui','View Code'); ?></div>
		<div class='scoll'><?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?></div>
	</div>
	<div class="tpanel left">
		<div class="toggle btn"><?php echo Yii::t('ui','Code Controller'); ?></div>
		<div class='scoll'><?php $this->render_script( array('widget/groupgridview') ); ?></div>
	</div>
	
<!------------------------------------------------- SAMPLE 2 ------------------------------------------------------->
<?php
 $this->widget('ext.GRID.groupgridview_13.GroupGridView', array(
	'id' => 'grid2',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	//'mergeColumns' => array('catID'),  
	'mergeColumns' => array('role','active'),  // KOLOM YG DI MERGE
	//'mergeType'=>'nested',	# - how merge is displayed:
											# simple: column values are merged independently (default)
											# nested: column values are merged if at least one value of nested columns changes (makes sense when several columns in $mergeColumns option, see #11462)
											# firstrow: column values are merged independently, but value is shown in first row of group and below cells just cleared (instead of rowspan)
	# extraRowExpression - string PHP expression or function that returns value displayed in extrarow. Can use $data and $totals inside.
	'extraRowColumns' => array('role'),  #array of columns for which every change of value will trigger extra row
	'extraRowPos' => 'above', #  position of extra row relative to group: above (default) | below
	'extraRowTotals' => function($data, $row, &$totals) {   #  function that is used to calc subtotals
		if(!isset($totals['sum_age'])) $totals['sum_age'] = 0;
		$totals['sum_age'] += $data['id'];
	},
	  'htmlOptions'=>array('style'=>'width:700px',),
      'columns' => array(
        'id',
		'username',
		'password',
		'email',
		'first_name',
		'role',
		'active',
	  	  array(
			'class'=>'CButtonColumn',
			//'class' =>'CLinkColumn',
			//'class'=>'CCheckBoxColumn',
		  ),  
	   ),  
    ));
?>