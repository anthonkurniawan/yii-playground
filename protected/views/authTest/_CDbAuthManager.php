 <a href="http://localhost/yiidoc/CDbAuthManager.html" target="_blank">CDbAuthManager</a> <br>
CDbAuthManager represents an authorization manager that stores authorization information in database.

  <?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
  <?php /*
 return array(
    'components'=>array(
        'db'=>array(
            'class'=>'CDbConnection',
            'connectionString'=>'sqlite:path/to/file.db',
        ),
        'authManager'=>array(
            'class'=>'CDbAuthManager',
            'connectionID'=>'db',
        ),
    ),
);
*/ ?>
 <?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>

The database connection is specified by <a href="CDbAuthManager.html#connectionID">connectionID</a>. And the database schema
should be as described in <code>"framework/web/auth/*.sql"</code>. You may change the names of
the three tables used to store the authorization data by setting <a href="CDbAuthManager.html#itemTable">itemTable</a>,
<a href="CDbAuthManager.html#itemChildTable">itemChildTable</a> and <a href="CDbAuthManager.html#assignmentTable">assignmentTable</a>

<ul>
<li> <b>create table itemTable, itemChildTable and assignmentTable</b></li>  <code> > mysql -u root  yiitest < D:\WEB\HTDOCS\yiiProject\yiiTest\protected\data\auth-schema-mysql.sql </code>


<li><b>Mendefinisikan Hirarki Otorisasi </b>/li>
<p>Mendefinisikan hirarki otorisasi mencakup tiga langkah: mendefinisikan
item otorisasi, membuat hubungan diantara item otorisasi,
dan menempatkan role ke pengguna aplikasi. Komponen aplikasi
<a href="/doc/api/1.1/CWebApplication#authManager">authManager</a> menyediakan seluruh set API
untuk tugas-tugas ini.</p>

Untuk mendefinisikan item otorisasi, panggil salah satu metode berikut,tergantung pada jenis itemnya:
<ul>
<li><a href="/doc/api/1.1/CAuthManager#createRole">CAuthManager::createRole</a></li>
<li><a href="/doc/api/1.1/CAuthManager#createTask">CAuthManager::createTask</a></li>
<li><a href="/doc/api/1.1/CAuthManager#createOperation">CAuthManager::createOperation</a></li>
</ul>
<br>
Setelah kita memiliki satu set item otorisasi, kita dapat memanggil metodeuntuk membuat hubungan diantara item-item otorisasi:
<ul>
<li><a href="/doc/api/1.1/CAuthManager#addItemChild">CAuthManager::addItemChild</a></li>
<li><a href="/doc/api/1.1/CAuthManager#removeItemChild">CAuthManager::removeItemChild</a></li>
<li><a href="/doc/api/1.1/CAuthItem#addChild">CAuthItem::addChild</a></li>
<li><a href="/doc/api/1.1/CAuthItem#removeChild">CAuthItem::removeChild</a></li>
</ul>
<br>
Dan terakhir, kita memanggil metode berikut untuk menempatkan item role kepengguna individual:
<ul>
<li><a href="/doc/api/1.1/CAuthManager#assign">CAuthManager::assign</a></li>
<li><a href="/doc/api/1.1/CAuthManager#revoke">CAuthManager::revoke</a></li>
</ul>

<b> Sample :</b><br>
  <?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
  <?php /*
$auth=Yii::app()->authManager;
 
 # createOperation(string $name, string $description='', string $bizRule=NULL, mixed $data=NULL)
$auth->createOperation('createPost','create a post');
$auth->createOperation('readPost','read a post');
$auth->createOperation('updatePost','update a post');
$auth->createOperation('deletePost','delete a post');
 
 # createTask(string $name, string $description='', string $bizRule=NULL, mixed $data=NULL)
$bizRule='return Yii::app()->user->id==$params["post"]->authID;';
$task=$auth->createTask('updateOwnPost','update a post by author himself',$bizRule);
$task->addChild('updatePost');
 
 # createRole(string $name, string $description='', string $bizRule=NULL, mixed $data=NULL)
$role=$auth->createRole('reader');
$role->addChild('readPost');
 
$role=$auth->createRole('author');
$role->addChild('reader');
$role->addChild('createPost');
$role->addChild('updateOwnPost');
 
$role=$auth->createRole('editor');
$role->addChild('reader');
$role->addChild('updatePost');
 
$role=$auth->createRole('admin');
$role->addChild('editor');
$role->addChild('author');
$role->addChild('deletePost');
 
# assign(string $itemName, mixed $userId, string $bizRule=NULL, mixed $data=NULL)
$auth->assign('reader','reader-a');
$auth->assign('author','author-a');
$auth->assign('editor','editor-a');
$auth->assign('admin','admin');
*/ ?>
 <?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>
</ul>

<p>Komponen <a href="/doc/api/1.1/CWebApplication#authManager">authManager</a> (seperti <a href="/doc/api/1.1/CPhpAuthManager">CPhpAuthManager</a>, <a href="/doc/api/1.1/CDbAuthManager">CDbAuthManager</a>)
akan menjalankan item otorisasi begitu dibuat. Kita TIDAK perlu menjalankan perintah diatas
untuk mengulangi pembuatannya di setiap permintaan.</p>

<h3 id="menggunakan-role-default">Menggunakan Role Default</h3>

