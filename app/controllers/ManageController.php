<?php
/**
 * Created by PhpStorm.
 * User: EMMATHEM
 * Date: 5/31/2017
 * Time: 3:57 PM
 */

namespace App\Controllers;


use App\Core\Controller;
use App\Lib\Generators;
use App\Models\ManageAdminModel;

class ManageController extends Controller
{

    /**
     * ManageController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        _logged_only();

        $this->view->title = "Manage Admins";
        $this->view->sidebar = VIEW_INCLUDE_PATH . 'sidebar.php';
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
        if (isset($_GET['id'])) {
            $admin->updateAdmins($_GET['id']);
            _redirect("manage");
        }
        if (isset($_POST['add-super-admin'])) {
            if (!empty($_POST['fullname']) && !empty($_POST['useremail']) && !empty($_POST['userpass'])) {
                if ($admin->register($_POST)) $this->view->notice = "Registration successful";
                else $this->view->notice = "Could not register this admin. That email has been taken.";
            } else $this->view->notice = "Please fill in all fields";
        }

        if (isset($_POST['changePassword'])) {
            if(!empty($_POST['userpass']) && !empty($_POST['conf_userpass'])) {
                if($admin->updateAdmins($_POST)) $this->view->notice = "Password Updated Successfully";
                else $this->view->notice = "Could Not Update Existing Password. Try Again!";
            }
            else $this->view->notice = "Please, Fill All Fields";
        }
        $this->view->viewAdmins = $admin->getAdmins();
        $this->view->css = ['manage', 'font-awesome.min'];
        $this->view->js = ['datatables.min'];
        $this->view->render("manage/index", "dashboard-layout");
    }
}
