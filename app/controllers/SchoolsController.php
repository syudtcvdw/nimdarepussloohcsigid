<?php
/**
 * @Author
 * Falua Temitope Oyewole.
 * faluatemitopeo@gmail.com
 * Web Developer
 * Date: 6/3/2017
 */

namespace App\Controllers;

use App\Core\Controller;
use App\Models\SchoolStatModel;

class SchoolsController extends Controller
{
    /*
    * School Statistics Controller
    * */
    public function __construct()
    {
        parent::__construct();
        //_logged_only();
        $this->view->title = "View School Statistics";
        $this->view->sidebar = VIEW_INCLUDE_PATH . 'sidebar.php';
    }

    /*
     * Index page of View School Statistics
     * */
    public function index()
    {
        $schoolStat = new SchoolStatModel();

        $this->view->css = ['manage', 'font-awesome.min'];
        $this->view->render("schools/index", "dashboard-layout");
    }
}