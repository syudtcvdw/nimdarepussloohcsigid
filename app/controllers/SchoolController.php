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

class SchoolController extends Controller
{

  /**
   * SchoolController constructor.
   */
  public function __construct()
    {
        parent::__construct();
        _logged_only();

        $this->view->title = "View School Statistics";
        $this->view->sidebar = VIEW_INCLUDE_PATH . 'sidebar.php';

        #!- inform whoever is listening, what menu item we're on
        $this->view->menu = 2;
    }

  /**
   * Index page of View School Statistics
   */
  public function index()
    {
        $this->view->css = ['manage', 'font-awesome.min'];
        $this->view->render("schools/index", "dashboard-layout");
    }
}