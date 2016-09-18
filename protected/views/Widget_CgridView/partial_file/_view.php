<?php //dump($_GET); ?>
<?php 
	switch($_GET['view'])
	{
		case"1":$view="<div class=\"view\">"; break;	
		case"2":$view="<div class=".(($index%2)==0?'first':'last') ." style=text-align:center>"; break;	
		default: $view="<div class=\"view\">"; break;
	}
	//echo"<b><br>viewwwwwwwwwwwwww".$view."</b><br>"; 
	//var_dump($view);
?>
<?php //echo"urut/index:". $index; ?>

<!--<div style="border:1px solid #F00; display:table">-->

<?php 
if($_GET['view']!=3) 
{ echo $view; 
?>
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
    <?php echo CFormatter::formatEmail($data->email); ?> <!--format email-->
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('first_name')); ?>:</b>
	<?php echo CHtml::encode($data->first_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('role')); ?>:</b>
	<?php echo CHtml::encode($data->role); ?>
	<br />
    
    <!---------------- tambah field(ket) --------------------------->
    <b><?php echo 'Keterangan'; ?>:</b>
	<?php echo CHtml::encode(TblData::model()->FindByPk($data->id)->ket); ?>
    <?php //echo TblData::model()->FindByPk($data->id)->ket; ?>
	<br />
    
    <!---------------- tambah field(pic) --------------------------->
    <?php 
	/*	echo CHtml::link(tblData::propic_id($data->id,"medium"), $url=array("testForm/pic","id"=>tblData::pic_des($data->id),"layout"=>"fancy"),
											$htmlOptions=array("class"=>"view fancybox.iframe" ));	//!! DEFINE LANGSUNG DI TKP	 */
		
		//echo tblData::pic($data->id,'medium');
		//echo tblData::propic_id($data->id,'medium');
		//echo tblPic::pic_des($data->id);
		echo tblPic::picLink($data->id,'medium');
	?>
    
	<br />path :<?php echo Yii::app()->baseUrl .'/upload/'. TblData::model()->FindByPk($data->id)->propic_id.'.png'; ?>
    <a  href="#" title="Tambah Nama"> test fancy</a><p>
</div>
<!--</div>-->
<?php
 } 
else 
{ ?>
<!--------------------------------------- SWICTH CUSTOM VIEW -------------------------------->
<div style="padding: 5px; display:table; width:700px " class="view">
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
   		<?php echo CFormatter::formatEmail($data->email); ?> <!--format email-->
		<br />

		<b><?php echo CHtml::encode($data->getAttributeLabel('first_name')); ?>:</b>
		<?php echo CHtml::encode($data->first_name); ?>
		<br />

		<b><?php echo CHtml::encode($data->getAttributeLabel('role')); ?>:</b>
		<?php echo CHtml::encode($data->role); ?>
		<br />
    
    	<!---------------- tambah field(ket) --------------------------->
    	<b><?php echo 'Keterangan'; ?>:</b>
		<?php echo CHtml::encode(TblData::model()->FindByPk($data->id)->ket); ?>
	</div>
    
	<div style="display:table-cell; padding:inherit; background:#F4F4F4">
  	  	<?php echo tblPic::picLink($data->id,'medium');?>
    
	  	<br />path :<?php echo Yii::app()->baseUrl .'/upload/'. TblData::model()->FindByPk($data->id)->propic_id.'.png'; ?>
  	 	 <a  href="#" title="Tambah Nama"> test fancy</a><p>
	</div>
</div>
<?php } ?>
