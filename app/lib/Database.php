<?php

namespace App\Lib;

use App\Controllers\_ErrorController;

class Database
{

  private $conn = null;
  public $success;
  private $status;

  /**
   * Database constructor.
   */
  public function __construct()
  {
    try {
      $this->conn = new \PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8',
        DB_USERNAME, DB_PASSWORD);
      $this->conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
      $this->success = true;
    } catch ( \PDOException $e ) {
      $err = new _ErrorController;
      $err->index("500", $e->getMessage());
      die();
    }
  }

  /**
   * Executes an SQL statement using PDO::prepare
   * @param $query
   * @param array|bool $bindings
   * @return bool|\PDOStatement
   */
  public function query($query, $bindings=false)
  {
    try {
      $stmt = $this->conn->prepare($query);
      if ( $bindings ) $stmt->execute($bindings);
      else $stmt->execute();
      return $stmt;
    } catch ( \PDOException $e ) {
      return false;
    }
  }

  /**
   * Inserts data into the database.
   * @param string $table
   * @param array $bindings
   * @return bool|int
   */
  public function insert($table, $bindings)
  {
    $keys = implode(', ', array_keys($bindings));
    $named_param = ':' . implode(', :', array_keys($bindings));
    $result = $this->query("INSERT INTO {$table} ($keys) VALUES ($named_param)", $bindings);
    return $result ? (int)$this->conn->lastInsertId() : false;
  }

  /**
   * Returns Database connection Message
   * @return string
   */
  public function getStatusMessage()
  {  return $this->success ? "Connection successful!" : $this->status;  }

}
