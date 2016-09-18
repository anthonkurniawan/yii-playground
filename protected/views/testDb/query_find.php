<?php $this->breadcrumbs=array(
	'Test DB'=>array('index'),
	'Test Query',
);
?>


<!----------------------------- CONTENT ----------------------------->
<?php 
if($_POST['role']!=NULL) { $role=$_POST['role']; }
else { $role='1'; }
if($_POST['email']!=NULL) { $email=$_POST['email']; }
else { $email=''; }
//#1. with find() ---------------------//		
ECHO "<br><b>POST role : ".$role." , email : ".$email."</b><br>";
?>

<!---------------------- USE CHtml FORM ------------------------------>
<?php echo CHtml::beginForm(); ?>
SELECT * FROM `tbl_user_mysql` WHERE <br />
role:<?php echo CHtml::textField('role',$_POST['role'],array('submit'=>''));?> 
email:<?php echo CHtml::textField('email',$_POST['email'],array('submit'=>''));?> 

<!-------------------- #FIND() 1 CONDITION --------------------------->
<?php
$find=TblUserMysql::model()->find('role=:role',
	array(
 		':role'=>'1',
		//':email'=>'admin@admin123',
		//'index'=>true,
	));
?>    
<div class="ket">
    <b class="txtHead">#1. SELECT * ( 1 record ) with find()</b><span class="txtKet">( data yg di load hanya 1 row saja )</span><br />
	<b class="txtKet"> Syntax : public CActiveRecord find(mixed $condition='', array $params=array ( )) </b>
    <li>TblUserMysql::model()->find();	atau TblUserMysql::model()->find($condition='',$params=array() -<i>turunan dari CActiveRecord extends CModel</i></li> 
    <div class="tpanel">		
		<span class="toggle"><?php echo Yii::t('ui','Sample - find() with 1 Condition'); ?></span>
		<div>
        	<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP'));  ?> <!--- print coding ---->
           		$result = TblUserMysql::model()->find("role='".$_POST['role']."'")->username;
            <?php $this->endWidget(); ?>
        	
            <div class="tpanel"><!---- RESULT --->
				<span class="toggle"><?php echo Yii::t('ui','Result'); ?></span>
                <?php //if($_POST['role'])  ?>
				<div>
					- $find->username: <b><?php echo $find->username;?></b><br />
                    - foreach ($find as $key=>$value) echo $key:<b><?php  foreach ($find as $key=>$value) { echo $key.", &nbsp;"; } ?></b><br />
                    - foreach ($find as $key=>$value) echo $key->$value :<b><?php  foreach ($find as $key=>$value) { echo $value.", &nbsp;"; } ?></b>
                </div>
			</div>
        </div>
	</div>
</div>

<!-------------------- #findAll() MORE 1 CONDITION --------------------------->
<?php 
/*$distinct=$model->findAll(array(
			'select'=>'t.role',
			'distinct'=>true,
		));	
print_r(CHtml::listData($distinct,'role','role')); */

//$findAll=$model->findAll('role=:role AND email=:email',
$findAll=TblUserMysql::model()->findAll('role=:role AND email=:email',
	array(
 		':role'=>'1',
		':email'=>'admin@admin123',
	));
?>

<div class="ket">
    <b class="txtHead">#2. SELECT * ( All Record ) with findAll()</b> <span class="txtKet">( load semua data yg di minta )</span> <br />
    <b class="txtKet"> Syntax : public array findAll(mixed $condition='', array $params=array ( )) </b>
	<li>TblUserMysql::model()->findAll();	atau TblUserMysql::model()->findAll($condition='',$params=array() -<i>turunan dari CActiveRecord extends CModel</i></li> 
    
	<div class="tpanel">		
		<span class="toggle"><?php echo Yii::t('ui','Sample - findAll() with 2 Condition'); ?></span>
		<div>
			<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP')); ?> <!--- print coding ---->
				$result = TblUserMysql::model()->find('role=:role AND email=:email',
														array(
														':role'=>'1',
														':email'=>'admin@admin123',
														));
			<?php $this->endWidget(); ?>
       
			<div class="tpanel"><!---- RESULT --->
				<span class="toggle"><?php echo Yii::t('ui','Result'); ?></span>
                <?php //if($_POST['role'])  ?>
				<div>
					- $findAll->username: <b> <?php  echo $findAll[0]->username; //print_r($findAll);?> </b><br />
                    - 1# foreach ($findAll as $key=>$value) echo $key :<b>
                    <?php  foreach ($findAll as $key=>$value) { echo "\$key :".$key.", &nbsp;"; } ?></b>
                    <br />
                    - foreach ($findAll as $key=>$value) echo $value->username:<b>
                    <?php foreach ($findAll as $key=>$value) { echo $value->username.", &nbsp;"; } ?></b>
                    <br />
                    - 2# foreach ($findAll as $key=>$value) print_r($value->attributes):<b>
                    <?php foreach ($findAll as $key=>$value) { print_r($value->attributes); echo"<br>";} ?></b>
                    <br />
                    - 3# foreach ($findAll as $key=>$value) echo $value->attributes[username] *sama dengan $value->username:<b>
                    <?php foreach ($findAll as $key=>$value) { 
						echo $value->attributes[username].", &nbsp;";     
						//echo $value->column;
						} ?></b>
                     <?php //echo"test :". $findAll->fetchData;   ?>
                            
                    <div class="tpanel"><!---- RESULT --->
						<span class="toggle"><?php echo Yii::t('ui','view array'); ?></span>
                   		<pre class="scroll2"><?php print_r($findAll); ?></pre>
                    </div>
                </div>
			</div>
		</div>
	</div>
</div>
    
<!-------------------- #CUSTOM - NEW CDbCriteria --------------------------->
<div class="ket">
	<b class="txtHead">#3. SELECT with ( custom ) new CDbCriteria</b><span class="txtKet">( advance custom query)</span>
    <li>new CDbCriteria - -<i>Turunan dari CDbCriteria extends CComponent</i></li> </li>

	<div class="tpanel">		
   		<span style="float:right"> <?php echo CHtml::link('More CDbCriteria',array('testDb/criteria_sample'),array('target'=>'_blank')); ?></span>
		<span class="toggle"><?php echo Yii::t('ui','Sample - new CDbCriteria'); ?></span>
		<div>
			<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP'));  ?>  <!--- print coding ---->
			$criteria = new CDbCriteria;
			$criteria->condition='id=:id AND role=:role'; // set operator: =,<,>
			$criteria->params=array(':id'=>1, ':role'=>'1');  //set parameter
            $criteria->order = 't.id asc'; //set order UNTUK MULTIPLE DATA ROW
            $criteria->limit = 5;  //set LIMIT UNTUK MULTIPLE DATA ROW
			$res_criteria = TblUserMysql::model()->find($criteria);  //result
			<?php $this->endWidget(); ?>
			
			<div class="tpanel"><!---- RESULT --->
				<span class="toggle"><?php echo Yii::t('ui','Result'); ?></span>
                <?php //CODE -----------
				$criteria = new CDbCriteria;
				$criteria->condition='id=:id AND role=:role'; //** operator =,<,>
				$criteria->params=array(':id'=>1, ':role'=>'1');
				$criteria->order = 't.id DESC'; //set order UNTUK MULTIPLE DATA ROW
				$criteria->limit = 5;
				$res_criteria = TblUserMysql::model()->find($criteria);
				?>
				<div>
					$res_criteria->username :<b><?php echo $res_criteria->username; //print_r($res_criteria); ?></b><br />
                    foreach($res_criteria as $key=>$value) :<b><?php foreach($res_criteria as $key=>$value) {echo $key.":".$value.",&nbsp;";} ?></b>
				</div>
			</div>
		</div>
	</div>
</div>

 <!------------- LISTDATA ( CTH: BUAT DROPDOWN OPTION) ----------------->  
 <div class="ket">
	<b class="txtHead">#4.ListData with find() and findAll()</b> <br />
    <span class="txtKet"><b>Sntax :</b> public static array listData(array $models, string $valueField, string $textField, string $groupField='')</span><br />
    <b>$models</b> array a list of model objects. This parameter can also be an array of associative arrays (e.g. results of CDbCommand::queryAll).<br />
	<b>$valueField</b> 	string 	the attribute name for list option values<br />
	<b>$textField</b> 	string 	the attribute name for list option texts<br />
	<b>$groupField</b> 	string 	the attribute name for list option group names. If empty, no group will be generated.<br />
	<b>{return}</b> 	array 	the list data that can be used in dropDownList, listBox, etc.<br /><br />

    <li><b> ListData - with DISTINCT </b></li>
    <?php //CODE
		//$data2=tblUserMysql::model()->findAll(array(
		$distinct=$model->findAll(array(
			'select'=>'t.role',
			'distinct'=>true,
		));
	?>
    <?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP'));  ?>  
			$distinct=$model->findAll(array(
			'select'=>'t.role',
			'distinct'=>true,
		));
	<?php $this->endWidget(); ?><!--- print coding ---->
    
    <b>Contoh :</b> print_r(CHtml::listData($distinct,'role','role'))<br />
    <b>Result :</b>
    <?php	
		//print_r($data2);
		//return CHtml::listData($this->findAll(),'id','role');
		print_r(CHtml::listData($distinct,'role','role'));
	?>
    <br /><hr />
    
    <li><b> ListData KEY->VALUE OPTION </b></li>
    <?php //CODE || Syntax : public array findAll(mixed $condition='', array $params=array ( ))
		$listData=tblUserMysql::model()->findAll();
	?>
    <?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP'));  ?>  
			$listData=tblUserMysql::model()->findAll();
	<?php $this->endWidget(); ?><!--- print coding ---->
    
    <b>Contoh :</b> print_r(CHtml::listData($listData,'id','username'))<br />
    <b>Result :</b> <?php print_r(CHtml::listData($listData,'id','username')); ?>
</div>

<!------------------------------------ TESTING CActiveDataProvider ------------------------------------------->
<div class="ket">
	<b class="txtHead">#5. SAMPLE : new CActiveDataProvider</b> <br />
    <span class="txtKet">
CActiveDataProvider implements a data provider based on ActiveRecord.

CActiveDataProvider provides data in terms of ActiveRecord objects which are of class modelClass. It uses the AR CActiveRecord::findAll method to retrieve the data from database. The criteria property can be used to specify various query options. </span><br />
<b>Contoh penggunaan CActiveDataProvider :</b><br />

<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP'));  ?>  
$dataProvider=new CActiveDataProvider('TblUserMysql', array(
    'criteria'=>array(
        'condition'=>'role=1',	//SET CONDITION
        'order'=>'id DESC',		//SET ORDER
        'limit'=>5,    // SET LIMIT
        //'with'=>array('author'), //belom tau
        select => *
        distinct => 
        condition => role=1
        params => Array ( )
		limit => 5
        offset => -1
        order => id DESC
        group => 
        join => JOIN tbl_data AS tu ON ( t.id = tu.id ) 
        having => 
        with => 
        alias => 
        together => 
        index => 
        scopes => 
    ),
    'pagination'=>array(
        'pageSize'=>2,		//SET PAGEGINATION
    ),
));
// $dataProvider->getData()   objects TblUserMysql (untuk liat hasilnya)
<?php $this->endWidget(); ?><!--- print coding ----><br />

<?php //#CODE---
/*
$dataProvider=new CActiveDataProvider('model_B',array( 'criteria'=>array(
'with'=>'student',
//'condition'=>'egzamplecolumn="'.GET['something'].'" AND egzamplecolumn2="'.GET['something'].'" ',    // extra conditions
'order'=>'some_field ASC',        
 ),*/ 
													  
//$data1 = TblUserMysql::model()->with('TblData')->find("role=1"); -->test(hapus tar)													  
$dataProvider=new CActiveDataProvider('TblUserMysql', array(
    'criteria'=>array(
        'with'=>'TblData',
		//'condition'=>'t.id=1',	
        'join'=>'JOIN tbl_data AS tu ON ( t.id = tu.id ) ',	
		'order'=>'t.id DESC',
		//'limit'=>'10',
        //'with'=>array('TblData'), // with tidak bisa pada mysql
    ),
    /*'pagination'=>array(   //KALO SUDAH DI SET LIMIT INI TDK DI PAKE!!!
        'pageSize'=>2,
    ),*/
));
?>


<ul><li><b class="txtHead"> RESULT - </b> <b class="txtKet"> foreach ($dataProvider as $key=>$value) ) : </b></li>
<i class="txtKet">- echo $key : </i> <?php foreach ($dataProvider as $key=>$value) echo $key.", &nbsp"; ?> <br />
<i class="txtKet">- print_r($value->attributes) : </i> <?php foreach ($dataProvider as $key=>$value)  /*print_r($value);*/ 	
      print_r($value->attributes);?> </ul>
      

<div class="tpanel"> <!--- print model ---->
	<span class="toggle"><?php echo Yii::t('ui','Load Model(print_r($model)'); ?></span>
	<pre class="scroll2">
<?php print_r($dataProvider); ?>
    </pre>
</div>

<b class="txtKet">Setelah ini bisa langsung pake CGridView/ClistView : </b>
<?php 
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-sqlite-grid',
	//'dataProvider'=>$data1->TblData->ket->search(),
	'dataProvider'=>$dataProvider,
	//'filter'=>$dataProvider ,  // ga bisa
	'columns'=>array(
		'id','username','password','role',
		array(		//contoh: dengan custom
            'name' => 'email', 'type'=>'raw', 'value'=>'$data->email','htmlOptions'=>array('width'=>'100px'),),
		array(		//contoh: dengan custom
            'name' => 'TblData1', 'type'=>'raw', 'value'=>'print_r($data->TblData[0]->attributes)',),
			//'name' => 'TblData->ket', 'type'=>'raw', 'value'=>'$data->TblData[0]->attributes->ket',),
			//'name' => 'TblData->ket', 'type'=>'raw', 'value'=>'foreach ($data->TblData as $key=>$value) echo $key;',),
		array(		//contoh: dengan custom
			'name' => 'TblData2', 'type'=>'raw', 'value'=>'$data->TblData[0]->attributes[ket]',),
			//'name' => 'TblData->ket', 'type'=>'raw', 'value'=>'foreach ($data->TblData as $key=>$value) echo $key;',),
			 
	//array('class'=>'CButtonColumn',), //filter jg ga bisa
	),
)); 
?>
<hr /><br />

