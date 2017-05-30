<?php
/**
 * Created by PhpStorm.
 * User: victor
 * Date: 5/30/17
 * Time: 10:16 AM
 */

namespace App\Controllers;


use App\Core\Controller;

class AdminController extends Controller
{

  public function index()
  {
    $this->view->render("admin/index");
  }

}