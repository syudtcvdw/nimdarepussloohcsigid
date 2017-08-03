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


use app\models\FeedbackModel;
use App\Models\ManageAdminModel;

class Admin extends APIAble
{

  /**
   * Generates a random password
   * @method: GET
   * @endpoint: /admin/pwd
   * @args: null
   * @param null|API $api
   * @return array|string
   */
  function pwd($api = null)
  {
    if ($api->method !== "GET") return "Admin: Invalid invocation";
    $obj = ['data' => _generate_id()];
    return $obj;
  }

  /**
   * Retrieve and update feedback status
   * @method: GET & POST
   * @endpoint: /admin/feedback
   * @args: For GET(?id='') For POST (?id=''&status='')
   * @param null|API $api
   * @return array
   */
  function feedback($api = null)
  {
    switch ($api->method) {
      case "GET" :
        if (count($api->args) === 1) {
          $id = $api->args[0];
          $feedback = new FeedbackModel;
          $status = $feedback->getFeedbackStatus($id);
          if (!$status)
            return [
            "status" => false,
            "msg" => "No record found for id: {$id}"
          ];
          return [
            "status" => true,
            "response" => ["id" => $id, "feedback_status" => $status]
          ];
        }
        return [
          "status" => false,
          "msg" => "Admin: Unexpected argument"
        ];
      case "POST" :
        if (count($_POST) === 2) {
          $feedback = new FeedbackModel;
          extract($_POST);
          if (isset($status) && isset($id)) {
            if ($feedback->setFeedbackStatus($id, $status)) return ["status" => true];
            return [
              "status" => false,
              "msg" => "Could not update record."
            ];
          }
          return [
            "status" => false,
            "msg" => "Unexpected arguments."
          ];
        }
        return [
          "status" => false,
          "msg" => "Missing arguments."
        ];
      default :
        return [
          "status" => false,
          "msg" => "Admin: Invalid invocation"
        ];
    }

  }

}