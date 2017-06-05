<?php


namespace App\Core;

use App\Controllers\_ErrorController;

class App
{
    protected $controller = 'dashboard';
    protected $method = 'index';
    protected $args = [];

    public static $hasError = false;
    public static $uri = '';

    #!- keeps the raw uri entry, not the cleaned up version
    private $raw_controller = '';
    private $raw_method = '';

    #!- invoked method is inexistent?
    private $_inexistent = false;

    /**
     * App constructor.
     */
    public function __construct()
    {
        $url = $this->__parseURL();

        // controller
        if (file_exists(APP_ROOT . 'controllers/' . ucfirst($url[0]) . 'Controller.php')) {
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

        // note the controller/method in the url
        App::$uri .= "{$this->raw_controller}/{$this->raw_method}";

        // call respective controller method
        if (!$this->_inexistent) call_user_func_array([$this->controller, $this->method], $this->args);
        else {

            #!- for lenient controllers, pass the actual (raw) method (with the dashes and all) first
            #!- then send in args with its head cut off
            call_user_func_array([$this->controller, $this->method], [$this->raw_method, array_slice($this->args, 1)]);
        }
    }

    /**
     * Ensures that the method exists within a controller
     * @param $url
     * @param $index
     * @return array
     */
    private function __checkControllerMethod($url, $index)
    {
        if (!isset($url[$index])) return $url;
        $this->raw_method = $url[$index];
        $url[$index] = _cleanUpDashes($url[$index]);

        if (method_exists($this->controller, $url[$index])) {
            $this->method = $url[$index];
            unset($url[$index]);
        } else {
            $u = $this->__methodInExistent();

            #!- lenient?
            if ($this->_inexistent) {

                #!- use the graceful lenient index implementation
                $this->method = '_index';
            } else $url = $u;
        }

        return $url;
    }

    /**
     * Sanitizes and splits up the URL into an array
     * @return array
     */
    private function __parseURL()
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            if (count($url) > 0) {
                $this->raw_controller = $url[0];
                $url[0] = _cleanUpDashes($url[0]);
            }
            return $url;
        }
    }

    /**
     * Method was supplied to controller, but is in-existent
     * @return array
     */
    private function __methodInExistent()
    {
        if ($this->controller->LENIENT) {
            #!- handle inexistent method leniently
            $this->_inexistent = true;
        }
        else {
            App::$hasError = true;
            $this->controller = new _ErrorController();
            return [404, 404];
        }
    }

    /**
     * Ensures that the resolved controller actually does exist
     */
    private function __assertController()
    {
        if (!file_exists(APP_ROOT . 'controllers/' . $this->controller . '.php')) {
            $this->__methodInExistent();
            $this->controller->index(404, 404);
            die();
        }
    }

}
