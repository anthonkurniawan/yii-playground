<?php
class ChartController extends Controller
{
	public $layout='//layouts/column1';
	
	public function actions(){
        return array(
			'openFlash'=>array('class'=>'CViewAction',  'basePath'=>'/WIDGET/GRAFIK'),
			'openFlash_custom'=>array('class'=>'CViewAction',  'basePath'=>'/WIDGET/GRAFIK'),
			'highchart'=>array('class'=>'CViewAction',  'basePath'=>'/WIDGET/GRAFIK'),
			'highchart_custom'=>array('class'=>'CViewAction',  'basePath'=>'/WIDGET/GRAFIK'),
			'highchart_dynamic_html'=>array('class'=>'CViewAction',  'basePath'=>'/WIDGET/GRAFIK'),
			'highchart_dynamic'=>array('class'=>'CViewAction',  'basePath'=>'/WIDGET/GRAFIK'),
			'highchart'=>array('class'=>'CViewAction',  'basePath'=>'/WIDGET/GRAFIK'),
			'highchart'=>array('class'=>'CViewAction',  'basePath'=>'/WIDGET/GRAFIK'),
		);
	}	
	
	public function actionReqData_dynamic(){
		$val1 = rand(30, 100);
		$val2 = rand(30, 100);
		$val3 = rand(30, 100);
		//[216.4, 194.1, 95.6]
		$arr['data'] = 
			array(
				array('disk use', $val1), 
				array('name'=>"BMS DB", 'y'=>$val2,  'sliced'=> true, 'selected'=> true),
				array('Disk Free', $val3)
			);
		echo json_encode($arr);
	}
	
	public function actionHighChart_interval() {
		$data ='[[1354406400000,2],[1354838400000,4],[1362182400000,273],[1362268800000,276],[1362355200000,3],[1363478400000,2]] ';
		$this->render('grafik/highChart_interval', array('data'=>$data));
	}
	
	public function actionHighchart_custom_adv() {
		$sql= "SELECT *  FROM logs ";
		$command = Yii::app()->db->createCommand($sql);
		$rawData = $command->queryAll();								//dump($rawData);

		foreach ($rawData as $key=>$value) {		//dump($key);
			$event[] = $value['id_user'];
			$date[] = date( 'Y-m-d', strtotime($value['stamp']) );		//date('Y-m-d',strtotime($_POST["date"]));
			//$data2[] = (int)$value;
		}
		
		$data =  array(29.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4); //dummy
		$this->render('grafik/highchart_custom_adv', array('event'=>$event, 'date'=>$date, 'data'=>$data));
	}
	
	public function actionReq_data_group() {
		#count group event
		$sql="SELECT count( * ) as count , event, id_user, stamp
				  FROM LOGS
				  GROUP BY stamp ASC ";
		
		$command = Yii::app()->db->createCommand($sql);
		$rawData = $command->queryAll();	//dump($rawData);
		
		date_default_timezone_set('UTC'); 		//rubah timezone ke "UTC" (kalo set ke "asia" malah mundur 1day / mungkin di js highchart nya bisa di rubah dr JS nya )

		foreach ($rawData as $key=>$value) {
			//$data1[] = $key;
			$data_arr[] = array( $value['stamp'], (int)$value['count'] );
			$data[] = array(  strtotime($value['stamp']) *1000 , (int)$value['count'] );
		}		//dump($data_arr);
		//echo CJSON::encode($data);
		echo json_encode($data);
	}
	
	public function actionReq_data() {
		$logs = Logs::model()->findAll();
		$listData = CHtml::listData($logs, 'index', 'id', 'stamp');		//dump($listData);
		
		foreach ($listData as $key=>$value) {
			$data1[] = $key;
			$data2[] = (int)$value;
		}
		//dump($data1); 	//dump($data2); 
		
		//------------------------------------------------------------------------
		$sql= "SELECT *  FROM logs ";
		$command = Yii::app()->db->createCommand($sql);
		$rawData = $command->queryAll();								//dump($rawData);

		foreach ($rawData as $key=>$value) {		//dump($key);
			$event[] = $value['event'];
			$data2[] = (int)$value['index'];
		}	//dump($event);
		echo CJSON::encode($data2);
		
		// $dataProvider=new CArrayDataProvider($rawData, array(
			// /*'sort'=>array(
				// 'attributes'=>array( 'name' => 'id', ),
			// ),*/
			// 'pagination'=>array('pageSize'=>10, ),
		// ));		dump($dataProvider);
		
	}
	
	#--------- ACTIVE HIGHCHARTS
	public function actionActivehighcharts()
    {
        $criteria=new CDbCriteria;
        $dataProvider=new CActiveDataProvider('Products',
            array(
                'criteria'=>$criteria,
            )
        );		//DUMP( $dataProvider->model->EJsonBehavior->toJSON()); DIE();
 
        //json formatted ajax response to request
        if(isset($_GET['json']) && $_GET['json'] == 1){
            $count = Products::model()->count();
            for($i=1; $i<=$count; $i++){
                $data = Products::model()->findByPk($i);
                $data->price += rand(-10,10);				//echo  rand(-10,10);	print_r($data);
                $data->save();
            }
            echo CJSON::encode($dataProvider->getData());
        }else{
            $this->render('/WIDGET/GRAFIK/Activehighcharts',array( 'dataProvider'=>$dataProvider, ));
        }
    }

}