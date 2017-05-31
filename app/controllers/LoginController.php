<?php
/**
 * Created by PhpStorm.
 * User: victor
 * Date: 5/31/17
 * Time: 2:44 PM
 */

namespace App\Controllers;


use App\Core\Controller;

class LoginController extends Controller
{

  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $this->view->render("login");
  }
}