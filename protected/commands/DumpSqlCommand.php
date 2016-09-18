<?php
class DumpSqlCommand extends CConsoleCommand
{	
	/*
    public function run($args) {
		$schema = $args[0];			//echo $schema;
	    //$schema = $args;			var_dump($args);
		
        $tables = Yii::app()->db->schema->getTables($schema);		//var_dump($tables);
        $result = '';
        foreach ($tables as $def) {
            $result .= '$this->createTable("' . $def->name . '", array(' . "\n";
            foreach ($def->columns as $col) {												//echo $col->name;
                $result .= '    "' . $col->name . '"=>"' . $this->getColType($col) . '",' . "\n";
            }
            $result .= '), "");' . "\n\n";
        }
        echo $result;
		
    } */
	public function actionIndex() { echo "test";}
	
	//public function actionInit() { }
	 
	public function actionCreateTable($table) {
		# create table sql
		$table = Yii::app()->db3->schema->getTable($table);
		$table_name = $table->name;		//print_r($table);

		foreach ($table->columns as $col) {		//dump($col->name); echo "<br>";
			  $kolom[$col->name]=  $this->getColType($col) ;
		}
		$sql = Yii::app()->db3->schema->createTable($table_name, $kolom );	echo "SQL : \n". $sql;
		
		# save to file
        // $filename = realpath(__DIR__.'/schema_stock_sample_export.sql');  echo $filename; die();   
        $filename = YII::app()->basePath.'/../schema_stock_sample_export.sql';  //echo $filename; die();   
		$save = file_put_contents($filename, $sql);
		if($save) echo "\n\n Save to : $filename $save \n sucess";
		
		#copy to other DB
		// if(Yii::app()->db->createCommand($sql)->execute() !=null )
			// echo "\nSuccess..";
	}
	
    public function getColType($col) {
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
}

?>