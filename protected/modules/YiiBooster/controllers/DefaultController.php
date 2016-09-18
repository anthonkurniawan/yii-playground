<?php

class DefaultController extends Controller
{
	// public function filters() {
		// return array(
			// 'accessControl', // perform access control for CRUD operations
		// );
	// }
	// public function accessRules(){
		// return array(
			// array('allow', 
				// 'actions'=>array('index','page','contact'),
				// //'users'=>array('*'),	#all users 
				// //'users'=>array('admin'), # spesifik user's (username)
				// //'users'=>array('@'),	# authenticated user 
				// 'expression'=>'isset($user->role) && ($user->role===1)', # # authenticated user with role users
				// # atau 'expression'=>'isset($user->role) && (Yii::app()->user->getState("role")==1)',
				// #atau ‘expression’=>’User::hasRole(User::ROLE_ADMIN)’,
				
			// ),
			// array('deny', // no one can create, update, or delete these:
				// 'actions'=>array('index','page','contact'),
				// 'users'=>array('*'),
			// ),
			// // array('deny',  // deny all users
				// // 'users'=>array('*'),
			// // ),
		// );
	// }
	
	
	public function actionIndex()
	{
		//echo"<pre>";print_r(Yii::AdminModule()  ); echo"</pre>";
		$this->render('index');
	}
	
	public function actionForm()
	{
		//echo"<pre>";print_r(Yii::AdminModule()  ); echo"</pre>";
		$this->render('form');
	}
	
	public function actionModal()
	{
		//echo"<pre>";print_r(Yii::AdminModule()  ); echo"</pre>";
		$this->render('modal');
	}
	
	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())			
				// $this->redirect(Yii::app()->user->returnUrl);	#"returnUrl" lom di set ke dlam module (masih direct ke "yiiTest"
				$this->redirect('index');
		}																			
		// display the login form
		$this->render('login_modal',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		// $this->redirect(Yii::app()->homeUrl);	#"homeUrl" lom di set ke dlam module (masih direct ke "yiiTest"
		$this->redirect('index');
	}
	
}