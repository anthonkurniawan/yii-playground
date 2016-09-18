<p>
<b><?php echo $res; ?></b> <br><br>

User id : <b><?php echo Yii::app()->user->id; ?></b><br>
<?php  if ( ! Yii::app()->User->isGuest )  echo "User Role : <b>".Yii::app()->user->roles."</b>"; ?><br>
</p>

<p>
Yii::app()->user->checkAccess('guest') :
<?php dump(Yii::app()->user->checkAccess('guest')); ?> <br>

Yii::app()->user->checkAccess('user-a') :
<?php dump(Yii::app()->user->checkAccess('user-a')); ?> <br>

Yii::app()->user->checkAccess('user-b') :
<?php dump(Yii::app()->user->checkAccess('user-b')); ?> <br>

Yii::app()->user->checkAccess('poweruser') :
<?php dump(Yii::app()->user->checkAccess('poweruser')); ?> <br>

Yii::app()->user->checkAccess('administrator') :
<?php dump(Yii::app()->user->checkAccess('administrator')); ?> 
</p>

<p>
Yii::app()->user->checkAccess('authenticated') :
<?php dump(Yii::app()->user->checkAccess('authenticated')); ?> <br>

Yii::app()->user->checkAccess('administrator', array('id'=>'1')) :
<?php dump( Yii::app()->user->checkAccess('administrator', array('id'=>'1')));?>
</p>


  <?php 
// $auth=Yii::app()->authManager;
 
// $auth->createOperation('createPost','create a post');
// $auth->createOperation('readPost','read a post');
// $auth->createOperation('updatePost','update a post');
// $auth->createOperation('deletePost','delete a post');
 
// $bizRule='return Yii::app()->user->id==$params["post"]->authID;';
// $task=$auth->createTask('updateOwnPost','update a post by author himself',$bizRule);
// $task->addChild('updatePost');
 
// $role=$auth->createRole('reader');
// $role->addChild('readPost');
 
// $role=$auth->createRole('author');
// $role->addChild('reader');
// $role->addChild('createPost');
// $role->addChild('updateOwnPost');
 
// $role=$auth->createRole('editor');
// $role->addChild('reader');
// $role->addChild('updatePost');
 
// $role=$auth->createRole('admin');
// $role->addChild('editor');
// $role->addChild('author');
// $role->addChild('deletePost');
 
// $auth->assign('reader','readerA');
// $auth->assign('author','authorB');
// $auth->assign('editor','editorC');
// $auth->assign('admin','adminD');
?>