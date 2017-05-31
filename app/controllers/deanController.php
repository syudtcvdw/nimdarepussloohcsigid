<?

namespace App\Controllers;

use App\Core\Controller;

class deanController extends Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->view->title = "Dean";
  }

  public function index($type=null, $status="")
  {
        $this->view->render('dean');
  }

}

