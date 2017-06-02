<?php
/**
 * @author
 * Created by victor.
 * A.I. engineer & Software developer
 * javafolabi@gmail.com
 * On 02 06, 2017 @ 1:07 PM
 * Copyright victor © 2017. All rights reserved.
 */

namespace App\Lib\Classes\Api;


abstract class APIAble
{

  /**
   * Tells if supplied method name exists
   * @param $method_name
   * @return bool
   */
  public function hasMethod($method_name)
  {
    return method_exists($this, $method_name);
  }

}