<?php

/**
 * Created by PhpStorm.
 * User: victor
 * Date: 5/28/17
 * Time: 7:56 PM
 */

namespace App\Lib;


class Session
{
  public static function init()
  { session_start();  }

  public static function set($key, $value)
  { $_SESSION[$key] = $value; }

  public static function get($key)
  {
    return isset( $_SESSION[$key] ) ? $_SESSION[$key] : false;
  }

  public static function destroy()
  {
    session_destroy();
    $_SESSION = [];
  }

}