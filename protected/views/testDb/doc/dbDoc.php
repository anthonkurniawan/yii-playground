<?php $this->layout='column1';?> 
<style>
.container{max-width:1280px;}
#content { font-size: 65.5%; }
.php-hl-main {font-size:80% }
pre{ margin: 0px; padding: 0px }
</style>

<?php 
$this->pageTitle=Yii::app()->name . ' - DB Documentation';
$this->breadcrumbs=array('Test DB'=>array('index'),'Data Access Object (DAO)',);
?>


<script>
	$(function() {	
		$( "#tabs" ).tabs({ spinner: "<em>Retrieving data...</em>" });
	});
</script>
	
<!-------------------- CONTENT--------------------------->
<a href="http://www.yiiframework.com/doc/guide/1.1/id/database.dao" target="_blank" class="txtHead" style="float:right">DIKUMENTASI DAO-YII</a><br />

<div class="view2" style="width:auto">
<b>Database Config :</b>
	<?php
	echo"<br>Yii::app()->db->connectionString --><code>".Yii::app()->db->connectionString."</code>";
	echo"<br>Yii::app()->db2->connectionString --><code>".Yii::app()->db2->connectionString."</code>";
	echo"<br>Yii::app()->db3->connectionString --><code>".Yii::app()->db3->connectionString."</code>";
	#echo"<br>Yii::app()->db_pdo_sql->connectionString --><code>".Yii::app()->db_pdo_sql->connectionString."</code>";
	?>
</div>

<?php
$this->widget('zii.widgets.jui.CJuiTabs', array(
	'id'=>'tabs',
    'tabs'=>array(
        //'Data Access Object'=>$this->renderPartial('doc/dao',null,true),
		'<span>Data Access Object</span>'=>array('ajax'=>array('','view'=>'doc/dao'), 'id'=>'tab1'),
		'<span>Other Info</span>'=>array('ajax'=>array('','view'=>'doc/other')),
		'<span>Connection Db</span>'=>array('ajax'=>array('','view'=>'doc/koneksi')),
		'<span>Query Builder</span>'=>array('ajax'=>array('','view'=>'doc/queryBuilder')),
		'<span>Active Record</span>'=>array('ajax'=>array('','view'=>'doc/ar')),
		'<span>Active Record Relational</span>'=>array('ajax'=>array('','view'=>'doc/ar_relasional'), 'id'=>'tab5'),
		'<span>Manipulasi Schema</span>'=>array('ajax'=>array('','view'=>'doc/schema')),
		'<span>Migrasi Database</span>'=>array('ajax'=>array('','view'=>'doc/migration')),
		'<span>Test</span>'=>array('ajax'=>array('','view'=>'doc/test')),
		'<span>PDO php</span>'=>array('ajax'=>array('','view'=>'doc/_pdo')),
    ),
    'options'=>array(
        'collapsible'=>true,
        'selected'=>4,
    ),
    'htmlOptions'=>array(
        'style'=>'width:100%; overflow:auto'
    ),
));
?>

<!-------- kalo di ilangin maka JS nya ga aka ke load ( NANTI CARI CARA REGISTER JS NYA BIAR FUNGSI JS BISA JALAN) ------->
<?php echo $this->renderPartial('doc/_blank'); ?> 
