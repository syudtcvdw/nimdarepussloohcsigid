<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 5/31/2017
 * Time: 2:17 PM
 */

namespace App\Controllers;


use App\Core\Controller;

class DashboardController extends Controller
{

    public function index()
    {

        $this->view->render("dashboard/index");
    }
}