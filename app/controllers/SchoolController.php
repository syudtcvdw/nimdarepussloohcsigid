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

class SchoolController extends Controller
{

  /**
   * SchoolController constructor.
   */
  public function __construct()
    {
        parent::__construct();
        $this->LENIENT = true; // accepts all methods

        _logged_only();

        $this->view->title = "View School Statistics";
        $this->view->sidebar = VIEW_INCLUDE_PATH . 'sidebar.php';

        #!- inform whoever is listening, what menu item we're on
        $this->view->menu = 2;
    }

    /**
     * Lenient index function that accepts non-existent methods as arguments
     */
    public function _index()
    {
        $this->index(func_get_args()[0]);
    }

    /*
     * Index page of View School Statistics
     * */
    public function index($slug = '')
    {
        $model = new SchoolStatModel($slug);

        $this->view->basic = $model->getBasicInfo();
        $this->view->title = $this->view->basic['name'];

        $this->view->css = ['manage', 'font-awesome.min'];
        $this->view->render("schools/index", "dashboard-layout");
    }
}