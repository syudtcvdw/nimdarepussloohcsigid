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
        _logged_only();

        $this->layout = "dashboard-layout";
        $this->view->title = "Dashboard";
        $this->view->sidebar = VIEW_INCLUDE_PATH . 'sidebar.php';

        #!- inform whoever is listening, what menu item we're on
        $this->view->menu = 0;
    }

    public function index()
    {
        $this->view->render('dashboard/index', 'dashboard-layout');

    }

    /**
     * /create-school
     */
    public function createSchool()
    {
        #!- inform whoever is listening, what menu item we're on
        $this->view->menu = 1;

        if (isset($_POST['create_school'])) {
            unset($_POST['create_school']);
            $data = $_POST;
            $errors = Validators::validateCreateSchoolForm($data);
            if (!$errors) {
                $school = new SchoolModel($data);
                if ($school->create()) {
                    $this->view->status = "success";
                    $this->view->msg = "School Created Successfully";
                } else {
                    $this->view->status = "error";
                    $this->view->msg = "Error Creating School";
                }
            } else {
                $this->view->status = 'error';
                $this->view->msg = 'All fields are required';
            }
        }
        $this->view->css = ['create-school', 'font-awesome.min'];
        $this->view->title = "Create school";
        $this->view->render('dashboard/create-school', 'dashboard-layout');
    }

    public function feedback()
    {
        $this->view->css = ['feedback'];
        $this->view->title = "Feedback";
        $this->view->css = ['feedback','font-awesome.min'];
        $this->view->js = ['feedback'];
        $this->view->render('dashboard/feedback', $this->layout);
    }

    /**
     * /view-schools
     */
    public function viewSchools()
    {
        #!- inform whoever is listening, what menu item we're on
        $this->view->menu = 2;

        #!- set up args
        $this->args = func_get_args();

        #!- args passed
        if (count($this->args) > 0) $this->_ops();

        $model = new SchoolModel();
        $this->view->allSchools = $model->getAllSchools();
        $this->view->css = ['create-school', 'font-awesome.min'];
        $this->view->title = 'View all schools';
        $this->view->js = ['datatables.min'];
        $this->view->render('dashboard/view-schools', $this->layout);
    }

    /**
     * Handles school status toggle
     */
    protected function toggle()
    {
        $args = func_get_args();
        if (isset($args[0])) {
            $model = new SchoolModel();
            $model->toggleStatus($args[0]);
        }
        _redirect(App::$uri);
    }

    /**
     * /manage
     */
    public function manage()
    {
        _redirect("dashboard/manage-admins");
    }

    /**
     * /manage-admins
     */
    public function manageAdmins()
    {
        #!- inform whoever is listening, what menu item we're on
        $this->view->menu = 3;

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
        $this->view->js = ['datatables.min'];
        $this->view->render("manage/index", $this->layout);
    }

    /**
     * Handles admin deletion
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

    /**
     * Handles password update for admin
     */
    protected function changePassword()
    {
        $args = func_get_args();
        if (isset($_POST['changePassword'])) {

            $this->view->error = true;
            if (!empty($_POST['userpass']) && !empty($_POST['conf_userpass'])) {

                extract($_POST);
                if ($userpass !== $conf_userpass) $this->view->notice = "Passwords do not match";
                else {

                    $admin = new ManageAdminModel;
                    if ($admin->updateAdmins($args[0], ['userpass' => _hash($_POST['userpass'])])) _redirect(App::$uri);
                    else $this->view->notice = "Could Not Update Existing Password. Try Again!";
                }
            } else $this->view->notice = "Please, Fill All Fields";
        } else _redirect(App::$uri);
    }

}

