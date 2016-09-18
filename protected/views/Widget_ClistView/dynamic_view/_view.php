
<div class="view2">
	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('username')); ?>:</b>
	<?php echo CHtml::encode($data->username); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('password')); ?>:</b>
	<?php echo CHtml::encode($data->password); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php //echo CHtml::encode($data->email); ?>
    <?php //echo CFormatter::formatUrl($data->webpage); ?> <!---link url-->
    <?php echo Yii::app()->format->formatEmail($data->email); ?> <!--format email-->
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('first_name')); ?>:</b>
	<?php echo CHtml::encode($data->first_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('role')); ?>:</b>
	<?php echo CHtml::encode($data->role); ?>
	<br />
    
    <!---------------- tambah field(ket) --------------------------->
   <b><?php echo 'Keterangan'; ?>:</b>
	<?php //echo CHtml::encode(TblData::model()->FindByPk($data->id)->ket); ?>
	<?php echo CHtml::encode($data->TblDatas['ket']); ?>
	<br />
    
    <!---------------- tambah field(pic) --------------------------->
    <?php 
	/*	echo CHtml::link(tblData::propic_id($data->id,"medium"), $url=array("testForm/pic","id"=>tblData::pic_des($data->id),"layout"=>"fancy"),
											$htmlOptions=array("class"=>"view fancybox.iframe" ));	//!! DEFINE LANGSUNG DI TKP	 */
		
		//echo tblData::pic($data->id,'medium');
		//echo tblData::propic_id($data->id,'medium');
		//echo tblPic::pic_des($data->id);
		//**echo TblPic::model()->picLink($data->id,'medium');
	?>
  
	<?php echo tblPic::model()->pic($data->TblPics["filename_ori"],150,150); ?><br>
	<?php echo CHtml::encode($data->TblDatas['propic_id']); ?>
	<?php #echo tblPic::model()->picLink($data->TblDatas->propic_id,'medium'); ?>

</div>
<!--</div>-->
