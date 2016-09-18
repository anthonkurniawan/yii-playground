<?php
Yii::app()->bootstrap->init();

class Widget_BootstrapController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';
	
	
	/**
	 * @return array action filters
	 */
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
	// public function accessRules()
	// {
		// return array(
			// array('allow',  // allow all users to perform 'index' and 'view' actions
				// 'actions'=>array('index','view'),
				// 'users'=>array('*'),
			// ),
			// array('allow', // allow authenticated user to perform 'create' and 'update' actions
				// 'actions'=>array('create','update'),
				// 'users'=>array('@'),
			// ),
			// array('allow', // allow admin user to perform 'admin' and 'delete' actions
				// 'actions'=>array('TbGridView','delete'),
				// 'users'=>array('admin'),
			// ),
			// array('deny',  // deny all users
				// 'users'=>array('*'),
			// ),
		// );
	// }

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>TblUserMysql::model()->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new TblUserMysql;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['TblUserMysql']))
		{
			$model->attributes=$_POST['TblUserMysql'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=TblUserMysql::model()->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['TblUserMysql']))
		{
			$model->attributes=$_POST['TblUserMysql'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('TblUserMysql');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionTbGridView()
	{																		
		$model=new TblUserMysql('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['TblUserMysql']))
			$model->attributes=$_GET['TblUserMysql'];

		$this->render('TbGridView',array('model'=>$model,));
	}


	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='tbl-user-mysql-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	#-------------------------------------------------------------------- FORM BOOTSTRAP WIDGET--------------------------------------------------------------
	public function actionTbNavbar()
	{
		$this->render('TbNavbar');
	}
	
	public function actionTbActiveForm()
	{
		$this->render('form/TbActiveForm');
	}
	
	public function actionTbActiveForm2()
	{
		$this->render('form/TbActiveForm2');
	}
	
	public function actionTbEditableField()
	{
		//$model=new Products;
		$model=Products::model()->findByPk(1);  				//dump($model);
		$this->render('TbEditableField', array('model'=>$model));
	}
}
