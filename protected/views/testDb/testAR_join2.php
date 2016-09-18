<?php 
$this->pageTitle='CActiveDataProvider only';
$this->breadcrumbs=array('Test DB'=>array('index'),'Data Access Object (DAO)',);
?>

<style>
.container{width:1100px;}
#content { font-size: 80%; }
.php-hl-main {font-size:90% }
</style>

<?php echo CHtml::link('GRID(CActiveDataProvider only)', array('testDb/testAR_join2', 'view'=>'testAR_join2'), array('target'=>'_blank')); ?> |
<?php echo CHtml::link('GRID(CActiveDataProvider + CDbCriteria)', array('testDb/testAR_join', 'view'=>'testAR_join'), array('target'=>'_blank')); ?> |
<?php echo CHtml::link('GRID(CDbCommand + CArrayDataProvider)', array('TestDb/testAR_join_cmd'), array('target'=>'_blank')); ?> |
<?php echo CHtml::link('GRID(CSqlDataProvider)', array('testDb/testAR_Csql', 'view'=>'testAR_Csql'), array('target'=>'_blank')); ?> 

<div class="view2">
<b class="txtHead">Join with GridView (CActiveDataProvider only)</b><BR />

<div class="left" style="width:700px">
<?php Yii::app()->sc->setStart(__LINE__);   ?> 
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
$dataProvider=new CActiveDataProvider('TblUserMysql', array(
    'criteria'=>array(
		//'condition'=>'t.role=1 AND t.active=1',	
		'order'=>'t.id DESC',
		'limit'=>10,
        //'with'=>array('TblDatas'), // with tidak bisa pada mysql
		//'together'=>true,
		//'join'=>'LEFT JOIN Logs AS t3 ON t.id = t3.id_user',  
        //'join'=>'JOIN tbl_data AS tu ON ( t.id = tu.id ) ',	
		//'join'=>'LEFT JOIN tbl_pic_comment AS t2 ON t.id = t2.id ',	
    ),
	'countCriteria'=>array(
		'condition'=>'role=0',   //see on count hasil
		// 'order' and 'with' clauses have no meaning for the count query
    ),
    'pagination'=>array(  
        'pageSize'=>4,
    ),
));  
?>
<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__)); ?>
<?php Yii::app()->sc->renderSourceBox(); ?>

<?php Yii::app()->sc->setStart(__LINE__);   ?> 
<?php 
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'ar1',
	'dataProvider'=>$dataProvider,
	//'filter'=>$dataProvider ,  // ga bisa "getValidators" harus define "scenario" sperti "new TblUserMysql('search')"
	'columns'=>array(	//contoh: dengan custom
		'id','username','password','role',
		//array( 'name'=>'TblDatas(ARRAY)', 'type'=>'raw', 'value'=>'print_r($data->TblDatas->attributes)',),
		array('name'=>'TblDatas2-ket', 'type'=>'raw', 'value'=>'$data->TblDatas["ket"]',),
		array('name'=>'TblPics-title', 'type'=>'raw', 'value'=>'$data->TblPics["title"]',),
		array('name'=>'User Logs', 'type'=>'raw', 'value'=>'$data->Logs["event"]',),	
		//array('name'=>'User Logs', 'type'=>'raw','value'=>array($this,'userLogs'),),	
		//array('name'=> 'PicsComment-comment', 'type'=>'raw', 'value'=>'print_r($data->PicsComment)',),// test ARRAY
		array('name'=> 'PicsComment-comment', 'type'=>'raw','value'=>'$data->PicsComment["comment"]',),
		//array('name'=> 'PicsComment-comment', 'type'=>'raw','value'=>'TbluserMysql::model()->test($data)',),
		array('name'=>'gid-User', 'type'=>'raw','value'=>array($this,'gridUser'),), //call the method 'renderAddress' from the model
		array('class'=>'CButtonColumn',), //filter jg ga bisa
	),
	'htmlOptions'=>array('style'=>'width:700px;'),
)); 
?>
<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__)); ?>
</div>

<div class="left">
<b class="txtHead">Result :</b> <br>
<b class="txtHead">echo $key :</b> </i> <?php foreach ($dataProvider as $key=>$value) echo $key.", &nbsp"; ?><br />
<b class="txtHead">$ar1->getCriteria() :</b><br> <?php $select= $dataProvider->getCriteria(); dump($select);?>
</div>

</div>


<div class="view2">
	<div class="scroll2"><?php dump($dataProvider); ?></div>
</div>

<?php Yii::app()->sc->renderSourceBox(); ?>