<b class="txtKet">Tapi kalo ga pengen pake widget/ dengan cara manual dengan tambahin code : </b>
<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP'));  ?> 
$data = $dataProvider->getData();  
<?php $this->endWidget(); ?><!--- print coding ---->

<?php $data = $dataProvider->getData();   	//print_r($data); ?>
<ul><li><b class="txtHead"> RESULT - </b> <b class="txtKet"> foreach ($data as $key=>$value) ) : </b></li>
<i class="txtKet">- echo $key : </i> <?php foreach ($data as $key=>$value) echo $key.", &nbsp"; ?> <br />
<i class="txtKet">- print_r($value->attributes) :</i> <?php foreach ($data as $key=>$value) print_r($value->attributes)."<br>";?> <br />

<i class="txtKet">- print_r($value->attributes) :</i> <?php //foreach ($data as $key=>$value->attributes) print_r($value->attributes)."<br>";?> <br />
<i class="txtKet">- echo $key : </i> <?php //foreach ($data->tblData as $key=>$value) echo $value; ?> <br />XXXXXXXXXXXXX


<div class="tpanel"> <!--- print model ---->
	<span class="toggle"><?php echo Yii::t('ui','Load Model(print_r($model)'); ?></span>
	<pre class="scroll2">
<?php print_r($data); ?>
    </pre>
