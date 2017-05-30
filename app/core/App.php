<?php


namespace App\Core;

class App
{
  protected $controller = 'home';
  protected $method = 'index';
  protected $args = [];

  public function __construct()
  {
    $url = $this->__parseURL();
    // controller
    if ( file_exists(DOC_ROOT . APP_ROOT . 'controllers/' . ucfirst($url[0]) . 'Controller.php') ) {
      $this->controller = $url[0];
      unset($url[0]);
    }
    $this->controller = ucfirst($this->controller) . 'Controller';
//    require_once APP_ROOT . 'controllers/' . $this->controller . '.php';
    $this->controller = 'App\Controllers\\' . $this->controller;
    $this->controller = new $this->controller;

    // method
    $url = $this->__checkControllerMethod($url, (int)isset($url[1]));

    // args
    $this->args = $url ? array_values($url) : [];

    // call respective controller method
    call_user_func_array([$this->controller, $this->method], $this->args);
  }

  private function __checkControllerMethod($url, $index)
  {
    if ( isset($url[$index]) && method_exists($this->controller, $url[$index]) ) {
      $this->method = $url[$index];
      unset($url[$index]);
    }
    return $url;
  }

  private function __parseURL()
  {
    if ( isset($_GET['url']) ) {
      $url = rtrim($_GET['url'], '/');
      $url = filter_var($url, FILTER_SANITIZE_URL);
      return explode('/', $url);
    }
  }

}
