if(!$this->isNewRecord)
			$this->dbConnection->createCommand('DELETE FROM PostTag WHERE postId='.$this->id)->execute();<br>
			
<b class="badge">CDbCommand</b><br>
<a href="http://localhost/yiidoc/CDbCommand.html#query-detail" target="_blank" style="float:right">more CDbCommand</a><br>

<div class="view2">	

</div>

<?php 
$db = Yii::app()->db;		//dump($db);
// foreach ( $db as $key=>$value ){
	// //dump( $key ); echo "<br>";
	// dump( $key ); echo "="; dump( $value ); echo "<br>";
// }

//dump($db->attributes);
//dump($db->schema);
//dump( Yii::app()->db->schema->getTables() );	//get all table schema
//dump( Yii::app()->db->schema->getTables('logs') );	//get all table schema logs
//dump( TblUserMysql::model()->tableSchema);
?>
<div class="view2" >

<div style="float:left; width:500px">
<b class="badge"> Foreach Yii::app()->db->schema->getTables('yiiTest')</b></br>
<?php
 $tables = Yii::app()->db->schema->getTables('yiiTest');
  foreach ($tables as $key=>$value) {
	//echo "<b class='txtHead'>". $key ."</b><br>";
	// echo  "<div class='scroll2' style='width:500px'>"; dump($value); echo "</div><br>";
	
	echo "<div class='tpanel'> 
			 <span class='toggle btn'>". Yii::t('ui', $key ) ."</span>
			 <div class='scroll2' style='height:200px; width:500px'>";   dump($value); echo "</div>
			 </div> <br>";
  }
?>
</div>

<div class="scroll2" style="float:left; width:500px">
<b class="badge">Yii::app()->db->schema->createTable</b></br>
<?php
 $tables = Yii::app()->db->schema->getTables('yiiTest');
 //$tables = Yii::app()->db->schema->getTable('tbl_user_mysql');
 $result = '';
 
 foreach ($tables as $table) {
	echo $table->name."<br>";
	$result .= '$this->createTable("' . $table->name . '", array(' . "\n";
            foreach ($table->columns as $col) {
                $result .= '    "' . $col->name . '"=>"' . getColType($col) . '",' . "\n";
            }
            $result .= '), "");' . "\n\n";
    }
   //echo $result;
	dump($result);
 
function getColType($col) {
        if ($col->isPrimaryKey) {
            return "pk";
        }
        $result = $col->dbType;
        if (!$col->allowNull) {
            $result .= ' NOT NULL';
        }
        if ($col->defaultValue != null) {
            $result .= " DEFAULT '{$col->defaultValue}'";
        }
        return $result;
  }
  
  //Yii::app()->db->schema->getTable('tbl_user_mysql')
 ?>
</div>

</div>

<?php		#CREATE TABLES
//$sql = Yii::app()->db->schema->createTable('tbl_user1', array(
	$conn =Yii::app()->db;
	$schema = $conn->schema;
	
	$sql = $schema->createTable('tbl_user3', array(
    'id' => 'pk',
    'username' => 'string NOT NULL',
    'location' => 'point',
    ), 'ENGINE=InnoDB');			dump($sql);
		
	
	// $sql = $schema->createTable('\"logs2\", array(
    // \"index\"=>\"pk\",
    // \"id_user\"=>\"int(11) NOT NULL\",
    // \"stamp\"=>\"date NOT NULL\",
    // \"event\"=>\"varchar(255) NOT NULL\",
	// ), \"ENGINE=InnoDB\" ');		dump($sql);
	
	//dump( $conn->createCommand($sql)->execute() );
	//dump( Yii::app()->db->createCommand($sql)->query() );
	//dump( Yii::app()->db->createCommand($sql)->execute() );
?>

<!--------------------------------------------------------- FROM ------------------------------------------------------------>
Please select DB:
<?php echo CHtml::beginForm(); ?>
	<?php
		echo CHtml::dropDownList('db', '',
			array(''=>'-Select DB-', 'db'=>'yiiTest-mysql', 'db2'=>'sqlite DB', 'db3'=>'Warehouse-mysql', 'db'=>'yiiTest DB',  )
			//array(	//'style'=>'float:right',
				//'id'=>'theme',
				//'onchange'=>"this.form.submit()",
				//'onchange'=>"$.fn.yiiListView.update('user-list',{ data:{view: $(this).val() }})",
				// 'class'=>'change_view',   //call registered class (optional)
				// //'prompt'=>'Select View',
				// //'empty'=>'Select View',
				// 'options'=> array(
					// ''=>array('disabled'=>true, 'label'=>'value 1') 
				// ),
			 //)
			#array('submit'=>array('site/Theme_select', 'url'=>Yii::app()->getRequest()->getUrl() ) )
		);
		?>
	<?php
		echo CHtml::dropDownList('db', '',
	array(''=>'-Select DB-', 'db'=>'yiiTest-mysql', 'db2'=>'sqlite DB', 'db3'=>'Warehouse-mysql', 'db'=>'yiiTest DB',  ) ); ?>
	
	<?php echo CHtml::submitButton('submit'); ?>
	
<?php echo CHtml::endForm(); ?> <!----------  form -------------->


<?php
// if(isset($_POST['db'])) {

// }


?>