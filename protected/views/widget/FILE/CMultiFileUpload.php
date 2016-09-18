<?php $this->layout='column2';?>
<?php $this->pageTitle='CMultiFileUpload';?>
http://www.webdeveloperjuice.com/2010/02/13/7-trusted-ajax-file-upload-plugins-using-jquery/

<!-- side menu-->
<?php $this->renderPartial('/WIDGET/FILE/menu'); ?>


<div class="myBox">
<span class="badge badge-inverse"><?php echo Yii::t('ui','CMultiFileUpload');?></span>

The uploaded file information can be accessed via <code>$_FILES[widget-name]</code>, which gives an array of the uploaded<br>
you have to set the enclosing <code>form's 'enctype'</code> attribute to be <code>'multipart/form-data'</code>.<br>

<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>

<?php echo CHtml::form($this->createUrl('image/CMultiFileUpload_Upload'), 'post', array('enctype'=>'multipart/form-data')); ?>

<?php $this->widget('CMultiFileUpload',array(
	//'model'=>$model,  if using model
	'name'=>'test_upload',
	'accept'=>'jpg|png',
	'max'=>3,
	'remove'=>Yii::t('ui','Remove'),
	//'selected'=>'', msg wheb slelct file
	//'denied'=>'', message that is displayed when a file type is not allowed
	//'duplicate'=>'', message that is displayed when a file appears twice
	//'file'=>'', string the message template for displaying the uploaded file name
	'htmlOptions'=>array('size'=>25),
)); ?>
<br />
<?php echo CHtml::submitButton(Yii::t('ui', 'Upload')); ?>
<?php echo Yii::t('ui','NB! Access restricted by IP');?>
<?php echo CHtml::endForm(); ?>

<?php 
$files = $this->findFiles('upload/');
if($files) :
?>
<ul>
<?php foreach($files as $filename) : ?>
	<li>
	<?php echo CHtml::image( bu($filename), $filename, array('height'=>30)); ?>
	<?php echo CHtml::link($filename, Yii::app()->baseUrl.'/'.$filename, array('rel'=>'external'));?>
	| <?php echo CHtml::link('Remove', array('image/removeImage', 'dir'=>'/upload', 'file'=>$filename));?></li>
	</li>
<?php endforeach; ?>
</ul>

<?php 
echo CHtml::link('Remove All', array('image/removeImage'));
endif;
?>

<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>

<!------------------------------------------------------ CODE ------------------------------------------------------------->
<div class="tpanel right">
	<div class="toggle btn btn-sm btn-primary"><?php echo Yii::t('ui','Widget Code'); ?></div>
	<div><?php Yii::app()->sc->renderSourceBox();  ?></div>
</div>

<div class="tpanel right">
	<div class="toggle btn btn-sm btn-primary"><?php echo Yii::t('ui','Upload Code'); ?></div>
	<div class='scroll'><?php $this->render_script(array('image/CMultiFileUpload_Upload')); ?></div>
</div>
<div class="clear"></div>
</div>

<!----------------------------------------------------------------- CMultiFileUpload with MODEL ---------------------------------------------------------------->
<div class="myBox">
<span class="badge badge-inverse"><?php echo Yii::t('ui','CMultiFileUpload with Model');?></span>

<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>

<?php echo CHtml::form($this->createUrl('CMultiFileUpload_Upload'), 'post', array('enctype'=>'multipart/form-data')); ?>
<?php
    $this->widget('CMultiFileUpload', array(
		'name'=>'test_upload',
		'model'=>new Gallery,	# not impleted
		'attribute'=>'title',
		'accept'=>'jpg|gif',
		'max'=>10, # the maximum number of files that can be uploaded.
		'denied'=>'Salah bung..',
		'duplicate'=>'udah ada bung..',
		//'file'=>'',	# the message template for displaying the uploaded file name
		'remove'=>'hapus file',	# the label for the remove button.
		'selected'=>'file selected',
		'options'=>array(
			'onFileSelect'=>'function(e, v, m){ console.log(m); }',
			 // 'afterFileSelect'=>'function(e, v, m){ $("#submit").show(100); $("#progress").show(); }',
			// // 'onFileAppend'=>'function(e, v, m){ alert("onFileAppend - "+v) }',
			// // 'afterFileAppend'=>'function(e, v, m){ alert("afterFileAppend - "+v) }',
			// 'onFileRemove'=>'function(e, v, m){ alert("onFileRemove - "+v) }',
			// 'afterFileRemove'=>'function(e, v, m){ $("#submit").hide(100);  }',
		),
    ));
  ?>
 <?php echo CHtml::submitButton(Yii::t('ui', 'Upload')); ?>
<?php echo CHtml::endForm(); ?>

 <?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
 
 <div class="tpanel right">
	<div class="toggle btn btn-sm btn-primary"><?php echo Yii::t('ui','Widget Code'); ?></div>
	<div><?php Yii::app()->sc->renderSourceBox();  ?></div>
</div>
<div class="clear"></div>
</div>
 
 <!----------------------------------------------------------------- multiple-file-upload/ JQUERY ---------------------------------------------------------------->
<div class="view2">
<h3><?php echo Yii::t('ui','Read more'); ?></h3>
<a target="_blank" href="http://www.fyneworks.com/jquery/multiple-file-upload/">http://www.fyneworks.com/jquery/multiple-file-upload/</a>
	
<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP')); ?>
$.upload( form.action, new FormData( myForm))
.progress( function( progressEvent, upload) {
    if( progressEvent.lengthComputable) {
        var percent = Math.round( progressEvent.loaded * 100 / progressEvent.total) + '%';
        if( upload) {
            console.log( percent + ' uploaded');
        } else {
            console.log( percent + ' downloaded');
        }
    }
})
.done( function( data) {
    console.log( 'Finished upload');

    // add your code for rendering the server response
    // into html here
});
<?php $this->endWidget(); ?>
</div>