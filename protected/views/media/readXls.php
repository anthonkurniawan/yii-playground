<?php
$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Manage',
);
?>

<h1>Manage Users</h1>
<?php print_r($model->search()); ?>
<!----------------------------- TABLE LIST ----------------------------->
<?php 
/*
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-grid',
	'dataProvider'=>$model->search(),
	//'dataProvider'=>$model,
	//'filter'=>$model,	//form filter/search
	'columns'=>array(
		'id',
		'username',
		'password',
		'email',
		'first_name',
		'role',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); 
*/?>

<?php
/*
$factory = new CWidgetFactory();    
        $widget = $factory->createWidget($this, 'EExcelView', array(
            'dataProvider'=>$provider,
            'grid_mode'=>'export',
            'title'=>'Title',
            'filename'=>'report.xlsx',
            'stream'=>false,
            'exportType'=>'Excel2007',
            'columns'=>array(
                'col1',
                'col2',
            ),
        ));
 
        $widget->init();
        $widget->run();
		*/
?>