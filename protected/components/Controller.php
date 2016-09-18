<?php
/*Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 http://localhost/yiidoc/CController.html#filters-detail
 */
class Controller extends CController
{	
	public $layout='//layouts/column1';	//the name of the layout to be applied to this controller's views.
	
	//public $defaultAction=null;	//the name of the default action (first load)
	
	public $id = null;	//ID of the controller
	
	public $pageTitle=null; 	//string 	the page title.
	
	public $menu=array();	# @var array context menu items. This property will be assigned to {@link CMenu::items}.
	
	public $breadcrumbs=array();	//array the breadcrumbs of the current page, (@link CBreadcrumbs::links)
	
	
	/**@return array action filters */
	# accessControl, ajaxOnly, postOnly  are method-based filters (defined in CController), which refer to filtering methods in the controller class
	# COutputCache class is 'system.web.widgets.COutputCache'
	// public function filters() {
		// return array(
			// 'accessControl',  #perform access control for CRUD operations ( filterAccessControl() -This filter is a wrapper of CAccessControlFilter. To use this filter, you must override accessRules method.)
			// //'accessControl - login',  #keculai action login
			// 'ajaxOnly + search',	#hanya action search	( filterAjaxOnly() - This filter throws an exception (CHttpException with code 400) if the applied action is receiving a non-AJAX request.)
			// 'postOnly + edit, create',	#hanya action edit dan create	( filterPostOnly() - This filter throws an exception (CHttpException with code 400) if the applied action is receiving a non-POST request)
			
			// // array(	#paging cache
				// // 'COutputCache + list',
				// // 'duration'=>300,
			// // ),
		// );
	// }
	
	#Returns a list of external action classes. Array keys are action IDs, and array values are the corresponding action class in dot syntax (e.g. 'edit'=>'application.controllers.article.EditArticle') or arrays representing the configuration of the actions
	public function actions() {
		return array(
			'action1'=>'path.to.Action1Class',		//key action id ="action1", value = "path.to.Action1Class"
			'action2'=>array(
				'class'=>'path.to.Action2Class',
				'property1'=>'value1',
				'property2'=>'value2',
			),
		);
	}
	
	public function getRemoteAddr()
	{
    if(getenv("HTTP_CLIENT_IP"))
      $ip = getenv("HTTP_CLIENT_IP");
    else if(getenv("HTTP_X_FORWARDED_FOR"))
      $ip = getenv("HTTP_X_FORWARDED_FOR");
    else if(getenv("REMOTE_ADDR"))
      $ip = getenv("REMOTE_ADDR");
    else
      $ip = "UNKNOWN";
    return $ip;
	}
	/*	#Yii�s Role-Based Access Control (RBAC).
	public function accessRules(){
		return array(
			array('allow', 
				'actions'=>array('index','page','contact'),
				//'users'=>array('*'),	#all users 
				//'users'=>array('admin'), # spesifik user's (username)
				//'users'=>array('@'),	# authenticated user 
				'expression'=>'isset($user->role) && ($user->role===1)', # # authenticated user with role users
				# atau 'expression'=>'isset($user->role) && (Yii::app()->user->getState("role")==1)',
				#atau �expression�=>�User::hasRole(User::ROLE_ADMIN)�,
				
			),
			array('deny', // no one can create, update, or delete these:
				'actions'=>array('index','page','contact'),
				'users'=>array('*'),
			),
			// array('deny',  // deny all users
				// 'users'=>array('*'),
			// ),
		);
	}		*/
	
	#@return array behaviors, Returns a list of behaviors that this controller should behave as.
	#configurations indexed by behavior names
	# Each behavior configuration can be either a string specifying the behavior class or an array
	// public function behaviors()
	// {
		// return array(
			// 'returnable'=>array(
				// 'class'=>'ext.behaviors.XReturnableBehavior',
			// ),
		// );
	// }
	
	# Menu Xportlet
	public $leftPortlets=array();
	public $rightPortlets=array();
	public $sidePortlets=array();
	
	#Load Model for All Table
	// public function loadModelAll($table, $id)	{
		// //$model=TblUserMysql::model()->findByPk($id);
		// $model=$table::model()->findByPk($id);
		
		// if($model===null)
			// throw new CHttpException(404,'The requested page does not exist.');
		// return $model;
	// }
	
	# save action user to "logs"
	public function save_logs($event) {		//echo $event;
		$logs=new Logs;
		$logs->id_user = Yii::app()->user->id; 
		$logs->stamp = date('Y-m-d');	//new CDbExpression('NOW()');//	time();  //date('Y-m-d h:m:s'); 
		//$logs->event = 'Access DB Documentation'; 	//print_r($logs->attributes);
		$logs->event =  $event; 
		$logs->save();		
	}
		
	
	
	#configure themes path and url in the themesManage
	// public function init()
    // {
        // //Yii::app()->themeManager->basePath .= '/biskit';
        // //Yii::app()->themeManager->baseUrl .= '/biskit';

        // Yii::app()->theme = 'biskit'; // You can set it there or in config or somewhere else before calling render() method.
    // }

	// //--------------------------------------- CODE FROM YII PLAY-GROUND --------------------------------------------//
	// /**
	 // * @var array the portlets of the current page.
	 // */
	// public $leftPortlets=array();
	// public $rightPortlets=array();

	// /**
	 // * @var array the ips of privilege.
	 // */
	// public $ips = array(
		// '127.0.0.1',
		// '::1', // localhost
	// );

	// /**
	 // * initialize
	 // */
	// function init()
	// {
		// parent::init();
		// if (Yii::app()->getRequest()->getParam('printview'))
			// Yii::app()->layout='print';
	// }


	// /**
	 // * @return boolean true if request IP matches given pattern, otherwise false
	 // */
	// public function isIpMatched()
	// {
		// $ip=Yii::app()->request->userHostAddress;

		// foreach($this->ips as $rule)
		// {
			// if($rule==='*' || $rule===$ip || (($pos=strpos($rule,'*'))!==false && !strncmp($ip,$rule,$pos)))
				// return true;
		// }
		// return false;
	// }
}
?>
