<?php

class Products_exGiixController extends Controller {

	public $layout='column2_custom';
	
	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Products_exGiix'),
		));
	}

	public function actionCreate() {
		$model = new Products_exGiix;

		$this->performAjaxValidation($model, 'products-ex-giix-form');

		if (isset($_POST['Products_exGiix'])) {
			$model->attributes = $_POST['Products_exGiix'];

			if ($model->save()) {
				if (Yii::app()->request->isAjaxRequest)
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->proID));
			}
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'Products_exGiix');

		$this->performAjaxValidation($model, 'products-ex-giix-form');

		if (isset($_POST['Products_exGiix'])) {
			$model->attributes = $_POST['Products_exGiix'];

			if ($model->save()) {
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
	
	protected function performAjaxValidation($model)
	{												
		if(isset($_POST['ajax']) && $_POST['ajax']==='TblUserMysql-form')
		{
			echo CActiveForm::validate($model); 
			Yii::app()->end();
		}
	}
	public function loadModel($id)
	{
		$model=Products_exGiix::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
}