</div>

<b class="txtKet">TEST pake CGridView/ClistView : </b>
<?php /*
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-sqlite-grid',
	//'dataProvider'=>$data1->TblData->ket->search(),
	'dataProvider'=>$data->search(),
	//'filter'=>$dataProvider ,  // ga bisa
	'columns'=>array(
		'id','username','password','role',
		array(		//contoh: dengan custom
            'name' => 'email', 'type'=>'raw', 'value'=>'$data->email','htmlOptions'=>array('width'=>'100px'),),
		array(		//contoh: dengan custom
            'name' => 'TblData1', 'type'=>'raw', 'value'=>'print_r($data->TblData[0]->attributes)',),
			//'name' => 'TblData->ket', 'type'=>'raw', 'value'=>'$data->TblData[0]->attributes->ket',),
			//'name' => 'TblData->ket', 'type'=>'raw', 'value'=>'foreach ($data->TblData as $key=>$value) echo $key;',),
		array(		//contoh: dengan custom
			'name' => 'TblData2', 'type'=>'raw', 'value'=>'$data->TblData[0]->attributes[ket]',),
			//'name' => 'TblData->ket', 'type'=>'raw', 'value'=>'foreach ($data->TblData as $key=>$value) echo $key;',),
			  
	//array('class'=>'CButtonColumn',), //filter jg ga bisa
	),
)); */
?>
</ul>
</div>
 
 
 <!-------------------------------------------------------------------------------------------->
 <b><li>TEST:$data1 = TblUserMysql::model()->with('TblData')->find("role=1") :</li></b><BR />
	<?php $data1 = TblUserMysql::model()->with('TblData')->find("role=1"); ?>
	<?php //$data1 = TblUserMysql::model()->with('TblData')->search(); ?>
	<?php //$data1 = TblUserMysql::model()->with('TblData')->findAll(); 	?>
    
