<?php

/**
 * Created by PhpStorm.
 * User: victor
 * Date: 5/29/17
 * Time: 8:23 AM
 */

namespace App\Controllers;


use App\Core\Controller;
use App\Models\LoginModel;

class LoginController extends Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->view->title = "Login";
  }

  public function index()
  { $this->user();  }

  public function user()
  {
    if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
      // check empty filed
      if ( !empty($_POST['username']) && !empty($_POST['password']) ) {
          $loginModel = new LoginModel;
          if ( $loginModel->userLogin($_POST) )
            header("Location: " . PROJECT_PATH . "dashboard");
          else
            $this->view->status = "Incorrect credentials, please try again.";
        } else $this->view->status = "Please fill in all credentials";
    }
    $this->view->render('user/login');
  }

  public function admin()
  {
    $this->view->title = "Admin Login";
    $this->view->render('admin/login');
  }
}