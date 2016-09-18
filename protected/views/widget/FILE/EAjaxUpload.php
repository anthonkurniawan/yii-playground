<?php $this->layout='column2';?>
<?php $this->pageTitle='EAjaxUpload';?>

<?php
$this->pageTitle=Yii::app()->name . ' - EAjaxUpload'; 
$this->breadcrumbs=array('Eajaxupload',);
?>
<!-- side menu-->
<?php $this->renderPartial('/WIDGET/FILE/menu'); ?>

<a href="http://localhost/testing/FILE_FUNC/AJAX/file-uploader-master/test/jquery.html" target="_blank" >Demo original Version</a> |
<a href="http://localhost/testing/FILE_FUNC/AJAX/file-uploader-master/test/sample1.html" target="_blank">My custom</a> 

<a href="http://www.yiiframework.com/extension/eajaxupload/" target="_blank" style="float:right"><b>EAjaxUpload Extension</b></a><br /><br>

<!-------------------------- CONTENT ---------------------------------->
<div class="box">
	<div class="view txtAtt"> lebih lengkap yg versi original. dan tidak bisa matikan fungsi auto upload ( harus modif sdr )</div>

<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
<?php
$this->widget('ext-coll.UPLOAD_GALLERY.EAjaxUpload.EAjaxUpload',
array(
        'id'=>'uploadFile',
        'config'=>array(
               'action'=>Yii::app()->createUrl('image/upload_eAjaxUpload'),
               'allowedExtensions'=>array("jpg","png","gif", "mkv"),//array("jpg","jpeg","gif","exe","mov" and etc...
               'sizeLimit'=>100*1024*1024,// maximum file size in bytes
               'minSizeLimit'=>0*1024*1024,// minimum file size in bytes
			  // 'autoUpload'=>false,   (GA BERFUNGSI)
               'onComplete'=>"js:function(id, fileName, responseJSON){ 
					$('#res').text( 'id : ' +id + ', fileName (source) :' + fileName + ', status : ' + responseJSON.success  + ', copied : ' + responseJSON.filename ); 
				}",
               // 'messages'=>array(
                    // 'typeError'=>"{file} has invalid extension. Only {extensions} are allowed.",
                    // 'sizeError'=>"{file} is too large, maximum file size is {sizeLimit}.",
                    // 'minSizeError'=>"{file} is too small, minimum file size is {minSizeLimit}.",
                    // 'emptyError'=>"{file} is empty, please select files again without it.",
                    // 'onLeave'=>"The files are being uploaded, if you leave now the upload will be cancelled."
                // ),
               // 'showMessage'=>"js:function(message){ alert(message); }"
			   
			   'onSubmit'=>'js:function(file, ext){		
					var del=$("#delete-previous-checkbox").is(":checked") ? 1 : 0;
					this.params.delete = del;
				}',
              )
));
?>

<!------------------------------------- RESULT ------------------------------------------>
<code id='res'>..result..</code>

<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>

</div>

<div class="tpanel left">
	<div class="toggle btn btn-sm btn-primary"><?php echo Yii::t('ui','Code View'); ?></div>
	<div class='scroll'><?php Yii::app()->sc->renderSourceBox();  ?></div>
</div>

<div class="tpanel left">
	<div class="toggle btn btn-sm btn-primary"><?php echo Yii::t('ui','Upload Action Con'); ?></div>
	<div><?php $this->render_script(array('image/upload_eAjaxUpload')); ?></div>
</div>
	
