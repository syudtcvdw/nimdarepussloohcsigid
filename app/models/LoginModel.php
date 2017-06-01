<?php
/**
 * Created by PhpStorm.
 * User: victor
 * Date: 5/31/17
 * Time: 5:28 PM
 */

namespace App\Models;


use App\Core\Model;

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
   * @return bool
   */
  public function login($credentials) {
    $adminLogin = new Admin($credentials);
    return $adminLogin->login();
  }


}