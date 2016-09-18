<?php $this->pageTitle='Update-' . $model->id; ?>

<?php		//Xportlet/Xportlet_left
if(isset($_GET['layout'])=='fancy') {
	$this->layout='//layouts/Xportlet/Xportlet_print';
	//$this->layout='column1';
?>

<!----------------- FUNGSI UTK CLOSE FANCY SETELAH SUBMIT---------------->   
<script type="text/javascript">	alert("try submit..");
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

<?php } ?>

<?php echo $this->renderPartial('/Widget_CgridView/partial_file/_form', array('model'=>$model,'model2'=>$model2,'model3'=>$model3)); ?>
