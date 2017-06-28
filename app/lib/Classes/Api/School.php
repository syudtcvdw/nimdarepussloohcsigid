<?php
/**
 * @author
 * Created by victor.
 * A.I. engineer & Software developer
 * javafolabi@gmail.com
 * On 28 06, 2017 @ 4:03 PM
 * Copyright victor © 2017. All rights reserved.
 */

namespace App\Lib\Classes\Api;


use App\Models\SchoolModel;

class School extends APIAble
{

  /**
   * Verifies admin credentials
   * @credit: Victor I. Afolabi
   * @param API|null $api
   * @return array
   */
  public function authAdmin($api = null)
  {
    if ($api->method != 'POST') return ['status' => false, 'msg' => 'Invalid invocation'];
    if (count($api->args) >= 2) {
      $username = $api->args[0];
      $password = $api->args[1];
      $data = ['admin_username' => $username, 'admin_password' => $password];
      $school = new SchoolModel($data);
      $result = $school->getSchoolInfo(["uid", "name"]);
      if ($result) {
        return ['status' => true,
          'response' => ['uid' => $result->uid,
            'name' => $result->name]];
      }
      return ['status' => false, 'msg' => 'Incorrect credentials supplied.'];
    }
    return ['status' => false, 'msg' => 'Provide a username and password.'];
  }

}
