<?php

namespace App\Core;

/**
 * @property string layout
 */
abstract class Controller
{

    protected $args;
    protected $view;

    #!- if true, means this controller has implementation in its _index()
    #!- that allows it to accepts all method invocations
    public $LENIENT = false;

    /**
     * Controller constructor.
     */
    public function __construct()
    {
        $this->view = new View;
    }

    /**
     * Performs operation based on supplied arguments
     */
    protected function _ops()
    {
        if (method_exists($this, _cleanUpDashes($this->args[0])))
            call_user_func_array([$this, _cleanUpDashes($this->args[0])], array_slice($this->args, 1));
    }

    /**
     * Lenient index function that accepts non-existent methods as arguments
     */
    protected function _index() {}

    /**
     * Default method run by every controller.
     * @return mixed
     */
    abstract public function index();

}
