<?php

/**
 * Created by PhpStorm.
 * User: victor
 * Date: 5/28/17
 * Time: 9:08 AM
 */

namespace App\Core;

use App\Lib\Classes\Admin;

/**
 * @property string title
 * @property string notice
 * @property array js
 * @property array css
 * @property string sidebar
 * @property array allFeedback
 */
class View
{

  protected $header;
  protected $footer;
  public $js = [];
  public $css = [];

  #!- boolean for correct alert messages
  public $error = false;

  /**
   * View constructor.
   */
  public function __construct()
  {
    $this->isErrorPage = App::$hasError;
    $this->loggedIn = Admin::isLoggedIn();
  }

  /**
   * Loads in a view file with the option of using a defined layout.
   * Note: properties of this current class is available in the loaded view file.
   * @param $view
   * @param string $layout
   */
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