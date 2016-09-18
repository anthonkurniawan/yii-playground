<style>
.span-19 { width:800px } 
.list-view { width:770px}
</style>

<!--<div style="padding: 5px; display:table; width:700px " class="view">-->
<div class="view left"  style="display:block; margin:5px; float:left; padding:5px; width:350px; border:1px solid #ccc;"> 
<?php echo $index; ?>
	<div style="display:table-cell; padding:inherit; vertical-align:middle; border: 1px thin solid #0C0; background:#E9E9E9">
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
   		<?php //echo CFormatter::formatEmail($data->email); ?> <!--format email-->  
		<?php echo Yii::app()->format->formatEmail($data->email); //CFormatter ?> 
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
	</div>
    
	<div style="display:table-cell; padding:inherit; background:#F4F4F4">
  	  	<?php //echo tblPic::picLink($data->id,'medium');?>
		<?php echo tblPic::model()->pic($data->TblPics["filename_ori"],150,150); ?><br>
	</div>
	
</div>
<!--<div style="clear:both"></div>-->