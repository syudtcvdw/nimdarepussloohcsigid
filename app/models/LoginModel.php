<?php
/**
 * Created by PhpStorm.
 * User: victor
 * Date: 5/29/17
 * Time: 8:35 AM
 */

namespace App\Models;

use App\Core\Model;

class LoginModel extends Model
{

  public function __construct()
  {
    parent::__construct();
  }

  public function userLogin( $credentials )
  {
    $userModel = new UserModel($credentials);
    return $userModel->login();
  }

  public function adminLogin( $credentials )
  {
    $adminModel = new AdminModel( $credentials );
    return $adminModel->login();
  }

}