<ul><li><b class="txtHead"> RESULT - </b> <b class="txtKet"> 1#. foreach ($data1 as $key => $value) : </b></li>
<i class="txtKet">- echo $key : </i> <?php foreach ($data1 as $key=>$value) echo $key.", &nbsp"; ?> <br />
<i class="txtKet">- echo $value :</i> <?php foreach ($data1 as $key=>$value) echo $value.", &nbsp"; ?> <br />
<i class="txtKet">- print_r($value->attributes) :</i> <?php foreach ($data1 as $key=>$value) print_r($value->attributes)."<br>";?> 
</ul><hr />  

<ul><li><b class="txtHead"> RESULT - </b> <b class="txtKet"> 2#. ($data1->TblData as $key => $value): </b></li>
<i class="txtKet">- echo $key : </i> <?php foreach ($data1->TblData as $key=>$value) echo $key.", &nbsp"; ?> <br />
<i class="txtKet">- echo $key : </i> <?php foreach ($data1->TblData as $key=>$value->attributes) echo $value->ket.", &nbsp"; ?> 

<br />
<i class="txtKet">- print_r($value->attributes) :</i> <?php foreach ($data1->TblData as $key=>$value) print_r($value->attributes)."<br>";?> 
</ul><br />

<b class="txtKet">TEST pake CGridView/ClistView : </b>
<?php 
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-sqlite-grid',
	//'dataProvider'=>$data1->TblData->ket->search(),
	'dataProvider'=>$data1->search(),
	//'filter'=>$dataProvider ,  // ga bisa
	'columns'=>array(
		'id','username','password','role',
		array(		//contoh: dengan custom
            'name' => 'email', 'type'=>'raw', 'value'=>'$data->email','htmlOptions'=>array('width'=>'100px'),),
		array(		//contoh: dengan custom
            'name' => 'TblData1', 'type'=>'raw', 'value'=>'print_r($data->TblData[0]->attributes)',),
			//'name' => 'TblData->ket', 'type'=>'raw', 'value'=>'$data->TblData[0]->attributes->ket',),
			//'name' => 'TblData->ket', 'type'=>'raw', 'value'=>'foreach ($data->TblData as $key=>$value) echo $key;',),
		array(		//contoh: dengan custom
			'name' => 'TblData2', 'type'=>'raw', 'value'=>'$data->TblData[0]->attributes[ket]',),
			//'name' => 'TblData->ket', 'type'=>'raw', 'value'=>'foreach ($data->TblData as $key=>$value) echo $key;',),
			  
	//array('class'=>'CButtonColumn',), //filter jg ga bisa
	),
)); 
?>

	<div class="tpanel">
		<span class="toggle"><?php echo Yii::t('ui','Load Model(print_r($data1)'); ?></span>
			<pre class="scroll2"><?php print_r($data1); ?></pre>
	</div>
	</ul> <hr />