<p>Banyak aplikasi Web memerlukan beberapa role sangat khusus yang ditempatkan ke
setiap pengguna atau hampir semua pengguna sistem. Sebagai contoh, kita mungkin ingin menempatkan beberapa
hak bagi para pengguna terotentikasi. Ini akan memunculkan banyak masalah pemeliharaan jika
kita secara eksplisit menetapkan dan menyimpan penempatan role tersebut. Kita dapat mengeksploitasi
<em>role default</em> guna memecahkan masalah ini.</p>

<p>Role default adalah sebuah role yang secara implisit ditempatkan ke setiap pengguna, termasuk
yang terotentikasi dan pengunjung. Kita tidak perlu secara eksplisit meng-assign kepada pengguna.
Saat <a href="/doc/api/1.1/CWebUser#checkAccess">CWebUser::checkAccess</a> dipanggil, role default akan diperiksa lebih dulu seolah-olah di-assign
kepada pengguna.</p>

<p>Role default harus dideklarasikan dalam properti <a href="/doc/api/1.1/CAuthManager#defaultRoles">CAuthManager::defaultRoles</a>.
Contohnya, konfigurasi berikut mendeklarasikan dua role sebagai role standar: <code>authenticated</code> dan <code>guest</code>.</p>
  <?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
  <?php /*
return array(
    'components'=>array(
        'authManager'=>array(
            'class'=>'CDbAuthManager',
            'defaultRoles'=>array('authenticated', 'guest'),
        ),
    ),
);
*/ ?>
 <?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>

<p>Karena role default ditempatkan ke setiap pengguna, biasanya perlu dikaitkan
dengan aturan bisnis yang menentukan apakah role benar-benar di-assign
kepada pengguna. Sebagai contoh, kode berikut mendefinisikan dua role,
<code>authenticated</code> dan <code>guest</code>, yang secara efektif di-assign ke masing-masing
para pengguna terotentikasi dan pengunjung.</p>
  <?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
<?php /*
$bizRule='return !Yii::app()->user->isGuest;';
$auth->createRole('authenticated', 'authenticated user', $bizRule);
 
$bizRule='return Yii::app()->user->isGuest;';
$auth->createRole('guest', 'guest user', $bizRule);
*/ ?>
 <?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>

<h3><b> SAMPLE http://danaluther.blogspot.com/2010/03/yii-authentication-via-database.html </b> </h3>
<p>
We're going to step through setting up 3 basic roles. An admin role, an authenticated role, and a guest role.<br>
 With this, we can add in infinite customized authentication tasks/operations for all our needs.
 </p>
 
 <p>
 The admin role will be specifically assigned to user IDs from our Users table. 
It's time to head back into the <code>yiic shell</code> and set up our basic roles. 
If you prefer, you can enter these directly into the database tables you created, or copy the code into a php page which you run <b>ONE TIME ONLY.</b>
</p> 
(For the purposes of this example, we will assume that you, the primary admin, are user id 1) <br>
The shell version(running this from the shell automatically saves it, if you run it from a php page, I believe you need to call <code>$auth->save()</code> at the end 

  <?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
  <?php /*
$auth=Yii::app()->authManager;

$bizRule='return !Yii::app()->user->isGuest;';
$auth->createRole('authenticated', 'authenticated user', $bizRule);
 
$bizRule='return Yii::app()->user->isGuest;';
$auth->createRole('guest', 'guest user', $bizRule);

$role = $auth->createRole('admin', 'administrator');
$auth->assign('admin',1); // adding admin to first user created
*/ ?>
 <?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>


 EVERY user therefor will fall into one of those two categories and can access tasks/operations assigned to authenticated or guest users.
		
<b>In Contronroller</b>
  <?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
   <?php /*
public function accessRules(){
    return array(
        array('allow', // allow anyone to register
              'actions'=>array('create'), 
              'users'=>array('*'), // all users
        ),
        array('allow', // allow authenticated users to update/view
              'actions'=>array('update','view'), 
              'roles'=>array('authenticated')
        ),
        array('allow', // allow admins only to delete
              'actions'=>array('delete'), 
              'roles'=>array('admin'),
        ),
        array('deny', // deny anything else
              'users'=>array('*'),
        ),
    );
}
*/ ?>
 <?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>

But, we don't want the users to edit each other! This is where tasks/operations come into play. <br>
We need a task which allows users to update their own information. Back to the shell:
  <?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
   <?php /*
$auth=Yii::app()->authManager;
$bizRule = 'return Yii::app()->user->id==$params["User"]->id;';
$auth->createTask('updateSelf', 'update own information', $bizRule);

$role = $auth->getAuthItem('authenticated'); // pull up the authenticated role
$role->addChild('updateSelf'); // assign updateSelf tasks to authenticated users
*/ ?>
 <?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>

Finally...
Open the UserController.php file again and move to the actionUpdate() function. We'll need to modify it as such:
  <?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
  <?php /*
public function actionUpdate()
{
    $model = $this->loadModel();
    
    // set the parameters for the bizRule
    $params = array('User'=>$model);
    // now check the bizrule for this user
    if (!Yii::app()->user->checkAccess('updateSelf', $params) &&
        !Yii::app()->user->checkAccess('admin'))
    {
        throw new CHttpException(403, 'You are not authorized to perform this action');
    }
    ...
*/ ?>
 <?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>
	
