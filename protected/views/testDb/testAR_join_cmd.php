<?php 
$this->pageTitle='CDbCommand + CArrayDataProvider';
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
<b class="badge">Join with GridView ( CDbCommand + CArrayDataProvider)</b><BR />

<div class="left" style="width:600px">
<?php Yii::app()->sc->setStart(__LINE__);   ?> 
 
<?php	
/*
$rawData = Yii::app()->db->createCommand()
->select('*') 
->from('tbl_user_mysql t')   

#menambah query inner join($table, $conditions, $params=array())
->join('tbl_data t2', 't.id=t2.id')  
->join('logs t3', 't.id=t3.id_user') //left join logs as t3 on t.id=t3.id_user

 #more1 conditon ('id=:id1 or id=:id2', array(':id1'=>1, ':id2'=>2))
->where('active=:active', array(':active'=>1)) 

->queryAll(); 
*/
		 
/**---------------------- OR ----------------------**/
$sql= "SELECT *  FROM tbl_user_mysql as t  
			 LEFT JOIN tbl_data as t2 ON t.id=t2.id
			 LEFT JOIN tbl_pic as t3 ON t2.propic_id=t3.pic_id
			/* LEFT JOIN Logs as t4 ON t.id=t4.id_user */
			";
$command = Yii::app()->db->createCommand($sql);
$rawData = $command->queryAll();

$dataProvider=new CArrayDataProvider($rawData, array(
	'sort'=>array(
		'attributes'=>array(
			'id', 'username', 'email',
		),
	),
	'pagination'=>array(
		'pageSize'=>5,
	),
));
?>

<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__)); ?>
<?php Yii::app()->sc->renderSourceBox(); ?>
</div>

<div class="left" style="width:400px">
	<b class="txtHead"> Result :</b><br>
	<code>dump($rawData) ;</code><br> 
	<div class="scroll2" style="width: 350px"> 
		<?php dump($rawData) ; ?>
	</div>
</div>

<div class="clear"></div>

<!------------------------------------------------------------------------------------------------------------------------------------------>
<b class="badge"> THEN USE GRID TABLE </b>

 <?php Yii::app()->sc->setStart(__LINE__);   ?> 
<?php 
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'ar1',
	'dataProvider'=>$dataProvider,
	//'dataProvider'=>$model->search_join(),
	//'filter'=>$dataProvider ,  // ga bisa "CArrayDataProvider ga punya getValidators"
															//harus define "scenario" sperti "new TblUserMysql('search')"
	'columns'=>array(	
		'id','username','password','role',
		//array( 'name'=>'TblDatas(ARRAY)', 'type'=>'raw', 'value'=>'print_r($data->TblDatas->attributes)',),
		array('name'=>'TblDatas2-ket', 'type'=>'raw', 'value'=>'$data["ket"]',),
		array('name'=>'TblPics-filename', 'type'=>'raw', 'value'=>'$data["filename_ori"]',),
		//array('name'=>'User Logs', 'type'=>'raw', 'value'=>'$data["event"]',),	
		//array('name'=>'User Logs', 'type'=>'raw','value'=>array($this,'userLogs'),),	//VIA CONTROLLER
		//array('name'=> 'PicsComment-comment', 'type'=>'raw', 'value'=>'print_r($data->PicsComment)',),// test ARRAY
		//**array('name'=> 'PicsComment-comment', 'type'=>'raw','value'=>'$data->PicsComment["comment"]',),
		//array('name'=> 'PicsComment-comment', 'type'=>'raw','value'=>'TbluserMysql::model()->test($data)',),
		//**array('name'=>'gid-User', 'type'=>'raw','value'=>array($this,'gridUser'),), //call the method 'renderAddress' from the model
		array(
			'class'=>'CButtonColumn',
			'header'=>'Action',
			'template'=>'{update},{delete}',
			//#SNTAX : public $updateButtonUrl='Yii::app()->controller->createUrl("update",array("id"=>$data->primaryKey))';
			'updateButtonUrl'=>'$this->grid->controller->createUrl("testDb/update/id/$data[id]")',
			//'updateButtonUrl'=>'$this->grid->controller->createUrl("update",array("id"=>$data["id"]))',
			'deleteButtonUrl'=>'$this->grid->controller->createUrl("/site/delete/id/$data[id]")',
		),
	),
)); 
?>

<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__)); ?>
<?php Yii::app()->sc->renderSourceBox(); ?>

</div>

<div class="view2"> 
	<b> RESULT <code>$dataProvider</code> :<br> 
	<div class="scroll"><?php dump($dataProvider); ?></div>
</div>



