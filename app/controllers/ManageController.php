<?php
/**
 * Created by PhpStorm.
 * User: EMMATHEM
 * Date: 5/31/2017
 * Time: 3:57 PM
 */

namespace App\Controllers;


use App\Core\Controller;
use App\Lib\Classes\Admin;
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

  public function index($type = null, $status = "")
    {
        $admin = new ManageAdminModel();
        if(isset($_POST['add-super-admin'])) {
            if(!empty($_POST['fullname']) && !empty($_POST['useremail']) && !empty($_POST['userpass'])) {

                if ($admin->register($_POST)) {
                    echo "register!";
                }
                else {
                    echo "Failed";
                }

            }
            else {
                echo "Fill all field";
            }
        }

        $this->view->viewAdmins = $admin->viewSuperAdmins();

        $this->view->css = ['manage','font-awesome.min'];
        $this->view->js = ['datatable.min'];
        $this->view->render("manage/index");
    }

}
