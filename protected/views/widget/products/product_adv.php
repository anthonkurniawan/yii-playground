<?php
$this->breadcrumbs=array(
	'Products'=>array('index'),
	'Product Advance',
);

$this->menu=array(
	array('label'=>'List Products', 'url'=>array('index')),
	array('label'=>'Create Products', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('products-grid', {
		data: $(this).serialize()
	});
	return false;
});
");

?>

<h1>Manage Products - Advance</h1>


<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<!--------------------------- TEST POST&GET VARIABLE------------------------------->
<div class="tpanel">
	<span class="toggle"><?php echo Yii::t('ui','Load $model-array'); ?></span>
	<pre class="scroll">
<?php print_r( $model ); ?> <BR />
    </pre>
</div>

<!------------------------------------------------------->
<br />TESTING NUMBERR:
<?php
//string money_format ( string $format , float $number ) 
//setlocale(LC_MONETARY, 'en_US');
//echo money_format('%i', '30000');
echo number_format(3000000.00);
?>
<!------------------------------------------------------->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'products-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'proID','catID','supID',
		'item',//'category_name',
		array( 'name'=>'category_name', 'value'=>'$data->Category->catName',), 
		array( 'name'=>'category_desc', 'value'=>'$data->Category->desc',), 
		array( 'name'=>'suppliers_company', 'value'=>'$data->Suppliers->company',), 
		//array( 'name'=>'price', 'value'=>'$data->price','htmlOptions'=>array('width'=>'50px'),),  
		array( 'name'=>'price', 'value'=>'number_format($data->price)',), // CONVER VALUE TO number_format()
		/*array( 'name'=>'Category.catName', 
			   //'header'=>"Category Test",
			  'type'=>'raw',
			  //'value' =>'TblData::model()->FindByPk($data->id)->ket==null?"kosong":"ada"', //kalo mo kasih pilihan
			  'value' =>'Category::model()->FindByPk($data->catID)->catName',
			  'htmlOptions'=>array('width'=>'50px'),), //'value' =>'tblData::ket($data->id)', 
		*/
		//array( 'name'=>'Category.desc', 'value' =>'Category::model()->FindByPk($data->catID)->desc','htmlOptions'=>array('width'=>'50px'),),
		
		
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
