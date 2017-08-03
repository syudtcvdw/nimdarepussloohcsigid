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


use App\Lib\Classes\Validators;
use App\Models\SchoolModel;
use app\models\FeedbackModel;

class School extends APIAble
{

  /**
   * Verifies admin credentials
   * @method: POST
   * @endpoint: /school/auth-admin
   * @args: ?username=''&password=''
   * @credit: Victor I. Afolabi
   * @param API|null $api
   * @return array
   */
  public function authAdmin($api = null)
  {
    if ($api->method !== 'POST') return ['status' => false, 'msg' => 'Invalid invocation'];
    if (count($_POST) >= 2) {
      extract($_POST);
      if (isset($username) && isset($password))
        $data = ['admin_username' => $username, 'admin_password' => $password];
      else
        return ['status' => false, 'msg' => 'Admin: Unexpected arguments'];
      $school = new SchoolModel($data);
      $result = $school->getSchoolInfo(["uid", "name"]);
      if ($result) {
        return [
          'status' => true,
          'response' => [
            'uid' => $result->uid,
            'name' => $result->name
          ]
        ];
      }
      return ['status' => false, 'msg' => 'Incorrect credentials supplied.'];
    }
    return ['status' => false, 'msg' => 'Provide a username and password.'];
  }

  /**
   * Update admin email
   * @method: POST
   * @endpoint: /school/update-email
   * @args: ?uid=''&email=''
   * @credit: Victor I. Afolabi
   * @param null|API $api
   * @return array|string
   */
  function updateEmail($api = null)
  {
    if ($api->method !== 'POST') return ['status' => false, 'msg' => 'Admin: invalid invocation'];
    if (count($_POST) == 2) {
      $schoolModel = new SchoolModel();
      extract($_POST);
      if (isset($uid) && isset($email)) {
        if (!Validators::anyEmpty($_POST)) {
          if ($schoolModel->updateSchoolInfo(['uid' => $uid, 'admin_uname' => $email], ['uid' => $uid]))
            return [
            'status' => true,
            'msg' => 'Admin: Email successfully updated'
          ];
          else
            return [
            'status' => false,
            'msg' => 'Admin: Could not update the email. Could be due to wrong `uid`'
          ];
        }
        else
          return [
          'status' => false,
          'msg' => 'Admin: `uid` and `email` cannot be empty'
        ];
      }
      else
        return [
        'status' => false,
        'msg' => 'Admin: Unexpected arguments.'
      ];
    }
    return [
      'status' => false,
      'msg' => 'Admin: School `uid` and admin\'s `email` required'
    ];
  }


  /**
   * Update admin password
   * @method: POST
   * @endpoint: /school/update-password
   * @args: ?uid=''&password=''
   * @credit: Victor I. Afolabi
   * @param null|API $api
   * @return array|string
   */
  function updatePassword($api = null)
  {
    if ($api->method !== 'POST') return ['status' => false, 'msg' => 'Admin: invalid invocation'];
    if (count($_POST) === 2) {
      $schoolModel = new SchoolModel();
      extract($_POST);
      if (isset($uid) && isset($password)) {
        if (!Validators::anyEmpty($_POST)) {
          if ($schoolModel->updateSchoolInfo(['uid' => $uid, 'admin_password' => _hash($password)], ['uid' => $uid]))
            return [
            'status' => true,
            'msg' => 'Admin: Password successfully updated'
          ];
          else
            return [
            'status' => false,
            'msg' => 'Admin: Could not update the password. Could be due to wrong `uid`'
          ];
        }
        else
          return [
          'status' => false,
          'msg' => 'Admin: `uid` and `password` cannot be empty'
        ];
      }
      else
        return [
        'status' => false,
        'msg' => 'Admin: Unexpected arguments.'
      ];
    }
    return [
      'status' => false,
      'msg' => 'Admin: School `uid` and admin\'s `password` required'
    ];
  }

  /**
   * Add feedback
   * @method: POST
   * @endpoint: /school/feedback
   * @args: ?school_id=''&title=''&message=''
   * @credit: Victor I. Afolabi
   * @param null|API $api
   * @return array|string
   */
  function feedback($api = null)
  {
    if ($api->method !== "POST") return ['status' => false, 'msg' => 'Admin: invalid invocation'];
    if (count($_POST) === 3) {
      $feedback = new FeedbackModel;
      extract($_POST);
      if (isset($school_id) && isset($title) && isset($message)) {
        if (!Validators::anyEmpty($_POST)) {
          $data = ['school_id' => $school_id, 'title' => $title, 'body' => $message, 'status' => 'fresh'];
          if ($feedback->add($data))
            return [
            'status' => true,
            'msg' => 'Admin: Feedback successfully inserted!'
          ];
          else
            return [
            'status' => false,
            'msg' => 'Admin: Trouble adding feedback'
          ];
        }
        else
          return [
          'status' => false,
          'msg' => 'Admin: No fields must be empty'
        ];
      }
      else
        return [
        'status' => false,
        'msg' => 'Admin: Unexpected arguments.'
      ];
    }
    return [
      'status' => false,
      'msg' => 'Admin: `school_id`, `title` and `message` required'
    ];
  }

}
