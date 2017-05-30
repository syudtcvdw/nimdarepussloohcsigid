<?php

/**
 * Created by PhpStorm.
 * User: victor
 * Date: 5/28/17
 * Time: 8:18 PM
 */

namespace App\Controllers;


use App\Core\Controller;

class DashboardController extends Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->view->title = "Dashboard";
    $this->view->js = ['dashboard/js/default.js'];
  }

  public function index()
  {
    $this->view->render("dashboard/index");
  }
}