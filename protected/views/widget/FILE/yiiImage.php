<?php 
$this->layout='column2';
$this->pageTitle=Yii::app()->name . ' - Yii Image'; 
$this->breadcrumbs=array('widget/yiiImage',);
$this->renderPartial('/WIDGET/FILE/menu');
?>

<style> 
.span-23{ width: 1000px}
#percent{background-color: blue; color:white; width:0%; max-width:300px; text-align:center}
#preview{display:none}
.link_his{ margin:0; padding:0;}
.link_his_item{ margin-top:2px; width:27px;padding:1px; border: 1px solid blue}
.link_his_item img{ width:25px; height:25px; cursor:pointer}
</style>
<script src="<?php echo bu(). '/js/jquery.form.js';?>"></script> 
	
<!----------------------------------------------------------------- CMultiFileUpload with MODEL ---------------------------------------------------------------->
<div class="myBox">
<span class="badge badge-inverse">Sample Upload using "jquery.form.js" + edit image using "Yii-Image"</span>
<div class="left" style="margin-right:10px; margin-top:3px">
<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>

<?php echo CHtml::form($this->createUrl('widget/loadImage'), 'post', array('enctype'=>'multipart/form-data')); ?>
  <!--<input type="file" name="file_ajaxForm" multiple><br>-->
<?php echo CHtml::fileField('test_upload',null, array('id'=>'fileUpload', 'style'=>'width:190px', 'onChange'=>'$("#submit").show(100); $("#progress").show();')); ?><br>
 <?php echo CHtml::submitButton(Yii::t('ui', 'Load..'), array('id'=>'submit', 'style'=>'display:none')); ?>

<div id="progress" style="display:none">
	<div id="percent">0%</div >
</div>
<style> table tr td{border: 1px solid black; padding:0}</style>
<table id="formEdit" style="display:none; margin-top:5px;width:200px">
	<tr> 
		<td>Resize </td> 
		<td><?php echo Chtml::textField('re_width', null, array('size'=>5, 'placeholder'=>'width')); ?> <?php echo Chtml::textField('re_height', null, array('size'=>5,'placeholder'=>'height' )); ?> </td>
	</tr>
	<tr><td>Rotate </td> <td colspan="2"><?php echo Chtml::textField('rotate', null, array('size'=>5, 'placeholder'=>'degrees')); ?> </td></tr>
	<tr><td>Quality </td> <td colspan="2"><?php echo Chtml::textField('quality', null, array('size'=>9, 'placeholder'=>'amount 1-100')); ?> </td></tr>
	<tr><td>Sharpen </td> <td colspan="2"><?php echo Chtml::textField('sharp', null, array('size'=>9, 'placeholder'=>'amount 1-100')); ?>  <i>* def :20</i> </td></tr>
	<tr><td>Emboss </td> <td colspan="2"><?php echo Chtml::textField('emboss', null, array('size'=>5, 'placeholder'=>'radius 0-1')); ?> <i>* def :1</i> </td></tr>
	<tr><td>Grayscale </td> <td colspan="2"><?php echo Chtml::checkBox('grayscl', false, array()); ?> </td></tr>
	<tr><td>Negate </td> <td colspan="2"><?php echo Chtml::checkBox('negate', false, array()); ?> </td></tr>
	<tr><td>Flip </td> <td colspan="2"><?php echo Chtml::dropDownList('flip', null, array(5=>'Horizontal', 6=>'Vertical'), array('prompt'=>'')); ?> </td></tr>
	<tr><td>Save as </td> <td colspan="2"><?php echo Chtml::dropDownList('saveAs', null, array('jpg'=>'JPG', 'gif'=>'GIF', 'png'=>'PNG', 'tiff'=>'TIFF'), array('prompt'=>'')); ?> </td></tr>
	<tr>
		<td colspan="2">
		<?php echo Chtml::button('Edit', array('id'=>'editImage', 'class'=>'btn btn-sm btn-warning', 'style'=>'margin-right:10px')); ?>
		<?php echo Chtml::ajaxButton('Save', array('image/saveImage'), array(				
			'type'=>'POST',	//default: GET - not to set
			'data'=>'js: {filename: $("#filename").val()}',
			'dataType'=>'json',   #json, xml, html ( def : html - not to set )
			//'update'=>'#req1', 	
			// 'error'=> 'function(xhr, status, errorThrown) {  
				// $("#result").html("<b>>status :</b> "+ xhr.status + errorThrown + "<br>" + xhr.responseText);	# xhr.statusText sama dgn errorThrown
			// }',
			//'beforeSend' => 'function() {  $("#req1").addClass("loading"); }',
			'success' => 'function(data, status, xhr) { console.log(data); $("#status_ket").html(data.success + " <a href="+data.image_link+" style=margin-left:20px>view image</a>"); }', 
		), array('class'=>'btn btn-sm btn-primary')); ?>
		</td>
	</tr>
</table>

</div>

<div class="left" style="width:700px; min-height:250px; border:1px solid black; background:white">
	Filename : <?php echo Chtml::textField('filename', null, array('id'=>'filename', 'readonly'=>true, 'size'=>11)); ?>
	Occur : <?php echo Chtml::textField('occur', 0, array('id'=>'editOccur', 'readonly'=>true, 'style'=>'width:25px')); ?>
	History : <?php echo Chtml::textField('edit_his', null, array('id'=>'edit_history', 'readonly'=>true, 'style'=>'width:420px')); ?>
	<?php echo CHtml::endForm(); ?>
	
	<div class="clear"></div>
	<div class="left" style="width:610px; height:300px;margin:2px;background:whitesmoke; border:1px solid gray"> 
		<div id="preview"></div> 
	</div>
	<div id="link_history" class="left" style="display:none;overflow:auto;width:70px;height:310px;padding:0"></div>
	<div class="clear" style="margin-bottom:5px"></div>
	
	<div class="cmd_line"> &nbsp;<b>Status : </b> <span id="status_ket"></span> </div>
