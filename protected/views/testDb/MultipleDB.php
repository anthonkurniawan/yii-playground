<?php $this->pageTitle=Yii::app()->name . ' - Multiple DB test'; ?>
<?php $this->breadcrumbs=array('Test DB',);?>
<style> pre { font-size:10px} </style>

<h1> Multiple DB test with SQLSRV + SQLITE <small>(Driver SQLSRV masih lom bener)</small></H1>

<?php Yii::app()->sc->setStart(__LINE__);   # START COLLECT  ?>
<?php
/*
//$connection=new CDbConnection($dsn,$username,$password);
 //'connectionString' => 'sqlsrv:Server=HOSTNAME\SQLEXPRESS;Database=Client',
 
$connection=new CDbConnection('sqlsrv:Server=localhost;Database=AdventureWorksDW2008', 'sa', 'belang');
$connection->active=true;
$sql ='select * from Production.Product';
$command=$connection->createCommand($sql);

//$command->execute();  												//dump($command);
//or execute an SQL query and fetch the result set
$reader=$command->query();			//dump($reader);
*/
?>
<!--
<div class="view2 scroll2">
<?php
/*
//get data
foreach($reader as $row) {
	//dump($row);
}
*/
?>
</div>	-->

<?php //$sqlsrv_model = Yii::app()->db_pdo_sql; ?>

<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));  # GET SOURCE ?>
<?php Yii::app()->sc->renderSourceBox(); 	#FINISH AND RENDER SOURCE ?>
<!---------------------------------------------------------------------->
<P>
<b>SAMPLE MULTIPLE DB (Multiple DB Connection):</b><BR />
1. ADD "db2" untuk UNTUK TAMBAH CONNECTION STRING DB TAMBAHAN <BR />
2. UNTUK CREATE CLASS MODEL USE "gii" HARUS DI SWITCH DULU KE "db" yg default (coz gii hanya bisa membaca 1db default)<br /> 
	cth : (yii\yiiTest\protected\models\UserSqlite.php)<br />
3. BUAT EXTENDED "CLASS" DARI "CLASS CActiveRecord" cth:(yiiTest\protected\components\tambahDB.php)<br />
4. MODIF CLASS (UserSqlite.php) UTK EXTEND CLASS DARI "CActiveRecord" TO "class tambahDB"<br />
cth: 
<pre>class UserSqlite extends tambahDB
{
	public function getDbConnection()
    {
        return self::getDb2Connection();
    }
</pre> 
<BR /><br />
Note: <br />
Limitations on Multi-DB support, Tables in one database cannot directly reference tables in another database, 
and this means that relations don't cross DB boundaries.	<BR /><BR />
<!-------------------------------------------------------------------------------------------->
<?php
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('user-sqlite-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-sqlite-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'username',
		'password',
		'email',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

<pre class="scroll">
	<?php print_r($model); ?>
</pre>
