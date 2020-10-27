<?php

class Database 
{
    private static $dbHost = "127.0.0.1";
    private static $dbName = "restaurant";
    private static $dbUser = "root";
    private static $dbUserPassword = "";

    private static $bdd = null;
    
    public static function connect()
    {
        if(self::$bdd == null)
        {
            try
            {
              self::$bdd = new PDO("mysql:host=" . self::$dbHost . ";dbname=" . self::$dbName , self::$dbUser, self::$dbUserPassword, array(
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8',
                PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
            ));
            }
            catch(PDOException $e)
            {
                die($e->getMessage());
            }
        }
        return self::$bdd;
    }
    
    public static function disconnect()
    {
        self::$bdd = null;
    }


}    

?>