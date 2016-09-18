<b class="txtHead">Yii::app()->user->returnUrl :</b><?php echo  Yii::app()->user->returnUrl;?><br>

<?php
if(isset($_GET['layout'])) $this->layout='column1';
//$this->layout='column1';
//print_r($this);
//print_r($_POST);

//echo "model->id :".$model->id;
$this->breadcrumbs=array(
	'Test Form'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List user', 'url'=>array('index')),
	array('label'=>'Create user', 'url'=>array('create')),
	array('label'=>'View user', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage user', 'url'=>array('admin')),
);
?>

<div class="tpanel">
	<span class="toggle"><?php echo Yii::t('ui','Load Model(print_r($model)'); ?></span>
	<pre class="scroll2" style="font-size:9px">
		<? print_r($model); ?>
	</pre>
</div>

<!----------------- FUNGSI UTK CLOSE FANCY SETELAH SUBMIT---------------->   
<script type="text/javascript">	
//$(function() {	
	$(document).ready(function(){	
		$("form").submit(function() {  alert("try submit..");
				//$.post($("form").attr('action'), $("form").serializeArray());
				//$.post(	$("form").attr('action'), 
					//		if($("form").serializeArray()) alert("The request has been submitted.");   );
    						//alert("The request has been submitted.");
							//alert($(this).serializeArray());
							alert($("form").serializeArray());
					
				var error=$('.errorSummary p').text();	//alert ($('.errorSummary p').text());  GA BERHASIL ERROR BELUM DI LOAD TAPI SUDAH CEK
				alert(error);  
				//if($(this).serializeArray()&& error!=null) 
				if( error!=null))
					 { alert(error); return false } 
				else {	parent.$.fancybox.close(); }
				//**return false;
			//else { $(".err").show(); $("#nilai").focus(); return false; }
 		 });
	});   
//});
</script> 
<!--------------------------------------->

<h1>Update user (Custom with TbldData) : <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('actionForm/_form', array('model'=>$model,/*'model2'=>$model2, 'model3'=>$model3,*/)); ?>