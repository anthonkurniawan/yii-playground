
<div class="view2">
<a href="http://localhost/yiidoc/CDbSchema.html" target="_blank" style="float:right">CDbSchema</a><br>

<ul>
<li><b class="badge">Membuat Query Manipulasi Schema</b><br />
<b class="txtHead2">Selain query manipulasi dan penarikan normal, query builder juga menyediakan sekumpulan method yang digunakan untuk membuat dan menjalankan query SQL untuk manipulasi schema pada database.</b><br /> <b class="txtHead">Query builder mendukung query-query berikut:</b>
<ul>
  <div class="tpanel"> <!--- load model ------->
	<li class="toggle txtHead"><?php echo Yii::t('ui','createTable(): membuat table'); ?></li>
	<div>
  function createTable($table, $columns, $options=null)
  <?php Yii::app()->sc->setStart(__LINE__);   ?> 
  <!--
	CREATE TABLE `tbl_user` (
	    `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	    `username` varchar(255) NOT NULL,
	    `location` point
	) ENGINE=InnoDB
	
	createTable('tbl_user', array(
		'id' => 'pk',
		'username' => 'string NOT NULL',
		'location' => 'point',
		), 'ENGINE=InnoDB')
	-->
	<?php Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__)); ?>
	<?php Yii::app()->sc->renderSourceBox(); ?>
  </div>
	</div>

  <div class="tpanel"> <!--- load model ------->
	<li class="toggle txtHead"><?php echo Yii::t('ui','renameTable(): mengubah nama table'); ?></li>
	<div class="res">
  function renameTable($table, $newName)<br />
  renameTable('tbl_users', 'tbl_user')
  </div>
	</div>
  
  <div class="tpanel"> <!--- load model ------->
	<li class="toggle txtHead"><?php echo Yii::t('ui','dropTable(): drop (menghapus) table'); ?></li>
	<div class="res">
  function dropTable($table)<br />
  dropTable('tbl_user')
  </div>
	</div>
  
  <div class="tpanel"> <!--- load model ------->
	<li class="toggle txtHead"><?php echo Yii::t('ui','truncateTable(): mengosongkan table'); ?></li>
	<div class="res">
  function truncateTable($table)<br />
  truncateTable('tbl_user')
  </div>
	</div>
  
  
  <div class="tpanel"> <!--- load model ------->
	<li class="toggle txtHead"><?php echo Yii::t('ui','addColumn(): menambahkan sebuah kolom table'); ?></li>
	<div class="res">
  function addColumn($table, $column, $type)<br />
  // ALTER TABLE `tbl_user` ADD `email` varchar(255) NOT NULL<br />
	addColumn('tbl_user', 'email', 'string NOT NULL')
  </div>
	</div>
  
  <div class="tpanel"> <!--- load model ------->
	<li class="toggle txtHead"><?php echo Yii::t('ui','renameColumn(): mengubah nama kolom table'); ?></li>
	<div class="res">
  function renameColumn($table, $name, $newName)<br />
  // ALTER TABLE `tbl_users` CHANGE `name` `username` varchar(255) NOT NULL<br />
	renameColumn('tbl_user', 'name', 'username')
  </div>
	</div>
  
  <div class="tpanel"> <!--- load model ------->
	<li class="toggle txtHead"><?php echo Yii::t('ui','alterColumn(): mengubah sebuah kolom table'); ?></li>
	<div class="res">
  function alterColumn($table, $column, $type)<br />
  // ALTER TABLE `tbl_user` CHANGE `username` `username` varchar(255) NOT NULL<br />
	alterColumn('tbl_user', 'username', 'string NOT NULL')
  </div>
	</div>
    
  <div class="tpanel"> <!--- load model ------->
	<li class="toggle txtHead"><?php echo Yii::t('ui','dropColumn(): me-drop (hapus) kolom table'); ?></li>
	<div class="res">
  function dropColumn($table, $column)<br />
  // ALTER TABLE `tbl_user` DROP COLUMN `location`
	dropColumn('tbl_user', 'location')
  </div>
	</div>
  
  <div class="tpanel"> <!--- load model ------->
	<li class="toggle txtHead"><?php echo Yii::t('ui','createIndex(): membuat index'); ?></li>
	<div class="res">
  function createIndex($name, $table, $column, $unique=false)<br />
  // CREATE INDEX `idx_username` ON `tbl_user` (`username`)<br />
	createIndex('idx_username', 'tbl_user')
  </div>
	</div>
  
  <div class="tpanel"> <!--- load model ------->
	<li class="toggle txtHead"><?php echo Yii::t('ui','dropIndex(): me-drop (hapus) index'); ?></li>
	<div class="res">
  function dropIndex($name, $table)<br />
  // DROP INDEX `idx_username` ON `tbl_user`<br />
	dropIndex('idx_username', 'tbl_user')
  </div>
	</div>
      
  <div class="tpanel"> <!--- load model ------->
	<li class="toggle txtHead"><?php echo Yii::t('ui','addForeignKey()'); ?></li>
	<div class="res">
 	function addForeignKey($name, $table, $columns, $refTable, $refColumns, $delete=null, $update=null)<br /><br />
  // ALTER TABLE `tbl_profile` ADD CONSTRAINT `fk_profile_user_id`<br />
	// FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`id`)<br />
	// ON DELETE CASCADE ON UPDATE CASCADE<br />
	addForeignKey('fk_profile_user_id', 'tbl_profile', 'user_id',<br />
    'tbl_user', 'id', 'CASCADE', 'CASCADE')
  </div>
	</div> 
       
  <div class="tpanel"> <!--- load model ------->
	<li class="toggle txtHead"><?php echo Yii::t('ui','dropForeignKey()'); ?></li>
	<div class="res">
 	function dropForeignKey($name, $table)<br />
  // ALTER TABLE `tbl_profile` DROP FOREIGN KEY `fk_profile_user_id`<br />
	dropForeignKey('fk_profile_user_id', 'tbl_profile')
  </div>
	</div> 
    
</b><br />
<li><b class="txtHead">Tipe Data Abstrak</b><br />
<b class="txtHead2">Query builder memperkenalkan sekumpulan tipe data abstrak yang dapat digunakan untuk mendefinisikan kolom table. Tidak seperti tipe data physical yang spesifik pada DBMS tertentu dan cukup berbeda di DBMS lainnya,<br /> tipe data abstrak bebas dari DBMS. Ketika tipe data abstrak digunakan untuk mendefinisikan kolom table, query builder akan mengubahnya menjadi tipe data physical bersangkutan.</b><br />
<b class="txtHead">Berikut tipe data abstrak yang didukung oleh query builder.</b><br />
		<ul>
    <li><b class="txtHead">pk:</b> sebuah jenis primary key generik, akan diubah menjadi int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY pada MySQL;</li>
    <li><b class="txtHead">string:</b> jenis string, akan diubah menjadi varchar(255) pada MySQL;</li>
    <li><b class="txtHead">text:</b> jenis teks (string panjang), akan diubah menjadi text pada MySQL</li>
    <li><b class="txtHead">integer:</b> jenis integer, akan diubah menjadi int(11) pada MySQL;</li>
    <li><b class="txtHead">float:</b> tipe angka floating, akan diubah menjadi float pada MySQL;</li>
    <li><b class="txtHead">decimal:</b> tipe angka desimal, akan diubah menjadi decimal pada MySQL;</li>
    <li><b class="txtHead">datetime:</b> tipe waktu tanggal, akan diubah menjadi datetime pada MySQL;</li>
    <li><b class="txtHead">timestamp:</b> tipe timestamp, akan diubah menjadi timestamp pada MySQL;</li>
    <li><b class="txtHead">time:</b> tipe waktu, akan diubah menjadi time pada MySQL;</li>
    <li><b class="txtHead">date:</b> tipe tanggal, akan diubah menjadi date pada MySQL;</li>
    <li><b class="txtHead">binary:</b> tipe data biner, akan diubah menjadi blob pada MySQL;</li>
    <li><b class="txtHead">boolean:</b> tipe boolean, akan diubah menjadi tinyint(1) pada MySQL;</li>
    <li><b class="txtHead">money:</b> tipe mata uang, akan diubah menjadi decimal(19,4) pada MySQL. </li></ul>
    </ul> 
    
<?php $this->beginWidget('CTextHighlighter',array('language'=>'PHP'));  ?> 
$sql='SELECT * FROM {{user}}';
$users=$connection->createCommand($sql)->queryAll();
<?php $this->endWidget(); ?>
</ul>
</div>

<!--------------------------------------------------------- CDbSchema class -------------------------------------------------------------->	


<div class="view2">
<b class="badge">Schema Sample</b><br><br>

	<div class="ket" style="float:left;">
	 <code>CDbConnection</code> - the database connection. The connection is active..<br>
	<b class="txtHead">Yii::app()->db->schema->getDbConnection()  :</b> <br>
	<div class="scroll2" style="width:500px; "><?php dump( Yii::app()->db->schema->getDbConnection() );  ?></div>
	</div>
	
	<div class="ket" style="float:left; width:500px">
	<code>CDbCommandBuilder</code> - the SQL command builder for this connection.<br>
	<b class="txtHead">Yii::app()->db->schema->getCommandBuilder() :</b> <br>
	<div class="scroll2" style="width:500px"><?php dump( Yii::app()->db->schema->getCommandBuilder() );  ?></div>
	</div>
	
	<div class="ket" style="float:left">
	<?php $db = Yii::app()->db;	?>
	<b class="txtHead">Yii::app()->db>schema :</b> <br>
	<div class="scroll2" style="width:500px"><?php dump( Yii::app()->db->schema  ); ?></div>
	</div>
	
	<div class="ket" style="float:left; width:500px">
	<b class="badge">Returns the metadata for all tables in the database.</b><br>
	getTable(string $name, boolean $refresh=false) - table name, if we need to refresh schema cache for a table.<br>
	<b class="txtHead">Yii::app()->db->schema->getTables('yiiTest') : or SHOW TABLES FROM 'yiiTest'</b><br>
	<div class="scroll2" style="width:500px"><?php dump( Yii::app()->db->schema->getTables('yiitest') ); ?></div>
	</div>
	
	<div class="ket" style="float:left; width:500px">
	getTableNames(string $schema='') - Defaults to empty string, meaning the current or default schema. If not empty, the returned table names will be prefixed with the schema name.
	<b class="txtHead">Yii::app()->db->schema->getTableNames() :</b> <br>
	<div class="scroll2" style="width:500px"><?php dump( Yii::app()->db->schema->getTableNames() );  ?></div>
	</div>
	
	<div class="ket" style="float:left; width:500px">
	<b class="badge">Obtains the metadata for the named table..</b><br>
	getTable(string $name, boolean $refresh=false) - the schema of the tables. Defaults to empty string, meaning the current or default schema.<br>
	<b class="txtHead">Yii::app()->db->schema->getTable('tbl_user_mysql')  or $model->getTableSchema() :</b> <br>
	<div class="scroll2" style="width:500px"><?php dump( Yii::app()->db->schema->getTable('tbl_user_mysql') ); ?></div>
	</div>
	
	<div class="clear"></div>
	
	<div class="ket" style="float:left; width:500px">
	<code>quoteColumnName(string $name)</code>column name - Quotes a column name for use in a query. If the column name contains prefix, the prefix will also be properly quoted.<br>
	<b class="txtHead">Yii::app()->db->schema->quoteColumnName('nama_kolom')  :</b> <br>
	<?php dump( Yii::app()->db->schema->quoteColumnName('nama_kolom') );  ?>
	</div>
	
	

	

	
	
</div>

