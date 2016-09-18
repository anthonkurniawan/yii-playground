
<?php $this->layout='column1'; ?>
<?php
$this->breadcrumbs=array(
	$this->module->id,
);
?>

<div class="view2">

</div>

<div class="row">
this->action->id : <b><?php echo $this->action->id; ?></b><br />
get_class(this) : <b><?php echo get_class($this); ?></b><br />
echo $this->module->id : <b><?php echo $this->module->id; ?></b><br />

You may customize this page by editing <tt><?php echo __FILE__; ?></tt> 
</div>