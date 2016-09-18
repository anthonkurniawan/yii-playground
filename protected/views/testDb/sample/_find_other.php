
<?php echo CHtml::link('see activeRecord', array('testDb/find', 'view'=>'find'), array('target'=>'_blank')); ?> | 

<div class="ket">
<ul>
<li><b class="txtHead"> findByAttributes($attributes,$condition='',$params=array())</b></li>
<div class="ket">  Finds single active records that have the specified attribute values. </div>

<code>User::model()->findByAttributes(array('first_name'=>'Paul', 'last_name'=>'Smith'));</code> <br>

<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
<?php 
	$string ='role=1 AND active=1 order by id DESC';
	//$findAttr=TblUserMysql::model()->findByAttributes('username',$string);  print_r($findAttr);
	$findAttr=TblUserMysql::model()->findByAttributes(array('username'=>'admin'),'role=1');  //print_r($findAttr);
?>
<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>

<li><b class="txtHead2">$findAttr->username : </b><?php echo $findAttr->username;?></li>
<li><b class="txtHead2">foreach ($findAttr as $key=>$value) echo $key->$value :</b><?php  foreach ($findAttr as $key=>$value) { echo $value.", &nbsp;"; } ?></li>
</ul>

</div>

<div class="ket">
<ul>
<li><b class="txtHead"> findAllByAttributes($attributes,$condition='',$params=array())</b>
<div class="ket">  Finds all active records that have the specified attribute values. </div>
<code>User::model()->findAllByAttributes(array('first_name'=>'Paul', 'last_name'=>'Smith'));</code>
</ul>
</div>

<div class="ket">
<ul>
<li><b class="txtHead">public function findByPk($pk,$condition='',$params=array())</b>
<div class="ket"> Finds a single active record with the specified primary key. </div>

<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
<?php 
	$find=TblUserMysql::model()->findByPk('1'); 
?>
<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>

<li><b class="txtHead2">$find->username : </b><?php echo $find->username;?></li>
<li><b class="txtHead2">foreach ($find as $key=>$value) echo $key->$value :</b><?php  foreach ($find as $key=>$value) { echo $value.", &nbsp;"; } ?></li>
</ul>
</div>

<div class="ket">
<ul>
<li><b class="txtHead">public function findAllByPk($pk,$condition='',$params=array())</b>
<div class="ket"> Finds all active records with the specified primary keys. </div>

<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
<?php 
$find=TblUserMysql::model()->findAllByPk('1'); 
?>
<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>

<li><b class="txtHead2">print_r($find[0]['attributes']['username']) : </b><?php print_r($find[0]['attributes']['username']);?></li>
<li><b class="txtHead2">print_r($value->attributes); :</b><?php  foreach ($find as $key=>$value) { print_r($value->attributes); } ?></li>
</ul>
</div>

<div class="ket">
<ul>
<li><b class="txtHead">findBySql($sql,$params=array())</b>
<div class="ket"> Finds a single active record with the specified SQL statement. </div>

<code>$findSql=TblUserMysql::model()->findBysql($string,'role=1');</code><br>
sample:
<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
<?php 
$findSql=TblUserMysql::model()->findBysql("select username from tbl_user_mysql"); 
?>
<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>

<li><b class="txtHead2">$findSql->username : </b><?php echo $findSql->username;?></li>
<li><b class="txtHead2">foreach ($findSql as $key=>$value) echo $key->$value :</b><?php  foreach ($findSql as $key=>$value) { echo $value.", &nbsp;"; } ?></li>
</ul>
</div>

<div class="ket">
<ul>
<li><b class="txtHead">count($condition='',$params=array())</b>
<div class="ket"> Finds the number of rows satisfying the specified query condition. </div>
<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
<?php
//countByAttributes($attributes,$condition='',$params=array())
//countBySql($sql,$params=array())
 $count=TblUserMysql::model()->count();
 ?> 
<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>

<li><b class="txtHead2">$count : </b><?php echo $count?></li>
</ul>
</div>

<div class="ket">
<ul>
<li><b class="txtHead">exists($condition='',$params=array())</b>
<div class="ket"> Checks whether there is row satisfying the specified condition. </div>

<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
<?php 
$exist=TblUserMysql::model()->exists();
?> 
<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>

<li><b class="txtHead2">$exits : </b><?php echo $exist?></li>
</ul>
</div>

<div class="ket">
<ul>
<li><b class="txtHead"> populateRecord($attributes,$callAfterFind=true)</b>
<div class="ket"> Creates an active record with the given attributes. </div>
<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
<?php 
$populate=TblUserMysql::model()->populateRecord(array('id'=>'1'));
 ?> 
<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>

<li><b class="txtHead2">foreach ($findSql as $key=>$value) echo $key->$value :</b><?php  foreach ($populate as $key=>$value) { echo $value.", &nbsp;"; } ?></li>
</ul>
</div>