<?php
/**
 * Created by PhpStorm.
 * User: victor
 * Date: 5/29/17
 * Time: 11:48 AM
 */

namespace App\Models;


use App\Core\Model;

class LogoutModel extends Model
{

  public function __construct()
  {
    parent::__construct();
  }

  public function user()
  {
    $userModel = new UserModel;
    $userModel->logout();
  }

  public function admin()
  {
    $adminModel = new AdminModel;
    $adminModel->logout();
  }

}