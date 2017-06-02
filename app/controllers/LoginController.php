<?php
/**
 * Created by PhpStorm.
 * User: victor
 * Date: 5/31/17
 * Time: 2:44 PM
 */

namespace App\Controllers;


use App\Core\Controller;
use App\Lib\Classes\Validators;
use App\Models\LoginModel;

class LoginController extends Controller
{

    /**
     * LoginController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        _logged_only(false);

        $this->view->title = "Login";
        $this->view->css = ["login"];
    }

    /**
     * Renders the login view and communicates with the LoginModel
     */
    public function index()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!empty($_POST['useremail']) && Validators::validateEmail($_POST['useremail']) && !empty($_POST['userpass'])
            ) {
                $loginModel = new LoginModel;
                if (!$loginModel->login($_POST, isset($_POST['remember']))) $this->view->notice = "Incorrect credentials";
            } else $this->view->notice = "Please provide a valid email and password";
        }
        $this->view->render("login/index");
    }

}