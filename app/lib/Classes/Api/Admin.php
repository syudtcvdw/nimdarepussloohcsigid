<?php
/**
 * @author
 * Created by victor.
 * A.I. engineer & Software developer
 * javafolabi@gmail.com
 * On 02 06, 2017 @ 1:27 PM
 * Copyright victor © 2017. All rights reserved.
 */

namespace App\Lib\Classes\Api;



class Admin extends APIAble
{

  /**
   * @param null|API $api
   * @return string
   */
  function all($api = null)
  {
    if ($api->method !== "GET") return "Admin: Invalid invocation";
    return "All admin";
  }

  /**
   * @param null|API $api
   * @internal param $args
   * @return string
   */
  function one($api = null)
  {
    if ($api->method !== "POST") return "Admin: Invalid invocation";
    return "One admin";
  }
}