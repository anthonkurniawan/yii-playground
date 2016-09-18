<?php $this->layout='column1';?> 
<?php $this->pageTitle='find()'; ?>
<?php $this->breadcrumbs=array('Test DB'=>array('index'),'find()',);?>

<?php echo CHtml::link('findAll()', array('testDb/findAll', 'view'=>'_findAll'), array('target'=>'_blank')); ?> | 
<?php echo CHtml::link('findByPk(), findByAttributes(), findBySql(), count(), exists(), populateRecord()', array('testDb/find', 'view'=>'_find_other'), array('target'=>'_blank')); ?><br><br>

<!-------------------- #FIND() 1 CONDITION --------------------------->
<div class="ket">
	<ul>
	<li class="txtHead2"> Finds a single active record with the specified condition.</li>
	<li class="txtHead2"> @param mixed $condition query condition or criteria.</li>
	<li class="txtHead2"> If a string, it is treated as query condition (the WHERE clause);</li>
	<li class="txtHead2"> If an array, it is treated as the initial values for constructing a {@link CDbCriteria} object;</li>
	<li class="txtHead2"> Otherwise, it should be an instance of {@link CDbCriteria}.</li>
	<li class="txtHead2"> @param array $params parameters to be bound to an SQL statement.</li>
	<li class="txtHead2"> This is only used when the first parameter is a string (query condition).</li>
	<li class="txtHead2"> In other cases, please use {@link CDbCriteria::params} to set parameters.</li>
	<li class="txtHead2"> @return CActiveRecord the record found. Null if no record is found.</li><br />
	
	<b>Snytax :</b><code> find( mixed $condition='', array $params=array ( ) ) </code><br />
	<li><b class="txtHead">#1. Sample @param "string" condition</b>
  	<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
	<?php 
		$string ='role=1 AND active=1 order by id DESC';
		$find=TblUserMysql::model()->find($string);
	?>
	<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
	<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>

	<li><b class="txtHead2">$find->username : </b><?php echo $find->username;?></li>
	<li><b class="txtHead2">foreach ($find as $key=>$value) echo $key :</b><?php foreach ($find as $key=>$value) { echo $key.", &nbsp;"; } ?></li>
	<li><b class="txtHead2">foreach ($find as $key=>$value) echo $key->$value :</b><?php  foreach ($find as $key=>$value) { echo $value.", &nbsp;"; } ?></li>		
	<hr>
	
	<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
	<?php 
	$find=TblUserMysql::model()->find('role=1 AND active=1'); 
	?>   
	<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
	<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>
				
	<li><b class="txtHead2">- $find->username : </b><?php echo $find->username;?></li>
	<li><b class="txtHead2">- foreach ($find as $key=>$value) echo $key :</b><?php  foreach ($find as $key=>$value) { echo $key.", &nbsp;"; } ?></li>
	<li><b class="txtHead2">- foreach ($find as $key=>$value) echo $key->$value :</b><?php  foreach ($find as $key=>$value) { echo $value.", &nbsp;"; } ?></li>
  </ul>
</div>


<div class="ket">
	<ul>
	<li><b class="txtHead">#2. Sample @param "ARRAY" condition</b>

	<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
	<?php 
		//$user1 = TblUserMysql::model()->find('LOWER(username)=?',array(strtolower('admin')));
		$criteria =array('condition'=>'role=0','order'=>'id');
		$find2 = TblUserMysql::model()->find($criteria);
	?>
	<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
	<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>
	
	<B>RESULT :</B><BR>
	<li><b class="txtHead2">$find2->username : </b><?php echo $find2->username;?></li>
	<li><b class="txtHead2">foreach ($find2 as $key=>$value) echo $key :</b><?php foreach($find2 as $key=>$value) {echo $key.", &nbsp;"; } ?></li>
	<li><b class="txtHead2">foreach ($find2 as $key=>$value) echo $key->$value :</b><?php  foreach ($find2 as $key=>$value) { echo $value.", &nbsp;"; } ?></li>
  </ul>
  
	<ul>
	<li><b class="txtHead">#Other sample</b>
	<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
	<?php
	$criteria=array(
		'select'=>'username',
		//'condition'=>'username LIKE :keyword',
		'condition'=>'role =:role AND active =:active' ,
		'order'=>'id DESC',
		'limit'=>5,
		'params'=>array(':role'=>'1',':active'=>'1')
	); 
	$find=TblUserMysql::model()->find($criteria); 
	?>
	<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
	<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>
	<li><b class="txtHead2">foreach ($find as $key=>$value) echo $key->$value :</b><?php  foreach ($find as $key=>$value) { echo $value.", &nbsp;"; } ?></li>	
	</ul>
</div>

<!----------------------------------------------------------------------------------------------------------->
<div class="ket">
<ul>
<li><b class="txtHead">#4. Sample with mixed "string" and "array" condition</b>
<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP'));  ?> 
$criteria =array(':role'=>'1',':active'=>'1');
$find=TblUserMysql::model()->find('role=:role AND active=:active', $criteria);
//----------------------------- OR --------------------------------//
TblUserMysql::model()->findAll('role=? AND active=?', array('1', '1'));
<?php $this->endWidget(); ?> </li><!--print code-->

