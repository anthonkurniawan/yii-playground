
<b>4. Access Control Filter</b>  <a href="http://localhost/yiidoc/CController.html" target="_blank" class="right">CControll</a> <br>
Access control filter is a preliminary authorization scheme that checks if the current user can perform the requested controller action.<br>
 The authorization is based on user's name, client IP address and request types. It is provided as a filter named as "accessControl".
 <p>
 <b>Tip: Access control filter is sufficient for simple scenarios. For more complex access control you may use role-based access (RBAC), which we will cover in the next subsection.</b>
 </p>
 
 To control the access to actions in a controller, we install the access control filter by overriding <code>CController::filters</code> (see Filter for more details about installing filters). <br>
 Filters can be individual objects, or methods defined in the controller class. They are specified by overriding filters() method. The following is an example of the filter specification:
 <?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
 <?php
 # Filters can be individual objects, or methods defined in the controller class. They are specified by overriding filters() method.
 array(
	# sample method-based filters (defined in CController)
    'accessControl - login', # the '-'  the filter runs only when the requested action is not among those actions
    'ajaxOnly + search', # The '+'  the filter runs only when the specified actions are requested;
	# Sample object-based filter
    array(
        'COutputCache + list',
        'duration'=>300,
    ),
)
?>
<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>

 The detailed authorization rules used by the filter are specified by overriding CController::accessRules in the controller class.
 <?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
 <?php /*
	# CAccessControlFilter performs authorization checks for the specified actions. 
	# Returns the access rules for this controller. Override this method if you use the accessControl filter.
    public function accessRules()
    {
        return array(
            array('deny',
                'actions'=>array('create', 'edit'),
                'users'=>array('?'),
            ),
            array('allow',
                'actions'=>array('delete'),
                'roles'=>array('admin'),
            ),
			# For maximum security consider adding
            array('deny',
                'actions'=>array('delete'),
                'users'=>array('*'),
            ),
			# optional, list of action IDs (case insensitive) that this rule applies to
			# if not specified or empty, rule applies to all actions
			'actions'=>array('edit', 'delete'),

			# optional, list of controller IDs (case insensitive) that this rule applies to
			'controllers'=>array('post', 'admin/user'),

			# optional, list of usernames (case insensitive) that this rule applies to
			# Use * to represent all users, ? guest users, and @ authenticated users
			'users'=>array('thomas', 'kevin'),

			# optional, list of roles (case sensitive!) that this rule applies to.
			'roles'=>array('admin', 'editor'),

			# since version 1.1.11 you can pass parameters for RBAC bizRules
			'roles'=>array('updateTopic'=>array('topic'=>$topic))

			# optional, list of IP address/patterns that this rule applies to
			# e.g. 127.0.0.1, 127.0.0.*
			'ips'=>array('127.0.0.1'),

			# optional, list of request types (case insensitive) that this rule applies to
			'verbs'=>array('GET', 'POST'),

			# optional, a PHP expression whose value indicates whether this rule applies
			# The PHP expression will be evaluated using evaluateExpression.
			# A PHP expression can be any PHP code that has a value. To learn more about what an expression is,
			# please refer to the php manual.
			'expression'=>'!$user->isGuest && $user->level==2',

			# optional, the customized error message to be displayed
			# This option is available since version 1.1.1.
			'message'=>'Access Denied.',

			# optional, the denied method callback name, that will be called once the
			# access is denied, instead of showing the customized error message. It can also be
			# a valid PHP callback, including class method name (array(ClassName/Object, MethodName)),
			# or anonymous function (PHP 5.3.0+). The function/method signature should be as follows:
			# function foo($user, $rule) { ... }
			# where $user is the current application user object and $rule is this access rule.
			# This option is available since version 1.1.11.
			'deniedCallback'=>'redirectToDeniedMethod',        
        );
    }
*/ ?>
 <?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>

<ul>
<li><a href="http://localhost/yiidoc/CAccessRule.html#actions">actions</a>: specifies which actions this rule
matches. This should be an array of action IDs. The comparison is case-insensitive.</li>
<li><a href="http://localhost/yiidoc/CAccessRule.html#controllers">controllers</a>: specifies which controllers this rule
matches. This should be an array of controller IDs. The comparison is case-insensitive.</li>
<li><a href="http://localhost/yiidoc/CAccessRule.html#users">users</a>: specifies which users this rule matches.
The current user's <a href="http://localhost/yiidoc/CWebUser.html#name">name</a> is used for matching. The comparison
is case-insensitive. Three special characters can be used here:

<ul>
<li><code>*</code>: any user, including both anonymous and authenticated users.</li>
<li><code>?</code>: anonymous users.</li>
<li><code>@</code>: authenticated users.</li>
</ul></li>
<li><a href="http://localhost/yiidoc/CAccessRule.html#roles">roles</a>: specifies which roles that this rule matches.
This makes use of the <b>role-based access control</b>
feature to be described in the next subsection. In particular, the rule
is applied if <a href="http://localhost/yiidoc/CWebUser.html#checkAccess">CWebUser::checkAccess</a> returns true for one of the roles.
Note, Anda harus menggunakan set aturan terutama dalam aturan <code>allow</code> karena secara definisi, aturan mewakili perijinan untuk melakukan sesuatu. Juga harap dicatat, meskipun kita menggunakan batasan roles di sini, nilainya sebenarnya dapat berupa item otentikasi, termasuk roles, tugas dan operasi.</li>
<li><a href="http://localhost/yiidoc/CAccessRule.html#ips">ips</a>: specifies which client IP addresses this rule
matches.</li>
<li><a href="http://localhost/yiidoc/CAccessRule.html#verbs">verbs</a>: specifies which request types (e.g.
<code>GET</code>, <code>POST</code>) this rule matches. The comparison is case-insensitive.</li>
<li><a href="http://localhost/yiidoc/CAccessRule.html#expression">expression</a>: specifies a PHP expression whose value
indicates whether this rule matches. In the expression, you can use variable <code>$user</code>
which refers to <code>Yii::app()-&gt;user</code>.</li>
</ul>