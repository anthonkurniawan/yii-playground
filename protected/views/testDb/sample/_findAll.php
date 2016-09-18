<!-------------------- #findAll() MORE 1 CONDITION --------------------------->
	<span style="float:right"> <?php echo CHtml::link('More findAll',array('testDb/ar_relasional', 'view'=>'ar_relasional'),array('target'=>'_blank')); ?></span>
	
	<b class="badge">#2. SELECT * ( All Record ) with findAll()</b> <span class="txtKet">( load semua data yg di minta )</span> <br />
    <b class="txtKet"> Syntax : public array findAll(mixed $condition='', array $params=array ( )) </b>
	<ul><li>TblUserMysql::model()->findAll();	atau TblUserMysql::model()->findAll($condition='',$params=array() -<i>turunan dari CActiveRecord extends CModel</i></li></ul> 
    
		<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
		<?php 
		/*$distinct=$model->findAll(array(
			'select'=>'t.role',
			'distinct'=>true,
		));	
		dump(CHtml::listData($distinct,'role','role')); */

		$findAll=TblUserMysql::model()->findAll('role=:role AND active=:active',
		array(
			':role'=>'administrator',
			':active'=>'1',
		));
		
		$result=TblUserMysql::model()->findAll(//'role=:role', //with condition
		array(
			//':role'=>'1', //condition 1
			//':email'=>'admin@admin123',
			'select'=>'id,username',
			'order'=>'id DESC',
		));
		?>
		
	<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
	<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>
	
	<div class="tpanel left"><!---- RESULT --->
		<span class="toggle btn"><?php echo Yii::t('ui','Result'); ?></span>
		<div>
			<ul>
				<b class="txtHead">foreach ($findAll as $key=>$value) </b>
				<li><b class="txtHead2">$findAll[0]->username : </b> <?php  echo $findAll[0]->username; ?></li>
				<li><b class="txtHead2">echo $key :</b> <?php  foreach($findAll as $key=>$value) { echo "\$key :".$key.", &nbsp;"; } ?></li>
				<li><b class="txtHead2">echo $value->username :</b>
					<?php foreach ($findAll as $key=>$value) { echo $value->username.", &nbsp;"; } ?>
				</li>
				<li><b class="txtHead2">echo $value->attributes['username'] :</b>
					<?php foreach ($findAll as $key=>$value) { echo $value->attributes['username'].", &nbsp;";   } ?>
				</li>
			</ul>
			
			<div class="scroll2 left" style="width:300px; height:250px">
				<b class="txtHead2">dump($value->attributes) :</b><br>
				<?php foreach ($findAll as $key=>$value) { dump($value->attributes); echo"<br>";} ?>
			</div>
			
			<div class="tpanel left"><!---- RESULT --->
				<span class="toggle btn"><?php echo Yii::t('ui','with ListData'); ?></span>
				<div class="scroll2" style="width:300px; height:250px"><?php dump(CHtml::listData($result,'id','username')); ?></div>
			</div>
			
			<div class="tpanel left"><!---- RESULT --->
				<span class="toggle btn"><?php echo Yii::t('ui','view array'); ?></span>
				<div class="scroll2" style="width:400px;  height:250px"><?php dump($findAll); ?></div>
			</div>
			
		</div>			
	</div>

