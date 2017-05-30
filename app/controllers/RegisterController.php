<?php
/**
 * Created by PhpStorm.
 * User: victor
 * Date: 5/29/17
 * Time: 8:25 AM
 */

namespace App\Controllers;


use App\Core\Controller;
use App\Models\RegisterModel;

class RegisterController extends Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->view->title = "Register";
  }

  public function index()
  { $this->user();  }

  public function user()
  {
    if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
      if ( !empty($_POST['firstname']) && !empty($_POST['lastname'])
        && !empty($_POST['username']) && !empty($_POST['password']) ) {
        $register = new RegisterModel;
        if ( $register->userRegister($_POST) )
          $this->view->status = "Registration successful";
        else $this->view->status = "Username already exist.";
      } else $this->view->status = "Please fill in all credentials";
    }
    $this->view->render('user/register');
  }

  public function admin()
  {
    $this->view->title = 'Admin Registration';
    $this->view->render('admin/register');
  }

}