<?php

class AuthTestController extends Controller
{
	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
	#Yii’s Role-Based Access Control (RBAC).
	/**@return array action filters */
	public function filters() {
		return array(
			'accessControl', // perform access control for CRUD operations
			//'accessControl - login', # kecuali login tidak di filter ( sama dengan set "accessRules" allow login to the user )
			// 'ajaxOnly + search', # The '+'  the filter runs only when the specified actions are requested;
		);
	}
	public function accessRules(){
		return array(
			array('allow', 'actions'=>array('index'),
				'users'=>array('*'),
			),
			array('allow', 
				'actions'=>array('test'),
				//'users'=>array('*'),	#all users 
				//'users'=>array('admin'), # spesifik user's (username)
				//'users'=>array('@'),	# authenticated user 
				#'expression'=>'isset($user->roles) && ($user->roles==="administrator")', # # authenticated user with role users
				# atau 'expression'=>'isset($user->role) && (Yii::app()->user->getState("role")==1)',
				#atau ‘expression’=>’User::hasRole(User::ROLE_ADMIN)’,
				'roles'=>array('administrator'), # As described in the API doc of CAccessRule, the "roles" attribute will in fact call Yii::app()->user->checkAccess().
				// 'roles'=>array(User::ROLE_ADMIN,User::ROLE_OPERATOR),
			),
			// # VIA "authManager" using AUTH FILE. see to config : http://www.yiiframework.com/wiki/65
			// array('allow', // allow readers only access to the view file
               // 'actions'=>array('index'),
               // 'roles'=>array('1'),
            // ),
			 array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('guest_act'),	// 'guest', 'user', 'powerUser', 'admin'
				//'users'=>array('*'),
				'roles'=>array('guest'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('userA_act'),	
				'roles'=>array('user-a'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('userB_act'),	
				'roles'=>array('user-b'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('poweruser_act'),	
				'roles'=>array('poweruser'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('admin_act'),	
				'roles'=>array('administrator'),
			),
			array('allow', // allow authenticated users to update/view
				'actions'=>array('authenticated_act'), 
				'users'=>array('@')
			),
			array('allow', // allow admins only to delete
				'actions'=>array('delete'), 
				'roles'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
			/*
			// optional, list of action IDs (case insensitive) that this rule applies to
			// if not specified or empty, rule applies to all actions
			'actions'=>array('edit', 'delete'),

			// optional, list of controller IDs (case insensitive) that this rule applies to
			'controllers'=>array('post', 'admin/user'),

			// optional, list of usernames (case insensitive) that this rule applies to
			// Use * to represent all users, ? guest users, and @ authenticated users
			'users'=>array('thomas', 'kevin'),

			// optional, list of roles (case sensitive!) that this rule applies to.
			'roles'=>array('admin', 'editor'),

			// since version 1.1.11 you can pass parameters for RBAC bizRules
			'roles'=>array('updateTopic'=>array('topic'=>$topic))

			// optional, list of IP address/patterns that this rule applies to
			// e.g. 127.0.0.1, 127.0.0.*
			'ips'=>array('127.0.0.1'),

			// optional, list of request types (case insensitive) that this rule applies to
			'verbs'=>array('GET', 'POST'),

			// optional, a PHP expression whose value indicates whether this rule applies
			// The PHP expression will be evaluated using evaluateExpression.
			// A PHP expression can be any PHP code that has a value. To learn more about what an expression is,
			// please refer to the php manual.
			'expression'=>'!$user->isGuest && $user->level==2',

			// optional, the customized error message to be displayed
			// This option is available since version 1.1.1.
			'message'=>'Access Denied.',

			// optional, the denied method callback name, that will be called once the
			// access is denied, instead of showing the customized error message. It can also be
			// a valid PHP callback, including class method name (array(ClassName/Object, MethodName)),
			// or anonymous function (PHP 5.3.0+). The function/method signature should be as follows:
			// function foo($user, $rule) { ... }
			// where $user is the current application user object and $rule is this access rule.
			// This option is available since version 1.1.11.
			'deniedCallback'=>'redirectToDeniedMethod',        */
		);
	}
	
	public function actionIndex()
	{	
		$this->render('index');
	}
	
	public function actionGuest_act(){
		//echo "masuk guest-role access";
		//Yii::app()->authManager->assign('administrator', Yii::app()->user->id);
		$res = "masuk guest-role access"; 
		$this->renderPartial('test_rbac', array('res'=>$res), false, true);
	}
	
	public function actionAuthenticated_act(){
		$res = "masuk User-authenticated access";
		$this->renderPartial('test_rbac', array('res'=>$res), false, true);
	}
	
	public function actionUserA_act(){
		$res = "masuk User-A role access";
		$this->renderPartial('test_rbac', array('res'=>$res), false, true);
	}
	
	public function actionUserB_act(){
		$res = "masuk User-B role access";
		$this->renderPartial('test_rbac', array('res'=>$res), false, true);
	}
	
	public function actionPowerUser_act(){
		$res = "masuk Poweruser-role access";
		$this->renderPartial('test_rbac', array('res'=>$res), false, true);
	}
	
	public function actionAdmin_act(){
		$res = "masuk Administrator-role access";
		$this->renderPartial('test_rbac', array('res'=>$res), false, true);
	}
}