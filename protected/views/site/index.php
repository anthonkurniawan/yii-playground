<!--EDIT INI UNTUK CONTENT YANG AKAN DI LOAD PADA (protected\views\layouts\main.php)-->
<?php //$this->layout='column1';?>  <!-- SET INI JIKA TDK IKUTI DEFAULT DARI CONTROLLER -->
<?php $this->pageTitle=Yii::app()->name; $this->breadcrumbs=array('HOME',);?>
 
<h3>Welcome to <i> <?php echo CHtml::encode(Yii::app()->name); ?> </i> - Version YII : <?php echo Yii::getVersion(); ?></h3>



<style>
.container {width:1100px; margin:0 auto;}  /*change width page*/

#logo {   /*SHADOW BANNER TOP YII LOGO*/	
	text-shadow: rgba(0, 0, 0, 0.3) 2px 2px 3px;
	overflow: hidden;
}
</style>

<?php //dump(Yii::app()->user->checkAccess); ?>
 <!---------------------------------------------------------------------------------------------------------------->
<div class="view2">
<p> <span class="label label-inverse">Controller</span></p>

Yii::app()->getController()->id : <code><?php echo Yii::app()->getController()->id; ?> <i>*same with</i></code><br>
$this->id: <code><?php echo $this->id; ?></code><br>
Yii::app()->controller->action->id : <code><?php echo Yii::app()->controller->action->id; ?></code><br>
$this->route : <code><?php echo $this->route; ?></code><br>
$this->uniqueId : <code><?php echo $this->uniqueId; ?></code><br>
$this->viewPath : <code><?php echo $this->viewPath; ?></code><br>
Yii::app()->getController()->getRoute() :<code><?php echo Yii::app()->getController()->getRoute(); ?></code><br>
$this->getControllerRoute() :<code><?php echo $this->getControllerRoute();?> (function on AdminController) GA FIX!</code><br>
Yii::app()->getController()->createUrl($this->getId()) :<code><?php echo Yii::app()->getController()->createUrl($this->getId()); ?> </code><br>

<div class="tpanel right">
	<div class="toggle btn btn-sm btn-primary"><?php echo Yii::t('ui','View Controller Object'); ?></div>
	<div class="scroll"><?php dump( Yii::app()->getController() ); ?></div>
</div>
</div>


 <code> Extended Controller "AdminController" $this->getRemoteAddr();</code> <?php echo $this->getRemoteAddr();?> <br>

<!--------------------------------------------------------- CHECK VAR ------------------------------------------------------------->
 <div class="tpanel" style="float:left"> 
	<b class="toggle txtHead btn btn-sm btn-primary"><?php echo Yii::t('ui','View Main config Yii::app'); ?></b>
	<div class="scroll2"><?php dump(Yii::app()); ?></div>
</div> 
<div class="clear"></div>
<!------------------------------------------------------------------------------------------>
<?php 
Yii::app()->user->setFlash('test1', 'tonaa'); 
Yii::app()->user->setFlash('test2', 'kereeenn'); 
dump( Yii::app()->user->getFlashes() );
?>
<?php //echo $this->getController(); ?>	

