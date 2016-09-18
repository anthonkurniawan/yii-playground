<?php 
$this->pageTitle='CActiveDataProvider + CDbCriteria';
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
<b class="txtHead">Join with GridView (CActiveDataProvider + CDbCriteria )</b><BR />
 <?php Yii::app()->sc->setStart(__LINE__);   ?> 
<?php
$criteria=new CDbCriteria;
//$criteria->compare('t.id',$this->id);
//$criteria->compare( 'propic_id', $this->propic_id, true );	
		
//$criteria->select = 'tu.email, t.username';
//$criteria->select ='*';
//$criteria->select ='t.id, t.username,t.password, t.role, Logs.event';
$criteria->condition = 't.role=1 AND t.active=1';	
/*
$criteria->mergeWith(array(
	 'join'=>'LEFT JOIN Logs AS t3 ON t.id = t3.id_user',  //utk dapetin row column redudant sesuai dgn index logs
	 //'condition'=>'ug.group_id = 0 OR ug.group_id IS NULL',
 ));*/
		 
$criteria->with = array('Logs');   //tanpa di set juga bisa asc/desc
$criteria->together = true; //without this you wont be able to search the second table's data
		
$ar1 = new CActiveDataProvider('TblUserMysql', array(
			'criteria'=>$criteria,
		));
?>
<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__)); ?>
<?php Yii::app()->sc->renderSourceBox(); ?>


<b class="txtHead">Result : </b><br>
<b class="txtHead2">- echo $key :</b> </i> <?php foreach ($ar1 as $key=>$value) echo $key.", &nbsp"; ?><br />
<b class="txtHead2">$ar1->getCriteria() :</b> <?php $select= $ar1->getCriteria(); print_r($select);?>

 <?php Yii::app()->sc->setStart(__LINE__);   ?> 
<?php 
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'ar1',
	//'dataProvider'=>$dataProvider,
	'dataProvider'=>$ar1,
	//'filter'=>$dataProvider ,  // ga bisa "getValidators" harus define "scenario" sperti "new TblUserMysql('search')"
	'columns'=>array(	//contoh: dengan custom
		'id','username','password','role',
		array( 'name'=>'TblDatas(ARRAY)', 'type'=>'raw', 'value'=>'print_r($data->TblDatas->attributes)',),
		array('name'=>'TblDatas2-ket', 'type'=>'raw', 'value'=>'$data->TblDatas->attributes["ket"]',),
		array('name'=>'TblPics-title', 'type'=>'raw', 'value'=>'$data->TblPics->title',),
		//**array('name'=>'User Logs', 'type'=>'raw', 'value'=>'print_r($data->Logs)',),	
		//array('name'=>'User Logs', 'type'=>'raw', 'value'=>'$data->Logs["event"]',),	
		//array('name'=>'User Logs', 'type'=>'raw','value'=>array($this,'userLogs'),),	
		//array('name'=> 'PicsComment-comment', 'type'=>'raw', 'value'=>'print_r($data->PicsComment)',),// test ARRAY
		//array('name'=> 'PicsComment-comment', 'type'=>'raw','value'=>'$data->PicsComment["comment"]',),
		//array('name'=> 'PicsComment-comment', 'type'=>'raw','value'=>'TbluserMysql::model()->test($data)',),
		array('name'=>'gid-User', 'type'=>'raw','value'=>array($this,'gridUser'),), //call the method 'renderAddress' from the model
		array('class'=>'CButtonColumn',), //filter jg ga bisa
	),
	//'htmlOptions'=>array('style'=>'width:700px;'),
)); 
?>
<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__)); ?>
<?php Yii::app()->sc->renderSourceBox(); ?>

</ul>
</div>

<div class="view2">
	<div class="scroll"><?php dump($ar1); ?></div>
</div>
