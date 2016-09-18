<!------------- LISTDATA ( CTH: BUAT DROPDOWN OPTION) ----------------->  

	<b class="badge">#4.ListData with find() and findAll()</b> <br />
    <span class="txtKet"><b>Sntax :</b> public static array listData(array $models, string $valueField, string $textField, string $groupField='')</span><br />
    <b>$models</b> array a list of model objects. This parameter can also be an array of associative arrays (e.g. results of CDbCommand::queryAll).<br />
	<b>$valueField</b> 	string 	the attribute name for list option values<br />
	<b>$textField</b> 	string 	the attribute name for list option texts<br />
	<b>$groupField</b> 	string 	the attribute name for list option group names. If empty, no group will be generated.<br />
	<b>{return}</b> 	array 	the list data that can be used in dropDownList, listBox, etc.<br /><br />

    <ul><li><b> ListData - with DISTINCT </b></li></ul>
	<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
    <?php //CODE
		$model = new TblUserMysql('search');
		//$data2=tblUserMysql::model()->findAll(array(
		$distinct=$model->findAll(array(
			'select'=>'t.role',
			'distinct'=>true,
		));
	?>
	<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
	<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>
	
    <b>Contoh :</b> <code>dump(CHtml::listData($distinct,'role','role'))</code><br />
    <b>Result :</b>
    <?php	dump(CHtml::listData($distinct,'role','role')); ?>
    <br />
	<code>print_r($model->getList_distinc('role')); </code><?php print_r($model->getList_distinct('role')); ?><br>
	<hr />
    
    <ul><li><b> ListData KEY->VALUE OPTION </b></li></ul>
	<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
    <?php 
		//CODE || Syntax : public array findAll(mixed $condition='', array $params=array ( ))
		$listData=tblUserMysql::model()->findAll();
	?>
	<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
	<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>
	
    <b>Contoh :</b> <code>dump(CHtml::listData($listData,'id','username'))</code><br />
    <b>Result :</b> <?php dump(CHtml::listData($listData,'id','username')); ?>
