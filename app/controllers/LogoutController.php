<?php
/**
 * Created by PhpStorm.
 * User: victor
 * Date: 5/29/17
 * Time: 8:31 AM
 */

namespace App\Controllers;


use App\Core\Controller;
use App\Models\AdminModel;
use App\Models\UserModel;

class LogoutController extends Controller
{

  public function __construct()
  { parent::__construct();  }

  public function index()
  { $this->user();  }

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