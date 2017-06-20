<?php
/**
 * Created by PhpStorm.
 * User: victor
 * Date: 6/1/17
 * Time: 8:39 PM
 */

namespace App\Models;


use App\Core\Model;
use App\Lib\Classes\Admin;

class LogoutModel extends Model
{

  /**
   * logs the user out and redirects to login page
   */
  public function logout()
  {
    $admin = new Admin;
    $admin->logout("login");
  }

}