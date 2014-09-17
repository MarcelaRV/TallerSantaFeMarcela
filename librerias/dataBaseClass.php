<?php


class dataBaseClass {

  /**
   * Variable para indicar la dirección del
   * servidor de Base de Datos
   * @var string 
   */
  static private $host = 'localhost';

  /**
   * Variable para indicar el puerto del
   * servidor de Base de Datos
   * @var integer
   */
  static private $port = 3306,
          $dbname = 'bd_dersercion',
          $user = 'root',
          $password = '',
          $driver = 'mysql', 
          $instance = NULL;
  
  static public function getInstance() {
    if (!self::$instance) {

      self::connect();
    }
    return self::$instance;
  }

  static private function connect() {
    try {
      $dsn = self::$driver
              . ':host='. self::$host
              . ';port=' . self::$port
              . ';dbname=' . self::$dbname;
      self::$instance = new PDO($dsn, self::$user, self::$password);
      return true;
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
  }

}