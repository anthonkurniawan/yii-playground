array $_GET:<?php echo print_r($_GET); ?> <br /><!------- TESTING --------->

<!---------------------------- CONTENT ------------------------------------->
<?php if($_GET['layout']) $this->layout='column1_custom';?>
<?php
echo CHtml::image(Yii::app()->baseUrl."../upload/".$file
		//$alt=$data->TblPics["filename_ori"], 
		//array( "width"=>"30", "height"=>"30","title"=>$data->TblDatas["ket"] )
	);
?>

<?php echo tblPic::model()->pic($file, 150, 150); ?><br />