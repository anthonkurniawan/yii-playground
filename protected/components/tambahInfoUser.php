<?php
 
// this file must be stored in:
// protected/components/tambahInfoUser.php
 
class tambahInfoUser extends CWebUser {
 
  // Store model to not repeat query.
  private $_model;
 
  // Return first name.
  // access it by Yii::app()->user->first_name
  function getFirst_Name(){
    $user = $this->loadUser(Yii::app()->user->id);	
	$data = ($user) ?  $user->first_name : "-- not set --";
    return $data;
  }
 
 # Return Role : app () -> User-> Role
 // function  getRole ( )  { 
	// if ( $User = $this-> getModel ( ) ) { 
		// // in the table there is a field User Role 
		// return  $User -> Role ;
	// } 
  // }
	
  // This is a function that checks the field 'role'
  // in the User model to be equal to 1, that means it's admin
  // access it by Yii::app()->user->isAdmin()
  function isAdmin(){	//echo"test";
    $user = $this->loadUser(Yii::app()->user->id); //load user
    return intval($user->role) == 1;
  }
 
  // Load user model.
  protected function loadUser($id=null)
    {
        if($this->_model===null)
        {
            if($id!==null)
                $this->_model=TblUserMysql::model()->findByPk($id);
        }
        //print_r ($this->_model);
		return $this->_model;
    }
	
	/**		---OPTIONAL: JIKA GUNAKAN SIMPLE RBAC  TANPA "authManager" ( TANPA PERLU FILE AUTH "auth.php" ) ---
     * Overrides a Yii method that is used for roles in controllers (accessRules).
     *
     * @param string $operation Name of the operation required (here, a role).
     * @param mixed $params (opt) Parameters for this operation, usually the object to access.
     * @return bool Permission granted?
     */
    // public function checkAccess($operation, $params=array())
    // {											echo "operation-->".$operation. "  param-->"; print_r($params);
        // if (empty($this->id)) {
            // // Not identified => no rights
            // return false;
        // }
		
        // // $role = $this->getState("roles");
        // // if ($role === 'admin') {
            // // return true; // admin role has access to everything
        // // }
		 // // allow access if the operation request is the current user's role
       // // return ($operation === $role);
	   
		// # If you want to assign multiple roles to a user (separated by a comma) you can replace
		// $roles = explode(',', $this->getState("roles"));		
		// if (in_array('admini1', $roles) || in_array($operation, $roles)){
			// return true;
		// }
    // }
	
	#SAMPLE THEME USER
	function user_theme(){
		//session theme not defined
		if(empty(Yii::app()->session['currentTheme'])):
			//user is guest, load default theme
			if (Yii::app()->user->isGuest):
				//here you can do your trick to load a default theme, I won't go beyond into Theme::getDefaultTheme() because that is unnecessary to the case you mentioned,you could just put 'default' here
				Yii::app()->session['currentTheme'] = Theme::getDefaultTheme();  // = 'classic or default'
			else:
				$user = $this->loadUser(Yii::app()->user->getId());
				if ($user->theme_name && $user->theme->status == Theme::STATUS_ONLINE): //or if($user->isAdmin()) 
					Yii::app()->session['currentTheme'] = $user->theme_name;
				else:
					Yii::app()->session['currentTheme'] = Theme::getDefaultTheme();
				endif;
			endif;
		endif;
                
		return Yii::app()->session['currentTheme'];
	}
}

?>