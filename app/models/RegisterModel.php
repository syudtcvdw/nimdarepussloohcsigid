<?php
/**
 * Created by PhpStorm.
 * User: victor
 * Date: 5/29/17
 * Time: 8:35 AM
 */

namespace App\Models;


use App\Core\Model;

class RegisterModel extends Model
{

  public function __construct()
  {
    parent::__construct();
  }

  public function userRegister( $credentials )
  {
    $user = new UserModel($credentials);
    return $user->register();
  }

  public function adminRegister( $credentials )
  {
    $admin = new AdminModel( $credentials );
    $admin->register();
  }

}