<!------------------------------------ TESTING CActiveDataProvider ------------------------------------------->
<div class="ket">
	<b class="txtHead">#6. SAMPLE : USE createCommand</b> <br />
    <span class="txtKet">		</span>
    $duplicateData = Yii::app()->db->createCommand('
                         SELECT url, end_datetime, start_datetime, discount, providername
                                        FROM {{affiliate_link}}
                                        GROUP BY providername, url, discount, end_datetime, start_datetime
                                        HAVING COUNT(*) > 1 LIMIT 10')->queryAll();

TESTING:<BR />
<?php 
$query = "select * from tbl_user_mysql"; 
$result = Yii::app()->db->createCommand($query)->queryAll();
echo $result;
?>

</div>
<!------------------------------------------- TESTING --------------------------------------->
<?php 
$result1 = $model->findAll();
echo"result1 :".$result1->username."<br>";//print_r($result);
//print_r($result1);
?>
- foreach ($result1 as $key=>$value)- $key: <?php foreach ($result1 as $key=>$value) { echo $key.", &nbsp;"; } ?><br />
- foreach ($result1 as $key=>$value)- $value: <?php foreach ($result1 as $key=>$value) { echo $value->username.", &nbsp;"; } ?><br />
<?php 
/*
$criteria = new CDbCriteria;
$criteria->condition='id=:id AND role=:role';
$criteria->params=array(':id'=>1, ':role'=>'1');
$result2 = TblUserMysql::model()->find($criteria);

echo"result criteria :".$res_criteria->username; //print_r($result);
*/
$search=$model->search(id); echo"<br>search :"; //print_r($search);
?>
<?php echo CHtml::endForm(); ?>

<b class="txtHead">LOAD MODEL :</b><br />
<!------------------------------ LOAD/PRINT ARRAY $MODEL ------------------>
<table>
<tr>
<td class="tpanel">
	<span class="toggle"><?php echo Yii::t('ui','Load Model(print_r($model)'); ?></span>
	<div class="scroll2">
    	<?php $this->beginWidget('CTextHighlighter',array('language'=>'SQL'));  ?><!--- print coding ---->
<?php print_r($model); ?>
        <?php $this->endWidget(); ?>
	</div>
</td>

<td class="tpanel">
	<span class="toggle"><?php echo Yii::t('ui','Load Model(print_r($model->search())'); ?></span>
	<div class="scroll2">
    	<?php $this->beginWidget('CTextHighlighter',array('language'=>'SQL'));  ?><!--- print coding ---->
<?php print_r($model->search()); ?>
        <?php $this->endWidget(); ?>
	</div>      
</td>
</tr>
</table>       
<!---------------------- USE ACTIVE FORM ------------------------------>
<?php ECHO "<b>GET TblUserMysql: ".$_GET['TblUserMysql']."</b><br>"; print_r($_GET['TblUserMysql']); ?>
<?php $form=$this->beginWidget('CActiveForm', array(
		'action'=>Yii::app()->createUrl($this->route),
		'method'=>'get',
	)); ?>

	<?php //echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
    <?php echo CHtml::encode($model->id); ?>
    
	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>
    <div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>
<?php $this->endWidget(); ?>    
</div>

<!---------------------- TESTING ---------------------------->
<b class="txtHead"> - TESTING - </b><BR />
<!----- #FIND() 1 CONDITION ------->
<?php
//$find=TblUserMysql::model()->find('role=:role',
/*$findAll=TblUserMysql::model()->findAll('role=:role AND email=:email',
	array(
 		':role'=>'1',
		':email'=>'admin@admin123',
	));
*/
$result=TblUserMysql::model()->findAll(//'role=:role', //with condition
	array(
 		//':role'=>'1', //condition 1
		//':email'=>'admin@admin123',
		'select'=>'id,username',
		'order'=>'id DESC',
	));
?>    
         
- $result[0]->username: <b><?php echo $result[0]->username;?></b><br />
- foreach ($result as $key=>$value) echo $key:<b><?php  foreach ($result as $key=>$value) { echo $key.", &nbsp;"; } ?></b><br />
- foreach ($result as $key=>$value) echo $key->$value :<b>
	<?php  foreach ($result as $key=>$value) { echo $value->attributes[id].", &nbsp;";} ?></b><br />
- foreach ($result as $key=>$value) echo $key->$value :<b>
	<?php  foreach ($result as $key=>$value) {  print_r($value->attributes);} ?></b><br />
<?php 
	//print_r(CHtml::listData($result,'role','role')); 
	print_r(CHtml::listData($result,'id','username')); 
?>

<div class="scroll2">
    	<?php $this->beginWidget('CTextHighlighter',array('language'=>'SQL'));  ?><!--- print coding ---->
<?php print_r($result); ?>
        <?php $this->endWidget(); ?>
</div> 
    
<hr />
<br />
<!------------------------------------------------------------------->
<div class="ket">
	<ul>
    <li><b>print_r($model->getOptions()) - Result :</b></li> <?php print_r($model->getOptions());?>
	<li><b>print_r(tblUserMysql::model()->getOptions()) - Result:</b></li> <?php print_r(tblUserMysql::model()->getOptions());?><br />
	<span class="txtKet"><b>Ket : </b>$model->getOptions() <i>sama dengan</i> $model->options </span><br /><br />
<!-------------------------------------------------------------------><hr />
    
	

</div>