<li><b class="txtHead">#Other sample</b></li>
	<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
	<?php
	$user1 = TblUserMysql::model()->find('LOWER(username)=?',array(strtolower('admin')));
	foreach ($user1 as $key=>$value) { echo "RESULT : " . $value.", \n"; }
	?>
	<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
	<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>

	<i class="txtKet">-- sama dengan --</i> <br>
	<code> TblUserMysql::model()->findByAttributes(array('username'=>'admin')); </code><br>
	<?php
	$user2 = TblUserMysql::model()->findByAttributes(array('username'=>'admin'));
	foreach ($user2 as $key=>$value) { echo $value .", \n"; }
	?>
	
 </ul>
</div>

<div class="ket">
<ul>
<li><b class="txtHead">#5. Sample with "array CDbCriteria" </b>
<div class="ket"> @property CDbCriteria $dbCriteria The query criteria that is associated with this model.</div>
<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP'));  ?> 
$criteria = new CDbCriteria;
$criteria->condition='role=:role AND active=:active'; //** operator =,<,>
$criteria->params=array(':role'=>1, ':active'=>'1');
$criteria->order = 't.id DESC'; //set order UNTUK MULTIPLE DATA ROW
$criteria->limit = 5;
		
$find2 = TblUserMysql::model()->find($criteria);
//------------------------ OR --------------------------//
$criteria = new CDbCriteria();
$criteria->compare('role', '1');
$criteria->compare('active', '1');
$users = TblUserMysql::model()->findAll($criteria);
<?php $this->endWidget(); ?> </li><!--print code-->
</ul>
</div>

<!---------------------------------------------------------------- FIND - WITH ------------------------------------------------------------------>
	<b class="badge"># CUSTOM "find() with()" :$data1 = TblUserMysql::model()->with('TblDatas')->find("role=1") :</b>
	<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
	
	<?php $data1 = TblUserMysql::model()->with('TblDatas')->find("t.id=1"); ?>
	
	<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
	<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>
	
	<ul>
	<div class="tpanel right"> <!--- print model ---->
		<li class="toggle btn"><?php echo Yii::t('ui','Load Model(dump($data1)'); ?></li>
		<div class="scroll2"> <?php dump($data1); ?></div>
	</div>
	<div class="clear"></div>
	
	<li><b class="badge"> RESULT(model-TblUserMysql) - </b> <b class="txtKet"> 1#. foreach ($data1 as $key => $value) : </b></li>
	<code>- echo $key : </code> <?php foreach ($data1 as $key=>$value) echo $key.", &nbsp"; ?> <br />
	<code>- echo $value :</code> <?php foreach ($data1 as $key=>$value) echo $value.", &nbsp"; ?> <br /><br>

	<li><b class="badge"> RESULT(model-TblDatas) - </b> <b class="txtKet"> 2#. ($data1->TblDatas as $key => $value): </b></li>
	<code>($data1->TblDatas as $key=>$value)- echo $key : </code> <?php foreach ($data1->TblDatas as $key=>$value) echo $key.", &nbsp"; ?> <br />
	<code>- $data1->TblDatas as $key=>$value :</code><?php foreach ($data1->TblDatas as $key=>$value) echo $value.", &nbsp"; ?> 
	</ul>

<b class="txtKet">SAMPLE pake CGridView/ClistView : </b>
<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
<?php 
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user',
	'dataProvider'=>$data1->search(),
	//'filter'=>$dataProvider ,  // ga bisa
	'columns'=>array(
		'id','username','password','role',
		array(		//contoh: dengan custom
            'name' => 'email', 'type'=>'raw', 'value'=>'$data->email','htmlOptions'=>array('width'=>'100px'),),
		array(		//contoh: dengan custom
            'name' => 'TblDatas1', 'type'=>'raw', 'value'=>'print_r($data->TblDatas->attributes)',),
			//'name' => 'TblDatas->ket', 'type'=>'raw', 'value'=>'$data->TblDatas[0]->attributes->ket',),
			//'name' => 'TblDatas->ket', 'type'=>'raw', 'value'=>'foreach ($data->TblDatas as $key=>$value) echo $key;',),
		array(		//contoh: dengan custom
			'name' => 'TblDatas2', 'type'=>'raw', 'value'=>'$data->TblDatas->attributes["ket"]',),
			//'name' => 'TblDatas->ket', 'type'=>'raw', 'value'=>'foreach ($data->TblDatas as $key=>$value) echo $key;',),		  
	//array('class'=>'CButtonColumn',), //filter jg ga bisa
	),
)); 
?>
<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>
	
<div class="tpanel right">
	<span class="toggle btn"><?php echo Yii::t('ui','Load Model(dump($data1)'); ?></span>
	<div class="scroll2"><?php dump($data1); ?></div>
</div>
