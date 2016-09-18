<?php
$this->pageTitle=Yii::app()->name . ' - Error -';
$this->breadcrumbs=array(
	'Error',
);
?>

<h2>Error <?php echo $code; ?> </h2>

<div class="flash-error">
	<b><?php echo CHtml::encode($message); ?></b>
</div>

<p> Source File : <code><?php echo __FILE__; ?></p>

<!-------------------------------- MODIFIKASI ERROR ---------------------------------------->

<?php /*
switch($code){
	case 400:
		//$title = Yii::t('ui','Bad Request');
		$title = Yii::app('ui','Bad Request');
		$message = Yii::app('ui','Please do not repeat the request without modifications.');
		//$contact = Yii::app('ui','If you think this is a server error, please contact');
		break;
	case 401:
		$title = Yii::app('ui','Access denied');
		$message = Yii::app('ui','You are not allowed to perform this action.');
		//$contact = Yii::app('ui','If you think this is a server error, please contact');
		break;
	case 403:
		$title = Yii::app('ui','Unauthorized');
		$message = Yii::app('ui','You do not have the proper credential to access this page.');
		//$contact = Yii::app('ui','If you think this is a server error, please contact');
		break;
	case 404:
		$title = Yii::app('ui','Page Not Found');
		$message = Yii::app('ui','Please make sure you entered a correct URL.');
		//$contact = Yii::app('ui','If you think this is a server error, please contact');
		break;
	case 500:
		$title = Yii::app('ui','Internal Server Error');
		$message = Yii::app('ui','An internal error occurred while the Web server was processing your request.');
		//$contact = Yii::app('ui','Please contact');
		break;
	case 503:
		$title = Yii::app('ui','Service Unavailable');
		$message = Yii::app('ui','Our system is currently under maintenance. Please come back later.');
		//$contact = Yii::app('ui','Contact for more information');
		break;
	default:
		$title = Yii::app('ui','Error').' '.$error['code'];
		$message = nl2br(CHtml::encode($error['message']));
		//$contact = Yii::app('ui','If you think this is a server error, please contact');
		break;
}	*/ 
?>

<!--
<h2>
<?php //echo $title; ?>
</h2>
<p>
<?php //echo $message; ?>
</p>
<p>
<?php //echo $contact; ?>
<?php //echo CHtml::mailto(Yii::app()->params['adminEmail']); ?>
</p>
<p>
<?php //echo CHtml::link(Yii::app('ui', 'Return to homepage'),Yii::app()->homeUrl); ?>
</p>
-->