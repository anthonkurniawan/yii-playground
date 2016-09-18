<h1>Test READ</h1>
<?php  //print_r($model); 
/*   ------------NOT SUCCESSS (CHtmlEx.php NOT FOUND) UDAH DI CARI
$properties = array(
    'id' => $this->action->id .'-grid',
    'dataProvider' => $dataProvider,
    'columns' => isset($columns) ? $columns : array(),
    'showTableOnEmpty' => false,
    'title' => 'sample',
);
$this->widget('ext.widgets.excelSheetViewV2.Excel.ExcelSheetView', $properties);
*/
?>

<?php
$this->widget('EExcelView', array(
     //'dataProvider'=>$model->search(),
	 //'dataProvider'=> $dataprovider,
     //'dataProvider'=> new CActiveDataProvider($model,array('pagination'=>false)),
	 'dataProvider'=> new $this->model,
	 'grid_mode'=>'export',
	 'title'=>'Title',
     'autoWidth'=>false,
     //'exportType'=>'PDF',
	 'exportType'=>'Excel2007',
	 'filename'=>'test_input.xls',
     'stream'=>false,     
     'columns'=>array(
                'id',
                'username',
				)
       
));
?>
