<style>#content{ font-size: 65.5%; } </style>
<?php echo CHtml::link('see activeRecord', array('testDb/ar', 'view'=>'ar'), array('target'=>'_blank')); ?> | 
<?php echo CHtml::link('findByPk(), findByAttributes(), findBySql(), count(), exists(), populateRecord()', array('testDb/find', 'view'=>'_find_other'), array('target'=>'_blank')); ?><br><br>


<!-------------------- #FIND() 1 CONDITION ---------------------------> 
	<span style="float:right"> <?php echo CHtml::link('More find()',array('testDb/find', 'view'=>'find'),array('target'=>'_blank')); ?></span>
	
	<b class="badge">#1. SELECT * (Finds a single active record) with find()</b><span class="txtKet">( data yg di load hanya 1 row saja )</span><br>
	<b class="txtKet"> Syntax : public CActiveRecord</b> <code>find(mixed $condition='', array $params=array ( )) </code>
	<ul><li>TblUserMysql::model()->find();	atau TblUserMysql::model()->find($condition='',$params=array() -<i>turunan dari CActiveRecord extends CModel</i></li></ul> 
	
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
	<hr>
	
	<ul>
	<li><b class="txtHead2">Sample @param "string" condition</b></li>
		<code>$find=TblUserMysql::model()->find('role=1 AND active=1 order by id DESC');</code> <br>
		<code>$find=TblUserMysql::model()->find('role=1 AND active=1'); </code>
		
	<li><b class="txtHead2">Sample @param "string" condition</b></li>
		<code>$find2 = TblUserMysql::model()->find( array('condition'=>'role=0','order'=>'id') );</code><br>
	
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
	
	<li><b class="txtHead2">Sample with mixed "string" and "array" condition</b></li>
		<code>$find = TblUserMysql::model()->findAll('role=? AND active=?', array('1', '1'));</code><br>
		<code>$find = TblUserMysql::model()->find('LOWER(username)=?',array(strtolower('admin')));</code><br>
		
		<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
		
		<?php
		$criteria =array(':role'=>'1',':active'=>'1');
		$find=TblUserMysql::model()->find('role=:role AND active=:active', $criteria);
		?>
		
		<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
		<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>
		
		
	</ul>

	
	
	
