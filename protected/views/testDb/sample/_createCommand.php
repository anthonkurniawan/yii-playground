<a href="http://localhost/yii-1.12/yii-docs-1.1.12/api/CDbCommand.html" target="_blank" style="float:right">CDbCommand</a>
<?php echo CHtml::link('More sample (Query Builder)', array('testDb/queryBuilder', 'view'=>'queryBuilder'), array('target'=>'_blank')); ?> <br>

<div class="view2">
	<b class="badge">#6. SAMPLE : USE createCommand</b> <br />
	<div class="left">
    <span class="txtKet">CDbCommand represents an SQL statement to execute against a database.</span>
	
	<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP'));  ?>  
	#SAMPLE USING STRING#
    $duplicateData = Yii::app()->db->createCommand('
		SELECT url, end_datetime, start_datetime, discount, providername
		FROM {{affiliate_link}}
		GROUP BY providername, url, discount, end_datetime, start_datetime
		HAVING COUNT(*) > 1 LIMIT 10')->queryAll();
	
	#SAMPLE USING NESTED#
	$user = Yii::app()->db->createCommand()
		->select('username, password')
		->from('tbl_user')
		->where('id=:id', array(':id'=>1))
		->queryRow();								
	<?php $this->endWidget(); ?>

	<b class="txtHead">SAMPLE :</b><br>
	<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
	<?php 
	$query = "select * from tbl_user_mysql"; 
	$dbCommand = Yii::app()->db->createCommand($query)->queryAll();
	?>
	<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
	<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>
	</div>
	
	<div class="right">
		<b>Result :</b> <code>dump($dbCommand); </code><br>
			<div class="scroll2" style="width:450px; height: 270px"><?php dump($dbCommand); ?></div>
	</div>
	
	<div class='clear'></div>
	
	<ul>
	<li>- <code>foreach ($dbCommand as $key=>$value) echo $key</code> : <?php foreach ($dbCommand as $key=>$value) { echo $key.", &nbsp;"; } ?></li>
	<li>- <code>foreach ($dbCommand as $key=>$value) echo $value</code> : <?php foreach ($dbCommand as $key=>$value) { echo $value['username'] .", &nbsp;"; } ?></li>
	</ul> 

	
</div>