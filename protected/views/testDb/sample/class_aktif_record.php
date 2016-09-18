<style>
	div .test{ font-family:Arial, Helvetica, sans-serif; font-size:smaller}
	div .test b{ font-size:11px}
</style>

ACTIVE RECORD (INSTANCE)
<div class="test">
	<div class="ket"> 
      <b>NOTE: <br /> 
      <ul><li>yii -> Yiibase -> CWebApplication -> CApplication -> CModule->CComponent (include class CEvent extends CComponent)</li>
      	<li>SiteController -> Controller ->CController ->CAccessControlFilter</li>
    	</ul></b>
	</div>

	<div class="view"> 
		<b>nama-model</b> extends 
    <a href="http://localhost/yiidoc/CActiveRecord.html" target="_blank"> CActiveRecord</a> extends 
    <a href="http://localhost/yiidoc/CModel.html" target="_blank">CModel</a> extends 
    <a href="http://localhost/yiidoc/CComponent.html" target="_blank">CComponent</a> implements IteratorAggregate, ArrayAccess
	</div>
  
</div>
<!--------------TESTING ----------------->
<pre>
<?php
	$newProduct = new Products;
	$dataProduct = Products::model()->findByPk(1);
	//print_r($model->attributes);
	//print_r($model->dbConnection);
	print_r($dataProduct->relations());

?>
</pre>

<!----------------------------------- CONTENT ----------------------------------------->
<pre class="scroll" style="float:left;width:470px">
<b class="txtKet"> new TblUserMysql</b>
Foreach key :<?php foreach(new TbluserMysql as $key=>$value) { echo $key.", &nbsp;"; } ?><br />
<?php print_r(new TbluserMysql); ?>
</pre>

<pre class="scroll" style="float:left;width:470px">
<b class="txtKet">new TblUserMysql('search');</b>
Foreach key :<?php foreach(new TblUserMysql('search') as $key=>$value) { echo $key.", &nbsp;"; } ?><br />
<?php print_r(new TblUserMysql('search1')); ?>
</pre>

<?php $find = TbluserMysql::model()->find('role=1 AND active=1'); ?>
<pre class="scroll" style="float:left;width:470px">
<b class="txtKet">$find = TbluserMysql::model()->find('role=1 AND active=1');</b>
Foreach key :<?php foreach($find as $key=>$value) { echo $key.", &nbsp;"; } ?><br />
Foreach value :<?php foreach($find as $key=>$value) { echo $value.", &nbsp;"; } ?><br />
<?php print_r($find); ?>
</pre>

<?php $findAll = TbluserMysql::model()->findAll('role=1 AND active=1'); ?>
<pre class="scroll" style="float:left;width:470px">
<b class="txtKet">TbluserMysql::model()->findAll('role=1 AND active=1')</b>
Foreach key : <?php foreach($findAll as $key=>$value) { print_r($key); } ?><br />
<?php print_r( $findAll ); ?>
</pre>

<?php $findByPk = TbluserMysql::model()->findByPk('1'); ?>
<pre class="scroll" style="float:left;width:470px">
<b class="txtKet">TbluserMysql::model()->findByPk('1')</b>
<?php print_r( $findByPk ); ?>
</pre>

<?php $findAllByPk = TbluserMysql::model()->findAllByPk('1'); ?>
<pre class="scroll" style="float:left;width:470px">
<b class="txtKet">TbluserMysql::model()->findAllByPk('1')</b>
<?php print_r( $findAllByPk ); ?>
</pre>


<!--<div class="view test">
	<?php //print_r(Yii::app()->db2); ?>
</div>-->