<div class="view2" style="width:auto">
<b>Yii Application Config ( Yii::app() ) :</b>
	<?php 
	echo"<br>Yii::app()->id --><code>".  Yii::app()->id."</code> <i>( the unique identifier for the application )</i>";
	echo"<br>Yii::app()->name--><code>".Yii::app()->name."</code>";
	echo"<br>Yii::app()->theme--><code>".Yii::app()->theme."</code>";  
	echo"<br>Yii::app()->catchAllRequest--><code>".Yii::app()->catchAllRequest."</code>"; 
	echo"<br>Yii::app()->getTimeZone()--><code>".Yii::app()->getTimeZone()."</code> <i>the time zone used by this application</i>";
	echo"<br>Yii::app()->getLanguage()--><code>".Yii::app()->getLanguage()."</code>";
	echo"<br>Yii::app()->sourceLanguage--><code>".Yii::app()->sourceLanguage ."</code> <i> the language that the application is written in.</i>";
	echo"<br>Yii::app()->charset--><code>".Yii::app()->charset ."</code> <i>the charset currently used for the application.</i>";
	echo"<br>Yii::app()->homeUrl --><code>".  Yii::app()->homeUrl."</code>";		
	echo"<br>Yii::app()->getBasePath()--><code>".Yii::app()->getBasePath()."</code> <i>(the root path of the application.)</i>";	//CModule
	echo"<br>Yii::app()->getBaseUrl()--><code>".Yii::app()->getBaseUrl()."</code> <i>( the relative URL for the application. </i>";
	echo"<br>Yii::app()->controllerNamespace<code>".Yii::app()->controllerNamespace."</code>";
	echo"<br>Yii::app()->controllerPath<code>".Yii::app()->controllerPath ."</code>";
	echo"<br>Yii::app()->defaultController<code>".Yii::app()->defaultController ."</code>";
	echo"<br>Yii::app()->layoutPath<code>".Yii::app()->layoutPath ."</code>";
	echo"<br>Yii::app()->layout<code>".Yii::app()->layout ."</code>";
	echo"<br>Yii::app()->extensionPath--><code>".Yii::app()->extensionPath ."</code>";
	echo"<br>Yii::app()->viewPath--><code>".Yii::app()->viewPath ."</code>";
	echo"<br>Yii::app()->modulePath --><code>".  Yii::app()->modulePath. "</code><i>( the directory that contains the application modules.)</i>";//CModule
	echo"<br>Yii::app()->localeDataPath --><code>".  Yii::app()->localeDataPath. "</code><i>( the directory that contains the locale data.)</i>";
	echo"<br>Yii::app()->runtimePath  --><code>". Yii::app()->runtimePath ."</code> <i>( Returns the directory that stores runtime files.)</i>";	
	echo "<br>Yii::getPathOfAlias('webroot.protected.backups') :<code>".Yii::getPathOfAlias('webroot.protected.backups') ."</code>";
	echo "<br>this->getLayoutFile('main') : <code>" . $this->getLayoutFile('main') ."</code>";
	echo"<br>Yii::app()->behaviors-->".print_r( Yii::app()->behaviors); //the behaviors that should be attached to the module. #//CModule
	?>
	<?php echo"<br>Yii::getFrameworkPath() --><code>".Yii::getFrameworkPath()."</code>"; ?>
	<?php echo"<br>Yii::getPathOfAlias('system.web.CController') --><code>".Yii::getPathOfAlias('system.web.CController')."</code>"; ?> 
</div>

<div class="view2" style="width:auto">
<b> Others :</b>
	<?php
	echo"<br>Yii::app()->user->getReturnUrl()--><code>". Yii::app()->user->getReturnUrl()."</code> ( Returns the URL that the user should be redirected to after successful login.)";
	echo"<br>Yii::app()->request->hostInfo --><code>". Yii::app()->request->hostInfo."</code>";
	echo"<br>dump(Yii::app()->controllerMap --><code>"; dump(Yii::app()->controllerMap);
	echo"<br></code>Yii::app()->request->csrfToken --><code>".Yii::app()->request->csrfToken ."</code>";
	?>
</div>

