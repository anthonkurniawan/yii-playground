<?php
//Sebuah <li type="a">roller adalah instance dari CController atau kelas turunan CController.(DIMULAI DENGAN KATA 'ACTION')
//Action default bisa diubah dengan mengeset variabel instance publik, CController::defaultAction.
//Controller dan action diidentifikasi oleh ID
class SiteController extends AdminController
{
	/* Declares class-based actions. */
	public $layout='//layouts/column1';
	#public $defaultAction='index';
	
	#Yii’s Role-Based Access Control (RBAC).
	public function filters() {
		return array(
			'accessControl', // enable filter for accessRules() - perform access control for CRUD operations
		);
	}
	
	# CAccessControlFilter performs authorization checks for the specified actions. 
	# Returns the access rules for this controller. Override this method if you use the accessControl filter.
	public function accessRules(){
		return array(
			array('allow', // allow readers only access to the view file
               'actions'=>array('index', 'error', 'contact', 'captcha', 'page', 'login', 'logout', 'modules', 'jqueryTest', 'security', 'session'),
               'users'=>array('*'),
			  // 'roles'=>array('1'),
			   // //'users'=>array('admin'), # spesifik user's (username)
				// //'users'=>array('@'),	# authenticated user 
				// 'expression'=>'isset($user->role) && ($user->role===1)', # # authenticated user with role users
				// # atau 'expression'=>'isset($user->role) && (Yii::app()->user->getState("role")==1)',
				// #atau ‘expression’=>’User::hasRole(User::ROLE_ADMIN)’,
            ),
			// # VIA "authManager" using AUTH FILE. see to config : http://www.yiiframework.com/wiki/65
			// array('allow', // allow readers only access to the view file
               // 'actions'=>array('index'),
               // 'roles'=>array('1'),
            // ),
			array('deny',  // lain nya di deny
				'users'=>array('*'),
			),
		);
	}
	
	// public function init()
	// {
		// parent::init();
		
		// $cs = Yii::app()->clientscript;							
		// $cs->registerCssFile( Yii::app()->baseUrl . '/js/syntaxhighlighter/styles/shCore.css' );
		// $cs->registerCssFile( Yii::app()->baseUrl . '/js/syntaxhighlighter/styles/shCoreDefault.css' );
		// $cs->registerCssFile( Yii::app()->baseUrl . '/js/syntaxhighlighter/styles/shThemeDefault.css' );
		
		// $cs->registerScript('syntax', "SyntaxHighlighter.all()");
	// }
	
