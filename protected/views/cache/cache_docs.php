<style>.container{width:1100px;}</style>

<?php $this->layout='column1'; ?>
<?php $this->pageTitle='Cache Docs'; ?>

<?php $this->breadcrumbs=array( 'Test Form'=>array('index'), 'CACHE',);?>

<div class="view2">
<a href="http://www.yiiframework.com/doc/guide/1.1/id/caching.overview" target="_blank">Sumber</a> <br />

<b>CCache</b><br />
 - menyediakan fungsionalitas caching data. Catatan, Anda harus menetapkan kelas sebenarnya (misal CMemCache, CDbCache). Jika tidak, null akan dikembalikan saat Anda mengakses komponen ini.

Memcache module provides handy procedural and object oriented interface to memcached, highly effective caching daemon, which was especially designed to decrease database load in dynamic web applications.<br>
This module uses functions of  <code>zlib</code> to support on-the-fly data compression. Zlib is required to install this module.<br>
<code>others :</code>This extension requires  libmemcached client library. <br>
PHP 4.3.3 or newer is required to use the memcache extension.  <br><br>

<b class="badge"> memcache ext installation</b><br>
There are actually two separate implementations of a PHP client that wraps the memcached (daemon); <br>
both are provided via the <code>PECL library</code>. One is called <code>memcache</code> and the other is called <code>memcached</code>. I know it's a little confusing that memcached shares the same name as the daemon itself, but it is a separate PHP wrapper.<br>

I'll focus on installing memcache as it is the more commonly used of the two. You can use the information to install memcached as well; the installation steps are the same. The main difference is that the memcached PHP extension requires the libMemcached library. <a href="http://code.google.com/p/memcached/wiki/PHPClientComparison" target="_blank">You can see a comparison of the two different </a><br><br>

<b class="badge">Installation, the quick method</b><br>
The easiest installation method for memcache is to use <code>PECL's ‘install' command.</code> This will grab the latest stable release, configure it with the default options, and add it to the server's <code>php.ini</code>:
<pre>
pecl install memcache
Un-installation is just as easy:
pecl uninstall memcache
</pre>

<b class="badge">Installation, the manual method</b> http://blog.servint.net/2012/03/16/the-tech-bench-how-to-install-php-memcache/<br>
The quick install method for memcache uses the default configuration options and should serve most users' purposes. However, if you need more control over the installation options, you can manually install from source and add it flags as you need.
<ul>
<li>1. Download the source package via PECL:</li>
cd /usr/local/src/
pecl download memcache

<li>2. Unpack the tar and enter into the newly extracted directory (be sure to replace the X's with your downloaded version):</li>
tar -xvzf memcache-X.X.X.tgz
cd memcache-X.X.X

<li>3. Configure and install:</li>
<code>
/usr/local/bin/phpize<br>
./configure -with-php-config=/usr/local/bin/php-config </code><br>
Note: If you are working on a server with cPanel, keep in mind that cPanel itself installs two versions of php:
<code><br>
/usr/bin/php<br>
/usr/local/bin/php</code><br>

For that reason you have to know which version your web server is actually using. Most of the time it is /usr/local/bin/php.<br>
 It can get very confusing and can be different from server to server. If you are a ServInt customer, don't hesistate to fill out a support ticket if you have any questions.

<li>4. Verify the install: </li>
Verify the installation by displaying all the installed PHP modules. See if memcache is listed:<br>
<code>
php -m<br>
memcache</code>
</ul>

<b class="badge">Problems with manual installation</b><br>
The "make install" should load the module into your server's extension directory automatically. However, <br>
if you do not see memcache listed in a "php -m", you will need to add the module manually.<br>

1. First, verify the location of your server's extensions directory:<br>
<code>grep extension_dir /usr/local/lib/php.ini</code><br>
It should return something similar to the following:<br>
<code>extension_dir = "/usr/local/lib/php/extensions/no-debug-non-zts-20060613?</code><br>
2. Next, copy the memcache module into that directory (be sure to replace the path with the one found on your server):<br>
<code>cp modules/memcache.so /usr/local/lib/php/extensions/no-debug-non-zts-20060613</code><br>

3. Finally, add the module to your php.ini:<br>
<code>echo ‘extension=memcache.so' >> /usr/local/lib/php.ini</code><br><br>


<b class="badge">Final Thoughts</b><br>

It used to be a common issue that the quick "install" method could not be used for servers where the /tmp partition was mounted "noexec". <br>
The problem was that the "configure" process could not execute because the PECL client downloaded the module into in /tmp. When /tmp is mounted "noexec", servers cannot execute scripts from /tmp.

However, PECL now downloads and executes the script from /root/tmp. No need to worry about compiler errors with /tmp. You can use the "install" method even with a secured /tmp.

The Tech Bench is an ongoing blog series featuring the answers to common questions the ServInt MST fields everyday. You can also find more great tech tips in the ServInt KnowledgeBase.
</div>

<div class="view2">
<b class="badge">Installing memcache on Windows for PHP</b>
http://pureform.wordpress.com/2008/01/10/installing-memcache-on-windows-for-php/ <br>
<pre>
A few things about memcache:
Memcache is a daemon, meaning it runs as a separate service on your machine. Just like MySQL runs as a separate service. In fact, to use memcache in PHP you have to connect to it, just like MySQL.

Think of memcache as the $_SESSION variable for PHP, but instead of it working on a per-user basis, it runs over the entire application — like MySQL. In fact, you can use memcache as you session handler for PHP.

This is how I got memcache to work on my windows machine:

    Download memcache from code.jellycan.com/memcached/ [grab the 'win32 binary' version]
    Install memcache as a service:
        Unzip and copy the binaries to your desired directory (eg. c:\memcached) [you should see one file, memcached.exe] – thanks to Stephen for the heads up on the new version
        If you’re running Vista, right click on memcached.exe and click Properties. Click the Compatibility tab. Near the bottom you’ll see Privilege Level, check “Run this program as an administrator”.
        Install the service using the command: c:\memcached\memcached.exe -d install from the command line
        Start the server from the Microsoft Management Console or by running one of the following commands: c:\memcached\memcached.exe -d start, or net start "memcached Server"

Now that you have memcache installed, you’ll have to tie it in with PHP in order to use it.

    Check your php extensions directory [should be something like: C:\php\ext] for php_memcache.dll
    If you don’t have any luck finding it, try looking at one of these sites:
    - downloads.php.net/pierre/ [thanks to Henrik Gemal]
    - pecl4win.php.net/ext.php/php_memcache.dll [currently down]
    - www.pureformsolutions.com/pureform.wordpress.com/2008/06/17/php_memcache.dll for PHP 5.2.*
    - kromann.info/download.php?strFolder=php5_1-Release_TS&strIndex=PHP5_1 for PHP 5.1.* [thanks, Rich]
    Now find your php.ini file [default location for XP Pro is C:\WINDOWS\php.ini] and add this line to the extensions list:

    extension=php_memcache.dll

    Restart apache
	
	Memcached, by default, loads with 64mb of memory for it’s use which is low for most applications. To change this to something else, navigate to HKEY_LOCAL_MACHINE\SYSTEM\CurrentControlSet\Services\memcached Server in your registry, find the ImagePath entry and change it to look something like this:

“C:\memcached\memcached.exe” -d runservice -m 512

Now when you start the service via net start “memcached Server”, it will run with 512mb of memory at it’s disposal.

EDIT

[Thanks to Travis]
If anyone is wondering what other options can be set (other than the memory limit), run “memcached -help” in a command prompt window. Then modify the ImagePath command line per this article with the desired switches and values.
</pre>

</div>