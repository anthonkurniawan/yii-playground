  <?php 
class  PhpAuthManager  extends  CPhpAuthManager { 
    Public  function  init() { 
        # arrange the hierarchy of roles in auth.php file in the config ?????????? 
        // if ( $this->authFile === null ) { 	
            // // $this->authFile = Yii::getPathOfAlias ('application.config.auth') .'.php';
			 // $this->authFile = Yii::getPathOfAlias ('application.protected.data.auth') .'.php';		
         // }
 
        parent::init() ;
							
        # For guests we have, and so the role of the default guest. 
        if ( ! Yii::app()->User->isGuest ) { 		
            # Link the role defined in the database with the user ID 
            # return UserIdentity.getId () . 
			# SNTAX :  assign(string $itemName, mixed $userId, string $bizRule=NULL, mixed $data=NULL)
            $this->assign( Yii::app()->user->roles , Yii::app()->user->id );
			//$this->save();
			
			# KALO ROLE FIELD PADA DB BERUPA CODE FIELD ( 0, 1, 2 ..)
			// switch( Yii::app()->user->id){
				// case 0:
					// $this->assign('user', Yii::app()->user->id) ;
					// break;
				// case 1:
					// $this->assign('administrator', Yii::app()->user->id) ;
					// break;
				// default:
					// $this->assign('guest', Yii::app()->user->id) ;
					// break;
			// }
			
			// $auth=Yii::app()->authManager;	# initializes the authManager
			// # //checks if the role for this user has already been assigned and if it is NOT than it returns true and continues with assigning it below
			// if(!$auth->isAssigned($users->role,$this->_id)){
				// if($auth->assign($users->role,$this->_id)) {	# assigns the role to the user
					// Yii::app()->authManager->save();	# saves the above declaration
				// }
			// }
		} 
    } 
}
?>