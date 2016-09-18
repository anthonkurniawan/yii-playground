<?php
class TestDbController extends AdminController
{	
	//public $layout='//layouts/column1';
	
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}
	
	public function actions(){
        return array(
			'ar'=>array('class'=>'CViewAction',  'basePath'=>'DOC'),
			'testQuery'=>array('class'=>'CViewAction',  'basePath'=>''),
			'find'=>array('class'=>'CViewAction',  'basePath'=>'sample'),	
			'find_other'=>array('class'=>'CViewAction',  'basePath'=>'sample'),	
			'findAll'=>array('class'=>'CViewAction',  'basePath'=>'sample'),	
			'criteria'=>array('class'=>'CViewAction',  'basePath'=>'sample'),	
			'criteria_sample'=>array('class'=>'CViewAction',  'basePath'=>'sample'),	
			'ar_relasional'=>array('class'=>'CViewAction',  'basePath'=>'DOC'),
			'ar_relational_sample'=>array('class'=>'CViewAction',  'basePath'=>'DOC'),
			'testAR_join'=>array('class'=>'CViewAction',  'basePath'=>''),
			'testAR_join2'=>array('class'=>'CViewAction',  'basePath'=>''),
			'testAR_Csql'=>array('class'=>'CViewAction',  'basePath'=>''),
			'queryBuilder'=>array('class'=>'CViewAction',  'basePath'=>'DOC'),	
			'myCactiveRecord'=>array('class'=>'CViewAction',  'basePath'=>'sample'),	
		);
	}

	public function actionTestAR_join_cmd(){
	/*	$model=new TblUserMysql('search_join');	
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['TblUserMysql']))
			$model->attributes=$_GET['TblUserMysql']; 
			
		//------------------------------ ATAU ---------------------------------//
		$sql= "SELECT *  FROM tbl_user_mysql as t  JOIN tbl_data as t2 ON t.id=t2.id JOIN Logs as t3 ON t.id=t3.id_user";
		$command = Yii::app()->db->createCommand($sql);
		$rawData = $command->queryAll();

		$dataProvider=new CArrayDataProvider($rawData, array(
			'pagination'=>array(
				'pageSize'=>10,
			),
		));*/
		//$this->render('testAR_join_cmd',array( 'dataProvider2'=>$dataProvider, 'model'=>$model));
		//$this->render('testAR_join_cmd',array( 'model'=>$model));
		
		$this->lastVisit();	//SET RETURN URL
		$this->render('testAR_join_cmd');
	}
	
	public function actionIndex(){
		$model= new TblUserMysql;

		if(isset($_GET['TblUserMysql']))			
			$model->attributes=$_GET['TblUserMysql']; //echo "pipiet".print_r($model->attributes);

		$this->render('index',array('model'=>$model));
	}

	public function actionMultipleDB(){
		$model=new UserSqlite('search');
		$model->unsetAttributes();  // clear any default values
		
		if(isset($_GET['UserSqlite']))			
			$model->attributes=$_GET['UserSqlite']; 
		
		$this->render('MultipleDB',array('model'=>$model,  ));
	}

	# --------------------------------------- Load DB Migration Command via CConsoleCommandRunner
	public function command(){
		$commandPath = Yii::app()->getBasePath() . DIRECTORY_SEPARATOR . 'commands';	//echo $commandPath;
		$runner = new CConsoleCommandRunner();
		$runner->addCommands($commandPath);																		//var_dump($runner);
		
		$commandPath = Yii::getFrameworkPath() . DIRECTORY_SEPARATOR . 'cli' . DIRECTORY_SEPARATOR . 'commands';		//echo $commandPath;
		$runner->addCommands($commandPath);
		return $runner;
	}
	
	public function actionLoadMigration() 
	{
		$runner = $this->command();										
		$args = array('yiic', 'migrate', '--interactive=0');																															//print_r($args);
		
		ob_start();		
		$runner->run($args);
		echo  str_replace("\n", "<br>", htmlentities(ob_get_clean(), null, Yii::app()->charset));
	}
	
	public function actionTestCreateTable(){
		$runner = $this->command();         //var_dump($runner); die();
		$args = array('yiic', 'dumpsql', 'createtable', '--table=stock');																

		ob_start();		
		$runner->run($args);
		echo  str_replace("\n", "<br>", htmlentities(ob_get_clean(), null, Yii::app()->charset));
	}
	
	#------------------------------------------------------- CREATE TABLE FUNCTION
	public function createTable($table) {
		# create table sql
		$table = Yii::app()->db->schema->getTable('tbl_user_mysql');
		$table_name = $table->name;		//dump($table->name); 

		foreach ($table->columns as $col) {		//dump($col->name); echo "<br>";
			  $kolom[$col->name]=  $this->getColType($col) ;
		}
		$sql = Yii::app()->db->schema->createTable($table_name, $kolom );	dump($sql);
		dump( Yii::app()->db3->createCommand($sql)->execute() );
	}
	
	public function createTables($db) {   }
	
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
	
	public function actionDbDoc(){
		//$this->save_logs('test');		# save action user to "logs"
		
		//BUAT AJAX REQUEST
		if (Yii::app()->request->isAjaxRequest) {
			 cs()->registerScriptFile(Yii::app()->baseUrl . '/js/common.js');
			 $this->renderPartial($_GET["view"], null, false, true);		//ajax request harus set "false", "true"
		}
		else		$this->render('doc/dbDoc');
	}
	
	//==================================================================================
	public $_lastProductId = null;
   //called on rendering a grid row
   //the first column
   //the params are $data (=the current rowdata) and $row (the row index)
    protected function gridUser($data,$row)
    {	
       //return $this->_lastProductId != $data->id ? $data->username : '';            
	   return $data->id;
    }
	
	protected function userLogs($data,$row)
    {	//$result="test";
	   //return  CHtml::encode($data->Logs) .'<br/>' . CHtml::encode($data->username);
		//return print_r($data->Logs);
		
		//return $row; //result: index 0,1..
		//$result=array();
		foreach($data as $key=>$value){
              //$url = $this->createUrl('bycategory',array('category'=>$row['id']));
              //$result .= CHtml::link($row['name'],$url) .'<br/>'; 
			   $result = $key;
			}      
		return $result; 
    }
	
		//---------------------------------------------------------------------------------------------------//
	// public function actionGetDbConn()
	// {	echo self::$db;
		// // if(self::$db!==null)
			// // return self::$db;
		// // else
		// // {
			// // // list of connections is an array of CDbConnection configurations indexed by connectionId
			// // //**$listOfConnections=/* to be loaded somehow */;
			
			// // // create DB connection based on your spec here:
			// // //**$connection=new CDbConnection($dsn,$username,$password); 
			// // //** 'connectionString' => 'mysql:host=localhost;dbname=testing',
			// // //**self::$db=new CDbConnection($listOfConnections[Yii::app()->user->connectionId]);
			// // self::$db=new CDbConnection('MySQL: mysql:host=localhost;dbname=testdb','root','');
			// // self::$db->active=true;
			// // return self::$db;
		// // }
	// }
}
