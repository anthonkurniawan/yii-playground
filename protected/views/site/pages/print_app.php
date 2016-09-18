<!--EDIT INI UNTUK CONTENT YANG AKAN DI LOAD PADA (protected\views\layouts\main.php)-->
tona
<?php
$this->pageTitle=Yii::app()->name . ' - print_app';
$this->breadcrumbs=array(
	'print_app',
);
?>

<div style="overflow: auto; height: 400px; margin: 0px; padding:0px; margin: 0px 0px 0px 0px; border-top: 1px gray solid; border-left: 1px gray solid; border-right: 1px gray solid; border-bottom: 1px gray solid" >
<pre>
<?php 
//print_r(Yii::app()->components); 
print_r(Yii::app()); 
?>
</pre>
</div>

</p>
info this file :<br />
<ul>
	<li>View file: <tt><?php echo __FILE__; ?></tt></li>
	<li>Layout file: <tt><?php echo $this->getLayoutFile('main'); ?></tt></li>
</ul>
