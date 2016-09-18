<?PHP
// class tambahDB extends CDbConnection{

	// public function getDB() {
		// //$connection=new CDbConnection($dsn,$username,$password);
		// $connection=new CDbConnection('mysql:host=localhost;dbname=testing','root','');
		// $connection->active=true;
		
		// // try {
    // // $dbh = new PDO($dsn, $user, $password);
// // } catch (PDOException $e) {
    // // echo 'Connection failed: ' . $e->getMessage();
// // }

    // // $result = Yii::app()->db->createCommand("select * from users");
	// }

// }

// protected/components/MyActiveRecord.php
 
class tambahDB extends CActiveRecord {
    //...bebas
    private static $db2 = null;  //** TAMBAH PROPERTI BARU (db2)
	private static $db3 = null;  //** TAMBAH PROPERTI BARU (db2)
	
    //COPY FUNCTION (CActiveRecord line:603)
	protected static function getDb2Connection()
    {
        if (self::$db2 !== null)
            return self::$db2;
        else
        {
            self::$db2 = Yii::app()->db2;
            if (self::$db2 instanceof CDbConnection)
            {
                self::$db2->setActive(true);
                return self::$db2;
            }
            else
                throw new CDbException(Yii::t('yii','Active Record requires a "db2" CDbConnection application component.'));
        }
    }
	
	protected static function getDb3Connection()
    {
        if (self::$db3 !== null)
            return self::$db3;
        else
        {
            self::$db3 = Yii::app()->db3;
            if (self::$db3 instanceof CDbConnection)
            {
                self::$db3->setActive(true);
                return self::$db3;
            }
            else
                throw new CDbException(Yii::t('yii','Active Record requires a "db3" CDbConnection application component.'));
        }
    }
	
	protected static function getDb_pdo_sqlConnection()
    {
        if (self::$db_pdo_sql !== null)
            return self::$db_pdo_sql;
        else
        {
            self::$db_pdo_sql = Yii::app()->db_pdo_sql;
            if (self::$db_pdo_sql instanceof CDbConnection)
            {
                self::$db_pdo_sql->setActive(true);
                return self::$db_pdo_sql;
            }
            else
                throw new CDbException(Yii::t('yii','Active Record requires a "db_pdo_sql" CDbConnection application component.'));
        }
    }
     //...bebas
	
}



?>