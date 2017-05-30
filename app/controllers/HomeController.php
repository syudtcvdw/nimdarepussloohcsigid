<?php

namespace App\Controllers;

use App\Core\Controller;

class HomeController extends Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->view->title = "Home";
  }

  public function index()
  {
    $this->view->render('home/index');
  }

}
