<?php

class UserMysqlController extends AdminController
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**@return array action filters */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules(){
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','register'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create', 'update', 'GridDefault', 'GridJoin', 'updateJoin','ListUser'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/** Lists all models.*/
	public function actionIndex()
	{	
		$dataProvider=new CActiveDataProvider('TblUserMysql'); //print_r($dataProvider);
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}
	
	public function actionListUser(){	
		# LOAD DATA VIA MYCActiveRecord FN 
		$dataProvider = TblUserMysql::model()->loadData(null, 'id in (1,2)');
		$this->render('index',array( 'dataProvider'=>$dataProvider) );
	}
	
	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id){			
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}


	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest){
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/* sample delete model dengan kondisi
	public function actionDelete()
	{
    $event = $this->loadEvents(); // Fetch the specific event Model.
    // Can only delete the events they created:
    if ($event->ownerId == Yii::app()->user->id) {
        $event->delete();
    } else {
        throw new CHttpException(403,'Invalid request. You are not allowed to delete this event.');
    }
	}
	
	----- OR ---
	if(Yii::app()->user->checkAccess(‘deletePost’))
	{
		// delete post
	}
	*/

	/*** Manages all models.*/
	public function actionAdmin(){
		$model=new TblUserMysql('search_join');  //**search_join scenario yg di definisikan di "model" pada "rules()"
		$model->unsetAttributes();  // clear any default values
		
		if(isset($_GET['TblUserMysql']))			
			$model->attributes=$_GET['TblUserMysql']; 
		
		#Yii::app()->theme = 'abound'; #SET THEME 
		
		$this->render('admin',array('model'=>$model, ));
	}

	/**
	 * Performs the AJAX validation.
	 * @param the model to be validated
	 */
	protected function performAjaxValidation($model) {												
		if(isset($_POST['ajax']) && $_POST['ajax']==='TblUserMysql')
		{
			echo CActiveForm::validate($model); 
			Yii::app()->end();
		}
	}
	
		/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate() { 
		$model=new TblUserMysql;

		// Uncomment the following line if AJAX validation is needed
		 $this->performAjaxValidation($model);
																			//print_r($_POST);
		if(isset($_POST['TblUserMysql'])){
			$model->attributes=$_POST['TblUserMysql'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array('model'=>$model,	));
	}
	
	/** Updates a particular model berdasarkan '$id' param
	 * If update is successful, the browser will be redirected to the 'view' page.*/
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);			
		
		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);     
																				
		if(isset($_POST['TblUserMysql']))	{
			$model->attributes=$_POST['TblUserMysql'];		
			 if($model->password) $model->password = md5($_POST['TblUserMysql']['password']);		
			
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}
		$this->render('update',array('model'=>$model,));
	}
	
	
}