	public function actions()
	{
		return array(
			'captcha'=>array(		# captcha action renders the CAPTCHA image displayed on the <li type="a">act page
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			'extension'=>array(
				'class'=>'CViewAction',
				'basePath'=>'extensions',
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(				//ini utk direct link ke "page/about"
				'class'=>'CViewAction',
			),
			
			'translateSwitch'=>array('class'=>'CViewAction', ),
			'jqueryTest'=>array('class'=>'CViewAction',  'basePath'=>'JQUERY_TEST'),
			'modules'=>array('class'=>'CViewAction',  ),  
			'security'=>array('class'=>'CViewAction',  'basePath'=>''),  
			'session'=>array('class'=>'CViewAction',  'basePath'=>''),  
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()	
	{		
		//Yii::app()->theme = 'biskit'; #SET THEME
		$this->render('index');
	}
	
	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
	    if($error=Yii::app()->errorHandler->error)
	    {
	    	if(Yii::app()->request->isAjaxRequest)
	    		echo $error['message'];
	    	else
	        	$this->render('error', $error);
				// OR $this->render('error', array('error'=>$error));
	    }
	}

	/**
	 * Displays the <li type="a">act page
	 */
	public function actionContact()
	{
		$model=new ContactForm;				 //class dari yiiTest/protected/models/ContactForm.php
		if(isset($_POST['ContactForm']))	//NAMA MODEL: ContactForm
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				//$headers="From: {$model->email}\r\nReply-To: {$model->email}";
				//mail(Yii::app()->params['adminEmail'],$model->subject,$model->body,$headers);    // via PHP fn
				
				# sendHtmlEmail($to, $fromname,$replyemail, $subject, $params,$view,$layout=null,$viewspath=null,$layoutspath=null )
				$mailer = sendHtmlEmail(
                    app()->params['myEmail'],
                    $model->name,
                    $model->email,
                    $model->subject,
                    array('body' => $model->body,
							'name' => $model->name,
							'subject' => $model->subject,
							'email' => $model->email
					),
					'contact',
					'main3'
                );	
			//	$mailer->Send();
				if(!$mailer->Send()) {
					// echo "Mailer Error: " . $mailer->ErrorInfo;
				$model->addErrors( array($mailer->ErrorInfo) );
				} else {
					echo "Message sent!";
					Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
					$this->refresh();
				}
			}
		}
		 //Yii::app()->theme = 'biskit'; #SET THEME
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{										
		if (!defined('CRYPT_BLOWFISH') || !CRYPT_BLOWFISH)
			throw new CHttpException(500,"This application requires that PHP was compiled with Blowfish support for crypt().");
			
		$model=new LoginForm;   //class dari yiiTest/protected/models/LoginForm.php

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
																								//echo User::model()->findByPk(1);
		/* collect user input data*/  //print_r($_POST['LoginForm']);
		if(isset($_POST['LoginForm']))
		{	// mengumpulkan data inputan dari user										
			$model->attributes=$_POST['LoginForm']; 
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				//echo $this->lastVisit();		!!BUAT FUNGSINYA DULU!!
				// echo $this->getUrl();
				$this->redirect(Yii::app()->user->returnUrl);  //echo Yii::app()->user->returnUrl;
		}
		
		Yii::app()->theme = 'designa'; #SET THEME
		
		// display the login form ( views/site/login.php)
		$this->render('login',array('model'=>$model));
	}

	/* ---------------------------- FOR LOGIN AJAX -----------------------------------------*/
	public function actionIsLogged() {
		$data['authenticated'] = !Yii::app()->user->getIsGuest();
		if ($data['authenticated'])
			$data['username'] = Yii::app()->user->name;
		$this->sendResponse(200, CJSON::encode($data));
	}
  
	public function actionLoginAjax() {
		$data = $this->getInputAsJson();		echo "data-->"; print_r($data);

		if (empty($data['username']) || empty($data['password'])) {
			//	$this->sendResponse(401, 'Please, fill up all username and password to login!');
			$this->sendResponse(401, CJSON::encode(array('data' => $data)));
		}
		// Authenticate user credentials
		$identity = new UserIdentity($data['username'], $data['password']);   //print_r($identity);

		if ($identity->authenticate()) {
			Yii::app()->user->login($identity);
			$this->sendResponse(200, CJSON::encode(array('authenticated' => true)));
		} 
		else {
			switch ($identity->errorCode) {
				case UserIdentity::ERROR_USERNAME_INVALID:
					$error = 'Incorrect username';
					break;
				case UserIdentity::ERROR_PASSWORD_INVALID:
					$error = 'Incorrect password';
					break;
				case UserIdentity::ERROR_USER_IS_DELETED:
					$error = 'This user is deleted';
					break;
			}
		$this->sendResponse(401, $error);
		}
  }
  
	/**
	 * Logs out the current user and redirect to homepage.  Sample standard Logout
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);  ///yii/yiiTest/index.php
	}
	
	# Custom LOGOUT with AuthManager
	// public function actionLogout()
	// {
		// $assigned_roles = Yii::app()->authManager->getRoles(Yii::app()->user->id); //obtains all assigned roles for this user id
		// if(!empty($assigned_roles)) //checks that there are assigned roles
		// {
			// $auth=Yii::app()->authManager; //initializes the authManager
			// foreach($assigned_roles as $n=>$role)
			// {
				// if($auth->revoke($n,Yii::app()->user->id)) //remove each assigned role for this user
					// Yii::app()->authManager->save(); //again always save the result
			// }
		// }
 
		// Yii::app()->user->logout(); //logout the user
		// $this->redirect(Yii::app()->homeUrl); //redirect the user
	// }

	# Logout Ajax
	public function actionLogoutAjax() {
		Yii::app()->user->logout();
		$this->sendResponse(200, CJSON::encode(array('authenticated' => false)));
	}
	
	
	//==================== ADD NEW SCRIPT TEST===================================//
	public function actionRegister2()
	{
		$model=new TblUserMysql('register');

		// uncomment the following code to enable ajax-based validation
		/*
		if(isset($_POST['ajax']) && $_POST['ajax']==='TblUserMysql-register-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
		*/

		if(isset($_POST['TblUserMysql'])){
			$model->attributes=$_POST['TblUserMysql'];
			if($model->validate()){
				// form inputs are valid, do something here
				if($model->save())
					$this->redirect(array('view','id'=>$model->id));
				return;
			}
		}
		$this->render('register',array('model'=>$model));
	} 
	
	# ----------------------------------------------- REGISTER FROM YII-ANGULAR
    public function actionRegister()
    {
        $model = new RegisterForm();

        if (isset($_POST['ajax']) && $_POST['ajax'] === 'register-form') {
            echo CActiveForm::validate($model, array('username', 'password'));
            Yii::app()->end();
        }

        if (isset($_POST['RegisterForm'])) {
            $model->attributes = $_POST['RegisterForm'];
            if ($model->validate(array('email', 'username', 'new_password', 'password_confirm'))) {
                $user = new TblUserMysql();
                $user->email = $_POST['RegisterForm']['email'];
                $user->username = $_POST['RegisterForm']['username'];
                $user->password = $_POST['RegisterForm']['new_password'];
				$user->role =0;
																																				
                if ($user->save()) {
                    //send email         activation key has been generated on beforeValidate function in User class
					# Creates an absolute URL for the specified action defined in this controller.
                    $activation_url = $this->createAbsoluteUrl('/site/activate', array('key' => $user->activation_key, 'email' => $user->email));	//echo "----->".$activation_url;
					if (
						sendHtmlEmail(	# $to, $fromname,$replyemail, $subject, $params,$view,$layout=null,$viewspath=null,$layoutspath=null 
                        $user->email,
                        Yii::app()->name . ' Administrator',
                        null,
                        Yii::t('register', 'Account activation'),
                        array('username' => $user->username, 'activation_url' => $activation_url),
                        'activation',
                        'main2'
						)
						//1==0	# FOR TEST
					) {
                        $msg = Yii::t('register', 'Please check your email inbox for the activation link.It is valid for 24 hours. <br><span class="txtDisable"> akan kirim email dengan link :'.$activation_url.'</span>');
                        Yii::app()->user->setFlash('success', $msg);
                        $this->redirect(bu() . '/site/login');
                    } else { 
                        $user->delete();
                        $msg = Yii::t('register', 'Error.Activation email could not be sent.Please register again.');
                        Yii::app()->user->setFlash('error', $msg);
                        $this->redirect(bu() . '/site/register');
                    }
                } else { echo"salah"; dump($user->errors); }
            }
        }
        $this->render('register', array('model' => $model));
    }
	
	# ACTIVATION NEW USER ( from email registered )
	public function actionActivate($key, $email)
    {
        $criteria = new CDbCriteria;
        $criteria->condition = 'activation_key=:activation_key AND email=:email';
        $criteria->params = array(':activation_key' => $key, ':email' => $email);
        $user = TblUserMysql::model()->find($criteria);			//dump($user);
        if ($user) {
            $user->activation_key = NULL;	//clear activation
            $user->active = TblUserMysql::STATUS_ACTIVE;  // set active to user
            $user->save(false); //user has already  been validated when saved for the forst time.
            $successmsg = Yii::t('registration', ',welcome! Your account has been activated.Now you can log in.');
            Yii::app()->user->setFlash('success', $user->username . $successmsg);
            $this->redirect(bu() . '/site/login');
        } else {
            $errormsg = Yii::t('registration', ' Error.Your account could not be activated,please repeat the registration process.');
            $criteria = new CDbCriteria;
            $criteria->condition = ' email=:email';
            $criteria->params = array(':email' => $email);
            $user = TblUserMysql::model()->find($criteria);
            $user->delete();
            Yii::app()->user->setFlash('error', $errormsg);
            $this->redirect(bu() . '/site/register');
        }
    }
	
	# For Forgot Password
	 public function actionEmail_for_reset()
	{
        if (isset($_POST['EmailForm'])) {
            $user_email = $_POST['EmailForm']['email'];
            $criteria = new CDbCriteria;
            $criteria->condition = 'email=:email';
            $criteria->params = array(':email' => $user_email);
            $user = TblUserMysql::model()->find($criteria);
            if (!$user) {
                $errormsg = Yii::t('passwordreset', 'No user with this email in our records');
                Yii::app()->user->setFlash('error', $errormsg);
                $this->refresh();
            }
            $key = $user->generate_activation_key();
            $user->reset_token = $key;
            $reset_url = $this->createAbsoluteUrl('/site/password_reset', array('key' => $key, 'email' => $user_email));
            $user->save();

            if (
				// sendHtmlEmail(
                // $user->email,
                // Yii::app()->name . ' Administrator',
                // null,
                // Yii::t('reset', 'Password reset.'),
                // array('username' => $user->username, 'reset_url' => $reset_url),
                // 'pwd_reset',
                // 'main'
				//)
				1==1
            ) {	
                $infomsg = Yii::t('passwordreset', 'We have sent you a reset link,please check your email inbox.<br>or this link :<br><i>'.$reset_url.'</i>');
                Yii::app()->user->setFlash('info', $infomsg);
                $this->refresh();
            } else {
                $errormsg = Yii::t('passwordreset', 'We could not email you the password reset link');
                Yii::app()->user->setFlash('info', $errormsg);
                $this->refresh();
            }
        }

        $model = new EmailForm;
        $this->render('email_for_reset', array('model' => $model));
    }
	
	# Reset Password
	public function actionPassword_reset($key, $email)
    {
        if (isset($_POST['PasswordResetForm'])) {
            $new_password = $_POST['PasswordResetForm']['password'];
            $key = $_POST['PasswordResetForm']['key'];
            $email = $_POST['PasswordResetForm']['email'];


            $criteria = new CDbCriteria;
            $criteria->condition = 'reset_token=:reset_token AND email=:email';
            $criteria->params = array(':reset_token' => $key, ':email' => $email);
            $user = TblUserMysql::model()->find($criteria);

            if (!$user) {
                $errormsg = Yii::t('passwordreset', 'Error,your account information was not found.
                Your reset token has probably been used or  expired.Please repeat the password reset process.');
                Yii::app()->user->setFlash('error', $errormsg);
                $this->refresh();
            }
            $user->password = $new_password;
            $user->reset_token = NULL;

            if ($user->save()) {
                $msg = Yii::t('passwordreset', 'Your password has been reset.Log in with your new password.');
                Yii::app()->user->setFlash('success', $msg);
                $this->redirect(bu() . '/site/login');
            } else {
                $error = Yii::t('passwordreset', 'Error,could not reset your password.');
                Yii::app()->user->setFlash('error', $error);
                $this->refresh();
            }
        }
        $model = new PasswordResetForm;
        $this->render('password_reset', array('model' => $model, 'key' => $key, 'email' => $email));
    }
	
	#----------------------------------------------- test email with Gmail SMPT server
	public function actionGmail()
	{
		Yii::import('application.vendors.FirePHPCore.FirePHP');
		Yii::import('application.vendors.FirePHPCore.FB');
		
		$mailer = Yii::createComponent('application.extensions.mailer.EMailer');
		
		//echo APP_DEPLOYED;
            // these settings only for server,I use other settings in my localhost
           // if (APP_DEPLOYED) {
                $mailer->Host = 'smtp.gmail.com';
                $mailer->IsSMTP();
                $mailer->SMTPAuth = true;
                $mailer->SMTPSecure = 'tls';
                $mailer->Port = '587';
                $mailer->Username =app()->params['myEmail'];
                $mailer->Password =  app()->params['gmail_password'];
          //  }

            $mailer->From = app()->params['fromEmail'];
            $mailer->AddReplyTo( app()->params['replyEmail']);
            $mailer->AddAddress(app()->params['myEmail']);
            $mailer->FromName = 'Me-Testing';

            $mailer->CharSet = 'UTF-8';
            $mailer->Subject = Yii::t('demo', 'It Works');
            $message = 'Done!';
            $mailer->Body = $message;
            $mailer->SMTPDebug = true;
            fb($mailer, "mailer OBJECT");
            $mailer->Send();
	}
	
	public static function test()
	{
		return 'Powered by <a href="http://www.yiiframework.com/" rel="external">Yii Framework</a>.';
	}
	
	public function beforeAction($action){		
		//echo "action---------------->"; dump($action);
		return true;
	}
	
}


