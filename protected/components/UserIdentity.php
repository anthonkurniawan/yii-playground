<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
/* ========================= SAMPLE DEFAULT ==========================
// class UserIdentity extends CUserIdentity
// {
	// /**			
	 // * Authenticates a user.
	 // * The example implementation makes sure if the username and password
	 // * are both 'demo'.
	 // * In practical applications, this should be changed to authenticate
	 // * against some persistent user identity storage (e.g. database).
	 // * @return boolean whether authentication succeeds.
	 // */
	// public function authenticate()
	// {
		// $users=array(
			// // username => password
			// 'demo'=>'demo',
			// 'admin'=>'admin',
		// );
		// if(!isset($users[$this->username]))
			// $this->errorCode=self::ERROR_USERNAME_INVALID;
		// else if($users[$this->username]!==$this->password)
			// $this->errorCode=self::ERROR_PASSWORD_INVALID;
		// else
			// $this->errorCode=self::ERROR_NONE;
		// return !$this->errorCode;
	// }
// }

/* ========================= SAMPLE DEFAULT ========================== */
/*
public function authenticate() {
       $record=Employee::model()->findByAttributes(array('E_EMAIL'=>$this->username));  // here I use Email as user name which comes from database
		if($record===null) {
               $this->_id='user Null';
               $this->errorCode=self::ERROR_USERNAME_INVALID;
        }
       else if($record->E_PASSWORD!==$this->password)            // here I compare db password with passwod field
        {    $this->_id=$this->username;
            $this->errorCode=self::ERROR_PASSWORD_INVALID;
        }
        else if($record['E_STATUS']!=='Active')                //  here I check status as Active in db
        {        
            $err = "You have been Inactive by Admin.";
            $this->errorCode = $err;
        }
       else
        {  
            $this->_id=$record['E_NAME'];
           $this->setState('title', $record['E_NAME']);
           $this->errorCode=self::ERROR_NONE;
        }
       return !$this->errorCode;
   }
   */
   
/* MODIFIKASI  CLASS 'UserIdentity' UNTUK (setState('lastLoginTime')*/
class UserIdentity extends CUserIdentity
{
    private $_id;
	private $_username;
																						
    public function authenticate()
    {		
		// $users=array(				# DEFINE LOGIN
			// // username => password
			// 'demo'=>'demo',
			// 'admin'=>'admin',
		// );
		
		# DEFAULT : login by username
		// $users=TblUserMysql::model()->findByAttributes(array('username'=>$this->username));
		// $user=User::model()->find('LOWER(username)=?',array(strtolower($this->username)));
		// $email=User::model()->findByAttributes(array('email'=>$this->email));
		
		#  login optional by username OR email
		$attribute = strpos($this->username, '@') ? 'email' : 'username';			//echo "attr--->".$attribute;
		$users = TblUserMysql::model()->find(array('condition' => $attribute . '=:loginname', 'params' => array(':loginname' => $this->username)));
		
        if($users===null)
            $this->errorCode=self::ERROR_USERNAME_INVALID;
        # use http://localhost/yiidoc/CPasswordHelper.html#generateSalt-detail NEW
		else if( CPasswordHelper::verifyPassword( $this->password, $users->password) )
		// else if($users->password!==$this->password)
		//else if ($users->password !== SHA1($this->password) )
		//else if(!$users->crypt_pass($this->password))		// encode to crypt / md5 /hash
		//else if(!$users->hash_pass($this->password))		// encode to crypt / md5 /hash
		//else if($users->password!==md5($this->password))
           $this->errorCode=self::ERROR_PASSWORD_INVALID;
        else
        {
            $this->_id = $users->id;
			$this-> _username = $users->username;

			$this->setState('roles',$users->role);
            $this->setState('lastLoginTime', 'test' );	//$users->lastLoginTime  //date("ymd")
            $this->setState('email', $users->email);	
			//$user->regenerateValidationKey();
			//$this->setState('vkey', $user->validation_key);
			
			# ADD authmanager  WITH AUTH FILE ( auth.php )
			// $auth=Yii::app()->authManager;	# initializes the authManager
			// # //checks if the role for this user has already been assigned and if it is NOT than it returns true and continues with assigning it below
			// if(!$auth->isAssigned($users->role,$this->_id)){
				// if($auth->assign($users->role,$this->_id)) {	# assigns the role to the user
					// Yii::app()->authManager->save();	# saves the above declaration
				// }
			// }
			$this->errorCode=self::ERROR_NONE;
        }																//echo SHA1($this->password);
        return !$this->errorCode;
    }
 
    public function getId()  //  override Id
    {
        return $this->_id;
    }
	
	public function getName()  //  override Id
    {
        return $this->_username;
    }
	
	// public function getRole()  //  override Id
    // {
        // return $this->_role;
    // }
	/**   ----------------- sample from angular-yii
	 * Creates an authenticated user with no passwords for registration
	 * process (checkout)
	 * @param string $username
	 * @return self
	 */
	public static function createAuthenticatedIdentity($id, $username) {
		$identity = new self($username, '');
		$identity->_id = $id;
		$identity->errorCode = self::ERROR_NONE;
		return $identity;
	}
}