
<?php
$this->menu=array(
	array('label'=>'Grid Default', 'url'=>array('userMysql/admin'), 'linkOptions'=>array('target'=>'_blank')),
	array('label'=>'GridView Custom', 'url'=>array('gridJoin'), 'linkOptions'=>array('target'=>'_blank')),
	array('label'=>'---Asset Sample------'),
	array('label'=>'with Bootstrap', 'url'=>'http://localhost/yii/Asset/index.php/products/admin', 'linkOptions'=>array('target'=>'_blank')),
	array('label'=>'Product  Stock', 'url'=>'http://localhost/yii/Asset/index.php/products/product_adv', 'linkOptions'=>array('target'=>'_blank')),
	
	array('label'=>'------------ ajax ------------'),
	array('label'=>'GridView ( Ajax )', 'url'=>array('ajax/admin_ajax'), 'linkOptions'=>array('target'=>'_blank')),
	array('label'=>'GridView With Ajax(CJSON)',  'url'=>array('ajax/admin_ajax2'), 'linkOptions'=>array('target'=>'_blank')),
	array('label'=>'Grid Custom Style', 'url'=>array('grid_dynamic_style'), 'linkOptions'=>array('target'=>'_blank')), 
	array('label'=>'Grid with "eupdatedialog"', 'url'=>array('gridEupdatedialog'), 'linkOptions'=>array('target'=>'_blank')), 
	array('label'=>'Grid with Resize', 'url'=>array('Widget_CgridView/gridResize'), 'linkOptions'=>array('target'=>'_blank')),
	array('label'=>'----Other Grid Ext ----'),
	array('label'=>'groupgridview', 'url'=>array('widget/groupgridview'), 'linkOptions'=>array('target'=>'_blank')),
	array('label'=>'jtogglecolumn', 'url'=>array('widget/jtogglecolumn'), 'linkOptions'=>array('target'=>'_blank')),
	array('label'=>'EDataTables', 'url'=>array('widget/EDataTables'), 'linkOptions'=>array('target'=>'_blank')),
);
?>