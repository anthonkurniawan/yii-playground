<div class="form">
COBA BUAT FUNCTION JAVA SCRIPT UNTUK SUBMIT FORM UTK HANDLE ERROR VALIDASI!!!!!!!!!!!!
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'products-form',
	'enableAjaxValidation'=>true,
    'enableClientValidation'=>true,
	'focus'=>array($model),
)); ?>

<?php //print_r($form->errorSummary($model)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'catID'); ?>
		<?php echo $form->textField($model,'catID', array('size'=>5,'maxlength'=>5,'readonly'=>'true',)); ?>
        <?php 
			$cat_model=Category::model()->findAll(); 
			print_r(CHtml::listData($cat_model,'catID','catName')); 
		?>
        <?php //echo $form->DropDownList($model,'catID',$cat_model->getdistinct('catID','catName'),array('prompt'=>'-Category ID-'));?>
        <?php echo $form->DropDownList($model, 'catID', CHtml::listData($cat_model,'catID','catName'), array('prompt'=>'-Category ID-'));?>
		<?php //echo $form->error($model,'catID'); ?>
        <?php echo $form->error(Category::model(),'catID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'supID'); ?>
		<?php echo $form->textField($model,'supID',array('size'=>5,'maxlength'=>5,'readonly'=>'true',)); ?>
        <?php 
			$sup_model=Suppliers::model()->findAll(); 
			print_r(CHtml::listData($sup_model,'supID','company')); 
		?>
        <?php echo $form->DropDownList($model, 'supID', CHtml::listData($sup_model,'supID','company'), array('prompt'=>'-Supplier ID-'));?>
		<?php //echo $form->error($model,'supID'); ?>
        <?php echo $form->error(Suppliers::model(),'supID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'item'); ?>
		<?php echo $form->textField($model,'item',array('size'=>20,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'item'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'price'); ?>
		<?php //echo $form->textField($model,'price',array('size'=>19,'maxlength'=>19)); ?>
        
         <?php
                $this->widget('application.extensions.moneymask.MMask',array(
                    'element'=>'#price,#total',
                    'currency'=>'PHP',
                    'config'=>array(
                        'symbolStay'=>true,
                        'thousands'=>'.',
                        'decimal'=>',',
                        'precision'=>0,
                    )
                ));
                //echo CHtml::textField('price', $_POST[price], array('id'=>'price'));
				echo $form->textField($model,'price',array('id'=>'price', 'size'=>19,'maxlength'=>19));
          ?>
          <?php echo $form->error($model,'price'); ?>
          
          test convert -->
		  <?php 
		  	echo str_replace(".","",$_POST[Products][price]);
			/*
			$x= explode(".", $_POST[Products][price]); echo $x; print_r($x);
			
			$string = $_POST[Products][price];        // The source number, as a string
			$a = explode(".",$string);            // Split the string, using the decimal point as separator
			$int = $a[0];                        // The section before the decimal point
			$dec = $a[1];                        // The section after the decimal point
			$gabung=$int.$dec;               echo "<br>gabung-->".$gabung; 
			$lengthofnum=strlen($dec);       echo "<br>lengthofnum-->".$lengthofnum;    // Get the num of characters after the decimal point
			$divider="1";                        // This sets the divider at 1
			$i=0;
			while($i < ($lengthofnum)) {
				$divider.="0";                    // Adds a zero to the divider for every char after the decimal point
				$i++;
			}
			$divider=(int)$divider;         echo "<br>divider-->".$divider; // Converts the divider (currently a string) to an integer
			$total=$int+($dec/$divider);    echo "<br>total-->".$total;   // compiles the total back as a numeric value
			*/
			?>
            
        <?php
		/*
		$this->widget('CMaskedTextField',array(
  	  		'model'=>$model,
    		'attribute'=>'price',
    		'name'=>'price',
    		'mask' => '9.999,99',
			//'charMap' => array('.'=>'[\.]' , ','=>'[,]'),  //with regex
    		'htmlOptions'=>array(
        	'style'=>'width:100px;'
    		),
		));	*/
		?>
        
        <!---------------------------- TEST1------------------------------------->
        <?php	/*
		$this->widget('application.extensions.moneymask.MMask',array(
    		'element'=>'#testing',
    		'currency'=>'PHP',
    		'config'=>array(
        	'showSymbol'=>true,
        	'symbolStay'=>true,
   			 )
		));
 
		echo CHtml::textField('testing', '', array('id'=>'testing'));		*/
		?>
        <!---------------------------- TEST2------------------------------------->
       
	</div>
    <!-- '$("#subFlag").val(1); alert($("#subFlag").val()); return false;'-->
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',$htmlOptions=array('name'=>'submit','onClick'=>'$("#subFlag").val(1); alert($("#products-form").val());' )); ?>
        <?php echo CHtml::hiddenField('submit_flag','0', $htmlOptions=array('id'=>'subFlag')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<!----------------- FUNGSI UTK CLOSE FANCY SETELAH SUBMIT---------------->   
<script type="text/javascript">	
//$(function() {	
	$(document).ready(function(){	
		$("form").submit(function() {
			//var nilai = $("#nilai").val();	
			//if(nilai!=""){ 
				$.post($("form").attr('action'), $("form").serializeArray());
    			//alert("The request has been submitted.");
				//alert($(this).serializeArray());
				if($(this).serializeArray()){
				parent.$.fancybox.close(); 
				}
			//}
			//else { $(".err").show(); $("#nilai").focus(); return false; }
 		 });
	});   
//});
</script> 
<!--------------------------------------->