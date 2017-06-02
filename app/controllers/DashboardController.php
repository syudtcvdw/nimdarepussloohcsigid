<?php

namespace App\Controllers;

use App\Core\App;
use App\Core\Controller;
use App\Lib\Validators;
use App\Models\SchoolModel;

class DashboardController extends Controller
{

    public function __construct()
    {
        parent::__construct();
        _logged_only();

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


}

