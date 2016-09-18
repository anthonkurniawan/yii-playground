<?php //$this->layout='custom';?>
<?php $this->pageTitle='TestDB'; ?>
<?php $this->breadcrumbs=array('Test DB',);?>


	<?php dump ( TblUserMysql::model()->loadModel(1)->username ); ?><br>
	<?php dump( $this->lastVisit() );?> <br> 
	<?php dump( Yii::app()->user->returnUrl ); ?> <br>
	
	
<!--<div class="ket" style="position:absolute; left: 413px; top: 150px;">-->
<br><b>SAMPLE MODEL :</b><BR />
	<li><b>Turunan $model->search()</b><br /> <?php //print_r($model->search()); ?>
	<li>$dataProvider=<b>new CActiveDataProvider('TblUserMysql');</b><?php //echo CHtml::link('new CActiveDataProvider(\'TblUserMysql\'))',array('testDb/index', 'model'=>'1')); ?> 	
    	Contoh: actionIndex()  widget: CListView/CGridView  </li>
    <li>$model=<?php echo CHtml::link('new TblUserMysq',array('testDb/index', 'model'=>'2')); ?>('search')
    	Contoh: actionAdmin() widget: CGridView</li>
    <li> $model= <?php echo CHtml::link('TblUserMysql ::model()->findAll(array(\'index\'=>\'id\'))',array('testDb/index', 'model'=>'3')); ?>	
    	widget:CActiveForm/CHtml</li>
	<li>'model'=><?php echo CHtml::link('$this->loadModel($id)',array('testDb/index', 'model'=>'')); ?> widget: CDetailView 
    	Contoh: actionView($id) </li>   
	<li>actionDelete($id) $this->loadModel($id)->delete(); </li>
	<li>actionCreate() $model=new TblUserMysql; widget:CActiveForm/CHtml</li>   
	<li>actionRegister() $model=new TblUserMysql('register'); widget:CActiveForm/CHtml< </li>
    <BR /><br /><hr />				
					
<?php 
	$model=new CActiveDataProvider('TblUserMysql');
	$model2= new TblUserMysql('search');	
?>

<table>
<tr>
<td class="tpanel" valign="top">
	<span class="toggle btn"><?php echo Yii::t('ui',' View turunan class'); ?></span>
	<div>
			<b style="font-size:16px">Foreach key=>value :</b><br />
			<?php
				foreach ($model as $key=>$value) { 
					//echo "key :".$key."<br>";
					//echo "value :". $value."<br>";	
					
					echo"<div class='tpanel'>"; echo CHtml::link($key,array('testDb/index', 'model'=>'1'));
						echo "merupakan varibale \$public".$key."&nbsp;";
						echo "<span class='toggle'>". Yii::t('ui','Lihat turunannya')."</span><div class='scroll2'>";
							print_r($model->$key);
						echo"</div></div>";
				}
			?>
					
		<!--<b>Turunan $model->modelClass</b><br /> <?php //print_r($model->modelClass); ?>-->
		<br /><li><b>Turunan $model->criteria<br /></b> <?php print_r($model->criteria); ?></li>
		<br /><li><b>Turunan $model->__construct($modelClass,$config=array())</b></li>
		<br /><li><b>Turunan $model->getCriteria()</b><br /> <?php print_r($model->getCriteria()); ?></li>
		<br /><li><b>Turunan $model->setCriteria($value)</b></li> <?php //print_r($model->setCriteria($value)); ?>
		<br /><li><b>Turunan $model->getSort()</b><br /> <?php print_r($model->getSort()); ?></li>
		<br /><li><b>Turunan $model->fetchData()</b></li> <?php //print_r($model->fetchData()); ?>
		<br /><li><b>Turunan $model->fetchKeys()</b></li> <?php //print_r($model->fetchKeys()); ?>
		<br /><li><b>Turunan $model->calculateTotalItemCount()</b></li> <?php //print_r($model->calculateTotalItemCount()); ?>
	</div>
</td>

<td class="tpanel">	
<span class="toggle btn"><?php echo Yii::t('ui',' View Turunan class'); ?></span>
	<div>
	<b>Foreach key=>value :</b><br />
	<?php
		foreach ($model2 as $key=>$value) { 
			 echo "key :".$key."<br>";
			 //echo "value :". $value."<br>";	
			 }		
	?>
<b>Turunan $model2->tableName()</b><br /> <?php print_r($model2->tableName()); ?>
<b><br />Turunan $model2->Attributes</b><br /> <?php print_r($model2->Attributes); ?>
<b><br />Turunan $model2->rules()</b><br /> <?php print_r($model2->rules()); ?>
<b><br />Turunan $model2->relations()</b><br /> <?php print_r($model2->relations()); ?>	
<b><br />Turunan $model2->attributeLabels()</b><br /> <?php print_r($model2->attributeLabels()); ?>
<b><br />Turunan $model2->attributeNames()</b><br /> <?php print_r($model2->attributeNames()); ?>
<b><br />Turunan $model2->seacrh()</b><br /> <div class="scroll2"><?php print_r($model2->search()); ?></div>
</div>

</td>
</tr>
</table>

