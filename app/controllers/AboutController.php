<?php

/**
 * Created by PhpStorm.
 * User: victor
 * Date: 5/28/17
 * Time: 6:33 PM
 */

namespace App\Controllers;


use App\Core\Controller;

class AboutController extends Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->view->title = "About us";
  }

  public function index()
  {
    $this->view->render('about/index');
  }

  public function company()
  {
    $this->view->title = "About the Company";
    $this->view->render('about/company');

  }

  public function products()
  {
    $this->view->title = "About our Products";
    $this->view->render('about/products');
  }

}