<?php 
// $dataProvider=new CArrayDataProvider($rawData, array(
// ));
?>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'logs',
	'enablePagination'=>0,
	'enableSorting'=>1,
    'dataProvider'=>$dataProvider,
    //'filter'=>$dataProvider ,  // ga bisa "CArrayDataProvider ga punya getValidators"
                                                            //harus define "scenario" sperti "new TblUserMysql('search')"
    'columns'=>array(    
        'stamp','event',
    ),
));
?>
	<?php //$rawData=Yii::app()->db->createCommand('SELECT * FROM logs where id_user=\'$data->id\'')->queryAll(); ?>
<pre><?php //print_r($dataProvider); ?></pre>
