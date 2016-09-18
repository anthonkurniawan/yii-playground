<?php 
$this->pageTitle='myCactiveRecord';
?>

<style>
.container{width:1100px;}
#content { font-size: 80%; }
.php-hl-main {font-size:90% }
</style>

<h2> My DEFINE FUNCTION</h2>

<?php echo CHtml::link('view in new tab', array('testDb/myCactiveRecord', 'view'=>'_MYCActiveRecord'), array('target'=>'_blank', 'style'=>'float:right')); ?> <br>

<div class="left">
<ul>
	<li><code>getTopID($col)</code>  - $col = primarykey</li>
		<b class="txtHead2">tblUserMysql::model()->getTopID('id') :</b> <br> <?php dump(tblUserMysql::model()->getTopID('id')); ?>
	<li><code>suggest($keyword, $order, $limit=20 )</code> - $order = option "label"=>"value"</li>  
		<b class="txtHead2">tblUserMysql::model()->suggest('kod', 'email', 5) :</b> <br> <?php dump(tblUserMysql::model()->suggest('kod', 'email', 5)  ); ?>
	<li><code> suggestUsername($keyword, $limit=20)</code></li>  
		<b class="txtHead2">tblUserMysql::model()->suggestUsername('ko')   :</b> <br> <?php dump(tblUserMysql::model()->suggestUsername('ko')  ); ?>
    <li><code>getList_all()</code></li>
		<b class="txtHead2">tblUserMysql::model()->getList_all() : </b><br>  <?php dump(tblUserMysql::model()->getList_all());?>
	 <li><code>items()</code></li>
		<b class="txtHead2">tblUserMysql::model()->items('username1') : </b><br>  <?php dump(tblUserMysql::model()->items('username1'));?>

</ul>
</div>

<div class="left">
<ul>
	<li><code>getList_distinct($param)</code></li>
		<b class="txtHead2">tblUserMysql::model()->getList_distinct('role') :</b> <?php dump(tblUserMysql::model()->getList_distinct('role'));?>
	<li><code>actively() </code></li>
		<b class="txtHead2">tblUserMysql::model()->actively()->findAll </b> 
		<div class="scroll2" style="width:400px"><?php  dump( tblUserMysql::model()->actively()->findAll() );?></div>
		
		 <?php //dump( tblUserMysql::model()->actively() ); ?>
		 <div class="tpanel"> <!--- load model ------->
			<span class="toggle btn"><?php echo Yii::t('ui','same with using function'); ?></span>
			<div class="scroll2" style="width:400px"><?php  dump( tblUserMysql::model()->rolely()->findAll() );?></div>
		</div>

</ul>
</div>

<div class="clear"></div>

<span class="txtKet"><b>Ket : </b>$model->getOptions() <i>sama dengan</i> $model->options </span>

<?php //dump( tblUserMysql::model()->primaryKey ); ?>
	echo "<br>suggest";  print_r($model->suggest('j', 'username') );	
			echo "<br>items";  dump( $model->items('username') );	
			
			//echo "suggestUsername"; print_r($model->suggestUsername('j'));
		
			//echo Yii::app()->language;
			//echo "<br>items";  dump( $model->item('username', 'email') );	
			//$model=new CActiveDataProvider('TblUserMysql'); //print_r($dataProvider);	//result key : modelClass, model, keyAttribute
		
		//print_r($model->model()); //SAMA DENGAN "print_r(new TblUserMysql);"
		//echo $model->getAttributeLabel(ket);  //cari Attribute label
		//print_r($model->getDbConnection());  //info array DB Connection
		//print_r($model->getActiveRelation($name));  //info array DB Connection
		//print_r($model->getTableSchema());  //info Schema Table
		//print_r($model->getCommandBuilder());  //info Schema Table
		//print_r($model->hasAttribute(id));  //Cek nama Attribut sudah di set?
		//print_r($model->getMetaData());  //Info : CActiveRecordMetaData Object
		//print_r($model->getAttribute('Keterangan'));  //Info : belom ngerti
		//print_r($model->setAttribute('Keterangan'));  //Info : belom ngerti
		
		//while($row = mysql_fetch_array($model))
		//{	$data[]=$row[1]; }		PRINT_R($data);
		
		//$this->render('index');