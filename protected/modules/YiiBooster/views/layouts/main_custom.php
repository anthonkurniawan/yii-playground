
<?php //echo"print_r(Yii::app()->catchAllRequest):"; print_r(Yii::app()->catchAllRequest); ?>

<!-----<div class="container">		GA PERLU ----->
<?php
// if(!Yii::app()->request->isAjaxRequest)
// {
	// $cs=Yii::app()->clientScript;
	// // $cs->registerCoreScript('jquery');
	// // $cs->registerCoreScript('yii');
	// $cs->registerScriptFile(bu('js/common.js'), CClientScript::POS_HEAD);
	// //$preload = array();
// }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
</head>

<body>
	
	<!-------------------------------------------------ISI CONTENT----------------------------------------------------->
	<?php echo $content; ?>
<!-----</div><!-- page -->

</body>
</html>