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

  public function __construct()
  {
    parent::__construct();
  }

  public function login($credentials) {
    $adminLogin = new Admin($credentials);
    return $adminLogin->login();
  }

}