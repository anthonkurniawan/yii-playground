
	
 <div class="row box">
  Using CMultiFileUpload :
  <?php 
	$this->widget('CMultiFileUpload',array(
		'name'=>'file_cmultiFile',
		'accept'=>'jpg|png',
		'max'=>3,
		'remove'=>Yii::t('ui','Remove'),
		//'denied'=>'', message that is displayed when a file type is not allowed
		//'duplicate'=>'', message that is displayed when a file appears twice
		'htmlOptions'=>array('size'=>25),
	));
	?>		<p class="hint">hint text</p>
</div>
	
 <div class="row box">
<!--<form action="simple_ajax_upload.php" method="post" enctype="multipart/form-data" onsubmit="startUpload();" >-->
#using ajaxForm (Jquery.form.js)
summary : tapi jadi ada 2POST yg di submit, 1 json, 2 via ajaxForm
<script src="<?php echo bu(). '/js/jquery.form.js';?>"></script> 
 
	<span id="result"></span>
 
    <input type="file" name="file_ajaxForm" multiple><br>
	
    <div class="progress">
        <div class="bar"></div >
        <div class="percent">0%</div >
    </div>
    
    <div id="status"> -status-</div>
</div>

<script>								//alert( $.fn.yiiactiveform.$('form').submit  );
(function() {
	var bar = $('.bar');
	var percent = $('.percent');
	var status = $('#status');
   
	$('form').ajaxForm({
		beforeSend: function() {
			status.empty();
			var percentVal = '0%';
			bar.width(percentVal)
			percent.html(percentVal);
		},
		uploadProgress: function(event, position, total, percentComplete) {
			var percentVal = percentComplete + '%';
			bar.width(percentVal)
			percent.html(percentVal);
			console.log(percentVal, position, total);
		},
		complete: function(xhr) {
			status.html(xhr.responseText);
		}
	}); 
	
	// sample Via "ajaxSubmit" (attach handler to form's submit event )
	// $('form').submit(function() { 
		// // submit the form 
		// $(this).ajaxSubmit({ 
			// beforeSend: function() {
				// status.empty();
				// var percentVal = '0%';
				// bar.width(percentVal)
				// percent.html(percentVal);
			// },
			// uploadProgress: function(event, position, total, percentComplete) {
				// var percentVal = percentComplete + '%';
				// bar.width(percentVal)
				// percent.html(percentVal);
				// console.log(percentVal, position, total);
			// },
			// complete: function(xhr) {
				// status.html(xhr.responseText);
			// }
		// });
		// // return false to prevent normal browser submit and page navigation 
		// return false; 
	// });

})();       

	function startUpload(){			
		document.getElementById('upload').style.visibility = 'visible';
		return true;
	}
		
	function stopUpload(success){
		var result = '';
		if (success == 1){
			document.getElementById('result').innerHTML =
			'<span class="msg">The file was uploaded successfully!<\/span><br/><br/>';
		}
		else {
			document.getElementById('result').innerHTML =
			'<span class="emsg">There was an error during file upload!<\/span><br/><br/>';
		}
		document.getElementById('upload').style.visibility = 'hidden';
		return true;
		}
</script>


<!--------------------------EAjaxUpload. ---------------------------------->

<div >
<?php
$this->widget('ext-coll.UPLOAD_GALLERY.EAjaxUpload.EAjaxUpload',
	array(
        'id'=>'uploadFile',
        'config'=>array(
               'action'=>Yii::app()->createUrl('widget/upload'),
               'allowedExtensions'=>array("jpg","png","gif", "mkv"),//array("jpg","jpeg","gif","exe","mov" and etc...
               'sizeLimit'=>100*1024*1024,// maximum file size in bytes
               'minSizeLimit'=>0*1024*1024,// minimum file size in bytes
			   'auto'=>false,
               'onComplete'=>"js:function(id, fileName, responseJSON){ 
					$('#res').text( 'id : ' +id + ' fileName (source) :' + fileName + ' status : ' + responseJSON.success  + ' copied : ' + responseJSON.filename ); 
				}",
               // 'messages'=>array(
                    // 'typeError'=>"{file} has invalid extension. Only {extensions} are allowed.",
                    // 'sizeError'=>"{file} is too large, maximum file size is {sizeLimit}.",
                    // 'minSizeError'=>"{file} is too small, minimum file size is {minSizeLimit}.",
                    // 'emptyError'=>"{file} is empty, please select files again without it.",
                    // 'onLeave'=>"The files are being uploaded, if you leave now the upload will be cancelled."
                // ),
              // 'showMessage'=>"js:function(message){ alert(message); }",
			   
			   'onSubmit'=>'js:function(file, ext){		
					var del=$("#delete-previous-checkbox").is(":checked") ? 1 : 0;
					this.params.delete = del;
				}',
		)
));
?>

</div> <!-- box-->

<!------------------------------------- RESULT ------------------------------------------>
<div id='res' >..result..</div>
