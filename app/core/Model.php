<?php

/**
 * Created by PhpStorm.
 * User: victor
 * Date: 5/28/17
 * Time: 9:10 AM
 */
namespace App\Core;


use App\Lib\Classes\Database;

abstract class Model
{

  public $db;

  /**
   * Model constructor.
   * Instantiates the Database object
   */
  public function __construct()
  {
    $this->db = new Database;
  }

}