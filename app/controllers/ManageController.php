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

    public function index()
    {
        $this->view->css = ['manage'];
        $this->view->render("manage/index");
    }
}