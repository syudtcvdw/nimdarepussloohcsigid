<?php
/**
 * Created by PhpStorm.
 * User: victor
 * Date: 6/1/17
 * Time: 8:37 PM
 */

namespace App\Controllers;


use App\Core\Controller;
use App\Models\LogoutModel;

class LogoutController extends Controller
{

  /**
   * LogoutController constructor.
   */
  public function __construct()
  {
    parent::__construct();
  }


  /**
   * LogoutController index (default) page.
   */
  public function index()
  {
    $logoutModel = new LogoutModel;
    $logoutModel->logout();
  }

}