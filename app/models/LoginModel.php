<?php
/**
 * Created by PhpStorm.
 * User: victor
 * Date: 5/31/17
 * Time: 5:28 PM
 */

namespace App\Models;


use App\Core\Model;
use App\Lib\Classes\Admin;

class LoginModel extends Model
{

  /**
   * LoginModel constructor.
   */
  public function __construct()
  {
    parent::__construct();
  }

  /**
   * Instantiate the admin model and logs the admin in.
   * @param $credentials
   * @param bool $rememberMe
   * @return bool
   */
  public function login($credentials, $rememberMe=false) {
    $adminLogin = new Admin($credentials);
    return $adminLogin->login("dashboard", $rememberMe);
  }


}