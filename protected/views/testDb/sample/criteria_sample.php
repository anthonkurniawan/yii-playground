
<style>
.container{width:1100px;}
#content { font-size: 80%; }
.php-hl-main {font-size:90% }
pre{ margin: 0px; padding: 0px }
</style>

<?php 
$this->pageTitle='More DBcriteria Sample';
$this->breadcrumbs=array('Test DB'=>array('index'), 'Test Query'=>array('testQuery'), 'More DBcriteria Sample', );
?>

<!----------------------------------------------- #1 -------------------------------------------------------->
<a href="http://localhost/yiidoc/CDbCriteria.html" target="_blank"> CDbCriteria</a> <br><br>

<div class="view2">
<div class="left">
<b class="badge">1#. CDbCriteria with 1 Row Result </b>
<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
<?php //CODE -----------
$criteria = new CDbCriteria;
$criteria->condition='active=:active AND role=:role'; //** operator =,<,>
$criteria->params=array(':active'=>'1', ':role'=>'1');
$criteria->order = 't.id DESC'; //set order UNTUK MULTIPLE DATA ROW
$criteria->limit = 5;

$res_criteria = TblUserMysql::model()->find($criteria);
?>
	
<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>
	
<b class="txtHead2"> RESULT - </b> <b class="txtKet"> foreach ($res_criteria as $key=>$value) ) : </b><br>
<i class="txtKet">- echo $key : </i> <?php foreach ($res_criteria as $key=>$value) { echo $key.", &nbsp;"; } ?><br />
<i class="txtKet">- echo $value : </i> <?php foreach ($res_criteria as $key=>$value) { echo $value.", &nbsp;"; } ?><br /><br />

<div class="tpanel"> <!--- load model ------->
	<span class="toggle btn"><?php echo Yii::t('ui','Load Model(dump($res_criteria)'); ?></span>
	<div class="scroll2" style="font-size:9px"><?php dump($res_criteria); ?></div>
</div>
</div>

<div class="left">
<b class="txtHead2"> RESULT ON CGridView :</b> 
<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
<?php 
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'test_criteria',
	'dataProvider'=>$res_criteria->search(),
	'filter'=>$res_criteria,  // ga bisa
	'columns'=>array(
		'id','username','password','role','email',
		//array('class'=>'CButtonColumn',), //filter jg ga bisa
	),
	'htmlOptions'=>array('style'=>'width:500px;'),
)); 
?>

<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>
</div>
</div>


<!----------------------------------------------- #2 -------------------------------------------------------->
<div class="view2">
<b class="badge">2#. CDbCriteria with Multiple Row Result </b><br>

<div class="left">
<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
<?php //CODE -----------
$criteria2 = new CDbCriteria;
$criteria2->condition='active=:active AND role=:role'; //** operator =,<,>
$criteria2->params=array(':active'=>'1', ':role'=>'1');
//$criteria2->order = 't.id DESC'; //set order UNTUK MULTIPLE DATA ROW
$criteria2->limit = 5;
//$criteria2->compare('id','id');
//$criteria2->compare('id',TblUserMysql::STATUS_ACTIVE);
//$criteria2->compare('username','TblUserMysql'->username,true);
// dump($criteria2);

$res_criteria2 =  new CActiveDataProvider('TblUserMysql', array(
							'criteria'=>$criteria2,		
							'pagination'=>array(
								'pageSize'=>5,
								),
						));
?>

<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>
</div>

<div class="left">
<b class="txtHead2"> RESULT - </b><br>
 <b class="txtKet"> foreach ($res_criteria2 as $key=>$value) :</b>
<i class="txtKet">- echo $key $value: </i>
<?php //foreach ($res_criteria2 as $key=>$value) { echo "key : ". $key." value : "; dump($value); } ?><br />

<div class="tpanel"> <!--- print model ---->
	<span class="toggle btn"><?php echo Yii::t('ui','Load Model(dump($res_criteria2)'); ?></span>
	<div class="scroll2"><?php dump($res_criteria2); ?></div>
</div><br>

<b class="txtHead2"> RESULT ON CGridView :</b>
<?php 
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'test_criteria2',
	'dataProvider'=>$res_criteria2,
	'columns'=>array(
		'id','username','password','role','email',
	),
	'htmlOptions'=>array('style'=>'width:500px;'),
)); 
?>
</div>
</div>

<!------------------------- #TEST2 ----------------------------->
<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
<?php
$criteria1 = new CDbCriteria;
$criteria1->mergeWith(array(
	'join'=>'LEFT JOIN tbl_data tu ON tu.id = t.id',
    //'condition'=>'ug.group_id = 0 OR ug.group_id IS NULL',
));
//$criteria->with=array('tblData'); // with tidak bisa pada mysql
$result1=TblUserMysql::model()->findAll($criteria1);
//***$result1=TblUserMysql::model()->search(); ini sama dengan metode default

//$result=new CActiveDataProvider($this, array('criteria'=>$criteria,));
?>

<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>

<b>result1(from criteria1) :</b><br />
<?php foreach ($result1 as $key=>$value) { echo"key :".$key." value :".$value->username." ,&nbsp;";}?>

<div class="tpanel">
	<span class="toggle btn"><?php echo Yii::t('ui','Load Model(dump($model)'); ?></span>
	<div class="scroll2"><?php dump($result1); ?></div>
</div>
<br />

        