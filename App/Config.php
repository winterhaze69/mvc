<?php

namespace App;
use PDO;
/**
 * Application configuration
 *
 * PHP version 7.0
 */
class Config
{

  /**
  * Instance de la classe Config
  *
  * @var Config
  * @access private
  * @static
  */
 private static $instance = null;

    /**
     * Database host
     * @var string
     */
    const DB_HOST = 'localhost';

    /**
     * Database name
     * @var string
     */
    const DB_NAME = 'mvc';

    /**
     * Database user
     * @var string
     */
    const DB_USER = 'root';

    /**
     * Database password
     * @var string
     */
    const DB_PASSWORD = '0000';

    /**
     * Show or hide error messages on screen
     * @var boolean
     */
    const SHOW_ERRORS = true;

    private function __construct()
 {
   $this->PDOInstance = new PDO('mysql:dbname='.self::DB_NAME.';host='.self::DB_HOST,self::DB_USER ,self::DB_PASSWORD);
 }

  /**
   * Crée et retourne l'objet SPDO
   *
   * @access public
   * @static
   * @param void
   * @return Config $instance
   */
 public static function getInstance()
 {
   if(is_null(self::$instance))
   {
     self::$instance = new Config();
   }
   return self::$instance;
 }

 /**
  * Exécute une requête SQL avec PDO
  *
  * @param string $query La requête SQL
  * @return PDOStatement Retourne l'objet PDOStatement
  */
 public function query($query)
 {
   return $this->PDOInstance->query($query);
 }


}
