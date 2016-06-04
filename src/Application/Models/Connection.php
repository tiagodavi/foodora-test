<?php

namespace Application\Models;

use \PDO;

class Connection
{
	private static $instance;
	private static $dbhost;
	private static $dbname;
  private static $dbuser;
	private static $dbpass;

  private function __construct() {
      //
  }

  public static function getInstance(
    $dbhost = 'localhost',
    $dbname = 'foodora',
    $dbuser = 'root',
    $dbpass = 'vertrigo'
  )
  {
    $dbhost = $dbhost ?: static::$dbhost;
    $dbname = $dbname ?: static::$dbname;
    $dbuser = $dbuser ?: static::$dbuser;
    $dbpass = $dbpass ?: static::$dbpass;

    if ( ! isset(static::$instance)) {

      static::$instance = new PDO(
       "mysql:host={$dbhost};dbname={$dbname}", $dbuser, $dbpass,
       array(
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        PDO::ATTR_PERSISTENT => true
       )
      );

      static::$instance->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION
      );

      static::$instance->setAttribute(
        PDO::ATTR_ORACLE_NULLS,
        PDO::NULL_EMPTY_STRING
      );

    }

    return static::$instance;
  }

}
