<?php $this->pageTitle='Input batch'; ?>

<b class="badge"><?php echo $this->id . '/' . $this->action->id; ?></b>

Use : <code>CHtml::activeTextField(CModel $model, string $attribute, array $htmlOptions=array ( ))</code><br>
Or alternative use <code>CActiveForm</code><br>

<!-------------------------------------------------------- CONTENT----------------------------------------------------------->
<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>

<div class="form">
<?php echo CHtml::beginForm(); ?>
<table>
	<tr><th>Username</th><th>Firstname</th><th>Email</th><th>Role</th><th>Keterangan</th></tr>
	<?php foreach($datas as $i=>$TblUserMysql): ?>
	<tr>
		<td><?php echo CHtml::activeTextField($TblUserMysql,"[$i]username"); ?></td>
		<td><?php echo CHtml::activeTextField($TblUserMysql,"[$i]first_name"); ?></td>
		<td><?php echo CHtml::activeTextField($TblUserMysql,"[$i]email"); ?></td>
		<td><?php echo CHtml::activeTextField($TblUserMysql,"[$i]role"); ?></td>
      <td><?php //echo CHtml::activeTextArea($TblUserMysql,"[$i]ket"); ?></td>
	</tr>
<?php endforeach; ?>
</table>
</p>

<?php echo CHtml::submitButton('Save'); ?>
<?php echo CHtml::endForm(); ?>

</div><!-- form -->

<!-------------------------------------------------------- CODE VIEW ----------------------------------------------------------->
<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<div class="tpanel left">
	<div class="toggle btn"><?php echo Yii::t('ui','View Code)'); ?></div>
	<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>
</div>

<div class="tpanel left">
	<div class="toggle btn"><?php echo Yii::t('ui','View Controller'); ?></div>
	<?php $this->render_script(array('testForm/inputBatch')); /* from AdminController*/ ?>
</div>
<div class="clear"></div>