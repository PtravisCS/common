<?php

require_once 'load_config.php';
getConfigs();

class Database {

  private static $db;
  private static $dbName;
  private static $dbHost;
  private static $dbUsername;
  private static $dbUserPassword;
  private static $cont;

  public function __construct() {

    if (isset($GLOBALS['config'])) {

      self::$dbName = $GLOBALS['config']['dbName'];
      self::$dbHost = $GLOBALS['config']['dbHost'];
      self::$dbUsername = $GLOBALS['config']['dbUsername'];
      self::$dbUserPassword = $GLOBALS['config']['dbUserPassword'];
      self::$cont = new PDO( "mysql:host=".self::$dbHost.";"."dbname=".self::$dbName, self::$dbUsername, self::$dbUserPassword);  
    } else {

      echo 'Config values not set';
      die;
    }

  }

  public static function connect() {

      if (self::$cont == null) {
        try {

          self::$db = new Database(); 
        }
        catch(PDOException $e) {

          die($e->getMessage());
        }
       }

       return self::$cont;
  }

  public static function disconnect() {
    self::$cont = null;
  }
}

?>
