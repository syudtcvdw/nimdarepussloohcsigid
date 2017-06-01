<?

namespace App\Controllers;

use App\Core\Controller;

class DashboardController extends Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->view->title = "Dashboard";
  }

  public function index($type=null, $status="")
  {
        $this->view->sidebar = VIEW_INCLUDE_PATH . 'sidebar.php';
        $this->view->render('dashboard/index', 'dashboard-layout');
  }

}

