<?php
#http://www.yiiframework.com/doc/guide/1.1/id/topics.console
class Test2Command extends CConsoleCommand
{
	public $params='ini params';  //variable global
	
    public function run($args)
    {	echo "testttttttttt";
         //actual command code here
         return TRUE;    
    }
		
	# public function actionIndex(array $types) { ... }  #jika parameter array
	# call with : yiic testCmd index 
	public function actionIndex($type, $limit=5, $args=array() )  {
		echo "type=".$type . "limit=". $limit ."\n";
		//var_dump($args);
		//echo "varr_dump this : \n";  dump( $this);
	}
	
	
    public function actionInit() { }
}

#USING :
#yiic <command-name> <action-name> --option1=value --option2=value2 ...
//yiic sitemap index --type=News --limit=5

#jika parameter input berupa array : Command di atas akan memanggil actionIndex(array('News', 'Article')).

#Parameter Anonim
//contoh : yiic sitemap index --limit=5 News (nilai News adalah parameter anonim )
//Untuk menggunakan parameter anonim, sebuah action command harus dideklarasikan sebagai $args. Misalnya,
//public function actionIndex($limit=10, $args=array()) {...}
//$args akan memegang seluruh nilai parameter anonim.

?>