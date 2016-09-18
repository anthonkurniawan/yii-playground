<style>.container{width:1100px;}</style>

<?php $this->layout='column2'; ?>
<?php $this->renderPartial('_menu'); ?>
<?php
$this->pageTitle=Yii::app()->name . ' - Caching'; 
$this->breadcrumbs=array('Cache',);
?>

<h1><small> Caching </small> </h1>
<a href="http://www.yiiframework.com/doc/guide/1.1/en/caching.overview" target="_blank" style="float:right"> Caching on YII </a>
<div class="view2">
Caching is a cheap and effective way to improve the performance of a Web application. By storing relatively static data in cache and serving it from cache when requested, we save the time needed to generate the data.<br><br>

Using cache in Yii mainly involves configuring and accessing a cache application component. The following application configuration specifies a cache component that uses memcache with two cache servers.
<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP', 'lineNumberStyle'=>'table', 'showLineNumbers'=>1, )); ?>
#set at main.php
array(
    ......
    'components'=>array(
        ......
        'cache'=>array(
            'class'=>'system.caching.CMemCache',
            'servers'=>array(
                array('host'=>'server1', 'port'=>11211, 'weight'=>60),
                array('host'=>'server2', 'port'=>11211, 'weight'=>40),
            ),
        ),
    ),
);
<?php $this->endWidget(); ?>

When the application is running, the cache component can be accessed via Yii::app()->cache.<br><br>
<b class="badge">The following is a summary of the available cache components: </b>
<ul>
<li><b>CMemCache</b>: uses PHP memcache extension.</li>
<li><b>CApcCache</b>: uses PHP APC extension.</li>
<li><b>CXCache</b>: uses PHP XCache extension.</li>
<li><b>CEAcceleratorCache</b>: uses PHP EAccelerator extension. </li>
<li><b>CDbCache</b>:</li> uses a database table to store cached data. By default, it will create and use a SQLite3 database under the runtime directory. You can explicitly specify a database for it to use by setting its connectionID property.
<li><b>CZendDataCache</b>: uses Zend Data Cache as the underlying caching medium.</li>
<li><b>CFileCache</b>:</li> uses files to store cached data. This is particular suitable to cache large chunk of data (such as pages).
<li><b> CDummyCache</b>:</li> presents dummy cache that does no caching at all. The purpose of this component is to simplify the code that needs to check the availability of cache. For example, during development or if the server doesn't have actual cache support, we can use this cache component. When an actual cache support is enabled, we can switch to use the corresponding cache component. In both cases, we can use the same code Yii::app()->cache->get($key) to attempt retrieving a piece of data without worrying that Yii::app()->cache might be null.
</ul>

<div class="view">
<b>user contributions :</b><br>
Based on my previous experience, APC is the fastest when you have one server only and MemCache is the fastest (and better) when you have several servers for your application (eg. Load balancing servers)
</div>
</div>