 
A fundamental concept in Yii's RBAC is authorization item. An authorization item is a permission to do something (e.g. creating new blog posts, managing users). <br>
authorization items can be classified as <b>roles, task, operations</b> ( roles berisi task, task berisi operation, operation terdapat permission). <br>
<b>For example</b><br> kita bisa memiliki sistem dengan role administrator yang terdiri dari task post management dan task user management. <br>
Task user management terdiri dari operation create user, update user dan delete user.<br>
 Agar lebih fleksibel, Yii juga mengijinkan role terdiri dari role atau operation lain, task terdiri dari task lain, dan operation terdiri dari operation lainnya, task terdiri dari task-task lain, <br>
 dan operation terdiri dari operation-operation lainnya.<br>
 
Yii implements a hierarchical RBAC scheme via its <a href="http://localhost/yiidoc/CWebApplication.html#authManager-detail" target="_blank">authManager</a> application component.

untuk melakukan cek otorisasi dapat dengan : <br>

<h3>Menggunakan Aturan Bisnis (Business Rule) </h3>
Ketika kita mendefinisikan hirarki otorisasi, kita dapat mengaitkan sebuah role, tugas atau operasi dengan apa yang disebut aturan bisnis.<br>
 Kita juga dapat mengaitkan aturan bisnis saat kita menempatkan sebuah role kepada pengguna.
  <?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
  <?php /*
 if(Yii::app()->user->checkAccess('createPost'))
{
    // buat post
}

// Jika aturan otorisasi dikaitkan dengan aturan bisnis yang memerlukan parameter tambahan, kita juga dapat mengoperkannya. 
// Contoh, untuk memeriksa apakah pengguna dapat memutakhirkan sebuah tulisan, kita akan melakukan
$params=array('post'=>$post);
if(Yii::app()->user->checkAccess('updateOwnPost',$params))
{
    // mengupdate tulisan
}
*/ ?>
 <?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>

AccessRules and CheckAccess with parameters
If you want to pass parameters with the role/task/operation you can do so like this:
  <?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
  <?php /*
array('allow',
 'actions' => array('myaction'),
 'roles' => array(
  'myrole' =>  array('param0' => $param0, 'param1' => $param1),  
 ),
),
*/ ?>
 <?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>

<b>How to display a different menu according to roles , You can also use just one menu for all users based upon different roles. for example :</b>
 <?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
<?php /*
$user = Yii::app()->user; // just a convenience to shorten expressions
$this->widget('zii.widgets.CMenu',array(
    'items'=>array(             
        array('label'=>'Users', 'url'=>array('/manageUser/admin'), 'visible'=>$user->checkAccess('staff')),
        array('label'=>'Your Ideas', 'url'=>array('/userarea/ideaList'), 'visible'=>$user->checkAccess('normal')),
        array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>$user->isGuest),
        array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!$user->isGuest)
    ),
));
*/ ?>
 <?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>


<H3>Note </h3>
<pre>
Regarding the classification of role -> task -> operation, they are essentially the same thing, as you can see in the code they are of class CAuthItem. 
We name them differently mainly from user point of view. 

- Operations are only used by developers and they represent the finest level of permission.
- Tasks are built on top of operations by developers. They represent the basic building units to be used by RBAC administrators.
- Roles are built on top of tasks by administrators and may be assigned to users or user groups.

The above is a recommendation, not requirement. In general, administrators can only see tasks and roles, while developers only care about operations and tasks. 
</pre><br>


<b>Turning the authorisation tree 'right way up' was more helpful to me when understanding the parent-child relationships between updateOwnPost and updatePost.</b>
<pre>
<code>
(Person) "AuthorB"

has (Role) author
(Role) author

has (Task) reader
has (Task|Operation) createPost
has (Task|Operation) updateOwnPost (i.e. where author_id = me) (1)
(Task) updateOwnPost

has (Operation) updatePost (2)
</code>

If you want users to be able update all posts, give them access to updatePost
If you want to allow users to update ONLY their OWN posts (i.e. via the Business Rule), then give them access to updateOwnPost (2)
So, traversing the access tree from the top you get through the gate called "updateOwnPost" if the condition is true. Note: you can't update anything yet. 
Only when you pass this gate do you fall through to "updatePost" - and this is where you get the actual permission to make an update.

Hence the contoller only needs to grant permission for update action to the updatePost role
</pre>

<b>1. Configurasi Authmanager </b> <br>
 ada 2 jenis manajement otorisasi  yaitu  <b>CPhpAuthManager</b> dan <b>CDbAuthManager</b> <br><br>
 

