<?

namespace App\Controllers;

use App\Core\Controller;

class DashboardController extends Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->view->title = "Dashboard";
    $this->view->sidebar = VIEW_INCLUDE_PATH . 'sidebar.php';
  }

  public function index()
  {
        $this->view->render('dashboard/index', 'dashboard-layout');

  }
  public function createSchool(){
      $this->view->css = ['create-school'];
      $this->view->title = "CreateSchool";
      $this->view->render('dashboard/create-school', 'dashboard-layout');



  }

}

