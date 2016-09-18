<?php 
$this->pageTitle='CSqlDataProvider';
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
<b class="txtTitle">Join with GridView (CSqlDataProvider)</b><BR />

<div class="left" style="width:600px">
 <?php Yii::app()->sc->setStart(__LINE__);   ?> 
 
<?php 											  													  
$count=Yii::app()->db->createCommand('SELECT COUNT(*) FROM tbl_user_mysql')->queryScalar();  

$sql='SELECT * FROM tbl_user_mysql';
$dataProvider=new CSqlDataProvider($sql, array(
    'totalItemCount'=>$count,
    'sort'=>array(
        'attributes'=>array(
             'id', 'username', 'email',
        ),
    ),
    'pagination'=>array(
        'pageSize'=>5,
    ),
));

$dataArr = $dataProvider->getData();    //will return a list of arrays.
?>

<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__)); ?>
<?php Yii::app()->sc->renderSourceBox(); ?>

<code>echo "Count :".$count;</code> <?php echo "Count :".$count; ?> <br>

</div>

<div class="left" style="width:400px">
	<b class="txtHead"> Result :</b><br> <code>dump($rawData) ;</code><br> 
	<div class="scroll2" style="width: 400px; height:300px"> 
		<?php dump($dataArr) ; ?>
	</div>
</div>
<div class="clear"></div>


 <?php Yii::app()->sc->setStart(__LINE__);   ?> 
<?php 
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'ar1',
	'dataProvider'=>$dataProvider,
	//'filter'=>$dataProvider ,  // ga bisa "getValidators" harus define "scenario" sperti "new TblUserMysql('search')"
	'columns'=>array(	//contoh: dengan custom
		'id','username','password','email',
		//array( 'name'=>'TblDatas(ARRAY)', 'type'=>'raw', 'value'=>'print_r($data->TblDatas->attributes)',),
		#array('name'=>'TblDatas2-ket', 'type'=>'raw', 'value'=>'$data->TblDatas["ket"]',),
		#array('name'=>'TblPics-title', 'type'=>'raw', 'value'=>'$data->TblPics["title"]',),
		#array('name'=>'User Logs', 'type'=>'raw', 'value'=>'$data->Logs["event"]',),	
		//array('name'=>'User Logs', 'type'=>'raw', 'value'=>'$data->Logs["event"]',),	
		//array('name'=>'User Logs', 'type'=>'raw','value'=>array($this,'userLogs'),),	
		//array('name'=> 'PicsComment-comment', 'type'=>'raw', 'value'=>'print_r($data->PicsComment)',),// test ARRAY
		#array('name'=> 'PicsComment-comment', 'type'=>'raw','value'=>'$data->PicsComment["comment"]',),
		//array('name'=> 'PicsComment-comment', 'type'=>'raw','value'=>'TbluserMysql::model()->test($data)',),
		#array('name'=>'gid-User', 'type'=>'raw','value'=>array($this,'gridUser'),), //call the method 'renderAddress' from the model
		#array('class'=>'CButtonColumn',), //filter jg ga bisa
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