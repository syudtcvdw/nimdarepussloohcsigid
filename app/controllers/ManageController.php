<?php
/**
 * Created by PhpStorm.
 * User: EMMATHEM
 * Date: 5/31/2017
 * Time: 3:57 PM
 */

namespace App\Controllers;


use App\Core\Controller;

class ManageController extends Controller
{

  public function __construct()
  {
    parent::__construct();
  }

  public function index()
    {
        $this->view->css = ['manage','font-awesome.min'];
        $this->view->js = ['datatable.min'];
        $this->view->render("manage/index");
    }
}