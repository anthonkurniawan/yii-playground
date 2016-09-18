
<?php //$this->layout='/layouts/column1'; ?>
<?php
$this->pageTitle=Yii::app()->name .' - Module'; 
$this->breadcrumbs=array(
	$this->module->id,
);
?>
<h1><small><?php echo $this->uniqueId . '/' . $this->action->id; ?> ( MODULE )</small></h1>

<p>
This is the view content for action "<?php echo $this->action->id; ?>".
The action belongs to the controller "<?php echo get_class($this); ?>"
in the "<?php echo $this->module->id; ?>" module.
</p>

<div class="scroll">
<?php echo"<b>this->module->id =". $this->module->id ."</b>" ?> 
<?php dump($this);?>   
</div><br />

<div class="view2">
<?php
	// //$modelClass=Yii::import($this->codeModel,true);			//cth : impot 'gii.generators.crud.CrudCode 
	// $modelClass=Yii::import( 'test_unit.crudCode');	 
	// $model=new $modelClass;							dump($model);
	// //$model->loadStickyAttributes();					dump($model); #index crud awal								
?>
</div>

<div class="row">
this->action->id : <b><?php echo $this->action->id; ?></b><br />
get_class(this) : <b><?php echo get_class($this); ?></b><br />
echo $this->module->id : <b><?php echo $this->module->id; ?></b><br />

You may customize this page by editing <tt><?php echo __FILE__; ?></tt> 
</div>



