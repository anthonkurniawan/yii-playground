
<?php
$this->breadcrumbs=array(
	$this->module->id,
);
?>
<b>this->uniqueId : </b><?php echo $this->uniqueId . '/' . $this->action->id; ?><br />

<!---------------------------------- content ---------------------------------------->
<pre>
Dropdown Lists
In the nav bar you can use a dropdown to only contain a ul of anchors, which will act as a dropdown on hover. 
The individual entry includes a main link (which can lead to a top-level page) and the dropdown element. 
Note that dropdowns require the parent to have .has-flyout.
</pre>

<ul class="nav-bar">
	<li class="has-flyout">
 		<a href="#">Nav Item 2</a>
  		<a href="#" class="flyout-toggle"><span> </span></a>
  		<ul class="flyout">
    		<li><a href="#">Sub Nav Item 1</a></li>
    		<li><a href="#">Sub Nav Item 2</a></li>
    		<li><a href="#">Sub Nav 3</a></li>
    		<li><a href="#">Sub Nav 4</a></li>
    		<li><a href="#">Sub Nav Item 5</a></li>
  		</ul>
	</li>
</ul>


<!---------------------------------- FORM ---------------------------------------->
Contoh form :<br />
<?php
/** @var FounActiveForm*/
$model= new Products;

 $form=$this->beginWidget('foundation.widgets.FounActiveForm'); ?>

<?php echo $form->textFieldRow($model, "proID", array("placeholder" => "Standard Input")); ?>
<?php echo $form->textFieldRow($model, "catID", array("placeholder" => "Street")); ?>
<div class="row">
<div class="six columns">
<?php echo $form->textField( $model, "item", array("placeholder" => "City")); ?>
</div>
<div class="three columns">
<?php echo $form->textField( $model, "supID", array("placeholder" => "State")); ?>
</div>
<div class="three columns">
<?php echo $form->textField( $model, "price", array("placeholder" => "ZIP")); ?>
</div>
</div>
<?php echo $form->textArea( $model, "itemDesc", array("placeholder" => "Message")); ?>
<?php $this->endWidget(); ?>
<!------------------------------------------------------------------------------------->

<b>Input with a prefix character#</b>
<div class="row">
  <div class="four columns">
        <?php echo $form->textFieldRow($model, "item", array('prefix' => '#')); ?>
</div>
</div>










