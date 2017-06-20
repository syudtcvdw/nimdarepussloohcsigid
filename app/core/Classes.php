<?php
/**
 * Created by PhpStorm.
 * User: victor
 * Date: 6/1/17
 * Time: 4:40 PM
 */

namespace App\Core;


use App\Lib\Classes\Database;

abstract class Classes
{
  public $db;

  /**
   * Classes constructor.
   * Instantiates the Database object
   */
  public function __construct()
  {
    $this->db = new Database;
  }

}