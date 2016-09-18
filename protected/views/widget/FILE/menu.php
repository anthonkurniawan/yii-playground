<?php
$this->menu=array(
	array('label'=>'Basic Upload', 'url'=>array('image/basic_upload'), 'linkOptions'=>array('target'=>'_blank'), ),
    array('label'=>'Ajax Upload(jquery form)', 'url'=>array('image/ajax_upload'), 'linkOptions'=>array('target'=>'_blank'), ),
	array('label'=>'CMultiFileUpload', 'url'=>array('image/CMultiFileUpload', 'view'=>'CMultiFileUpload'), 'linkOptions'=>array('target'=>'_blank'), ),
	array('label'=>'yii-image-attach', 'url'=>array('gallery/create')),
	array('label'=>'yii-image(editing)', 'url'=>array('image/yiiImage', 'view'=>'yiiImage')),
	array('label'=>'Elfinder', 'url'=>array('image/elfinder', 'view'=>'elfinder') ),
	array('label'=>'EajaxUpload', 'url'=>array('image/EajaxUpload', 'view'=>'EajaxUpload'), 'linkOptions'=>array('target'=>'_blank'), ),
	array('label'=>'xupload-demo151', 'url'=>'http://localhost/yii/demos/xupload-demo151/', 'linkOptions'=>array('target'=>'_blank'), ),
	array('label'=>'' ),
	
	array('label'=>'Other Jquery Plugin', 'itemOptions'=>array('style'=>'font-weight:bold') ),
	array('label'=>'jQuery File Upload Demo', 'url'=>'http://localhost/testing/FILE_FUNC/AJAX/jQuery-File-Upload-master/', 'linkOptions'=>array('target'=>'_blank'), ),
	array('label'=>'Uploadfy Demo', 'url'=>'http://localhost/testing/FILE_FUNC/AJAX/uploadify/', 'linkOptions'=>array('target'=>'_blank'), ),
	array('label'=>'using jquery.form', 'url'=>'http://localhost/testing/FILE_FUNC/AJAX/SIMPLE_AJAX_UPLOAD2.HTML', 'linkOptions'=>array('target'=>'_blank'), ),
);
?>