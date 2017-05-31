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
 */
class View
{

  protected $header;
  protected $footer;

  public function __construct()
  {
    $this->isErrorPage = App::$hasError;
    $this->loggedIn = Session::get("loggedIn");
    $this->header = '_includes/_header.php';
    $this->footer = '_includes/_footer.php';
    $this->sidebar = '_includes/_sidebar.php';
    $this->js = [];
    $this->css = [];
  }

  public function render($name)
  {
    $viewFile = 'app/views/' . $name . '.php';
    if ( file_exists($viewFile) )
      require_once 'app/views/layout.php';
  }

}