</div>

<script>								//alert( $.fn.yiiactiveform.$('form').submit  );
(function() {
	var progress = $('#progress');
	var percent = $('#percent');
	var preview = $('#preview');
	var status_ket = $('#status_ket');
	var formEdit = $('#formEdit');
	var file = $('#fileUpload');  //console.log( file.substring(12, file.length));
	var filename = $('#filename'); 
	var editOccur = $('#editOccur');
	var edit_history = $('#edit_history');
	var link_history = $('#link_history');
	
	// NEED "jquery.form.js"
	$('form').ajaxForm({
		beforeSend: function() {
			var percentVal = '0%';
			percent.width(percentVal)
			percent.html(percentVal);
			status_ket.text('Loading..');
		},
		uploadProgress: function(event, position, total, percentComplete) {
			var percentVal = percentComplete + '%';
			percent.width(percentVal);
			percent.html(percentVal);
			console.log(percentVal, position, total);
		},
		complete: function(xhr) {	console.log(xhr);
			$("#submit").hide();
			// preview.html(xhr.responseText).show();
			preview.html('<img src="'+xhr.responseText+'">').show();
			progress.hide();
			percent.empty();
			filename.val( file.val().substring(12, file.val().length));	// get filename to tag input
			formEdit.show(100);
			editOccur.val(0);	// reset counter edit if new filename
			edit_history.val(filename.val());
			link_history.html("");
			status_ket.text('load new file.. '+ xhr.responseText);
		}
	}); 
	
	$("#editImage").click(function(){		 
		$.ajax({
			type: 'POST',
			url: '<?php echo $this->createUrl('image/editImage'); ?>',
			data: $('form').serialize(),
			//crossDomain: true,
			//headers: {'accepts' : 'text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8'},
			//accepts: 'text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8',
			//contentType: 'text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8', //"jsonp", // Pay attention to the dataType/contentType
			dataType: 'json', // Pay attention to the dataType/contentType
			beforeSend: function() {
				preview.html("loading..");
			},
			success: function (data, status, xhr) { 	console.log(data); console.log(xhr);
				if(data.success){
					preview.html('<img align="center" src="'+data.success+'"/>').show();
					filename.val( data.success.substring(26, data.success.length) );		
					editOccur.val( parseInt( editOccur.val() ) + 1);
					edit_history.val( data.edit_history);
					//link_history
					var link =[];
					link.push('<ol class="link_his">');
					$.each(data.edit_history, function(key, val){ 	//alert(key+'=>'+val); 
						// link.push('<li class="link_his_item"> <a href="<?=bu('upload/_temp/');?>'+val+'"><img src="<?php echo Yii::app()->homeUrl;?>/upload/_temp/'+val+'"/></a> </li>');
						link.push('<li class="link_his_item"><img src="<?php echo Yii::app()->homeUrl;?>/upload/_temp/'+val+'" onClick="js:backToFile(\''+val+'\');"/> </li>');
					});
					link.push('</ol>');
					link = link.join("");
					link_history.html(link).show();
					status_ket.text('Edit successfully..  crete new file :('+ data.success +')');
				}
				else
					status_ket.html('<b class="txtAtt">'+ data.error +'</b>');
					
				progress.hide();
				percent.empty();
			},
			error: function (xhr, status, errorThrown) { console.log(status); console.log(errorThrown);
				status_ket.html( '<b class="txtAtt">'+errorThrown +'</b>' ); 
			}
		});
	});
})();       

function backToFile(i){	//alert(i);
	$('#filename').val(i);
	$('#preview').html('<img align="center" src="<?=bu(Yii::app()->params->uploadDir.'_temp/')?>'+i+'"/>');
}
</script>
 <?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<div class="clear"></div>

</div>

<div class="flash-error">
 Use <b>jquery.form.js</b> <code>$('form').ajaxForm({});</code>  hanya Optional saja. bisa dengna <code>$.ajax({});</code> biasa + form asal di set <code>'enctype'=>'multipart/form-data'</code> sudah bisa<br>
 lihat contoh pada  <b><?php echo CHtml::link('Basic Upload', array('image/basic_upload'), array('target'=>'_blank')); ?></b>
</div>
<div class="clear"></div>

<!------------------------------------------------ RENDER SOURCE CODE ----------------------------------------->	
<div class="tpanel right">
	<div class="toggle btn btn-sm btn-primary"><?php echo Yii::t('ui','Edit Image Controller'); ?></div>
	<?php $this->render_script(array('image/editImage')); /* from MediaController*/ ?>
</div>

<div class="tpanel right">
	<div class="toggle btn btn-sm btn-primary"><?php echo Yii::t('ui','Save Controller'); ?></div>
	<?php $this->render_script(array('image/saveImage')); /* from MediaController*/ ?>
</div>

<div class="tpanel right">
	<div class="toggle btn btn-sm btn-primary"><?php echo Yii::t('ui','Widget Code'); ?></div>
	<div><?php Yii::app()->sc->renderSourceBox();  ?></div>
</div>
<div class="clear"></div>