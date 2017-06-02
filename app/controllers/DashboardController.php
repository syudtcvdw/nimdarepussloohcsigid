<?php

namespace App\Controllers;

use App\Core\App;
use App\Core\Controller;
use App\Lib\Classes\Validators;
use App\Models\SchoolModel;
use App\Models\ManageAdminModel;

class DashboardController extends Controller
{

    public function __construct()
    {
        parent::__construct();
//        _logged_only();

        $this->layout = "dashboard-layout";
        $this->view->title = "Dashboard";
        $this->view->sidebar = VIEW_INCLUDE_PATH . 'sidebar.php';
    }

    public function index()
    {
        $this->view->render('dashboard/index', 'dashboard-layout');

  }
  public function createSchool(){

      if(isset($_POST['create_school'])){
          unset($_POST['create_school']);
            $data = $_POST;
            $errors = Validators::validateCreateSchoolForm($data);
          if(!$errors){
              echo "No errors <br>";
              $school = new SchoolModel($data);
              if($school->create()){
                  echo "School created<br>";
                  $this->view->status= "success";
                  $this->view->msg= "School Created Successfully";
              }
              else{
                  echo "School not created <br>";
                  $this->view->status= "error";
                  $this->view->msg= "Error Creating School";
              }
          }else{
              echo "Errors in validating <br>";
              $this->view->errors = $errors;
          }

      }
      $this->view->css = ['create-school'];
      $this->view->title = "CreateSchool";
      $this->view->render('dashboard/create-school', 'dashboard-layout');
  }
    

    public function manage()
    {
        _redirect("dashboard/manage-admins");
    }

    public function manageAdmins()
    {
        #!- set up args
        $this->args = func_get_args();

        #!- args passed
        if (count($this->args) > 0) $this->_ops();

        $admin = new ManageAdminModel;
        if (isset($_POST['add-super-admin'])) {
            if (!empty($_POST['fullname']) && !empty($_POST['useremail']) && !empty($_POST['userpass'])) {
                if ($admin->register($_POST)) $this->view->notice = "Registration successful";
                else $this->view->notice = "Could not register this admin. That email has been taken.";
            } else $this->view->notice = "Please fill in all fields";
        }

        $this->view->title = "Manage admins";
        $this->view->viewAdmins = $admin->getAdmins();
        $this->view->css = ['manage', 'font-awesome.min'];
        $this->view->js = ['datatable.min'];
        $this->view->render("manage/index", $this->layout);
    }

    /**
     * delete admin
     */
    protected function delete()
    {
        $args = func_get_args();
        if (isset($args[0])) {
            $admin = new ManageAdminModel;
            $admin->deleteAdmins($args[0]);
        }
        _redirect(App::$uri);
    }

}

