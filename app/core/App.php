<?php


namespace App\Core;

use App\Controllers\_ErrorController;

class App
{
  protected $controller = 'home';
  protected $method = 'index';
  protected $args = [];

  public static $hasError = false;

  /**
   * App constructor.
   */
  public function __construct()
  {
    $url = $this->__parseURL();
    $url[0] = $this->__cleanUpDashes($url[0]);
    // controller
    if ( file_exists(APP_ROOT . 'controllers/' . ucfirst($url[0]) . 'Controller.php') ) {
      $this->controller = $url[0];
      unset($url[0]);
    }
    $this->controller = ucfirst($this->controller) . 'Controller';

    $this->__assertController();

    $this->controller = 'App\Controllers\\' . $this->controller;
    $this->controller = new $this->controller;

    // method
    $url = $this->__checkControllerMethod($url, (int)isset($url[1]));

    // args
    $this->args = $url ? array_values($url) : [];

    // call respective controller method
    call_user_func_array([$this->controller, $this->method], $this->args);
  }

  /**
   * Ensures that the method exists within a controller
   * @param $url
   * @param $index
   * @return array
   */
  private function __checkControllerMethod($url, $index)
  {
    if ( !isset($url[$index]) ) return $url;
    $url[$index] = $this->__cleanUpDashes($url[$index]);
      
    if ( method_exists($this->controller, $url[$index]) ) {
      $this->method = $url[$index];
      unset($url[$index]);
    } else
      $url = $this->__methodInExistent();

    return $url;
  }

  /**
   * Sanitizes and splits up the URL into an array
   * @return array
   */
  private function __parseURL()
  {
    if ( isset($_GET['url']) ) {
      $url = rtrim($_GET['url'], '/');
      $url = filter_var($url, FILTER_SANITIZE_URL);
      return explode('/', $url);
    }
  }

  /**
   * Method was supplied to controller, but is in-existent
   * @return array
   */
  private function __methodInExistent() {
      App::$hasError = true;
      $this->controller = new _ErrorController();
      return [404,404];
  }

  /**
   * Ensures that the resolved controller actually does exist
   */
  private function __assertController() {
      if ( !file_exists(APP_ROOT . 'controllers/' . $this->controller . '.php') ) {
          $this->__methodInExistent();
          $this->controller->index(404, 404);
          die();
      }
  }

  /**
   * Cleans up dashes(-) in the controller/method names
   * @param $subject
   * @return mixed
   */
  private function __cleanUpDashes($subject) {
    return str_replace("-", "", $subject);
  }

}
