<?php

/**
 * Created by PhpStorm.
 * User: victor
 * Date: 5/28/17
 * Time: 9:08 AM
 */

namespace App\Core;

use App\Lib\Session;

/**
 * @property string title
 * @property string status
 * @property array js
 * @property array css
 * @property string sidebar
 */
class View
{

  protected $header;
  protected $footer;
  
  public $js = [];
  public $css = [];

  public function __construct()
  {
    $this->isErrorPage = App::$hasError;
    $this->loggedIn = Session::get("loggedIn");
  }

  public function render($view, $layout = '_plain-layout')
  {
    $viewFile = 'app/views/' . $view . '.php';
    $layoutFile = 'app/views/_layouts/' . $layout . '.php';

    $this->header = VIEW_INCLUDE_PATH . $layout . '-header.php';
    $this->footer = VIEW_INCLUDE_PATH . $layout . '-footer.php';

    if ( file_exists($layoutFile) && file_exists($viewFile) )
      require_once $layoutFile;
  }

}