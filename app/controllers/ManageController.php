<?php
/**
 * Created by PhpStorm.
 * User: EMMATHEM
 * Date: 5/31/2017
 * Time: 3:57 PM
 */

namespace App\Controllers;


use App\Core\Controller;
use App\Models\ManageAdminModel;

class ManageController extends Controller
{

    /**
     * ManageController constructor.
     */
    public function __construct()
    {
        parent::__construct();
//        _logged_only();

        $this->view->title = "Manage Admins";
        $this->view->sidebar = VIEW_INCLUDE_PATH . 'sidebar.php';
    }

    /**
     * MangeController index method (page)
     */
    public function index()
    {

    }


}