<div class="view2" style="width:auto">
<b>Info user :</b>
	<a href="http://localhost/yiidoc/CWebUser.html" target="_blank">Dokumentasi CWebUser</a><br />
	<a href="http://www.yiiframework.com/doc/guide/1.1/en/topics.auth#role-based-access-control" target="_blank">RBAC ( role-based-access-control )</a><br />
	<?php 
	echo"<br>Yii::app()->user->id --><code>".Yii::app()->user->id ."</code>";echo" = user->getId() --><code>".Yii::app()->user->getId()."</code>";
	
	echo"<br>Yii::app()->user->getIsInitialized() --><code>". Yii::app()->user->getIsInitialized()."</code>";
	if(Yii::app()->user->id!=null) {
	echo"<br>Yii::app()->user->isAdmin() --><code>".Yii::app()->user->isAdmin("admin")."</code>";
	echo"<br>Yii::app()->user->getIsGuest() --><code>". Yii::app()->user->getIsGuest()."</code>";
	echo"<br>Yii::app()->user->name :<code>". Yii::app()->user->name."</code>";
	echo" = user->getName() --><code>".Yii::app()->user->getName()."</code>";
	echo"<br>Yii::app()->user->roles :<code>". Yii::app()->user->roles."</code>";
	echo"<br>Similar with = Yii::app()->user->hasProperty('first_name') --><code>". Yii::app()->user->hasProperty('first_name') ."</code>";
	echo"<br>Yii::app()->user->first_name --><code>".Yii::app()->user->first_name."</code>";	
	//echo"<br>Yii::app()->user->first_name --><code>".Yii::app()->user->lastLoginTime."</code>";
	//echo"<br>Yii::app()->user->hasProperty(email) --><code>". Yii::app()->user->hasProperty(email)."</code>";
	echo"<br>Yii::app()->user->getState('email') --><code>".Yii::app()->user->getState('email')."</code>";
	echo"<br>OR JUST USING : Yii::app()->user->email --><code>".Yii::app()->user->email."</code>";
	echo"<br>Yii::app()->user->getState('lastLoginTime')--><code>". Yii::app()->user->getState('lastLoginTime')."</code>";
	}
	echo"<br>Yii::app()->user-->getStateKeyPrefix() --><code>". Yii::app()->user->getStateKeyPrefix() ."</code>";
	echo"<br>Yii::app()->user->getStateKeyPrefix() --><code>". Yii::app()->user->getStateKeyPrefix()."</code>";
	echo"<br>Yii::app()->request->userHostAddress --><code>". Yii::app()->request->userHostAddress."</code>";
	
	echo"<br>Yii::app()->user->getState('pageSize',Yii::app()->params['defaultPageSize']) :<code>" . Yii::app()->user->getState('pageSize',Yii::app()->params['defaultPageSize']) ."</code>";
	echo"<br>Yii::app()->user->loginUrl(the route to the login action, GET parameters) : "; print_r (Yii::app()->user->loginUrl);
	echo"<br>Yii::app()->user->identityCookie(only when {@link allowAutoLogin} is true.) :<code>" . Yii::app()->user->identityCookie."</code>"; 
	echo"<br>Yii::app()->user->authTimeout :<code>" . Yii::app()->user->authTimeout."</code>";
	?> <br>
	Yii::app()->session->count ; <?php echo Yii::app()->session->count; ?> <br>
	Array Session : <code>Yii::app()->session->toArray()</code>
	<?php dump( sess()->toArray() ); ?>
</div>

<div class="view2" style="width:auto">
<b>YiiBase Config :</b>
<?php echo"<br>Yii::getVersion() --><code>".Yii::getVersion()."</code>"; ?> 
<?php //echo"<br>Yii::getFrameworkPath() --><code>".Yii::log()."</code>"; ?> 	
<?php echo"<br>Yii:::powered()--><code>".Yii::powered()."</code>"; ?> 
<?php echo"<br>Yii:::Yii::t('ui','open')--><code>".Yii::t('ui','open')."</code>"; ?> <br>
</div>

<div class="view txtSmall">
<ul>
<li>View file: <tt><?php echo __FILE__; ?></tt></li> <code>echo __FILE__; </code>
<li>Layout file: <tt><?php echo $this->getLayoutFile('main'); ?></tt></li> <code>echo $this->getLayoutFile('main'); </code>
</ul>
</div>

<!--------------------------------------------------------------------------------------->
<div class="view2" style="width:auto">

<b class="badge">LEARN TO DO</b> <br>
<b>contoh bikin pesan error		throw new CException(Yii::t('yii','{class}::authenticate() must be implemented.',array('{class}'=>get_class($this))));</b><p>

coba ini setPathOfAlias($alias,$path),  getPathOfAlias($alias), autoload($className)<br>
public static function t($category,$message,$params=array(),$source=null,$language=null)<br>
echo "--------->".CHtml::normalizeUrl(array('ajax/addnew'));<br>
<HR />
	
