<?php

class WidgetController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	//public $layout='//layouts/column2_custom';

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
				// 'actions'=>array('admin','delete'),
				// 'users'=>array('admin'),
			// ),
			// array('deny',  // deny all users
				// 'users'=>array('*'),
			// ),
		// );
	// }

	public function actionModal() {
		$this->render('modal');
	}
	
	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Products;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Products']))
		{
			$model->attributes=$_POST['Products'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->proID));
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
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Products']))
		{
			$model->attributes=$_POST['Products'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->proID));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Products');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Products('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Products']))
			$model->attributes=$_GET['Products'];

		 if(Yii::app()->request->isAjaxRequest)	 // if(isset($_GET['ajax']))
			$this->renderPartial('crud_default/_admin',array('model'=>$model,));
		else
			$this->render('crud_default/admin',array('model'=>$model,));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Products::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='products-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	public function actionTableCustom()		//XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX INI DI PAKE GA SIH?? GA ADA VIEW NYA??
	{
		$model=new Products('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Products']))
			$model->attributes=$_GET['Products'];

		$this->render('table_custom',array('model'=>$model,));
	}
	
	
	public function actionTbJsonGridView()
	{
		$model=new Products('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Products']))
			$model->attributes=$_GET['Products'];
		
		 if(Yii::app()->request->isAjaxRequest)	 // if(isset($_GET['ajax']))
			$this->renderPartial('_TbJsonGridView',array('model'=>$model,));
		 
		else 
			$this->render('TbJsonGridView',array('model'=>$model,));
	}
	
	public function actionTbExtendedGridView()
	{
		$model=new Products('search');
		$model->unsetAttributes();  // clear any default values
		
		if(isset($_GET['Products']))
			$model->attributes=$_GET['Products'];
			
		$r = Yii::app()->getRequest();
		if($r->getParam('editable'))
		{
			//echo $r->getParam('attribute');
			echo $r->getParam('value');   //test XXXXXXXXXXXXXXXXXXXXXXXX
			Yii::app()->end();
		}
		
		$this->render('TbExtendedGridView',array('model'=>$model,));
	}
	
	public function actions()
	{						//return  dump($_POST);
		return array(
			'toggle' => array(
				'class'=>'bootstrap.actions.TbToggleAction',
				'modelName' => 'Products',
				//'exceptionOnNullModel' => true,
		));
	}
	
	public function actionRelational()
	{	
		//$gridDataProvider=
		$gridDataProvider= Products::model()->find('proID', $_GET["id"]); //return $model;
		
		/*
		$dataProvider=new CArrayDataProvider($model, array(
			'pagination'=>array(
				'pageSize'=>10,
			),
		)); */
		#OR
		/*$rawData=Yii::app()->db->createCommand("SELECT * FROM Products where id_user=$data->id")->queryAll(); */
		#OR
		$gridDataProvider =new CActiveDataProvider('Products', array(
			'criteria'=>array(
				'select'=>'*',
				//'with'=>'TblDatas',
				'condition'=>'proID='.$_GET["id"],    
			),
		));
		
		$gridColumns= array('proID', 'catID', 'supID', 'item', 'price');
		//return dump($_GET);
		
		$this->renderPartial('_relational', array(
			'id' => Yii::app()->getRequest()->getParam('id'),
			'gridDataProvider' => $gridDataProvider,   	//$this->getGridDataProvider(),
			'gridColumns' => $gridColumns	//$this->getGridColumns()
		));
	}
	
	#-------------------------------------------------------- FORM BOOTSTRAP WIDGET
	public function actionButton()
	{
		$this->render('button');
	}
	public function actionBoxes()
	{
		$this->render('boxes');
	}
	public function actionTbNavbar()
	{
		$this->render('TbNavbar');
	}
	public function actionTbActiveForm()
	{
		$this->render('TbActiveForm');
	}
	public function actionTbActiveForm2()
	{
		$this->render('TbActiveForm2');
	}
	public function actionTbEditableField()
	{
		//$model=new Products;
		$model=Products::model()->findByPk(1);  				//dump($model);
		$this->render('TbEditableField', array('model'=>$model));
	}
	
	public function actionTbEditableDetailView()
	{
		//$model=new Products;
		//$model=Products::model()->findByPk(1);  				//dump($model);
		$this->render('TbEditableDetailView');
	}
	
	public function actionHighchart()
	{
		$this->render('Highchart');
	}
	
	#-------------------------------------------------- CHIU BOOTSTRAP -------------------------------------------------
	public function actionCjui_index()
	{		
	$widget=null;
	//if(Yii::app()->request->isAjaxRequest)	 
		if(isset($_GET['widget'])) {
			//echo $_GET['widget']);
			$this->layout='main_custom';
			$this->render('cjui/'.$_GET['widget']);
		}
			//$this->render('cjui/index', array('widget'=>$_GET['widget']));
		else
		{ $this->render('cjui/index'); }
	}
	
	
}
