<?php
/**
 * Created by PhpStorm.
 * User: victor
 * Date: 5/31/17
 * Time: 2:44 PM
 */

namespace App\Controllers;


use App\Core\Controller;
use App\Models\LoginModel;

class LoginController extends Controller
{

  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
      $loginModel = new LoginModel;
      if ( $loginModel->login($_POST) ) echo "Login successful";
      else $this->view->status = "That admin does not exist";
    }
    $this->view->render("login/index");
  }
}