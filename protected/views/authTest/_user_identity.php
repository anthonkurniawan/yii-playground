<a href="http://www.yiiframework.com/doc/guide/1.1/en/topics.auth#role-based-access-control" target="_blank" class="right">RBAC ( role-based-access-control )</a> 

<p>
<code>Yii::app()->user</code> Using the user component, we can check if a user is logged in or not via <code>CWebUser::isGuest</code> we can login and logout a user; <br>
 we can check if the user can perform specific operations by calling <code>CWebUser::checkAccess;</code> and we can also obtain the unique identifier and other persistent identity information about the user. <br>
 </p>
 
<p>
We define an identity class which contains the actual authentication logic. The identity class should implement the IUserIdentity interface.  <br>
Different identity classes can be implemented for different authentication approaches (e.g. OpenID, LDAP, Twitter OAuth, Facebook Connect)
</p>

<b>1. Defining Identity Class </b>
An identity class may also declare additional identity information that needs to be persistent during the user session. <br>

The implementation of the <code>>authenticate()</code> method to use the database to validate credentials. <br>
Overriding the <code>CUserIdentity::getId()</code> method to return the <code>_id</code> property because the default implementation returns the username as the ID. <br>
Using the <code>setState()</code> <code>(CBaseUserIdentity::setState)</code> method to demonstrate storing other information that can easily be retrieved upon subsequent requests. <br>

<?php 
	Yii::app()->sc->collect('php', Yii::app()->sc->getSourceFromFile( Yii::app()->basePath.'/components/UserIdentity.php'));	
	Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE
?>

<p>
Info: By default, CWebUser uses session as persistent storage for user identity information. <br>
If cookie-based login is enabled (by setting CWebUser::allowAutoLogin to be true), the user identity information may also be saved in cookie. <br>
Make sure you do not declare sensitive information (e.g. password) to be persistent.
</p>

<p>
<b>Storing passwords in the database</b> <br>
you should salt the password before hashing and use a hash function that takes the attacker a long time to compute. <br>
The above code example uses the built-in PHP crypt() function which, with appropriate use, returns hashes that are very hard to crack.
</p>

<b>2. LOGIN </b>
<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
<?php /*
// Login a user with the provided username and password.
$identity=new UserIdentity($username,$password);
if($identity->authenticate())
    Yii::app()->user->login($identity);
else
    echo $identity->errorMessage;

// Logout the current user
Yii::app()->user->logout();
 */ ?>
<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>

<b>3. Cookie-based Login </b>
<p>
By default, a user will be logged out after a certain period of inactivity, depending on the session configuration.<br>
 To change this behavior, we can set the allowAutoLogin property of the user component to be true and pass a duration parameter to the <code>CWebUser::login</code> method.<br>
 The user will then remain logged in for the specified duration, even if he closes his browser window. Note that this feature requires the user's browser to accept cookies.
</p>

<p>
Although Yii has measures to prevent the state cookie from being tampered on the client side, we strongly suggest that security sensitive information be not stored as states.<br>
 Instead, these information should be restored on the server side by reading from some persistent storage on the server side (e.g. database).
<p>

<b>In addition, for any serious Web applications, we recommend using the following strategy to enhance the security of cookie-based login. </b>
<p>
When a user successfully logs in by filling out a login form, we generate and store a random key in both the cookie state and in persistent storage on server side (e.g. database). <br>
Upon a subsequent request, when the user authentication is being done via the cookie information, we compare the two copies of this random key and ensure a match before logging in the user.br>
If the user logs in via the login form again, the key needs to be re-generated.<br>
By using the above strategy, we eliminate the possibility that a user may re-use an old state cookie which may contain outdated state information.
<p>

<b>To implement the above strategy, we need to override the following two methods: </b>
<ul>
<li><code>CUserIdentity::authenticate()</code>: this is where the real authentication is performed.</li>
 If the user is authenticated, we should re-generate a new random key, and store it in the database as well as in the identity states via CBaseUserIdentity::setState.
<li><code>CWebUser::beforeLogin()</code>: this is called when a user is being logged in.</li> We should check if the key obtained from the state cookie is the same as the one from the database.
</ul>