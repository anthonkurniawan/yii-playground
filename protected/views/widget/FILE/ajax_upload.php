<?php 
$this->pageTitle=Yii::app()->name . ' - Ajax Upload'; 
$this->breadcrumbs=array('image/ajax_upload',);
$this->renderPartial('/widget/FILE/menu');
?>

<script type="text/javascript" src="http://localhost/js/jquery/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="http://localhost/js/jquery/jquery.form.min.js"></script>
<style>
    form { padding: 10px 25px; }
    .uploader { border:1px solid #A9A9A9; width:400px; }
    label.uploader { background:url('../images/cloud.png') no-repeat center 4px; display:inline-block; height:35px; padding:0; padding-top:5px; width: 50px;  }
    input { border:0; display:inline-block; height:40px; outline:0; vertical-align:top; width:100px; }
    #uploadedImage, #status{margin-left:5px}
    #uploadedImage{padding-top:5px; }
    .progress { border:1px solid #A9A9A9; border-radius:4px; height:8px; margin:0; margin-top:5px; overflow:hidden; width:400px; }
    .bar { background:green; border-radius:2px; height:8px; width:0; }
 </style>
    
<span class="badge badge-inverse">Ajax File Upload(using jquery-form)</span>

<!---------------------- RESULT ------------------------->
<?php if (Yii::app()->user->hasFlash('success')): ?>
    <div class="flash-success">
        <?php echo Yii::app()->user->getFlash('success'); ?>
    </div>
<?php endif; ?>

<!------------------------------- #USE WITH CFORM ----------------------------------------->
<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>

	<?php echo CHtml::form('ajax_upload','post',array('enctype'=>'multipart/form-data', 'id'=>"uploadForm")); ?>
      
	<?php echo CHtml::errorSummary($model); ?>

	<?php echo CHtml::activeFileField($model,'name', array('id'=>"file", "style"=>"display:none;", "onchange"=>"sendFile(this);")); ?>
	<?php echo CHtml::error($model,"name"); ?>
	
	<?php echo CHtml::endForm(); ?>

<!-- input field, used to open the real input[type=file]  -->
<div class="uploader" onclick="fake();">
    <label class="uploader" for="uploader"></label>
    <input type="text" readonly="readonly" id="fake-uploader"/>
    <!-- preview -->
    <img id="uploadedImage" />
    <span id="status" />
</div>

<!-- progress bar -->
<div class="progress">
    <div class="bar" style="width:0%;"></div>
</div>
 Total : <span id="total"></span> <br>
 Ariived : <span id="position"></span> <br>
 Percent : <span id="percentComplete"></span>
 
<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>

<div class="clear"></div>
<div class="left">
	$model->image : <?php echo $model->name; ?>
	$model obj : <div class="scroll" style="width:545px"><?php dump($model); ?> </div>
</div>
<div class="clear"></div>

<div class="tpanel right">
	<div class="toggle btn btn-sm btn-primary"><?php echo Yii::t('ui','Code Form'); ?></div>
	<div class='scroll'><?php Yii::app()->sc->renderSourceBox();  ?></div>
</div>

<div class="tpanel right">
	<div class="toggle btn btn-sm btn-primary"><?php echo Yii::t('ui','View Controller'); ?></div>
	<?php $this->render_script(array('image/ajax_upload')); /* from MediaController*/ ?>
</div>


<script>
function fake() {   console.log($(this));
    $('#file').click();
}

function sendFile(el) {
	console.info(el);
    var $form = $('#uploadForm');
    var bar = $('.bar');
    var status = $('#status');
    
    if ($(el).val() == '') 
        return false;

    bar.css('width','0%');

    $form.ajaxSubmit({
        type: 'POST',
        uploadProgress: function(event, position, total, percentComplete) {     
            console.log('EVENT : ', event, 'POSITION : '+position, 'TOTAL : '+ total, 'PRECENT :'+percentComplete);
            bar.css('width', percentComplete+'%');
            $('#total').text(total);
            $('#position').text(position);
            $('#percentComplete').text(percentComplete);
        },
        error: function(event, statusText, responseText, form) { 
            console.log('EVENT : ', event, 'statusText : '+statusText, 'responseText : '+responseText, 'form : ',form);
            status.text(responseText);
        },
        success: function(responseText, statusText, xhr, form) { 
            console.log('responseText :', responseText, 'statusText : '+statusText, 'xhr : ', xhr, 'form : ', form);
            var ar = $(el).val().split('\\'),  
            filename =  ar[ar.length-1];  
            $('#fake-uploader').val(filename);

            $('#uploadedImage').attr('src', responseText);     
            $('<img/>').attr('src', responseText).appendTo($('body'))
            status.text(statusText);
        },
    });
}
</script>