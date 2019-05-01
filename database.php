<?php
class Database 
{
	private static $dbName = 'fuss19pro' ; 
	private static $dbHost = 'fuss19pros2.mysql.database.azure.com' ;
	private static $dbUsername = 'fusmaster@fuss19pros2';
	private static $dbUserPassword = '7I1XAh4k7ZdZ';
	
	private static $cont  = null;
	
	public function __construct() {
		exit('Init function is not allowed');
	}
	
	public static function connect()
	{
	   // One connection through whole application
       if ( null == self::$cont )
       {      
        try 
        {
          self::$cont =  new PDO( "mysql:host=".self::$dbHost.";"."dbname=".self::$dbName, self::$dbUsername, self::$dbUserPassword);  
        }
        catch(PDOException $e) 
        {
          die($e->getMessage());  
        }
       } 
       return self::$cont;
	}
	
	public static function disconnect()
	{
		self::$cont = null;
	}
}
?>