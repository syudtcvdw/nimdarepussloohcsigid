<?php

namespace App\Core;

abstract class Controller
{

  protected $view;

  /**
   * Controller constructor.
   */
  public function __construct()
  {
    $this->view = new View;
  }

  /**
   * Default method run by every controller.
   * @return mixed
   */
  abstract public function index();

}
