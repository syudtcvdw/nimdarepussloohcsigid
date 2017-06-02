<?php
/**
 * Created by PhpStorm.
 * User: EMMATHEM
 * Date: 5/31/2017
 * Time: 3:57 PM
 */

namespace App\Controllers;


use App\Core\Controller;
use App\Models\ManageAdminModel;

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
   * MangeController index method (page)
   */
  public function index()
  {
    $admin = new ManageAdminModel;
    if (isset($_GET['id'])) {
      $admin->deleteAdmins($_GET['id']);
      _redirect("manage");
    }

    if (isset($_POST['add-super-admin'])) {
      if (!empty($_POST['fullname']) && !empty($_POST['useremail']) && !empty($_POST['userpass'])) {
        if ($admin->register($_POST)) $this->view->notice = "Registration successful";
        else $this->view->notice = "Could not register this admin. That email has been taken.";
      } else $this->view->notice = "Please fill in all fields";
    }

    $this->view->viewAdmins = $admin->getAdmins();
    $this->view->css = ['manage', 'font-awesome.min'];
    $this->view->js = ['datatable.min'];
    $this->view->render("manage/index");
  }


}
