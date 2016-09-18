<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class LoginForm extends CFormModel //**\framework\web\CFormModel.php
{
	public $username;
	public $password;
	public $rememberMe;

	private $_identity;

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			// username and password are required
			array('username, password', 'required'),
			// rememberMe needs to be a boolean
			array('rememberMe', 'boolean'),
			// password needs to be authenticated
			array('password', 'authenticate'),	//array('password', 'authenticate', 'on'=>'Login'),
			
			//array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements()),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'rememberMe'=>'Remember me next time',
		);
	}

	/**
	 * Authenticates the password.
	 * This is the 'authenticate' validator as declared in rules().
	 */
	public function authenticate($attribute,$params) //**nama variable $attribute,$params bebas(bisa di ganti)
	{												
		if(!$this->hasErrors())
		{
			$this->_identity=new UserIdentity($this->username,$this->password); 
			if(!$this->_identity->authenticate())
				//$this->addError('password','Incorrect username or password.');
				if($this->_identity->errorCode==1)
					$this->addError('username','Incorrect username.');
				if($this->_identity->errorCode==2)
					$this->addError('password','Incorrect password.');
				
				//print_r( $this->_identity);   ---TEST RESULT: array object _identity
				//*UserIdentity Object ( [_id:private] =>  [username] =>  [password] =>  [errorCode] =>  [errorMessage] => [_state:private] => Array ( [lastLoginTime] =>  [email] => ) [_e:private] => [_m:private] => )
		}
	}
	
	
	
	/**
	 * Logs in the user using the given username and password in the model.
	 * @return boolean whether login is successful
	 */
	public function login()
	{											
		if($this->_identity===null)
		{
			$this->_identity=new UserIdentity($this->username,$this->password);			//print_r($this->_identity);
			$this->_identity->authenticate();
		}
		if($this->_identity->errorCode===UserIdentity::ERROR_NONE)
		{
			$duration=$this->rememberMe ? 3600:0;   //3600*24*30 : 0; // 30 days  
			# // Keep the user logged in for 7 days. Make sure allowAutoLogin is set true for the user component.
			Yii::app()->user->login($this->_identity,$duration);  # which will store the identity information into persistent storage (PHP session by default) for retrieval upon subsequent requests.
			return true;
		}
		else
			return false;
	}
}
