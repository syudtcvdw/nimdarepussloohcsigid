<?php

namespace App\Core;

abstract class Controller
{

  protected $view;

  public function __construct()
  {
    $this->view = new View;
  }

  abstract public function index();

}
