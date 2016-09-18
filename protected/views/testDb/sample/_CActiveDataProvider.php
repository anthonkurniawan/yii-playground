<a href="http://localhost/yiidoc/CActiveDataProvider.html" target="_blank" style="float: right"> CActiveDataProvider</a> <br>

<?php echo CHtml::link('CActiveDataProvider', array('testDb/testAR_join2', 'view'=>'testAR_join2'), array('target'=>'_blank')); ?> |
<?php echo CHtml::link('CActiveDataProvider + CDbCriteria', array('testDb/testAR_join', 'view'=>'testAR_join'), array('target'=>'_blank')); ?> |
<?php echo CHtml::link('CDbCommand + CArrayDataProvider', array('TestDb/testAR_join_cmd'), array('target'=>'_blank')); ?> |
<?php echo CHtml::link('CSqlDataProvider', array('testDb/testAR_Csql', 'view'=>'testAR_Csql'), array('target'=>'_blank')); ?>  <br>

<span class="txtKet">
	CActiveDataProvider implements a data provider based on ActiveRecord.
	CActiveDataProvider provides data in terms of ActiveRecord objects which are of class modelClass. It uses the AR CActiveRecord::findAll method to retrieve the data from database. The criteria property can be used to specify various query options. 
</span><br />

<b class="textHead">Inheritance : </b> class CActiveDataProvider > <code>CDataProvider</code> > <code>CComponent</code> </b>
	
<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP'));  ?>  
$dataProvider=new CActiveDataProvider('TblUserMysql', array(
	'criteria'=>array(
		'select'=>'*',
		'condition'=>'role=1', //SET CONDITION  (sample : age>31 AND team=1)
		'order'=>'id DESC', //SET ORDER
		'distinct'=>false, //@var boolean whether to select distinct rows of data only. If this is set true, 
		'params'=> Array ( ),  //@var array list of query parameter. example: array(':name'=>'Dan', ':age'=>31).
		'limit'=> 0,	 // * @var integer maximum number of records to be returned. If less than 0, it means no limit.
		'offset'=> -1,  //*@var integer zero-based offset from where the records to be returned. If less than 0, it means starting from the beginning.
		'order'=> 'id DESC',   //* @var string how to sort the query results. This refers to the ORDER BY clause in an SQL statement.
		'group'=>   // GROUP BY clause in an SQL statement.
		'join'=> JOIN tbl_data AS tu ON ( t.id = tu.id )  //* For example, 'LEFT JOIN users ON users.id=authorID'
		'having'=>   // condition to be applied with GROUP-BY clause.  sample: 'SUM(revenue)<50000'
		'with' =>     //@var mixed the relational query criteria. This is used for fetching related objects in eager loading fashion.
		'alias'=>    // * @var string the alias name of the table. If not set, it means the alias is 't'.
		'together'=> //@var boolean whether the foreign tables should be joined with the primary table in a single SQL.
	 					//* This property is only used in relational AR queries for HAS_MANY and MANY_MANY relations.
		'index'=> 	// @var string the name of the AR attribute whose value should be used as index of the query result array.
						// * Defaults to null, meaning the result array will be zero-based integers.
		'scopes'=> //* @var mixed scopes to apply  see: CDBCriteria.php
	),
	'countCriteria'=>array(
		'condition'=>'role=0',   //see on count hasil on GRID table
		// 'order' and 'with' clauses have no meaning for the count query
    ),
	'pagination'=>array(
		'pageSize'=>2,		//SET PAGEGINATION
	),
));

// $dataProvider->getData()   objects TblUserMysql (untuk liat hasilnya)
<?php $this->endWidget(); ?>

<!------------------------------------ TESTING CActiveDataProvider ------------------------------------------->
<b class="badge">#5. SAMPLE : new CActiveDataProvider</b> <br />
    
<b class="textHead2">Contoh penggunaan CActiveDataProvider :</b><br />
<div class="left" style="width:500px">
<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
<?php
$dataProvider=new CActiveDataProvider('TblUserMysql', array(
    'criteria'=>array(
        'with'=>'TblDatas',
		'condition'=>'t.role=1 AND t.active=1',	
        //'join'=>'JOIN tbl_data AS tu ON ( t.id = tu.id ) ',	
		//'order'=>'t.id DESC',
		//'limit'=>'10',
        //'with'=>array('TblDatas'), // with tidak bisa pada mysql
    ),
    /*'pagination'=>array(   //KALO SUDAH DI SET LIMIT INI TDK DI PAKE!!!
        'pageSize'=>2,
    ),*/
)); 

$dataArr = $dataProvider->getData();  // objects TblUserMysql (untuk liat hasilnya)
?>

<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>
</div>

<div class="left">
<div class="clear"></div>

<div class="tpanel"> <!--- load model ------->
	<span class="toggle btn"><?php echo Yii::t('ui','dump($dataProvider);'); ?></span>
	<div class="scroll2" style="font-size:9px; width:400px"><?php dump($dataProvider); ?></div>
</div>

<div class="tpanel"> <!--- load model ------->
	<span class="toggle btn"><?php echo Yii::t('ui','dump($dataArr);'); ?></span>
	<div class="scroll2" style="font-size:9px; width:400px"><?php dump($dataArr); ?></div>
</div>

</div>

