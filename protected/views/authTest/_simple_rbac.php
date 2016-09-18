<b>Sample implement RBAC without AuthManager</b> ( <code>CPhpAuthManager</code> or <code>CDbAuthManager</code> ) <br>
<b>Note : <b><br> 
- jadi hanya buat session - setState("role", $role) saat login <br>
- dan override pada class extend dari <code>CWebUser</code> di yg gw buat : <code>tambahInfoUser.php</code> <br>
 dengan tambahkan method <code>checkAccess($operation, $params=array())</code> <br>
<br>
Checking permissions: structure 
Modify or create the "WebUser.php" file under the "protected/components" directory so that it overloads the checkAccess() method.
 <?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
<?php /*
class WebUser extends CWebUser
{

     # Overrides a Yii method that is used for roles in controllers (accessRules).
     #
     # @param string $operation Name of the operation required (here, a role).
     # @param mixed $params (opt) Parameters for this operation, usually the object to access.
     # @return bool Permission granted?
   
    public function checkAccess($operation, $params=array())
    {
        if (empty($this->id)) {
            // Not identified => no rights
            return false;
        }
        $role = $this->getState("roles");
        if ($role === 'admin') {
            return true; // admin role has access to everything
        }
        // allow access if the operation request is the current user's role
        return ($operation === $role);
    }
}
*/ ?>
<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>

You can define your own logic in this checkAccess() methods.

Make sure this class is used by Yii. The config file "protected/config/main.php" must contain:

 <?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
<?php /*
'components' => array(
    // ...
    'user' => array(
        'class' => 'WebUser',
    ),
*/ ?>
<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>