
<a href="http://localhost/yiidoc/CPhpAuthManager.html" target="_blank">CPhpAuthManager</a>
CPhpAuthManager represents an authorization manager that stores authorization information in terms of a PHP script file. <br>
The authorization data will be saved to and loaded from a file specified by authFile, which defaults to 'protected/data/auth.php'.  <br>
CPhpAuthManager is mainly suitable for authorization data that is not too big (for example, the authorization data for a personal blog system). Use CDbAuthManager for more complex authorization data. <br>
You must define four roles: guest , User , Moderator , administrator and assign them to the users of the database with the corresponding field Role . Then check access.<br>

<p>The first step is to configure the component itself. <code>protected / config / main.php </code>:</p>
  <?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
  <?php /*
'authManager'=> array ( 
    # We will use your login manager 
   'class'=>'PhpAuthManager',
     # default role. Everyone who is not the admins, moderators and nick - guests. 
   'defaultRoles'=> array ('guest') ,
 ) ,
 */ ?>
  <?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>

 We describe the protected / config / auth.php :
   <?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
   <?php /*
 return array(
   'guest'=> array(
       'type'=> CAuthItem::TYPE_ROLE,
       'description'=>'Guest',
       'bizRule'=> null,
       'data'=> null
    ),
   'user'=> array(
       'type'=> CAuthItem::TYPE_ROLE,
       'description'=>'User',
       'children'=> array(
           'guest', // inherit from the guest 
        ),
       'bizRule'=> null,
       'data'=> null
    ),
   'moderator'=> array(
       'type'=> CAuthItem::TYPE_ROLE,
       'description'=>'Moderator',
       'children'=> array(
           'user',          // let all the moderation that will allow users to 
        ),
       'bizRule'=> null,
       'data'=> null
    ),
   'administrator'=> array(
       'type'=> CAuthItem::TYPE_ROLE,
       'description'=>'Administrator',
       'children'=> array(
           'moderator',         // let all the admin is allowed to moderation
        ),
       'bizRule'=> null,
       'data'=> null
    ),
);
*/ ?>
 <?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>

We now have a set of roles and we know the user's role. It remains to connect them. To do this, create a class PhpAuthManager . protected / Components / PhpAuthManager.php :
  <?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
  <?php /*
class  PhpAuthManager  extends  CPhpAuthManager { 
    Public  function  init() { 
        # arrange the hierarchy of roles in auth.php file in the config ?????????? 
        if ( $this->authFile === null ) { 
            $this->authFile = Yii::getPathOfAlias ('application.config.auth') .'.php';
         }
 
        parent::init() ;
 
        # For guests we have, and so the role of the default guest. 
        if ( ! Yii::app()->User->isGuest ) { 
            # Link the role defined in the database with the user ID 
            # return UserIdentity.getId () . 
            $this->assign ( Yii::app()->User->Role , Yii::app()->User->ID ) ;
         } 
    } 
}
*/ ?>
 <?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>


Now you can use:
  <?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
  <?php /*
if ( Yii :: app() -> User -> checkAccess ('administrator') ) { 
    echo  " hello, I'm administrator " ;
 }
 */ ?>
  <?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>
It is also possible to check the rights of the method accessRules , as shown in the manual .

Hint: not necessarily create auth.php manually, you can use the methods CAuthManager (Yii :: app () -> authManager), described in the manual . Do not forget to call Yii :: app () -> authManager-> save () .

Appendix 1: Model User :
  <?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
  <?php /*
 # Model User

class  User  extends  CActiveRecord  { 
    const  ROLE_ADMIN ='administrator';
     const  ROLE_MODER ='moderator';
     const  ROLE_USER ='user';
     const  ROLE_BANNED ='banned';
 
    Public  static  function  model ( $ className = __class__ attribute of an ) { 
        return  parent :: model ( $ className ) ;
     }
 
    Public  function  tableName() { 
        return 'User';
     }
 
    protected  function  beforeSave() { 
        $ this -> password = MD5 ( $ this -> password ) ;
         return  parent :: beforeSave() ;
     } 
}
*/ ?>
 <?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>