<b class="badge">Action, Action Parameter Binding</b> pelajari cara kerja "OVERIDE ACTION" cth: CCaptchaAction <br>
<a href="http://www.yiiframework.com/doc/guide/1.1/id/basics.controller">sumber</a>
<hr />

<b class="badge">4. Komponen Aplikasi Inti</b> <br>
<a href="http://www.yiiframework.com/doc/guide/1.1/id/basics.application">sumber</a><br />
Yii sudah mendefinisikan satu set komponen aplikasi inti guna menyediakan fitur yang umum dalam aplikasi Web. <br>
Sebagai contoh, komponen request dipakai untuk mengumpulkan request pengguna dan menyediakan informasi seperti URL yang di-request, cookies.<br>
Dengan mengkonfigurasi properti komponeninti ini, kita dapat mengubah hampir segala aspek perilaku standar Yii.<p>

<b>Berikut daftar komponen inti yang dideklarasikan oleh CWebApplication.</b>
<ul>
    <li><b>assetManager:</b> CAssetManager - mengatur publikasi file asset privat.</li>
    <li><b>authManager:</b> CAuthManager - mengatur role-based access control (RBAC).</li>
    <li><b>cache:</b> CCache - menyediakan fungsionalitas caching data. Catatan, </li>Anda harus menetapkan kelas sebenarnya (misal CMemCache, CDbCache). Jika tidak, null akan dikembalikan saat Anda mengakses komponen ini.

    <li><b>clientScript</b> CClientScript - mengatur skrip klien (javascript dan CSS).</li>
    <li><b>coreMessages</b> CPhpMessageSource - menyediakan terjemahan pesan inti yang dipakai oleh Yii framework.</li>
    <li><b>db</b> CDbConnection - menyediakan koneksi database. Catatan, Anda harus mengkonfigurasi properti connectionString untuk menggunakan komponen ini.</li>
    <li><b>errorHandler</b> CErrorHandler - menangani exception dan kesalahan PHP yang tidak tercakup.</li>
    <li><b>format</b> CFormatter - memformat nilai data untuk sisi tampilan.</li>
    <li><b>messages</b> CPhpMessageSource - menyediakan terjemahan pesan yang dipakai oleh aplikasi Yii.</li>
    <li><b>request</b> CHttpRequest - menyediakan informasi terkait dengan request penggguna.</li>
    <li><b>securityManager</b> CSecurityManager - menyediakan layanan terkait keamanan, seperti hashing dan enkripsi.</li>
    <li><b>session</b> CHttpSession - menyediakan fungsionalitas terkait sesi.</li>
    <li><b>statePersister</b> CStatePersister - menyediakan metode persisten kondisi global(global state persistence).</li>
    <li><b>urlManager</b> CUrlManager - menyediakan fungsionalitas penguraian dan pembuatan URL.</li>
    <li><b>user</b> CWebUser - mewakili informasi identitas pengguna saat ini.</li>
    <li><b>themeManager</b> CThemeManager - mengatur tema.</li>
</ul>

<b class="badge">5. Siklus Aplikasi</b><br>
Ketika menangani request pengguna, aplikasi akan berada dalam siklus masa hidup sebagai berikut:
<ul>
    <li>Pra-inisialisasi aplikasi dengan CApplication::preinit(); </li>
    <li>Menyiapkan kelas autoloader dan penanganan kesalahan;</li>
    <li>Meregistrasi komponen inti aplikasi;</li>
   <li> Mengambil konfigurasi aplikasi;</li>
    <li>Menginisialisasi aplikasi dengan CApplication::init()</li>
        <ul>
			<li>Registrasi behavior aplikasi</li>
			<li>Mengambil komponen aplikasi statis;</li>
		</ul>
    <li>Menghidupkan event onBeginRequest;</li>
    <li>Mengolah request pengguna:</li>
        <ul>
		<li>Mengumpulkan request pengguna;</li>
        <li>Membuat controller;</li>
        <li>Menjalankan controller;</li>
		</ul>
    <li>Menghidupkan event onEndRequest;</li>
</ul>

</div>

