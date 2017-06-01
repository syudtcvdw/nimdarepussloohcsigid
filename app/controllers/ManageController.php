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

  /**
   * ManageController constructor.
   */
  public function __construct()
  {
    parent::__construct();
    $this->view->title = "Manage Super Admin";
  }

  /**
   * ManageController index (default) page
   */
  public function index()
  {
    $this->view->css = ['manage','font-awesome.min'];
    $this->view->js = ['datatable.min'];
    $this->view->render("manage/index");
  }
}