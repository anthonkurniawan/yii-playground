<?php

class Products_exGiixJSController extends Controller {

	public $layout='column2_custom';
	
	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Products_exGiix'),
		));
	}

	public function actionCreate() {
		$model = new Products_exGiix;

		
		if (isset($_POST) && !empty($_POST)) {
                        foreach($_POST as $k=>$v){
                            $_POST['Products_exGiix'][$k] = $v;
                        }
			$model->attributes = $_POST['Products_exGiix'];
			

			if ($model->save()) {
                            $status = true;                            
                        } else {
                            $status = false;                            
                        }
                        
                        if (Yii::app()->request->isAjaxRequest)
                        {                            
                            echo CJSON::encode(array(
                                'success'=>$status,
                                'id'=>$model->id
                                ));
                            Yii::app()->end();
                        } else
                        {
                            $this->redirect(array('view', 'id' => $model->proID));
			}
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'Products_exGiix');


		if (isset($_POST) && !empty($_POST)) {
                        foreach($_POST as $k=>$v){
                            $_POST['Products_exGiix'][$k] = $v;
                        }
			$model->attributes = $_POST['Products_exGiix'];

			if ($model->save()) {
                        
                            $status = true;                            
                        } else {
                            $status = false;                            
                        }
                        
                        if (Yii::app()->request->isAjaxRequest)
                        {                            
                            echo CJSON::encode(array(
                                'success'=>$status,
                                'id'=>$model->id
                                ));
                            Yii::app()->end();
                        } else
                        {
				$this->redirect(array('view', 'id' => $model->proID));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->request->isPostRequest) {
			$this->loadModel($id, 'Products_exGiix')->delete();

			if (!Yii::app()->request->isAjaxRequest)
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400,
					Yii::t('app', 'Invalid request. Please do not repeat this request again.'));
	}
/*
	public function actionAdmin() {
		$dataProvider = new CActiveDataProvider('Products_exGiix');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}*/

	public function actionAdmin() {
		$model = new Products_exGiix('search');
		$model->unsetAttributes();

		if (isset($_GET['Products_exGiix']))
			$model->attributes = $_GET['Products_exGiix'];

		$this->render('admin', array(
			'model' => $model,
		));
	}
	
	/** Lists all models.*/
	public function actionIndex()
	{	
		$dataProvider=new CActiveDataProvider('Products_exGiix'); //print_r($dataProvider);
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}
	/*
	public function actionIndex() {
                if(isset($_POST['limit'])) {
                        $limit = $_POST['limit'];
                } else {
                    $limit = 20;
                }

                if(isset($_POST['start'])){
                    $start = $_POST['start'];

                } else {
                    $start = 0;
                }
		//$model = new Products_exGiix('search');
		//$model->unsetAttributes();

                $criteria = new CDbCriteria();
                $criteria->limit = $limit;
                $criteria->offset = $start;
                $model = Products_exGiix::model()->findAll($criteria);
                $total = Products_exGiix::model()->count($criteria);
                
		if (isset($_GET['Products_exGiix']))
			$model->attributes = $_GET['Products_exGiix'];

                if (isset($_GET['output']) && $_GET['output']=='json') {
                    $this->renderJson($model, $total);
                } else {
                    $model = new Products_exGiix('search');
                    $model->unsetAttributes();
                
                    $this->render('index', array(
                            'model' => $model,
                    ));
                }
	}
	*/
	public function loadModel($id)
	{
		$model=Products_exGiix::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
}